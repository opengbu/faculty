<?php

class Export_all extends CI_Controller {

    function index() {
        $this->load->view('common/header_2');
        $this->load->view('Export_all');
        $this->load->view('common/footer_2');
        $this->load->view('blank');
        
        
        
    }

}
