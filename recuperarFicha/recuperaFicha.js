$(document).ready(function(){
    $("#recuperaF_form").submit(function(e){
        e.preventDefault();
        var folio = $("#folio").val();
        $.ajax ({
            method:"POST", //similar al atributo 'method' de la etiqueta FORM
            url:"recuperaFicha.php", //similar al atributo 'action' de la etiqueta FORM
            data:{folio:folio},
            cache:false, //evitamos que la página del servidor se almacene en la cache del navegador
            success:function(respAX){ //cuando el servidor de la respuesta ¿qué haremos con ella?
                if(respAX==''){  // No existe el folio
                    $("#mensaje").html("No existe el folio. Inténtalo de nuevo o regístrate dando clic <a href='../formulario.html'>aquí</a>");
                }else{ // Existe el folio
                    var url = "../Reporte.php?folio="+folio;
                    window.open(url);
                }
            }

        });
    });
});