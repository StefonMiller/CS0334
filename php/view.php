<!DOCTYPE html>
<html>
    <head>
        <title>Pittsburgh Attractions</title>
        <link rel="stylesheet" href="../css/final_project.css">
    </head>
    <body>
    <?php
        include '../html/navbar.html';

        echo "<h1 style=\"color: white; text-align: center;\">Here are all of the sights in Pittsburgh:</h1>";


        require_once 'login.php';
        $conn = mysqli_connect($hn, $un, $pw, $db);
        
        $query = "SELECT * FROM attraction WHERE attraction_type = \"sights\"";
        $result = $conn->query($query);
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
                    echo "<p><b>Covid Risk: </b>".htmlspecialchars($row['attraction_covid'])."/5</p>";
                    echo "<p><b>Price: </b>".htmlspecialchars($row['attraction_price'])."</p>";
                    echo "<a href=".htmlspecialchars($row['attraction_site'])." target=\"_blank\" style=\"#BB86FC\">Website</a>";
                echo "</div>";
            }
            echo "</div><hr>";
        } 
        else 
        {
           echo "0 results";
        }

        echo "<h1 style=\"color: white; text-align: center;\">Here are the best restaraunts in Pittsburgh:</h1>";


        require_once 'login.php';
        $conn = mysqli_connect($hn, $un, $pw, $db);
        
        $query = "SELECT * FROM attraction WHERE attraction_type = \"food\"";
        $result = $conn->query($query);
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
                    echo "<p><b>Covid Risk: </b>".htmlspecialchars($row['attraction_covid'])."/5</p>";
                    echo "<p><b>Price: </b>".htmlspecialchars($row['attraction_price'])."</p>";
                    echo "<a href=".htmlspecialchars($row['attraction_site'])." target=\"_blank\" style=\"#BB86FC\">Website</a>";
                echo "</div>";
            }
            echo "</div><hr>";
        } 
        else 
        {
           echo "0 results";
        }
        $result->close();
        $conn->close();

        echo "<h1 style=\"color: white; text-align: center;\">Here are all of the current events in Pittsburgh:</h1>";


        require_once 'login.php';
        $conn = mysqli_connect($hn, $un, $pw, $db);
        
        $query = "SELECT * FROM attraction WHERE attraction_type = \"events\"";
        $result = $conn->query($query);
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
                    echo "<p><b>Covid Risk: </b>".htmlspecialchars($row['attraction_covid'])."/5</p>";
                    echo "<p><b>Price: </b>".htmlspecialchars($row['attraction_price'])."</p>";
                    echo "<a href=".htmlspecialchars($row['attraction_site'])." target=\"_blank\" style=\"#BB86FC\">Website</a>";
                echo "</div>";
            }
            echo "</div><hr>";
        } 
        else 
        {
           echo "0 results";
        }
    ?>
    <script>
        document.getElementById("attractions").innerHTML = "<u>Attractions</u>";
    </script>
    </body>
</html>