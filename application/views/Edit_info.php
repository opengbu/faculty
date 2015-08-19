<?php
$id = $this->session->userdata('fac_id');
$fac_q = $this->db->query("select * from faculty where fac_id = '$id' ");
$fac = $fac_q->row();

echo form_open('Edit_info');
?>


<div class = "col-sm-9" >

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-list col-sm-12"> 

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Name </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="name"  value="<?= $fac->name ?>" class="form-control" />
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Email </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="email"  value="<?= $fac->email ?>" class="form-control" />
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Monographs </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="monographs"  value="<?= $fac->monographs ?>" class="form-control" />
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Chapters in Books </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="chapters_in_books"  value="<?= $fac->chapters_in_books ?>" class="form-control" />
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Books with ISBN with details of publishers </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="books_with_isbn"  value="<?= $fac->books_with_isbn ?>" class="form-control" />
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Number of papers published (national/international) </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="national_db"  value="<?= $fac->national_db ?>" class="form-control" />
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
                            <input type="text" name="international_db"  value="<?= $fac->international_db ?>" class="form-control" />
                        </div>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Citation Index </label>
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Minimum</p>
                            <input type="text" name="citation_min"  value="<?= $fac->citation_min ?>" class="form-control" />
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Maximum</p>
                            <input type="text" name="citation_max"  value="<?= $fac->citation_max ?>" class="form-control" />
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Average</p>
                            <input type="text" name="citation_avg"  value="<?= $fac->citation_avg ?>" class="form-control" />
                        </div>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>SNIP </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="snip"  value="<?= $fac->snip ?>" class="form-control" />
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>SJR </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="sjr"  value="<?= $fac->sjr ?>" class="form-control" />
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>Impact factor </label>
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Minimum</p>
                            <input type="text" name="impact_min"  value="<?= $fac->impact_min ?>" class="form-control" />
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Maximum</p>
                            <input type="text" name="impact_max"  value="<?= $fac->impact_max ?>" class="form-control" />
                        </div>
                        <div class="col-sm-2" >
                            <p class="text-center">Average</p>
                            <input type="text" name="impact_avg"  value="<?= $fac->impact_avg ?>" class="form-control" />
                        </div>

                    </div>

                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6" >
                            <label>H Index </label>
                        </div>
                        <div class="col-sm-3" >
                            <input type="text" name="h_index"  value="<?= $fac->h_index ?>" class="form-control" />
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" >
            <?php
            echo '<label><font color="red">' . validation_errors() . '</font></label>';
            ?>
            <br />
            <input type="submit" value="Save" class="btn btn-primary pull-right" />
            <br />

        </div>
    </div>
    <div class="row">
        <br />  
    </div>
</div>
</form>
