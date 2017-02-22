<?php

require_once("../database.php");

$id = $_POST['id'];

$cmd = "curl -X POST --data-urlencode 'payload'={"'channel": "@kkfisher3", "username": "webhookbot", "text": "This is posted to #purchasing and comes from a bot named webhookbot.", "icon_emoji": ":ghost:"}' 'https://hooks.slack.com/services/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"';
exec($cmd,$result);

$query = "UPDATE financial_package SET status = 1 WHERE id = ".$id;
mysqli_query($conn, $query);
?>