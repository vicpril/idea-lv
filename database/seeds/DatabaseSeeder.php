<?php

use Illuminate\Database\Seeder;

use Idea\Models\Article;
use Idea\Models\MetaArticle;
use Idea\Models\User;
use Idea\Models\MetaUser;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	$faker = Faker::create('ru_RU');

	/**************************
	 *			Add Menus
	 **************************/

    	DB::table('menus')->insert([
    		'title' => 'О журнале',
    		'title-en' => 'About',
    		'path' => '/',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Свежий номер',
    		'title-en' => 'New Issue',
    		'path' => '/articles',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Архив',
    		'title-en' => 'Archive',
    		'path' => '/archive',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Редколлегия и Редсовет',
    		'title-en' => 'Editorial board',
    		'path' => '#',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Подписка и покупка',
    		
    		'path' => '#',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Как подать статью',
    		
    		'path' => '#',
    	]);
    	DB::table('menus')->insert([
    		'title' => 'Контакты',
    		'title-en' => 'Contacts',
    		'path' => '/contacts',
    	]);



	// /**************************
	//  *			Add Users
	//  **************************/
	// 	// Users
        $admin = User::create(
            [
                // 'name' => 'Admin',
                'email' => 'admin@la.fr',
                'alias' => 'admin',
                'password' => bcrypt('123'),
                'role' => 'admin',
                // 'valid' => true,
                // 'confirmed' => true,
                'remember_token' => str_random(10),
            ]
        );




        $redac = User::create(
            [
                // 'name' => 'Redactor',
                'email' => 'redac@la.fr',
                'password' => bcrypt('123'),
                'alias' => 'redac',
                'role' => 'redac',
                // 'valid' => true,
                // 'confirmed' => true,
                'remember_token' => str_random(10),
            ]
        );

        factory(User::class, 8)->create();
        sleep(2);

        $admin->meta()->save(MetaUser::where('id', 1)->first()->replicate());
        $admin->meta()->save(MetaUser::where('id', 2)->first()->replicate());
        $redac->meta()->save(MetaUser::where('id', 3)->first()->replicate());
        $redac->meta()->save(MetaUser::where('id', 4)->first()->replicate());


 		// for ($i=1; $i <= 4; $i++) { 
	 	// 	DB::table('users')->insert([
	  //           'name' => 'user-'.$i,
	  //           'email' => 'user-'.$i.'@gmail.com',
	  //           'password' => bcrypt('secret'),
	  //       ]);
	 	// }
		// for ($i=1; $i <= 4; $i++) { 
	 // 		DB::table('users')->insert([
	 //            'name' => 'user-'.$i,
	 //            'email' => 'user-'.$i.'@gmail.com',
	 //            'password' => bcrypt('secret'),
	 //        ]);
	 	// }

	/*************************
	 *			Add Tags
	 *************************/
        for ($i=1; $i <= 5; $i++) { 
			DB::table('jobs')->insert([
	            'name' => 'Job name '.$i,
	            'alias' => 'job-'.$i,
	        ]);
		}

	/**************************
	 *			Add Status
	 **************************/
	 	DB::table('status')->insert(['name'=>'public']);
	 	DB::table('status')->insert(['name'=>'private']);

	// /**************************
	//  *			Add Categories
	//  **************************/
	$this->call([
        CategorySeeder::class,
        TagSeeder::class,

    ]);
	 	
 		// DB::table('categories')->insert([
   //          'name' => 'Рубрика №1',
   //          // 'name' => $faker->unique()->bank,
   //          'alias' => 'cat-1',
   //      ]);
   //      DB::table('categories')->insert([
   //          'name' => 'Рубрика №2',
   //          // 'name' => $faker->unique()->bank,
   //          'alias' => 'cat-2',
   //      ]);
   //      DB::table('categories')->insert([
   //          'name' => 'Рубрика №3',
   //          // 'name' => $faker->unique()->bank,
   //          'alias' => 'cat-3',
   //      ]);
   //      DB::table('categories')->insert([
   //          'name' => 'Рубрика №4',
   //          // 'name' => $faker->unique()->bank,
   //          'alias' => 'cat-4',
   //          'parent_id' => '1'
   //      ]);
   //      DB::table('categories')->insert([
   //          'name' => 'Рубрика №5',
   //          // 'name' => $faker->unique()->bank,
   //          'alias' => 'cat-5',
   //          'parent_id' => '2'
   //      ]);

	// /**************************
	//  *			Add Tags
	//  **************************/
  //       $tags = [
  //       			'искусствоведение',
		// 		    'история',
		// 		    'культурология',
		// 		    'образование',
		// 		    'социология',
		// 		    'философия',
		// 		    'экономика',
  //       		];
  //       foreach ($tags as $i => $name) {
		// 	DB::table('tags')->insert([
	 //            'name' => $name,
	 //            'alias' => 'tag-'.$i,
	 //        ]);
		// }


	/**************************
	 *			Add Isuues
	 **************************/
		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 2,
	        'tom' => 1,
	        'full_no' => 32,
		]);

		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 2,
	        'tom' => 2,
	        'full_no' => 32,
		]);

		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 3,
	        'tom' => 1,
	        'full_no' => 33,
		]);

		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 3,
	        'tom' => 2,
	        'full_no' => 33,
		]);

		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 4,
	        'tom' => 1,
	        'full_no' => 34,
		]);

		DB::table('issues')->insert([
			'year' => 2017,
			'no' => 4,
	        'tom' => 2,
	        'full_no' => 34,

		]);

		DB::table('issues')->insert([
			'year' => 2018,
			'no' => 1,
	        'tom' => 1,
	        'full_no' => 35,
		]);

		DB::table('issues')->insert([
			'year' => 2018,
			'no' => 1,
	        'tom' => 2,
	        'full_no' => 35,
		]);
	/**************************
	 *			Add Aticles
	 **************************/


	$articles = factory(Article::class, 30)
					->create()
					->each(function ($a) {
						$a->meta()->save(factory(MetaArticle::class)->states('ru')->make());
						$a->meta()->save(factory(MetaArticle::class)->states('en')->make());
					});

    sleep(2);

	/***************************************
	 *			Add Articles_User
	 ***************************************/
		for ($a=1; $a <= 30; $a++) { 
			$users = array(3,4,5,6,7,8,9,10);
			for ($i=1; $i <= random_int(1, 3); $i++) { 
				$user_key = array_rand($users);
				$user_id = $users[$user_key];
				DB::table('article_user')->insert([
						'article_id' => $a,
						'user_id' => $user_id,
					]);
				unset($users[$user_key]);
			}
		}

	/***************************************
	 *			Add Articles_Tag
	 ***************************************/
		for ($a=1; $a <= 30; $a++) { 
			$tags = array(1,2,3,4,5,6,7);
			for ($i=1; $i <= random_int(1, 2); $i++) { 
				$tag_key = array_rand($tags);
				$tag_id = $tags[$tag_key];
				DB::table('article_tag')->insert([
						'article_id' => $a,
						'tag_id' => $tag_id,
					]);
				unset($tags[$tag_key]);
			}
		}


	/***************************************
	 *			Add Articles_Category
	 ***************************************/
		for ($a=1; $a <= 30; $a++) { 
			$categorys = array(1,2,3,4,5);
			for ($i=1; $i <= 1; $i++) { 
				$category_key = array_rand($categorys);
				$category_id = $categorys[$category_key];
				


				DB::table('article_category')->insert([
						'article_id' => $a,
						'category_id' => $category_id,
					]);
				unset($categorys[$category_key]);
			}
		}

	/***************************************
	 *			Add User_Job
	 ***************************************/
		for ($u=3; $u <= 10; $u++) { 
			$jobs = array(1,2,3,4,5);
			for ($i=1; $i <= random_int(1, 3); $i++) { 
				$job_key = array_rand($jobs);
				$job_id = $jobs[$job_key];
				DB::table('user_job')->insert([
						'user_id' => $u,
						'job_id' => $job_id,
					]);
				unset($jobs[$job_key]);
			}
		}

    }
}
