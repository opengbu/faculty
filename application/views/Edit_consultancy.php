<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<link type="text/css" rel="stylesheet" href="<?= base_url() . 'application/views/common/' . 'input/jquery-te-1.4.0.css' ?>">
<script type="text/javascript" src="<?= base_url() . 'application/views/common/' . 'input/jquery-te-1.4.0.min.js' ?>" charset="utf-8"></script>

<style>
    h2{
        padding: 0px;
        margin: 0px;
    }
</style>
<div class="col-sm-8" >

    <?php
    $consultancy_id = $this->input->get('consultancy_id');
    echo form_open('Edit_consultancy?consultancy_id=' . $consultancy_id);
    $consultancy_q = $this->db->query("select * from consultancy_projects where id='$consultancy_id'");
    $consultancy = $consultancy_q->row();
    ?>

    <h2>Consultancy project undertaken</h2>
    <br />
    <label>Area </label><br />
    <input type="text" class="form-control" name="area" value="<?php echo set_value('area',$consultancy->area); ?>"/>
    <br />

    <label>Academic Year </label><br />
    <input type="text" class="form-control" name="year" value="<?php echo set_value('year',$consultancy->year); ?>"/>
    <br />

    <label>Name of firm </label><br />
    <input type="text" class="form-control" name="name_of_firm" value="<?php echo set_value('name_of_firm',$consultancy->name_of_firm); ?>"/>
    <br />

    <label>Revenues earned </label><br />
    <input type="text" class="form-control" name="revenue" value="<?php echo set_value('revenue',$consultancy->revenue); ?>"/>
    <br />

    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label>';
    ?>
    <div><input type="submit" value="Save" class="btn btn-default"/></div>
</form>
</div>
<script>
    $("textarea").jqte();
</script>