<?php
$id=$name=$email=$errorId=$errorName=$errorEmail=$errorPassword="";
$password="";
$typee="";
$address="";
function validId(){
    global $id,$errorId;
    if(isset($_POST['userid'])){
        $id=$_POST['userid'];
        if(count(explode("-",$id))!=3){//$userinfo[explode('->', $user[$j])[0]] = explode('->', $user[$j])[1];
            $errorId="invalid ID format";
            return false;
        }else{
            return true;
        }
    }else{
        $errorId="ID required";
        return false;
    }
}
function validPhoto(){
    $name=$_FILES['propic']['name'];// of the pic in dir

    $tmp_name=$_FILES['propic']['tmp_name'];//temp name of the being uploaded

    if(isset($name)){
        if(!empty($name)){
            $location= 'uploads/';
            if(move_uploaded_file($tmp_name, $location.$_POST['userid'].".jpg")){
                //echo "uploaded";
                return true;
                /*
                    if($opendir=opendir($location)){
                        while($pic=readdir($opendir)){
                            if($pic==$_FILES['propic']['name']){
                                echo " <img src='$location/$pic' width='200'>";
                            }
                        }
                    }else{
                        echo "cannot open dir";
                    }
                */
            }else{
                echo 'something was wrong in file uploading';
            }

        }else{
            echo "choose a pic";
        }
    }else{
        echo "choose a propic";
    }
}
function validName(){
    global $name,$errorName;
    if(isset($_POST["name"])){
        $name=$_POST["name"];
        if(count(explode(" ",$name))>=2){
            return true;
        }else{
            $errorName= "must be two word";
            return false;
        }
    }else{
        $errorName=  "fill the name field";
        return false;
    }
}
function validEmail(){
    global $email,$errorEmail;
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail= "Invalid email format";
        return false;
    }else{
        return true;
    }
}
function validPassword(){
    global $errorPassword,$password;
    if(isset($_POST["password"]) && isset($_POST["confirmapassword"])){
        $password= $_POST["password"];
        if(!empty($password)){
            if($_POST["password"]==$_POST["confirmapassword"]){
                return true;
            }else{
                $errorPassword="password doesnt match";
                return false;
            }
        }else{
            $errorPassword="fill password";
            return false;
        }


    }else{
        $errorPassword="password required";
    }
}

if($_SERVER['REQUEST_METHOD']=="POST") {
    if (validId() && validPassword() && validName() && validEmail() && validPhoto()) {
        $id = $_POST['userid'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $type = $_POST['type'];
        $gender= $_POST['gender'];
        include "databaseFile.php";
        global $connection;
        if ($connection) {
            $sql = "INSERT INTO `miniprojectusers`(`id`, `name`, `password`, `email`, `type`, `address`, `gender`,note) VALUES (\"$id\",\"$name\",\"$password\",\" $email \",\"$type\",\"$address\",\"$gender\",\"\" )";
            if(mysqli_query($connection,$sql)){
                echo "successfully registered";
            }
        }
    }else{
        echo "something is wrong";
    }
}
?>

<html>
<head>
    <title>Html Form | Registration</title>
	
	<style>
			
			html {
				  min-width: 100%;
				  min-height: 100%;
				  background-position: top center;
				    background-color: 	#2F4F4F;
				}
		
			body {
					
					 height:100%;
					width: 100%;
					background: lightblue;	   
				
				}
			 table {
					border-collapse: collapse;
					width: auto;
					margin:0 auto;
					
					
					
				}

				th, td {
					padding: 10px;
					text-align: center;
					border: 1px solid #ddd;
					font-family: arial;
					font-size: 20px;
				}

		</style>
	
</head>
<body>
<form method="post" action="registration.php" enctype="multipart/form-data">
    <table border="0" cellspacing="0" align="center" cellpadding="5">
       
			<tr>      
                <td colspan="2">
				Registration Panel
                </td>
			</tr>
			 <tr>
                <td>
                   User Id
                </td>
				<td>
                    <input id="userID" type="text" name="userid" value="" placeholder="xx-xxxxx-x" required onkeyup="validId()"><span
                            id="errorID"> </span><br>
				</td>
            </tr>
			<tr>      
                <td >
				Password
                </td>
				<td>
				<input type="password" name="password" > <?=$errorPassword?><br>
				</td>
				 <td >
				 Confirm Password
                </td>
				<td>
				 <input type="password" name="confirmapassword"  ><br>
				</td>
			</tr>
			<tr>      
                 <td >
				 Name
                </td>
				<td>
					 <input type="text" name="name" value="<?=$name?>"> <?=$errorName?>
				</td>
			</tr>
            <tr>
                <td >
                    email
                </td>
                <td>
                    <input type="text" name="email" value="<?=$email?>"> <?=$errorEmail?>
                </td>
            </tr>
			<tr>      
                 <td >
				 Address
                </td>
				<td>
					 <input type="text" name="address" value="<?=$address?>"> 
				</td>
			</tr>
			<td>
				Gender
			</td>
			<td>
					<input type="radio" name="gender" value='Male' > Male </br>
					<input type="radio" name="gender" value='Female'> Female </br>
					<input type="radio" name="gender" value="other"> Other
				
			</td>
			
			<tr>      
                 <td >
				 User Type <i>[User/Admin]</i><br>
                </td>
				<td>
				 <select name="type">
                        <option name="type" value="user">User</option>
                        <option name="type" value="Admin">Admin</option>
                  </select>
				</td>
			</tr>
            <tr >
                <td colspan="2">
                    <input type="file" name="propic" id="fileToUpload">
                </td>

            </tr>
			<tr>      
                 <td >
				 <input type="submit" name="Register" value="Register">
                </td>
				<td>
					 <a href="?view_login">Login</a>
				</td>
			</tr>
			<tr>
			
		</tr>	
		
    </table>
</form>
</body>
</html>