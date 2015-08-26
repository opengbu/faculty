<?php

class Delete_consultancy extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        $consultancy_id = $this->input->get('consultancy_id');
        $this->db->query("delete from consultancy_projects where id = '$consultancy_id'");
        redirect('all_consultancy');
    }
}
