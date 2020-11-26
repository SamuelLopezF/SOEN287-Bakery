<?php require_once("PHP/Cart_Cookies/Cart_Cookie.php"); ?>
<?php require_once("PHP/Cart_Cookies/Cookie_Hash_Functions.php"); ?>
<!--
	Last Edited By: Sobhan
	Edit Date: 26-Nov-2020
	Edit Number: 4
	Edit Details:
		Cart
-->
<!-- PHP -->
<?php
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
    
    <div class="tableContainer">
      <table class="tableCart">
        <div class="headerContainer">
          <thead class="TableHeader">
            <th class="Header1">Item Name</th>
            <th class="Header2">Price</th>
            <th class="Header3">Quantity</th>
          </thead>
        </div>
        <div class="tableBodyContainer">
          <tbody class="tableBody">
          </tbody>
        </div>
      </table>
    </div>

  </div>
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