<?php
spl_autoload_register(function($class){
    require("./$class.php");
});
require_once __DIR__ . "/lib/MysqliDb.php";

$confs = (require_once __DIR__ . "/config/config.php");
$db = new MySqliDb($confs["usr_host"],$confs["usr_username"],$confs["usr_password"],$confs["database_name"]);

$model = new app\modules\UserModel($db);
$controller = new app\controllers\UserController($model);

$controller->login();

$urlsuffexes = explode('/',$_SERVER["REQUEST_URI"]);
define("BASE_PATH","/mvc/");

switch ($_SERVER["REQUEST_URI"]) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . "add":
        $controller->addUser();
        break;
    case BASE_PATH . "update":
        $controller->updateUser();
        break;
    case BASE_PATH . "delete/" . $urlsuffexes[3]:
        $controller->deleteUser($urlsuffexes[3]);
        break;
    case BASE_PATH . "user/" . $urlsuffexes[3]:
        $controller->getUser($urlsuffexes[3]);
        break;
    default:
        $controller->logout();
}
//am just trying to edit and repush