<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
error_reporting(E_ERROR);
?>
<script>
    function del_ask(string, id)
    {
        var x = confirm("Do you want to delete " + string + "?");
        if (x == true)
            location.href = "delete_conference?conference_id=" + id;
    }
</script>
<div class="row">

    <div class ="col-sm-9">
        <?php
        if ($this->input->get('fac_id_e') != NULL && $this->input->get('fac_id_e') != "")
            $fac_id = $this->input->get('fac_id_e');
        else
            $fac_id = $this->session->userdata('fac_id');
        $count = 0;
        $query = $this->db->query("select * from research_conferences where fac_id = '$fac_id'");
        ?>

        <ul class="nav nav-list col-sm-12">
            <li class="list-group-item">
                <div class="row">

                    <b>
                        <div class="col-sm-2">
                            Title of research Conference
                        </div>

                        <div class="col-sm-2">
                            School_department
                        </div>
                        <div class="col-sm-2">
                            Funding Agency
                        </div>

                        <div class="col-sm-2">
                            Other Details
                        </div>

                        <div class="col-sm-2">
                            Name of outstanding participants
                        </div>
                        <div class="col-sm-2">
                            Actions
                        </div>
                    </b>
                </div>
            </li>
            <?php
            foreach ($query->result() as $row) {
                $count++;

                $get_school_details = $this->db->query("select * from schools where id = '$row->school_id'");
                $school_details = $get_school_details->row();


                $dept_details_q = $this->db->query("select * from departments where id = '$row->department_id'");
                $dept_details = $dept_details_q->row();
                ?>
                <li class="list-group-item">
                    <div class="row">
                        
                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->title));
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo $school_details->school_name . ' / ' . $dept_details->department;
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->funding_agency));
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->other_details));
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->participants));
                            ?>
                        </div>
                        <div class="col-sm-2">

                            <a href="<?= base_url('edit_conference?conference_id=' . $row->id) ?>" 
                               class="btn btn-xs btn-warning" > Edit </a>
                            <a onclick="del_ask('<?= $row->title ?>', '<?= $row->id ?>')"" 
                               class="btn btn-xs btn-danger" > Delete </a>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>