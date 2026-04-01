<?php
    // this file is the home page for the website: it directs users to the signup and login forms.

    include ('common.php');
?>

<?=$head0?>
    <title>NerdLuv Home</title>
<?=$head1?>
<?=$header?>
    <!--main section for navigation buttons-->
    <main>
        <a class="button" id="signup" href="signup.php">
            <p>📝 Sign up for a new account</p>
        </a>
        <a class="button" id="matches" href="matches.php">
            <p>♥ Log In and view matches</p>
        </a>
    </main>
<?=$footer?>
