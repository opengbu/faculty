<div class="col-sm-12">
    <br /><br />
    <div class="row">
        <form>
            <div class="col-sm-5">

                <select class="selectpicker" data-size="5" data-dropup-auto="false" data-live-search="true" onchange="this.form.submit()" name="school_id" data-width="90%">        
                    <option value="-1"> Select School </option>
                    <?php
                    $q = $this->db->query("select id, school_name from schools");
                    foreach ($q->result() as $row) {
                        ?>
                        <option value="<?= $row->id ?>" 
                        <?php if ($row->id == $this->input->get('school_id')) echo 'selected="selected" '; ?>        
                                ><?= $row->school_name ?></option>
                                <?php
                            }
                            ?>
                </select>   
            </div>

            <div class=" col-sm-3">

                <select class="selectpicker" data-dropup-auto="false" data-size="5" data-live-search="true" onchange="this.form.submit()" name="dept_id" >        
                    <option value="-1"> Select Department </option>
                    <?php
                    $q = $this->db->query("select id, department from departments");
                    foreach ($q->result() as $row) {
                        ?>
                        <option value="<?= $row->id ?>" 
                        <?php if ($row->id == $this->input->get('dept_id')) echo 'selected="selected" '; ?>        
                                ><?= $row->department ?></option>
                                <?php
                            }
                            ?>
                </select>   
            </div>
        </form>
    </div>  
    <br /><br />
    <?php
    if ($this->input->get('school_id') != NULL)
        $school_id = $this->input->get('school_id');
    else
        $school_id = "NULL";

    if ($this->input->get('dept_id') != NULL)
        $dept_id = $this->input->get('dept_id');
    else
        $dept_id = "NULL";

    if ($school_id != "NULL" && $school_id != "NULL" && $dept_id != -1 && $dept_id != -1) { //insert code here
        ?>
        <div  id="viewop">
            <div class="row">
                <form action="All_faculty/insert" method="post" id = "insert_record" >
                    <input type="hidden" name="dept_id" value="<?= $dept_id ?>" />
                    <input type="hidden" name="school_id" value="<?= $school_id ?>" /> 
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" placeholder="Faculty Name">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="email" class="form-control" placeholder="Faculty email">

                    </div>

                    <div class="col-sm-1">
                        <input type="submit" value="Insert" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
            <div class="row" >
                <br />
                <font color="red"><b>
                    <div class="col-sm-12" id="insert_errors"></div>
                </b></font>
            </div>
            <br />
        </div>
        <?php
    }


    $select_rows = "select fac_id, name, email from faculty where school_id = '" . $school_id . "' and department_id = " . $dept_id;

    $result = $this->db->query($select_rows);
    if ($result->num_rows() > 0) {
        ?>
        <br /><br />

        <ul class="nav nav-list col-sm-12" id = "record_list"> 
            <b>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-2">
                            S.N
                        </div>
                        <div class="col-sm-4">
                            Name
                        </div>
                        <div class="col-sm-4">
                            email
                        </div>
                        <div class="col-sm-2">
                            Actions
                        </div>
                    </div>
                </li>
            </b>
            <script>
                var $index = 1;
            </script>
            <?php
            $index = 0;
            foreach ($result->result() as $row) {
                $index++;
                ?>

                <script>
                    $index = $index + 1;
                </script>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-2">
                            <?= $index ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $row->name ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $row->email ?>
                        </div>
                        <div class="col-sm-2">
                            Export (In progress)
                        </div>
                    </div>
                </li>

                <?php
            }
            ?>
        </ul>

        <?php
    } else {
        echo "<b>Nothing to Display, please select appropriate Program and Semester to view details</b>";
    }
    ?>
    <br>

</div>

<script type="text/javascript">

    var frm = $('#insert_record');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (msg) {
                if (document.getElementById("record_list") === null)
                    window.location.reload();
                var obj = JSON.parse(msg);
                var error_list = document.getElementById('insert_errors');
                if (obj.result === "error")
                {
                    error_list.innerHTML = obj.errors;
                }
                if (obj.result === "success")
                {
                    var record_list = document.getElementById('record_list');
                    var data = '<li class = "list-group-item" > \
                                    <div class = "row" > \
                                    <div class = "col-sm-2" > \
                                    ' + $index + ' \
                                    </div> \
                                    <div class = "col-sm-4" > \
                                    ' + obj.name + ' \
                                    </div> \
                                    <div class = "col-sm-4" > \
                                    ' + obj.email + ' \
                                    </div> \
                                    <div class = "col-sm-2" > \
                                    ' + 'Export (In progress)' + ' \
                                    </div> \
                                    </div> \
                                    </li>';
                    record_list.innerHTML = record_list.innerHTML + data;
                    error_list.innerHTML = ""; //Remove old errors

                }
            }
        });


        ev.preventDefault();
    });
</script>