<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Edit_consultancy extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }

        $this->load->helper(array('form', 'url'));


        $this->load->view('common/header');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('area', 'Area', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Edit_consultancy');
        } else {
            $area = htmlspecialchars($this->input->post('area'));
            $year = htmlspecialchars($this->input->post('year'));
            $name_of_firm = htmlspecialchars($this->input->post('name_of_firm'));
            $revenue = htmlspecialchars($this->input->post('revenue'));

            $consultancy_id = $this->input->get('consultancy_id');

            $this->db->query("update consultancy_projects set area = '$area', year = '$year', "
                    . " name_of_firm = '$name_of_firm', revenue = '$revenue' "
                    . " where id = '$consultancy_id'");

            redirect('/All_consultancy');
        }

        $this->load->view('common/footer');
    }

}
