<?php
/*
cody by Moon Sun Choi and Neville Dabre

*/
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Shopping List</title>
            <link rel="stylesheet" type="text/css" href="./css/common_menu.css" title="main" />
            <link rel="stylesheet" type="text/css" href="./css/style.css">  
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">       
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="./js/script.js"></script>			
<script>
	function ValidateCart()
	{
		var cartitem = document.getElementsByName("buyitem[]");
		var resultFlg = false;
		for(i=0; i<cartitem.length; i++){
			if (cartitem[i].checked) {
				resultFlg = true;
			}
		}
		if (resultFlg== true){
			return ValidateForm();
		}else{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Please choose an Item.</font>";
			return false;
		}
		
		//return false;
	}
</script>
        </head>        
        <body>
			<div class="container">
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
			<form name="cartfrm" class="form-horizontal"  action="invoice.php" onsubmit="return ValidateCart();" method=post>
			<input type=hidden name="product1Price" id="product1Price" value="55">
			<input type=hidden name="product2Price" value="35.72">
			<input type=hidden name="product3Price" value="85.20">
			<input type=hidden name="productNM1" value="Tommy Hilfiger Rosalind Splitnck Dr - Graphic Floral Dress">
			<input type=hidden name="productNM2" value="Ray-Ban Women's Erika Wayfarer Sunglasses">
			<input type=hidden name="productNM3" value="Valuker Women's Down Coat With Fur">
				


		<div class="col-md-3 store-menu">
            <ul class="nav">
                <li><a><i class="fa fa-angle-right"></i>Ethnic Wear</a></li>
                <li><a><i class="fa fa-angle-right"></i>Western Wear </a></li>
                <li><a><i class="fa fa-angle-right"></i>Sportswear </a></li>
                <li><a><i class="fa fa-angle-right"></i>Swim</a></li>
                <li><a><i class="fa fa-angle-right"></i>Sunglasses</a></li>
                <li><a><i class="fa fa-angle-right"></i>Winter Jackets</a></li>
                <li><a><i class="fa fa-angle-right"></i>Watches</a></li>
                <li><a><i class="fa fa-angle-right"></i>Suits and Blazers</a></li>
				<li><a><i class="fa fa-angle-right"></i>Shorts</a></li>
				<li><a><i class="fa fa-angle-right"></i>Skirts</a></li>
				<li><a><i class="fa fa-angle-right"></i>Swim</a></li>
				<li><a><i class="fa fa-angle-right"></i>Hoodies and Sweatshirts</a></li>
            </ul>
        </div>
				<div id="items">
					<div id="check">
						<input type="checkbox" name="buyitem[]" value="product1"/>
					</div>
					<div id="pic">
						<img  class="thumbnail zoom" id="imgView" src="./img/dress.jpg" alt="Tommy Hilfiger Rosalind Splitnck Dr - Graphic Floral Dress" width="150" height="150"/>
					</div>
					<div id="details" class="wrapper">
						<h5 class="alert alert-success" role="alert">Tommy Hilfiger Rosalind Splitnck Dr - Graphic Floral Dress</h5>
						 <ul>
							 <li>   92% Cotton/8% Elastane </li>
							 <li>    Machine Wash </li>
							 <li>   Machine Wash </li>
							 <li>   Knit Dress </li>
							 <li>   Casual </li>
						</ul>
						<table>
							<tr>
								<td class="w30">Price</td>
								<td>
									$55.00
								</td>
							</tr>
							<tr>
								<td class="w30">Quantity</td>
								<td>
									<select name="p1Quantity">
										<option value="1" selected>1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</td>
							</tr>
						</table>						
					</div>
				</div><br>
				<div id="items">
					<div id="check">
						<input type="checkbox"  name="buyitem[]" value="product2"/>
					</div>
					<div id="pic">
						<img  class="thumbnail zoom"  id="imgView" src="./img/rayban.jpg" alt="Ray-Ban Women's Erika Wayfarer Sunglasses" width="150" height="150"/>
					</div>
					<div id="details" class="wrapper">
						<h5  class="alert alert-success" role="alert">Ray-Ban Women's Erika Wayfarer Sunglasses</h5>
						
						 <ul>
							 <li>Wayfarer-style sunglasses featuring gradient lenses and metal arms with tonal temple tips.</li>
							<li>Ray-Ban sizes refer to the width of one lens in millimeters and lenses are prescription ready (Rx-able).  </li>

						</ul>
						<table>
							<tr>
								<td class="w30">Price</td>
								<td>
									$35.72
								</td>
							</tr>
							<tr>
								<td class="w30">Quantity</td>
								<td>
									<select name="p2Quantity">
										<option value="1" selected>1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</td>
							</tr>
						</table>						
					</div>
				</div><br>
				<div id="items">
					<div id="check">
						<input type="checkbox"  name="buyitem[]" value="product3"/>
					</div>
					<div id="pic">
						<img  class="thumbnail zoom"  id="imgView" src="./img/jacket.jpg" alt="Valuker Women's Down Coat With Fur" width="150" height="150"/>
					</div>
					<div id="details" class="wrapper">
						<h5 class="alert alert-success" role="alert">Valuker Women's Down Coat With Fur</h5>
						
						 <ul>
							 <li>   The fur collar has been improved, and is not easy to shed.</li>
							 <li>   The material of the buttons has been replaced by metal.  </li>
						</ul>
						<table>
							<tr>
								<td class="w30">Price</td>
								<td>
									$85.20
								</td>
							</tr>
							<tr>
								<td class="w30">Quantity</td>
								<td>
									<select name="p3Quantity">
										<option value="1" selected>1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</td>
							</tr>
						</table>						
					</div>
				</div><br>


				<div>

				<p id="title2">Personal Information</p>
				<p id="errmsg"></p>
				<div class="form-group">
      			<label class="control-label col-sm-2" for="Name">Name:</label>
      			<div class="col-sm-10">
        		<input type="text" id="name" name="name" placeholder="Enter Name" class="form-control"/>
      			</div>
    			</div>

				<div class="form-group">
      			<label class="control-label col-sm-2" for="Phone Number">Phone Number:</label>
      			<div class="col-sm-10">
        		<input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control"/>
      			</div>
    			</div>

				<div class="form-group">
      			<label class="control-label col-sm-2" for="Email">Email:</label>
      			<div class="col-sm-10">
        		<input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" />
      			</div>
    			</div>


				<div class="form-group">
      			<label class="control-label col-sm-2" for="Address">Address:</label>
      			<div class="col-sm-10">
        		<input type="text" rows = 20 cols = 30 id="address" name="address" placeholder="Enter Address" class="form-control"/>
      			</div>
    			</div>

				<div class="form-group">
      			<label class="control-label col-sm-2" for="Zip Code">Postal Code:</label>
      			<div class="col-sm-10">
        		<input type="text" id="postal" name="postal" placeholder="N2P1A3" class="form-control"/>
      			</div>
    			</div>

				<div class="form-group">
      			<label class="control-label col-sm-2" for="Provience">Select Your Province</label>
      			<div class="col-sm-10">
        		<select class="form-control" name="provinces">	
						<option value="AB">Alberta</option>
						<option value="BC">British Columbia</option>
						<option value="MB">Manitoba</option>
						<option value="NB">New Brunswick</option>
						<option value="NL">Newfoundland and Labrador</option>
						<option value="NS">Nova Scotia</option>
						<option value="NT">Northwest Territories</option>
						<option value="NU">Nunavut</option>
						<option value="ON">Ontario</option>
						<option value="PE">Prince Edward Island</option>
						<option value="QC">Quebec</option>
						<option value="SK">Saskatchewan</option>
						<option value="YT">Yukon</option>
					</select>
      			</div>
    			</div>
				<div class="form-group">
					
				<div id="buttons">
					<div class="col-sm-8">
				<input class="btn btn-success" type="submit" value="Buy">
				<input class="btn btn-info" type="reset" value="Reset">
				</div>
			</div>
			</div>
			</div>

			
			</div>		
			
			<article>
		<footer>
			<p>Website By Neville &copy;</p>
			<p>Tel. 519-577-0354</p>
			<p>E-mail. neville.dabre@gmail.com</p>
		</footer>
		</form>	 
		</div>					
	</body>    	
</html>