<!--PHP code to handle input from Transfer Money page, validate it, make changes to the databases, and give appropriate message-->
<!-- <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    Navigation bar
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
    </section> -->


<?php
// require('charge.php');
$username = "root";
$password = "arpit@0304";
$database = "service";
$mysqli = new mysqli("localhost", $username, $password, $database);

require_once('stripe-php-8.8.0/init.php');
\Stripe\Stripe::setApiKey('sk_test_51LEbn0SEIVS8XCgMBlhMYeqdSnlI1F6B6UHpZW52NpmVX6xmB2Bvw1mZONLthqY4fMQL7spiWJOMYdv17WyEFUnx00iTyZ7E52');
    // Getting input from the Transfer Money Form
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $name = $POST['name'];
    $email = $POST['email'];
    $course = $POST['course'];
    $token = $POST['stripeToken'];

    if($result = $mysqli->query("SELECT * from courses where ID = $course")){
        $row=$result->fetch_assoc();
        $price=$row['Price'];
        $course_name=$row['Name'];
        $result->close();
    }

    $customer = \Stripe\Customer::create(array(
        "name" => $name,
        "source" => $token
    ));
      $charge = \Stripe\PaymentIntent::create([
        'amount' => $price,
        'currency' => 'inr',
        "description" => $course_name,
        // 'payment_method_types' => ['card'],
        "customer" => $customer->id
    ]);
    // print_r($charge);
    
    $studentData=[
        'id' => $charge->customer,
        'name' => $name,
        'email' => $email
    ];
    
//4242 4242 4242 4242
$student_check = false;
    if ($mysqli->query("INSERT INTO students(id,name,email) VALUES('$charge->customer','$name', '$email')")) {
        $student_check=true;
    }

    $transaction_check = false;
    if ($mysqli->query("INSERT INTO transactions(id,customer_id,product,amount,currency) VALUES('$charge->id','$charge->customer', '$charge->description', '$charge->amount', '$charge->currency')")) {
        $transaction_check=true;
    }
    // If executed successfully, go to success.php page
    if ($student_check&&$transaction_check) {
        header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
    }
    else {
        echo 'Error description: '.$mysqli->error;
    }

    
?>

