<?php

require_once 'Conexion.php';
require_once 'Producto.php';

class ProductoDAO{
	

	public function selectProductos(){
		
        $con = Conexion::getInstance();
		$productos=$con->select("SELECT id, nombre, descripcion, fabricante, precio FROM productos");
		return $productos;
		
	}


	public function productoPorId($id){
		
        $con = Conexion::getInstance();
		$producto=$con->select("SELECT id, nombre, descripcion, fabricante, precio FROM productos WHERE id=?", array($id));
		
		return $producto;
		
	}



	public function insertarProducto(Producto $producto){
		
        $con = Conexion::getInstance();
		$filas= $con->insertar("INSERT INTO productos (nombre, descripcion, fabricante, precio) VALUES (?,?,?,?)", 
		array($producto->getNombre(),$producto->getDescripcion(),$producto->getFabricante(),
		$producto->getPrecio()));
		
		return $filas;
		
		
	}


	public function elminarProducto($id){
		
        $con = Conexion::getInstance();
		$sentencia=$con->getConexion()->prepare("DELETE FROM productos WHERE id = ?;");
	     $sentencia->execute([$id]);
		if($sentencia->rowCount()>0) return true;
		return false;
		
		
	}





	
	
	
	
	
}

?>