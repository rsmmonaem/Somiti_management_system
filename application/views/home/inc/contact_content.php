<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/contact_assets/css/util.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/contact_assets/css/main.css" />

<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $contact->con_title?></h3>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <h3>Stay Connected With Us</h3>
                <h2>
                    <a target="_blank" href="<?= $contact->con_facebook?>"><i class="fab fa-facebook h2 p-3"></i></a>
                    <a target="_blank" href="<?= $contact->con_instagram?>"><i class="fab fa-instagram h2 p-3"></i></a>
                    <a target="_blank" href="<?= $contact->con_twitter?>"><i class="fab fa-twitter h2 p-3"></i></a>
                    <a target="_blank" href="<?= $contact->con_youtube?>"><i class="fab fa-youtube h2 p-3"></i></a>
                    <a target="_blank" href="<?= $contact->con_google?>"><i class="fab fa-google-plus-square h2 p-3"></i></a>

                </h2>
            </div>
            <div class="contact1">
                <div class="container-contact1">
                    <form class="contact1-form validate-form" method="post" action="<?= base_url();?>/home/contact_message_send">
                        <span class="contact1-form-title"> আপনার মতামত প্রকাশ করুন </span>
                        <div class="wrap-input1 validate-input" data-validate="Name is required">
                            <input class="input1" id="name" type="text" name="ctm_name" placeholder="নাম" required/>
                            <span class="shadow-input1"></span>
                        </div>
                        <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input1" type="text" name="ctm_email" placeholder="ইমেইল" required/>
                            <span class="shadow-input1"></span>
                        </div>
                        <div class="wrap-input1 validate-input" data-validate="Subject is required">
                            <input class="input1" id="subject" type="text" name="ctm_subject" placeholder="বিষয়" required/>
                            <span class="shadow-input1"></span>
                        </div>
                        <div class="wrap-input1 validate-input" data-validate="Message is required">
                            <textarea class="input1" id="description" name="ctm_description" placeholder="আপনার বার্তা টি পাঠান"></textarea>
                            <span class="shadow-input1"></span>
                        </div>
                        <div class="container-contact1-form-btn">
                            <button class="contact1-form-btn">
                            <span>
                              সাবমিট করুন
                              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row text-icon-big">
                <div class="text-center mb-3">
                    <h2>More Information</h2>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-mobile-alt"></i>
                    <p>Contact Number</p>
                    <p><?= $contact->con_phone?></p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-envelope-open-text "></i>
                    <p>Email Address</p>
                    <p><?= $contact->con_email?></p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-map-marked-alt "></i>
                    <p>Address</p>
                    <p><?= $contact->con_address?></p>
                </div>
            </div>

        </div>
    </div>
</div>
