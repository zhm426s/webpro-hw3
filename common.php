<?php 
// this file stores common sections of HTML code to be included and used in other files. 

// top part of each document (before <title>)
$head0 = "<!DOCTYPE html>
<html lang=\"en\">
    <head>";

// rest of the head of each document
$head1 = "<meta charset=\"UTF-8\">
        <link rel=\"stylesheet\" href=\"nerdieluv.css\">
    </head>";

// header of each document
$header = "<body>
        <header>
            <h1 id=\"title\">nerdLuv™</h1>
            <h2>where meek geeks meet</h2>
        </header>";

// footer of each document
$footer = "<footer>
            <p id=\"footer-info\">
                This page is for single nerds to meet and date each other! <br>
                Type in your personal information and wait for the nerdly luv to begin!<br>
                Thank you for using our site.
            </p>
            <p id=\"copyright\">Results and page © Copyright NerdLuv Inc.</p>
            <a class=\"button\" id=\"back-button\" href=\"index.php\">
                <p>← Back to Home Page</p>
            </a>
            <p>
            <a href=\"https://jigsaw.w3.org/css-validator/check/referer\">
                <img style=\"border:0;width:88px;height:31px\"
                    src=\"https://jigsaw.w3.org/css-validator/images/vcss\"
                    alt=\"Valid CSS!\" />
                </a>
            </p>
        </footer>
    </body>
</html>";

?>
