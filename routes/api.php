<?php

use App\Http\Controllers\Api\ProjectController as ProjectApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController as LeadApi;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects' , [ProjectApi::class , 'index']);
Route::get('projects/{id}' , [ProjectApi::class , 'show']);

Route::post('contacts' , [LeadApi::class , 'store']);
