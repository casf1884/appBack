<?php

    class ProductosModel extends Mysql
    {
        private $intIdProducto;
        private $strNombre;
        private $strDescripcion;
        private $strCodigo;
        private $intCategoriaId;
        private $intPrecio;
        private $intStock;
        private $intStatus;
        private $strImagen;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertProducto(string $nombre, string $descripcion, string $codigo, int $categoriaId, int $precio, int $stock, int $status)
        {
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strCodigo = $codigo;
            $this->intCategoriaId = $categoriaId;
            $this->intPrecio = $precio;
            $this->intStock = $stock;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM producto WHERE codigo = '{$this->strCodigo}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO producto (categoriaid, codigo, nombre, descripcion, precio, stock, status) VALUES (?, ?, ?, ?, ?, ?, ?)";

                $arrData = array($this->intCategoriaId, $this->strCodigo, $this->strNombre, $this->strDescripcion, $this->intPrecio, $this->intStock, $this->intStatus);
                $request_insert = $this->insert($query_insert, $arrData);

                $return = $request_insert;
            }else{
                $return = false;
            }

            return $return;
        }

        public function selectProductos()
        {
            $sql = "SELECT p.idproducto, p.codigo, p.nombre, p.descripcion, p.categoriaid, c.nombre AS categoria, p.precio, p.stock, p.status FROM producto p INNER JOIN categoria c ON p.categoriaid = c.idcategoria WHERE p.status != 0";
            $request = $this->select_all($sql);
            
            return $request;
        }

        public function selectProducto(int $idproducto)
        {
            $this->intIdProducto = $idproducto;

            $sql = "SELECT p.idproducto, p.codigo, p.nombre, p.descripcion, p.categoriaid, c.nombre AS categoria, p.precio, p.stock, p.status FROM producto p INNER JOIN categoria c ON p.categoriaid = c.idcategoria WHERE p.idproducto = $this->intIdProducto";
            $request = $this->select($sql);
            
            return $request;
        }

        public function updateProducto(int $idproducto, string $nombre, string $descripcion, string $codigo, int $categoriaId, int $precio, int $stock, int $status)
        {
            $this->intIdProducto = $idproducto;
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strCodigo = $codigo;
            $this->intCategoriaId = $categoriaId;
            $this->intPrecio = $precio;
            $this->intStock = $stock;
            $this->intStatus = $status;

            $sql = "SELECT * FROM producto WHERE codigo = '{$this->strCodigo}' AND idproducto != '{$this->intIdProducto}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE producto SET categoriaid = ?, codigo = ?, nombre = ?, descripcion = ?, precio = ?, stock = ?, status = ? WHERE idproducto = $this->intIdProducto";
                $arrData = array($this->intCategoriaId, $this->strCodigo, $this->strNombre, $this->strDescripcion, $this->intPrecio, $this->intStock, $this->intStatus);
                $request = $this->update($sql, $arrData);
            }else{
                $request = false;
            }

            return $request;
        }

        public function deleteProducto(int $idproducto)
        {
            $this->intIdProducto = $idproducto;
            $sql = "SELECT * FROM detalle_pedido WHERE productoid = $this->intIdProducto";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE producto SET status = ? WHERE idproducto = $this->intIdProducto";
                $arrData = array(0);
                $request = $this->update($sql, $arrData);

                if($request)
                {
                    $request = "ok";
                }else{
                    $request = "error";
                }
            }else{
                $request = false;
            }

            return $request;
        }

        public function insertImage(int $idproducto, string $imagen)
        {
            $this->intIdProducto = $idproducto;
            $this->strImagen = $imagen;

            $query_insert = "INSERT INTO imagen (productoid, img) VALUES (?, ?)";
            $arrData = array($this->intIdProducto, $this->strImagen);
            $request_insert = $this->insert($query_insert, $arrData);

            return $request_insert;
        }

        public function selectImages(int $idproducto)
        {
            $this->intIdProducto = $idproducto;

            $sql = "SELECT productoid, img FROM imagen WHERE productoid = $this->intIdProducto";
            $request = $this->select_all($sql);
            
            return $request;
        }
        
        public function deleteImage(int $idproducto, string $imagen)
        {
            $this->intIdProducto = $idproducto;
            $this->strImagen = $imagen;

            $query = "DELETE FROM imagen WHERE productoid = $this->intIdProducto AND img = '{$this->strImagen}'";
            $request_delete = $this->delete($query);

            return $request_delete;
        }

        
    }