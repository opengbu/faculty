<?php

class My_info extends CI_Controller
{
    function index() {
        if($this->session->userdata('loggedin') != 1) 
        {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        $this->load->view("common/header");
        $this->load->view('My_info');
        $this->load->view("common/footer");
    }
}