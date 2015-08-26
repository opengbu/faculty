<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Edit_conference extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }

        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('title', 'title', 'required');


        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Edit_conference');
        } else {
            $title = htmlspecialchars($this->input->post('title'));
            $other_details = htmlspecialchars($this->input->post('other_details'));
            $school_id = htmlspecialchars($this->input->post('school_id'));
            $department_id = htmlspecialchars($this->input->post('dept_id'));
            $funding_agency = htmlspecialchars($this->input->post('funding_agency'));
            $participants = htmlspecialchars($this->input->post('participants'));

            $conference_id = $this->input->get('conference_id');

            $this->db->query("update research_conferences set other_details = '$other_details' ,school_id = '$school_id',"
                    . " department_id = '$department_id', title = '$title' , "
                    . " funding_agency = '$funding_agency', participants = '$participants' "
                    . " where id = '$conference_id'");

            redirect('/All_conferences');
        }

        $this->load->view('common/footer');
    }

}
