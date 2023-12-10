let topImg;
let bottomImg;
let topImgPosition;

let st;
let lastScrollTop=0;
let scrollDirection="";

window.addEventListener('scroll', function() 
{
	topImg = document.getElementById("topImg");
    bottomImg = document.getElementById("bottomImg");
	topImgPosition = topImg.getBoundingClientRect();

    if(topImgPosition.top < window.innerHeight && topImgPosition.bottom >= 0)
    {
        if(scrollDirection=="down")
        {
            topImg.style.marginTop="240px";
            topImg.style.transform="rotate(180deg)";
            bottomImg.style.marginBottom="240px";
            bottomImg.style.transform="rotate(180deg)";
        }
        else if(scrollDirection=="up")
        {
            topImg.style.marginTop="initial";
            topImg.style.transform="rotate(-180deg)";
            bottomImg.style.marginBottom="initial";
            bottomImg.style.transform="rotate(-180deg)";
        }

        topImg.style.transitionDuration="1.5s";
        bottomImg.style.transitionDuration="0.7s";
    }
});

window.addEventListener("scroll", function()
{ 
    st = window.pageYOffset || document.documentElement.scrollTop;
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