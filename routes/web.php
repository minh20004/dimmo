<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

Route::get('/', [MasterController::class, 'client'])->name('client');

