<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>

<div class="col-sm-8" >

    <?php echo form_open('New_colleague'); ?>

    <label>Name of the post doctoral fellow working with you </label><br />
    <input type="text" class="form-control" name="c_name" value="<?php echo set_value('c_name'); ?>"/>
    <br />

    <label>Position</label><br />
    <input type="text" class="form-control" name="position" value="<?php echo set_value('position'); ?>"/>
    <br />

    <label>Sponsoring Agency </label><br />
    <input type="text" class="form-control" name="sponsors" value="<?php echo set_value('sponsors'); ?>"/>
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



    <br><br>
    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label>';
    ?>
    <div><input type="submit" value="Publish" class="btn btn-default"/></div>
</form>
</div>