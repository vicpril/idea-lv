<?php

namespace Idea\Http\Controllers\Back;

use Illuminate\Http\Request;
use Idea\Http\Requests\ArticleRequest as ArticleRequest;
use Idea\Http\Controllers\Controller;
use Idea\Repositories\ArticlesRepository;
use Idea\Repositories\CategoriesRepository;
use Idea\Repositories\TagsRepository;
use Idea\Repositories\UsersRepository;
use Idea\Models\Article;
use Idea\Models\Category;
use Idea\Models\Tag;
use Idea\Models\User;


class ArticlesController extends Controller
{
    use Indexable;

    // Repositories
    
    public $c_rep;
    public $t_rep;
    public $u_rep;

    /**
     * Create a new ArticleController instance.
     *
     * @param  \Idea\Repositories\ArticlesRepository $a_rep
     */
    public function __construct(ArticlesRepository $a_rep, CategoriesRepository $c_rep, TagsRepository $t_rep, UsersRepository $u_rep)
    {
        $this->repository = $a_rep;
        $this->c_rep = $c_rep;
        $this->t_rep = $t_rep;
        $this->u_rep = $u_rep;

        $this->table = 'articles';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = $this->u_rep->all()->where('role', 'author')->pluck('shortName', 'id')->sort();
        $categories = $this->c_rep->all()->pluck('ru', 'id');
        $tags = $this->t_rep->all()->pluck('ru', 'id');


        return view("back.$this->table.create", compact('tags', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
      dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // dd($article);

        $this->authorize('manage', $article);

        $result = $this->repository->deleteArticle($article);

        return redirect('/admin/articles')->with($result);

        return response()->json();

    }
}
