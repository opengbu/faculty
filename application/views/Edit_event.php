<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
?>
<link type="text/css" rel="stylesheet" href="<?= base_url() . 'application/views/common/' . 'input/jquery-te-1.4.0.css' ?>">
<script type="text/javascript" src="<?= base_url() . 'application/views/common/' . 'input/jquery-te-1.4.0.min.js' ?>" charset="utf-8"></script>


<div class="col-sm-8" >

    <?php 
    $event_id = $this->input->get('event_id');
    echo form_open('Edit_event?event_id=' . $event_id); 
    $event_q = $this->db->query("select * from events where id = '$event_id' ");
    $event = $event_q->row();
    ?>

    <label>Name of Event</label><br />
    [Workshops / Training programs / Sensitization programs organized]<br /><br />
    <input type="text" class="form-control" name="name" value="<?php echo set_value('name',$event->name); ?>"/>
    <br /><br /><br />
    <label>Other Details</label><br />
    (Duration, Venue, etc)<br /><br />
    <textarea value="" name="other_details" class=""  ><?php echo htmlspecialchars_decode(set_value('other_details',$event->other_details)); ?></textarea>
    <br>
    <br><br>
    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label>';
    ?>
    <div><input type="submit" value="Save" class="btn btn-default"/></div>
</form>
</div>
<script>
    $("textarea").jqte();
</script>