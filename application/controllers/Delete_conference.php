<?php

class Delete_conference extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        $conference_id = $this->input->get('conference_id');
        $this->db->query("delete from research_conferences where id = $conference_id");
        redirect('all_conferences');
    }

}
