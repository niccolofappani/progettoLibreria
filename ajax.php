<?php
    ob_start();

    $action = $_GET['action'];
    include 'admin_class.php';
    $crud = new Action();

    if($action == 'signup'){
        $save = $crud->signup();
        if($save)
            echo $save;
    }
?>