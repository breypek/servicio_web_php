<?php
require_once './Model/Producto.php';
require_once './Model/ProductoDAO.php';

class ProductosController 
{


	
	public function index(){

		$pAdo=new productoDAO();
		$productos=$pAdo->selectProductos();
		require_once './Views/productosView.php';
	}
	


	public function listar(){
		
		$pAdo=new productoDAO();
		$productos=$pAdo->selectProductos();	

	   header('Content-type: application/json');
        echo json_encode( $productos );
	
	}
	

	public function producto(){
		
	
		$pAdo=new productoDAO();

		if(!isset($_GET['id'])){
			echo json_encode(["mensaje" => "No existe id del producto", "error"=> true]);
			return;
		 }


		$producto=$pAdo->productoPorId($_GET['id']);

		header('Content-type: application/json');
        echo json_encode( $producto );
		
	}
	


	public function nuevoProducto(){
		
		$pAdo=new productoDAO();
        $producto= new Producto();

		$producto->setNombre($_POST['nombre']);
		$producto->setDescripcion($_POST['descripcion']);
		$producto->setFabricante($_POST['fabricante']);
		$producto->setPrecio($_POST['precio']);

	
		$filas_afectadas= $pAdo->insertarProducto($producto);

		
		header('Content-type: application/json');
		
		if($filas_afectadas>0){
			
        echo json_encode(["mensaje" => "Producto guardado", "error"=> false]);
		
		}else{

			echo json_encode(["mensaje" => "Error al guardar", "error"=> true]);
		}

		
	

	}


	public function eliminar(){
		$pAdo= new productoDAO();
    
		header('Content-type: application/json');     
		 if(!isset($_GET['id'])){
			echo json_encode(["mensaje" => "Seleccione el producto a eliminar", "error"=> true]);
			return;
		 }

		$result= $pAdo->elminarProducto($_GET['id']);

		 if($result){
		 	echo json_encode(["mensaje" => "Producto eliminado", "error"=> false]);
			return;
		 }

		 echo json_encode(["mensaje" => "Producto no encontrado", "error"=> true]);
	}




	
	
	
	
}

?>