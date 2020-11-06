let carts = document.querySelectorAll('.add_btn');

let buttons = document.querySelectorAll('.add_btn');
// console.log(buttons);
let breadCounterForIcon = JSON.parse(localStorage.getItem('counterTotal'));
let cartIcon = document.getElementById('cartIconTopRightQuantity');
console.log(cartIcon);
cartIcon.innerHTML = breadCounterForIcon;


buttons.forEach(element => {
    buttons = element.id;
    // console.log(buttons);
});
localStorage.setItem('counterTotal', breadCounterForIcon);


if(document.querySelector('.menu') !== null) 
{
let theWholeMenuPage = document.querySelector('.menu');
theWholeMenuPage.addEventListener('click', addBread);
}

function addBread (e)
{
    
    // console.log(e.target);
    if(e.target.className === 'add_btn')
    {   
        breadCounterForIcon++;
        document.getElementById('cartIconTopRightQuantity').innerHTML = breadCounterForIcon;
        localStorage.setItem('counterTotal', breadCounterForIcon);

        let theItem = e.target.id;
        console.log(theItem);
        let theItemName = theItem.substring(3);
        console.log(theItemName);
        for(let i = 0; i < menuBreadArray.length ; i++)
        {
            if(theItemName === menuBreadArray[i].name)
            {
                menuBreadArray[i].quantity++;
                console.log(menuBreadArray[i].quantity);
            }
        }

        updateLocalStorage();
    }
}
let menuBreadArray = [
    {name: 'AlmondCookies', quantity: 0},
    {name: 'CheeseCake', quantity: 0},
    {name: 'ChickenBiscuit', quantity: 0},
    {name: 'EggTart', quantity: 0},
    {name: 'GuavaBites', quantity: 0},
    {name: 'CoconutMochi', quantity: 0},
    {name: 'PineappleBites',quantity: 0},
    {name: 'PineappleCake',quantity: 0},
    {name: 'TanWongSu',quantity: 0},
    {name: 'PorkBuns',quantity: 0},
    {name: 'RedBeanPaste',quantity: 0},
    {name: 'Coconut',quantity: 0},
    {name: 'Custard',quantity: 0},
]
let importLocalStorage = JSON.parse(localStorage.getItem('localStrorageCart'));
if(importLocalStorage !== null)
{
    for(let i = 0; i < 11 ; i ++)
    {
        menuBreadArray[i].quantity = importLocalStorage[i].quantity
    }
}

function updateLocalStorage()
{
    localStorage.setItem('localStrorageCart', JSON.stringify(menuBreadArray));
}






// console.log(cartIconTopRightQuantity.innerHTML);

