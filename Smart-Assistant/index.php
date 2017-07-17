<?php
/**
 * Created by PhpStorm.
 * User: Khan, Md.Mohiuddin
 * Date: 11-01-2017
 * Time: PM 9.45
 */
    define('ds',DIRECTORY_SEPARATOR);
	define('APP_ROOT', "$_SERVER[DOCUMENT_ROOT]/Smart-Assistant"); // define gula immediate pore page prjnto pabe
	//echo APP_ROOT ."<br>";
    define('PROTOCOL', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
    $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
    define('ROOT', PROTOCOL.$_SERVER['SERVER_NAME'].'/Smart-Assistant');
    //echo ROOT;
	$hasError=true;
    if (count($_GET) == 0) {
        $view = "login";
        $hasError = false;
        $isDispatchedByFrontController=true;
        include_once(APP_ROOT."/app/controller/view_controller.php");
    }
	if(count($_GET)>0){
        $key = array_keys($_GET)[0]; //ex: person_add
        //echo $key ."<br>";
        $path = explode("_", $key);
        if(count($path)==2){
            $hasError = false;

            $controller = $path[0]; //ex: person
            $view = $path[1]; //ex: add

            $isDispatchedByFrontController=true;
            include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
        }
    }
    if ($hasError) {
	    echo "index-error";
        //include_once(APP_ROOT."/app/error.php");
    }
?>