<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('nig', function ($bot) {
    $bot->reply('fag!');
});

$botman->hears('lol', BotManController::class.'@startConversation');
