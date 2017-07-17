<?php

$id = $_SESSION['id'];

$state=isset($_GET['state']) ?$_GET['state']:"";
$date="";
$eventName="";
$at="";
$location="";
$with="";
$note=$prevDate=$prevAt="";
    if($state=="" && $_SERVER['REQUEST_METHOD'] == "GET"){

        $month = $_GET['month'] + 1;
        $day = $_GET['day'];
        $year = $_GET['year'];

        $date = "$year-$month-$day";
        $eventName="";
        $at=": :";
        $location="";
        $with="";
        $note="";
        //$sql = "INSERT INTO `reminder`(`date`, `eventname`, `at`, `location`, `with`, `shortnote`, `id`) VALUES (\"$date\",'$eventName','$at','$location','$with','$note','$id')";
    }


    elseif($state=="modify" && $_SERVER['REQUEST_METHOD'] == "GET"){

        $prevDate=$date=$_GET['date'];
        $eventName=$_GET['event'];
        $prevAt=$at=$_GET['at'];
        $location=$_GET['location'];
        $with=$_GET['with'];
        $note=$_GET['note'];
        //$sql = "UPDATE `reminder` SET `date`=\"$date\", `eventname`=\"$eventName\", `at`=\"$at\", `location`=\"$location\", `with`=\"$with\", `shortnote`=\"$note\", where id=\"$id\" AND AT =\"$at\" and DATE =\"$date\"";
    }



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET['state'])) {

    $sql="";
    $date=$_POST['date'];
    $eventName = $_POST['event'];
    $at = $_POST['time'];
    $location = $_POST['location'];
    $with = $_POST['with'];
    $note = $_POST['note'];
    include_once(APP_ROOT."/core/event_service.php");
    if($state==""){
        if(InsertEvent(compact('date','eventName','at','location','with','note','id'))){
            echo "record inserted";
        }else{
            echo "something wrong";
        }

        //echo

    }elseif ($state=="modify"){
        $prevDate=$_GET['prevDate'];
        $prevAt=$_GET['prevAt'];
        if(modifyEvent(compact('date','eventName','at','location','with','note','prevAt','prevDate','id'))){
            echo "record updated";
        }else{
            echo "something wrong";
        }

         //echo $sql = "UPDATE `reminder` SET `date`=\"$date\", `eventname`=\"$eventName\", `at`=\"$at\", `location`=\"$location\", `with`=\"$with\", `shortnote`=\"$note\" where id=\"$id\" AND AT =\"$prevAt\" and DATE =\"$prevDate\"";
    }

}

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

            #body {

                background-color: lightblue;
            }

            table {
                border-collapse: collapse;
                width: auto;

            }

            th, td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }

            h1 {

                text-align: center;
            }
        </style>

    </head

    <body>
    <div id="body">
        <form method="post" id="form1" action="?view_record&state=<?=$state?>&prevDate=<?=$prevDate?>&prevAt=<?=$prevAt?>">


            <h1> Add Event </h1>

            <table align="center">
                <tr>
                    <td colspan="2">
                        <input type="text" name="date" value="<?=$date?>"><br>
                    </td>

                </tr>

                <tr>
                    <td>
                        Event Name:
                    </td>
                    <td>
                        <input id="eventName" type="text" name="event" value="<?=$eventName?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Event At:
                    </td>
                    <td>
                        <input id="time" type="text" name="time" value="<?=$at?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Event Location:
                    </td>
                    <td>
                        <input id="location" type="text" name="location" value="<?=$location?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Event With:
                    </td>
                    <td>
                        <input id="with" type="text" name="with" value="<?=$with?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Short note:
                    </td>
                    <td>
                        <textarea name="note" cols="60" rows="4"><?=$note?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" onclick="validate()" value="Submit"/>
                    </td>
                </tr>


            </table>
        </form>
    </div>

    <div id="f" style="text-align:center;font-family: arial;font-size: 30px;">
        <a href='?view_cal'>Back to calender</a>
    </div>
    </body>

    </html>
    <script>
        function validate() {
            var event = document.getElementById("eventName");
            var time = document.getElementById("time");
            if (event.value != "" && time.value != "") {
                var form = document.getElementById("form1");
                form.submit();
            }
            else {
                alert("Event name and time cannot be empty");

            }
        }
    </script>

<?php

?>