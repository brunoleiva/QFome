var slide = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    slide++;
    if (slide > x.length) {slide = 1}    
    x[slide-1].style.display = "block";  
    setTimeout(carousel, 6000); 
}


