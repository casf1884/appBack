<?php

    class Roles extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."/login");
            }
            
            parent::__construct();
            getPermisos(2);
        }

        public function roles()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url()."/dashboard");
            }

            $data['page_id'] = 3;
            $data['page_tag'] = "Roles de Usuario - Tienda Virtual";
            $data['page_title'] = "Roles de Usuario";
            $data['page_name'] = "rol_usuario";
            $data['page_icono'] = '<i class="fa-solid fa-user-lock"></i>';
            $data['page_functions_js'] = "function_roles.js";
            
            $this->views->getView($this, "roles", $data);
        }

        public function getRoles()
        {
            if($_SESSION['permisosMod']['r'])
            {
                $btnView = "";
                $btnEdit = "";
                $btnDelete = "";

                $arrData = $this->model->selectRoles();

                for ($i=0; $i < count($arrData); $i++){
                    
                    
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge bg-success">ACTIVO</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge bg-danger">INACTIVO</span>';
                    }

                    if($_SESSION['permisosMod']['r'])
                    {
                        
                    }

                    if($_SESSION['permisosMod']['u'])
                    {
                        $btnView = '<button class="btn btn-dark btn-sm btnPermisosRol" onclick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="fa-solid fa-unlock-keyhole"></i></button>';
                        
                        $btnEdit = '<button class="btn btn-warning btn-sm btnEditRol" onclick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>';
                    }

                    if($_SESSION['permisosMod']['d'])
                    {
                        $btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onclick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>';
                    }
                    
                    $arrData[$i]['acciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }

                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getSelectRoles()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectRoles();

            if(count($arrData) > 0)
            {
                for($i=0; $i < count($arrData);  $i++){ 
                    if($arrData[$i]['status'] == 1)
                    {
                        $htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
                    }
                }
            }

            echo $htmlOptions;
            die();
        }

        public function getRol(int $idrol)
        {
            if($_SESSION['permisosMod']['r'])
            {
                $intIdrol = intval(strClean($idrol));

                if($intIdrol > 0)
                {
                    $arrData = $this->model->selectRol($intIdrol);

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

        public function setRol()
        {
            $intIdrol = intval($_POST['idRol']);
            $strRol = strtoupper(strClean($_POST['txtNombre']));
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
            $request_rol = "";

            if($intIdrol == 0)
            {
                // CREAR
                if($_SESSION['permisosMod']['w'])
                {
                    $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
                    $option = 1;
                }
            }else{
                // ACTUALIZAR
                if($_SESSION['permisosMod']['u'])
                {
                    $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
                    $option = 2;
                }
            }

            if($request_rol > 0)
            {
                if($option == 1)
                {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            }else if($request_rol == false)
            {
                $arrResponse = array('status' => false, 'msg' => 'El rol ingresado ya existe.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delRol()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdrol = intval($_POST['idrol']);
                    $requestDelete = $this->model->deleteRol($intIdrol);
                    
                    if($requestDelete == "ok")
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado correctamente.');
                    }else if($requestDelete == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asignado a un usuario.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Error al eliminar los datos.');
                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }




    }