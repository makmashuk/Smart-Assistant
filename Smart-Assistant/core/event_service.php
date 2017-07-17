<?php
require_once (APP_ROOT."/data/event_data_access.php");
function deleteEvent($data){
    return deleteEventFromDB($data);
}
function modifyEvent($data){
    return modifyEventFromDB($data);
}
function InsertEvent($data){
    return InsertEventToDB($data);
}