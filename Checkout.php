<?php require_once("PHP/Cart_Cookies/Cart_Cookie.php"); ?>
<?php require_once("PHP/Cart_Cookies/Cookie_Hash_Functions.php"); ?>
<!--
	Last Edited By: Sobhan
	Edit Date: 29-Nov-2020
	Edit Number: 6
	Edit Details:
		Cart
    Cart rows
    Allow Editing of item numbers
-->
<!-- PHP -->
<?php
    incrementCart();
    decrementCart();
    if(isset($_COOKIE["cart_cookie"]))
        $menu = cookieToHash($_COOKIE["cart_cookie"]);
    
?>  
<!-- ========================= End of Important PHP ========================= -->
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Cart | Dulceria China</title>
        <meta charset="UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <meta name = "keywords" content = "dulceria china, restaurant, bakery, home, cantonese, baked goods, buns, cart, complete order"/>
        <meta name = "description" content = "Ready to finish your purchase? Head down to our cart page!"/>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link type = "text/css" rel = "stylesheet" href = "Styles/template.css"/>
        <link type = "text/css" rel = "stylesheet" href = "Styles/menu items.css"/>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" 
		crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" 
		crossorigin=""></script>
		<script src ="JavaScript/map.js" type ="text/javascript" defer></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src ="JavaScript/checkout.js" type ="text/javascript" defer></script>
        <style type = "text/CSS"></style>
    </head>
    <body>
      <header>
        <nav>
            <table>
                <tr>
                  <th> <a href = "index.php" class = "logo"><img width="100" src="Styles/BakeryLogo.png" alt="Dulceria China logo" class = "logo"/> </a></th>
                    <th><a href = "index.php"> Home </a></th>
                    <th><a href = "menu.php"> Menu </a></th>
                    <!-- <th><a href = "order.html"> Order </a></th> -->
                    <th><a href = "about_us.php"> About Us </a></th>
                    <th><a href = "contact_us.php"> Contact Us </a></th>
                    <th><a href = "account.php"> Account </a></th>
                    
                    <th class="cart" id='cartIconTopRight'><a href="Cart.php" class = "current_page"><span class="qty" id= 'cartIconTopRightQuantity'><?php if(isSet($menu)) cartSize($menu); else echo("0");?></span><img src="Styles/Cart.png" alt="Cart.html" width="40px" height="40px"/></a></th>
                    
                </tr>
            </table>
        </nav>
    </header>

<form id = "checkoutForm" action = "succeed.php" method = "POST">    
	
		<table>
			
			<tr><div>
				<label for="name">Name: </label>
				<input type="text" name="name" id="name">
			</div></tr>
		  
			<tr><div>
				<label for="creditCard">Card Number</label>
				<input type="number" name="creditCard" id="creditCard"  style="width: 12em">
			</div></tr>
		 
			<tr><div>
				<label for="cvv">Security Code/CVV</label>
				<input type="number" name="cvv" id="cvv"  style="width: 3em">
			</div></tr>
			
			<tr><div>
				<label for="Expiration">Exp. (MM/YY)</label>
				<input type="number" name="expMonth" id="expMonth"  style="width: 2em">
				<span> / </span>
				<input type="number" name="expYear" id="expYear"  style="width: 2em">
			</div></tr>
		  
			<tr><div>
				<label for="bAddr">Billing Address</label>
				<input type="text" id="bAddr" name="bAddr">
			</div></tr>
			
			<tr><div>
				<h3>Shipping method: </h3><br>
				<label>
				<input type="checkbox" id="pu" class = "shippingMethod" value = "1" name="dm"  />Pick up</label><br>
				<label>				
				<input type="checkbox" id="fd" class = "shippingMethod" value = "1" name="dm" onchange="delivery()" />Free delivery</label>
			</div></tr>
		  
			<tr><div id = "delivery" style="display:none">
				<label for="sAddr">Shipping Address</label>
				<input type="text" id="sAddr" name="sAddr"><br>
				<input type="checkbox" id="same" name="same" onchange="addressFunction()" />
				<label for="sameAddr">Same as billing address</label>
			</div></tr>
			
			<tr><div>
			<p id = "error"></p><br>
			<p id = "tooFar"></p><br>

			<button id = "checkout" onclick= "validate">Checkout</button><br><br>
			</div></tr>
		</table>
	</form>
		
    <footer>
      <table>
          <tr id = "email">
              <td>
                  <img src = "Styles/email.png" alt = "Email" width = "25px" height = "25px"/>
              </td>
              <td>
                  <a href = "mailto:dulceriachina.ec@gmail.com">dulceriachina.ec@gmail.com</a>
              </td>

          </tr>
          <tr id = "telephone">
              <td>
                  <img src = "Styles/phone.png" alt = "Phone" width = "25px" height = "25px"/>
              </td>
              <td>
                  (04) 251-0363 - (593) 997-045-024
              </td>

          </tr>
          <tr id = "facebook">
              <td>
                  <img src = "Styles/facebook.png" alt = "Facebook" width = "25px" height = "25px"/>
              </td>
              <td>
                  <a href = "https://www.facebook.com/dulceriachina/" target = "_blank"> facebook.com/dulceriachina</a>
              </td>

          </tr>
          <tr id = "instagram">
              <td>
                  <img src = "Styles/instagram.png" alt = "Instagram" width = "25px" height = "25px"/>
              </td>
              <td>
                <a href="https://www.instagram.com/dulceriachina/">@dulceriachina</a> 
              </td>

          </tr>
      </table>
      <p> ©2020 Dulceria China </p>
  </footer>
  <script type="module" src="JavaScript/Cart.js"></script>
</body>
</html>
