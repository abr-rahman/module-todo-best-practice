<?php

use Illuminate\Support\Facades\Route;
use Modules\Bachelor\Http\Controllers\BachelorController;

Route::get('/', function () {
    return view('welcome');
});
