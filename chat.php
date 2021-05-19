<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;

require_once __DIR__ . '/vendor/autoload.php';

$config = [];

DriverManager::loadDriver(WebDriver::class);

$botman = BotManFactory::create($config);

$botman->hears('Hello',function(BotMan $bot){
    $bot->reply("Hello too");
});
$botman->hears('what is the time',function(BotMan $bot){
    $bot->reply('Time is ' . date('h:i:s a',time()));
});

$botman->fallback(function($bot){
    $bot->reply('Sorry, I did not understand these commands.');
});

$botman->listen();