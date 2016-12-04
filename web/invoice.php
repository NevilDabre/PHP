<?php
/*
cody by Moon Sun Choi and Neville Dabre

*/
	/*
	personal info 
	*/
	$name = $_POST["name"];	
    $email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];	
	$postal = $_POST["postal"];	
	$province = $_POST["provinces"];
	if(empty($name)|| empty($email) || empty($phone) || empty($address) || empty($postal)){		
		header('Location: ./shoppinglist.php');
	}
	$taxProvince = [
	"AB"=>"0.05",
	"BC"=>"0.12",
	"MB"=>"0.13",
	"NB"=>"0.15",
	"NL"=>"0.13",
	"NS"=>"0.05",
	"NT"=>"0.15",
	"NU"=>"0.05",
	"ON"=>"0.13",
	"PE"=>"0.14",
	"QC"=>"0.14975",
	"SK"=>"0.10",
	"YT"=>"0.05"
		];
	/*
	product info 
	*/
	$cartitems = $_POST["buyitem"];
	$product1Price = $_POST["product1Price"];
	$product2Price = $_POST["product2Price"];
	$product3Price = $_POST["product3Price"];
	$p1Quantity = $_POST["p1Quantity"];
	$p2Quantity = $_POST["p2Quantity"];
	$p3Quantity = $_POST["p3Quantity"];
	$productNM1 = $_POST["productNM1"];
	$productNM2 = $_POST["productNM2"];
	$productNM3 = $_POST["productNM3"];
	$totalCost = 0;
	$totalP1Cost = 0;
	$totalP2Cost = 0;
	$totalP3Cost=0;

	if(empty($cartitems)) 
	{
		//header('Location: ./shoppinglist.php');
	}
	else{
		$itemCnt = count($cartitems); 
		
		for($i=0; $i < $itemCnt; $i++)
		{
			if($cartitems[$i]=="product1")
			{				
				$totalP1Cost = $product1Price*$p1Quantity;
				//echo $totalP1Cost;
			}
			if($cartitems[$i]=="product2")
			{
				$totalP2Cost = $product2Price*$p2Quantity;
				//echo $totalP2Cost;
			}
			if($cartitems[$i]=="product3")
			{
				$totalP3Cost = $product3Price*$p3Quantity;
				//echo $totalP3Cost;
			}			
		}
		$totalCost = $totalP1Cost+$totalP2Cost+$totalP3Cost;
		echo $totalCost;
	}
	
	$provinceTax = $totalCost * $taxProvince[$province];
	$finalCost = $totalCost + $provinceTax;
	$finalCost = round($finalCost,2);
	
	
	countDelivery();
	
	function countDelivery()
	{
		global $delivery;
		global $deliveryDt;
		if($GLOBALS['finalCost']>75)
		{
			$delivery = 6;			
			$deliveryDt = date("Y m d", strtotime("+4 days"));
		}
		else if($GLOBALS['finalCost']>50.00 && $GLOBALS['finalCost']<=75)
		{
			$delivery = 5;
			$deliveryDt = date("Y m d", strtotime("+3 days"));
		}
		else if($GLOBALS['finalCost']>25.00 && $GLOBALS['finalCost']<=50)
		{
			$delivery = 4;
			$deliveryDt = date("Y m d", strtotime("+1 days"));
		}else{
			$delivery = 3;
			$deliveryDt = date("Y m d", strtotime("+1 days"));
		}
		
	}	
	$finalCost = $finalCost + $delivery;
	$provinceTax = round($provinceTax,2);
	

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Order Details</title>
		<link rel="stylesheet" type="text/css" href="./css/common_menu.css" title="main" />
		<link rel="stylesheet" type="text/css" href="./css/style.css">         
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="./js/script.js"></script>
	</head>        
	<body>
		<header class="wrapper">
			<div id="logo">
				<p><img src="./img/logo.jpg" alt="company logo" width="30" height="30"/></p>
			</div>
			<div id="intro">
				<p>Welcome to Diamond Fashion Store</p>
			</div>
		</header>
		<nav>
			<ui>
				<li><a href="index.html">Home</a></li>
				<li><a href="shoppinglist.php">Shopping List</a></li>
				<li><a href="contactus.html">Contact US</a></li>
				<li><a href="login.php">Register/Login</a></li>
			</ui>
		</nav>
		<article>
			<div class="container">
