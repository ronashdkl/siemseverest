<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30/11/2017
 * Time: 4:47 PM
 */
?>
<section class="content-header">
    <h1>
        <?= $this->title ;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->title;?></li>
    </ol>
</section>

<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-display-container">
                    <img src="<?= $model->image?>" style="width:100%" alt="Avatar">
                    <div class="w3-display-bottomleft w3-container w3-text-white">
                        <h2><?= $model->fullName?></h2>
                    </div>
                </div>
                <br/>
                <div class="w3-container">
                    <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $model->job_post?></p>
                    <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $model->address?></p>
                    <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $model->email?></p>
                    <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $model->contact?></p>
                    <hr>

<!--                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>-->
<!--                    <p>Adobe Photoshop</p>-->
<!--                    <div class="w3-light-grey w3-round-xlarge w3-small">-->
<!--                        <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>-->
<!--                    </div>-->
<!--                    <p>Photography</p>-->
<!--                    <div class="w3-light-grey w3-round-xlarge w3-small">-->
<!--                        <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">-->
<!--                            <div class="w3-center w3-text-white">80%</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <p>Illustrator</p>-->
<!--                    <div class="w3-light-grey w3-round-xlarge w3-small">-->
<!--                        <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>-->
<!--                    </div>-->
<!--                    <p>Media</p>-->
<!--                    <div class="w3-light-grey w3-round-xlarge w3-small">-->
<!--                        <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>-->
<!--                    </div>-->
                    <br>
                </div>
            </div><br>

            <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?= $model->fullName?></h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Joined At</b></h5>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
                    <hr>
                </div>
            </div>

            <div class="w3-container w3-card w3-white">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>More Information</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Job Type</b></h5>
                    <p><?= $model->job_type?></p>
                    <hr>
                </div>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Salary</b></h5>
                    <p><?=$model->sallery?></p>
                    <hr>
                </div>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Citizenship Number</b></h5>
                    <p><?= $model->citizenship_number?></p><br>
                    <hr>
                </div>
            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>
