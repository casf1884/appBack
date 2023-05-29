<?php

    class Productos extends Controllers 
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."/login");
            }
            
            parent::__construct();
            getPermisos(6);
        }

        public function productos()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url()."/dashboard");
            }

            $data['page_tag'] = "Productos - Tienda Virtual";
            $data['page_title'] = "Productos";
            $data['page_name'] = "productos";
            $data['page_icono'] = '<i class="fa-solid fa-box-open"></i>';
            $data['page_functions_js'] = "function_productos.js";

            $this->views->getView($this, "productos", $data);
        }

        public function setProducto()
        {         
            if($_POST)
            {
                if(empty($_POST['txtNombre']) || empty($_POST['txtCodigo']) || empty($_POST['txtPrecio']) || empty($_POST['txtStock']) || empty($_POST['listCategoria']) || empty($_POST['listStatus']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $intIdProducto = intval($_POST['idProducto']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strDescripcion = $_POST['txtDescripcion'];
                    $strCodigo = strClean($_POST['txtCodigo']);
                    $intCategoriaId = intval($_POST['listCategoria']);
                    $strPrecio = intval($_POST['txtPrecio']);
                    $intStock = intval($_POST['txtStock']);
                    $intStatus = intval($_POST['listStatus']);
                    $request_producto = "";

                    if($intIdProducto == 0)
                    {
                        // CREAR
                        $option = 1;

                        if($_SESSION['permisosMod']['w'])
                        {
                            $request_producto = $this->model->insertProducto($strNombre, $strDescripcion, $strCodigo, $intCategoriaId, $strPrecio, $intStock, $intStatus);
                        }
                    }else{
                        // ACTUALIZAR
                        $option = 2;

                        if($_SESSION['permisosMod']['u'])
                        {
                            $request_producto = $this->model->updateProducto($intIdProducto, $strNombre, $strDescripcion, $strCodigo, $intCategoriaId, $strPrecio, $intStock, $intStatus);
                        }
                    }

                    if($request_producto > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'idproducto' => $request_producto, 'msg' => 'Datos guardados correctamente.');
                        }else{
                            $arrResponse = array('status' => true, 'idproducto' => $intIdProducto, 'msg' => 'Datos actualizados correctamente.');
                        }  
                    }else if($request_producto == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'El producto ingresado ya existe.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
          
            die();
        }

        public function getProductos()
        {
            if($_SESSION['permisosMod']['r'])
            {
                $arrData = $this->model->selectProductos();

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

                    $arrData[$i]['precio'] = SMONEY.formatMoney($arrData[$i]['precio']);

                    if($_SESSION['permisosMod']['r'])
                    {
                        $btnView = '<button class="btn btn-dark btn-sm" onclick="fntViewProducto('.$arrData[$i]['idproducto'].')" title="Ver"><i class="fa-solid fa-eye"></i></button>';
                    }

                    if($_SESSION['permisosMod']['u'])
                    {
                        $btnEdit = '<button class="btn btn-warning btn-sm" onclick="fntEditProducto(this, '.$arrData[$i]['idproducto'].')" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>';
                    }
                    
                    if($_SESSION['permisosMod']['d'])
                    {
                        $btnDelete = '<button class="btn btn-danger btn-sm" onclick="fntDelProducto('.$arrData[$i]['idproducto'].')" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>';                        
                    }

                    $arrData[$i]['acciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }

                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function getProducto($idproducto)
        {
            if($_SESSION['permisosMod']['r'])
            {
                $intIdProducto = intval($idproducto);

                if($intIdProducto > 0)
                {
                    $arrData = $this->model->selectProducto($intIdProducto);

                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrImg = $this->model->selectImages($intIdProducto);
                        
                        if(count($arrImg) > 0)
                        {
                            for($i=0; $i < count($arrImg); $i++){
                                $arrImg[$i]['url_image'] = media()."/images/uploads/".$arrImg[$i]['img'];
                            }
                        }

                        $arrData['images'] = $arrImg;
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }

        public function delProducto()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdProducto = intval($_POST['idproducto']);
                    $requestDelete = $this->model->deleteProducto($intIdProducto);

                    if($requestDelete == "ok")
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado correctamente.');
                    }else if($requestDelete == false)
                    {
                        $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un producto asignado a una venta.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Error al eliminar los datos.');
                    }
                    
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }

            die();
        }

        public function setImage()
        {
            if($_POST)
            {
                if(empty($_POST['idproducto']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idProducto = intval($_POST['idproducto']);
                    $foto = $_FILES['foto'];
                    $imgNombre = "pro_".md5(date("d-m-Y H:m:s")).".jpg";
                    $request_image = $this->model->insertImage($idProducto, $imgNombre);

                    if($request_image)
                    {
                        $uploadImage = uploadImage($foto, $imgNombre);
                        $arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Se ha cargado correctamente.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error de carga.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            
            die();
        }

        public function delFile()
        {
            if($_POST)
            {
                if(empty($_POST['idproducto']) || empty($_POST['file']))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Los datos son incorrectos.');
                }else{
                    $idProducto = intval($_POST['idproducto']);
                    $imgNombre = strClean($_POST['file']);
                    $request_image = $this->model->deleteImage($idProducto, $imgNombre);

                    if($request_image)
                    {
                        $deleteFile = deleteFile($imgNombre);
                        $arrResponse = array('status' => true, 'msg' => 'El archivo se ha eliminado.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el archivo.');
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            
            die();
        }
        
    }