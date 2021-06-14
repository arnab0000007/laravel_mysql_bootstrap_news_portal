<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GuestPostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
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

Route::get('add/post/view', [PostController::class, 'addPostView']);
Route::post('add/post/insert', [PostController::class, 'addPostInsert']);

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('delete/post/{productId}', [PostController::class, 'deletePost']);

Route::get('add/category/view', [CategoryController::class, 'addCategoryView']);
Route::post('add/category/insert', [CategoryController::class, 'addCategoryInsert']);
Route::get('delete/category/{categoryId}', [CategoryController::class, 'deleteCategory']);
Route::get('change/menu/status/{categoryId}', [CategoryController::class, 'changeMenuStatus']);


Route::get('edit/post/{product_id}', [postController::class, 'editPost']);
Route::post('edit/post/insert', [PostController::class, 'editPostInsert']);

//frontEnd Routes

Route::get('/post/details/{postId}', [FrontendController::class, 'postDetails']);
Route::get('category/{categoryId}', [FrontendController::class, 'categoryPost']);

//question part
Route::get('insert/question/view', [FrontendController::class, 'insertQuestionView']);
Route::post('question/insert', [FrontendController::class, 'questionInsert']);

Route::get('question/view', [QuestionController::class, 'questionView']);
Route::get('answeredquestion/view', [QuestionController::class, 'answeredQuestionView']);
Route::get('answer/question/{questionId}', [QuestionController::class, 'answerQuestionView']);
Route::get('delete/question/{questionId}', [QuestionController::class, 'deleteQuestion']);
Route::post('question/answer/insert', [QuestionController::class, 'questionAnswerInsert']);

Route::get('/answer/view', [FrontendController::class, 'answerView']);

//about us

Route::get('/about/view', [FrontendController::class, 'aboutView']);
Route::get('/about/insert/view', [AboutController::class, 'aboutInsertView']);
Route::post('add/about/insert', [AboutController::class, 'addAboutInsert']);
Route::post('edit/about/insert', [AboutController::class, 'editAboutInsert']);


//banner
Route::get('/add/banner/view', [BannerController::class, 'addBannerView']);
Route::post('add/banner/insert', [BannerController::class, 'addBannerInsert']);
Route::get('delete/banner/{id}', [BannerController::class, 'deleteBanner']);

//guest post

Route::get('add/guest/post/insert/view', [FrontendController::class, 'addGuestPostInsertView']);
Route::post('add/guest/post/insert', [FrontendController::class, 'addGuestPostInsert']);

Route::post('add/guest/post/move/', [GuestPostController::class, 'addGuestPostInsertMove']);
Route::get('guest/post/view', [GuestPostController::class, 'guestPostView']);

Route::get('guest/post/edit/{postId}', [GuestPostController::class, 'guestPostEditView']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('contact', [FrontendController::class, 'contact']);

Route::get('/test', function(){
    dd(bcrypt('123123'));
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);
