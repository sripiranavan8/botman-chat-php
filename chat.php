<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;

require_once __DIR__ . '/vendor/autoload.php';

$config = [];

DriverManager::loadDriver(WebDriver::class);

$botman = BotManFactory::create($config);

$botman->hears('what is the time', function (BotMan $bot) {
    $bot->reply('Time is ' . date('h:i:s a', time()));
});
// All Data
$arr = [
    ['id' => 1, "query" => 'hi', 'reply' => "Hi Welcome 1"],
    ['id' => 2, "query" => 'hi', 'reply' => "Hi Welcome 2"],
    ['id' => 3, "query" => 'hi', 'reply' => "Hi Welcome 3"],
    ['id' => 4, "query" => 'hi', 'reply' => "Hi Welcome 4"],
    ['id' => 5, "query" => 'hi', 'reply' => "Hi Welcome 5"],
    ['id' => 6, "query" => 'test', 'reply' => "Test Msg"],
];

$botman->hears('{query}', function (BotMan $bot, $query) use ($arr) {
    // Check the query is exist in the data
    $key = array_search($query, array_column($arr, 'query'));
    if (false !== $key) {
        // If the record have more than one assing to $result variable
        $results = array_filter($arr, function ($row) use ($query) {
            if ($row['query'] === $query) {
                return true;
            } else {
                return false;
            }
        });
        $bot->reply($results[array_rand($results, 1)]['reply']);
    } else {
        $bot->reply('Sorry, we dont have the record for ' . $query);
    }
});

$botman->fallback(function ($bot) {
    $bot->reply('Sorry, I did not understand these commands.');
});

$botman->listen();
