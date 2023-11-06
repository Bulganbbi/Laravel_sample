<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // resources/views/welcome.blade.php ビューが表示
    return view('welcome');
});

// ルーティング後は、コントローラーに任せる
//homecontroller
Route::get('/about', [HomeController::class, 'about']);
Route::get('/search', [HomeController::class, 'search']);

//itemcontroller
Route::get('/item{id}', [ItemController::class, 'about']);
Route::get('/dp{id}', [ItemController::class, 'search']);

Route::get('/item/{id}', function ($id) {
    $message = "商品IDは{$id}";
    return $message;
});

//Amazonの商品のようなルーティング
Route::get('/dp/{id}', function ($id) {
    $message = "商品IDは{$id}";
    return $message;
});

// URLから直接アクセスできない
Route::post('/hello', function () {
    $message = "こんにちは";
    return $message;
});

//Google検索みたいなルーティング
Route::get('/search', function (Request $request) {
//     //dd($request);
//     // $keyword = $request->q;
//     // $message = "キーワードは{$keyword}です";

//     //連想配列データ
     $data = [
         'keyword' => $request->q
     ];
     // Viewファイルにデータを渡す
     return view('search', $data);
 });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';