function view() {
    document.getElementsByClassName("tabela")[0].style.display = "block";
    document.getElementsByClassName("tabela")[0].style = "position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);";
}
function close(){
    document.getElementsByClassName("tabela")[0].style.display = "none";
}