<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Branch_manager extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function session_data() {
        $this->load->library('session');
        $this->load->helper('text');
        $this->load->helper('date');
        $this->load->helper('form');

        $this->load->model('user_modification_model', 'umm');
        $this->load->model('add_member_model', 'amm');
        $this->load->model('saving_model', 'ssm');
        $this->load->model('add_savingplan_model', 'aspm');
        $this->load->model('new_assets_model', 'nsm');
        $this->load->model('page_model', 'pm');
        $this->load->model('somiti_income_model', 'sim');
        $this->load->model('add_loans_model', 'alm');
        $this->load->model('dps_account_model', 'dam');
        $this->load->model('fdr_account_model', 'fam');



        if (!$this->session->userdata('user_name')) {
            redirect("login");
        }
    }





    public function index() {

        $this->load->library('session');
        if (!$this->session->userdata('user_name')) {
            redirect("login");
        } else {
            $this->session_data();
            $data['title'] = "";
            $this->load->view('branch_manager/index',$data);
        }
    }

    public function update_profile(){
        $data['title']= "প্রোফাইল আপডেট করুন";
        $this->load->view('branch_manager/update_profile',$data);
    }

    public function save_update_profile(){
        $this->session_data();
        $this->load->model('user_modification_model', 'umm');
        $dd = $this->umm->update_user_modification();
        $_SESSION['success'] = 'Updated successfully.';

        redirect("branch_manager/update_profile");
    }

    /******* ADD Member *******/
