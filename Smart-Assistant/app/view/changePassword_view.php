<?php
//session_start();
$id=$_SESSION['id'];
//$password=$_SESSION['password'];
$newpassword=$_POST['newpassword'];
$confirmpassword=$_POST['confirmpassword'];

include "databaseFile.php";
$sql="update miniprojectusers set password= \"$newpassword\"  where id=\"$id\" ";
?>
<html>
<head>
    <title>Html Form | Edit</title>
</head>
<body>
<form method="post" action="changepassword.php.php">
    <table border="0" cellspacing="0" align="center" cellpadding="5">
        <tr>
            <td>
                <fieldset>
                    <legend><b>change password </b></legend>
                    password:
                    <input type="password" name="password" value="" > <br>
                    new password:
                    <input type="password" name="newpassword" value=""><br>
                    confirm password:

                    <input type="password" name="confirmpassword" value=""><br>
                    <br><input type="submit"  >

                </fieldset>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
