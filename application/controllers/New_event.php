<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class New_event extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('name', 'Event name', 'required');


        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('New_event');
        } else {
            $name = htmlspecialchars($this->input->post('name'));
            $other_details = htmlspecialchars($this->input->post('other_details'));
            
            $fac_id = htmlspecialchars($this->session->userdata('fac_id'));

            $this->db->query("insert into events (fac_id,name,other_details) VALUES ('$fac_id','$name','$other_details') ");

            redirect('/All_events');
        }

        $this->load->view('common/footer');
    }

}