<?php

class Delete_colleague extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        
        $colleage_id = $this->input->get('colleague_id');
        $this->db->query(" delete from colleagues where id = '$colleage_id'");
        redirect('all_colleagues');
    }
}
