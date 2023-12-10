window.addEventListener('load', (event) => 
{
    let url=(window.location.href).split("?");
    let flag=true;
    
    if(url[1])
    {
        let splitiedURL=url[1].split("&");
        
        if(splitiedURL[0])
        {
            if(splitiedURL[0].split("=")[0]=="pageIndex")
            {
                document.getElementById(splitiedURL[0].split("=")[1]).style.backgroundColor="#d1e8e2";
                flag=false;
            }
        }
        
        if(splitiedURL[1])
        {
            if(splitiedURL[1].split("=")[0]=="pageIndex")
            {
                document.getElementById(splitiedURL[1].split("=")[1]).style.backgroundColor="#d1e8e2";
                flag=false;
            }
        }

        if(document.getElementById("1")&&flag)
        {
            document.getElementById("1").style.backgroundColor="#d1e8e2";
        }
    }
    else if(document.getElementById("1"))
    {
        document.getElementById("1").style.backgroundColor="#d1e8e2";
    }
});