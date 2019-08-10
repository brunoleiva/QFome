
var modal = document.getElementById('modal');


var botao = document.getElementById("botao-modal");


var span = document.getElementsByClassName("fechar")[0];

 
botao.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}    