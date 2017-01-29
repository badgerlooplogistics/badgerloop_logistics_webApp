<?php

include 'vendor/autoload.php';

use ThreadMeUp\Slack\Client;

$config = [
    'token' => 'xoxp-133915446628-133979134660-134594356134-c84c3082ca7bf5b57002153dec760a41',
    'team' => 'new',
    'username' => 'gwozdz',
    'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
    'parse' => '', // __construct function in Client.php calls for the parse parameter 
];

$slack = new Client($config);

?>