<?php
$this->db->from('setting');
$this->db->where('setting_id', 1);
$setting = $this->db->get()->row();
?>
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="text-center">
            <img src="<?= base_url()?>uploads/setting/<?= $setting->setting_logo?>" class="img-fluid p-1" alt="logo icon" width="60%">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url()?>super_admin">
				<div class="parent-icon"><i class='bx bx-home-alt'></i>
				</div>
				<div class="menu-title"> ড্যাশবোর্ড </div>
			</a>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i>
				</div>
				<div class="menu-title">সদস্য</div>
			</a>
			<ul>

				<li> <a href="<?= base_url()?>super_admin/search_member"><i class='bx bx-radio-circle'></i>সদস্য খুজুন</a></li>
				<li> <a href="<?= base_url()?>super_admin/add_member"><i class='bx bx-radio-circle'></i>নতুন যোগ করুন</a></li>
				<li> <a href="<?= base_url()?>super_admin/member_list"><i class='bx bx-radio-circle'></i>সদস্য তালিকা দেখুন</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-coin-stack"></i>
				</div>
				<div class="menu-title">ঋণ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/add_guarantor"><i class='bx bx-radio-circle'></i>নতুন জামিনদার</a></li>
<!--				<li> <a href="--><?//= base_url()?><!--super_admin/add_loan_products"><i class='bx bx-radio-circle'></i>নতুন ঋণের পণ্য</a></li>-->
				<li> <a href="<?= base_url()?>super_admin/add_loans"><i class='bx bx-radio-circle'></i>নতুন ঋণ</a></li>
				<li> <a href="<?= base_url()?>super_admin/loans_list"><i class='bx bx-radio-circle'></i>ঋণ সদস্য তালিকা দেখুন</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-money"></i>
				</div>
				<div class="menu-title">ঋণ সংগ্রহ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/daily_loan_collection"><i class='bx bx-radio-circle'></i>ঋণ সংগ্রহ করুন </a></li>
				<li> <a href="<?= base_url()?>super_admin/daily_loan_collection_list"><i class='bx bx-radio-circle'></i>ঋণ সংগ্রহের লিস্ট</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-grow"></i>
				</div>
				<div class="menu-title">সঞ্চয় </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/saving_account_list"><i class='bx bx-radio-circle'></i>সঞ্চয় লিস্ট </a></li>
				<li> <a href="<?= base_url()?>super_admin/add_saving_account"><i class='bx bx-radio-circle'></i>নতুন সঞ্চয় একাউন্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/add_saving_plan"><i class='bx bx-radio-circle'></i>নতুন স্কিম প্ল্যান </a></li>
				<li> <a href="<?= base_url()?>account_admin/scheme_list"><i class='bx bx-radio-circle'></i>স্কিম প্ল্যান লিস্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/active_account_list"><i class='bx bx-radio-circle'></i> সক্রিয় সঞ্চয় অ্যাকাউন্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/matured_account_list"><i class='bx bx-radio-circle'></i>পরিপক্ক সঞ্চয় অ্যাকাউন্ট</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-grow"></i>
				</div>
				<div class="menu-title">সঞ্চয় সংগ্রহ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/daily_saving_collection"><i class='bx bx-radio-circle'></i> সঞ্চয় জমা করুন </a></li>
				<li> <a href="<?= base_url()?>super_admin/daily_saving_collection_list"><i class='bx bx-radio-circle'></i>সঞ্চয় সংগ্রহ লিস্ট</a></li>

			</ul>
		</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">ডি.পি.এস</div>
            </a>
            <ul>
                <li> <a href="<?= base_url()?>account_admin/dps_plan"><i class='bx bx-radio-circle'></i>ডি.পি.এস প্লান</a></li>
                <li> <a href="<?= base_url()?>account_admin/new_dps_account"><i class='bx bx-radio-circle'></i>নতুন ডি.পি.এস একাউন্ট</a></li>
                <li> <a href="<?= base_url()?>account_admin/dps_account_list"><i class='bx bx-radio-circle'></i>ডি.পি.এস একাউন্ট লিস্ট</a></li>
                <li> <a href="<?= base_url()?>account_admin/dps_collection"><i class='bx bx-radio-circle'></i>ডি.পি.এস কালেকশন</a></li>
                <li> <a href="<?= base_url()?>account_admin/dps_report"><i class='bx bx-radio-circle'></i>ডি.পি.এস রিপোর্ট</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-money"></i>
                </div>
                <div class="menu-title">এফ.ডি.আর</div>
            </a>
            <ul>
                <li> <a href="<?= base_url()?>account_admin/fdr_account"><i class='bx bx-radio-circle'></i>নতুন এফ.ডি.আর একাউন্ট</a></li>
                <li> <a href="<?= base_url()?>account_admin/fdr_account_list"><i class='bx bx-radio-circle'></i>এফ.ডি.আর একাউন্ট লিস্ট</a></li>
                <li> <a href="<?= base_url()?>account_admin/fdr_interest"><i class='bx bx-radio-circle'></i>এফ.ডি.আর ইন্টারেস্ট</a></li>
                <li> <a href="<?= base_url()?>account_admin/fdr_interest_list"><i class='bx bx-radio-circle'></i>এফ.ডি.আর ইন্টারেস্ট লিস্ট</a></li>
            </ul>
        </li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-user-pin"></i>
				</div>
				<div class="menu-title">কর্মী সমূহ</div>
			</a>
			<ul>
				<li><a href="<?= base_url()?>super_admin/add_officer"><i class='bx bx-radio-circle'></i>নতুন কর্মী</a></li>
				<li><a href="<?= base_url()?>super_admin/officer_list"><i class='bx bx-radio-circle'></i>কর্মী লিস্ট</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-money-protection"></i>
				</div>
				<div class="menu-title">বেতন</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/salary_list"><i class='bx bx-radio-circle'></i>সমস্ত বেতন লিস্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/add_salary"><i class='bx bx-radio-circle'></i>নতুন বেতন প্রদান</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="fadeIn animated bx bx-chair"></i>
				</div>
				<div class="menu-title">সম্পদ ব্যবস্থাপনা</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/assets_list"><i class='bx bx-radio-circle'></i>অফিস সম্পদসমূহ </a></li>
				<li> <a href="<?= base_url()?>super_admin/assets"><i class='bx bx-radio-circle'></i>নতুন সম্পদ যুক্ত করুন</a></li>
