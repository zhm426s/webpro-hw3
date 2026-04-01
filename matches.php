<?php
    // this file gets input of a name and sends it to matches-submit.php
    // note that I am including extra #3: LGBT matches
    
    include ('common.php');
?>

<?=$head0?>
    <title>NerdLuv Login</title>
<?=$head1?>
<?=$header?>
    <main>
        <!--main content: display form for a returning user to get matches-->
        <legend>Returning User</legend>
        <fieldset>
        <form action="matches-submit.php" method="get">
            <div class="form-item">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" size="16" required>
            </div>
            <input class="form-action" type="submit" value="View Matches!">
            <input class="form-action" type="reset" value="Clear Form">
        </form>
        </fieldset>
    </main>
<?=$footer?>