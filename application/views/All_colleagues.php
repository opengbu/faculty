<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<div class ="col-sm-10">
    <?php
    $fac_id = $this->session->userdata('fac_id');
    $count = 0;
    $query = $this->db->query("select * from colleagues where fac_id = '$fac_id'");
    ?>

    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">

                <b>
                    <div class="col-sm-1">
                        S.N.
                    </div>
                    <div class="col-sm-3">
                        Colleague Name
                    </div>
                    
                    <div class="col-sm-2">
                        Position
                    </div>
                    <div class="col-sm-3">
                        Sponsoring Agency
                    </div>
                    
                    <div class="col-sm-3">
                        School & Department
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
                    <div class="col-sm-1">
                        <?php
                        echo $count;
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        echo $row->c_name;
                        ?>
                    </div>
                    
                    <div class="col-sm-2">
                        <?php
                        echo $row->position;
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        echo $row->sponsors;
                        ?>
                    </div>
                    
                    <div class="col-sm-3">
                        <?php
                        echo $school_details->school_name. ' / ' . $dept_details->department;
                        ?>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
</div>