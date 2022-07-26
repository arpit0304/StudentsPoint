<!--PHP code for transaction records page -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body class="transaction">
    <section class="customer-head">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="courses.php">COURSES</a></li>
                    <li><a href="buy.php">BUY</li>
                    <li><a href="students.php">STUDENTS</a></li>
                    <li><a href=""><b>TRANSACTIONS</b></a></li>
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

    $query = "SELECT * FROM transactions";

    //Showing the contents of the 'transactions' table in tabular form.
    echo '<table> 
        <caption><b> Transaction Records </b></caption>
        <thead>
        <tr> 
            <th> <font face="Arial">S. No.</font> </th> 
            <th> <font face="Arial">ID</font> </th> 
            <th> <font face="Arial">Customer ID</font> </th> 
            <th> <font face="Arial">Course Purchased</font> </th> 
            <th> <font face="Arial">Price</font> </th> 
            <th> <font face="Arial">Purchasing Date & Time</font> </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual table rows
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["S. No."];
            $field2name = $row["id"];
            $field3name = $row["customer_id"];
            $field4name = $row["product"];
            $field5name = $row["amount"];
            $field6name = $row["currency"];
            $field7name = $row["created_at"];

            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'</td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td>'.$field4name.'</td>';
            echo '<td>'.$field5name.' '.strtoupper($field6name).'</td>';
            echo '<td>'.$field7name.'</td>';
            echo '</tr>';
        }
        echo '</tbody>';

        $result->free();
    }
    echo '</table>';
?>
</div>
<!--Transfer Money button-->
<div style="display : block; text-align : center; margin : auto auto 20px auto">
    <a href="transfer.php" class="h-button">Buy Course</a>
</div>
</body>
</html>
