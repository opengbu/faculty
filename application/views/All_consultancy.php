<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<script>
    function del_ask(string, id)
    {
        var x = confirm("Do you want to delete " + string + "?");
        if (x == true)
            location.href = "delete_consultancy?consultancy_id=" + id;
    }
</script>
<div class="row">

    <div class ="col-sm-9">
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
                        <div class="col-sm-2">
                            Name of firm
                        </div>

                        <div class="col-sm-2">
                            Revenue earned
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
                            echo $row->area . '- ' . $row->year . '';
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?php
                            echo $row->name_of_firm;
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo $row->revenue;
                            ?>
                        </div>
                        <div class="col-sm-2">

                            <a href="<?= base_url('edit_consultancy?consultancy_id=' . $row->id) ?>" 
                               class="btn btn-xs btn-warning" > Edit </a>
                            <a onclick="del_ask('<?= $row->name ?>', '<?= $row->id ?>')"" 
                               class="btn btn-xs btn-danger" > Delete </a>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
    </div>
</div>