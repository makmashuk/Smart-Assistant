<?php
if (!isset($isDispatchedByFrontController)) {
    include_once("../error.php");
    die;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once(APP_ROOT."/core/person_service.php");
include_once(APP_ROOT."/core/event_service.php");

$login = false;

switch ($view) {
    case "login":
        include_once (APP_ROOT."/app/view/login_view.php");
        break;

    case "home":
        include_once(APP_ROOT."/app/view/home_view.php");
        break;

    case 'register':
        //$treeList = searchTree($key);  ********$view****
        include_once (APP_ROOT.'/app/view/registration_view.php');
        break;

    case 'logout':
        //$treeList = searchTree($key);  ********$view****
        include_once (APP_ROOT.'/app/view/logout_view.php');
        break;

    case 'profile':
        $temp='Reviews';
        //$treeList = searchTree($key);  ********$view****
        include_once (APP_ROOT.'/app/view/profile_view.php');
        break;

    case 'cal':
        //$treeList = getAllTree(); //Getting the model for view
        include_once (APP_ROOT.'/app/view/cal_view.php');
        break;


    case 'record':
        //$treeList = getAllTree(); //Getting the model for view
        include_once (APP_ROOT.'/app/view/record_view.php');
        break;
    case 'delete':
        //$treeList = getAllTree(); //Getting the model for view
        include_once (APP_ROOT.'/app/view/delete_view.php');
        break;

    case 'edit':
        //$treeList = getAllTree(); //Getting the model for view
        include_once (APP_ROOT.'/app/view/edit_view.php');
        break;
    case 'update':
        //$treeList = getAllTree(); //Getting the model for view
        include_once (APP_ROOT.'/app/view/product_update_view.php');
        break;

    default:
        echo "view_controller" ;
        //include_once(APP_ROOT."/app/error.php");
}