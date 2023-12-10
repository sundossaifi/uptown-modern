window.addEventListener("scroll", function()
{ 
    let scrollToTopButton = document.getElementById("scroll-to-top-button");

    if(getScrollPercent()>10)
    {
        scrollToTopButton.style.visibility="visible";
        scrollToTopButton.style.opacity="1";
    }
    else
    {
        scrollToTopButton.style.visibility="hidden";
        scrollToTopButton.style.opacity="0";
    }

    scrollToTopButton.style.transitionDuration="0.5s";
}, false);

function getScrollPercent()
{
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return Math.ceil((h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100);
}