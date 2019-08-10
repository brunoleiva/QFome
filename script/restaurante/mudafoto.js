var element = document.getElementById('favoritar');
element.onclick = function(){
    if (element.src.match("geaar")) {
        element.src="imagens_png/gear.png"; 
    } else {
        element.src="imagens_png/geaar.png";
    }
};
