<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NerdLuv Signup</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="nerdieluv.css">
    </head>
    <body>
        <header>
            <h1 id="title">nerdLuv™</h1>
            <h2>where meek geeks meet</h2>
        </header>
        <main>
            <legend>New User Signup</legend>
            <fieldset>
            <form action="signup-submit.php" method="post">
                <div class="form-item">
                    <label class="left" for="name">Name: </label>
                    <input type="text" name="name" id="name" size="16" required>
                </div>
                <div class="form-item">
                    <label class="left" for="gender">Gender: </label>
                    <input type="radio" name="gender" id="male" value="M">
                    <label for="gender">Male</label>
                    <input type="radio" name="gender" id="female" value="F" required>
                    <label for="gender">Female</label>
                    <input type="radio" name="gender" id="non-binary" value="X">
                    <label for="gender">Non-Binary</label>
                </div>
                <div class="form-item">
                    <label class="left" for="age">Age: </label>
                    <input type="text" name="age" id="age" size="6" maxlength="2" required>
                </div>
                <div class="form-item">
                    <label class="left" for="type">Personality Type: </label>
                    <input type="text" name="type" id="type" size="6" maxlength="4" required>
                    <label for="type">(<a href="https://www.humanmetrics.com/personality/test">Don't know your type?</a>)</label>
                </div>
                <div class="form-item">
                    <label class="left" for="os">Favorite OS: </label>
                    <select name="os" id="os">
                        <option value="Windows" required>Windows</option>
                        <option value="Mac OS X">Mac OS X</option>
                        <option value="Linux">Linux</option>
                    </select>
                </div>
                <div class="form-item">
                    <label class="left" for="seeking[]">Seeking Gender(s): </label>
                    <select name="seeking[]" id="seeking" multiple>
                        <option value="M" required>Male</option>
                        <option value="F">Female</option>
                        <option value="X">Non-Binary</option>
                    </select>
                </div>
                <div class="form-item">
                    <label class="left" for="minage maxage">Seeking age: </label>
                    <input type="text" name="minage" id="minage" size="6" maxlength="2" required>
                    <input type="text" name="maxage" id="maxage" size="6" maxlength="2" required>
                </div>
                <input class="form-action" type="submit" value="Sign Up!">
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