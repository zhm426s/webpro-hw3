<?php
    function genderConvert($string) {
        if ($string === "Male") {
            return "M";
        } elseif ($string === "Female") {
            return "F";
        } else {
            return "X";
        }
    }

    function mainContent($mainStatus, $fullLine, $name) {
        if ($mainStatus === "EmptyError") {
            echo "<h3 class=\"submit-message\">Error</h3> <br><p>The form was not filled out completely. Please go back and fill out all fields.</p>";
        } elseif ($mainStatus === "AgeError") {
            echo "<h3 class=\"submit-message\">Error</h3> <br><p>Teens under 18 are not allowed on NerdLuv. Please go back and edit your information.</p>";
        } else {
            file_put_contents('singles.txt', $fullLine, FILE_APPEND);
            echo "<h3 class=\"submit-message\">Thank you!</h3> <br><p>Welcome to NerdLuv, $name!</p><br>";
            echo "<a class=\"button\" id=\"matches\" href=\"matches.php\"><img src=\"heart.png\" alt=\"Heart icon\"><p>Now, Log In to see your matches!</p></a>";
        }
    }
    
    $name = htmlspecialchars($_POST['name']);
    $gender = genderConvert(htmlspecialchars($_POST['gender']));
    $age = (int)htmlspecialchars($_POST['age']);
    $type = htmlspecialchars($_POST['type']);
    $os = htmlspecialchars($_POST['os']);
    $seeking = htmlspecialchars($_POST['seeking']);
    if (!is_array($seeking)) {
        $seeking = genderConvert([$seeking]);
    } else {
        $cseeking = array();
        foreach ($seeking as $sgender) {
            $cseeking[] = genderConvert($sgender);
        }
        $seeking = implode('', $seeking);
    }
    $minage = (int)htmlspecialchars($_POST['minage']);
    $maxage = (int)htmlspecialchars($_POST['maxage']);

    $mainStatus = "Good";
    $required = array('name' => $name, 'gender' => $gender, 'age' => $age, 'type' => $type, 'os' => $os, 'seeking' => $seeking, 'minage' => $minage, 'maxage' => $maxage);
    $fullLine = implode(',', $required) . PHP_EOL;
    foreach ($required as $field => $var) {
        if (!isset($_POST[$field]) || $var === ''){
            $mainStatus = "EmptyError";
        }
    }
    if ($age < 18 || $minage < 18 || $maxage < 18) {
        $mainStatus = "AgeError";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NerdLuv Signup</title>
        <meta charset="UTF-8">
        <meta rel="stylesheet" href="nerdluv.css">
    </head>
    <body>
        <header>
            <h1 id="title">nerdLuv™</h1>
            <h2>where meek geeks meet</h2>
        </header>
        <main>
            <?php mainContent($mainStatus, $fullLine, $name);?>
        </main>
        <footer>
            <p id="footer-info">
                This page is for single nerds to meet and date each other! <br>
                Type in your personal information and wait for the nerdly luv to begin!<br>
                Thank you for using our site.
            </p>
            <p id="copyright">Results and page © Copyright NerdLuv Inc.</p>
            <a class="button" id="back-button" href="index.php">
                <img src="back-button.png" alt="Back arrow icon">
                <p>Back to Home Page</p>
            </a>
        </footer>
    </body>
</html>
