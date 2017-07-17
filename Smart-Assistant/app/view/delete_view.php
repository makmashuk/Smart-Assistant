<?php
    session_start();
    $id=$_SESSION['id'];

    include 'databaseFile.php';
    global $connection;
    $state=$_GET['state'];

if($state=="event"){
    include_once (APP_ROOT."/core/event_service.php");
    $at=$_GET['at'];
    $date=$_GET['date'];
    $data=compact('at','date','id');
    deleteEvent($data);
    header("location:".ROOT."?view_home");
}
elseif ($state=="profile"){
    include_once (APP_ROOT."/core/person_service.php");
    $profileid=$_GET['profileid'];
    if(deletePerson(compact('id','profileid'))){
        header("location:".ROOT."?profile_showProfiles");
    }

}
elseif ($state=="contact"){
    include_once (APP_ROOT."/core/person_service.php");
    $profileid=$_GET['profileid'];
    if(deletePerson(compact('id','profileid'))){
        header("location:".ROOT."?profile_contact");
    }
}

/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (array_key_exists('delete', $_POST)) {
        $id = $_POST['delete'];

        if (deleteTree($id)) {
            echo '<script language="javascript">
            alert("Status Changed!");
            window.location = "'.ROOT.'/?tree_aadded";
            </script>';
        }
    } elseif (array_key_exists('pending', $_POST)) {
        $pending = $_POST['pending'];

        if (changeTreeStatus($pending)) {
            echo '<script language="javascript">
            alert("Status Changed!");
            window.location = "'.ROOT.'/?tree_added";
            </script>';
        }
    }
}*/

?>


