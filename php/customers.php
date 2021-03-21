<!DOCTYPE html>
<html>
    <head>
        <title>Customer Information</title>
        <link rel="stylesheet" href="../css/final_project.css">
    </head>
    <body>
    <?php
        include '../html/navbar.html';



        require_once 'login.php';
        $conn = mysqli_connect($hn, $un, $pw, $db);


        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == "admin" && $password == "password")
            {
                echo "<p style=\"color: green\">Admin credentials verified</p>";
                display_detailed_table($conn);
            }
            else
            {
                display_default_table($conn);
                echo "<p style=\"color: red\">Invalid credentials</p>";
            }
        }
        else
        {
            display_default_table($conn);
        }

        function display_default_table($conn)
        {
            
            echo "<h1>Here is a list of all members:</h1>";
            echo "<table class=\"outTable\">";
            echo "
                    <tr class=\"outTable\">
                    <th class=\"outTable\">Customer ID  </th>
                        <th class=\"outTable\">First Name </th>
                        <th class=\"outTable\">Last Name  </th>
                        <th class=\"outTable\">Home Phone  </th>
                    </tr>";
            
            $query = "SELECT * FROM customer";
            $result = $conn->query($query);
            if (!$result) die("Fatal Error");
            
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td class=\"outTable\">".htmlspecialchars($row['customer_id']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['first_name']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['last_name']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['home_phone']).'</td>';
                        echo "<tdr>";
                    }
            } 
            else 
            {
                echo "0 results";
            }

            echo <<<HERE
            <div id="wrapper">
                <article class="box-right">
                    <form method="post" action="">
                        <table>
                            <h1>For more detailed customer information, please provide admin credentials</h1>
                            <label>Admin Username:</label>
                            <input name="username" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                            <br>
                            <label>Admin Password:</label>
                            <input name="password" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                            <br>
                            <input type="submit" name="submit"  style="background-color: #302F2B; margin: 5px; color: #9E9E9E;">
                        </table>
                    </form>
                </article>
            </div>
HERE;
            $result->close();
        }

        function display_detailed_table($conn)
        {
            
            echo "<h1>Here is a detailed list of all members:</h1>";
            echo "<table class=\"outTable\">";
            echo "
                    <tr class=\"outTable\">
                    <th class=\"outTable\">Customer ID  </th>
                        <th class=\"outTable\">First Name </th>
                        <th class=\"outTable\">Last Name  </th>
                        <th class=\"outTable\">Address Line 1  </th>
                        <th class=\"outTable\">Address Line 2  </th>
                        <th class=\"outTable\">City  </th>
                        <th class=\"outTable\">State  </th>
                        <th class=\"outTable\">Zip  </th>
                        <th class=\"outTable\">Country  </th>
                        <th class=\"outTable\">Email  </th>
                        <th class=\"outTable\">Home Phone  </th>
                        <th class=\"outTable\">Cell Phone  </th>
                        <th class=\"outTable\">User ID  </th>
                        <th class=\"outTable\">Password  </th>
                    </tr>";
            
            $query = "SELECT * FROM customer";
            $result = $conn->query($query);
            if (!$result) die("Fatal Error");
            
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td class=\"outTable\">".htmlspecialchars($row['customer_id']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['first_name']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['last_name']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['address_1']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['address_2']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['city']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['state']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['zip']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['country']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['email']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['home_phone']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['cell_phone']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['user_id']).'</td>';
                        echo "<td class=\"outTable\">".htmlspecialchars($row['password']).'</td>';
                        echo "<tdr>";
                    }
            } 
            else 
            {
                echo "0 results";
            }


            $result->close();
        }

        $conn->close();
    ?>
    <script>
        document.getElementById("customers").innerHTML = "<u>Current Members</u>";
    </script>
    </body>
</html>