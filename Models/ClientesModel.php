<?php

    class ClientesModel extends Mysql
    {
        private $intIdUsuario;
        private $strIdentificacion;
        private $strNombre;
        private $strApellido;
        private $intTelefono;
        private $strEmail;
        private $strPassword;
        private $strToken;
        private $intTipoId;
        private $intStatus;
        private $strNit;
        private $strNomFiscal;
        private $strDirFiscal;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, string $nit, string $nomFiscal, string $dirFiscal, int $tipoId)
        {
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strPassword = $password;
            $this->strNit = $nit;
            $this->strNomFiscal = $nomFiscal;
            $this->strDirFiscal = $dirFiscal;
            $this->intTipoId = $tipoId;
            $return = 0;

            $sql = "SELECT * FROM persona WHERE email_user = '{$this->strEmail}' OR identificacion = '{$this->strIdentificacion}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO persona (identificacion, nombres, apellidos, telefono, email_user, password, rolid, nit, nombrefiscal, direccionfiscal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strPassword, $this->intTipoId, $this->strNit, $this->strNomFiscal, $this->strDirFiscal);
                $request_insert = $this->insert($query_insert, $arrData);

                $return = $request_insert;
            }else{
                $return = false;
            }

            return $return;
        }

        public function selectClientes()
        {
            $sql = "SELECT idpersona, identificacion, nombres, apellidos, telefono, email_user, status FROM persona WHERE rolid = 5 AND status != 0";
            $request = $this->select_all($sql);
            
            return $request;
        }

        public function selectCliente(int $idpersona)
        {
            $this->intIdUsuario = $idpersona;
            $sql = "SELECT idpersona, identificacion, nombres, apellidos, telefono, email_user, nit, nombrefiscal, direccionfiscal, status, DATE_FORMAT(datecreated, '%d-%m-%Y') AS fechaRegistro FROM persona WHERE rolid = 5 AND idpersona = $this->intIdUsuario";
            $request = $this->select($sql);
            
            return $request;
        }

        public function updateCliente(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, string $nit, string $nomFiscal, string $dirFiscal)
        {
            $this->intIdUsuario = $idUsuario;
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strPassword = $password;
            $this->strNit = $nit;
            $this->strNomFiscal = $nomFiscal;
            $this->strDirFiscal = $dirFiscal;

            $sql = "SELECT * FROM persona WHERE (email_user = '{$this->strEmail}' AND idpersona != $this->intIdUsuario) OR (identificacion = '{$this->strIdentificacion}' AND idpersona != $this->intIdUsuario)";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                if($this->strPassword != "")
                {
                    $sql = "UPDATE persona SET identificacion = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, password = ?, nit = ?, nombrefiscal = ?, direccionfiscal = ? WHERE idpersona = $this->intIdUsuario";

                    $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strPassword, $this->strNit, $this->strNomFiscal, $this->strDirFiscal);
                }else{
                    $sql = "UPDATE persona SET identificacion = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, nit = ?, nombrefiscal = ?, direccionfiscal = ? WHERE idpersona = $this->intIdUsuario";

                    $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strNit, $this->strNomFiscal, $this->strDirFiscal);
                }

                $request = $this->update($sql, $arrData);
            }else{
                $request = false;
            }

            return $request;
        }

        public function deleteCliente(int $idpersona)
        {
            $this->intIdUsuario = $idpersona;
            $sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array(0);
            $request = $this->update($sql, $arrData);

            return $request;
        }

        


        
    }