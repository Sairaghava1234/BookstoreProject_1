<?php

?>
<html>
<head>
	<title>The BookStore</title>
</head>
<style type="text/css">
	body {
		
		background-repeat: no-repeat;
		background-size: 100% 100%;
	}
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #1e212d;
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
	  background-color: #111;
	}
	.active {
		background-color: #eabf9f;
	}
	p {
		margin: 0 10%;
		font-weight: bold;
		padding-right: 35%;
       padding-top: 12.5px;
        color: gray;
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
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="store.php">BookStore</a></li>
        <li><p>Checkout</p></li>
        <li><div class="prep">Online Book Store</div></li>
	</ul>
    <img src="images/image1.jpg" width="1350">
    <h1></h1>
    <h1></h1>
    <img src ="images/image3.jpg" width ="1350" height="500" margin-left:40px>
    <img src="images/image2.jpg" width="1350" height="500">
    <footer>@Copyright-Onlinebookstore.com</footer>
</body>
</html>