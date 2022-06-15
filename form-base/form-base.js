alert("hola");

$(document).ready(function(){
    $("#formulario-prin").submit(function(e){
        e.preventDefault();
        var folio = $("#folio").val();
        var cendi = $("#CENDI").val();
        // var img_niño     <---- Para el Ascencio
        var kid_apellido_pat = $("#kid_apellido_pat").val();
        var kid_apellido_mat = $("#kid_apellido_mat").val();
        var kid_nombres = $("#kid_nombres").val();
        var kid_birthday = $("#kid_birthday").val();
        var kid_age = $("#kid_age").val();
        var kid_CURP = $("#kid_CURP").val();
        var kid_foto = 'default.png';
        var kid_dos_padres = true;
        var kid_cita = 1;
        var kid_entrevista = 1;
        var kid_grupo = $("#grupo").val();

        // Datos del derechohabiente

        var der_apellido_pat = $("#der_apellido_pat").val();
        var der_apellido_mat = $("#der_apellido_mat").val();
        var der_nombres = $("#der_nombres").val();
        var der_cp = $("#der_cp").val();
        var der_entidad = $("#der_entidad").val();
        var der_alcaldia = $("#der_alcaldia").val();
        var der_colonia = $("#der_colonia").val();
        var der_calle = $("#der_calle").val();
        alert(folio+" "+cendi+" "+kid_apellido_pat+" "+kid_apellido_mat+" "+kid_nombres+" "+kid_birthday+" "+kid_age+" "+kid_CURP+" "+kid_foto+" "+kid_dos_padres+" "+kid_cita+" "+kid_entrevista+" "+kid_grupo);
        $.ajax ({
            method:"POST", //similar al atributo 'method' de la etiqueta FORM
            url:"./form-base/form-base.php", //similar al atributo 'action' de la etiqueta FORM
            data:{folio:folio,
            cendi:cendi,
            kid_apellido_pat:kid_apellido_pat,
            kid_apellido_mat:kid_apellido_mat,
            kid_nombres:kid_nombres,
            kid_birthday:kid_birthday,
            kid_age:kid_age,
            kid_CURP:kid_CURP,
            kid_foto:kid_foto,
            kid_dos_padres:kid_dos_padres,
            kid_cita:kid_cita,
            kid_entrevista:kid_entrevista,
            kid_grupo:kid_grupo},
            cache:false, //evitamos que la página del servidor se almacene en la cache del navegador
            success:function(r){ //cuando el servidor de la respuesta ¿qué haremos con ella?
                if(r==1){
                    alert("agregado con exito");
                }else{
                    alert("Fallo el server");
                }
            }

        });
    });
});