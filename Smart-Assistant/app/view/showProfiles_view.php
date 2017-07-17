
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
    global $id;
    global $state;

    $where = "where id=\"$id\" ";

    if (isset($_GET['q'])) {
        if($state=='search'){
            $where = "WHERE name LIKE '%" . $_GET['q'] . "%' and id=\"$id\" ";
        }else{
            $where = "WHERE companyname LIKE '%" . $_GET['q'] . "%' and id=\"$id\"  ";
        }


    }

    echo "
            <table border= \"0px solid black\" bordercolor='black'  width='80%' align='center' cellspacing='5px'   border-bottom='1px'>
             <tr colspan='6'>
                 <th height=\"30\" colspan=\"8\">
                      Users
                 </th>
             </tr>
             
             <tr>
                <td height=\"20\" width=\"10%\">profile ID</td>
                <td>NAME</td>
                <td>PHONE</td>
                <td>EMAIL</td>
                <td>ADDRESS</td>
                <td>COMPANY NAME</td>
				
                
                
             </tr>";

    $sql = "SELECT profileid,name,phone,email,address,companyname FROM profileinfo $where";
    if($result = executeQuery($sql)){
        while ($row = mysqli_fetch_array($result)) {
            //var_dump($row);
            echo "
                
                    <tr>
                        <td height='50'>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td >$row[5]</td>
						<td id='e'><a href='?view_delete&state=profile&profileid=$row[0]'>Remove</a></td>
                        <td id='e'><a href='?view_edit&state=profile&profileid=$row[0]'>Edit</a></td>

                    </tr>
					
                ";
        }
    }



    echo "
            
                <tr colspan='6'>
                         <th height=\"30\" colspan=\"8\">
                              <a href='?view_profile'>Go Profile</a>
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
    case "search2":
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
				  background-color: 	#2F4F4F;
				}
			#body{
				 background-color: lightblue;
				 margin:auto;
				 border:3px solid black;
			}
			#header{
				float:left;
				text-align:center;
			}
			#tab{

				display: inline-block;
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
				text-align:left;
			}
			table {
					border-collapse: collapse;
					width: auto;
					
				}

				th, td {
					padding: 10px;
					text-align: center;
					border: 1px solid #ddd;
					font-family: arial;
				font-size: 20px;
				}
			#e{
				 background-color: 	#D2B48C;
				padding:10px;
				font-family: arial;
				font-size: 20px;
				width:150px;
			}
			#e:hover {
						background-color: #555;
						color: white;
					}

		</style>
		</head>
		<div id="body">
		<div id="header">
			<h1>Search By Name: </h1>
			<input id="search" type="text" name="search" onkeyup="search()">
			<h1>Search By Company Name: </h1>
			<input id="search2" type="text" name="search2" onkeyup="search2()">
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
                    //alert(window.location.href);
                req.open("GET", window.location.href+"&state=search&q=" + searchInput.value, false);
                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        var displayDiv = document.getElementById('tab');
                        displayDiv.innerHTML = req.responseText;
                    }
                };
                req.send();
            }
            function search2() {
                var searchInput = document.getElementById('search2');
                var req = new XMLHttpRequest();
                req.open("GET", window.location.href+"&state=search2&q=" + searchInput.value, false);
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
