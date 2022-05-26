function background(){
    var button = document.getElementById("tema");
    if(button.checked){
        document.body.style = "background: linear-gradient(white 30%, rgb(94, 2, 89));";
        document.getElementById("bar").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
    }else{
        document.body.style = "background: linear-gradient(black 30%, rgb(94, 2, 89));";
        document.getElementById("bar").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
    }
}