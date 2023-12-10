const amountElement=document.getElementById("value");
let value=amountElement.innerHTML.toString().replace('.00 $','');

paypal_sdk.Buttons
({
    style : 
    {
        color: 'gold',
        shape: 'pill',
    },
    createOrder: function (data, actions) 
    {
        return actions.order.create
        ({
            purchase_units : 
            [{
                amount: 
                {
                    value: value
                }
            }]
        });
    },
    onApprove: function (data, actions) 
    {
        return actions.order.capture().then(function (details) 
        {
            window.location.replace("http://localhost/Web-Project/PHP/record-order.php");
        })
    }
}).render('#paypal');