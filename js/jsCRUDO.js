$(document).ready(
    function(){

    $("#fol").hide();
    $("#table").hide();
    $("#sub").hide();
    $("#Error").hide();
    $("#Exito").hide();

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
    });

    $("#table").change(function(){
        $("#sub").show();
    });

    $("#fol").blur(function(){
        $("#sub").show();
    });

    /*$.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#result").html(res)}});*/

    $("#accion").submit(function(e){
        alert(a);
        e.preventDefault();
        var acc= $("#Tipo").val();
        switch (acc){ 
            case 'D':
                var fol=$("#fol").val();
                $.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false, success:function(res){
                    if(res==true){
                        ("#Exito").classList.remove("d-none");
                        ("#Exito").classList.add("d-flex");
                        $("#Exito").show();   
                    }else{
                        ("#Error").classList.remove("d-none");
                        ("#Error").classList.add("d-flex");
                        $("#Error").show();
                    }
                }});             
            break;
            case 'U':
                /*CRUDU.PHP*/
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
        $.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#container").html(res)}});
        
    });

    $("#eliminar").submit(function(e){
        e.preventDefault();
        var fol = $("#fol").val();
        alert(fol);
        //$.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false, success:function(res){ $("#container").html(res)}});
        
    });

});