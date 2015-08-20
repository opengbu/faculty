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

    <?php echo form_open('New_conference'); ?>

    <h2>Conference Organized</h2>
    <br />
    <label>Title of research Seminar/ national and international conference <b>organized</b> </label><br />
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>"/>
    <br />

    <select class="selectpicker" data-size="5" data-dropup-auto="false" data-live-search="true"  name="school_id">        
        <option value="-1"> Select School </option>
        <?php
        $q = $this->db->query("select id, school_name from schools");
        foreach ($q->result() as $row) {
            ?>
            <option value="<?= $row->id ?>" 
                    ><?= $row->school_name ?></option>
                    <?php
                }
                ?>
    </select>   
    <br /><br />
    <select class="selectpicker" data-dropup-auto="false" data-size="5" data-live-search="true"  name="dept_id" >        
        <option value="-1"> Select Department </option>
        <?php
        $q = $this->db->query("select id, department from departments");
        foreach ($q->result() as $row) {
            ?>
            <option value="<?= $row->id ?>" 
                    ><?= $row->department ?></option>
                    <?php
                }
                ?>
    </select>   
    <br /><br />

    <label>Funding agency</label><br />
    <input type="text" class="form-control" name="funding_agency" value="<?php echo set_value('funding_agency'); ?>"/>
    <br />

    <label>Other Details (Duration, Venue etc....) </label><br />
    <textarea value="" name="other_details" class=""  ><?php echo set_value('other_details'); ?></textarea>
    <br />
    
    <label>Names of Outstanding Participants </label><br />
    <textarea value="" name="participants" class=""  ><?php echo set_value('participants'); ?></textarea>
    <br />

    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label>';
    ?>
    <div><input type="submit" value="Add" class="btn btn-default"/></div>
</form>
</div>
<script>
    $("textarea").jqte();
</script>