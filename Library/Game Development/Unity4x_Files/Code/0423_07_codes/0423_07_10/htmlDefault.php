<?php

$html_string = <<<HERE

<!DOCTYPE HTML>
<html>
<body>
<ul>
    <li>
        <a href="index.php?action=get&player=matt">
            get (player = matt)
        </a>
    </li>

    <li>
        <a href="index.php?action=html">
            list players (HTML)
        </a>
    </li>

    <li>
        <a href="index.php?action=xml">
            list players (XML)
        </a>
    </li>

    <li>
        <a href="index.php?action=set&player=matt&score=800">
            set (player = matt, score=800)
        </a>
    </li>

    <li>
        <a href="index.php?action=reset">
            reset database
        </a>
    </li>
</ul>
</body>
</html>

HERE;
?>

