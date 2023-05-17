<?php

class Producto{
	
	 private $nombre;
	 private $descripcion;
	 private $fabricante;
	 private $precio;
  
  
  
    public function setNombre($nombre){
		
		$this->nombre=$nombre;
		
	}
	
	 public function getNombre(){
			
			return $this->nombre;
			
     }


	 public function setDescripcion($descripcion){
		
		$this->descripcion=$descripcion;
		
	}
	
	 public function getDescripcion(){
			
			return $this->descripcion;
			
     }
	 
	 
	  public function setFabricante($fabricante){
			
			$this->fabricante=$fabricante;
			
     }
	 
	  public function getFabricante(){
			
			return $this->precio;
			
     }
	 
	 
	 public function setPrecio($precio){
			
			$this->precio=$precio;
			
     }
	 
	 public function getPrecio(){
			
			return $this->precio;
			
     }
		 
	 
	
}

?>