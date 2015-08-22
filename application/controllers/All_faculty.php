<?php

error_reporting(E_ERROR);

class All_faculty extends CI_Controller {

    function index() {
        $this->load->view("common/header_2");
        $this->load->view('All_faculty');
        $this->load->view("common/footer_2");
    }

    function insert() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('school_id', 'School name', 'required');
        $this->form_validation->set_rules('dept_id', 'Department name', 'required');
        $this->form_validation->set_rules('name', 'Faculty name', 'required');
        $this->form_validation->set_rules('email', 'Faculty email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // validation_errors();
            $array = array(
                "errors" => validation_errors(),
                "result" => "error"
            );
            echo(json_encode($array));
        } else {
            $school_id = $this->input->post('school_id');
            $department_id = $this->input->post('dept_id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $readd_again = 1;
            $record_id = -1;
            $readd_msg = 0;
            $check_already_registered_q = $this->db->query("select * from faculty where email = '$email'");
            if ($check_already_registered_q->num_rows() > 0) {
                $check_already_registered = $check_already_registered_q->row();
                $login_link = $check_already_registered->login_link;
                $this->send_mail($email, $login_link, $name);
                $old_department_id = $check_already_registered->department_id;
                $old_school_id = $check_already_registered->school_id;
                $record_id = $check_already_registered->fac_id;

                if ($old_department_id == $department_id && $old_school_id == $school_id)
                    $readd_again = 0;
                $this->db->query("update faculty set department_id='$department_id', school_id='$school_id', name='$name' where fac_id = '$record_id'");
                $readd_msg = 1;
            } else {
                $login_link = bin2hex(openssl_random_pseudo_bytes(18)); // 36 character link
                $this->send_mail($email, $login_link, $name);

                $this->db->query("insert into faculty ( school_id, department_id, name, login_link, email ) values ('$school_id','$department_id','$name','$login_link','$email')");

                $record_id = $this->db->insert_id();
            }

            $array = array(
                "result" => "success",
                "name" => $name,
                "email" => $email,
                "fac_id" => $record_id,
                "readd_again" => $readd_again,
                "readd_msg" => $readd_msg,
            );
            echo(json_encode($array));
        }
    }

    function resend() {
        $re_mail = $this->input->get('resend_email');
    }

    function send_mail($email, $code, $name) {
        $host = $_SERVER['HTTP_HOST'];
        $from_email = 'accounts@' . $host; // Ex. accounts@gbuonline.in

        $message = '<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:23.75pt .25in .25in 23.75pt;}
div.WordSection1
	{page:WordSection1;}
-->

</style>

</head>

<body lang=EN-US >

<div class=WordSection1 style="color:black">

<p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal"><span lang=EN-IN style="mso-ansi-language:EN-IN">Dear ' . $name . ',
<br /><br />
Thank you for registering in our site .<br /><br />
Please use the following link to login to your account <br />' .
                base_url() . 'login/using_email?code=' . $code .
                '<br /> <br />
Thank you!
<br /><br />
With Regards,
<br />
<br><br />

****************************************************************<br>
This is a system generated mail. Please do not reply to this email.<br>
"****************************************************************</br></b>

</span></span><o:p></o:p></p>
</div>

</body>

</html>
';
        $headers = 'From: Accounts gbuonline.in <' . $from_email . '>' . "\r\n" .
                'Reply-To: ' . $from_email . "\r\n" .
                'X-Mailer: PHP/' . phpversion() . "\r\n" .
                'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n\r\n";

        mail($email, "Welcome To GBU Online", $message, $headers);
    }

}
