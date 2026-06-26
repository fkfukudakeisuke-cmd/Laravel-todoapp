<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Models\Practice;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//test用route
Route::get('/test', function () {
    return view('test');
});




Route::get('/dashboard', function () {
    return redirect()->route('practices.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//ログインしているユーザーのみが入れるroute
Route::middleware('auth')->group(function () {
    //
    //Practice 一覧画面表示する為のroute
    Route::get('/practices', [PracticeController::class, 'index'])->name('practices.index');
    //Practice 新しいTodoを保存する為のroute
    Route::post('/practices', [PracticeController::class, 'store'])->name('practices.store');
   //編集一覧へのroute
    Route::get('/practices/{practice}/edit', [PracticeController::class, 'edit'])->name('practices.edit');


    //更新処理へのroute
    Route::put('/practices/{practice}', [PracticeController::class, 'update'])
        ->name('practices.update');
    //削除処理へのroute
    Route::delete('/practices/{practice}', [PracticeController::class, 'destroy'])
        ->name('practices.destroy');
    //ステータス管理へのroute
    ROute::patch('/practices/{practice}/toggle',[PracticeController::class,'toggle'])->name('practices.toggle');


















    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
