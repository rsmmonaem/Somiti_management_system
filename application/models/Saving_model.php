<?php
ob_start();
class saving_model  extends CI_Model
{

// Create Notice
    function save_saving()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("sa_member_id", "sa_member_id", "xss_clean");
        $this->form_validation->set_rules("sa_plan_id", "sa_plan_id", "xss_clean");
        $this->form_validation->set_rules("sa_time_daywise", "sa_time_daywise", "xss_clean");
        $this->form_validation->set_rules("sa_total_year", "sa_total_year", "xss_clean");
        $this->form_validation->set_rules("sa_total_target", "sa_total_target", "xss_clean");
        $this->form_validation->set_rules("sa_opening_date", "sa_opening_date", "xss_clean");
        $this->form_validation->set_rules("sa_description", "sa_description", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('super_admin/company_list/error');

        } else {
            $user_id = $this->session->userdata('user_id');
            $data = array(
                'sa_member_id' => $this->input->post('sa_member_id'),
                'sa_plan_id' => $this->input->post('sa_plan_id'),
                'sa_time_daywise' => $this->input->post('sa_time_daywise'),
                'sa_total_year' => $this->input->post('sa_total_year'),
                'sa_total_target' => $this->input->post('sa_total_target'),
                'sa_opening_date' => $this->input->post('sa_opening_date'),
                'sa_branch_id' => $this->input->post('sa_branch_id'),
                'sa_status' => 'Active',
                'sa_created_by' => $user_id,
            );

            $this->db->insert('saving_account', $data);
        }
    }


    function update_saving()
    {

			$sa_id = $this->input->post('sa_id');
            $data = array(
                'sa_member_id' => $this->input->post('sa_member_id'),
                'sa_plan_id' => $this->input->post('sa_plan_id'),
                'sa_time_daywise' => $this->input->post('sa_time_daywise'),
                'sa_total_year' => $this->input->post('sa_total_year'),
                'sa_total_target' => $this->input->post('sa_total_target'),
                'sa_opening_date' => $this->input->post('sa_opening_date'),
           //     'sa_description' => $this->input->post('sa_description'),
                // 'sa_status' => 'Active',
            );
			$this->db->where('sa_id', $sa_id);
            $this->db->update('saving_account', $data);

    }


    public function save_saving_collection(){

        $loan_id = $this->input->post('dsc_saving_id');
        //   $dps_col_collect_date = $this->input->post('dps_col_collect_date');

        // Retrieve the current values of dps_acc_amount_collected and dps_acc_installment
        $this->db->select('sa_money_saving, sa_total_installments');
        $this->db->where('sa_id', $loan_id);
        $query = $this->db->get('saving_account');
        $row = $query->row();

        // Calculate the new values
        $loan_amount_collection = $row->sa_money_saving + $this->input->post('dsc_amount');
        $loans_profit_installments = $row->sa_total_installments + 1;

        // Update the dps_account table with the new values
        $data = array(
            'sa_money_saving' => $loan_amount_collection,
            'sa_total_installments' => $loans_profit_installments,
        );

        $this->db->where('sa_id', $loan_id);
        $this->db->update('saving_account', $data);

        $user_id = $this->session->userdata('user_id');
        // Insert the new data from the form into dps_account
        $data2 = array(
            'dsc_saving_id' => $this->input->post('dsc_saving_id'),
            'dsc_member_id' => $this->input->post('dsc_member_id'),
            'dsc_collect_date' => $this->input->post('dsc_collect_date'),
            'dsc_amount' => $this->input->post('dsc_amount'),
            'dsc_payment_type' => $this->input->post('dsc_payment_type'),
            'sa_plan_id' => $this->input->post('sa_plan_id'),
            'dsc_branch_id' => $this->input->post('dsc_branch_id'),
            'dsc_created_at' => date('Y-m-d H:i:s'),
            'dsc_created_by' => $user_id,
        );
        $this->db->insert('daily_saving_collection', $data2);
    }



    function update_saving_collection()
    {
        $dsc_id = $this->uri->segment(3);
        $loan_id = $this->input->post('dsc_saving_id');

        // Retrieve the current values of sa_money_saving and sa_total_installments
        $this->db->select('sa_money_saving, sa_total_installments');
        $this->db->where('sa_id', $loan_id);
        $query = $this->db->get('saving_account');
        $row = $query->row();

        // Retrieve the current values of dsc_amount and other data from daily_saving_collection
        $this->db->where('dsc_id', $dsc_id);
        $query = $this->db->get('daily_saving_collection');
        $dsc_row = $query->row();

        // Calculate new values for sa_money_saving
        $new_sa_money_saving = $row->sa_money_saving - $dsc_row->dsc_amount;

        // Update saving_account with the new sa_money_saving value
        $data = array(
            'sa_money_saving' => $new_sa_money_saving,
        );
        $this->db->where('sa_id', $loan_id);
        $this->db->update('saving_account', $data);

        // Update daily_saving_collection with the new data
        $new_data = array(
            'dsc_saving_id' => $this->input->post('dsc_saving_id'),
            'dsc_member_id' => $this->input->post('dsc_member_id'),
            'dsc_collect_date' => $this->input->post('dsc_collect_date'),
            'dsc_amount' => $this->input->post('dsc_amount'),
            'dsc_payment_type' => $this->input->post('dsc_payment_type'),
        );

        $this->db->where('dsc_id', $dsc_id);
        $this->db->update('daily_saving_collection', $new_data);

        // Calculate new values for sa_money_saving after the update
        $updated_sa_money_saving = $new_sa_money_saving + $this->input->post('dsc_amount');

        // Update saving_account with the updated sa_money_saving value
        $updated_data = array(
            'sa_money_saving' => $updated_sa_money_saving,
        );

        $this->db->where('sa_id', $loan_id);
        $this->db->update('saving_account', $updated_data);
    }



    function get_saving_account() {
		$this->db->select('member.*, saving_account.*');
		$this->db->from('saving_account');
		$this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
		$this->db->where('saving_account.sa_status', 'Active'); // Use where() instead of get_where()
		$this->db->order_by("saving_account.sa_member_id", "DESC");
		$query = $this->db->get(); // Remove 'get_where' and '()' after 'get'
		return $query->result();
	}

    function get_saving_account_worker($user_id) {
		$this->db->select('member.*, saving_account.*');
		$this->db->from('saving_account');
		$this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
		$this->db->where('saving_account.sa_status', 'Active');
		$this->db->order_by("saving_account.sa_member_id", "DESC");
        $this->db->where("saving_account.sa_created_by", $user_id);
		$query = $this->db->get();
		return $query->result();
	}



    function get_saving() {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_status", "Active");
        $this->db->order_by("saving_account.sa_plan_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    function get_saving_worker($user_id) {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_status", "Active");
        $this->db->where("saving_account.sa_created_by", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_saving_account_branch($user_id) {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_status", "Active");
        $this->db->where("saving_account.sa_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_member_saving($id) {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_member_id", $id);
        $query = $this->db->get();
        return $query->result();
    }



    function get_saving_by_id($sa_id)
    {
        $result = $this->db->get_where('saving_account', ['sa_id' => $sa_id])->row();
        return $result;
    }


    function get_collection_id($table, $id)
    {
        $result = $this->db->get_where($table, ['dsc_id' => $id])->row();
        return $result;
    }


   function get_saving_matured() {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_status", "Matured");
        $this->db->order_by("saving_account.sa_plan_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

	function get_saving_Active() {
        $this->db->select('saving_plan.*, member.*, saving_account.*');
        $this->db->from('saving_account');
        $this->db->join('saving_plan', 'saving_account.sa_plan_id = saving_plan.saving_plan_id', 'inner');
        $this->db->join('member', 'saving_account.sa_member_id = member.member_id', 'inner');
        $this->db->where("saving_account.sa_status", "Active");
        $this->db->order_by("saving_account.sa_plan_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    function get_daily_collection_list_worker($user_id){
		$this->db->order_by("dsc_id", "DESC");
		$this->db->where("dsc_created_by", $user_id);
		$query = $this->db->get("daily_saving_collection");
		return $query->result();
	}

	function get_daily_collection_list_branch($user_id){
		$this->db->order_by("dsc_id", "DESC");
		$this->db->where("dsc_branch_id", $user_id);
		$query = $this->db->get("daily_saving_collection");
		return $query->result();
	}

	function get_daily_collection_list(){
		$this->db->order_by("dsc_id", "DESC");
		$query = $this->db->get("daily_saving_collection");
		return $query->result();
	}

	public function getData($startDate, $endDate) {
		$this->db->where('dsc_collect_date >=', $startDate);
		$this->db->where('dsc_collect_date <=', $endDate);
		$query = $this->db->get('daily_saving_collection'); // Replace 'your_table_name' with your actual table name
		return $query->result();
	}


}
