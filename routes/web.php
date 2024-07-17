<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
//基本的にはInertiaを毎回読み込む
use Inertia\Inertia;
//通常はこのルーティングから自作したControllerへ情報を渡すので、必要なコントローラをuseしておく必要がある
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;

//リソースフルを作り、かつミドルウェアを使ってログイン後のみアクセスを許可する
Route::resource('items', ItemController::class) 
->middleware(['auth', 'verified']);

/* ---------------------------- */

Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
});

Route::get('/inertia/index', 
    [InertiaTestController::class, 'index']
    )->name('inertia.index');

//投稿をするためのCREATEページ
Route::get('/inertia/create', 
    [InertiaTestController::class, 'create']
    )->name('inertia.create');    

//postを通信を使った、データの保存処理。rootはinertiaだけでよい。これはリソースコントローラーでそう定まっているから。
Route::post('/inertia', 
    [InertiaTestController::class, 'store']
    )->name('inertia.store');    

//個々の投稿を閲覧するためのshowルーティング
Route::get('/inertia/show/{id}', 
    [InertiaTestController::class, 'show']
    )->name('inertia.show');

//個々の投稿を削除するためのルーティング
Route::delete('/inertia/{id}', 
    [InertiaTestController::class, 'delete']
    )->name('inertia.delete');

//指定のRouteとビューを対応させて、かつ連想配列でキーと値をビュー側に渡している
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