<?php
	echo "<h2 class='text-primary'> Thank you for Shopping with US! </h2>";
	echo "<h3 class='text-success'> Your order is processed, please verify the information</h3><br>";	
	echo "<p class='text-info'><strong>Shipping To:</strong> <address>
	<strong>".$name."</strong></p>".
	$address.$province."<br>".$postal."<br>
	<abbr title='Phone'>P:</abbr>".$phone."
	</address>";	
	echo "<br><p class='text-left'><strong>*Order Information:</strong></p>";
?>					
	

		<article>
			
		<div class="table-responsive" style="width:75%">
			  <table class="table">
				<tr class="Danger">
					<td class="col-md-2">No.</td>
					<td class="col-md-12">Product Name</td>
					<td class="col-md-4" style="text-align: center;">Quantity</td>
					<td class="col-md-8" style="text-align: right;">Price</td>
				</tr>
<?
 		for($i=0; $i < $itemCnt; $i++)
		{			
			if($cartitems[$i]=="product1")
			{				
?>
				<tr class="Success">
					<td class="col-md-2"><?php echo 1+". ";?></td>		
					<td class="col-md-12"><?php echo $productNM1;?></td>
					<td class="col-md-4"><?php echo $p1Quantity;?></td>
					<td class="col-md-8"><?php echo "$".$totalP1Cost;?></td>
				</tr>
<?	
			}
			if($cartitems[$i]=="product2")
			{
?>
				<tr class="Success">	
					<td class="col-md-2"><?php echo 2+". ";?></td>	
					<td class="col-md-12"><?php echo $productNM2;?></td>
					<td class="col-md-4"><?php echo $p2Quantity;?></td>
					<td class="col-md-8"><?php echo "$".$totalP2Cost;?></td>
				</tr>
<?	
			}
			if($cartitems[$i]=="product3")
			{
?>
				<tr class="Success">	
					<td class="col-md-2"><?php echo 3+". ";?></td>	
					<td class="col-md-12"><?php echo $productNM3;?></td>
					<td class="col-md-4"><?php echo $p3Quantity;?></td>
					<td class="col-md-8"><?php echo "$".$totalP3Cost;?></td>
				</tr>
<?					
			}			
		}
 ?>      
				<tr class="info">
					<td class="col-md-2"></td>	
					<td class="col-md-12">Tax.</td>
					<td class="col-md-4"></td>
					<td class="col-md-8" style="text-align: right;"><?php echo "$".$provinceTax; ?></td>
				</tr>
				<tr class="info">
					<td class="col-md-2"></td>	
					<td class="col-md-12">Delivery.</td>
					<td class="col-md-4"></td>
					<td class="col-md-8" style="text-align: right;"><?php echo "$".$delivery; ?></td>
				</tr>
				<tr class="info">
					<td class="col-md-2"></td>	
					<td class="col-md-12">Total Order.</td>
					<td class="col-md-4"></td>
					<td class="col-md-8" style="text-align: right;"><?php echo "$".$finalCost; ?></td>
				</tr>
				<tr class="warning"> 
					<td class="col-md-2"></td>	
					<td class="col-md-12">Estimated Delivery Date.</td>
					<td class="col-md-4"></td>
					<td class="col-md-8" style="text-align: right;"><?php echo $deliveryDt; ?></td>
				</tr>
			</table>
			
			</div>
			
 
  <a href="index.html" class="btn btn-info" role="button">Back</a>
</div>
		<footer>
			<p>Website By Neville &copy;</p>
			<p>Tel. 519-577-0354</p>
			<p>E-mail. neville.dabre@gmail.com</p>
		</footer> 				
	</body>    
</html>






