<?php

    class Recuperar extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(isset($_SESSION['login'])){
                header("Location: ".base_url()."/dashboard");
            }

            parent::__construct();
        }

        public function recuperar()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Recuperar";
            $data['page_title'] = "Página principal";
            $data['page_name'] = "recuperar";
            $data['page_functions_js'] = "function_login.js";
            
            $this->views->getView($this, "recuperar", $data);
        }

        public function resetPass()
        {
            if($_POST)
            {
                error_reporting(0);

                if(empty($_POST['txtEmailReset']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $token = token();
                    $strEmail = strtolower(strClean($_POST['txtEmailReset']));
                    $arrData = $this->model->getUserEmail($strEmail);

                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'El usuario ingresado no se encuentra en los registros.');
                    }else{
                        $idpersona = $arrData['idpersona'];
                        $nombreUsuario = $arrData['nombres']." ".$arrData['apellidos'];
                        $urlRecovery = base_url()."/recuperar/confirmUser/".$strEmail."/".$token;
                        $requestUpdate = $this->model->setTokenUser($idpersona, $token);
                        $dataUsuario = array('nombreUsuario' => $nombreUsuario, 'email' => $strEmail, 'asunto' => 'Recuperar cuenta - '.NOMBRE_REMITENTE, 'url_recovery' => $urlRecovery);
                        
                        if($requestUpdate)
                        {
                            $sendEmail = sendEmail($dataUsuario, 'email_cambioPassword');

                            if($sendEmail){
                                $arrResponse = array('status' => true, 'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.');
                            }else{
                                $arrResponse = array('status' => false, 'msg' => 'No ha sido posible realizar el envio de email para cambiar tu contraseña.');
                            } 
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'No ha sido posible realizar el envio de email para cambiar tu contraseña.');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function confirmUser(string $params)
        {
            if(empty($params))
            {
                header("Location: ".base_url());
            }else{
                $arrParams = explode(",", $params);
                $strEmail = strtolower(strClean($arrParams[0]));
                $strToken = strClean($arrParams[1]);
                $arrResponse = $this->model->getUsuario($strEmail, $strToken);

                if(empty($arrResponse))
                {
                    header("Location: ".base_url());
                }else{
                    $data['page_tag'] = "Cambiar Contraseña";
                    $data['page_title'] = "Cambiar Contraseña";
                    $data['page_name'] = "cambiar_contrasena";
                    $data['idpersona'] = $arrResponse['idpersona'];
                    $data['email'] = $strEmail;
                    $data['token'] = $strToken;
                    $data['page_functions_js'] = "function_login.js";

                    $this->views->getView($this, "cambiar_password", $data);
                }
            }

            die();            
        }

        public function setPassword()
        {
            if(empty($_POST['idUsuario']) || empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm']) || empty($_POST['txtEmail']) || empty($_POST['txtToken']))
            {
                $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
            }else{
                $intIdpersona = intval($_POST['idUsuario']);
                $strPassword = $_POST['txtPassword'];
                $strPasswordConfirm = $_POST['txtPasswordConfirm'];
                $strEmail = strClean($_POST['txtEmail']);
                $strToken = strClean($_POST['txtToken']);

                if($strPassword != $strPasswordConfirm){
                    $arrResponse = array('status' => false, 'msg' => 'Las contraseñas ingresadas no son iguales.');
                }else{
                    $arrResponseUser = $this->model->getUsuario($strEmail, $strToken);

                    if(empty($arrResponseUser))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                    }else{
                        $strPassword = hash("SHA256", $strPassword);
                        $requestPass = $this->model->insertPassword($intIdpersona, $strPassword);

                        if($requestPass)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'La contraseña ha sido actualizada correctamente.');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'No ha sido posible realizar el cambio de tu contraseña.');
                        }
                    }
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

    }