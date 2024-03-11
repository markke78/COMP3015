<?php

function image(string $filename): string {
	return "/images/$filename";
}

function authenticated(): bool {
	return isset($_SESSION['authenticated']);
}

function encodeString(string $text){
	$new = htmlspecialchars($text, ENT_QUOTES);
	return $new;
}


