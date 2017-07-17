<?php
if (!isset($isDispatchedByFrontController)) {
    include_once("../error.php");
    die;
}
?>
<html>
<head>
    <title>Calendar</title>

    <style>

        html {

            background-color: #2F4F4F;
            min-width: 100%;
            min-height: 100%;
            background-position: top center;

        }

        #body {
            border: 3px solid white;
            margin: auto;
            height: auto;
            align: center;
            vertical-align: middle;
            width: auto;
            padding: 10px;
            background-color: lightblue;

        }

        #calendar-dates > table > tr > td:hover {
            background-color: #555;
            color: white;
        }

        #calendar-dates > table > tr > td {
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 25px;
            background-color: #66CDAA;
            color: black;
            font-size: 50px;
            vertical-align: middle;
            border: 2px solid black;
            cursor: pointer;

        }

        #calendar-month-year {

            margin: auto;
            font-size: 40px;
            border: 2px solid black;
            width: 30%;
            float: left;
        }

        #today {
            background-color: cyan !important;
        }

        .clicked {
            background-color: brown !important;
        }

        #header {

            border: 2px solid black;

        }

        #next {
            cursor: pointer;
            border: 2px solid black;
        }

        #prev {
            cursor: pointer;
            border: 2px solid black;
        }

        #movebar,
        #movebar ul {
            list-style: none;
            align: center;
            padding: 40px;
            border: 1px;
        }

        #movebar > li {

            height: 70px;
            width: 250px;
            padding: 25px;
            border: 3px solid black;
            text-align: center;
            background-color: #66CDAA;
            font-family: arial;
            font-size: 30px;

        }

        #movebar > li:hover {
            background-color: #555;
            color: white;
        }

        #f {

            text-align: center;
            font-family: arial;
            font-size: 30px;
        }


    </style>

    <!-- <link type="text/css" rel="stylesheet" href="cal.css"> -->
</head>
<script src="<?= ROOT ?>/assets/scripts/calo.js"></script>
<body onload="x()">


<div id="body">
    <div id="calendar-container">
        <div id="calendar-header">

            <div id="calendar-month-year">

                <ul id="movebar">

                    <li id="prev" onclick="prev()"> Previous</li>
                    <li id="header"></li>
                    <li id="next" onclick=" next()"> Next</li>
                </ul>
            </div>

        </div>
        <div id="date">
            <div id="calendar-dates">
            </div>
        </div>
    </div>
    <div id="f">
        <a href="<?= ROOT ?>?view_home">Go Home</a>
    </div>
</div>


<span id="test"></span>
</body>
</html>

