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