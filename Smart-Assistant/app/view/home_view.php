<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($isDispatchedByFrontController)) {
    echo "home_view";
    //include_once("../error.php");
    die;
}
$id = $_SESSION['id'];
$note = "";
$today = date("y-m-d");

require_once (APP_ROOT."/lib/data_access_helper.php");

if (isset($_SESSION['id'])) {

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
        global $note;
        $sql = "SELECT note from miniprojectusers WHERE id=\"$id\" ";
        $result = executeQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            $note = $row['note'];
        }



} else {
    echo "id problem";
    //header("location: ");
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['note'])) {
    $notee = $_GET['note'];
        $sql = "UPDATE miniprojectusers SET note=\"$notee\" WHERE id=\"$id\" ";
        executeQuery($sql);

}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $comment = $_GET['comment'];
    $time=$_GET['time'];
        $sql = "UPDATE reminder SET comment=\"$comment\" WHERE id=\"$id\" AND date=\"$today\" AND AT =\"$time\" ";
        executeQuery($sql);

}
?>
<html>
<head>
    <title> HomePage </title>
    <script src="<?= ROOT ?>/assets/scripts/clock.js"></script>
    <style>
        html {

            background-color: #2F4F4F;

        }

        #body {
            border: 0px solid black;
            height: auto;
            width: auto;
            background: #2F4F4F;

        }

        #hr, #min, #sec {
            border: 3px solid black;
            height: 10%;
            width: 20%;
            padding: 5px;
            background: #FFE4B5;
            font-family: arial;
            font-size: 40px;
        }

        #side {
            float: right;
            height: auto;
            border: 0px solid black;
            width: 20%;
            background-color: #4682B4;
            margin: 0px;
            padding: 10px;

        }

        #time {

            float: left;
            height: auto;
            border: 2px solid green;
            background: #E9967A;
            padding: 10px;
            margin-bottom: 20px;
            margin-left: 15px;

        }

        #header {

            height: auto;
            width: auto;
            padding: 10px;
            margin-left: 250px;
        }

        #menubar,
        #menubar ul {
            list-style: none;
        }

        #menubar > li {
            float: left;
            font-family: arial;
            font-size: 20px;
            margin: 0 auto;
        }

        #menubar li a {
            display: block;
            text-decoration: none;
            height: 50px;
            width: 100px;
        }

        #menubar > li > a {
            background-color: #112211;
            color: #fff;
        }

        #linklist {
            position: absolute;
            background-color: #efefef;
            z-index: 9999;
            display: none;
        }

        #linklist > li > a {
            color: #121;
            width: auto;
        }

        #menubar li a:hover {
            background-color: #5884d6;
            color: #fff;
        }

        #menubar li:hover #linklist {
            display: block;
        }

        #mid {
            width: auto%;
            text-align: center;

            height: auto;
            padding: 15px;
        }

        #left {
            float: left;
            width: 12%;
            background-color: #4682B4;
            height: auto;
            border: 0px solid black;

        }

        #center {
            display: inline-block;
            margin: 0 auto;
            width: 65%;
            background: #FFE4E1;
            font-family: arial;
            font-size: 20px;
            height: 90%;
            border: 0px solid black;
        }

        #notes {

            margin-top: 30px;
            border: 0px solid black;
            height: 200px;
        }

        .event table {
            border-collapse: collapse;
            width: auto;

        }

        .event th, .event td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            font-family: arial;
            font-size: 15px;
        }

        #e {
            background-color: #D2B48C;
            padding: 10px;
            font-family: arial;
            font-size: 10px;
            width: 80px;
        }

        #e:hover {
            background-color: #555;
            color: white;
        }

        #weather {
            float: left;
            border: 0px solid green;
            margin-bottom: 20px;
            background-color: #7FFFD4;

        }

        #dic {

            float: right;
            width: auto;
            margin: auto
            height: auto;
            padding: 15px;
            border: 0px solid green;
            margin-bottom: 20px;
            background-color: #CD5C5C;

        }

        #logout {

            text-align: center;
            font-family: arial;
            font-size: 30px;
            width: auto;
            background: lightgreen;
            border: 2px solid black;
            height: 60px;
            width: 160px;
            float: right;
            margin-bottom: 5px;

        }

        #logout:hover {
            background-color: #555;
            color: red;
            cursor: pointer;
        }

        #navbar {
            list-style-type: none;
            margin: 0;
            padding: 5px;
            align: center;
            width: auto;
            background-color: #f4b1fc;
        }

        li a {
            display: block;
            font-family: arial;
            font-size: 20px;
            color: #000;
            padding: 7px 10px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #FFDEAD;
            color: black;
        }


    </style>
</head>

