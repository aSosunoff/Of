<?php

return array(
    //Home
    '^$' => 'home/index',
    //Contact
    //'^Contact$' => 'Contact/Send',
    //'^Contact/Send$' => 'Contact/Send',
    //'^Contact/Send/name=(.+)&email=(.+)' => 'Contact/Send/$1&$2',
    '^Contact/name=(.*)&email=(.*)&phone=([0-9]*)&message=(.*)$' => 'Contact/Send/$1&$2&$3&$4',
    //Error
    '^.+$' => 'Error/Er_404'
    //Account
    //'^account$' => 'account/index',
    //News
    //'^news\/id=([0-9]+)$' => 'news/item/$1',
    //'^news$' => 'news/index'
);