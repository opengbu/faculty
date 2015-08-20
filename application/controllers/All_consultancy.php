<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
class All_consultancy extends CI_Controller{
    function  index()
    {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        
        $this->load->view('common/header');
        $this->load->view('All_consultancy');
        $this->load->view('common/footer');
    }
}