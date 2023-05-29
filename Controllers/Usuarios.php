<?php

    class Usuarios extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."/login");
            }
            
            parent::__construct();
            getPermisos(3);
        }

        public function usuarios()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url()."/dashboard");
            }

            $data['page_tag'] = "Usuarios - Tienda Virtual";
            $data['page_title'] = "Usuarios";
            $data['page_name'] = "usuarios";
            $data['page_icono'] = '<i class="fa-solid fa-users"></i>';
            $data['page_functions_js'] = "function_usuarios.js";

            $this->views->getView($this, "usuarios", $data);
        }

        public function setUsuario()
        {
            if($_POST)
            {
                if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idUsuario = intval($_POST['idUsuario']);
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $intTipoid = intval(strClean($_POST['listRolid']));
                    $intStatus = intval(strClean($_POST['listStatus']));
                    $request_user = "";

                    if($idUsuario == 0)
                    {
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);

                        if($_SESSION['permisosMod']['w'])
                        {
                            $request_user = $this->model->insertUsuario($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $strPassword, $intTipoid, $intStatus);
                        }
                    }else{
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
                        if($_SESSION['permisosMod']['u'])
                        {
                            $request_user = $this->model->updateUsuario($idUsuario, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $strPassword, $intTipoid, $intStatus);
                        }
                    }

                    if($request_user > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
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

        public function getUsuarios()
        {
            if($_SESSION['permisosMod']['r'])
            {
                $arrData = $this->model->selectUsuarios();

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
                        $btnView = '<button class="btn btn-dark btn-sm btnViewUsuario" onclick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver"><i class="fa-solid fa-eye"></i></button>';
                    }

                    if($_SESSION['permisosMod']['u'])
                    {
                        if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1))
                        {
                            $btnEdit = '<button class="btn btn-warning btn-sm btnEditUsuario" onclick="fntEditUsuario(this, '.$arrData[$i]['idpersona'].')" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>';
                        }else{
                            $btnEdit = '<button class="btn btn-warning btn-sm" title="Editar" disabled><i class="fa-solid fa-pen-to-square"></i></button>';
                        }
                    }
                    
                    if($_SESSION['permisosMod']['d'])
                    {
                        if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) || ($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and ($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona']))
                        {
                            $btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onclick="fntDelUsuario('.$arrData[$i]['idpersona'].')" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>';
                        }else{
                            $btnDelete = '<button class="btn btn-danger btn-sm" title="Eliminar" disabled><i class="fa-solid fa-trash-can"></i></button>';
                        }
                        
                    }

                    $arrData[$i]['acciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }

                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getUsuario($idpersona)
        {
            if($_SESSION['permisosMod']['r'])
            {
                $idusuario = intval($idpersona);

                if($idusuario > 0)
                {
                    $arrData = $this->model->selectUsuario($idusuario);

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

        public function delUsuario()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdpersona = intval($_POST['idpersona']);
                    $requestDelete = $this->model->deleteUsuario($intIdpersona);
                    
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

        public function perfil()
        {
            $data['page_tag'] = "Perfil Usuario - Tienda Virtual";
            $data['page_title'] = "Perfil de Usuario";
            $data['page_name'] = "perfil";
            $data['page_icono'] = '<i class="fa-solid fa-id-card-clip"></i>';
            $data['page_functions_js'] = "function_usuarios.js";

            $this->views->getView($this, "perfil", $data);
        }

        public function putPerfil()
        {
            if($_POST)
            {
                if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idUsuario = intval($_SESSION['idUser']);
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strPassword = "";

                    if(!empty($_POST['txtPassword']))
                    {
                        $strPassword = hash("SHA256", $_POST['txtPassword']);
                    }

                    $request_user = $this->model->updatePerfil($idUsuario, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strPassword);

                    if($request_user)
                    {
                        sessionUser($_SESSION['idUser']);
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar los datos.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function putDFiscal()
        {
            if($_POST)
            {
                if(empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idUsuario = intval($_SESSION['idUser']);
                    $strNit = strClean($_POST['txtNit']);
                    $strNomFiscal = strClean($_POST['txtNombreFiscal']);
                    $strDirFiscal = strClean($_POST['txtDirFiscal']);
                    $request_datafiscal = $this->model->updateDataFiscal($idUsuario, $strNit, $strNomFiscal, $strDirFiscal);

                    if($request_datafiscal)
                    {
                        sessionUser($_SESSION['idUser']);
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar los datos.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

    }