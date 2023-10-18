<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Syne:wght@400;500;600;700;800&display=swap');

    *{
        margin: 0;
        padding: 0;
    }

    body{

        font-weight: 400;
        font-family: 'Dancing Script', cursive;
    }
    .h1, .h2, .h3, h1, h2, h3 {
        margin-top: 3px;
        margin-bottom: 10px;
    }

    p{
        font-size: 20px;
    }

    .container{

        height: 595.280029296875px;
        width: 841.8900146484375px;
        left: 0px;
        top: 0px;
        border-radius: 0px;
        margin-top: 100px;
    }
    .allpart{
        text-align: center;

        background-repeat: no-repeat;
        height: 550px;
        width: 810px;
        background-position: center;
        display: flex;
    }
    .imgpart{
        text-align: center;

        background-repeat: no-repeat;
        background-position: center;
    }
    hr{
        width: 55%;
        text-align: center;
        border-top: 1px solid #ccc;
        margin: auto;
    }
    .mainpart{
        margin-top: 0px;
        margin: auto;
    }
    .bannar{
        text-align: center;
        /*margin-top: 50px;*/
    }
    .bannar .ban{
        margin-top: -30px;
        margin-left: 0px;
    }

    .info {
        margin-bottom: 47px;
    }
    .recc{
        display: inline-flex;
    }

    .rec{
        display: inline-flex;
    }

    .rec1 {
        position: absolute;
        margin-top: 0px;
        margin-left: -15px;
    }

    .rec4{
        position: absolute;
        margin-top: -120px;
    }
    .rec2{
        position: absolute;
        right: 0px;
    }
    .rec3{

        position: absolute;
        right: 0px;
        margin-top: -130px;
    }
    .qr-code{
        margin-bottom: 10px;
    }
    @media print {
        .container{
            background: #E5F3DC !important;
        }
        .allpart{
            text-align: center!important;
            background-image: url(<?php echo base_url().'assets/';?>backend/img/group2.png)!important;
            background-repeat: no-repeat!important;
            height: 550px!important;
            width: 810px!important;
            background-position: center!important;
            display: flex!important;
        }
        .imgpart{
            text-align: center!important;
            background-image: url(<?php echo base_url().'assets/';?>backend/img/Vector.png)!important;
            background-repeat: no-repeat!important;
            background-position: center!important;
        }
    }

</style>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="certificate">
    <div class="container" style="background: #E5F3DC;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="bgimg">
                    <div class="rec ">
                        <div class="rec1"><img src="<?= base_url() ?>assets/backend/img/Rectangle.png" alt=""></div>
                        <div class="rec2"><img src="<?= base_url() ?>assets/backend/img/Rectangle2.png" alt=""></div>
                    </div>


                    <div class="imgpart" style="background-image: url(<?php echo base_url().'assets/';?>backend/img/Vector.png);">
                        <div class="allpart" style="background-image: url(<?php echo base_url().'assets/';?>backend/img/group2.png);">

                            <div class="mainpart">

                                <div class="bannar">
                                    <img src="<?= base_url() ?>assets/backend/img/Group.png" alt="img">
                                    <div class="ban"><img src="<?= base_url() ?>assets/backend/img/gg.png" alt="CERTIFICATE OF ACHIEVEMENT">
                                    </div>
                                </div>
                                <div class="info">
                                    <h1><?= $data->trainee_name ?></h1>
                                    <hr>
                                    <p>Has successfully completed</p>
                                    <h4><?= $data->dept_name ?></h4>
                                    <p>Online Training on</p>
                                    <p>Right to information Act, 2009 for Government Designated Officers.</p>
                                    <p>6 April 2023</p>
                                </div>
                                <div class="sign">
                                    <hr>
                                    <h3><?= $data->trainee_name ?> </h3>
                                </div>
                                <img src="<?= base_url() ?><?= $data->trainee_qr_code_file ?>" width="20%" class="qr-code">

                            </div>
                        </div>
                    </div>
                    <div class="recc ">
                        <div class="rec4"><img src="<?= base_url() ?>assets/backend/img/Rectangle1.png" alt=""></div>
                        <div class="rec3"><img src="<?= base_url() ?>assets/backend/img/Rectangle3.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
    </center>
</section>


<script>
    function myFunction() {
        window.print();
    }
</script>
</body>
</html>
