//ARRAYS:
let breadArray =
[
  bOne =
  {
    name: "Pan al Coco",
    price: 5,
    reference: 1,
    quantity: 0
  },

  bTwo =
  {
    name: "Moon cake",
    price: 3,
    reference: 2,
    quantity: 0
  }
]
const btnArray = [
  btnOne = document.querySelector(".btnOne"),
  btnTwo = document.querySelector(".btnTwo"),
]
//VARIABLES:
var total = 0;
let cartTotalPrice = 0;
const cartTable = document.querySelector(".myCartBody");
let deleteBtnTwo;
//FUNCTIONS:
//ADD A SPECIFIC BREAD
function addBread (reference)
{
  cartTotalPrice = 0;
  switch (reference)
  {
    
    case 1:
    
      if(breadArray[0].quantity == 0)
      {
        let row = cartTable.insertRow();
        breadArray[0].quantity += 1;
        row.innerHTML = `<td>${breadArray[0].name}</td><td>${breadArray[0].price}</td><td class = "quantity1">${breadArray[0].quantity}</td><td><button class = "button-js-One">X<td>`;
      }

      else
      {
        breadArray[0].quantity += 1;
        printedQuantity = document.querySelector(".quantity1");
        printedQuantity.innerHTML = `${breadArray[0].quantity}`;
        // console.log(breadArray[0].quantity);
      }

      // cartTotal();
      break;

    case 2:
      
      if(breadArray[1].quantity == 0)
      {
        let row = cartTable.insertRow();
        breadArray[1].quantity += 1;
        row.innerHTML = `<td>${breadArray[1].name}</td><td>${breadArray[1].price}</td><td class = "quantity2">${breadArray[1].quantity}</td><td><button class = "button-js-Two">X</button><td>`;
        deleteBtnTwo = document.querySelector(".button-js-Two");
      }

      else
      {
        breadArray[1].quantity += 1;
        printedQuantity = document.querySelector(".quantity2");
        printedQuantity.innerHTML = `${breadArray[1].quantity}`;
        // console.log(breadArray[1].quantity);
      }
      // cartTotal();
      break;
  }
  console.log(cartTotal());
}
//CALCULATE TOTAL $$:
function cartTotal()
{

      for(let i = 0; i < breadArray.length ; i++)
      {
        cartTotalPrice += (breadArray[i].quantity * breadArray[i].price);
      }
  return cartTotalPrice;
}
//DELETE BREAD:

function deleteBread(selector)
{
  switch(selector)
  {
    case 1: 
      breadArray[0].quantity -= 1;
      console.log("-", breadArray[0].quantity);
      document.querySelector(".quantity1") = breadArray[0].quantity;

    case 2: 
    breadArray[1].quantity -= 1;
    console.log(breadArray[1].quantity);
    document.querySelector(".quantity2") = breadArray[1].quantity;  
  }
}



//EVENT LISTENERS:
btnArray[0].addEventListener("click", function()
    {
      addBread(1);
    }
  );
btnArray[1].addEventListener("click", function()
    {
      addBread(2);
    }
  );
// deleteBtnOne.addEventListener("click", function()
//   {
//     deleteBread[1];
//   }
// );
// deleteBtnTwo.addEventListener("click", function()
//   {
//     deleteBread[2];
//   }
// );

