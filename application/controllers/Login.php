<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {

    function index() {
        if ($this->session->userdata('loggedin') == 1)
            redirect('edit_info');
        echo 'invalid link, please use link sent to you in mail for login';
        return;
    }

    function using_email() {
        $code = $this->input->get('code');
        if ($code == NULL || $code == "") {
            echo 'invalid link';
            return;
        }

        $details_q = $this->db->query("select school_id, department_id, name, email, fac_id from faculty where login_link= '$code'");

        if ($details_q->num_rows() == 0) {
            echo 'Wrong link or expired url';
            return;
        }

        $details_r = $details_q->row();
        $this->session->set_userdata('loggedin', 1);
        $this->session->set_userdata('type', 'faculty');
        $this->session->set_userdata('school_id', $details_r->school_id);
        $this->session->set_userdata('department_id', $details_r->department_id);
        $this->session->set_userdata('name', $details_r->name);
        $this->session->set_userdata('email', $details_r->email);
        $this->session->set_userdata('fac_id', $details_r->fac_id);

        redirect('edit_info');
    }

    function admin_login($msg = 0) {
        ?>
        <form action="<?= base_url('login/admin_validate') ?>" method="post">
            <input type="password" name="password" />
            <input type="submit" value="Go" required="required"/>
        </form>
        <?php
        if ($msg == -1)
            echo 'invalid password';
    }

    function admin_validate() {
        $password = $this->input->post('password');
        $this->load->library('bcrypt');
        $hash = '$2a$08$PLUHNjYue4zzoIUIeWDRYuaMDGepQ4rE/dcqzwJq4hhcbRlQPffga';
        if ($this->bcrypt->check_password($password, $hash)) {
            $this->session->set_userdata('naac_admin', '1');
            redirect(base_url());
        } else {
            
        }
    }

}
