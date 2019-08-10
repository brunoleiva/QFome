function muda(i){
    if(i === 0){
        document.getElementById('cadastro-usuario-normal').style.display="block";
        document.getElementById('cadastro-usuario-empresa').style.display="none";
        document.getElementById('usuario').style.backgroundColor="orange";
        document.getElementById('usuario').style.color="white";
        document.getElementById('empresa').style.backgroundColor="white";
        document.getElementById('empresa').style.color="orange";
    }
    if(i === 1){
        document.getElementById('cadastro-usuario-normal').style.display="none";
        document.getElementById('cadastro-usuario-empresa').style.display="block";
        document.getElementById('empresa').style.backgroundColor="orange";
        document.getElementById('empresa').style.color="white";
        document.getElementById('usuario').style.backgroundColor="white";
        document.getElementById('usuario').style.color="orange";
    }
}