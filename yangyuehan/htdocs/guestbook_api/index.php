<?php
require __DIR__ . '/../../crossboot.php';
Cross\Core\Delegate::loadApp('guestbook', array(
    'sys' => array(
        'display' => 'JSON'
    )
))->run();