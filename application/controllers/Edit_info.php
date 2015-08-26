<?php

class Edit_info extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }

        $this->load->view('common/header');


        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('name', 'Faculty name', 'required');
        $this->form_validation->set_rules('email', 'Faculty email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Edit_info');
        } else {
            $monographs = $this->input->post('monographs');
            $chapters_in_books = $this->input->post('chapters_in_books');
            $books_with_isbn = $this->input->post('books_with_isbn');
            $national_db = $this->input->post('national_db');
            $international_db = $this->input->post('international_db');
            $citation_min = $this->input->post('citation_min');
            $citation_max = $this->input->post('citation_max');
            $citation_avg = $this->input->post('citation_avg');
            $snip = $this->input->post('snip');
            $sjr = $this->input->post('sjr');
            $impact_min = $this->input->post('impact_min');
            $impact_max  = $this->input->post('impact_max');
            $impact_avg  = $this->input->post('impact_avg');
            $h_index = $this->input->post('h_index');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            
            $this->session->set_userdata('name',$name);
            $this->session->set_userdata('email',$email);
            
            
            $id = $this->session->userdata('fac_id');
            
            $this->db->query("update faculty set name='$name', email='$email',  monographs = '$monographs' , chapters_in_books='$chapters_in_books', national_db='$national_db', international_db='$international_db', "
                    . "citation_min='$citation_min', books_with_isbn='$books_with_isbn' ,"
                    . "  citation_max='$citation_max', citation_avg='$citation_avg', snip='$snip', "
                    . " sjr='$sjr', impact_min='$impact_min', impact_max='$impact_max', h_index='$h_index', impact_avg='$impact_avg' "
                    . " where fac_id = '$id' ");

            redirect('/my_info');
        }

        $this->load->view("common/footer");
    }

}
