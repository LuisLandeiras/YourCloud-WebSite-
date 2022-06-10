setTimeout(function(){ 
    var msg = document.getElementsByClassName("msg-success");
    while(msg.length > 0){
        msg[0].parentNode.removeChild(msg[0]);
    }
}, 4000);