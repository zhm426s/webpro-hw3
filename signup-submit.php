<?php
    // this file takes form input from signup.php and adds a new user to singles.txt (user data storage).
    // note that I am including extra #3: LGBT matches

    include ('common.php');

    // mainContent: function which returns output for the main section depending on a status from the main code
    function mainContent($mainStatus, $fullLine, $name) {
        if ($mainStatus === "EmptyError") { // empty error: validate that all form fields were filled out
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>The form was not filled out completely. Please go back and fill out all fields.</p>";
        } elseif ($mainStatus === "AgeError") { // age error: 1 or more age inputs are below 18
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>Teens under 18 are not allowed on NerdLuv. Please go back and edit your information.</p>";
        } else { // "good" status/no error: append new user info to singles.txt and display welcome message and login button
            file_put_contents('singles.txt', $fullLine, FILE_APPEND);
            return "<h3 class=\"submit-message\">Thank you!</h3> <br><p>Welcome to NerdLuv, $name!</p><br>
                <a class=\"button\" id=\"matches\" href=\"matches.php\">
                <p>♥Now, Log In to see your matches!</p></a>";
        }
    }
    
    // get all information from signup.php via post
    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);
    $age = (int)htmlspecialchars($_POST['age']);
    $type = htmlspecialchars($_POST['type']);
    $os = htmlspecialchars($_POST['os']);
    $seeking = $_POST['seeking'];
    // check if there are multiple answers for "seeking" (sexuality)
    if (!is_array($seeking)) {
        $seeking = [$seeking];
    } else { // ensure all answers are included in value
        $cseeking = array();
        foreach ($seeking as $sgender) {
            $cseeking[] = $sgender;
        }
        $seeking = implode('', $seeking); 
    }
    $minage = (int)htmlspecialchars($_POST['minage']);
    $maxage = (int)htmlspecialchars($_POST['maxage']);

    // get status
    $mainStatus = "Good";
    // get all required fields into an array
    $required = array('name' => $name, 'gender' => $gender, 'age' => $age, 'type' => $type, 'os' => $os, 'seeking' => $seeking, 'minage' => $minage, 'maxage' => $maxage);
    $fullLine = implode(',', $required) . PHP_EOL;
    foreach ($required as $field => $var) { // check if any fields are empty
        if (!isset($_POST[$field]) || $var === ''){
            $mainStatus = "EmptyError"; // set status to empty error
        }
    }
    if ($mainStatus !== "EmptyError" && ($age < 18 || $minage < 18 || $maxage < 18)) { // check if ages are invalid
        $mainStatus = "AgeError"; // set status to age error
    }
?>

<?=$head0?>
    <title>NerdLuv Signup for <?=$name?></title>
<?=$head1?>
<?=$header?>
    <main>
        <?=mainContent($mainStatus, $fullLine, $name)?> <!--use mainContent to get contents of main block-->
    </main>
<?=$footer?>
