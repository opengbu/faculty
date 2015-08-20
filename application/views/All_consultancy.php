<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<div class ="col-sm-10">
    <?php
    error_reporting(E_ERROR);

    $fac_id = $this->session->userdata('fac_id');
    $count = 0;
    $query = $this->db->query("select * from consultancy_projects where fac_id = '$fac_id'");
    ?>

    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">

                <b>
                    <div class="col-sm-1">
                        S.N.
                    </div>
                    <div class="col-sm-2">
                        Name of faculty
                    </div>

                    <div class="col-sm-3">
                        Area and academic year
                    </div>
                    <div class="col-sm-3">
                        Name of firm
                    </div>
                    
                    <div class="col-sm-3">
                        Revenue earned
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
                    <div class="col-sm-2">
                        <?php
                        echo $this->session->userdata('name');
                        
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?php
                        echo $row->area . '   -' . $row->year . '';
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        echo $row->name_of_firm;
                        ?>
                    </div>
                    
                    <div class="col-sm-3">
                        <?php
                        echo $row->revenue;
                        ?>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
</div>