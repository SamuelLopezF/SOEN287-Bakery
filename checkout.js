//to ensure only one shipping method can be chosen
$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});

//show shipping info when free delivery is chosen
function delivery() {
  var checkBox = document.getElementById("fd");
  var text = document.getElementById("delivery");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

//auto fill shipping address when same as billing is checked
function addressFunction() { 
     if (document.getElementById("same").checked) { 
        document.getElementById("sAddr").value = document.getElementById("bAddr").value; 
    } else { 
		document.getElementById("bAddr").value = ""; 

	} 
} 

//to validate user information before checking out
import {checkdistance} from './map.js';

function validate() {
	
	let valid = true;
	
	let addr = document.getElementById("sAddr").value;
	var far = new checkdistance(addr);
	


	var name = document.getElementById("name").value;
    var creditCard = document.getElementById("creditCard").value;
	var cardregex = /\d{12}/;
	var cvv = document.getElementById("cvv").value;
	var expMonth = document.getElementById("expMonth").value;
	var expYear = document.getElementById("expYear").value;
	var bAddr = document.getElementById("bAddr").value;
	var sAddr = document.getElementById("sAddr").value;

	
	if (name === "" || name == null)
		valid = false;
	if (!cardregex.test(creditCard) || creditCard == null)
		valid = false;
	if (cvv === "" || cvv == null)
		valid = false;
	if (expMonth > 12 || expMonth < 1 || expMonth == null)
		valid = false;
	if (expYear === "" || expYear == null)
		valid = false;
	if (bAddr === "" || bAddr == null)
		valid = false;
	if (sAddr === "" || sAddr == null)
		valid = false;
	if (far == false)
		valid = false;
		
	if (valid == false)
		document.getElementById("error").innerHTML = "Please check if information is right";
	else
		$("checkoutForm").submit();

}



