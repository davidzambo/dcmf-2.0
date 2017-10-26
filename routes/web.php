<?php

Route::get('/', 'HomeController@index');

Route::resource('login', 'LoginController', ['only' => ['store', 'destroy']]);

Route::resource('portfolio', 'PortfolioController');

Route::resource('service', 'ServiceController');

Route::resource('skill', 'SkillsController');

// Route::resource('skills','SkillsController');
