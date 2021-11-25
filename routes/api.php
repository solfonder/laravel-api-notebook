<?php

use App\Http\Controllers\Api\NotebookApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/notebook', NotebookApiController::class);

