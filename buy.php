<!--PHP code for Transfer Money page-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy Your Course</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<body>
    <!--Navigation Bar-->
    <section class="customer-head">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="courses.php">COURSES</a></li>
                    <li><a href=""><b>BUY</b></li>
                    <li><a href="students.php">STUDENTS</a></li>
                    <li><a href="transactions.php">TRANSACTIONS</a></li>
                    <li><a href="#contact">CONTACT US</a></li>
                </ul>
                </div>
        </nav>             
    </section>

<div>
<?php
    //Connecting to the local SQL database. If hosting online, credentials will change. Everything else remains the same.
    $username = "root";
    $password = "arpit@0304";
    $database = "tsf_database";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    $query = "SELECT * FROM courses";

    //creating Transfer Money form. The input is sent to 'handler.php' for further processing.
    ?>
    <div class="container">
        <form method = "post" action = "handler.php" id = "payment-form">
            <div class="form-row">
                <h2 style = "color : rgb(10,30,63); margin-left : 10px;"> Buy Course</h2><br>
                
                <!-- //creating Select Sender dropdown -->
                <!-- <select name = "sender" required>
                    <option selected disabled value = "">Choose Sender</option>

                         //Each Sender option is read from the 'customers' table and printed out. -->
                        
                         <label for = "name"> Enter your name :</label><br>
                <input type="text" name = "name" placeholder="Name">
                <br>
                <label for = "email"> Enter your email :</label><br>
                <input type="email" name = "email" placeholder="Email">
                <br>
                <!-- creating Select Receiver dropdown -->
                <select name = "course" required>
                <?php
                    if(!empty($_GET['tid'])) {
                        $tid = $_GET['tid'];
                        echo $tid;
                        $res=$mysqli->query("SELECT * FROM courses WHERE courses.ID=$tid");
                        $ro=$res->fetch_assoc();
                        $tname=$ro["Name"];
                        $tprice=$ro["Price"];
                        echo '<option selected="selected" value='.$tid.' required>'.$tname.'  '.$tprice.'</option>';
                    } else {
                        echo '<option selected disabled value = "">Choose your Course</option>';
                    }
                ?>
                    

                        <!-- Each Receiver option, read from 'courses' table. -->
                        <?php
                        if ($result = $mysqli->query($query)) {

                            while ($row = $result->fetch_assoc()) {
                                $field1name = $row["ID"];
                                $field2name = $row["Name"];
                                $field3name = $row["Price"];

                                echo '<option value ='.$field1name.' required>'.$field2name.'             <i class="fa fa-inr"></i>'.$field3name.'</option>';
                                
                            }

                        $result->free();
                    }
                    ?>
                </select>
                <br>
                
                <div id="card-element" class="form-control">
                    <!-- a Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
                <br>
            </div>
            <button class = "h-button">Submit</button>
        
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="charge.js"></script>
</div>
</body>
</html>
