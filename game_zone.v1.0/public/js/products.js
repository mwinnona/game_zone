$(document).ready(function(){
    c1=0;
    producto();
 });

 $( "#category-1" ).change(function() {
    if(c1==0){
        $('#category-1').val(1);
        c1=1;
    }else{
        $('#category-1').val(0);
        c1=0;
    }
  });

 $(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="fiscal") {
        if(this.checked) $('#id_fiscal').val(this.value);
        else $('#id_fiscal').val("");
    }
    if(this.id=="nacional") {
        if(this.checked) $('#id_nacional').val(this.value);
        else $('#id_nacional').val("");
    }
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