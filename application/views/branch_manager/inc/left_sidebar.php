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
			<a href="<?= base_url()?>branch_manager">
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

				<li> <a href="<?= base_url()?>branch_manager/search_member"><i class='bx bx-radio-circle'></i>সদস্য খুজুন</a></li>
				<li> <a href="<?= base_url()?>branch_manager/member_list"><i class='bx bx-radio-circle'></i>সদস্য তালিকা দেখুন</a></li>
			</ul>
		</li>


		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-coin-stack"></i>
				</div>
				<div class="menu-title">ঋণ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>branch_manager/loans_list"><i class='bx bx-radio-circle'></i>ঋণ সদস্য তালিকা দেখুন</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-money"></i>
				</div>
				<div class="menu-title">ঋণ সংগ্রহ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>branch_manager/daily_loan_collection_list"><i class='bx bx-radio-circle'></i>ঋণ সংগ্রহের লিস্ট</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-grow"></i>
				</div>
				<div class="menu-title">সঞ্চয় </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>branch_manager/saving_account_list"><i class='bx bx-radio-circle'></i>সঞ্চয় একাউন্ট লিস্ট </a></li>
			</ul>
		</li>

		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="lni lni-grow"></i>
				</div>
				<div class="menu-title">সঞ্চয় সংগ্রহ </div>
			</a>
			<ul>
				<li> <a href="<?= base_url()?>branch_manager/daily_saving_collection_list"><i class='bx bx-radio-circle'></i>সঞ্চয় সংগ্রহ লিস্ট</a></li>
			</ul>
		</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">ডি.পি.এস</div>
            </a>
            <ul>
                <li> <a href="<?= base_url()?>branch_manager/dps_account_list"><i class='bx bx-radio-circle'></i>ডি.পি.এস একাউন্ট লিস্ট</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-collection"></i>
                </div>
                <div class="menu-title">ডি.পি.এস কালেকশন </div>
            </a>
            <ul>
                <li> <a href="<?= base_url()?>branch_manager/dps_collection_list"><i class='bx bx-radio-circle'></i>ডিপিএস কালেকশন লিস্ট</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-money"></i>
                </div>
                <div class="menu-title">এফ.ডি.আর</div>
            </a>
            <ul>
                <li><a href="<?= base_url()?>branch_manager/fdr_account_list"><i class='bx bx-radio-circle'></i>এফ.ডি.আর একাউন্ট লিস্ট</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-pin"></i>
                </div>
                <div class="menu-title">কর্মী সমূহ</div>
            </a>
            <ul>
                <li><a href="<?= base_url()?>branch_manager/add_officer"><i class='bx bx-radio-circle'></i>নতুন কর্মী</a></li>
                <li><a href="<?= base_url()?>branch_manager/officer_list"><i class='bx bx-radio-circle'></i>কর্মী লিস্ট</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-money-protection"></i>
                </div>
                <div class="menu-title">বেতন</div>
            </a>
            <ul>
                <li> <a href="<?= base_url()?>branch_manager/salary_list"><i class='bx bx-radio-circle'></i>সমস্ত বেতন লিস্ট</a></li>
                <li> <a href="<?= base_url()?>branch_manager/add_salary"><i class='bx bx-radio-circle'></i>নতুন বেতন প্রদান</a></li>
            </ul>
        </li>


	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->

