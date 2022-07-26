<?php
    $username = "root";
    $password = "arpit@0304";
    $database = "service";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    if ($total= $mysqli->query("SELECT COUNT(SNo) AS Total FROM students")) {
        $row=$total->fetch_assoc();
        $total_num=$row['Total'];
        $total->close();
    }
    if ($result=$mysqli->query("SELECT SUM(amount) AS Total FROM transactions")) {
        $row=$result->fetch_assoc();
        $sum=$row['Total'];
        $result->close();
    }
?>

<!--HTML code for the home page-->
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Point</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="header">
        <!--Navigation bar-->
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href=""><b>HOME</b></a></li>
                    <li><a href="courses.php">COURSES</a></li>
                    <li><a href="buy.php">BUY</li>
                    <li><a href="students.php">STUDENTS</a></li>
                    <li><a href="transactions.php">TRANSACTIONS</a></li>
                    <li><a href="#contact">CONTACT US</a></li>
                </ul>
                </div>
        </nav>             
        <div class="textbox">
            <h1>Students Point</h1>
            <p>
                Providing all types of programming courses at one place.<br><br> For more features and highlights press the below butten.
            </p>
            <br>
            <a href="#services" class="hero-btn">Scroll Down For More</a>
        </div>
    </section>
    <section class = "service" id = "services">
        <!--Services flexbox-->
        <h1>Services We Offer</h1>
        <p>
            Avail the best courses at affordable price, from the comfort of your home!
        </p>

        <div class="row">
            <div class="service-col">
                <h3><?php echo $total_num ?>+<br>Students</h3>
                <p>Check out the student details, from the Students tab in the navigation bar</p>
            </div>
            <div class="service-col">
                <h3><i class="fa fa-inr" style="font-size:17px"></i><?php echo $sum ?>+<br>of total transactions</h3>
                <p>Find out the details about transactions which have taken place.</p>
            </div>
            <div class="service-col">
                <h3>Pay Once<br>Use Anytime</h3>
                <p>Pay once to get life-time courses with 24x7 doubt support.</p>
            </div>
        </div>
    </section>

<!--Call to action-->

    <section class="cta" id="contact">
        <h1>Have any doubts or queries?</h1>
        <a href="" class="hero-btn">CONTACT US</a>
    </section>

<!--footer-->
    <section class="footer">
        <h1>About Us</h1>
        <p>Check out the source code down below on Github.</p>
        <div class="icons">
            <a href="https://github.com/arpit0304" target="_blank" rel="noopener noreferrer"><i class="fa fa-github fa-2x"></i></a>
            <a href="https://www.linkedin.com/in/arpit-jain-b165101b3/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin fa-2x"></i></a>
        </div>
        <p>Made by Arpit Jain &copy; 2022</p>
    </section>

</body>