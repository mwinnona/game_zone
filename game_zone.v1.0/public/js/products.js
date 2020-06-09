$(document).ready(function(){
    editar=0;

    $('#editarCheckboxProduct').val(0);
    c1=0;
    c2=0;
    c3=0;

    t1=0;
    t2=0;

    p1=0;
    p2=0;
    p3=0;
    p4=0;

    g1=0;
    g2=0;
    g3=0;
    g4=0;
    g5=0;
    g6=0;
    g7=0;
    g8=0;
    g9=0;
    $('#category-1').val(0);
    $('#category-2').val(0);
    $('#category-3').val(0);

    $('#type-1').val(0);
    $('#type-2').val(0);

    $('#price-1').val(0);
    $('#price-2').val(0);
    $('#price-3').val(0);
    $('#price-4').val(0);

    $('#brand-1').val(0);
    $('#brand-2').val(0);
    $('#brand-3').val(0);
    $('#brand-4').val(0);
    $('#brand-5').val(0);
    $('#brand-6').val(0);
    $('#brand-7').val(0);
    $('#brand-8').val(0);
    $('#brand-9').val(0);

    producto();
 });

 $( "#editarCheckboxProduct" ).change(function() {
    if(editar==0){
        $('#editarCheckboxProduct').val(1);
        editar=1;
        document.getElementById('editarButton').style.display = 'inline';
        
    }else{
        $('#editarCheckboxProduct').val(0);
        editar=0;
        document.getElementById('editarButton').style.display = 'none';
    }
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

  $( "#category-2" ).change(function() {
    if(c2==0){
        $('#category-2').val(1);
        c2=1;
    }else{
        $('#category-2').val(0);
        c2=0;
    }
  });

  $( "#category-3" ).change(function() {
    if(c3==0){
        $('#category-3').val(1);
        c3=1;
    }else{
        $('#category-3').val(0);
        c3=0;
    }
  });

  $( "#type-1" ).change(function() {
    if(t1==0){
        $('#type-1').val(1);
        t1=1;
    }else{
        $('#type-1').val(0);
        t1=0;
    }
  });

  $( "#type-2" ).change(function() {
    if(t1==0){
        $('#type-2').val(1);
        t1=1;
    }else{
        $('#type-2').val(0);
        t1=0;
    }
  });

  

  $( "#price-1" ).change(function() {
    if(p1==0){
        $('#price-1').val(1);
        p1=1;
    }else{
        $('#price-1').val(0);
        p1=0;
    }
  });

  $( "#price-2" ).change(function() {
    if(p1==0){
        $('#price-2').val(1);
        p2=1;
    }else{
        $('#price-2').val(0);
        p2=0;
    }
  });

  $( "#price-3" ).change(function() {
    if(p3==0){
        $('#price-3').val(1);
        p3=1;
    }else{
        $('#price-3').val(0);
        p3=0;
    }
  });

  $( "#price-4" ).change(function() {
    if(p4==0){
        $('#price-4').val(1);
        p4=1;
    }else{
        $('#price-4').val(0);
        p4=0;
    }
  });

  $( "#brand-1" ).change(function() {
    if(g1==0){
        $('#brand-1').val(1);
        g1=1;
    }else{
        $('#brand-1').val(0);
        g1=0;
    }
  });

  $( "#brand-2" ).change(function() {
    if(g2==0){
        $('#brand-2').val(1);
        g2=1;
    }else{
        $('#brand-2').val(0);
        g2=0;
    }
  });

  $( "#brand-3" ).change(function() {
    if(g3==0){
        $('#brand-3').val(1);
        g3=1;
    }else{
        $('#brand-3').val(0);
        g3=0;
    }
  });

  $( "#brand-4" ).change(function() {
    if(g4==0){
        $('#brand-4').val(1);
        g4=1;
    }else{
        $('#brand-4').val(0);
        g4=0;
    }
  });

  $( "#brand-5" ).change(function() {
    if(g5==0){
        $('#brand-5').val(1);
        g5=1;
    }else{
        $('#brand-5').val(0);
        g5=0;
    }
  });

  $( "#brand-6" ).change(function() {
    if(g6==0){
        $('#brand-6').val(1);
        g6=1;
    }else{
        $('#brand-6').val(0);
        g6=0;
    }
  });

  $( "#brand-7" ).change(function() {
    if(g7==0){
        $('#brand-7').val(1);
        g7=1;
    }else{
        $('#brand-7').val(0);
        g7=0;
    }
  });


  $( "#brand-8" ).change(function() {
    if(g8==0){
        $('#brand-8').val(1);
        g8=1;
    }else{
        $('#brand-8').val(0);
        g8=0;
    }
  });

  $( "#brand-9" ).change(function() {
    if(g9==0){
        $('#brand-9').val(1);
        g9=1;
    }else{
        $('#brand-9').val(0);
        g9=0;
    }
  });

  




 

 function producto(){
    var data = new FormData(); 
    data.append('gen_1', $('#brand-1').val());
    $.ajax({
        method: "post",
        url: '{{url("buscar_producto")}}',
        data: data,
        success:function(data){
            console.log('holi');
        },
        error:function(xhr, desc, err){
            console.log('error');
        }
    });

}