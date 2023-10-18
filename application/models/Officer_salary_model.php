<?php
ob_start();
class officer_salary_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function save_salary() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("salary_officer_id", "salary_officer_id", "xss_clean");
        $this->form_validation->set_rules("salary_amount", "salary_amount", "xss_clean");
        $this->form_validation->set_rules("salary_date", "salary_date", "xss_clean");
        $this->form_validation->set_rules("salary_month", "salary_month", "xss_clean");
        $this->form_validation->set_rules("salary_bonus", "salary_bonus", "xss_clean");
        $this->form_validation->set_rules("total_salary", "total_salary", "xss_clean");
        $this->form_validation->set_rules("salary_paid_type", "salary_paid_type", "xss_clean");
		$this->form_validation->set_rules("selected_officer_name", "selected_officer_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {

        } else {
			function generateUniquePfId() {
				$pf_id = uniqid('pf_');
				return $pf_id;
			}
			$salary_fid = generateUniquePfId();
            $data = array(
				'salary_id'                  => $salary_fid,
                'salary_officer_id'          => $this->input->post('salary_officer_id'),
                'salary_amount'               => $this->input->post('salary_amount'),
				'provident_percent'               => $this->input->post('provident_percent'),
				'totalpf'                  => $this->input->post('totalpf'),
                'salary_date'                   => $this->input->post('salary_date'),
                'salary_month'               => $this->input->post('salary_month'),
                'salary_bonus'             => $this->input->post('salary_bonus'),
                'salary_paid_type' 	  => $this->input->post('salary_paid_type'),
                'total_salary' 			   => $this->input->post('total_salary'),
                'salary_created_by'     => $this->session->userdata('user_id'),

            );

			// $provident_fund = array(

			// 	'salary_fid'                  => $salary_fid,
            //     'salary_officer_id'          => $this->input->post('salary_officer_id'),
            //     'salary_amount'               => $this->input->post('salary_amount'),
			// 	'provident_percent'               => $this->input->post('provident_percent'),
			// 	'totalpf'                   => $this->input->post('totalpf'),
            //     'total_salary' 			    => $this->input->post('total_salary'),
			// 	'salary_month'                => $this->input->post('salary_month'),
			// 	'salary_date'                   => $this->input->post('salary_date'),
            // );

			$expence = array(
                'expense_name'          => $this->input->post('selected_officer_name'),
				'expense_type' 			=> 'Sallary',
				'expense_amount' 			    => $this->input->post('total_salary'),
				'expense_payment_type' 			    => $this->input->post('salary_paid_type'),
                'expense_date'                   => $this->input->post('salary_date'),
                'expense_description' => 'অফিসারের বেতন',

            );
            $this->db->insert('salary', $data);
			// $this->db->insert('provident_fund', $provident_fund);
			$this->db->insert('expense', $expence);




        }
    }
    function get_salary() {
        $this->db->order_by("salary_id", "DESC");
        $query = $this->db->get("salary");
        return $query->result();
    }
    function get_salary_manager($user_id) {
        $this->db->order_by("salary_id", "DESC");
        $this->db->where("salary_created_by", $user_id);
        $query = $this->db->get("salary");
        return $query->result();
    }

	public function getData($startDate, $endDate) {
		$this->db->where('salary_date >=', $startDate);
		$this->db->where('salary_date <=', $endDate);
		$query = $this->db->get('salary'); // Replace 'your_table_name' with your actual table name
		return $query->result();
	}

//    function get_assets() {
//        $this->db->order_by("assets_id", "DESC");
//        $query = $this->db->get("assets");
//        return $query->result();
//    }





}
