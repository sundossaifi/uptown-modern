let searchVisibleFlag=false;
let shoppingCartVisibleFlag=false;
let userPanelVisibleFlag=false;
let forgotPasswordFormVisibleFlag=false;
let currentPanel="login";

function openNav()
{
    document.getElementById("mySidenav").style.width = "25vw";
    document.getElementById("mySidenav").style.borderRight = "2px solid #000000";
}

function closeNav() 
{
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.borderRight = "0px solid #000000";
}

function showAndHideSearchScene()
{
    let searchContainer=document.getElementById("search-container");
    let searchFormContainer=document.getElementById("search-form-container");

    if(searchVisibleFlag==false)
    {
        searchContainer.style.visibility="visible";
        searchFormContainer.style.marginTop="40px";
        searchContainer.style.opacity="1";
        searchFormContainer.style.opacity="1";
        searchVisibleFlag=true;
    }
    else if(searchVisibleFlag==true)
    {
        searchContainer.style.visibility="hidden";
        searchFormContainer.style.marginTop="-40px";
        searchContainer.style.opacity="0";
        searchFormContainer.style.opacity="0";
        searchVisibleFlag=false;
    }

    searchContainer.style.transitionDuration="0.5s";
    searchFormContainer.style.transitionDuration="0.5s";
}

function openAndCloseShoppingCart()
{
    let shoppingCartContainer=document.getElementById("shopping-cart-container");
    let shoppingCart=document.getElementById("shopping-cart");

    if(shoppingCartVisibleFlag==false)
    {
        shoppingCartContainer.style.visibility="visible";
        shoppingCartContainer.style.opacity="1";
        shoppingCart.style.transform="scale(1)";
        shoppingCart.style.opacity="1";
        shoppingCartVisibleFlag=true;
    }
    else if(shoppingCartVisibleFlag==true)
    {
        shoppingCartContainer.style.visibility="hidden";
        shoppingCartContainer.style.opacity="0";
        shoppingCart.style.transform="scale(0.7)";
        shoppingCart.style.opacity="0";
        shoppingCartVisibleFlag=false;
    }

    shoppingCartContainer.style.transitionDuration="0.5s";
    shoppingCart.style.transitionDuration="0.5s";
}

function openAndCloseUserPanel(requireSignIn)
{
    if(!requireSignIn)
    {
        let userPanelContainer=document.getElementById("user-panel-container");
        let animatedContainer=document.getElementById("animated-container");
        let user=document.getElementById("user");

        if(userPanelVisibleFlag==false)
        {
            userPanelContainer.style.visibility="visible";
            userPanelContainer.style.opacity="1";
            animatedContainer.style.transform="initial";
            user.style.transform="scale(1)";
            animatedContainer.style.opacity="1";
            userPanelVisibleFlag=true;
        }
        else if(userPanelVisibleFlag==true)
        {
            userPanelContainer.style.visibility="hidden";
            userPanelContainer.style.opacity="0";
            animatedContainer.style.transform="translateY(-190px)";
            user.style.transform="scale(0.7)";
            animatedContainer.style.opacity="0";
            userPanelVisibleFlag=false;
        }

        userPanelContainer.style.transitionDuration="0.5s";
        animatedContainer.style.transitionDuration="0.5s";
        user.style.transitionDuration="0.5s";
    }
    else
    {
        document.getElementById("add-button").type="submit";
    }
}

function showAndHideResetPassword()
{
    let forgotPasswordForm=document.getElementById("forgot-password-form");
    let forgotPasswordFormChildern = forgotPasswordForm.children;

    if(forgotPasswordFormVisibleFlag==false)
    {
        forgotPasswordForm.style.marginTop="initial";
        Array.from(forgotPasswordFormChildern).forEach(item => 
        {
            item.style.transform="initial";
            item.style.transitionDuration="0.15s";
        });
        forgotPasswordFormVisibleFlag=true;
    }
    else if(forgotPasswordFormVisibleFlag==true)
    {
        forgotPasswordForm.style.marginTop="-50%";
        Array.from(forgotPasswordFormChildern).forEach(item => 
        {
            item.style.transform="translateY(-320%)";
            item.style.transitionDuration="0.15s";
        });
        forgotPasswordFormVisibleFlag=false;
    }

    forgotPasswordForm.style.transitionDuration="0.15s";
}

function switchLoginSignup(resetFlag)
{
    let signInPanel=document.getElementById("sign-in-panel");
    let signUpPanel=document.getElementById("sign-up-panel");

    if(currentPanel=="login")
    {
        signInPanel.style.transform="translateX(-100%)";
        signUpPanel.style.marginTop="initial";
        signUpPanel.style.transform="translateX(-50%)";
        currentPanel="signup";
    }
    else if(currentPanel=="signup")
    {
        signInPanel.style.transform="translateX(50%)";
        signUpPanel.style.marginTop="-100%";
        signUpPanel.style.transform="translateX(180px)";
        currentPanel="login";
    }

    signInPanel.style.transitionDuration="0.15s";
    signUpPanel.style.transitionDuration="0.15s";

    forgotPasswordFormVisibleFlag=(resetFlag)?false:true;
    showAndHideResetPassword();
}