<?php

require_once("constants.php");
require_once("helper/Helper.class.php");
require_once("classes/Database.class.php");
require_once("classes/User.class.php");
require_once("classes/Exchange.class.php");
require_once("classes/Asset.class.php");


spl_autoload_register(function ($class_name){
    include BASEURL."classes/".$class_name.'.class.php';
});

?>