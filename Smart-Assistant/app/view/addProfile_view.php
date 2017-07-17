<?php
	//session_start();
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
		
		
	}
	else{
        header("location:".ROOT);
	}
?>
<?php	
		$servername = '127.0.0.1:3306';
		$username = 'root';
		$password = '';
		$dbname = 'miniProjectDB';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		
		$sql = "SELECT MAX( profileid ) FROM profileinfo";

		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$pid=$row[0];
		}
		$pid++;

$nameval="";
$emailval="";
$phoneval="";
		$name=NULL;
		$phone =NULL;		
		$email =NULL;
		$address=NULL;
		$company =NULL;
		
		//echo $pid;
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $phoneval;
		$name=$_POST['name'];
		$phone = $_POST['phone'];		
		$email = $_POST['email'];
		$address =$_POST['address'];
		$company =$_POST['companyname'];
		

			//name validation
		if(empty($name))
				{
					$nameErr[]='name requiered';
				}
			else if(ctype_alpha($name))
				{
					//echo("<strong> NAME:  </strong> $name <br>"); 
					$nameval=true;
				}
			else 
				{$nameErr[]="$name is not a valid name<br>";}
			// email validation
		if(empty($email))
			{
				$emailErr[]='Email requiered';
			}
			else
				{
					if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
						{

						  //echo("<strong> EMAIL:  </strong>$email <br>");
						   $emailval=true;
						} 
					else 
						{$emailErr[]="$email is not a valid email address <br>";}
				}
				
		
			if(empty($phone))
				{
					$phoneErr[]='phone Number requiered';
				}
			else if(is_numeric($phone))
			{
				$p=strlen($phone);
				echo $p;
				if(($p==11) or ($p==12) or ($p==13))
				{
					global $phoneval;
					$phoneval=true;
				}
				else
				{
					$phoneErr[]="$phone is invalid digit<br>";
				}
			}
			else 
				{$phoneErr[]="$phone is not a Number<br>";}
			
		if(($nameval==true) and ($emailval== true) and ($phoneval== true))
		{
			$sql = "INSERT INTO profileinfo (profileid, name, phone, email, address,companyname,id) VALUES ($pid, '$name', '$phone', '$email', '$address' ,'$company','$id' )";	
			$result = mysqli_query($conn, $sql);
			//echo $sql;
		}
		
	}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add Profile Bar</title>
		<style>
			
			html {
				  min-width: 100%;
				  min-height: 100%;
				  background-position: top center;
				  background-color: 	#2F4F4F;
				}
		
			body {
					 background-color:lightblue;
					 font-family: arial;
					font-size: 30px;
				
				}
			div{
				
				align:center;
			}
			table {
					border-collapse: collapse;
					width: 60%;
				}

				th, td {
					padding: 8px;
					text-align: left;
					border-bottom: 1px solid #ddd;
				}
			#f{
					align:center;
					text-align:center;
					font-family: arial;
					font-size: 30px;
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
			
				input[type=button], input[type=submit], input[type=reset] {
						background-color: #4CAF50;
						border: none;
						color: white;
						padding: 16px 32px;
						text-decoration: none;
						margin: 4px 2px;
						cursor: pointer;
						float:right;
					}
		</style>
		
    </head>
    <body>
       
       <div class="body">
			
			<form method="post">
				 <table border="0" align="center">
					<tr>
						<td  colspan="2">
							<h2>Add Clint Profile </h2>
						</td>
						
					</tr>
					<tr>
						<td>
							User Id:
						</td>
						<td>
							<?php echo $id ?>
						</td>
					</tr>
					<tr>
						<td>
							Clint Id:
						</td>
						<td>
							<?php echo $pid ?>
						</td>
					</tr>
					<tr>
						<td>
							Name:
							
						</td>
						<td>
							<input  type='text' name="name" id="name" placeholder="name" value="<?=$name?>" />
						</td>
						<td>
							<font color="red">
							<?php 
								if(!empty($nameErr))
								{
									echo '<ul>';
									foreach($nameErr as $selected)
									{
										echo '<li>' ,$selected ,'</li>';
									}
									echo '</ul>';
								}
							
							?>
							</font>
						</td>
					</tr>
					<tr>
						<td>
							Phone No:
						</td>
						<td>
							<input  type='text' name="phone" placeholder="01XXX XXXXXX" value="<?=$phone?>" />
						</td>
						<td>
							<font color="red">
							<?php 
								if(!empty($phoneErr))
								{
									echo '<ul>';
									foreach($phoneErr as $selected)
									{
										echo '<li>' ,$selected ,'</li>';
									}
									echo '</ul>';
								}
							
							?>
							</font>
						</td>
					</tr>
					<tr>
						<td>
							Email Address:
						</td>
						<td>
							<input  type='text' name="email" placeholder="someone@gmail.com" value="<?=$email?>" />
						</td>
						<td>
							<font color="red">
							<?php 
								if(!empty($emailErr))
								{
									echo '<ul>';
									foreach($emailErr as $selected)
									{
										echo '<li>' ,$selected ,'</li>';
									}
									echo '</ul>';
								}
							?>
							</font>
						</td>
					</tr>
					<tr>
						<td>
							Address:
						</td>
						<td>
							<input  type='text' name="address" value="<?=$address?>" />
						</td>
					</tr>
					<tr>
						<td>
							Company Name:
							
						</td>
						<td>
							<input  type='text' name="companyname" value="<?=$company?>" />
						</td>
					</tr>
					<tr>
						<td>
							<input  type='submit' value="submit" />
						</td>
						<td>
							<!-- <button onclick="myFunction()">Click me</button> !-->
						</td>
					</tr>
					
					
				</table>
		</form>
		</div>
		<div id="f">
			 <a  href='?view_profile'>GoTo Profile</a>
			</div>
		<script>
		/*
			function myFunction() {
				document.getElementById("name").innerHTML = " ";
			}*/
		</script>
		
    </body>
</html>
