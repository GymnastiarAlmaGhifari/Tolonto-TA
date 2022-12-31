<?php

// Firebase Cloud Messaging Authorization Key
define('FCM_AUTH_KEY', 'AAAAEwaAliE:APA91bE_XBK7mxFqonChJvtlduIlU8A1g7QOD_L5oNIV0j8zi7xkP5iLY40K03ZeFMJ7x23miB_KEwxYNHDMmLhYQbYOvOzX-MVE0y56PEjt0K2kyuuYSowHjiasrvKGL2MPEQ1_BTQW');
$title = 'This is the title!';
$body = 'Tes notif woi';
$keyclient = 'cP2KpGBRSoi07xU0jdqysE:APA91bG4oixQS8CAqh2QlxlVre8T783WAnBSxKxawiKn6qVj5rH22DIgGoqnUDHXzzhczJHtyJnbtHA2fIgal6vaxYZV-geVfhnuxVfEczoTSiMBKUwHVNTw75ugL8XufVpIiUGIHn6_';

function sendPush($to, $title, $body, $icon, $url)
{
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'body' => $body,
                'icon' => $icon,
                'click_action' => $url
            ],
            'to' => $to
        ]
    );

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json' . "\r\n"
                . 'Authorization: key=' . FCM_AUTH_KEY . "\r\n",
            'content' => $postdata
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
    if ($result) {
        return json_decode($result);
    } else return false;
}

sendPush($keyclient, $title, $body, 'https://anysite.com/some_image.png', 'https://openthissiteonclick.com');
