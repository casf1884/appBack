<?php

    class Categorias extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."/login");
            }
            
            parent::__construct();
            getPermisos(5);
        }

        public function categorias()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url()."/dashboard");
            }

            $data['page_tag'] = "Categorías - Tienda Virtual";
            $data['page_title'] = "Categorías";
            $data['page_name'] = "categorias";
            $data['page_icono'] = '<i class="fa-solid fa-boxes-packing"></i>';
            $data['page_functions_js'] = "function_categorias.js";

            $this->views->getView($this, "categorias", $data);
        }
   
        public function setCategoria()
        {         
            if($_POST)
            {
                if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $intIdCategoria = intval($_POST['idCategoria']);
                    $strCategoria = ucwords(strClean($_POST['txtNombre']));
                    $strDescripcion = strClean($_POST['txtDescripcion']);
                    $intStatus = intval($_POST['listStatus']);
                    $foto = $_FILES['foto'];
                    $nombre_foto = $foto['name'];
                    $type = $foto['type'];
                    $url_temp = $foto['tmp_name'];
                    $imgPortada = "portada_categoria.png";
                    $request_categoria = "";

                    if($nombre_foto != "")
                    {
                        $imgPortada = "img_".md5(date("d-m-Y H:m:s")).".jpg";
                    }

                    if($intIdCategoria == 0)
                    {
                        // CREAR
                        $option = 1;

                        if($_SESSION['permisosMod']['w'])
                        {
                            $request_categoria = $this->model->insertCategoria($strCategoria, $strDescripcion, $imgPortada, $intStatus);
                        }
                    }else{
                        // ACTUALIZAR
                        $option = 2;

                        if($nombre_foto == "")
                        {
                            if($_POST['foto_actual'] != "portada_categoria.png" && $_POST['foto_remove'] == 0)
                            {
                                $imgPortada = $_POST['foto_actual'];
                            }
                        }

                        if($_SESSION['permisosMod']['u'])
                        {
                            $request_categoria = $this->model->updateCategoria($intIdCategoria, $strCategoria, $strDescripcion, $imgPortada, $intStatus);
                        }
                    }

                    if($request_categoria > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                            
                            if($nombre_foto != "")
                            {
                                uploadImage($foto, $imgPortada);
                            }
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                            if($nombre_foto != "")
                            {
                                uploadImage($foto, $imgPortada);
                            }

                            if(($nombre_foto == "" && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != "portada_categoria.png") || ($nombre_foto != "" && $_POST['foto_actual'] != "portada_categoria.png"))
                            {
                                deleteFile($_POST['foto_actual']);
                            }
                        }  
                    }else if($request_categoria == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'La categoría ingresada ya existe.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
          
            die();
        }

        public function getCategorias()
        {
            if($_SESSION['permisosMod']['r'])
            {
                $arrData = $this->model->selectCategorias();

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
                        $btnView = '<button class="btn btn-dark btn-sm" onclick="fntViewCategoria('.$arrData[$i]['idcategoria'].')" title="Ver"><i class="fa-solid fa-eye"></i></button>';
                    }

                    if($_SESSION['permisosMod']['u'])
                    {
                        $btnEdit = '<button class="btn btn-warning btn-sm" onclick="fntEditCategoria(this, '.$arrData[$i]['idcategoria'].')" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>';
                    }
                    
                    if($_SESSION['permisosMod']['d'])
                    {
                        $btnDelete = '<button class="btn btn-danger btn-sm" onclick="fntDelCategoria('.$arrData[$i]['idcategoria'].')" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>';                        
                    }

                    $arrData[$i]['acciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }

                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getCategoria($idcategoria)
        {
            if($_SESSION['permisosMod']['r'])
            {
                $intIdCategoria = intval($idcategoria);

                if($intIdCategoria > 0)
                {
                    $arrData = $this->model->selectCategoria($intIdCategoria);

                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrData['url_portada' ] = media()."/images/uploads/".$arrData['portada'];
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }

        public function delCategoria()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdCategoria = intval($_POST['idcategoria']);
                    $requestDelete = $this->model->deleteCategoria($intIdCategoria);

                    if($requestDelete == "ok")
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado correctamente.');
                    }else if($requestDelete == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una categoría asignada a un producto.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Error al eliminar los datos.');
                    }
                    
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }

        public function getSelectCategorias()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectCategorias();

            if(count($arrData) > 0)
            {
                for($i=0; $i < count($arrData);  $i++){ 
                    if($arrData[$i]['status'] == 1)
                    {
                        $htmlOptions .= '<option value="'.$arrData[$i]['idcategoria'].'">'.$arrData[$i]['nombre'].'</option>';
                    }
                }
            }

            echo $htmlOptions;
            die();
        }
        
    }