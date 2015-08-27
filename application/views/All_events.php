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
            location.href = "delete_event?event_id=" + id;
    }
</script>
<div class="row">

    <div class ="col-sm-9">
        <?php
        error_reporting(E_ERROR);
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
                        <div class="col-sm-3">
                            Event Name
                        </div>

                        <div class="col-sm-3">
                            Organized By
                        </div>
                        <div class="col-sm-3">
                            Other Details
                        </div>
                        <div class="col-sm-2">Actions</div>
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
                        <div class="col-sm-3">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->name));
                            ?>
                        </div>

                        <div class="col-sm-3">
                            <?php
                            echo $this->session->userdata('name');
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->other_details));
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <a href="<?= base_url('edit_event?event_id=' . $row->id) ?>" 
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