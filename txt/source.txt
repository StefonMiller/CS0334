<!DOCTYPE html>
<html>
    <head>
        <title>Source Code</title>
        <link rel="stylesheet" href="../css/final_project.css">
    </head>
    <body style="background-color: white;">
    <?php
        include '../html/navbar.html';

        echo "<h1>Code for the navigation bar:</h1>";
        show_source("../html/navbar.html");
        echo "<h1>Code for viewing all attractions:</h1>";
        show_source("view.php");
        echo "<h1>Code for signing up:</h1>";
        show_source("signup.php");
        echo "<h1>Code for the search page:</h1>";
        show_source("search.php");
        echo "<h1>Code for viewing all customers:</h1>";
        show_source("customers.php");
        echo"<h1>Login code:</h1>";
        show_source("login.php");
    ?>
    <script>
        document.getElementById("source").innerHTML = "<u>Source Code</u>";
    </script>
    </body>
</html>