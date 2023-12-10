function progressEvent()
{
    let progress=document.getElementById("progress");
    let percentage=getScrollPercent();
    percentage=percentage>100?100:percentage;
    progress.style.width=""+percentage+"%";
}

function getScrollPercent()
{
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return Math.ceil((h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100);
}