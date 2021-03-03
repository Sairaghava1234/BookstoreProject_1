<html>
<head>
	<title>The BookStore</title>
</head>
<style type="text/css">
/*
	body {
		background-image: url("ASX.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%;
	}
*/
    .backy
    {
       background-image: url("images/ASX.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%; 
        height: 550px;
    }
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #333;
	}
    footer
    {
       background-color: #1e212d;
        text-align: center;
        color: white;
        margin-top: 40px;
        height: 45;
    }

	li {
	  float: left;
	}

	li a {
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	/* Change the link color to #111 (black) on hover */
	li a:hover {
	  background-color: #eabf9f;
	}
	.active {
		background-color: #eabf9f;
	}
	#title {
		color: blue;
	}
/*
        p
    {
        color: #B0B0B0;
    }
*/
    .box {
  box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12);
  min-height: 200px;
        padding: 20px;
        text-align: center;
  width: 50vw;
  margin: 50px auto;
  background: white;
  border-radius: 5px;
}
    .box1{
        box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12);
        padding: 20px;
        text-align: center;
  width: 50vw;
  margin: 20px auto;
  background: white;
  border-radius: 5px;
    }
    input
    {
        float: right;
    }
    .radio ul{
        display:inline-table;
        background-color: white;
        float:right;
    }
       .prep{
        font-family: cursive;
        margin-left: 300px;
        color: #faf3e0;
        font-size: 30px;
    }
</style>
<body>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="store.php">BookStore</a></li>
		<li><a class="active" href="checkout.php">Checkout</a></li>
        <li><div class="prep">Online Book Store</div></li>
	</ul>    
    <div class="backy">
        <div class="box1">
<?php
require("mysqli_connect.php");
session_start();
$bookID = $_GET['bookid'];
// $bookPRICE = $_GET['price'];
// $Quantity = $_GET['quantity'];
// $Author = $_GET['author'];
// echo $bookID;

$q = "select * from BookInventory where bookid = ?";
$r = @mysqli_query($dbc, $q);

// Prepare the statement:
$stmt = mysqli_prepare($dbc, $q);

// Bind the variables:
mysqli_stmt_bind_param($stmt, 's', $bookID);
// echo $bookID;

// Execute the query:
mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);
$res = $stmt->get_result();


while ($row = $res->fetch_array()) {
echo "<h3>Selected Book <span id='title'>",  $row['booktitle'], "</span></h3>";

	// echo "<br><strong>Title: </strong>", $row['booktitle'];
	// echo "<br><strong>Price: </strong>", $row['price'];
	// echo "<br><strong>Quantity: </strong>", $row['quantity'];
	// echo "<br><strong>Author: </strong>", $row['author'];
	$quantity = $row['quantity'];
	$price = $row['price'];
	$booktitle = $row['booktitle'];
	# code...
}
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if($quantity <= $_POST['quantity'] || $_POST['quantity'] < 0)
    {
        echo "<p><strong>Required quantity not available</strong></p>";
    }
    else
{
    echo "<br><b>Quantity booked: </b>".$_POST['quantity'];
    echo "<br><b>Book Title: </b>".$booktitle;
   
   $quantity -=$_POST['quantity'];
  
    echo "<br><b>Quantity after update : </b>". $quantity;
    $updatestatement = mysqli_prepare($dbc, "UPDATE BookInventory SET quantity = ? WHERE bookid = ?");
            mysqli_stmt_bind_param($updatestatement, 'ss',$quantity, $bookID);
            mysqli_stmt_execute($updatestatement);
            // header('Location:index.php');


            $orderInsertQuery = "insert into BookInventoryOrder(firstname, lastname, item_ordered, quantity_ordered) values('{$_POST['firstname']}','{$_POST['lastname']}','$booktitle', {$_POST['quantity']})";
            $row = mysqli_query($dbc, $orderInsertQuery);
    }
}
?>
        </div>
    <div class="box">
    <form action="#" method="POST">
        <h3>Fill Out the form</h3>
        <p><b>Firstname: </b><input type='text' name='firstname' required></p>
        <p><b>Lastname: </b><input type='text' name='lastname' required></p>
        <p><b>Quantity required: </b><input type='number' name='quantity' required></p>
        
        <div class="radio">
        <b>Payment Options: </b>
            <ul>
                <li>
			<input type="radio" name="paymentmethod"
			<?php if (isset($paymentmethod) && $paymentmethod=="cred/deb") 
			echo "checked"
			// <p><b>enter the card Number: </b><input type='text' name='cardnumber' required></p>"
			?>
			value="cred/deb">Credit/debit
                </li>
                <li>
			<input type="radio" name="paymentmethod"
			<?php if (isset($paymentmethod) && $paymentmethod=="COD") echo "checked";?>
			value="COD">Cash on Delivery
                </li>
                <li>
			<input type="radio" name="paymentmethod"
			<?php if (isset($paymentmethod) && $paymentmethod=="gift") echo "checked";?>
			value="gift">Giftcards
                </li>
            </ul>
        </div>
        <p><input type='submit' value='CheckOut'>

    </form>
    </div>
    </div>
</body>
     <footer>@Copyright-Onlinebookstore.com</footer>
</html>


