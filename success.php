<!--HTML CODE FOR STRUCTURE OF PAGE FORM-->
<?php
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>
<html>

<head>
    <title>Students Point</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body {
            
  background-color: white;

        }

        .payment {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding-bottom: 20px;
            border: 1px solid #f2f2f2;
            min-height: 280px;
            border-radius: 20px;
            background: #fff;
        }

        .payment_header {
            background: rgb(1,9,32);
            padding: 20px;
            border-radius: 20px 20px 0px 0px;

        }

        .check {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .check i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .content {
            
            text-align: center;
        }

        .content h1 {
            font-size: 25px;
            padding-top: 25px;
        }

        .h-row{
            display: flex;
            /* align-items:stretch; */
            text-align: center;
            justify-content: space-between;
            padding: 0 20px 10px 35px;

        }
        .h-row div{
            padding-right: 20px;
        }
        a{
            height:65px;
        }
        .stu{
            vertical-align: text-bottom;
        }
        /* .content a:hover {
            text-decoration: none;
            background: #000;
        }*/
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    </div>
                    <div class="content">
                        <h1><?php echo $product?> Course Purchased !</h1>
                        <p>Your Money has been debited.<br>Your transaction ID is <?php echo $tid; ?></p>
                        <div class = "h-row">
                            <div><a href = "transfer.php" class = "h-button">Go Back</a></div>
                            <div><a href = "transactions.php" class = "h-button">Transaction Records</a></div>
                            <div class = "stu"><a href = "students.php" class = "h-button">Students</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
