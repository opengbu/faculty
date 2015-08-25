<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Logout extends CI_Controller {

    function index() {
        $adm = 0;
        if ($this->session->userdata('naac_admin') == 1)
            $adm = 1;
        $this->session->sess_destroy();
        $this->session->set_userdata('naac_admin', $adm);
        redirect(base_url());
    }

}
