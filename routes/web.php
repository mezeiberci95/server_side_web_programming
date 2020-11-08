 <?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TagController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/posts', [PostController::class, 'showAll'])->name('posts');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

Route::get('/new-post}', [PostController::class, 'showNewPost'])->name('new.post');

Route::post('/store-post}', [PostController::class, 'storeNewPost'])->name('store.new.post');

Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
