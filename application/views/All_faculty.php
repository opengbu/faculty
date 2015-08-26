<?php
if ($this->input->get('school_id') != NULL)
    $school_id = $this->input->get('school_id');
else
    $school_id = "NULL";

if ($this->input->get('dept_id') != NULL)
    $dept_id = $this->input->get('dept_id');
else
    $dept_id = "NULL";
?>
<script>
    function del_ask(str, n)
    {
        var x = confirm("Do you want to delete " + n + "?");
        if (x == true)
            location.href = "delete_fac/using_email?code=" + str;
    }
</script>
<br /><br />
<nav class="navbar navbar-fixed-top navbar-default nav navbar-custom" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <button type="button" class="navbar-toggle collapsed pull-left" style="margin-left: 0; " data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?= base_url() ?>">GBU Faculty</a>

    </div> 
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php
            if ($this->session->userdata('loggedin') == 1) {
                ?>
                <li> 
                    <a href="<?= base_url() . 'edit_info' ?>">Welcome <?= $this->session->userdata('name') ?>!</a>
                </li>
                <li>
                    <a href="<?= base_url() . 'logout' ?>">Log out</a>
                </li>
                <?php
            }
            if ($this->session->userdata('naac_admin') == 1) {
                ?>
                <li> 
                    <a href="<?= base_url() . 'logout/admin' ?>">Admin Log out</a>
                </li>
                <?php
            } else {
                ?>

                <li> 
                    <a href="<?= base_url() . 'login/admin_login/' ?>">Admin Login</a>

                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>

<div class = "col-sm-12">

    <br /><br />
    <div class = "row">
        <form>
            <div class = "col-sm-4">

                <select class = "selectpicker" data-size = "5" data-dropup-auto = "false" data-live-search = "true" onchange = "this.form.submit()" name = "school_id" data-width = "100%">
                    <option value = "-1"> Select School </option>
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

            <div class=" col-sm-4">

                <select class="selectpicker" data-dropup-auto="false" data-size="5" data-live-search="true" onchange="this.form.submit()" name="dept_id" data-width="100%">        
                    <option value="-1"> Select Department </option>
                    <?php
                    $q = $this->db->query("select id, department from departments where school_id='$school_id'");
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

            <div class="col-sm-1">
                <a href="<?= base_url('Export_all?department_id=' . $dept_id) ?>" class="btn btn-primary">Export</a>
            </div>
        </form>
    </div>  
    <br /><br />
    <?php
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
    ?>

    <?php
    $select_rows = "select fac_id, name, email, login_link from faculty where school_id = '" . $school_id . "' and department_id = " . $dept_id;

    $result = $this->db->query($select_rows);
    if ($result->num_rows() > 0) {
        ?>
        <br /><br />

        <ul class="nav nav-list col-sm-12" id = "record_list"> 
            <b>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-1">
                            S.N
                        </div>
                        <div class="col-sm-4">
                            Name
                        </div>
                        <div class="col-sm-4">
                            email
                        </div>
                        <div class="col-sm-3">
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
                        <div class="col-sm-1">
                            <?= $index ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $row->name ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $row->email ?>
                        </div>
                        <div class="col-sm-3">
                            <a href="<?= base_url('export?fac_id_e= ' . $row->fac_id) ?>" class="btn btn-primary btn-xs"> Export </a>
                            <?php
                            if ($this->session->userdata('naac_admin') == 1) {
                                ?>
                                <a href="<?= base_url('login/using_email?code=' . $row->login_link) ?>" class="btn btn-warning btn-xs"> login </a>
                                <a onclick="del_ask('<?php echo$row->login_link ?>', '<?php echo$row->name ?>')" class="btn btn-danger btn-xs "> Delete </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>

                <?php
            }
            ?>
        </ul>

        <?php
    } else {
        echo "<b>Nothing to Display, please select appropriate School and Department to view details</b>";
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
                var obj = JSON.parse(msg);
                var error_list = document.getElementById('insert_errors');
                if (obj.result === "error")
                {
                    error_list.innerHTML = obj.errors;
                }
                if (obj.result === "success")
                {

                    if (obj.readd_msg === 1)
                    {
                        alert('Your account was already created. Details are updated, and login link has been resent to your email account');
                    }
                    else
                        alert('Your account has been Successfully created. Login link sent to your email account');
                    if (document.getElementById("record_list") === null)
                        window.location.reload();

                    var record_list = document.getElementById('record_list');
                    var data = '<li class = "list-group-item" > \
                                    <div class = "row" > \
                                    <div class = "col-sm-1" > \
                                    ' + $index + ' \
                                    </div> \
                                    <div class = "col-sm-4" > \
                                    ' + obj.name + ' \
                                    </div> \
                                    <div class = "col-sm-4" > \
                                    ' + obj.email + ' \
                                    </div> \
                                    <div class = "col-sm-2" > \
                                    ' + '<a href="export?fac_id=' + obj.fac_id + '" class="btn btn-primary btn-xs"  >Export</a>' + ' \
                                    </div> \
                                    </div> \
                                    </li>';
                    if (obj.readd_again == 1)
                        record_list.innerHTML = record_list.innerHTML + data;
                    error_list.innerHTML = ""; //Remove old errors
                }
            }
        });


        ev.preventDefault();
    });
</script>
<p></p>
<br />
<br />

