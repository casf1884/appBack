<?php

    class Mysql extends Conexion
    {
        private $conexion;
        private $strquery;
        private $arrValues;

        function __construct()
        {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        //INSERTAR UN REGISTRO
        public function insert(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrayValues = $arrValues;
            $insert = $this->conexion->prepare($this->strquery);
            $resInsert = $insert->execute($this->arrayValues);

            if($resInsert)
            {
                $lastInsert = $this->conexion->lastInsertId();
            }else{
                $lastInsert = 0;
            }

            return $lastInsert;
        }

        //BUSCAR UN REGISTRO
        public function select(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

        //DEVUELVE TODOS LOS REGISTROS
        public function select_all(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);

            return $data;
        }

        //ACTUALIZA REGISTROS
        public function update(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrayValues = $arrValues;
            $update = $this->conexion->prepare($this->strquery);
            $resExecute = $update->execute($this->arrayValues);

            return $resExecute;
        }

        //ELIMINAR UN REGISTRO
        public function delete(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $del = $result->execute();

            return $del;
        }
    }