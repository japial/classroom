<?php

if(!function_exists('renderView')){
    function renderView($fileName, $data = array(), $htmlReturn = FALSE )
    {
        $CI = &get_instance();
        $CI->load->view('layouts/header', $data);
        $CI->load->view($fileName, $data, $htmlReturn);
        $CI->load->view('layouts/footer', $data);
    }
}
