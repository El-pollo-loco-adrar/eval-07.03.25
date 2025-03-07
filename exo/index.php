<?php
//CONTROLER DE LA PAGE D'ACCUEIL

include "./utils/utils.php";
include "./model/model_player.php";
include "./manager/manager_player.php";
include "./view/view_home.php";
include "./view/header.php";
include "./view/footer.php";


$viewHome = new ViewHome();
echo $viewHome->displayView();

$controller = new ManagerPlayer();

if(isset($_POST['addPlayer']))
 {
    echo $controller->addPlayer();
    exit;
 }


?>