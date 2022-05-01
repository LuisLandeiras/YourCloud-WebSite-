function background(){
    var button = document.getElementById("tema");
    if(button.checked){
        document.getElementById("bar").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
        document.getElementById("box").style.backgroundColor = "rgba(255, 255, 255, 0.89)";
    }else{
        document.getElementById("bar").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
        document.getElementById("box").style.backgroundColor = "rgba(0, 0, 0, 0.89)";
    }
}