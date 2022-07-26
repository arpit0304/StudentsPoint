<?php
  require_once('stripe-php-8.8.0/init.php');
  require_once('db.php');
  require_once('pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_51LEbn0SEIVS8XCgMBlhMYeqdSnlI1F6B6UHpZW52NpmVX6xmB2Bvw1mZONLthqY4fMQL7spiWJOMYdv17WyEFUnx00iTyZ7E52');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
//  \Stripe\Charge::create(array(
//   "amount" => 5000,
//   "currency" => "usd",
//   "description" => "Intro To React Course",
//   "customer" => $customer->id
// ));

$charge = \Stripe\PaymentIntent::create([
  'amount' => 5000,
  'currency' => 'usd',
  "description" => "Intro To React Course",
  'payment_method_types' => ['card'],
  "customer" => $customer->id
]);
// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);