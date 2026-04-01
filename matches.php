<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NerdLuv Log In</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="nerdieluv.css">
    </head>
    <body>
        <header>
            <h1 id="title">nerdLuv™</h1>
            <h2>where meek geeks meet</h2>
        </header>
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