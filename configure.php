<?php

include 'vendor/autoload.php';

use ThreadMeUp\Slack\Client;

$config = [
    'token' => 'xoxp-133915446628-133979134660-133980674036-b066a8fdbd397e915ae15f5009a266f5',
    'team' => 'new',
    'username' => 'gwozdz',
    'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
    'parse' => '', // __construct function in Client.php calls for the parse parameter 
];

$slack = new Client($config);

?>