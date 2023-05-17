CREATE TABLE Productos ( 
id int PRIMARY KEY AUTO_INCREMENT, 
nombre varchar(255) NOT NULL, 
descripcion varchar(255) NOT NULL, 
fabricante varchar(255) NOT NULL, precio decimal(16,4) NOT NULL 
);