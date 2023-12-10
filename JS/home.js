let currentStyle="light";
let scrollDirection="";

let lastScrollTop = 0;
let currentIndex = 0;

function movingImgAnimation(event)
{
    let homeHeader = document.getElementById("home-header");
    if (homeHeader.parentNode.matches(":hover")) 
    {
        let img=document.getElementById("header-img");

        img.style.marginLeft=""+(event.pageX * 0.01)+"px";
        img.style.marginTop=""+(event.pageY * 0.01)+"px";
    } 
}
window.addEventListener('mousemove', movingImgAnimation);

function swapImages()
{
    let img=document.getElementById("header-img");
    let circle=document.getElementById("animated-circle");
    let subtitle=document.getElementById("subtitle");
    let h1=document.getElementById("h1-subtitle");
    let button=document.getElementById("discover-button");

    if(currentStyle=="light")
    {
        img.src="Images/chair.png"

        img.style.top="-500px";
        img.style.right="-100px";
        img.style.height="65%";

        currentStyle="chair";
    }
    else if(currentStyle=="chair")
    {
        img.src="Images/light.png"

        img.style.top="-800px";
        img.style.right="-150px";
        img.style.height="100%";

        currentStyle="light";
    }

    circle.classList.remove("circle")
    circle.offsetWidth
    circle.classList.add("circle")

    subtitle.classList.remove("subtitle")
    subtitle.offsetWidth
    subtitle.classList.add("subtitle")

    h1.classList.remove("h1-subtitle")
    h1.offsetWidth
    h1.classList.add("h1-subtitle")

    button.classList.remove("discover-button")
    button.offsetWidth
    button.classList.add("discover-button")
}

window.addEventListener('scroll', function() 
{
	let livingCategory = document.getElementById("living-category");
	let livingCategoryPosition = livingCategory.getBoundingClientRect();

    let diningCategory = document.getElementById("dining-category");
    let diningCategoryPosition = diningCategory.getBoundingClientRect();

    let bedroomCategory = document.getElementById("bedroom-category");
    let bedroomCategoryPosition = bedroomCategory.getBoundingClientRect();

    let accessoriesCategory = document.getElementById("accessories-category");
    let accessoriesCategoryPosition = accessoriesCategory.getBoundingClientRect();

    let element;
    
    if(livingCategoryPosition.top < window.innerHeight && livingCategoryPosition.bottom >= 0)
    {
        element=livingCategory;
    }
    else if(diningCategoryPosition.top < window.innerHeight && diningCategoryPosition.bottom >= 0)
    {
        element=diningCategory;
    }
    else if(bedroomCategoryPosition.top < window.innerHeight && bedroomCategoryPosition.bottom >= 0)
    {
        element=bedroomCategory;
    }
    else if(accessoriesCategoryPosition.top < window.innerHeight && accessoriesCategoryPosition.bottom >= 0)
    {
        element=accessoriesCategory;
    }

    if(element)
    {
        if(scrollDirection=="down")
        {
            element.style.marginTop="90px";
        }
        else if(scrollDirection=="up")
        {
            element.style.marginTop="initial";
        }

        element.style.transitionDuration="0.7s";
    }
});

window.addEventListener("scroll", function()
{ 
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if(st > lastScrollTop)
    {
        scrollDirection="down";
    } 
    else 
    {
        scrollDirection="up";
    }

    lastScrollTop = st <= 0 ? 0 : st;
}, false);

window.addEventListener("scroll", function()
{ 
    let homeHeader = document.getElementById("home-header");
    let shopNowContainer=this.document.getElementById("shop-now-container");
    let scrollToTopButton = document.getElementById("scroll-to-top-button");
    
    let homeHeaderRect = homeHeader.getBoundingClientRect();
    let  shopNowContainerRect =  shopNowContainer.getBoundingClientRect();
    let scrollToTopButtonRect = scrollToTopButton.getBoundingClientRect();

    if(homeHeaderRect.bottom < scrollToTopButtonRect.top)
    {
        scrollToTopButton.style.visibility="visible";
        scrollToTopButton.style.opacity="1";
    }
    else
    {
        scrollToTopButton.style.visibility="hidden";
        scrollToTopButton.style.opacity="0";
    }

    if((shopNowContainerRect.top < scrollToTopButtonRect.bottom))
    {
        scrollToTopButton.style.backgroundColor="#ffffff";
    }
    
    if((shopNowContainerRect.bottom < scrollToTopButtonRect.top)||(shopNowContainerRect.top > scrollToTopButtonRect.bottom))
    {
        scrollToTopButton.style.backgroundColor="#d1e8e2";
    }

    scrollToTopButton.style.transitionDuration="0.5s";
}, false);

