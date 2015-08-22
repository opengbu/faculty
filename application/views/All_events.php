<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<div class="row">

<div class ="col-sm-10">
    <?php
    error_reporting(E_ERROR);
    if ($this->input->get('fac_id_e') != NULL || $this->input->get('fac_id_e') != "")
        $fac_id = $this->input->get('fac_id_e');
    else
        $fac_id = $this->session->userdata('fac_id');
    $count = 0;
    $query = $this->db->query("select * from events where fac_id = '$fac_id'");
    ?>

    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">

                <b>
                    <div class="col-sm-1">
                        S.N.
                    </div>
                    <div class="col-sm-4">
                        Event Name
                    </div>

                    <div class="col-sm-3">
                        Organized By
                    </div>
                    <div class="col-sm-4">
                        Other Details
                    </div>
                </b>
            </div>
        </li>
        <?php
        foreach ($query->result() as $row) {
            $count++;
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-1">
                        <?php
                        echo $count;
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        echo $row->name;
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?php
                        echo $this->session->userdata('name');
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        echo $row->other_details;
                        ?>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
</div>
</div>