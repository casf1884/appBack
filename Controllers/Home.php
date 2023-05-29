<?php

    class Home extends Controllers 
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function home()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Home";
            $data['page_title'] = "Página principal";
            $data['page_name'] = "home";
            $data['page_icono'] = '<i class="fa-solid fa-boxes-packing"></i>';
            $data['page_content'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam eum aperiam odio molestiae blanditiis aliquid possimus deleniti neque est officia exercitationem, tempora magni obcaecati dolor consequuntur, voluptas architecto reprehenderit quam";
            //$data['page_functions_js'] = "";
            
            $this->views->getView($this, "home", $data);
        }




    }