<html>
<head>
	<title>The BookStore</title>
</head>
<style type="text/css">
	body {
		background-repeat: no-repeat;
        background-color: #f6f6f6;
        background-size: 100% 100%;
	}
	header ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
        background-color: #1e212d;
        height: 46px;
	 
	}

	li {
	  float: left;
	}

	li a {
	  display: block;
	  color:white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}
    #wrapper li a 
    {
        color: black;
    }

	/* Change the link color to #111 (black) on hover */
	li a:hover {
	  background-color: #111;
    
	}
    #wrapper li a:hover{
        background-color:#eabf9f;
    }
	.active {
		background-color: #eabf9f;
	}
/*
	#wrapper {
		padding-left: 2%;
	}
	#wrapper ul {
		background-color: transparent;
		
	}
	#wrapper ul li {
		list-style-type: circle;
		margin: 2%;
	}
	#wrapper ul p {
		margin-left: : 50%;
		padding-left: 25%;
	}
*/

    #wrapper ul 
    {
         position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        margin-left: 320px;
        width: 600px;
       
    }
    #wrapper ul:hover{
        background-color: #eabf9f;
    }
    #wrapper p
    {
        text-align: right;
        padding: 10px;
    }
    pit
    {
        margin-left: 90px;
    }
    p
    {
        color: #B0B0B0;
        margin-left: 9px;
    }
    #wrapper p
    {
        color: black;
    }
/*
#wrapper ul:before, #wrapper ul:after
{
  content:"";
    position:absolute;
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:50%;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
}
*/
/*
#wrapper ul:after
{
  right:10px;
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg);
       -moz-transform:skew(8deg) rotate(3deg);
        -ms-transform:skew(8deg) rotate(3deg);
         -o-transform:skew(8deg) rotate(3deg);
            transform:skew(8deg) rotate(3deg);
}
*/
.top
    {
        background-color: #faf3e0;
        text-align: center;
        color: black;
        font-size: 19px;
    }
    .top1
    {
        background-color: #faf3e0;
        text-align: center;
        color: black;
        font-size: 19px;
    }
     footer
    {
       background-color: #1e212d;
        text-align: center;
        color: white;
        margin-top: 40px;
        height: 45;
    }
     .backy
    {
       background-image: url("ASX.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%; 
        height: 550px;
    }
       .prep{
        font-family: cursive;
        margin-left: 300px;
        color: #faf3e0;
        font-size: 30px;
    }
	
</style>
<body>
    <header>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a class="active" href="store.php">BookStore</a></li>
		<li><p>Check Out</p></li>
        <li><div class="prep">Online Book Store</div></li>
	</ul>
    </header>
    <div class="top">Available Books</div>
    <div class="top1">Please Select the Books and proceed to checkouts</div>
<?php
require("mysqli_connect.php");
session_start();

$q = "select * from BookInventory";
$r = mysqli_query($dbc, $q);
  while ($row = mysqli_fetch_array($r)){
	$bookID = $row['bookid'];
      $gotopage = $row['booktitle'];
	echo "<div id = 'wrapper'><ul>";
	echo "<li><a href = checkout.php?bookid=", $bookID, "><h3><u>", $row['booktitle'], "</u></h3></a></li>";
	echo "<p><strong>Price: </strong>", $row['price'], "</p>";
	echo "<p><strong>Quantity: </strong>", $row['quantity'], "</p>";
	echo "<p><strong>Author: </strong>", $row['author'], "</p>";
	echo "</ul></div>";

}
   
?>
</body>
    <footer>@Copyright-Onlinebookstore.com</footer>
</html>
