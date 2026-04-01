<?php
    include ('common.php');

    function mainContent($mainStatus, $fullLine, $name) {
        if ($mainStatus === "EmptyError") {
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>The form was not filled out completely. Please go back and fill out all fields.</p>";
        } elseif ($mainStatus === "AgeError") {
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>Teens under 18 are not allowed on NerdLuv. Please go back and edit your information.</p>";
        } else {
            file_put_contents('singles.txt', $fullLine, FILE_APPEND);
            return "<h3 class=\"submit-message\">Thank you!</h3> <br><p>Welcome to NerdLuv, $name!</p><br>
                <a class=\"button\" id=\"matches\" href=\"matches.php\"><img src=\"heart.png\" alt=\"Heart icon\">
                <p>Now, Log In to see your matches!</p></a>";
        }
    }
    
    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);
    $age = (int)htmlspecialchars($_POST['age']);
    $type = htmlspecialchars($_POST['type']);
    $os = htmlspecialchars($_POST['os']);
    $seeking = $_POST['seeking'];
    if (!is_array($seeking)) {
        $seeking = [$seeking];
    } else {
        $cseeking = array();
        foreach ($seeking as $sgender) {
            $cseeking[] = $sgender;
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

<?=$head0?>
    <title>NerdLuv Signup for <?=$name?></title>
<?=$head1?>
<?=$header?>
    <main>
        <?=mainContent($mainStatus, $fullLine, $name)?>
    </main>
<?=$footer?>
