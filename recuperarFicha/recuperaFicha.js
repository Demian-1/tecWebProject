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
                    alert("No soy string");
                    alert(respAX);
                }else{ // Existe el folio
                    alert("Hola, soy un string");
                    alert(respAX);
                }
            }

        });
    });
});