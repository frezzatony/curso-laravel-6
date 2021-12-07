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
});

Route::get('/contato', function () {
    return view('site.contato');
});


Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::any('/any', function () {
    return 'Rota Any';
});

Route::match(['get','post'],'/match', function () {
    return 'Rota Match';
});

Route::get('/categorias/{categoria}', function ($categoria) {
    return 'Caterogia: '.$categoria ;
});

Route::get('/produtos/{idProduct?}', function ($idProduct=NULL) {
    return 'Produto(s): '.$idProduct ;
});


Route::redirect('/redirect01','/redirect02');
//Route::get('/redirect01', function () {
//    return redirect('/redirect02');
//});

Route::get('/redirect02', function () {
    return 'Redirect 02';
});

Route::view('/view','welcome',['id'=>'valor do parametro id']);

Route::get('/nome-url', function () {
    
    return 'Nome uurl';
    
})->name('url.name');


Route::get('/redirect03', function(){
    
    return redirect()->route('url.name');
    
});

Route::get('/login', function () {
    return 'Login';
})->name('login');

/*
Route::middleware([])->group(function(){
    
    Route::prefix('admin')->group(function(){
        
        Route::namespace('Admin')->group(function(){
            
            Route::name('admin.')->group(function(){
                
                Route::get('/',function(){
                    
                    return redirect()->route('admin.dashboard');
                });  
                
                Route::get('/dashboard', 'MainController@main')->name('dashboard'); 
        
                Route::get('/financeiro', 'FinanceiroController.php@main')->name('financeiro');
                
                Route::get('/produtos', 'ProdutosController@main')->name('produtos');
                
                  
            });
            
             
        });
    });   
    
});
*/

Route::group(
    [
        'middleware'    =>  [], //auth, ...
        'prefix'        =>  'admin',
        'namespace'     =>  'Admin',
        'name'          =>  'admin.'
    ],
    function(){
        
        Route::get('/',function(){
                    
            return redirect()->route('admin.dashboard');
        });  
        
        Route::get('/dashboard', 'MainController@main')->name('dashboard'); 

        Route::get('/financeiro', 'FinanceiroController@main')->name('financeiro');
        
        Route::get('/produtos', 'ProdutosController@main')->name('produtos');        
        
    }
);

