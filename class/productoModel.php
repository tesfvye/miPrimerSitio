<?php 

    require_once('modelo.php');

    class ProductoModel extends Modelo
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getProductos()
        {
            $productos = $this->_db->query("SELECT p.id, p.nombre, m.nombre AS marca, pt.nombre AS productoTipo FROM productos p 
            INNER JOIN marcas m ON p.marca_id = m.id INNER JOIN producto_tipos pt ON p.producto_tipo_id = pt.id ORDER BY p.nombre;");

            return $productos->fetchall();
        }

        public function getProductoNombre($nombre)
        {
            $producto = $this->_db->prepare("SELECT id FROM productos WHERE nombre = ?");
            $producto->bindParam(1, $nombre);
            $producto->execute();
        
            return $producto->fetch(); 
        }

        public function getProductoId($id)
        {
            $id = (int) $id;
            
            $producto = $this->_db->prepare("SELECT p.id, p.sku , p.nombre, p.precio, activo, p.marca_id, 
            p.producto_tipo_id, p.created_at, p.updated_at, m.nombre AS marca, pt.nombre AS productoTipo FROM productos p 
            INNER JOIN marcas m ON p.marca_id = m.id INNER JOIN producto_tipos pt ON p.producto_tipo_id = pt.id WHERE p.id = ?");

            $producto->bindParam(1, $id);
            $producto->execute();

            return $producto->fetch();
        }
       
        public function setProducto($sku, $nombre, $precio, $marca, $productoTipo)
        {
            $producto = $this->_db->prepare("INSERT INTO productos(sku, nombre, precio, activo, marca_id, 
            producto_tipo_id, created_at, updated_at) VALUES(?, ?, ?, 1, ?, ?, NOW(), NOW())");

            $precio       = (int) $precio;
            $marca        = (int) $marca;
            $productoTipo = (int) $productoTipo;

            $producto->bindParam(1, $sku);
            $producto->bindParam(2, $nombre);
            $producto->bindParam(3, $precio);
            $producto->bindParam(4, $marca);
            $producto->bindParam(5, $productoTipo);
            $producto->execute();

            $row = $producto->rowCount();

            return $row;
        }

        public function updateProducto($id, $sku, $nombre, $precio, $activo, $marca, $productoTipo)
        {
            $id           = (int) $id;
            $precio       = (int) $precio;
            $marca        = (int) $marca;
            $productoTipo = (int) $productoTipo;
    
            $producto = $this->_db->prepare("UPDATE productos SET sku = ?, nombre = ?, precio = ?, 
            activo = ?, marca_id = ?, producto_tipo_id = ?, updated_at = NOW() WHERE id = ? ");

            $producto->bindParam(1 ,$sku);
            $producto->bindParam(2, $nombre);
            $producto->bindParam(3, $precio);
            $producto->bindParam(4, $activo);
            $producto->bindParam(5, $marca);
            $producto->bindParam(6, $productoTipo);
            $producto->bindParam(7, $id);
            $producto->execute();
    
            $row = $producto->rowCount();
    
            return $row;
        }

        public function deleteProducto($id)
        {
            $id = (int) $id;

            $producto = $this->_db->prepare("DELETE FROM productos WHERE id = ?");
            $producto->bindParam(1,$id);
            $producto->execute();

            $row = $producto->rowCount();

            return $row;
        }
    }