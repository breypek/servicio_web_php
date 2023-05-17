$(document).ready(function(){


    /*$("#agregar").click(function(){

        $('#form').toggle();
    })*/



        $("#guardar").click(function(e){
            e.preventDefault();
            guardarProducto()
    
        });


        $("#cerrar-modal").click(function(e){
          
          limpiarInputs()
           $(".error").html("")
           $(".error").hide()
    
        });


        $('#precio').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });


          $(".table tbody").on('mousedown','tr',function(e){
   
               if(e.which == 3) 
                 {
                  e.preventDefault()
                    let td= $(this).find('td')[0];
                    let producto=$(td).html()
                    let id=td.id
                    

                    result = confirm('Desea eliminar el producto ' + producto + ' ?');

                    if(result){
                      eliminarProducto(id)
                    }
                 

                 }
           });

})

  function guardarProducto(){

    $(".error").html("")
    $(".error").hide()
    let nombre=  $("#nombre").val();
    let descripcion=  $("#descripcion").val();
    let fabricante=  $("#fabricante").val();
    let precio=  $("#precio").val();

     if(nombre=='' || descripcion=='' || fabricante=='' || precio=="" || precio==0){
         $(".error").html("Diligencia todos los datos")
         $(".error").show()
          return;
     }

       loading(true)
   
        $.ajax({
              method: "POST",
              url: "index.php?controlador=Productos&accion=nuevoProducto",
              data: { nombre: nombre, descripcion: descripcion, fabricante:fabricante,
                  precio:precio
              },
              dataType : 'json',
              success : function(json) {

                let tipoAlerta= !json.error ? 'success' : 'warning'

                alertNotify(json.mensaje, tipoAlerta)

                if(!json.error){
                  $('#staticBackdrop').modal('hide')
                  limpiarInputs()
                  listarProductos()
                }
            },
            error : function(xhr, status) {
          
                $.notify("Disculpe, existió un problema'", "error");
            },
            complete: function(){
              console.log("completado")
             setTimeout(() => {
              loading(false)
             }, 200);
            }
       })

  }


  function alertNotify(mensaje, tipo){
    $.notify(mensaje, tipo);
  }

  function listarProductos(){

    $.ajax({
        method: "GET",
        url: "index.php?controlador=Productos&accion=listar",
        success: function( data ) {
            listarProductosTabla(data)
           
       },
      error: function( error) {
        alert( 'error', error );
      }
    });

  }


  function limpiarInputs(){

    $("#nombre").val("")
    $("#descripcion").val("")
    $("#fabricante").val("")
    $("#precio").val("")

  }


  function listarProductosTabla(productos){
       $(".table tbody").html("")

       productos.forEach(function(producto) {
        $(".table tbody").append(`
        <tr>
        <td id=${producto.id}>${producto.nombre}</td>
        <td>${producto.descripcion}</td>
        <td>${producto.fabricante}</td>
        <td>${producto.precio}</td>
        </tr>
        `);
    })
     
       

  }


  function loading(show=false){

    if(show){
      $('#load').addClass("show");
    }else{
      $('#load').removeClass("show");
    }
    

  }


  function eliminarProducto(id){

    $.ajax({
      method: "GET",
      url: "index.php?controlador=Productos&accion=eliminar&id=" + id,
      success: function( data) {
         console.log(data)
        let tipoAlerta= !data.error ? 'success' : 'warning'

        alertNotify(data.mensaje, tipoAlerta)

        if(!data.error){
          listarProductos()
        }
       
         
     },
    error: function( error) {
      alert( 'error', error );
    }
  });

  }