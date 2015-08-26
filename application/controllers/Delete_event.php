<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Delete_event extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('loggedin') != 1) {
            echo 'you are not logged in';
            echo '<br />please use log in link sent to your email account';
            return;
        }
        $event_id = $this->input->get('event_id');
        $this->db->query("delete from events where id = '$event_id'");
        redirect('all_events');
    }
}