<?php

Route::get('/', 'HomeController@index');

Route::resource('login', 'LoginController', ['only' => ['store', 'destroy']]);

Route::resource('portfolio', 'PortfolioController');

// Route::resource('skills','SkillsController');
