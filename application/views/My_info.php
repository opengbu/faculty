<?php
$id = $this->session->userdata('fac_id');
$fac_q = $this->db->query("select * from faculty where fac_id = '$id' ");
$fac = $fac_q->row();
error_reporting(E_ERROR);

?>


<div class = "col-sm-8" >

    <ul class="nav nav-list col-sm-12"> 

        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Name </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->name?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Email </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->email?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Monographs </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->monographs?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Chapters in Books </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->chapters_in_books ?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Books with ISBN with details of publishers </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->books_with_isbn?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Number of papers published (national/international) </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->national_db?>
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
                    <?=$fac->international_db?>
                </div>
            </div>
        </li>
        
        
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Citation Index </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->citation_min . " - ".  $fac->citation_max . "  /  " . $fac->citation_avg?>
                </div>
            </div>
        </li>
        
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>SNIP </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->snip ?>
                </div>
            </div>
        </li>
        
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>SJR </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->sjr ?>
                </div>
            </div>
        </li>
        
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>Impact factor </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->impact_min . " - ".  $fac->impact_max . "  /  " . $fac->impact_avg?>
                </div>
            </div>
        </li>
        
        
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6" >
                    <label>H Index </label>
                </div>
                <div class="col-sm-3" >
                    <?=$fac->h_index?>
                </div>
            </div>
        </li>
        
        
    </ul>
</div>
<div class="col-sm-2">
    <a href="<?=base_url('edit_info')?>" class="btn  btn-primary pull-right"> Edit </a>
</div>