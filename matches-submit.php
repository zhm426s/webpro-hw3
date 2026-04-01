<?php
    include ('common.php');

    function mainContent($mainStatus, $matches, $name) {
        if ($mainStatus === "NoAccError") {
            return "<h3 class=\"submit-message\">Error</h3> <br>
                <p>Your profile was not found. Please go back and check the spelling or make a new account.</p>";
        } elseif ($mainStatus === "NoMatchesError") {
            return"<h3 class=\"submit-message\">Matches for $name</h3> <br>
                <p>No matches found. Check back later to see if anyone new joins!</p>";
        } else {
            $returnString = "<h3 class=\"submit-message\">Matches for $name</h3> <br>";
            foreach ($matches as $match) {
                $returnString = $returnString . "<div class=\"match\"><img src=\"user.jpg\" alt=\"Default user\">
                    <p>$match[0]</p>
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
        if ($single[0] !== $userData[0] && in_array($single[1], mb_str_split($userData[7])) && in_array($userData[1], mb_str_split($single[7]))){
            if ((int)$single[2] <= (int)$userData[6] && (int)$single[2] >= (int)$userData[5] && (int)$userData[2] <= (int)$single[6] && (int)$userData[2] >= (int)$single[5]){
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
<?=$head0?>
    <title>NerdLuv Matches for <?=$name?></title>
<?=$head1?>
<?=$header?>
    <main>
        <?=mainContent($mainStatus, $matches, $name)?>
    </main>
<?=$footer?>