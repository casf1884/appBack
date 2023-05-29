<?php

    class RecuperarModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {
            parent::__construct();
        }

        public function getUserEmail(string $strEmail)
        {
            $this->strUsuario = $strEmail;

            $sql = "SELECT idpersona, nombres, apellidos, status FROM persona WHERE email_user = '{$this->strUsuario}' AND status = 1";
            $request = $this->select($sql);

            return $request;
        }

        public function setTokenUser(int $idpersona, string $token)
        {
            $this->intIdUsuario = $idpersona;
            $this->strToken = $token;

            $sql = "UPDATE persona SET token = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array($this->strToken);
            $request = $this->update($sql, $arrData);

            return $request;
        }

        public function getUsuario(string $email, string $token)
        {
            $this->strUsuario = $email;
            $this->strToken = $token;

            $sql = "SELECT idpersona FROM persona WHERE email_user = '{$this->strUsuario}' AND token = '{$this->strToken}' AND status = 1";
            $request = $this->select($sql);

            return $request;
        }

        public function insertPassword(int $idpersona, string $password)
        {
            $this->intIdUsuario = $idpersona;
            $this->strPassword = $password;

            $sql = "UPDATE persona SET password = ?, token = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array($this->strPassword, "");
            $request = $this->update($sql, $arrData);

            return $request;
        }
    }