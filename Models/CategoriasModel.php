<?php

    class CategoriasModel extends Mysql
    {
        private $intIdCategoria;
        private $strCategoria;
        private $strDescripcion;
        private $intStatus;
        private $strPortada;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertCategoria(string $nombre, string $descripcion, string $portada, int $status)
        {
            $this->strCategoria = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strPortada = $portada;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO categoria (nombre, descripcion, portada, status) VALUES (?, ?, ?, ?)";

                $arrData = array($this->strCategoria, $this->strDescripcion, $this->strPortada, $this->intStatus);
                $request_insert = $this->insert($query_insert, $arrData);

                $return = $request_insert;
            }else{
                $return = false;
            }

            return $return;
        }

        public function selectCategorias()
        {
            $sql = "SELECT * FROM categoria WHERE status != 0";
            $request = $this->select_all($sql);
            
            return $request;
        }

        public function selectCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            $sql = "SELECT idcategoria, nombre, descripcion, portada, status, DATE_FORMAT(datecreated, '%d-%m-%Y') AS fechaRegistro FROM categoria WHERE idcategoria = $this->intIdCategoria";
            $request = $this->select($sql);
            
            return $request;
        }

        public function updateCategoria(int $idcategoria, string $nombre, string $descripcion, string $portada, int $status)
        {
            $this->intIdCategoria = $idcategoria;
            $this->strCategoria = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strPortada = $portada;
            $this->intStatus = $status;

            $sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' AND idcategoria != $this->intIdCategoria";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE categoria SET nombre = ?, descripcion = ?, portada = ?, status = ? WHERE idcategoria = $this->intIdCategoria";
                $arrData = array($this->strCategoria, $this->strDescripcion, $this->strPortada, $this->intStatus);
                $request = $this->update($sql, $arrData);
            }else{
                $request = false;
            }

            return $request;
        }

        public function deleteCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            $sql = "SELECT * FROM producto WHERE categoriaid = $this->intIdCategoria";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE categoria SET status = ? WHERE idcategoria = $this->intIdCategoria";
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

        


        
    }