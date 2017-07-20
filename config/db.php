<?php

return (file_exists('./local_db.php'))
    ? require('./local_db.php')
    : [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=balance',
        'username' => 'root',
        'password' => 'jytjaptv222',
        'charset' => 'utf8',
    ];
