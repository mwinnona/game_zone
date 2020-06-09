$(document).ready(function(){
    editar=0;

    $('#editarCheckbox').val(0);
 });

 $( "#editarCheckbox" ).change(function() {
    if(editar==0){
        $('#editarCheckbox').val(1);
        editar=1;
        document.getElementById('editarButton').style.display = 'inline';
        
    }else{
        $('#editarCheckbox').val(0);
        editar=0;
        document.getElementById('editarButton').style.display = 'none';
    }
  });

 
