<?php require_once("PHP/Cart_Cookies/Cart_Cookie.php"); ?>
<?php require_once("PHP/Cart_Cookies/Cookie_Hash_Functions.php"); ?>
<!--
	Last Edited By: Sobhan
	Edit Date: 26-Nov-2020
	Edit Number: 6
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
<html lang="en">
<head>
    <title>Account | Dolceria China</title>
    <meta charset="UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
	<meta name = "keywords" content = "dulceria china, restaurant, bakery, home, cantonese, baked goods, buns, account, login, signup"/>
	<meta name = "description" content = "Log in to order or deliver food, as well as to gain access to great food at a click of a button!"/>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link href="Styles/template.css" rel="stylesheet">   
</head>
<body>
    <!-- Header/Nav-->
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
                    <th><a href = "account.php" class = "current_page"> Account </a></th>
                    
                    <th class="cart" id='cartIconTopRight'><a href="Cart.php"><span class="qty" id= 'cartIconTopRightQuantity'><?php if(isSet($menu)) cartSize($menu); else echo("0");?></span><img src="Styles/Cart.png" alt="Cart.html" width="40px" height="40px"/></a></th>
                    
                </tr>
            </table>
        </nav>
    </header>

    <!-- Body Text -->
    <div class="row">
        <div class="col"><h3>Create an Account!</h3>
            <p>
                Register or login to your Dulceria China. </br>
                Thanks to this account, you can create custom product lists that will be saved and accesible in one click!
                You will also recieve monthly updates on our limited time offers.
            </p>
        </div>
    </div>

    <!-- Login Form -->
    <form id = "login" class = "small_brush" action = "">
        <table id = "login_table_1">
            <tr><th> Email Address </th></tr>
            <tr><th> <input type = "email" placeholder = "email@dulceria.com" id = "email" required/> </th></tr>
            <tr><th> Password </th></tr>
            <tr><th> <input type = "password" placeholder = "Password" id = "password" required/> </th></tr>
            <tr><th> <button type = "submit" id = "loginButton"> Log In</button></th></tr>
            <tr><td>Not a member? <span id = "signup">Sign up!</span></td></tr>
        </table>
    </form>

    <!-- Footer -->
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
    <!-- JavaScript to make things dynamic-->
    <script type = "text/JavaScript">

        let form = document.getElementById("login");

        // Making things change colour when moused over
        let login = document.getElementById("loginButton");
        login.addEventListener("mouseover", function(){this.style.backgroundColor = '#a72429';});
        login.addEventListener("mouseout", function(){this.style.backgroundColor = '#8d191c';});
        let signup = document.getElementById("signup");
        signup.addEventListener("mouseover", function(){this.style.color = 'rgb(102, 102, 226)';});
        signup.addEventListener("mouseout",function(){this.style.color = 'blue';})
        
        // replacing the entire login form on click
        signup.addEventListener("click",function(){
            // Removes all children
            let loginTable = form.removeChild(document.getElementById("login_table_1"));

            // Adds all the new children
            let table = document.createElement("TABLE");
            form.appendChild(table);
            table.id = "login_table_2";
            
            // first row
            let row = document.createElement("TR");
            let cell = document.createElement("TH");
            let important = document.createTextNode("Email Address");
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            // second row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createElement("INPUT");
            important.type = "email";
            important.required = true;
            important.placeholder = "email@dulceria.com";
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            //third row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createTextNode("Confirm Email Address");
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            // fourth row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createElement("INPUT");
            important.type = "email";
            important.required = true;
            important.placeholder = "email@dulceria.com";
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            //fifth row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createTextNode("Password");
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            // sixth row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createElement("INPUT");
            important.type = "password";
            important.required = true;
            important.placeholder = "password";
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            //seventh row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createTextNode("Confirm Password");
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            // eighth row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createElement("INPUT");
            important.type = "password";
            important.required = true;
            important.placeholder = "password";
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            // ninth row
            row = document.createElement("TR");
            cell = document.createElement("TH");
            important = document.createElement("button");
            important.type = "submit";
            important.innerHTML = "Sign Up";
            important.addEventListener("mouseover", function(){this.style.backgroundColor = '#a72429';});
            important.addEventListener("mouseout", function(){this.style.backgroundColor = '#8d191c';});
            cell.appendChild(important);
            row.appendChild(cell);
            table.appendChild(row);

            //tenth row
            row = document.createElement("TR");
            cell = document.createElement("TD");
            important = document.createTextNode("Have an Account? ");
            let span = document.createElement("SPAN");
            let temp = document.createTextNode("Log In");
            span.appendChild(temp);
            cell.appendChild(important);
            cell.appendChild(span);
            row.appendChild(cell);
            table.appendChild(row);

            span.addEventListener("mouseover", function(){this.style.color = 'rgb(102, 102, 226)';});
            span.addEventListener("mouseout",function(){this.style.color = 'blue';})
            span.addEventListener("click", function(){
                form.removeChild(table);
                form.appendChild(loginTable);
            })

            

            

            //table.appendChild(document.createElement("TR").appendChild(document.createElement("TD")).appendChild(document.createElement("INPUT")));
        });
    </script>
    <script src="JavaScript/MonthSpecials.js">      
    </script>
</body>
</html>
