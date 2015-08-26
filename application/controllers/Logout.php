<?php

/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */

class Logout extends CI_Controller {

    function index() {
        if ($this->session->userdata('naac_admin') == 1) {
            $this->session->set_userdata('loggedin', 0);
        } else
            $this->session->sess_destroy();
        redirect(base_url());
    }

    function admin() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
