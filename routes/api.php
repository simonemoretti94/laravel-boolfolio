<?php

use App\Http\Controllers\Api\ProjectController as ProjectApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects' , [ProjectApi::class , 'index']);
Route::get('projects/{id}' , [ProjectApi::class , 'show']);
