function setPriceLabel()
{
    let rangeslider = document.getElementById("myRange");
    let output = document.getElementById("priceLabel");

    output.innerHTML = rangeslider.value+"$";
    rangeslider.oninput = function() 
    {
        output.innerHTML = this.value+"$";
    }
}

function redirect()
{
    let rangeslider = document.getElementById("myRange");
    let redirectPriceLink=document.getElementById("redirect-price-link");
    
    if(rangeslider.value==0)
    {
        redirectPriceLink.setAttribute('href', 'Store.php');
    }
    else
    {
        redirectPriceLink.setAttribute('href', 'Store.php?price='+rangeslider.value+'');
    }
    
    redirectPriceLink.click();
}