<?php

// ONLY FOR OPTIONS: LOGIN, ACCESS_TOKEN, HASHTAG:
// IF CACHE FILE EXIST, DELETE IT OR WAIT "CACHE EXPIRATION TIME" TO APPLY CHANGES! 

$CONFIG = array(

	// Instagram login
	'LOGIN' => 'vladimrescuer',

	// ACCESS TOKEN granted to you by some Instagram app.
	// Follow this link: http://inwidget.ru/getAccessToken.php
	// to get your own ACCESS TOKEN by inWidget app.
	'ACCESS_TOKEN' => '3271445207.47ae58f.f9e9e7c1ecaa442fa8a178f99df30d71',

	// Get pictures from WORLDWIDE by tag name. 
	// Use this options only if you want show pictures of other users. 
	// Profile avatar and statistic will be hidden.
	'HASHTAG' => '',

	// Random order of pictures [ true / false ]
	'imgRandom' => true,

	// How many pictures widget will get from Instagram?
	'imgCount' => 30,

	// Cache expiration time (hours)
	'cacheExpiration' => 6,

	// Default language [ ru / en ] or something else from lang directory.
	'langDefault' => 'ru',

	// Language auto-detection [ true / false ]
	// This option may no effect if you set language by $_GET variable
	'langAuto' => false,

);