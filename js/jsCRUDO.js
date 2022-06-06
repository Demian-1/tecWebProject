$(document).ready(
    function(){
    
    $.ajax ({method:"POST", url:"CRUDR.php", data:{}, cache:false, success:function(res){ $("#container").html(res)}});

    $("#eliminar").submit(function(e){
        e.preventDefault();
        var boleta = $("#fol").val();
        $.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false,
            success:function(res){$.ajax ({method:"POST", url:"CRUDR.php", data:{fol:fol}, cache:false, success:function(res){ $("#container").html(res)}});}});
        
    });
});