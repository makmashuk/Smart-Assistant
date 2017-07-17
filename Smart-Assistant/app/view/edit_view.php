<?php
session_start();
$id=$_SESSION['id'];
include 'databaseFile.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    global $connection;
    $name=$_POST["name"];
    $email=$_POST["email"];
    $profileid=$_GET['profileid'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $companyName=$_POST['companyName'];
    $sql="update profileinfo set name=\"$name\", email=\"$email\" , phone=\"$phone\" , address=\"$address\" , companyname=\"$companyName\" where id=\"$id\" and profileid=\"$profileid\"";
    //echo  $sql;
    mysqli_query($connection,$sql);
    header("location:showProfile.php");
}else{
    global $connection;
    $state=$_GET['state'];
    $profileid=$_GET['profileid'];
    $sql="SELECT name,phone,email,address,companyname FROM profileinfo where id=\"$id\" and profileid=\"$profileid\" ";
//ECHO $sql;
    $arr=mysqli_query($connection,$sql);
    $obj=mysqli_fetch_array($arr);
//var_dump(mysqli_query($connection,$sql));
    $name=$obj['name'];

    $phone=$obj['phone'];
    $email=$obj['email'];
    $address=$obj['address'];
    $companyName=$obj['companyname'];
//var_dump($obj);

}
?>

<html>
<head>
    <title>Html Form | Edit</title>
</head>
<body>
    <form method="post" action="?view_edit&profileid=<?=$profileid?> ">
        <table border="0" cellspacing="0" align="center" cellpadding="5">
            <tr>
                <td>
                    <fieldset>
                        <legend><b>EDIT </b></legend>
                        name:
                        <input type="text" name="name" value="<?=$name?>" > <br>
                        email:
                        <input type="text" name="email" value="<?=$email?>"><br>
                        phone:
                        <input type="text" name="phone" value="<?=$phone?>"><br>
                        Address:
                        <input type="text" name="address" value="<?=$address?>"><br>
                        company name:
                        <input type="text" name="companyName" value="<?=$companyName?>"><br>
                        <br><input type="submit"  >

                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>