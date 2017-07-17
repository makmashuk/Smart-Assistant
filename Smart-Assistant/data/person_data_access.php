<?php
require_once(APP_ROOT."/lib/data_access_helper.php");
function deletePersonFromDB($data){
    extract($data);
    $sql="DELETE FROM profileinfo WHERE profileid=\"$profileid\" AND id=\"$id\" ";
    return executeQuery($sql);

}
function modifyPersonFromDB($data){
    extract($data);
    echo $sql = "UPDATE `reminder` SET `date`=\"$date\", `eventname`=\"$eventName\", `at`=\"$at\", `location`=\"$location\", `with`=\"$with\", `shortnote`=\"$note\" where id=\"$id\" AND AT =\"$prevAt\" and DATE =\"$prevDate\"";
    return executeQuery($sql);

}
function InsertPersonToDB($data){
    extract($data);
    echo $sql = "INSERT INTO `reminder`(`date`, `eventname`, `at`, `location`, `with`, `shortnote`, `id`,`comment`) VALUES (\"$date\",\"$eventName\",\"$at\",\"$location\",\"$with\",\"$note\",\"$id\",\"\" )";
    return executeQuery($sql);

}