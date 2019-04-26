<?php
// define('HOST', 'us-cdbr-iron-east-02.cleardb.net');
// define('USERNAME', 'ba07102de1c7b8');
// define('PASSWORD', '146e0a90');
// define('DATABASE', 'heroku_9dff4fdd67b6a03');

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'bola');

require_once 'controller/BaseController.php';
require_once 'controller/LeagueController.php';
require_once 'controller/TeamController.php';
require_once 'controller/PlayerController.php';

require_once 'Database.php';
require_once 'entity/League.php';
require_once 'entity/Team.php';
require_once 'entity/Player.php';