function instagramHoverAnimation(index)
{
    let imgDiv=document.getElementsByClassName("img-div");
    let instagramImgDiv=document.getElementsByClassName("instagram-img-div");

    imgDiv[index].style.opacity="0";
    imgDiv[index].style.transitionDuration="0.5s";

    instagramImgDiv[index].style.opacity="1";
    instagramImgDiv[index].style.transitionDuration="0.5s";
}

function instagramUnHoverAnimation(index)
{
    let imgDiv=document.getElementsByClassName("img-div");
    let instagramImgDiv=document.getElementsByClassName("instagram-img-div");

    imgDiv[index].style.opacity="1";
    imgDiv[index].style.transitionDuration="0.5s";

    instagramImgDiv[index].style.opacity="0";
    instagramImgDiv[index].style.transitionDuration="0.5s";
}

window.addEventListener("scroll", function()
{
    let firstLeft=document.getElementById("firstLeft");
    let secondLeft=document.getElementById("secondLeft");
    let firstRight=document.getElementById("firstRight");
    let secondRight=document.getElementById("secondRight");

    let firstLeftText=document.getElementById("firstLeftText");
    let secondLeftText=document.getElementById("secondLeftText");
    let firstRightText=document.getElementById("firstRightText");
    let secondRightText=document.getElementById("secondRightText");

    let firstLeftBound=firstLeft.getBoundingClientRect();
    let secondLeftBound=secondLeft.getBoundingClientRect();
    let firstRightBound=firstRight.getBoundingClientRect();
    let secondRightBound=secondRight.getBoundingClientRect();

    if(Math.floor(firstLeftBound.top)<200&&Math.floor(firstLeftBound.bottom)>200)
    {
        firstLeftText.style.opacity="1";
        firstLeftText.style.transform="translateX(15px)";
    }
    else if(Math.floor(firstLeftBound.top)>300)
    {
        firstLeftText.style.opacity="0";
        firstLeftText.style.transform="translateX(-15px)";
    }

    if(Math.floor(secondLeftBound.top)<200&&Math.floor(secondLeftBound.bottom)>200)
    {
        secondLeftText.style.opacity="1";
        secondLeftText.style.transform="translateX(15px)";
    }
    else if(Math.floor(secondLeftBound.top)>300)
    {
        secondLeftText.style.opacity="0";
        secondLeftText.style.transform="translateX(-15px)";
    }

    if(Math.floor(firstRightBound.top)<200&&Math.floor(firstRightBound.bottom)>200)
    {
        firstRightText.style.opacity="1";
        firstRightText.style.transform="translateX(-15px)";
    }
    else if(Math.floor(firstRightBound.top)>300)
    {
        firstRightText.style.opacity="0";
        firstRightText.style.transform="translateX(15px)";
    }

    if(Math.floor(secondRightBound.top)<200&&Math.floor(secondRightBound.bottom)>200)
    {
        secondRightText.style.opacity="1";
        secondRightText.style.transform="translateX(-15px)";
    }
    else if(Math.floor(secondRightBound.top)>300)
    {
        secondRightText.style.opacity="0";
        secondRightText.style.transform="translateX(15px)";
    }

    firstLeftText.style.transitionDuration="1s";
    secondLeftText.style.transitionDuration="1s";
    firstRightText.style.transitionDuration="1s";
    secondRightText.style.transitionDuration="1s";

},false);

setInterval(function()
{
    let one=document.getElementById("one");
    let two=document.getElementById("two");
    let three=document.getElementById("three");

    if (currentIndex == 3)
    {
        currentIndex = 0;
    }
    
    switch(currentIndex)
    {
        case (0):
        {   
            one.style.backgroundColor="#d1e8e2";
            two.style.backgroundColor="#f9f7f6";
            three.style.backgroundColor="#f9f7f6";
            break;
        }
        case (1):
        {
            one.style.backgroundColor="#f9f7f6";
            two.style.backgroundColor="#d1e8e2";
            three.style.backgroundColor="#f9f7f6";
            break;
        }
        case (2):
        {
            one.style.backgroundColor="#f9f7f6";
            two.style.backgroundColor="#f9f7f6";
            three.style.backgroundColor="#d1e8e2";
            break;
        }
    }

    one.style.transitionDuration="1s";
    two.style.transitionDuration="1s";
    three.style.transitionDuration="1s";
    ++currentIndex;

}, 1000);