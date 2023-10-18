<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class account_admin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('text');
        $this->load->helper('date');
        $this->load->helper('form');

        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function session_data()
    {
        $this->load->library('session');
        $this->load->helper('text');
        $this->load->helper('date');
        $this->load->helper('form');

        $this->load->model('user_modification_model', 'umm');
        $this->load->model('add_member_model', 'amm');
        $this->load->model('add_member_model', 'amm');
        $this->load->model('saving_model', 'ssm');
        $this->load->model('add_savingplan_model', 'aspm');
        $this->load->model('new_assets_model', 'nsm');
        $this->load->model('page_model', 'pm');
        $this->load->model('somiti_income_model', 'sim');
        $this->load->model('dps_account_model', 'dam');
        $this->load->model('fdr_account_model', 'fam');
        if (!$this->session->userdata('user_name')) {
            redirect("login");
        }
    }






    public function scheme_list(){
        $this->session_data();
        $data['title'] = "স্কিম লিস্ট";
        $this->load->model('add_savingplan_model', 'aspm');
        $data['scheme'] = $this->aspm->get_plan();
        $this->load->view('super_admin/scheme_list', $data);
    }

    public function dps_plan(){
        $this->session_data();
        $data['title'] = "ডিপিএস প্লান";
        $this->load->view('super_admin/dps_plan', $data);
    }
    public function dps_plan_list(){
        $this->session_data();
        $data['title'] = "ডিপিএস প্লান লিস্ট";
        $this->load->model('dps_account_model', 'dam');
        $data['dps'] = $this->dam->get_dps_plan();
        $this->load->view('super_admin/dps_plan_list', $data);
    }

    public function edit_dps_plan($id) {
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $data['data'] = $this->dam->get_dps_plan_id('dps_plan',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('super_admin/edit_dps_plan', $data);
    }

    function dps_plan_delete($dps_plan_id) {
        $this->session_data();
        $dps_plan_id  = $this->uri->segment(3);
        $this->db->where('dps_plan_id', $dps_plan_id);
        $this->db->delete('dps_plan');
        $_SESSION['success'] = 'Deleted successfully.';
        redirect("account_admin/dps_plan_list");
    }

    public function dps_account(){
        $this->session_data();
        $data['title'] = "ডিপিএস একাউন্ট খুলুন";

        $this->load->view('super_admin/dps_account', $data);
    }

     public function dps_account_list(){
        $this->session_data();
        $data['title'] = "ডিপিএস একাউন্ট খুলুন";
        $this->load->model('dps_account_model', 'dam');
        $data['account'] = $this->dam->get_member_dps_account();
        $this->load->view('super_admin/dps_account_list', $data);
    }

    function dps_delete($dps_acc_id) {
        $this->session_data();
        $dps_acc_id  = $this->uri->segment(3);
        $this->db->where('dps_acc_id', $dps_acc_id);
        $this->db->delete('dps_account');
        $_SESSION['success'] = 'Deleted successfully.';
        redirect("account_admin/dps_account_list");
    }

    public function edit_dps_account($id) {
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $data['data'] = $this->dam->get_dps_id('dps_account',$id);
        $data['title'] = "আপডেট করুন";
        $data['dps'] = $this->dam->get_dps_plan();
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('super_admin/edit_dps_account', $data);
    }

    public function update_dps_plan(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->update_main_dps_plan();
        $_SESSION['success'] = 'Updated successfully.';
        redirect("account_admin/dps_plan_list");
    }


    public function new_dps_account(){
        $this->session_data();
        $data['title'] = "নতুন ডিপিএস একাউন্ট খুলুন";
        $data['dps'] = $this->dam->get_dps_plan();
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('super_admin/new_dps_account', $data);
    }


    public function save_dps_account(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->save_dps_account();
        $_SESSION['success'] = 'DPS Account Created Successfully.';
        redirect("account_admin/new_dps_account");
    }

    public function save_dps_plan(){
        $this->session_data();
        $this->load->model('dps_account_model', 'dam');
        $this->dam->save_dps_plan();
        $_SESSION['success'] = 'DPS Plan Created successfully.';
        redirect("account_admin/dps_plan");
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
    public function fdr_account(){
        $this->session_data();
        $data['title'] = "নতুন এফ.ডি.আর একাউন্ট খুলুন";
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('super_admin/fdr_account', $data);
    }

    public function save_fdr_account(){
        $this->session_data();
        // $this->load->model('fdr_account_model', 'fam');
        // $this->fam->save_fdr_account();		
        $fdr_interest_percentage = floatval(str_replace(',', '', $this->input->post('fdr_interest')));
        $fdr_interest_decimal = $fdr_interest_percentage / 100;
        $fdr_amount = floatval(str_replace(',', '', $this->input->post('fdr_amount')));
        $fdr_monthly_interest = $fdr_interest_decimal*$fdr_amount;
        $fdr_yearly_interest = $fdr_monthly_interest * 12;

		$income_data = array(
			
			'fdr_amount' => $fdr_amount,
			'fdr_monthly_interest' => $fdr_monthly_interest,
			'fdr_yearly_interest' => $fdr_yearly_interest,
			'fdr_member_id'                   => $this->input->post('fdr_member_id'),
            'fdr_register_date'               => $this->input->post('fdr_register_date'),
            'fdr_target_year'                 => $this->input->post('fdr_target_year'),
            'fdr_interest'                    => $this->input->post('fdr_interest'),
            'fdr_interest_amount'             => $this->input->post('fdr_interest_amount'),
            'fdr_status'                      => $this->input->post('fdr_status'),
            'fdr_created_at'                  => date('d-m-y h:i:s'),

		);

		

		$this->db->insert('fdr_account', $income_data);
		





        $_SESSION['success'] = 'FDR Account Created Successfully.';
        redirect("account_admin/fdr_account");
    }
    public function fdr_account_list(){
        $this->session_data();
        $data['title'] = "এফ.ডি.আর একাউন্ট লিস্ট";
        $this->load->model('fdr_account_model', 'fam');
        $data['fdrList'] = $this->fam->get_fdr_account();
        $this->load->view('super_admin/fdr_account_list', $data);
    }
    public function edit_fdr($id) {
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $data['data'] = $this->fam->get_fdr_id('fdr_account',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('super_admin/edit_fdr', $data);

    }

    public function update_fdr(){
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $_SESSION['success'] = 'Updated Successfully.';
        $this->fam->update_fdr();

        redirect("account_admin/fdr_account_list");
    }

    function fdr_delete($fdr_id) {
        $this->session_data();
        $fdr_id  = $this->uri->segment(3);
        $this->db->where('fdr_id', $fdr_id);
        $this->db->delete('fdr_account');
        $_SESSION['success'] = 'Member Deleted successfully.';
        redirect("account_admin/fdr_account_list");
    }



    //End FDR account


    //Start DPS collection
    public function dps_collection()
    {
        $this->session_data();
        $data['title'] = "DPS Collection";
        $this->load->model('dps_account_model', 'dam');
        $data['fdr_account'] = $this->dam->get_dps_account();
        $this->load->view('super_admin/dps_collection', $data);
    }

    public function dps_collection_submit() {
        $this->session_data();
        $_SESSION['success'] = 'DPS Collected Successfully.';
        $this->load->model('dps_account_model', 'dam');
        $this->dam->dps_collection_submit();
        redirect("account_admin/dps_collection");
    }

    public function dps_collection_list(){
        $this->session_data();
        $data['title'] = "ডিপিএস কালেকশন লিস্ট";
        $this->load->model('dps_account_model', 'dam');
        $data['dps_col'] = $this->dam->dps_collection_list();
        $this->load->view('super_admin/dps_collection_list', $data);
    }

    public function edit_dps_collection($id) {
        $this->session_data();
        $data['fdr_account'] = $this->dam->get_dps_account();
        $this->load->model('dps_account_model', 'dam');
        $data['data'] = $this->dam->get_dps_collection_id('dps_collection',$id);
        $data['title'] = "আপডেট করুন";
        $this->load->view('super_admin/edit_dps_collection', $data);
    }
    public function update_dps_collection(){
        $this->session_data();
        $_SESSION['success'] = 'DPS Collection Updated Successfully.';
        $this->load->model('dps_account_model', 'dam');
        $this->dam->dps_update_collection();
        redirect("account_admin/dps_collection_list");


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
            redirect("account_admin/dps_collection_list");
        } else {
            return "Not Successful, Try again";
        }
    }




    //END DPS Collection


    //DPS Report
    public function dps_report(){
        $this->session_data();
        $data['title'] = "ডিপিএস রিপোর্ট";
        $this->load->view('super_admin/dps_report', $data);
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
        $this->load->view('super_admin/dps_report_list', $data);
    }
    //End DPS Report


    //FDR Report Generate
    public function fdr_interest(){
        $this->session_data();
        $data['title'] = "ইন্টারেস্ট প্রদান করুন";
        $this->load->model('fdr_account_model', 'fam');
        $data['fdr_interest'] = $this->fam->get_fdr_account_interest();
        $this->load->view('super_admin/fdr_interest', $data);
    }

    public function interest_generate($id){
        $this->session_data();
        $this->load->model('fdr_account_model', 'fam');
        $data['data'] = $this->fam->interest_generate('fdr_account',$id);
        $data['title'] = "ইন্টারেস্ট প্রদান করুন";
        $this->load->model('add_member_model', 'amm');
        $data['member'] = $this->amm->get_member();
        $this->load->view('super_admin/interest_generate', $data);
    }

    function save_interest_generate(){
        $this->session_data();
        $_SESSION['success'] = 'FDR Interest saved Successfully.';
        $this->load->model('fdr_account_model', 'fam');
        $this->fam->save_interest_generate();
        redirect("account_admin/fdr_interest");
    }

    public function fdr_interest_list(){
        $this->session_data();
        $data['title'] = "ইন্টারেস্ট লিস্ট";
        $this->load->model('fdr_account_model', 'fam');
        $data['fdrInterestList'] = $this->fam->fdr_interest_list();
        $this->load->view('super_admin/fdr_interest_list', $data);
    }

    //End FDR report generate









































}
