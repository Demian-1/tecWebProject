$(document).ready(
    function(){

    $("#fol").hide();
    $("#table").hide();
    $("#sub").hide();
    $("#Error").hide();
    $("#Exito").hide();
    $("#Form2").hide();
    $("#recargar").hide();

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

    $("#fol").change(function(){
        $("#sub").show();
    });

    /**/

    $("#accion").submit(function(e){
        e.preventDefault();
        $("#mainc").hide();
        $("#recargar").show();
        var acc= $("#Tipo").val();
        //alert(acc);
        switch (acc){ 
            case 'D':
                var fol=$("#fol").val();
                $.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false, success:function(res){
                    alert(res);
                    if(res==1){
                        $("#Exito").show();   
                    }else{
                        $("#Error").show();
                    }
                }});             
            break;
            case 'U':
                
            break;
            case 'R':
                var table=$("#table").val();
                $.ajax ({method:"POST", url:"CRUDR.php", data:{table:table}, cache:false, success:function(res){ $("#result").html(res)}});
            break;
            case 'C':
                alert("CREAR");
                $("#Form2").show();
            break;
        } 
        //$.ajax ({method:"POST", url:"CRUDR.php", cache:false, success:function(res){ $("#container").html(res)}});
    });
    $("#recargar").click(function(e){
            location.reload();
    });
    /*$("#eliminar").submit(function(e){
        e.preventDefault();
        var fol = $("#fol").val();
        alert(fol);
        //$.ajax ({method:"POST", url:"CRUDD.php", data:{fol:fol}, cache:false, success:function(res){ $("#container").html(res)}});
        
    });*/

});