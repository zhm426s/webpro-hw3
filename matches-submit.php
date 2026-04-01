<?php
    // this file takes name input from matches.php, locates matches in singles.txt, and outputs those matches
    // note that I am including extra #3: LGBT matches

    include ('common.php');

    // mainContent: function which returns output for the main section depending on a status from the main code
    function mainContent($mainStatus, $matches, $name) {
        if ($mainStatus === "NoAccError") { // no account error: name was not found in singles.txt
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>Your profile was not found. Please go back and check the spelling or make a new account.</p>";
        } elseif ($mainStatus === "NoMatchesError") { // no matches error: there are no matches for this user
            return"<h3 class=\"submit-message\">Matches for $name</h3> <br>
                <p>No matches found. Check back later to see if anyone new joins!</p>";
        } else { // good status/no error: display list of matches
            $returnString = "<h3 class=\"submit-message\">Matches for $name</h3> <br>";
            foreach ($matches as $match) {
                $returnString = $returnString . "<div class=\"match\">
                    <p>$match[0]</p>
                    <img src=\"user.png\" alt=\"Default user\"> 
                    <ul class=\"info-items\">
                        <li>gender:</li>
                        <li>age:</li>
                        <li>type:</li>
                        <li>OS:</li>
                    </ul>
                    <ul class=\"user-info\">
                        <li>$match[1]</li>
                        <li>$match[2]</li>
                        <li>$match[3]</li>
                        <li>$match[4]</li>
                    </ul>
                    </div>";
            }
            return $returnString;
        }
    }

    // get name from matches.php via get
    $name = htmlspecialchars($_GET['name']);

    // get singles data from singles.txt
    $singles = file('singles.txt');
    $singlesData = array();
    foreach ($singles as $single) {
        $singlesData[] = explode(',', $single); // singlesData: 2D array of single data
    }

    $mainStatus = "Good";
    $userData;
    // find all data for the logged in user
    foreach ($singlesData as $single) {
        if ($single[0] === $name) {
            $userData = $single;
        }
    }
    // if there is no userData found, set status to no account error
    if (is_null($userData)){
        $mainStatus = "NoAccError";
    } else {
        // find matches
        $matches = array();
        foreach ($singlesData as $single) {
            // check if this single is the logged in user, then if the user and this single have compatible sexualities
            if ($single[0] !== $userData[0] && in_array($single[1], mb_str_split($userData[7])) && in_array($userData[1], mb_str_split($single[7]))){
                // check if the user and this single have compatible ages
                if ((int)$single[2] <= (int)$userData[6] && (int)$single[2] >= (int)$userData[5] && (int)$userData[2] <= (int)$single[6] && (int)$userData[2] >= (int)$single[5]){
                    // check if the user and this single have compatible OSes
                    if($single[4] === $userData[4]){
                        $i;
                        // check if the user and this single have compatible personality types
                        for ($i=0; $i<4; $i++){
                            if ($single[3][$i] === $userData[3][$i]){
                                $matches[] = $single; // add single to matches if everything is compatible
                                break;
                            }
                        }
                    }
                }
            }
        }
        // if there are no matches found, set status to no matches error
        if (sizeof($matches) == 0) {
            $mainStatus = "NoMatchesError";
        }
    }

?>
<?=$head0?>
    <title>NerdLuv Matches for <?=$name?></title>
<?=$head1?>
<?=$header?>
    <main>
        <?=mainContent($mainStatus, $matches, $name)?> <!--use mainContent to get content of main block-->
    </main>
<?=$footer?>