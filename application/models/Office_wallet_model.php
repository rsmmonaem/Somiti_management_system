<?php
ob_start();
class office_wallet_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

	   function get_income() 
	   {
		$query = $this->db->select_sum('income_amount')->get('income');
		$result = $query->row();
		return $result->income_amount; 
		}

		function get_expense() 
		{
		 $query = $this->db->select_sum('expense_amount')->get('expense');
		 $result = $query->row();
		 return  $result->expense_amount;

		}

		 function get_assets() 
		{ 
		  $query = $this->db->select_sum('assets_buying_price')->get('assets');
		  $result = $query->row();
		  return $result->assets_buying_price;
		}
		  

		function get_total_loans() 
		{ 
		   $query = $this->db->select_sum('loans_amount')->get('loans');
		   $result = $query->row();
		   return $result->loans_amount;
		}

		function get_total_loans_collection() 
		{ 
		   $query = $this->db->select_sum('dlc_amount')->get('daily_loan_collection');
		   $result = $query->row();
		   return $result->dlc_amount;
		}

		function get_total_saving_collection() 
		{ 
		   $query = $this->db->select_sum('dsc_amount')->get('daily_saving_collection');
		   $result = $query->row();
		   return $result->dsc_amount;
		}

		function get_total_salary_paid() 
		{ 
		   $query = $this->db->select_sum('total_salary')->get('salary');
		   $result = $query->row();
		   return $result->total_salary;
		}

		function get_total_invest() 
		{ 
		   $query = $this->db->select_sum('invest_amount')->get('invest');
		   $result = $query->row();
		   return $result->invest_amount;
		}

}