<body onload="init()">
<div id="body">


    <div id="header">
        <table border="0" width="100%">
            <tr>
                <td>
                    <ul id="menubar">
                        <li><a href="<?=ROOT?>?view_home">Refresh</a></li>
                        <li><a href="www.wikipedia.org">Wikipedia</a></li>
                        <li><a href="<?=ROOT?>?view_profile">Profile</a></li>
                        <li><a href="<?=ROOT?>?view_cal">Calender</a></li>
                        <li><a href="<?=ROOT?>?profile_contact">Contact List</a></li>

                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <div id="mid">

        <div id="left">
            <ul id="navbar">

                <li><a href="https:\\www.gmail.com" target="_blank">G-mail</a></li>
                <li><a href="https:\\mail.yahoo.com" target="_blank">Y-mail</a></li>
                <li><a href="https://outlook.live.com/owa/" target="_blank">OutLook</a></li>
                <li><a href="https:\\www.Youtube.com" target="_blank">YouTube</a></li>
                <li><a href="https:\\www.facebook.com" target="_blank">FaceBook</a></li>
                <li><a href="https:\\www.google.com" target="_blank">GooGle</a></li>
                <li><a href="#" target="_blank">Free</a></li>


            </ul>
            <h1> Notes </h1>
            <div id="notes">
                <textarea name="note" id="note" rows="10" cols="20" onkeyup="saveNote()"> <?= $note ?></textarea>
            </div>
        </div>


        <div id="center">

            <?php

            $where = "where date=\"" . date("Y-m-d") . "\" AND id='" . $id . "' ";
            $sql = "select eventname,at,location,`with`,shortnote,comment from reminder " . $where;
            ?>
            <table class="event" width="100%">
                <tr>
                    <td colspan="6" width="90%">
                        <h1>Today's Work</h1>
                    </td>
                    <td colspan="2">
                        <?= $today ?>
                    </td>
                </tr>

                <tr>
                    <td>Event Name</td>
                    <td>Event Time</td>
                    <td>Location</td>
                    <td>With</td>
                    <td>Notes</td>
                    <td>Comments</td>
                </tr>


                <?php
                if ($result = executeQuery($sql)) {
                    $i = -1;
                    while ($row = mysqli_fetch_array($result)) {
                        $i++;
                        echo "
                
                    <tr>
                        <td height='50'>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td><input value='$row[5]' id='comment$i' type='text' onkeyup="."\"saveComment(this.id, '".$row[1]."')\""." ></td>
                        <td id='e'><a href='?view_delete&state=event&date=$today&at=$row[1]'>Remove</a></td><!-- / dile localhost e chole jay-->
                        <td id='e'><a href='?view_record&state=modify&date=$today&event=$row[0]&at=$row[1]&location=$row[2]&with=$row[3]&note=$row[4]'>Edit</a></td>
                    </tr>
					
                ";
                    }
                }


                ?>
            </table>
        </div>

        <div id="side">
            <div id="logout">

                <a onclick="logout()">logout</a>

            </div>
            <div id="time">
                <table border="0">
                    <tr>

                        <td>
                            <span id="hr"> 00 </span>
                            <span> : </span>
                            <span id="min"> 00 </span>
                            <span> : </span>
                            <span id="sec"> 00 </span>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="dic">
                <h3> English To Bengali </h3>
                <form
                    action='http://dictionary.cambridge.org/search/british/direct/?utm_source=widget_searchbox_source&utm_medium=widget_searchbox&utm_campaign=widget_tracking'
                    method='post' target="_blank">
                    <table>

                        <tr>
                            <td colspan='2'>

                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name='q'/>
                            </td>
                            <td>
                                <input type='submit' value='Look it up'/>
                            </td>
                        </tr>

                    </table>
                </form>

            </div>
            <div id="weather">
                <h3> Weather of Dhaka </h3>
                <script language="JavaScript" type="text/javascript">
                    document.write('<script language="JavaScript" src="https://www.worldweatheronline.com/widget/v4/weather-widget.ashx?q=Dhaka%2c+Bangladesh&width=220&custom_header=Dhaka, Bangladesh&num_of_day=2&title_bg_color=020202&title_text_color=C4FFD6&widget_bg_color=FFFFFF&widget_text_color=020202&type=js&icon=0&cb=' + Math.random() + '" type="text/javascript"><\/scr' + 'ipt>');
                </script>
                <noscript><a href="https://www.worldweatheronline.com" alt="Dhaka, Bangladesh weather">7 day Dhaka,
                        Bangladesh weather</a> provided by <a href="https://www.worldweatheronline.com">World Weather
                        Online</a></noscript>


            </div>


        </div>


    </div>


</div>
</body>

</html>
<script>

    function logout() {
        window.location.href = "?view_logout";
    }
    function saveNote() {
        var noteField = document.getElementById('note');
        //var noteForm=document.getElementById('formNote');
        var noteReq = new XMLHttpRequest();
        noteReq.open("GET", "home.php?note=" + noteField.value, true);
        noteReq.send();
    }
    function saveComment(id,time) {
        var comment = document.getElementById(id);
        var commentReq = new XMLHttpRequest();
        commentReq.open("POST", "home.php?time="+time+"&comment=" + comment.value, true);
        commentReq.send();

    }
</script>