<?php

function activeMenu($routeNames = []){
	$currentName = request()->route()->getName();
	$active = '';
	if (in_array($currentName,$routeNames)){
		$active = 'active';
	}
	return $active;
}
function showMenu($routeNames = []){
	$currentName = request()->route()->getName();
	$active = '';
	if (in_array($currentName,$routeNames)){
		$active = 'show';
	}
	return $active;
}


