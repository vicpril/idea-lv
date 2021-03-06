<?php

namespace Idea\Http\Controllers;

use Illuminate\Http\Request;

use Idea\Repositories\UsersRepository;

use Config;

class AuthorsController extends SiteController
{
    public function __construct(UsersRepository $u_rep) {
		parent::__construct(new \Idea\Repositories\MenusRepository(new \Idea\Models\Menu));

		$this->u_rep = $u_rep;

		// $this->s_rep = $s_rep;

		$this->template = env('THEME').'.single';
	}

	public function index() {

        $users = $this->getAuthors();

        $content = view(env('THEME').'.authors_content')->with('users', $users)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $sidebar_menu = '';

        $sidebar = view(env('THEME').'.sidebar')->with('sidebar_menu', $sidebar_menu)->render();
        $this->vars = array_add($this->vars, 'sidebar', $sidebar);

        return $this->renderOutput();
    }

    public function show($alias) {

        $user = $this->getAuthor($alias);

        $content = view(env('THEME').'.author_content')->with('user', $user)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $sidebar_menu = '';

        $sidebar = view(env('THEME').'.sidebar')->with('sidebar_menu', $sidebar_menu)->render();
        $this->vars = array_add($this->vars, 'sidebar', $sidebar);

        return $this->renderOutput();
    }

    public function getAuthor($alias) {
    	$user = $this->u_rep->one($alias);
    	$user = $this->u_rep->filerUserArticlesByStatus($user, 'public');
    	return $user;
    }

    public function getAuthors() {
    	$users = $this->u_rep->get('*', false, 'name');
        $users->load('articles');

    	//prepare for column-output
    	$col = Config::get('settings.authors_columns_count');
		$users = $users->mapToGroups(function($user, $key) use ($users, $col) {
			$maxInCols = ceil($users->count() / $col);
			$row = $key % $maxInCols;
			return [$row => $user];
		});
		// $users = $users->chunk($col);

		// dd($users);
    	
    	return $users;
    }
}
