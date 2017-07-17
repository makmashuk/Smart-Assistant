<?php
require_once (APP_ROOT."/data/person_data_access.php");
function deletePerson($data){
    return deletePersonFromDB($data);
}
function modifyPerson($data){
    return modifyPersonFromDB($data);
}
function InsertPerson($data){
    return InsertPersonToDB($data);
}