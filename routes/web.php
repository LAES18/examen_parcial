<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::resource('tareas', TareaController::class);
