$(document).ready(
    function(){

    $("#fol").hide();
    $("#table").hide();
    $("#sub").hide();

    $( "#Tipo" ).change(function() {
        var acc= $("#Tipo").val();
        switch (acc){ 
            case 'D':
                $("#fol").show();
                $("#table").hide();
                $("#sub").hide();
            break;
            case 'U':
                $("#fol").show();
                $("#table").hide();
                $("#sub").hide();
            break;
            case 'R':
                $("#table").show();
                $("#fol").hide();
                $("#sub").hide();
            break;
            case 'C':
                $("#table").hide();
                $("#fol").hide();
                $("#sub").show();
            break;
        }
        
        alert( acc );
    });

    $("#table").change(function(){
        $("#sub").show();
    });

    $("#fol").change(function(){
        $("#sub").show();
    });

    /*$.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#result").html(res)}});*/

    $("#accion").submit(function(e){
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