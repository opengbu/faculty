<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Export extends CI_Controller {

    function index() {


        $this->load->view('common/header_2');
        $this->load->view('blank');
        $this->load->view('My_info');
        $this->load->view('blank');
        $this->load->view('All_events');
        $this->load->view('blank');
        $this->load->view('All_conferences');
        $this->load->view('blank');
        $this->load->view('All_colleagues');
        $this->load->view('blank');
        $this->load->view('All_consultancy');
        $this->load->view('common/footer_2');
    }

}
