<!DOCTYPE html>
<html>
    <head>
        <title>Search for attractions</title>
        <link rel="stylesheet" href="../css/final_project.css">
    </head>
    <body>
    <?php
        include '../html/navbar.html';

        echo "<h1>Fill out the form below to search for an attraction(s):</h1>";

        require_once 'login.php';     
        $conn = mysqli_connect($hn, $un, $pw, $db);


        if(isset($_POST['submit']))
        {
            //Get values from form
            $type = $_POST['type'];
            $risk = $_POST['risk'];

            //Get corresponding database entry
            $query = "SELECT * FROM attraction WHERE attraction_type = \"$type\" AND attraction_covid <= \"$risk\"";

            $result = mysqli_query($conn, $query);
            
            displayForm();

            require_once 'login.php';
            if (!$result) die("Fatal Error");
            if ($result->num_rows > 0) 
            {
                echo "<div style=\"display: flex;\">";
                while($row = $result->fetch_assoc()) 
                {
                    echo "<div style=\"max-width: 33%; padding-right: 5%;\"><h3>".htmlspecialchars($row['attraction_name'])."</h3>";
                        echo "<div><img src=".htmlspecialchars($row['attraction_image'])." width=\"250px\" height=\"250px\"></img></div>";
                        echo "<div><p>".htmlspecialchars($row['attraction_description'])."</p></div>";
                        echo "<p><b>Address: </b>".htmlspecialchars($row['attraction_address'])."</p>";
                        echo "<p><b>Covid Risk: </b>".htmlspecialchars($row['attraction_covid'])."</p>";
                        echo "<p><b>Price: </b>".htmlspecialchars($row['attraction_price'])."</p>";
                        echo "<a href=".htmlspecialchars($row['attraction_site'])." target=\"_blank\">Website</a>";
                    echo "</div>";
                }
                echo "</div><hr>";
            } 
            else 
            {
                echo "<p style=\"color: red\">0 results for $type with COVID risk of $risk or less</p>";
            }
            mysqli_close($conn);
        }    
        else
        {
            displayForm();
        }




        function displayForm()
        {
            echo <<<HERE
            <div id="wrapper">
                <section id="top area">
                    <article class="box-right">
                        <form method="post" action="">
                                <p>
                                    <label>Event Type:</label>
                                    <select name="type" required="required" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                                        <option value="events">Events</option>
                                        <option value="food">Food</option>
                                        <option vlaue="sights">Sights</option>
                                    </select>
                                </p>
                                <p>
                                    <label>Maximum COVID Risk(Out of 5):</label>
                                    <select name="risk" required="required" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option vlaue=3>3</option>
                                        <option vlaue=4>4</option>
                                        <option vlaue=5>5</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" name="submit"  style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                                </p>
                            </form>
                        </article>
                    </section>
            </div>
HERE;
        }
        
    ?>
    <script>
        document.getElementById("search").innerHTML = "<u>Search</u>";
    </script>
    </body>
</html>