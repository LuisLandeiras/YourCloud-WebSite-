function background(){
    var button = document.getElementById("tema");
    if(button.checked){
        document.body.style = "background: linear-gradient(white 30%, rgb(94, 2, 89));";
        document.getElementById("bar").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
        document.getElementById("box").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
        document.getElementById("button").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
        document.getElementById("h3").style.color = "white"; 
        document.getElementById("ou").style.color = "white";  
        document.getElementById("stars").style.color = "white";
    }else{
        document.body.style = "background: linear-gradient(black 30%, rgb(94, 2, 89));";
        document.getElementById("bar").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
        document.getElementById("box").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
        document.getElementById("button").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
        document.getElementById("h3").style.color = "black"; 
        document.getElementById("ou").style.color = "balck";  
        document.getElementById("stars").style.color = "black";  
    }
}