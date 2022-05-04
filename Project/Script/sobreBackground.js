function background(){
    var button = document.getElementById("tema");
    if(button.checked){
        document.body.style = "white";
        document.getElementById("bar").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
        document.getElementById("p").style.color = "black"; 
        document.getElementById("#mensagem1").style.color = "black";
        document.getElementById("#mensagem2").style.color = "black";
        document.getElementById("#mensagem3").style.color = "black";
    }else{
        document.body.style = "black";
        document.getElementById("bar").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
        document.getElementById("p").style.color = "white"; 
        document.getElementById("#mensagem1").style.color = "white";  
        document.getElementById("#mensagem2").style.color = "white";
        document.getElementById("#mensagem3").style.color = "white";
    }
}