<?php
// Si tu profesor te da su propio userList.inc.php, usa el suyo.
require_once __DIR__ . '/User.inc.php';

$users = [
    new User('ada', 'ada@mail.com', '1234'),
    new User('linus', 'linus@mail.com', 'abcd'),
    new User('grace', 'grace@mail.com', 'cobol'),
];
