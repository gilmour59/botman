<?php
use App\Http\Controllers\BotManController;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;

$botman = resolve('botman');

$botman->hears('GET_STARTED', function ($bot) {
	$bot->reply(GenericTemplate::create()
        ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
        ->addElements([
            Element::create('BotMan Documentation')
                ->subtitle('All about BotMan')
                ->image('http://botman.io/img/botman-body.png')
                ->addButton(ElementButton::create('visit')
                    ->url('http://botman.io')
                )
                ->addButton(ElementButton::create('tell me more')
                    ->payload('tellmemore')
                    ->type('postback')
                ),
            Element::create('BotMan Laravel Starter')
                ->subtitle('This is the best way to start with Laravel and BotMan')
                ->image('http://botman.io/img/botman-body.png')
                ->addButton(ElementButton::create('visit')
                    ->url('https://github.com/mpociot/botman-laravel-starter')
                ),
        ])
    );
});

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('nig', function ($bot) {
    $bot->reply('fag!');
});

$botman->hears('lol', BotManController::class.'@startConversation');
