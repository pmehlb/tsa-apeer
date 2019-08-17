<?php

// return the <head> tag info
function get_head($title) {
	return '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/><title>' . $title . '</title><link rel="shortcut icon" href="" type=""><link href="//fonts.googleapis.com/css?family=Roboto+Mono:400,500|Roboto:400,500" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"><link rel="stylesheet" href="assets/css/styles.css?' . rand() .  '" type="text/css">';
}

// return version number
function get_version() {
	return '1.0';
}