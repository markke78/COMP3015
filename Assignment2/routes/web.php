<?php

use core\Router;

use src\Controllers\ArticleController;
use src\Controllers\LoginController;
use src\Controllers\LogoutController;
use src\Controllers\RegistrationController;
use src\Controllers\SettingsController;

Router::get('/', [ArticleController::class, 'renderIndexPage']); // the root/index page

Router::get('/about', [ArticleController::class, 'about']);

// User/Auth related

Router::get('/login', [LoginController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);

Router::get('/register', [RegistrationController::class, 'index']); // show registration form.
Router::post('/register', [RegistrationController::class, 'register']); // process a registration req.

Router::post('/logout', [LogoutController::class, 'logout']);

Router::post('/upload_image', [SettingsController::class, 'uploadImage']);

// Article related

// TODO: set up routes for all the article and settings functions
Router::get('/articles/create', [ArticleController::class, 'create']);

Router::post('/articles/store', [ArticleController::class, 'store']);

Router::get('/articles/edit', [ArticleController::class, 'edit']);

Router::post('/articles/update', [ArticleController::class, 'update']);

Router::post('/articles/delete', [ArticleController::class, 'delete']);

Router::get('/settings', [SettingsController::class, 'index']);

Router::post('/settings', [SettingsController::class, 'update']);

