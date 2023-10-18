
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h2>নোটিশ বোর্ড</h2>
            </div>
            <div class="card-body">
                <?php

                foreach($this->anm->get_notice() as $row): ?>
                    <p><a href="<?= base_url();?>home/notice/<?= $row->not_id?>"><i class="bi bi-arrow-right-circle"></i> <?= $row->not_title ?></a>

                    </p>
                <?php endforeach;  ?>

                <a href="<?= base_url();?>home/notice_list" class="btn btn-light" > সকল </a>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <p><a href="#" class="text-decoration-none"> খবর </a></p>
             </div>
                <div class="card-body">

                    <marquee behavior="scroll" direction="left"
                             onmouseover="this.stop();"
                             onmouseout="this.start();">

                        <?php foreach ($this->amn->get_news() as $row):?>
                        <span class="h5"><a href="<?= base_url();?>home/news/<?= $row->news_id?>"> <?= $row->news_title ?>,   </a></span>
                        <?php endforeach;?>
                    </marquee>

                    <a href="<?= base_url();?>home/news_list" class="btn btn-light" > সকল </a>
            </div>

        <!-- introduction card  -->


    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-5 card-bottom-border">
                    <h5 class="p-2">আমাদের ইন্সটিটিউট</h5>
                    <div class="row">
                        <div class="card-body d-flex">
                            <img src="<?= base_url() ?>assets/home_assets/images/short-logo.png" alt="" class="img-fluid w-25" />
                            <ul>
                                <?php foreach ($this->aim->get_institute_home() as $row):?>
                                    <li><a href="<?= base_url();?>home/institute_details/<?=$row->inst_id?>"><?=  character_limiter($row->inst_name, 20)?> </a></li>
                                <?php endforeach;?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5 card-bottom-border">
                    <h5 class="p-2">চলমান কোর্স </h5>
                    <div class="row">
                        <div class="card-body d-flex">
                            <img src="<?= base_url() ?>assets/home_assets/images/short-logo.png" alt="" class="img-fluid w-25" />
                            <ul>
                                <?php foreach ($this->adm->get_department_header() as $row):?>

                                    <li><a href="<?= base_url();?>home/course_details/<?=$row->dept_id ?>"> <?= character_limiter($row->dept_name, 20) ?></a></li>
                                <?php endforeach;?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>





</div>
