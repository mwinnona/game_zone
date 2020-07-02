$(document).ready(function(){
    editar=0;
    valor=0;
});
$( "#slideTarjeta" ).change(function() {
    if(editar==0){
        $('#slideTarjeta').val(1);
        editar=1;
        document.getElementById('tarjeta').style.display = 'none';
        document.getElementById('paypal').style.display = 'inline';
    }else{
        $('#slideTarjeta').val(0);
        editar=0;
        document.getElementById('tarjeta').style.display = 'inline';
        document.getElementById('paypal').style.display = 'none';
    }
});