function equal(){
    var a = document.getElementById("pass").value;
    var b = document.getElementById("repitepass").value;
    if(b != a){
        alert("É necessário que as senhas sejam iguais");
    }
}