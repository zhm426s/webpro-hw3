<?php
    include ('common.php');
?>

<?=$head0?>
    <title>NerdLuv Login</title>
<?=$head1?>
<?=$header?>
    <main>
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