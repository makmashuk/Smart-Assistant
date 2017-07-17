<?php
session_start();
if (isset($_SESSION['id'])) {
    $photo = $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
    $gender = $_SESSION['gender'];
    $address = $_SESSION['address'];


} else {
    header("location: login.php");
}
?>

<html>
<head>
    <style>

        html {

            background-color: #2F4F4F;

        }

        body {

            margin-top: 50px;
            height: auto;
            width: auto;
        }

        .left {
            margin: auto;
            width: auto;
            background: #4682B4;
            height: 80%;
            border: 0px solid black;
        }

        .info {
            height: auto;
            width: auto;
            float: left;
            border: 0px solid black;
            margin-left: 20px;
        }

        .image {
            height: 180px;
            width: 180px;
            border: 3px solid black;
            float: left;
        }

        .map {
            height: 350px;
            width: 300px;
            float: left;
            border: 3px solid black;
        }

        .option {
            height: auto;
            width: 20%;
            float: right;
            border: 0px solid black;
        }

        .center {
            height: auto;
            width: 50%;
            float: left;
            border: 0px solid white;
        }

        table.infotable {
            font-family: verdana, arial, sans-serif;
            font-size: 15px;
            color: #333333;
            border-width: 0px;
            background-color: #c3dde0;
            border-collapse: collapse;

        }

        table.infotable tr {
            background-color: #d4e3e5;

        }

        table.infotable td {
            border-width: 0px;
            padding: 15px;
            border-style: solid;
            border-color: #a9c6c9;

        }

        table.hovertable {
            font-family: verdana, arial, sans-serif;
            font-size: 30px;
            color: #333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }

        table.hovertable th {
            background-color: #c3dde0;
            border-width: 1px;
            padding: 15px;
            border-style: solid;
            border-color: #a9c6c9;
        }

        table.hovertable tr {
            background-color: #d4e3e5;
        }

        table.hovertable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
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


<div class="left">
    <div class="map">
        map
    </div>
    <div class="center">
        <div class="info">
            <table class="infotable">
                <tr>
                    <td>
                        <h3> UserType: </h3>
                    </td>
                    <td>
                        <h1>
                            <p id="id">
                                <?php
                                echo $userType;
                                ?>

                            </p>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Id: </h3>
                    </td>
                    <td>
                        <p id="id">
                            <?php
                            echo $id;
                            ?>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Name: </h3>
                    </td>
                    <td>
                        <p id="id">
                            <?php
                            echo $name;
                            ?>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Email: </h3>
                    </td>
                    <td>
                        <p id="id">
                            <?php
                            echo $email;
                            ?>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Address: </h3>
                    </td>
                    <td>
                        <p id="id">
                            <?php
                            echo $address;
                            ?>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Gender: </h3>
                    </td>
                    <td>
                        <p id="id">
                            <?php
                            echo $gender;
                            ?>

                        </p>
                    </td>
                </tr>

            </table>
        </div>
        <div class="image">
            <img src="<?= ROOT ?>/assets/img/<?= $photo ?>.jpg">
        </div>

    </div>

    <div class="option">
        <table class="hovertable">
            <tr>
                <th> User Menu</th>
            </tr>
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>
                    <input type="button" value="Add Profile" onclick="location.href='<?=ROOT?>/?profile_addProfile';"></a>
                </td>
            </tr>
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>
                    <input type="button" value="Show Profile" onclick="location.href='<?=ROOT?>/?profile_showProfiles';"></a>
                </td>
            </tr>
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>
                    <input type="button" value="Change Password" onclick="location.href='<?=ROOT?>/?profile_changePassword';"></a>
                </td>
            </tr>
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>
                    <input type="button" value="Edit My Profile" onclick="location.href='<?=ROOT?>/?profile_editProfile';"></a>
                </td>
            </tr>
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>
                    <input type="button" value="Go Home" onclick="location.href='<?=ROOT?>/?view_home';"></a>
                </td>
            </tr>

        </table>

    </div>

</div>


</body>

</html>