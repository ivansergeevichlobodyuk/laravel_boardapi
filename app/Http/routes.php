<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/boards', 'Board@getBoardList');
Route::get('/api/boards/{board}', 'Board@getBoardItem');
Route::post('/api/boards/', 'Board@addBoardItem');

Route::get('/api/tasks', 'Task@getBoardList');
Route::get('/api/tasks/{task}', 'Task@getBoardItem');
Route::patch('/api/tasks/{task}', 'Task@updateBoardItem');
Route::post('/api/tasks/', 'Task@saveBoardItem');