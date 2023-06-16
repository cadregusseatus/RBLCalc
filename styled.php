<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8" />
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta content="RBL Points Calculator" property="og:title" />
     <meta content="A fully-automated tool that calculates your projected end-of-regular-season points." property="og:description" />
     <meta content="https://retroleagues.x10.mx/rblcalc/" property="og:url" />
     <meta content="https://media.discordapp.net/attachments/701646962956435517/750114543476277248/FINAL_Year_6.png" property="og:image" />
     <meta content="#403ffc" data-react-helmet="true" name="theme-color" />

     <title>RBL Points Calculator</title>
     <link rel="icon" href="https://media.discordapp.net/attachments/701646962956435517/750114543476277248/FINAL_Year_6.png" />
     <style>
        body {
            background-color: black;
            color: white;
            font-family: arial;
            font-size: 1.5rem;
        }

        form {
            padding: 10px;
            background-color: rgba(256,256,256,0.05);
            width: 70%;
            border-radius: 4px;
            text-align: center;
            line-height: 2.2rem;
        }

        h1 {
            font-size: 14vh;
        }

        h3 {
            padding: 10px;
            background-color: rgba(256,256,256,0.1);
            width: 50%;
            border-radius: 4px 4px 0px 0px;
            text-align: center;
            margin-bottom: 0;
            font-size: 1.5rem;
        }

        br {
            user-select: none;
        }

        input[type="number"] {
            height: 2.2rem;
            width: 40vw;
            font-size: 1.6rem;
        }

        input[type="submit"] {
            width: 40vw;
            height: 3rem;
            font-size: 1.4rem;
            background-color: green;
            color: white;
            border: 0px solid white;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #00b300;
            cursor: pointer;
        }

        input[type="checkbox"] {
            width:  1.6rem;
            height: 1.6rem;
            transform: translate(0px,5px);
        }
	</style>
</head>

<body>
<center>

<?php
$pd = $_POST['pd'];
$week = ($_POST['week'] - 1);

if (isset($_POST['pd']) and isset($_POST['week'])) {
    if (isset($_POST['bye'])) {
        $games = $week - 1;
    } else {
        $games = $week;
    }
    $score = ($pd / $games);
    $final = round($score * 16);
    if ($final > 9999) {
        $final = "Big number";
    }

    if (is_nan($final) == 1) {
        $final = "0";
    } 

    echo "<h2>Your estimated regular season score is:</h2><h1>$final</h1>";
    echo "<br><br><br>(Do not post scores in the RBL Discord. It keeps the suspense going)<br><a style='color: gray'>Dev code: p" . $pd . "w" . $week . "b" . $bye . "g" . $games . "s" . $score . "</a>";
} else {
    echo '<h3>RBL Points Calculator</h3>
<form method="POST">
    Current PD:<br>
    <input type="number" name="pd" min="0" max="2000"><br>
    Current week:*<br>
    <input type="number" name="week" min="2" max="18"><br>
    Bye?** <input type="checkbox" name="bye"><br><br>
    <input type="submit" value="Calculate!">
</form>
<br><br><br>
<a style="color: gray">*The week at the top of your scores screen.<br>**Check this box if you have already had your bye week.</a>';
}
?>
</center>
</body>
</html>