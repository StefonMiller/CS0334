<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="../css/final_project.css">
    </head>
    <body>
    <?php
        include '../html/navbar.html';

        echo "<h1>Fill out the following form and press Submit to join. Fields with a * are required:</h1>";

        require_once 'login.php';     
        $conn = mysqli_connect($hn, $un, $pw, $db);


        if(isset($_POST['submit']))
        {
            //Get values from form
            $fName = $_POST['first_name'];
            $lName = $_POST['last_name'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $country = $_POST['country'];
            $email = $_POST['email'];
            $home_phone = $_POST['home_phone'];
            $cell_phone = $_POST['cell_phone'];
            $user_id = $_POST['user_id'];
            $password = $_POST['password'];
            
            $err = "";
            $err .= validateText($fName, "first name");
            $err .= validateText($lName, "last name");
            $err .= validateText($city, "city");
            $err .= validateText($state, "state");
            $err .= validateNum($zip, "zip code");
            $err .= validateText($country, "country");
            $err .= validateNum($home_phone, "home phone");
            $err .= validateNum($cell_phone, "cell phone");
            $err .= validateID($user_id);
            $err .= validatePW($password);

            if(!$err == "")
            {
                echo "<p style=\"color: red\">$err</p>";
                displayForm();
            }
            else
            {
                //insert data into mysql
                $query = "INSERT INTO customer(customer_id, last_name, first_name, address_1, address_2, city, state, zip, country, email, home_phone, cell_phone, user_id, password)
                VALUES
                (DEFAULT, \"$lName\", \"$fName\", \"$address1\", \"$address2\", \"$city\", \"$state\", \"$zip\", \"$country\", \"$email\", \"$home_phone\", \"$cell_phone\", \"$user_id\", \"$password\")";

                $result = mysqli_query($conn, $query);
            
                displayForm();

                if($result)
                {
                    echo "<p style=\"color: green\">You have successfully signed up!</p>";
                }
                else
                {
                    echo "<p style=\"color: red\">Error when signing up.</p>";
                }
            }

            mysqli_close($conn);
        }
        else
        {
            displayForm();
        }


        function validateText($var, $field)
        {
            if(preg_match('/[^A-Za-z ]/', $var))
            {
                return "Please only use letters for $field.<br>";
            }
        }
        function validateNum($var, $field)
        {
            if(!preg_match('/^$|[^A-Za-z]+$/', $var))
            {
                return "Please only use numbers for $field.<br>";
            }
        }
        function validateID($var)
        {
            if(strlen($var) < 8)
            {
                return "Please enter a user ID of 8 characters or more.<br>";
            }
        }
        function validatePW($var)
        {
            if(strlen($var) < 8 || !preg_match('/[^A-Za-z]+$/', $var))
            {
                return "Please select a password at least 8 characters long with at least 1 number.<br>";
            }
        }



        function displayForm()
        {
            echo <<<HERE
            <div id="wrapper">
                <section id="top area">
                    <article class="box-right">
                        <form method="post" action="">
                            <table>
                                <tr><p>
                                    <td><label>*First Name:</label></td>
                                    <td><input name="first_name" placeholder="Only letters" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Last Name:</label></td>
                                    <td><input name="last_name" placeholder="Only letters" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Address Line 1:</label></td>
                                    <td><input name="address1" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>Address Line 2:</label></td>
                                    <td><input name="address2" placeholder="Apartment number, etc." type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*City:</label></td>
                                    <td><input name="city" placeholder="Only letters" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p></tr>
                                <tr><p>
                                    <td><label>*State:</label></td>
                                    <td><input name="state" placeholder="Only letters" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Zip Code:</label></td>
                                    <td><input name="zip" placeholder="Only numbers" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Country:</label></td>
                                    <td><input name="country" placeholder="Only letters" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*E-Mail:</label></td>
                                    <td><input name="email" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Home Phone:</label></td>
                                    <td><input name="home_phone"  placeholder="Only numbers" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p></tr>
                                <tr>
                                <p>
                                    <td><label>Cell Phone:</label></td>
                                    <td><input name="cell_phone" placeholder="Only numbers" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*User ID:</label></td>
                                    <td><input name="user_id" placeholder="8 character min." required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                                <p>
                                    <td><label>*Password:</label></td>
                                    <td><input name="password" placeholder="8 character min. at least 1 #" required="required" type="text" style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p></tr>
                                <tr><p>
                                    <td><input type="submit" name="submit"  style="background-color: #302F2B; margin: 5px; color: #9E9E9E;"></td>
                                </p>
                            </table>
                        </form>
                    </article>
                </section>
            </div>
HERE;
        }
    ?>
    <script>
        document.getElementById("signup").innerHTML = "<u>Sign Up</u>";
    </script>
    </body>
</html>