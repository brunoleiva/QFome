$(function(){
     var atual,proximo,anterior;
  
  $('.proximo').click(function(){
    
    atual = $(this).parent();
    proximo = $(this).parent().next();

    atual.hide(200);
    proximo.show(200);

  });  

  $('.anterior').click(function(){
    
    atual = $(this).parent();
    anterior = $(this).parent().prev();

    atual.hide(200);
    anterior.show(200);

  });  


});