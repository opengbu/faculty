<?php
$department_id = $this->input->get('department_id');

$fac_q = $this->db->query("select sum(monographs) as sum_mono, sum(chapters_in_books) as chapters_in_books, "
        . "sum(books_with_isbn) as books_with_isbn, "
        . " sum(national_db) as national_db, sum(international_db) as international_db, "
        . "min(citation_min) as citation_min, max(citation_max) as citation_max, "
        . "avg(citation_avg) as citation_avg, sum(snip) as snip, "
        . "sum(sjr) as sjr, min(impact_min) as impact_min, max(impact_max) as impact_max, "
        . "avg(impact_avg) as impact_avg, sum(h_index) as h_index  "
        . " from faculty where department_id = '$department_id' ");
$fac = $fac_q->row();
error_reporting(E_ERROR);
?>
<br /><br />
<div class="row" >
    <div class = "col-sm-10" >

        <ul class="nav nav-list col-sm-12"> 

            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Monographs </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->sum_mono ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Chapters in Books </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->chapters_in_books ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Books with ISBN with details of publishers </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->books_with_isbn ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Number of papers published (national/international) </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->national_db ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Number of papers in international database</label>
                        (Ex: Web of Science,scopus, EBSCO host, etc)
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->international_db ?>
                    </div>
                </div>
            </li>


            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Citation Index </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->citation_min . " - " . $fac->citation_max . "  /  " . $fac->citation_avg ?>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>SNIP </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->snip ?>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>SJR </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->sjr ?>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>Impact factor </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->impact_min . " - " . $fac->impact_max . "  /  " . $fac->impact_avg ?>
                    </div>
                </div>
            </li>


            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6" >
                        <label>H Index </label>
                    </div>
                    <div class="col-sm-3" >
                        <?= $fac->h_index ?>
                    </div>
                </div>
            </li>


        </ul>
    </div>
</div>
<br /><br />
<div class="row">

    <div class ="col-sm-10">
        <?php
        $count = 0;
        $query = $this->db->query("select events.*,faculty.fac_id  from events, faculty where faculty.fac_id = events.fac_id and faculty.department_id = '$department_id'");
        ?>

        <ul class="nav nav-list col-sm-12">
            <li class="list-group-item">
                <div class="row">

                    <b>
                        <div class="col-sm-1">
                            S.N.
                        </div>
                        <div class="col-sm-4">
                            Event Name
                        </div>

                        <div class="col-sm-3">
                            Organized By
                        </div>
                        <div class="col-sm-4">
                            Other Details
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
                        <div class="col-sm-4">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->name));
                            ?>
                        </div>

                        <div class="col-sm-3">
                            <?php
                            echo $this->session->userdata('name');
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->other_details));
                            ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
    </div>
</div>
<br /><br />
<div class="row">

    <div class ="col-sm-10">
        <?php
        $query = $this->db->query("select research_conferences.* from research_conferences,faculty where "
                . " faculty.fac_id = research_conferences.fac_id and faculty.department_id = '$department_id' ");
        ?>

        <ul class="nav nav-list col-sm-12">
            <li class="list-group-item">
                <div class="row">

                    <b>
                        <div class="col-sm-1">
                            S.N.
                        </div>
                        <div class="col-sm-2">
                            Title of research Conference
                        </div>

                        <div class="col-sm-3">
                            School_department
                        </div>
                        <div class="col-sm-2">
                            Funding Agency
                        </div>

                        <div class="col-sm-2">
                            Other Details
                        </div>

                        <div class="col-sm-2">
                            Name of outstanding participants
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
                        <div class="col-sm-2">
                            <?php
                            echo $row->title;
                            ?>
                        </div>

                        <div class="col-sm-3">
                            <?php
                            echo $school_details->school_name . ' / ' . $dept_details->department;
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?php
                            echo $row->funding_agency;
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->other_details));
                            ?>
                        </div>

                        <div class="col-sm-2">
                            <?php
                            echo html_purify(htmlspecialchars_decode($row->participants));
                            ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<br /><br />
<div class="row">
    <div class ="col-sm-10">
        <?php
        $count = 0;
        $query = $this->db->query("select colleagues.* from colleagues ,faculty where "
                . " faculty.fac_id = colleagues.fac_id and faculty.department_id = '$department_id'");
        ?>

        <ul class="nav nav-list col-sm-12">
            <li class="list-group-item">
                <div class="row">

                    <b>
                        <div class="col-sm-1">
                            S.N.
                        </div>
                        <div class="col-sm-4">
                            Colleague Name
                        </div>

                        <div class="col-sm-3">
                            Sponsoring Agency
                        </div>

                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                            <?php
                            echo $row->c_name;
                            ?>
                        </div>

                        <div class="col-sm-3">
                            <?php
                            echo $row->sponsors;
                            ?>
                        </div>

                        <div class="col-sm-4">
                            <?php
                            echo $school_details->school_name . ' / ' . $dept_details->department;
                            ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
    </div>
</div>
<br /><br />
<div class="row">

    <div class ="col-sm-10">
        <?php
        $count = 0;
        $query = $this->db->query("select consultancy_projects.* from consultancy_projects,faculty where "
                . " faculty.fac_id = consultancy_projects.fac_id and faculty.department_id = '$department_id'");
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
</div>