<!--				<li> <a href="--><?//= base_url()?><!--super_admin/collection"><i class='bx bx-radio-circle'></i>রিপোর্ট</a></li>-->
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-offer"></i>
				</div>
				<div class="menu-title">ব্যয় সমূহ</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/expense_list"><i class='bx bx-radio-circle'></i>সকল ব্যয়</a></li>
				<li> <a href="<?= base_url()?>super_admin/add_expense"><i class='bx bx-radio-circle'></i>নতুন ব্যয়</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-money-location"></i>
				</div>
				<div class="menu-title">আয় সমূহ</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/income_list"><i class='bx bx-radio-circle'></i>সকল আয়</a></li>
				<li> <a href="<?= base_url()?>super_admin/add_income"><i class='bx bx-radio-circle'></i>নতুন আয়</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-money-location"></i>
				</div>
				<div class="menu-title">ইনভেস্টিং</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/add_invest"><i class='bx bx-radio-circle'></i>ইনভেস্ট করুন</a></li>
				<li> <a href="<?= base_url()?>super_admin/invest_list"><i class='bx bx-radio-circle'></i>ইনভেস্ট সমূহ </a></li>
			</ul>
		</li>
		<li>

			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-revenue"></i>
				</div>
				<div class="menu-title">রিপোর্ট</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/loan_collection"><i class='bx bx-radio-circle'></i>ঋণ সংগ্রহের রিপোর্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/saving_collection"><i class='bx bx-radio-circle'></i>সঞ্চয় সংগ্রহের রিপোর্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/all_fdr"><i class='bx bx-radio-circle'></i> এফ.ডি.আর সংক্রান্ত রিপোর্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/all_expense"><i class='bx bx-radio-circle'></i>সকল খরচের রিপোর্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/all_income"><i class='bx bx-radio-circle'></i> সকল আয়ের রিপোর্ট</a></li>
				<li> <a href="<?= base_url()?>super_admin/all_salary"><i class='bx bx-radio-circle'></i> সকল বেতনের রিপোর্ট</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-revenue"></i>
				</div>
				<div class="menu-title">অ্যাকাউন্ট</div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>super_admin/office_wallet"><i class='bx bx-radio-circle'></i> অফিস ওয়ালেট </a></li>
				<!-- <li> <a href="<?= base_url()?>super_admin/collection"><i class='bx bx-radio-circle'></i>সঞ্চয় তহবিল</a></li> -->
				<!-- <li> <a href="<?= base_url()?>super_admin/collection"><i class='bx bx-radio-circle'></i>এফডিআর তহবিল</a></li>
				<li> <a href="<?= base_url()?>super_admin/collection"><i class='bx bx-radio-circle'></i>ডিপিএস ফান্ড</a></li> -->
<!--				<li> <a href="#"><i class='bx bx-radio-circle'></i>উন্নয়ন তহবিল</a></li>-->
				<li> <a href="<?= base_url()?>super_admin/provident_fund"><i class='bx bx-radio-circle'></i>প্রভিডেন্ট ফান্ড (PF)</a></li>
				<!-- <li> <a href="<?= base_url()?>super_admin/collection"><i class='bx bx-radio-circle'></i>কর্মসংস্থান নিরাপত্তা তহবিল</a></li> -->
				<!-- <li> <a href="<?= base_url()?>super_admin/collection"><i class='bx bx-radio-circle'></i>ভর্তি তহবিল</a></li> -->
<!--				<li> <a href="#"><i class='bx bx-radio-circle'></i>ইনভেস্টিং ফান্ড</a></li>-->
<!--				<li> <a href="#"><i class='bx bx-radio-circle'></i>শেয়ার ফান্ড</a></li>-->
			</ul>
		</li>

        <li>
            <a href="<?= base_url()?>super_admin/setting">
                <div class="parent-icon"><i class='bx bx-wrench'></i>
                </div>
                <div class="menu-title"> সেটিং </div>
            </a>
        </li>
	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->

