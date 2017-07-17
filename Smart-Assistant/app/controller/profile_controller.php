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
    case "addProfile":
        include_once (APP_ROOT."/app/view/addProfile_view.php");
        break;

    case "showProfiles":
        include_once(APP_ROOT."/app/view/showProfiles_view.php");
        break;

    case "changePassword":
        include_once(APP_ROOT."/app/view/changePassword_view.php");
        break;

    case "editProfile":
        include_once(APP_ROOT."/app/view/editProfile_view.php");
        break;

    case "contact":
        include_once(APP_ROOT."/app/view/contact_view.php");
        break;

    default:
        echo "view_controller" ;
    //include_once(APP_ROOT."/app/error.php");
}