let previousImgContainer;

window.addEventListener('load',function()
{
    previousImgContainer=document.getElementById("0");
},false);

function setMainImg(imgContainer)
{
    document.getElementById("mainImg").src=imgContainer.childNodes[0].src;

    if(previousImgContainer!=imgContainer)
    {
        previousImgContainer.classList.remove("border1");
        previousImgContainer.classList.add("border");

        imgContainer.classList.remove("border");
        imgContainer.classList.add("border1");
    }

    previousImgContainer=imgContainer;
}

function setSelectedElementColor(selectedElement,secondElement)
{
    document.getElementById(selectedElement).classList.add("black");
    document.getElementById(selectedElement).classList.remove("gray");

    document.getElementById(secondElement).classList.add("gray");
    document.getElementById(secondElement).classList.remove("black");
}

function removePreviousElement()
{
    let parentElement=document.getElementById("rightdes");
    
    while(parentElement.firstChild)
    {
        parentElement.removeChild(parentElement.firstChild);
    }
}

function setDescription(description)
{
    setSelectedElementColor("desctiptionButton","infoButton");
    removePreviousElement();
    
    let descriptionParagraph=
    `
        <p class='desparagraph'>
            `+description+`
        </p>
    `;
    document.getElementById("rightdes").innerHTML+=descriptionParagraph;
}

function setAdditionalInfo(manufacturer,dimensions,weight,assembly,color,brand,material)
{
    setSelectedElementColor("infoButton","desctiptionButton");
    removePreviousElement();

    let informationParagraph=
    `
        <p class='desparagraph'>
            Manufacturer: `+manufacturer+`
            <br>
            <br>
            Dimensions: `+dimensions+`
            <br>
            <br>
            Weight: `+weight+`
            <br>
            <br>
            Require Assembly: `+assembly+`
            <br>
            <br>
            Color: <span style="background-color: `+color+`;"></span>
            <br>
            <br>
            Brand: `+brand+`
            <br>
            <br>
            Material: `+material+`
        </p>`;
    document.getElementById("rightdes").innerHTML+=informationParagraph;
}