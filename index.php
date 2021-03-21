<!DOCTYPE html>
<html>
    <head>
        <title>Pittsburgh Destinations</title>
        <link rel="stylesheet" href="css/final_project.css">
    </head>
    <body>
    <?php
        include 'html/navbar.html';

        echo "<h1 style=\"text-align: center;\">Welcome to Pittsburgh Destinations!<br>
        Here, you will find popular locations around Pittsburgh.</h1>";
        echo "<img src=\"img/pitt.jpg\" style=\"display:block; margin-left: auto; margin-right: auto; width: 75%;\"></img>";

        echo "<div style=\"position: fixed; bottom: 0; width: 100%; margin-bottom: 20px; display: flex; justify-content: space-around;\">";
            echo "<a href=\"txt/index.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Index</a>";
            echo "<a href=\"txt/view.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Attractions</a>";
            echo "<a href=\"txt/customers.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Current Members</a>";
            echo "<a href=\"txt/search.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Search</a>";
            echo "<a href=\"txt/signup.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Sign Up</a>";
            echo "<a href=\"txt/login.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Login</a>";
            echo "<a href=\"txt/queries.txt\" style=\"color: #BB86FC; font-family: arial, sans-serif;\">Database Schema</a>";
        echo "</div>";
    ?>
    <script>
        document.getElementById("index").innerHTML = "<u>Home</u>";
    </script>
    </body>
</html>