//    public function add_member(){
//        $this->session_data();
//        $data['title'] = "নতুন সদস্য যোগ করুন";
//        $this->load->model('add_officer_model', 'aom');
//        $data['officer'] = $this->aom->get_officer();
//        $this->load->view('branch_manager/add_member',$data);
//    }

    public function save_member(){
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $this->amm->create_member();
        $_SESSION['success'] = 'Member Created successfully.';
        redirect("branch_manager/add_member");
    }
    public function member_list() {
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $user_id = $this->session->userdata('user_id');
        $data['data'] = $this->amm->get_member_branch($user_id);
        $data['title'] = "সদস্যের লিস্ট";
        $this->load->view('branch_manager/member_list', $data);
    }
    public function edit_member($id) {
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $data['data'] = $this->amm->get_member_id('member',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->model('add_officer_model', 'aom');
        $data['officer'] = $this->aom->get_officer();
        $this->load->view('branch_manager/edit_member', $data);

    }
    public function update_member() {
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $this->amm->update_member();
        $_SESSION['success'] = 'Member Updated successfully.';
        redirect("branch_manager/member_list");
    }

    function department_delete($member_id) {
        $this->session_data();
        $member_id  = $this->uri->segment(3);
        $this->db->where('member_id', $member_id);
        $this->db->delete('member');
        $_SESSION['success'] = 'Member Deleted successfully.';
        redirect("branch_manager/member_list");
    }

    public function member_profile($id) {
        $this->session_data();
        $data['title'] = "সদস্যের তথ্য";

        $this->load->model('dps_account_model', 'dam');

        $data['dps_account'] = $this->dam->dps_profile_details($id);

        $this->load->model('add_loans_model', 'alm');
        $data['loan_account'] = $this->alm->loans_profile_details($id);

        $data['loan_collection'] = $this->alm->loans_collection_profile_details($id);

        $data['dps_collection'] = $this->dam->dps_collection_profile_details_test($id);

        $data['saving_account'] = $this->ssm->get_member_saving($id);
        $this->load->model('fdr_account_model', 'fam');

        $data['fdr_account'] = $this->fam->get_fdr_member_account($id);


        $this->load->model('add_member_model', 'amm');
        $data['data'] = $this->amm->get_member_id('member', $id);

        $this->load->view('branch_manager/member_profile', $data);
    }

    public function search_member(){
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $user_id = $this->session->userdata('user_id');
        $data['data'] = $this->amm->get_member_branch($user_id);
        $data['title'] = "সদস্য খুজুন";
        $this->load->view('branch_manager/search_member', $data);
    }



    /******* ADD Loan *******/
//    public function add_loans(){
//        $this->session_data();
//        $this->load->model('add_member_model', 'amm');
//        $this->load->model('create_guarantor_model', 'cgm');
//        $data['member'] = $this->amm->get_member();
//        $data['loan_product'] = $this->cgm->get_loan_products();
//        $data['guarantor'] = $this->cgm->get_guarantor();
//        $data['title'] = "নতুন ঋণ একাউন্ট খুলুন";
//        $this->load->view('branch_manager/add_loans', $data);
//    }

    public function save_loans(){
        $this->session_data();
        $_SESSION['success'] = "নতুন ঋণ একাউন্ট খোলা হয়েছে";
        $this->load->model('add_loans_model', 'alm');
        $this->alm->create_loans_worker();
        redirect("branch_manager/add_loans");
    }
    public function loans_list(){
        $this->session_data();
        $data['title'] = "ঋণের তালিকা";
        $this->load->model('add_loans_model', 'alm');

        $user_id = $this->session->userdata('user_id');
        $data['loans_list'] = $this->alm->get_loans_branch($user_id);

        $this->load->view("branch_manager/loans_list", $data);
    }

    public function edit_loans($id) {
        $this->session_data();
        $this->load->model('add_member_model', 'amm');
        $this->load->model('create_guarantor_model', 'cgm');
        $data['member'] = $this->amm->get_member();
        $data['loan_product'] = $this->cgm->get_loan_products();
        $data['guarantor'] = $this->cgm->get_guarantor();
        $data['title'] = "ঋণ একাউন্ট আপডেট করুন";
        $this->load->model('add_loans_model', 'alm');
        $data['data'] = $this->alm->get_loans_id('loans',$id);
        $this->load->view('branch_manager/edit_loan', $data);
    }

    public function update_loans(){
        $this->session_data();
        $this->load->model('add_loans_model', 'alm');
        $this->alm->update_loans();
        $_SESSION['success'] = 'Update successfully.';
        redirect("branch_manager/loans_list");
    }
    function loans_delete($loans_id) {
        $this->session_data();
        $loans_id = $this->uri->segment(3);
        $this->db->where('loans_id', $loans_id);
        $_SESSION['success'] = 'Deleted successfully.';
        $this->db->delete('loans');
        redirect("branch_manager/loans_list");
    }


//    public function add_loan_products(){
//        $this->session_data();
//        $data['title'] = "Loans Products";
//        $this->load->view('branch_manager/add_loan_products', $data);
//    }

    public function save_loan_products(){
        $this->session_data();
        $this->load->model('create_guarantor_model', 'cgm');
        $this->cgm->create_loan_products();
        $_SESSION['success'] = 'Loans Products Created successfully.';
        redirect("branch_manager/add_loan_products");
    }

    // Start Guarantor
//    public function add_guarantor(){
//        $this->session_data();
//        $data['title'] = "নতুন জামিনদার যোগ করুন";
//        $this->load->view('branch_manager/add_guarantor', $data);
//    }
    public function edit_guarantor($id){
        $this->session_data();
        $data['title'] = "জামিনদার আপডেট করুন";
        $this->load->model('create_guarantor_model', 'cgm');
        $data['data'] = $this->cgm->get_guarantor_id('guarantor',$id);

        $this->load->view('branch_manager/edit_guarantor', $data);
    }

    public function update_guarantor(){
        $this->session_data();
        $this->load->model('create_guarantor_model', 'cgm');
        $this->cgm->update_guarantor();
        $_SESSION['success'] = 'Updated successfully.';
        redirect("branch_manager/guarantor_list");
    }

    public function save_guarantor(){
        $this->session_data();
        $this->load->model('create_guarantor_model', 'cgm');
        $this->cgm->create_guarantor();
        $_SESSION['success'] = 'Guarantor Created successfully.';
        redirect("branch_manager/add_guarantor");
    }

    public function guarantor_list(){
        $this->session_data();
        $data['title'] = "জামিনদার লিস্ট";
        $this->load->model('create_guarantor_model', 'cgm');
        $data['grnt'] = $this->cgm->get_guarantor();

        $this->load->view('branch_manager/guarantor_list', $data);
    }

    function delete_guarantor($guarantor_id) {
        $this->session_data();
        $guarantor_id = $this->uri->segment(3);
        $this->db->where('guarantor_id', $guarantor_id);
        $_SESSION['success'] = 'Deleted successfully.';
        $this->db->delete('guarantor');
        redirect("branch_manager/daily_loan_collection_list");
    }
    // End Guarantor


// Start Date Wise All Reports
    // REPORT Loan Collection
  //  public function loan_collection(){
  //      $this->session_data();
  //      $data['title'] = "ঋণ সংগ্রহের রিপোর্ট";
  //      $this->load->view('branch_manager/loan_collection', $data);
  //  }
  //  public function loan_collection_report(){
  //      $this->session_data();
  //      $startDate = $this->input->post('startDate');
  //      $endDate = $this->input->post('endDate');
//
  //      $this->load->model('add_loans_model', 'alm');
  //      $data['startDate'] = $startDate;
  //      $data['endDate'] = $endDate;
  //      $data['report'] = $this->alm->getData($startDate, $endDate);
  //      $data['title'] = "প্রতিদিনের ঋণ জমা রিপোর্ট";
//
  //      $this->load->view('branch_manager/loan_collection_report', $data);
  //  }
//
//
  //  // REPORT saving Collection
  //  public function saving_collection(){
  //      $this->session_data();
  //      $data['title'] = "সঞ্চয় সংগ্রহের রিপোর্ট";
  //      $this->load->view('branch_manager/saving_collection', $data);
  //  }
  //  public function saving_collection_report(){
  //      $this->session_data();
  //      $startDate = $this->input->post('startDate');
  //      $endDate = $this->input->post('endDate');
//
  //      $this->load->model('saving_model', 'sm');
  //      $data['startDate'] = $startDate;
  //      $data['endDate'] = $endDate;
  //      $data['report'] = $this->sm->getData($startDate, $endDate);
  //      $data['title'] = "প্রতিদিনের সঞ্চয় জমা রিপোর্ট";
//
  //      $this->load->view('branch_manager/saving_collection_report', $data);
  //  }

//
//    // REPORT FDR Collection
//    public function all_fdr(){
//        $this->session_data();
//        $data['title'] = "এফ.ডি.আর সংক্রান্ত রিপোর্ট";
//        $this->load->view('branch_manager/all_fdr', $data);
//    }
//    public function fdr_report(){
//        $this->session_data();
//        $startDate = $this->input->post('startDate');
//        $endDate = $this->input->post('endDate');
//
//        $this->load->model('fdr_account_model', 'fam');
//        $data['startDate'] = $startDate;
//        $data['endDate'] = $endDate;
//        $data['report'] = $this->fam->getData($startDate, $endDate);
//        $data['title'] = "এফ.ডি.আর রিপোর্ট";
//        $this->load->view('branch_manager/fdr_report', $data);
//    }


//    // REPORT Expense
//    public function all_expense(){
//        $this->session_data();
//        $data['title'] = "সকল খরচ";
//        $this->load->view('branch_manager/all_expense', $data);
//    }
//    public function all_expense_report(){
//        $this->session_data();
//        $startDate = $this->input->post('startDate');
//        $endDate = $this->input->post('endDate');
//        $this->load->model('somiti_expense_model', 'sem');
//        $data['startDate'] = $startDate;
//        $data['endDate'] = $endDate;
//        $data['report'] = $this->sem->getData($startDate, $endDate);
//        $data['title'] = "ব্যয়ের রিপোর্ট";
//        $this->load->view('branch_manager/all_expense_report', $data);
//    }
//
//    // REPORT Income
//    public function all_income(){
//        $this->session_data();
//        $data['title'] = "সকল আয়";
//        $this->load->view('branch_manager/all_income', $data);
//    }
//
//    public function all_income_report(){
//        $this->session_data();
//        $startDate = $this->input->post('startDate');
//        $endDate = $this->input->post('endDate');
//        $this->load->model('somiti_income_model', 'sim');
//        $data['startDate'] = $startDate;
//        $data['endDate'] = $endDate;
//        $data['report'] = $this->sim->getData($startDate, $endDate);
//        $data['title'] = "আয়ের রিপোর্ট";
//        $this->load->view('branch_manager/all_income_report', $data);
//    }
//
//    // REPORT Salary
//    public function all_salary(){
//        $this->session_data();
//        $data['title'] = "সকল বেতন";
//        $this->load->view('branch_manager/all_salary', $data);
//    }
//
//    public function all_salary_report(){
//        $this->session_data();
//        $startDate = $this->input->post('startDate');
//        $endDate = $this->input->post('endDate');
//        $this->load->model('officer_salary_model', 'osm');
//        $data['startDate'] = $startDate;
//        $data['endDate'] = $endDate;
//        $data['report'] = $this->osm->getData($startDate, $endDate);
//        $data['title'] = "বেতনের রিপোর্ট";
//        $this->load->view('branch_manager/all_salary_report', $data);
//    }

    // End Date Wise All Reports

//    // Daily Loan Collection
//    public function daily_loan_collection(){
//        $this->session_data();
//        $this->load->model('add_member_model', 'amm');
//        $this->load->model('add_loans_model', 'alm');
//
//        $user_id = $this->session->userdata('user_id');
//        $data['member'] = $this->alm->get_loans_worker($user_id);
//
//        //	$data['member'] = $this->alm->get_loans_worker($id);
//
//        $data['title'] = "প্রতিদিনের ঋণ জমা করুন";
//        $this->load->view('branch_manager/add_daily_collection', $data);
//    }


//    public function daily_loan_report(){
//        $this->session_data();
//        echo " ডাটা কমেন্ট করা হয়েছে";
//        // $this->load->model('add_member_model', 'amm');
//        // $data['member'] = $this->amm->get_member();
//        // $this->load->model('add_loans_model', 'alm');
//        // $data['loan_product'] = $this->alm->get_daily_loan_collect();
//        // $data['title'] = "ঋণ সংগ্রহের রিপোর্ট";
//        // $this->load->view('branch_manager/daily_loan_report', $data);
//    }

//    public function save_daily_loan(){
//        $this->session_data();
//        $this->load->model('add_member_model', 'amm');
//        $this->load->model('add_loans_model', 'alm');
//        $this->alm->save_daily_loan_worker();
//        $_SESSION['success'] = "ঋণ সংগ্রহ সম্পন্ন হয়েছে ";
//        redirect("branch_manager/daily_loan_collection");
//    }

    public function daily_loan_collection_list(){
        $this->session_data();
        $this->load->model('add_loans_model', 'alm');
        $user_id = $this->session->userdata('user_id');
        $data['loan_product'] = $this->alm->get_daily_loan_collect_branch($user_id);
        $data['title'] = "প্রতিদিনের ঋণ জমা রিপোর্ট";
        $this->load->view('branch_manager/daily_loan_collection_list', $data);
    }



    function edit_daily_loan($dlc_id) {
        $this->session_data();
        $dlc_id = $this->uri->segment(3);
        $this->load->model('add_member_model', 'amm');
        $this->load->model('add_loans_model', 'alm');
        $data['member'] = $this->alm->get_loans();
        $data['title'] = "প্রতিদিনের ঋণ জমা আপডেট করুন";
        $data['loan_product'] = $this->alm->get_daily_loan_collect_id($dlc_id);
        $this->load->view('branch_manager/add_daily_collection', $data);
    }


    function update_daily_loan() {
        $this->session_data();
        $this->load->model('add_loans_model', 'alm');
        $this->alm->update_daily_loan();
        $_SESSION['success'] = 'Update successfully.';
        redirect("branch_manager/daily_loan_collection_list");
    }



    function delete_daily_loan($dlc_id) {
        $this->session_data();

        // Fetch loans_id from the daily_loan_collection table based on $dlc_id
        $this->db->select('daily_loan_collection.*');
        $this->db->where('dlc_id', $dlc_id);
        $query = $this->db->get('daily_loan_collection');
        $row = $query->row();

        if ($row) {
            $loans_id = $row->dlc_loans_id;
            $dlc_amount = $row->dlc_amount;

            // Fetch data from the loans table
            $this->db->select('loans.*');
            $this->db->where('loans_id', $loans_id);
            $query = $this->db->get('loans');
            $row = $query->row();

            // Update the loans table with the new values
            $loan_amount_collection = $row->loan_amount_collection - $dlc_amount;
            $loans_profit_installments = $row->loans_total_installment - 1;

            $data = array(
                'loan_amount_collection' => $loan_amount_collection,
                'loans_total_installment' => $loans_profit_installments,
            );

            $this->db->where('loans_id', $loans_id);
            $this->db->update('loans', $data);

            // Delete the row from the daily_loan_collection table
            $this->db->where('dlc_id', $dlc_id);
            $this->db->delete('daily_loan_collection');

            $_SESSION['success'] = 'Deleted successfully.';
            redirect("branch_manager/daily_loan_collection_list");
        } else {
            return "Not Successful, Try again";
        }
    }
    // End Daily Collection


    // Saving Account

/*    public function add_saving_plan(){
        $this->session_data();
        $data['title'] = "স্কিম প্ল্যান";
        $this->load->view('branch_manager/add_saving_plan', $data);
    }*/
    public function save_saving_plan(){
        $this->session_data();
        $this->load->model('add_savingplan_model', 'aspm');
        $this->aspm->save_saving_plan();
        $_SESSION['success'] = 'Saving Plan Created successfully.';
        redirect("branch_manager/add_saving_plan");
    }
//
//    public function add_saving_account(){
//        $this->session_data();
//        $data['title'] = "নতুন সঞ্চয় হিসাব";
//        $data['member'] = $this->amm->get_member();
//        $data['plan'] = $this->aspm->get_plan();
//        $this->load->view('branch_manager/add_saving_account', $data);
//    }

    public function save_account(){
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $this->ssm->save_saving();
        $_SESSION['success'] = "নতুন সঞ্চয় হিসাব তৈরি হয়েছে ";
        redirect("branch_manager/add_saving_account");
    }
    public function saving_account_list() {
        $this->session_data();
        $this->load->model('saving_model', 'ssm');

        $user_id = $this->session->userdata('user_id');

        $data['data'] = $this->ssm->get_saving_account_branch($user_id);
        $data['title'] = 'সঞ্চয় একাউন্ট লিস্ট';
        $this->load->view('branch_manager/saving_list', $data);
    }


    public function edit_saving_account($sa_id) {
        $this->session_data();
        $sa_id = $this->uri->segment(3);
        $this->load->model('saving_model', 'ssm');
        $data['member'] = $this->amm->get_member();
        $data['plan'] = $this->aspm->get_plan();
        $data['data'] = $this->ssm->get_saving_by_id($sa_id);
        $data['title'] = 'আপডেট সঞ্চয় একাউন্ট';
        $this->load->view('branch_manager/add_saving_account', $data);
    }

    public function update_saving_account() {
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $this->ssm->update_saving();
        $_SESSION['success'] = 'Update successfully.';
        redirect("branch_manager/saving_account_list");
    }


    function delete_saving_account($sa_id) {
        $this->session_data();
        $sa_id = $this->uri->segment(3);
        $this->db->where('sa_id', $sa_id);
        $_SESSION['success'] = 'Deleted successfully.';
        $this->db->delete('saving_account');
        redirect("branch_manager/saving_account_list");
    }

    public function matured_account_list() {
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $data['data'] = $this->ssm->get_saving_matured();
        $data['title'] = 'পরিপক্ক সঞ্চয় একাউন্ট লিস্ট';
        $this->load->view('branch_manager/matured_account_list', $data);
    }

    public function matured_now($sa_id) {
        $this->session_data();
        $sa_id  = $this->uri->segment(3);
        $data = array('sa_status' => 'matured');
        $this->db->where('sa_id', $sa_id);
        $this->db->update('saving_account', $data);
        redirect("branch_manager/matured_account_list");
    }

    public function active_account_list() {
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $data['data'] = $this->ssm->get_saving_Active();
        $data['title'] = 'পরিপক্ক সঞ্চয় একাউন্ট লিস্ট';
        $this->load->view('branch_manager/matured_account_list', $data);
    }

    public function active_now($sa_id) {
        $this->session_data();
        $sa_id  = $this->uri->segment(3);
        $data = array('sa_status' => 'Active');
        $this->db->where('sa_id', $sa_id);
        $this->db->update('saving_account', $data);
        redirect("branch_manager/active_account_list");
    }


    // End Saving account









    public function edit_saving_plan($saving_plan_id) {
        $this->session_data();
        $sa_id = $this->uri->segment(3);
        $this->load->model('add_savingplan_model', 'aspm');
        $data['plane'] = $this->aspm->get_plan_id($saving_plan_id);
        $data['title'] = 'আপডেট করুন';
        $this->load->view('branch_manager/add_saving_plan', $data);
    }

    public function update_saving_plan() {
        $this->session_data();
        $this->load->model('add_savingplan_model', 'aspm');
        $this->aspm->update_saving_plan();
        $_SESSION['success'] = 'Update successfully.';
        redirect("branch_manager/scheme_list");
    }


    function delete_saving_plan($saving_plan_id) {
        $this->session_data();
        $saving_plan_id = $this->uri->segment(3);
        $this->db->where('saving_plan_id', $saving_plan_id);
        $_SESSION['success'] = 'Deleted successfully.';
        $this->db->delete('saving_plan');
        redirect("branch_manager/scheme_list");
    }


    //Add Officer
    public function add_officer(){
        $this->session_data();
        $data['title'] = "নতুন অফিসারের একাউন্ট খুলুন";
        $this->load->view('branch_manager/add_officer', $data);
    }

    public function save_officer(){
        $this->session_data();
        $this->load->model('add_officer_model', 'aom');
        $this->aom->save_officer();
        $_SESSION['success'] = "নতুন অফিসার নিবন্ধন হয়েছে";
        redirect("branch_manager/add_officer");
    }
    public function officer_list(){
        $this->session_data();
        $this->load->model('add_officer_model', 'aom');
        $user_id = $this->session->userdata('user_id');
        $data['data'] = $this->aom->get_officer_manager($user_id);
        $data['title'] = 'অফিসার লিস্ট';
        $this->load->view("branch_manager/officer_list", $data);
    }
    public function edit_officer($id) {
        $this->session_data();
        $this->load->model('add_officer_model', 'aom');
        $data['data'] = $this->aom->get_officer_id('officer',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_officer', $data);

    }

    public function update_officer() {
        $this->session_data();
        $this->load->model('add_officer_model', 'aom');
        $this->aom->update_officer();
        $_SESSION['success'] = 'Officer Updated successfully.';
        redirect("branch_manager/officer_list");
    }
    public function officer_profile($id) {
        $this->session_data();
        $this->load->model('add_officer_model', 'aom');
        $data['title'] = "অফিসারের তথ্য";
        $data['data'] = $this->aom->get_officer_id('officer',$id);
        $this->load->view('branch_manager/officer_profile', $data);
    }

    function officer_delete($officer_id) {
        $this->session_data();
        $officer_id = $this->uri->segment(3);
        $this->db->where('officer_id', $officer_id);
        $_SESSION['success'] = 'Deleted successfully.';
        $this->db->delete('officer');
        redirect("branch_manager/officer_list");
    }

    //End Officer


    // Officer Salary
    public function add_salary(){
        $this->session_data();
        $data['title'] = "বেতন প্রদান করুন";
        $this->load->model('add_officer_model', 'aom');
        $user_id = $this->session->userdata('user_id');
        $data['data'] = $this->aom->get_officer_manager($user_id);
        $this->load->view('branch_manager/add_salary', $data);
    }

    public function save_salary(){
        $this->session_data();
        $this->load->model('officer_salary_model', 'osm');
        $this->osm->save_salary();
        $_SESSION['success'] = "নতুন বেতন প্রদান করা হয়েছে";
        redirect("branch_manager/add_salary");
    }

    public function salary_list(){
        $this->session_data();
        $this->load->model('officer_salary_model', 'osm');
        $data['title'] = "বেতন লিস্ট";
        $user_id = $this->session->userdata('user_id');
        $data['salary'] = $this->osm->get_salary_manager($user_id);
        $this->load->view('branch_manager/salary_list', $data);
    }
    function salary_delete($salary_id) {
        $this->session_data();
        $salary_id = $this->uri->segment(3);
        $this->db->where('salary_id', $salary_id);
        $this->db->delete('salary');
        $_SESSION['success'] = 'Deleted Successfully.';
        redirect("branch_manager/salary_list");
    }
    //End Officer Salary


//Start saving collection
//    public function daily_saving_collection() {
//        $this->session_data();
//        $this->load->model('saving_model', 'ssm');
//        $user_id = $this->session->userdata('user_id');
//        $data['member'] = $this->ssm->get_saving_account_worker($user_id);
//        $data['title'] = 'সঞ্চয় জমা করুন';
//        $this->load->view('branch_manager/daily_saving_collection', $data);
//    }

    public function edit_ds_collection($id) {
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $data['member'] = $this->ssm->get_saving_account();

        $data['data'] = $this->ssm->get_collection_id('daily_saving_collection',$id);
        $data['title'] = 'সঞ্চয় আপডেট করুন';
        $this->load->view('branch_manager/edit_daily_saving_collection', $data);
    }

//    function ds_collection_delete($dsc_id) {
//        $this->session_data();
//        $dsc_id  = $this->uri->segment(3);
//        $this->db->where('dsc_id', $dsc_id);
//        $this->db->delete('daily_saving_collection');
//        $_SESSION['success'] = 'Deleted Successfully.';
//        redirect("branch_manager/daily_saving_collection_list");
//    }
    function ds_collection_delete($dsc_id) {
        $this->session_data();

        // Fetch loans_id from the daily_loan_collection table based on $dlc_id
        $this->db->select('daily_saving_collection.*');
        $this->db->where('dsc_id', $dsc_id);
        $query = $this->db->get('daily_saving_collection');
        $row = $query->row();

        if ($row) {
            $loans_id = $row->dsc_saving_id;
            $dlc_amount = $row->dsc_amount;

            // Fetch data from the loans table
            $this->db->select('saving_account.*');
            $this->db->where('sa_id', $loans_id);
            $query = $this->db->get('saving_account');
            $row = $query->row();

            // Update the loans table with the new values
            $loan_amount_collection = $row->sa_money_saving - $dlc_amount;
            $loans_profit_installments = $row->sa_total_installments - 1;

            $data = array(
                'sa_money_saving' => $loan_amount_collection,
                'sa_total_installments' => $loans_profit_installments,
            );

            $this->db->where('sa_id', $loans_id);
            $this->db->update('saving_account', $data);

            // Delete the row from the daily_loan_collection table
            $this->db->where('dsc_id', $dsc_id);
            $this->db->delete('daily_saving_collection');

            $_SESSION['success'] = 'Deleted successfully.';
            redirect("branch_manager/daily_saving_collection_list");
        } else {
            return "Not Successful, Try again";
        }
    }



    public function update_saving_collection(){
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $this->ssm->update_saving_collection();
        $_SESSION['success'] = "Updated Successfully";
        redirect("branch_manager/daily_saving_collection_list");
    }

    public function save_saving_collection(){
        $this->session_data();
        $this->load->model('saving_model', 'ssm');
        $this->ssm->save_saving_collection();
        $_SESSION['success'] = "প্রতিদিনের সঞ্চয় হিসাব জমা হয়েছে";
        redirect("branch_manager/daily_saving_collection");
    }

    public function daily_saving_collection_list(){
        $this->session_data();
        $this->load->model('saving_model', 'ssm');

        $user_id = $this->session->userdata('user_id');

        $data['data'] = $this->ssm->get_daily_collection_list_branch($user_id);
        $data['title'] = 'সঞ্চয় জমা করুন';
        $this->load->view("branch_manager/daily_saving_collection_list", $data);
    }

//End Saving Collection


    //Assets Management
//    public function assets(){
//        $this->session_data();
//        $this->load->model('new_assets_model', 'nsm');
//        $data['title'] = 'নতুন সম্পত্তি যোগ করুন';
//        $this->load->view('branch_manager/add_assets', $data);
//    }

    public function save_assets(){
        $this->session_data();
        $this->load->model('new_assets_model', 'nsm');
        $this->nsm->save_assets();
        $_SESSION['success'] = "নতুন সম্পত্তি যোগ হয়েছে";
        redirect("branch_manager/assets");
    }

    public function assets_list(){
        $this->session_data();
        $data['title'] = 'সম্পত্তি লিস্ট';
        $data['data'] = $this->nsm->get_assets();
        $this->load->view('branch_manager/assets_list', $data);
    }

    public function edit_assets($id) {
        $this->session_data();
        $this->load->model('new_assets_model', 'nsm');
        $data['data'] = $this->nsm->get_assets_id('assets',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_assets', $data);
    }

    public function update_assets() {
        $this->session_data();
        $this->load->model('new_assets_model', 'nsm');
        $this->nsm->update_assets();
        $_SESSION['success'] = 'Updated Successfully.';
        redirect("branch_manager/assets_list");
    }
    function assets_delete($assets_id) {
        $this->session_data();
        $assets_id  = $this->uri->segment(3);
        $this->db->where('assets_id', $assets_id);
        $this->db->delete('assets');
        $_SESSION['success'] = 'Deleted Successfully.';
        redirect("branch_manager/assets_list");
    }

    //End Assets Management


    //Start Expense Management
//    public function add_expense(){
//        $this->session_data();
//        $this->load->model('somiti_expense_model', 'sem');
//        $data['title'] = 'নতুন ব্যয় সমূহ যোগ করুন';
//        $this->load->view('branch_manager/add_expense', $data);
//    }
    public function save_expense(){
        $this->session_data();
        $this->load->model('somiti_expense_model', 'sem');
        $this->sem->save_expense();
        $_SESSION['success'] = "নতুন ব্যয় সমূহ হয়েছে";
        redirect("branch_manager/add_expense");
    }

    public function expense_list(){
        $this->session_data();
        $data['title'] = 'ব্যয় লিস্ট';
        $this->load->model('somiti_expense_model', 'sem');
        $data['data'] = $this->sem->get_expense();
        $this->load->view('branch_manager/expense_list', $data);
    }

    public function edit_expense($id) {
        $this->session_data();
        $this->load->model('somiti_expense_model', 'sem');
        $data['data'] = $this->sem->get_expense_id('expense',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_expense', $data);
    }
    public function expense_print($id) {
        $this->session_data();
        $this->load->model('somiti_expense_model', 'sem');
        $data['data'] = $this->sem->get_expense_id('expense',$id);
        $data['title'] = "প্রিন্ট করুন";
        $this->load->view('branch_manager/expense_print', $data);
    }

    public function update_expense() {
        $this->session_data();
        $this->load->model('somiti_expense_model', 'sem');
        $this->sem->update_expense();
        $_SESSION['success'] = 'Updated Successfully.';
        redirect("branch_manager/expense_list");
    }
    function expense_delete($expense_id) {
        $this->session_data();
        $expense_id  = $this->uri->segment(3);
        $this->db->where('expense_id', $expense_id);
        $this->db->delete('expense');
        $_SESSION['success'] = 'Deleted Successfully.';
        redirect("branch_manager/expense_list");
    }
    //End Expense Management


    //Start Income Management
//    public function add_income(){
//        $this->session_data();
//        $this->load->model('somiti_income_model', 'sim');
//        $data['title'] = 'নতুন আয় সমূহ যোগ করুন';
//        $this->load->view('branch_manager/add_income', $data);
//    }
    public function save_income(){
        $this->session_data();
        $this->load->model('somiti_income_model', 'sem');
        $this->sim->save_income();
        $_SESSION['success'] = "নতুন আয় সমূহ হয়েছে";
        redirect("branch_manager/add_income");
    }

    public function income_list(){
        $this->session_data();
        $data['title'] = 'ব্যয় লিস্ট';
        $this->load->model('somiti_income_model', 'sim');
        $data['data'] = $this->sim->get_income();
        $this->load->view('branch_manager/income_list', $data);
    }

    public function edit_income($id) {
        $this->session_data();
        $this->load->model('somiti_income_model', 'sim');
        $data['data'] = $this->sim->get_income_id('income',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_income', $data);
    }
    public function income_print($id) {
        $this->session_data();
        $this->load->model('somiti_income_model', 'sim');
        $data['data'] = $this->sim->get_income_id('income',$id);
        $data['title'] = "প্রিন্ট করুন";
        $this->load->view('branch_manager/income_print', $data);
    }

    public function update_income() {
        $this->session_data();
        $this->load->model('somiti_income_model', 'sim');
        $this->sim->update_income();
        $_SESSION['success'] = 'Updated Successfully.';
        redirect("branch_manager/income_list");
    }
    function income_delete($income_id) {
        $this->session_data();
        $income_id  = $this->uri->segment(3);
        $this->db->where('income_id', $income_id);
        $this->db->delete('income');
        $_SESSION['success'] = 'Deleted Successfully.';
        redirect("branch_manager/income_list");
    }
    //End income Management


//    public function add_invest(){
//        $this->session_data();
//        $data['title'] = 'নতুন ইনভেস্ট সমূহ যোগ করুন';
//        $this->load->view('branch_manager/add_invest', $data);
//    }
    public function save_invest(){
        $this->session_data();
        $this->load->model('new_assets_model', 'nam');
        $this->nam->save_invest();
        $_SESSION['success'] = "নতুন ইনভেস্ট সমূহ হয়েছে";
        redirect("branch_manager/add_invest");
    }

    public function invest_list(){
        $this->session_data();
        $data['title'] = 'ইনভেস্ট লিস্ট';
        $this->load->model('new_assets_model', 'nam');
        $data['data'] = $this->nam->get_invest();
        $this->load->view('branch_manager/invest_list', $data);
    }
    function invest_delete($invest_id) {
        $this->session_data();
        $invest_id  = $this->uri->segment(3);
        $this->db->where('invest_id', $invest_id);
        $this->db->delete('invest');
        $_SESSION['success'] = 'Deleted Successfully.';
        redirect("branch_manager/invest_list");
    }

    public function edit_invest($id) {
        $this->session_data();
        $this->load->model('new_assets_model', 'nam');
        $data['data'] = $this->nam->get_ivest_id('invest',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_invest', $data);
    }

    public function update_invest() {
        $this->session_data();
        $this->load->model('new_assets_model', 'nam');
        $this->nam->update_invest();
        $_SESSION['success'] = 'Updated Successfully.';
        redirect("branch_manager/invest_list");
    }

    // public function income_print($id) {
    //     $this->session_data();
    //     $this->load->model('somiti_income_model', 'sim');
    //     $data['data'] = $this->sim->get_income_id('income',$id);
    //     $data['title'] = "প্রিন্ট করুন";
    //     $this->load->view('branch_manager/income_print', $data);
    // }



    // function income_delete($income_id) {
    //     $this->session_data();
    //     $income_id  = $this->uri->segment(3);
    //     $this->db->where('income_id', $income_id);
    //     $this->db->delete('income');
    //     $_SESSION['success'] = 'Deleted Successfully.';
    //     redirect("branch_manager/income_list");
    // }

// Account Manage
//    function office_wallet() {
//        $this->session_data();
//        $this->load->model('office_wallet_model', 'owm');
//        $data['get_income'] = $this->owm->get_income();
//        $data['get_expense'] = $this->owm->get_expense();
//        $data['get_assets'] = $this->owm->get_assets();
//        $data['get_total_loans'] = $this->owm->get_total_loans();
//        $data['get_total_loans_collection'] = $this->owm->get_total_loans_collection();
//        $data['get_total_saving_collection'] = $this->owm->get_total_saving_collection();
//        $data['get_total_salary_paid'] = $this->owm->get_total_salary_paid();
//        $data['get_total_invest'] = $this->owm->get_total_invest();
//        $data['title'] = "অফিস ওয়ালেট";
//        //print_r($data);
//        $this->load->view('branch_manager/office_wallet', $data);
//    }

//    public function provident_fund(){
//        $this->session_data();
//        $this->load->model('officer_salary_model', 'osm');
//        $data['provident_fund'] = $this->osm->get_salary();
//        $data['title'] = "বেতনের রিপোর্ট";
//        $this->load->view('branch_manager/provident_fund_list', $data);
//    }

// Edn Account Manage





//    public function scheme_list(){
//        $this->session_data();
//        $data['title'] = "স্কিম লিস্ট";
//        $this->load->model('add_savingplan_model', 'aspm');
//        $data['scheme'] = $this->aspm->get_plan();
//        $this->load->view('branch_manager/scheme_list', $data);
//    }
//
//    public function dps_plan(){
//        $this->session_data();
//        $data['title'] = "ডিপিএস প্লান";
//        $this->load->view('branch_manager/dps_plan', $data);
//    }
//    public function dps_plan_list(){
//        $this->session_data();
//        $data['title'] = "ডিপিএস প্লান লিস্ট";
//        $this->load->model('dps_account_model', 'dam');
//        $data['dps'] = $this->dam->get_dps_plan();
//        $this->load->view('branch_manager/dps_plan_list', $data);
//    }
//
//    public function edit_dps_plan($id) {
//        $this->session_data();
//        $this->load->model('dps_account_model', 'dam');
//        $data['data'] = $this->dam->get_dps_plan_id('dps_plan',$id);
//        $data['title'] = "আপডেট করুন";
//        $this->load->view('branch_manager/edit_dps_plan', $data);
//    }
//
//    function dps_plan_delete($dps_plan_id) {
//        $this->session_data();
//        $dps_plan_id  = $this->uri->segment(3);
//        $this->db->where('dps_plan_id', $dps_plan_id);
//        $this->db->delete('dps_plan');
//        $_SESSION['success'] = 'Deleted successfully.';
//        redirect("branch_manager/dps_plan_list");
//    }
//
//    public function dps_account(){
//        $this->session_data();
//        $data['title'] = "ডিপিএস একাউন্ট খুলুন";
//
//        $this->load->view('branch_manager/dps_account', $data);
//    }

    public function dps_account_list(){
        $this->session_data();
        $data['title'] = "ডিপিএস একাউন্ট খুলুন";
        $this->load->model('dps_account_model', 'dam');
        $user_id = $this->session->userdata('user_id');
        $data['account'] = $this->dam->get_member_dps_account_branch($user_id);
        $this->load->view('branch_manager/dps_account_list', $data);
    }

    function dps_delete($dps_acc_id) {
        $this->session_data();
        $dps_acc_id  = $this->uri->segment(3);
        $this->db->where('dps_acc_id', $dps_acc_id);
        $this->db->delete('dps_account');
        $_SESSION['success'] = 'Deleted successfully.';
        redirect("branch_manager/dps_account_list");
    }

    public function edit_dps_account($id) {
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $data['data'] = $this->dam->get_dps_id('dps_account',$id);
        $data['title'] = "আপডেট করুন";
        $data['dps'] = $this->dam->get_dps_plan();
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('branch_manager/edit_dps_account', $data);
    }

    public function update_dps_plan(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->update_main_dps_plan();
        $_SESSION['success'] = 'Updated successfully.';
        redirect("branch_manager/dps_plan_list");
    }

//
//    public function new_dps_account(){
//        $this->session_data();
//        $data['title'] = "নতুন ডিপিএস একাউন্ট খুলুন";
//        $data['dps'] = $this->dam->get_dps_plan();
//        $this->load->model('add_member_model', 'amm');
//        $data['member'] = $this->amm->get_member();
//        $this->load->view('branch_manager/new_dps_account', $data);
//    }


    public function save_dps_account(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->save_dps_account();
        $_SESSION['success'] = 'DPS Account Created Successfully.';
        redirect("branch_manager/new_dps_account");
    }

    public function save_dps_plan(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->save_dps_plan();
        $_SESSION['success'] = 'DPS Plan Created successfully.';
        redirect("branch_manager/dps_plan");
    }



    public function get_dps_plan_amount() {
        // Check if it's an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the DPS plan ID from the POST data
            $dpsPlanId = $this->input->post('dps_plan_id');

            // Fetch the DPS plan amount from your model/database
            $this->load->model('dps_account_model', 'dam');
            $dpsPlanTotalAmount = $this->dam->getDpsPlanAmount($dpsPlanId);
            $dpsPlanAmount = $this->dam->getDpsAmount($dpsPlanId);
            $dps_plan_main_amount = $this->dam->getDpsMainAmount($dpsPlanId);
            $dps_plan_installment = $this->dam->getInstallment($dpsPlanId);
            echo json_encode(array('dps_plan_amount' => $dpsPlanAmount, 'dps_plan_installment' => $dps_plan_installment,'dps_plan_total_amount' => $dpsPlanTotalAmount,'dps_plan_main_amount' => $dps_plan_main_amount, ));

        } else {
            // Handle non-AJAX requests or unauthorized access
            show_404(); // You can customize this based on your needs
        }
    }



    //FDR account
//    public function fdr_account(){
//        $this->session_data();
//        $data['title'] = "নতুন এফ.ডি.আর একাউন্ট খুলুন";
//        $this->load->model('add_member_model', 'amm');
//        $data['member'] = $this->amm->get_member();
//        $this->load->view('branch_manager/fdr_account', $data);
//    }

    public function save_fdr_account(){
        $this->session_data();
        // $this->load->model('fdr_account_model', 'fam');
        // $this->fam->save_fdr_account();
        $fdr_interest_percentage = floatval(str_replace(',', '', $this->input->post('fdr_interest')));
        $fdr_interest_decimal = $fdr_interest_percentage / 100;
        $fdr_amount = floatval(str_replace(',', '', $this->input->post('fdr_amount')));
        $fdr_monthly_interest = $fdr_interest_decimal*$fdr_amount;
        $fdr_yearly_interest = $fdr_monthly_interest * 12;

        $user_id = $this->session->userdata('user_id');

        $income_data = array(

            'fdr_amount' => $fdr_amount,
            'fdr_monthly_interest' => $fdr_monthly_interest,
            'fdr_yearly_interest' => $fdr_yearly_interest,
            'fdr_member_id'                   => $this->input->post('fdr_member_id'),
            'fdr_register_date'               => $this->input->post('fdr_register_date'),
            'fdr_target_year'                 => $this->input->post('fdr_target_year'),
            'fdr_interest'                    => $this->input->post('fdr_interest'),
            'fdr_interest_amount'             => $this->input->post('fdr_interest_amount'),
            'fdr_branch_id'             => $this->input->post('fdr_branch_id'),
            'fdr_status'                      => $this->input->post('fdr_status'),
            'fdr_created_at'                  => date('d-m-y h:i:s'),
            'fdr_created_by'                  => $user_id,

        );



        $this->db->insert('fdr_account', $income_data);






        $_SESSION['success'] = 'FDR Account Created Successfully.';
        redirect("branch_manager/fdr_account");
    }

    public function fdr_account_list(){
        $this->session_data();
        $data['title'] = "এফ.ডি.আর একাউন্ট লিস্ট";
        $this->load->model('fdr_account_model', 'fam');
        $user_id = $this->session->userdata('user_id');

        $data['fdrList'] = $this->fam->get_fdr_account_branch($user_id);
        $this->load->view('branch_manager/fdr_account_list', $data);
    }

    public function edit_fdr($id) {
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $data['data'] = $this->fam->get_fdr_id('fdr_account',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('branch_manager/edit_fdr', $data);

    }

    public function update_fdr(){
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $_SESSION['success'] = 'Updated Successfully.';
        $this->fam->update_fdr();

        redirect("branch_manager/fdr_account_list");
    }

    function fdr_delete($fdr_id) {
        $this->session_data();
        $fdr_id  = $this->uri->segment(3);
        $this->db->where('fdr_id', $fdr_id);
        $this->db->delete('fdr_account');
        $_SESSION['success'] = 'Member Deleted successfully.';
        redirect("branch_manager/fdr_account_list");
    }



    //End FDR account


    //Start DPS collection
//    public function dps_collection()
//    {
//        $this->session_data();
//        $data['title'] = "DPS Collection";
//        $this->load->model('dps_account_model', 'dam');
//
//        $user_id = $this->session->userdata('user_id');
//        $data['dps_account'] = $this->dam->get_member_dps_account_worker($user_id);
//
//        $this->load->view('branch_manager/dps_collection', $data);
//    }

    public function dps_collection_submit() {
        $this->session_data();
        $_SESSION['success'] = 'DPS Collected Successfully.';
        $this->load->model('dps_account_model', 'dam');
        $this->dam->dps_collection_submit();
        redirect("branch_manager/dps_collection");
    }

    public function dps_collection_list(){
        $this->session_data();
        $data['title'] = "ডিপিএস কালেকশন লিস্ট";
        $this->load->model('dps_account_model', 'dam');

        $user_id = $this->session->userdata('user_id');
        $data['dps_col'] = $this->dam->dps_collection_list_branch($user_id);
        $this->load->view('branch_manager/dps_collection_list', $data);
    }

    public function edit_dps_collection($id) {
        $this->session_data();
        $data['fdr_account'] = $this->dam->get_dps_account();
        $this->load->model('dps_account_model', 'dam');
        $data['data'] = $this->dam->get_dps_collection_id('dps_collection',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('branch_manager/edit_dps_collection', $data);
    }

    public function update_dps_collection(){
        $this->session_data();
        $_SESSION['success'] = 'DPS Collection Updated Successfully.';
        $this->load->model('dps_account_model', 'dam');
        $this->dam->dps_update_collection();
        redirect("branch_manager/dps_collection_list");
    }


    function delete_dps_collection($dps_col_id) {
        $this->session_data();

        // Fetch loans_id from the daily_loan_collection table based on $dlc_id
        $this->db->select('dps_collection.*');
        $this->db->where('dps_col_id', $dps_col_id);
        $query = $this->db->get('dps_collection');
        $row = $query->row();

        if ($row) {
            $loans_id = $row->dps_col_account_id;
            $dlc_amount = $row->dps_col_amount;

            // Fetch data from the loans table
            $this->db->select('dps_account.*');
            $this->db->where('dps_acc_id', $loans_id);
            $query = $this->db->get('dps_account');
            $row = $query->row();

            // Update the loans table with the new values
            $loan_amount_collection = $row->dps_acc_amount_collected - $dlc_amount;
            $loans_profit_installments = $row->dps_acc_installment + 1;

            $data = array(
                'dps_acc_amount_collected' => $loan_amount_collection,
                'dps_acc_installment' => $loans_profit_installments,
            );

            $this->db->where('dps_acc_id', $loans_id);
            $this->db->update('dps_account', $data);

            // Delete the row from the daily_loan_collection table
            $this->db->where('dps_col_id', $dps_col_id);
            $this->db->delete('dps_collection');

            $_SESSION['success'] = 'Deleted successfully.';
            redirect("branch_manager/dps_collection_list");
        } else {
            return "Not Successful, Try again";
        }
    }




    //END DPS Collection


    //DPS Report
    public function dps_report(){
        $this->session_data();
        $data['title'] = "ডিপিএস রিপোর্ট";
        $this->load->view('branch_manager/dps_report', $data);
    }

    public function dps_report_list(){
        $this->session_data();
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->load->model('dps_account_model', 'dam');
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['report'] = $this->dam->get_dps_data($startDate, $endDate);
        $data['title'] = "ডিপিএস রিপোর্ট";
        $this->load->view('branch_manager/dps_report_list', $data);
    }
    //End DPS Report


    //FDR Report Generate
//    public function fdr_interest(){
//        $this->session_data();
//        $data['title'] = "ইন্টারেস্ট প্রদান করুন";
//        $this->load->model('fdr_account_model', 'fam');
//        $data['fdr_interest'] = $this->fam->get_fdr_account_interest();
//        $this->load->view('branch_manager/fdr_interest', $data);
//    }

    public function interest_generate($id){
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $data['data'] = $this->fam->interest_generate('fdr_account',$id);
        $data['title'] = "ইন্টারেস্ট প্রদান করুন";
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('branch_manager/interest_generate', $data);
    }

    function save_interest_generate(){
        $this->session_data();
        $_SESSION['success'] = 'FDR Interest saved Successfully.';
        $this->load->model('fdr_account_model', 'fam');
        $this->fam->save_interest_generate();
        redirect("branch_manager/fdr_interest");
    }

    public function fdr_interest_list(){
        $this->session_data();
        $data['title'] = "ইন্টারেস্ট লিস্ট";
        $this->load->model('fdr_account_model', 'fam');
        $data['fdrInterestList'] = $this->fam->fdr_interest_list();
        $this->load->view('branch_manager/fdr_interest_list', $data);
    }

}




