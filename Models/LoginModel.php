<?php

    class LoginModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;

        public function __construct()
        {
            parent::__construct();
        }

        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;

            $sql = "SELECT idpersona, status FROM persona WHERE email_user = '{$this->strUsuario}' AND password = '{$this->strPassword}' AND status != 0";
            $request = $this->select($sql);
            
            return $request;
        }

        public function sessionLogin(int $idusuario)
        {
            $this->intIdUsuario = $idusuario;
            // BUSCAR ROL
            $sql = "SELECT p.idpersona, p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, p.nit, p.nombrefiscal, p.direccionfiscal, r.idrol, r.nombrerol, p.status FROM persona p INNER JOIN rol r ON p.rolid = r.idrol WHERE p.idpersona = $this->intIdUsuario";
            $request = $this->select($sql);
            $_SESSION['userData'] = $request;

            return $request;
        }
        
    }