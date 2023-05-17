
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link href="./assets/css/index.css" rel="stylesheet" >
</head>
<body>
<div class="containter">

    <h2>PRODUCTOS</h2>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Agregar</button>

    
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Producto nuevo</h1>
                   
                </div>
                <p  class="error text-bg-danger p-1" style="display:none"></p>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-6">
                            <input type="text"  class="form-control" id="nombre" autocomplete="off" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="descripcion" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fabricante" class="col-sm-2 col-form-label">Fabricante</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fabricante" autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"  id="precio" autocomplete="off">
                            </div>
                        </div>
                    </form>
                 </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cerrar-modal" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar" >Guardar</button>
                </div>
            </div>
        </div>
    </div>

  

                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Descripcion</strong></td>
                            <td><strong>Fabicante</strong></td>
                            <td><strong>Precio</strong></td>
                        
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        for ($i = 0; $i < count($productos); $i++) {
                            ?>
                            <tr>
                                <td id=<?php echo $productos[$i]["id"]; ?>><?php echo $productos[$i]["nombre"]; ?></td>
                                <td><?php echo $productos[$i]["descripcion"]; ?> </td>
                                <td><?php echo $productos[$i]["fabricante"]; ?> </td>
                                <td><?php echo $productos[$i]["precio"]; ?></td>
                               
                            </tr>
                            <?php
                        }
                        ?>
                     </tbody>
                    </table>

    <div id="load" class="loading">
        <div class="spin">

        </div>
    </div>

 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/notify.js"></script>
    <script src="./assets/js/productos.js"></script>
</body>

</html>