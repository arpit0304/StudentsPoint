<!--PHP code for the customers list page--> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <section class="customer-head">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="courses.php">COURSES</a></li>
                    <li><a href="buy.php">BUY</li>
                    <li><a href="students.php"><b>STUDENTS</b></a></li>
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
    $database = "service";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    $query = "SELECT * FROM students";

    //showing contents of 'customers' table, in tabular form.
    echo '<table> 
        <caption><b> Students List </b></caption>
        <thead>
        <tr> 
            <th> <font face="Arial">S. No.</font> </th> 
            <th> <font face="Arial">ID</font> </th> 
            <th> <font face="Arial">Name</font> </th> 
            <th> <font face="Arial">Email</font> </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual rows from the 'customer' table.
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["SNo"];
            $field2name = $row["id"];
            $field3name = $row["Name"];
            $field4name = $row["Email"];

            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'</td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td>'.$field4name.'</td>';
            echo '</tr>';
        }
        echo '</tbody>';

        $result->free();
    }
    echo '</table>';
?>
</div>
<!--Transfer Money button-->
<div style="display : block; text-align : center; margin : auto auto 20px auto;">
    <a href="transfer.php" class="h-button">Buy Course</a>
</div>
</body>
</html>
