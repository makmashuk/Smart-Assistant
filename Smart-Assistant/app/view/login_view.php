<?php
if (!isset($isDispatchedByFrontController)) {
    include_once("../error.php");
    die;
}
    require_once (APP_ROOT."/lib/data_access_helper.php");



if (isset($_COOKIE['loggedInUser'])) {
    $cookie=$_COOKIE['loggedInUser'];

    $sql="select * from miniprojectusers where id=\"$cookie\" ";

    if($result=executeQuery($sql)){
        $row=mysqli_fetch_array($result);
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["userType"] = $row['type'];
        header("location: ".ROOT."?view_home");
    }

}
else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id=$_POST['userid'];
    $password=$_POST['password'];
        $sql = "SELECT * FROM miniprojectusers WHERE id=\"$id\" AND password =\"$password\"";
        if ($row = mysqli_fetch_array($result = executeQuery($sql))) {
            session_destroy();
            session_start();
            $_SESSION["id"] = $row['id'];
			 $_SESSION["name"] = $row['name'];
            $_SESSION["password"] = $row['password'];
			
            $_SESSION["email"] = $row['email'];
            $_SESSION["userType"] = $row['type'];
			$_SESSION["address"] = $row['address'];
			 $_SESSION["gender"] = $row['gender'];
            if($_POST['remember']=='rememberme'){
                setcookie("loggedInUser",$_SESSION["id"],time()+((86400/24)/60));// 1mint
            }

            //$url = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : 'tree_search';
            //header('Location: '.ROOT.'/?'.$url);
            header("location: ".ROOT."?view_home");
        } else {
            $incorrect = "username or password is incorrect.<br>";
        }

}
?>
    <html>
    <head>
        <title>Html Form | Login</title>
        <style>

            html {
                min-width: 100%;
                min-height: 100%;
                background-position: top center;
                background-color: lightblue;
            }

			#left{
			margin:auto;
			margin-right:400px;
			margin-top:100px;
			float:right;
			width:auto;
			background:#00FF7F;
			height:70%;
			border:2px solid black;
		}
	
      table {
					border-collapse: collapse;
					width: auto;
					margin:0 auto;
					background-color: 	#CD853F;
					
					
					
				}

				th, td {
					padding: 10px;
					text-align: center;
					border: 0px solid #ddd;
					font-family: arial;
					font-size: 20px;
				}
		img {
			max-width: 100%;
			height: 70%;
			display: block;
			margin: auto;
			
		}


        </style>
		<style>
				.container {
				  position: relative;
				  width: auto%;
				  height:auto;
				}

				.image {
				  display: block;
				  
				}

				.overlay {
				  position: absolute;
				  bottom: 100%;
				  left: 0;
				  right: 0;
				  overflow: hidden;
				  width: 100%;
				  height:80%;
				  transition: .5s ease;
				}

				.container:hover .overlay {
				  bottom: 0;
				  height: 100%;
				}
				.a:hover{
					background-color: #555;
					color: white;
					
				}
				
				input[type=text] {
					padding: 0;
					height: 30px;
					position: relative;
					left: 0;
					outline: none;
					border: 1px solid #cdcdcd;
					border-color: rgba(0,0,0,.15);
					background-color: white;
					font-size: 16px;
				}
				input[type=password] {
					padding: 0;
					height: 30px;
					position: relative;
					left: 0;
					outline: none;
					border: 1px solid #cdcdcd;
					border-color: rgba(0,0,0,.15);
					background-color: white;
					font-size: 16px;
				}
				input[type=button], input[type=submit], input[type=reset] {
						background-color: #4CAF50;
						border: none;
						color: white;
						padding: 16px 32px;
						text-decoration: none;
						margin: 4px 2px;
						cursor: pointer;
					}
				
</style>
    </head>
    <body>
	<div id="left">
		
		<h2>Welcome to Virtual Office Assistant</h2>

		<div class="container">
		  <img src="oa.jpg" alt="Virtual Office Assistance" class="image">
		  <div class="overlay">
		  
		<div id="login">
		<form method="post" id="loginForm" onsubmit=" return valid()">
        <table>
			<tr>      
                <td colspan="2">
				Login Panel
                </td>
			</tr>
            <tr>
                <td>
                   User Id
                </td>
				<td>
                    <input id="userID" type="text" name="userid" value="" required onkeyup="validId()"><span
                            id="errorID"> </span><br>
				</td>
            </tr>
			<tr>
                <td>
                    Password
                </td>
				<td>
                    <input id="password" type="password" name="password" value="" required><span
                            id="errorPass"> </span> <br><br>
				</td>
            </tr>
			<tr>      
                <td colspan="2">
				<input id="checkbox" type="checkbox" name="remember" value="rememberme">Remember Me(1 min)
                </td>
			</tr>
			<tr>      
                <td class="a">
				 <input type="submit" name="login" value="Login"> 
                </td>
				<td class="a">
					<input type="button" value="Register" onclick="location.href='?view_register';"></a>
				</td>
			</tr>
                        
                       
        </table>
    </form>
	
	</div>
			
		  </div>
		</div>
	
	</div>
	
    
    <script>
        function validId() {
            var errorId = document.getElementById("errorID");
            var userId = document.getElementById("userID");
            errorId.innerHTML = "";
            if (userId.value == "") {
                errorId.innerHTML = "*ID required";
                return false;
            } else {
                if (userId.value.trim().split("-").length == 3 ) {
                    //errorId.innerHTML="ok";
                    return true;
                } else {
                    errorId.innerHTML = "*invalid id";
                    return false
                }
            }


        }
        function validPassword() {
            var errorPass = document.getElementById("errorPass");
            var password = document.getElementById("password");
            errorPass.innerHTML = "";
            if (password.value == "") {
                errorPass.innerHTML = "*password required";
                return false;
            }
            else {
                return true;
            }


        }
        function valid() {
            if (validId() && validPassword()) {
                return true;
            } else {
                return false;
            }

        }
    </script>
    </body>
    </html>



