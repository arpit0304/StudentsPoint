<!--PHP code for the customers list page--> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer List</title>
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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="customers.php">CUSTOMER LIST</a></li>
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

    $query = "SELECT * FROM customers";

    //showing contents of 'customers' table, in tabular form.
    echo '<table> 
        <caption><b> Customer List </b></caption>
        <thead>
        <tr> 
            <th> <font face="Arial">ID</font> </th> 
            <th> <font face="Arial">Name</font> </th> 
            <th> <font face="Arial">Email</font> </th> 
            <th> <font face="Arial">Phone Number</font> </th> 
            <th> <font face="Arial">Current Balance</font> </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual rows from the 'customer' table.
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["ID"];
            $field2name = $row["Name"];
            $field3name = $row["Email"];
            $field4name = $row["Phone"];
            $field5name = $row["Balance"];

            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'</td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td>'.$field4name.'</td>';
            echo '<td>'.$field5name.'</td>';
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
    <a href="transfer.php" class="h-button">Transfer Money</a>
</div>
</body>
</html>
