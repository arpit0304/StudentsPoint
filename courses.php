<!--PHP code for transaction records page -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courses</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body class="courses">
    <section class="customer-head">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href=""><b>COURSES</b></a></li>
                    <li><a href="buy.php">BUY</li>
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
    $database = "service";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    $query = "SELECT * FROM courses";

    //Showing the contents of the 'transactions' table in tabular form.
    echo '<table style = "width:50%"> 
        <caption><b> All Courses </b></caption>
        <thead>
        <tr> 
            <th> <font face="Arial">S. No.</font> </th> 
            <th> <font face="Arial">Course Name</font> </th> 
            <th> <font face="Arial">Price</font> </th> 
            <th> <font face="Arial">Buy</font></th>
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual table rows
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["ID"];
            $field2name = $row["Name"];
            $field3name = $row["Price"];
            $field4name = $row["description"];
            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'<br><button class="collapsible">Click for more</button>
            <div class="content">'.$field4name.'</div></td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td><a href="transfer.php?tid='.$field1name.'" class="h-button">Buy</a>';
            echo '</tr>';
        }
        echo '</tbody>';

        $result->free();
    }
    echo '</table>';
?>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</div>

</div>
</body>
</html>