<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Edit_event extends CI_Controller {

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
            $this->load->view('Edit_event');
        } else {
            $name = htmlspecialchars($this->input->post('name'));
            $other_details = htmlspecialchars($this->input->post('other_details'));

            $event_id = htmlspecialchars($this->input->get('event_id'));

            $this->db->query("update events set name = '$name', other_details ='$other_details' where id = '$event_id'  ");

            redirect('/All_events');
        }

        $this->load->view('common/footer');
    }

}
