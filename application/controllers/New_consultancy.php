<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class New_consultancy extends CI_Controller {

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
            $this->load->view('New_consultancy');
        } else {
            $area = $this->input->post('area');
            $year = $this->input->post('year');
            $name_of_firm = $this->input->post('name_of_firm');
            $revenue = $this->input->post('revenue');

            $fac_id = $this->session->userdata('fac_id');

            $this->db->query("insert into consultancy_projects (fac_id, area, year, "
                    . " name_of_firm, revenue) "
                    . "VALUES ('$fac_id', '$area','$year','$name_of_firm','$revenue' ) ");

            redirect('/All_consultancy');
        }

        $this->load->view('common/footer');
    }

}
