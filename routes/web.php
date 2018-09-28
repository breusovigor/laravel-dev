<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/blade', function () {
    $data = [
        'title' => 'Blade Title',
        'description' => 'Donec id elit non mi porta gravida at eget metus.',
        'news' => [
            [
                'title' => 'News1',
                'description' => 'Description1',
                'active' => true,
            ],
            [
                'title' => 'News2',
                'description' => 'Description2',
                'active' => true,
            ],
            [
                'title' => 'News3',
                'description' => 'Description3',
                'active' => false,
            ]
    ]
    ];
    return view('blade', $data);
});

//Route::get('/page', function () {
//    $pageData = [
//        'posts' => [
//            [
//                'title' => 'Featured post 1',
//                'description' => 'This is a wider card',
//            ],
//            [
//                'title' => 'Featured post 2',
//                'description' => 'This is America',
//            ]
//        ]
//    ];
//    return view('page', $pageData);
//});

Route::prefix('page')->group(function () {
    Route::get('/', function (){
        $pageData = [
            'posts' => [
                [
                    'title' => 'Featured post 1',
                    'description' => 'This is a wider card',
                ],
                [
                    'title' => 'Featured post 2',
                    'description' => 'This is America',
                ]
            ]
        ];
        return view('page', $pageData);
    });

    Route::get('/world', function () {
        $pageData = [
            'posts' => [
                [
                    'title' => 'Featured post 1',
                    'description' => 'This is a wider card',
                ],
                [
                    'title' => 'Featured post 2',
                    'description' => 'This is America',
                ]
            ]
        ];
        return view('world', $pageData);
    });
});

Route::get('/pages/test', 'PageController@test'); //прописываем свой роут используя action в PageController

//Делаем роуты для ресурс контроллера
Route::resource('pages', 'PageController')->names([
    'update' => 'pages.update',
    'destroy' => 'pages.destroy',
]);

//Route::get('/message', function () {
//   var_dump($_REQUEST); die;
//});

//Route::match(['get', 'post'], '/message', function () {
//    var_dump($_REQUEST); die;
//});

//Ниже мини с/р
//Route::match(['get', 'post'], '/page/{cat?}/{id?}', ['as'=>'page', 'uses'=>'FirstController@pageAction'])->where(['cat' => '[A-Za-z]+', 'id' => '[0-9]+']);

//роут с группировкой
/*Route::prefix('first')->group(function () { //группировка чтобы не повторять
    Route::get('/admin', 'FirstController@indexAction');
    Route::get('/user', 'FirstController@indexAction');
});*/

Route::get('/first', ['middleware' => 'my', 'as' => 'first', 'uses' => 'FirstController@indexAction']); // здесь подключается middleware

//Route::get('/first/{id}', 'FirstController@index'); //указываем перым параметром адрес, вторым параметром котроллер и через @ action
//Route::get('/first/{id}', ['as'=>'home', 'uses'=>'FirstController@index']); //используем алиасы(используются только внутри, а не в адресной строке)

//Route::get('/page/{cat?}/{id?}', ['as'=>'home', function ($cat = NULL, $id = NULL) {
//    var_dump($cat);
//    var_dump($id); die;
//    return view('welcome');
//}])->where((['id' => '[0-9]+', 'cat' => '[a-z]+']));

