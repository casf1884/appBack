<?php

    class Clientes extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."/login");
            }
            
            parent::__construct();
            getPermisos(4);
        }

        public function clientes()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url()."/dashboard");
            }

            $data['page_tag'] = "Clientes - Tienda Virtual";
            $data['page_title'] = "Clientes";
            $data['page_name'] = "clientes";
            $data['page_icono'] = '<i class="fa-solid fa-people-carry-box"></i>';
            $data['page_functions_js'] = "function_clientes.js";

            $this->views->getView($this, "clientes", $data);
        }

        
        public function setCliente()
        {
            if($_POST)
            {
                if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idUsuario = intval($_POST['idUsuario']);
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $strNit = strClean($_POST['txtNit']);
                    $strNomFiscal = strClean($_POST['txtNombreFiscal']);
                    $strDirFiscal = strClean($_POST['txtDirFiscal']);
                    $intTipoId = 5;
                    $request_user = "";

                    if($idUsuario == 0)
                    {
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? passGenerator() : $_POST['txtPassword'];
                        $strPasswordEncript = hash("SHA256", $strPassword);

                        if($_SESSION['permisosMod']['w'])
                        {
                            $request_user = $this->model->insertCliente($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $strPasswordEncript, $strNit, $strNomFiscal, $strDirFiscal, $intTipoId);
                        }
                    }else{
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
                        if($_SESSION['permisosMod']['u'])
                        {
                            $request_user = $this->model->updateCliente($idUsuario, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $strPassword, $strNit, $strNomFiscal, $strDirFiscal);
                        }
                    }

                    if($request_user > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                            $nombreUsuario = $strNombre." ".$strApellido;
                            $dataUsuario = array('nombreUsuario' => $nombreUsuario, 'email' => $strEmail, 'password' => $strPassword, 'asunto' => 'Bienvenido a '.NOMBRE_EMPRESA);
                            sendEmail($dataUsuario, 'email_bienvenida');
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        }  
                    }else if($request_user == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'El email o la identificación ingresados ya existen.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getClientes()
        {
            if($_SESSION['permisosMod']['r'])
            {
                $arrData = $this->model->selectClientes();

                for ($i=0; $i < count($arrData); $i++){
                    $btnView = "";
                    $btnEdit = "";
                    $btnDelete = "";

                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge bg-success">ACTIVO</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge bg-danger">INACTIVO</span>';
                    }

                    if($_SESSION['permisosMod']['r'])
                    {
                        $btnView = '<button class="btn btn-dark btn-sm" onclick="fntViewCliente('.$arrData[$i]['idpersona'].')" title="Ver"><i class="fa-solid fa-eye"></i></button>';
                    }

                    if($_SESSION['permisosMod']['u'])
                    {
                        $btnEdit = '<button class="btn btn-warning btn-sm" onclick="fntEditCliente(this, '.$arrData[$i]['idpersona'].')" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>';
                    }
                    
                    if($_SESSION['permisosMod']['d'])
                    {
                        $btnDelete = '<button class="btn btn-danger btn-sm" onclick="fntDelCliente('.$arrData[$i]['idpersona'].')" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>';                        
                    }

                    $arrData[$i]['acciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }

                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getCliente($idpersona)
        {
            if($_SESSION['permisosMod']['r'])
            {
                $idusuario = intval($idpersona);

                if($idusuario > 0)
                {
                    $arrData = $this->model->selectCliente($idusuario);

                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }

        public function delCliente()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdpersona = intval($_POST['idpersona']);
                    $requestDelete = $this->model->deleteCliente($intIdpersona);
                    
                    if($requestDelete)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado correctamente.');
                    }else
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar los datos.');
                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }
    }