<?php
    function mainContent($mainStatus, $matches, $name) {
        if ($mainStatus === "NoAccError") {
            echo "<h3 class=\"submit-message\">Error</h3> <br><p>Your profile was not found. Please go back and check the spelling or make a new account.</p>";
        } elseif ($mainStatus === "NoMatchesError") {
            echo "<h3 class=\"submit-message\">Matches for $name</h3> <br><p>No matches found. Check back later to see if anyone new joins!</p>";
        } else {
            echo "<h3 class=\"submit-message\">Matches for $name</h3> <br>";
            foreach ($matches as $match) {
                echo "<div class=\"match\"><img class=\"user-img\" src=\"user.jpg\" alt=\"Default user\">
                <h4 class=\"user-name\">$match[0]</h4><ul class=\"info-items\"><li>gender:</li><li>age:</li><li>type:</li><li>OS:</li></ul>
                <ul class=\"user-info\"><li>$match[1]</li><li>$match[2]</li><li>$match[3]</li><li>$match[4]</li></ul>
                </div>";
            }
        }
    }

    $name = htmlspecialchars($_GET['name']);
    $singles = file('singles.txt');
    $singlesData = array();
    foreach ($singles as $single) {
        $singlesData[] = explode(',', $single);
    }
    $mainStatus = "Good";
    foreach ($singlesData as $single) {
        if ($single[0] === $name) {
            $userData = $single;
        }
    }
    if (!isset($userData)){
        $mainStatus = "NoAccError";
    }

    $matches = array();
    foreach ($singlesData as $single) {
        if ($single[0] !== $userData[0] && in_array($single[1], mb_str_split($userData[5])) && in_array($userData[1], mb_str_split($single[5]))){
            if ((int)$single[2] <= (int)$userData[7] && (int)$single[2] >= (int)$userData[6] && (int)$userData[2] <= (int)$single[7] && (int)$userData[2] >= (int)$single[6]){
                if($single[4] === $userData[4]){
                    $i;
                    for ($i=0; $i<4; $i++){
                        if ($single[3][$i] === $userData[3][$i]){
                            $matches[] = $single;
                            break;
                        }
                    }
                }
            }
        }
        $matchDebug[] = $thisMatchDebug;
    }

    if (sizeof($matches) == 0) {
        $mainStatus = "NoMatchesError";
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
            <?php mainContent($mainStatus, $matches, $name);?>
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