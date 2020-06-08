$(document).ready(function(){
    
    producto();
 });


 function producto(){
       
    $.ajax({
        
        url: '/producto_ajax',
        method: "GET",
        data: new FormData(),
        success:function(data){
              
        },
        error:function(xhr, desc, err){
            console.log('error');
        }
    });

}