$(document).ready(
    function(){
    
    $.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#container").html(res)}});
    $("#recargar").submit(function(e){
        e.preventDefault();
        $.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#container").html(res)}});
        
    });
    $("#eliminar").submit(function(e){
        e.preventDefault();
        var fol = $("#fol").val();
        alert(fol);
        //$.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false, success:function(res){ $("#container").html(res)}});
        
    });
});