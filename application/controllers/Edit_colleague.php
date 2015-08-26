<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Edit_colleague extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }

        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('c_name', 'Colleague name', 'required');


        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Edit_colleague');
        } else {
            $c_name = htmlspecialchars($this->input->post('c_name'));
            $school_id = htmlspecialchars($this->input->post('school_id'));
            $department_id = htmlspecialchars($this->input->post('dept_id'));
            $position = htmlspecialchars($this->input->post('position'));
            $sponsors = htmlspecialchars($this->input->post('sponsors'));
            $colleage_id = $this->input->get('colleague_id');


            $this->db->query("update colleagues set c_name = '$c_name' , school_id ='$school_id',"
                    . " department_id = '$department_id', position = '$position',"
                    . " sponsors = '$sponsors' where id = '$colleage_id' ");

            redirect('/All_colleagues');
        }

        $this->load->view('common/footer');
    }

}
