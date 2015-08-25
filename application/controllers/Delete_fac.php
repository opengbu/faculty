<?php

class Delete_fac extends CI_Controller {

    function using_email() {
        $code = $this->input->get('code');
        if ($code == NULL || $code == "") {
            echo 'invalid link';
            return;
        }
        if ($this->session->userdata('naac_admin') != 1) {
            echo "insufficient permissions";
            return;
        }
        $details_q = $this->db->query("select fac_id from faculty where login_link= '$code'");

        if ($details_q->num_rows() == 0) {
            echo 'No such user found';
            return;
        }
        $details = $details_q->row();
        $fac_id = $details->fac_id;
        
        $this->db->query("delete from research_conferences where fac_id = '$fac_id' ");
        $this->db->query("delete from events where fac_id = '$fac_id' ");
        $this->db->query("delete from consultancy_projects where fac_id = '$fac_id' ");
        $this->db->query("delete from colleagues where fac_id = '$fac_id' ");
        $this->db->query("delete from faculty where fac_id = '$fac_id' ");
        redirect(base_url());
    }

}
