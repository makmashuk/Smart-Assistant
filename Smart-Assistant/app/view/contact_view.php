
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id = $_SESSION['id'];
$note = "";
$today = date("y-m-d");
//define('APP_ROOT', "$_SERVER[DOCUMENT_ROOT]/myWorks/webtechfinalprojectwithmvc");
require_once (APP_ROOT."/lib/data_access_helper.php");

function getUserTable()
{
    global $state;
    global $id;

    $where = "where id=\"$id\" ";

    if (isset($_GET['q'])) {
        if($state=='search'){
            $where = "WHERE name LIKE '%" . $_GET['q'] ."%'  and id=\"$id\" ";
        }


    }

    echo "
            <table border= \"0px solid black\" bordercolor='black'  width='90%' align='center' cellspacing='5px'   border-bottom='1px'>
             <tr>
                 <th height=\"30\" colspan=\"4\">
                      Contacts Details
                 </th>
             </tr>
             
             <tr>
                <td height=\"20\" width=\"10%\">ID</td>
                <td height=\"20\" width=\"20%\">NAME</td>
                <td>PHONE</td>
                <td>Action</td>
				
                
                
             </tr>";

   
    $sql = "SELECT * FROM profileinfo $where ";
    $result = executeQuery($sql);
    while ($row = mysqli_fetch_array($result)) {
        //var_dump($row);
        echo "
                
                    <tr>
                        <td height='50'>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
  
						<td id='e'><a href='delete.php?state=contact&profileid=$row[0]'>Remove</a></td>
                        <!--<td id='e'><a href='edit.php?id=$row[0]'>Edit</a></td>
                        -->
                    </tr>
					
                ";
    }

    echo "
            
                <tr colspan='6'>
                         <th height=\"30\" colspan=\"8\">
                              <a href='home.php'>Go Homepage</a>
                         </th>
                    </tr>
            </table>
            </form>
            ";

}

$state = isset($_REQUEST["state"]) ? $_REQUEST["state"] : "";

switch ($state) {
    case "search":
        getUserTable();
        break;
 

    default:
        ?>
		<html>
		<head>
			<style>
			
			html {
				  min-width: 100%;
				  min-height: 100%;
				  background-position: top center;
				  background-color: #2F4F4F;
				}
			body{
				 background-color: 	#4682B4;
				 margin:auto;
				 border:3px solid black;
			}
			#header{
				
				font-family: arial;
				font-size: 30px;
				margin-left:350px;
				margin-top:50px;
				background-color:#F4A460;
				border:2px solid black;
				width:48%;
				
			}
			#tab{
				
				align:center;
				margin:0 auto; 
				width:60%;
				height:auto;
				 }
			#f{
					align:center;
					text-align:center;
					font-family: arial;
					font-size: 30px;
				}
			h1{
				text-align:center;
			}
			table {
					border-collapse: collapse;
					width: auto;
					margin:20px;
					background-color:#5F9EA0;
					
				}

				th, td {
					padding: 10px;
					text-align: center;
					border: 2px solid #ddd;
					font-family: arial;
					font-size: 20px;
					
				}
			#e{
					background-color: ;
					padding:5px;
					font-family: arial;
					font-size: 20px;
					width:250px;
			}
			#e:hover {
						background-color:#DC143C;
						color: #2F4F4F;
					}
			h3{
				align:center;
			}

		</style>
		</head>
		<div id="body">
		
			<div id="header">
			
			<h3> Contact List </h3>
			Search By Name: 
			<input id="search" type="text" name="search" onkeyup="search()">
			</div>
        <div id="tab">

            <?php
            getUserTable();
            ?>

        </div>


        
		</div>
		
        <script>
            function search() {
                var searchInput = document.getElementById('search');
                var req = new XMLHttpRequest();
                req.open("GET",window.location.href+"&state=search&q=" + searchInput.value, false);
                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        var displayDiv = document.getElementById('tab');
                        displayDiv.innerHTML = req.responseText;
                    }
                };
                req.send();
            }
          
			
        </script> 
		</html>
		
        <?php
        break;
}


