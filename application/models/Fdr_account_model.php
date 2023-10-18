<?php
ob_start();
class fdr_account_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function save_fdr_account() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fdr_member_id", "fdr_member_id", "xss_clean");
        $this->form_validation->set_rules("fdr_amount", "fdr_amount", "xss_clean");
        $this->form_validation->set_rules("fdr_register_date", "fdr_register_date", "xss_clean");
        $this->form_validation->set_rules("fdr_target_year", "fdr_target_year", "xss_clean");
        $this->form_validation->set_rules("fdr_interest", "fdr_interest", "xss_clean");
        $this->form_validation->set_rules("fdr_interest_amount", "fdr_interest_amount", "xss_clean");
        $this->form_validation->set_rules("fdr_status", "fdr_status", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $data = array(
                'fdr_member_id'                   => $this->input->post('fdr_member_id'),
                'fdr_amount'                      => $this->input->post('fdr_amount'),
                'fdr_register_date'               => $this->input->post('fdr_register_date'),
                'fdr_target_year'                 => $this->input->post('fdr_target_year'),
                'fdr_interest'                    => $this->input->post('fdr_interest'),
                'fdr_interest_amount'             => $this->input->post('fdr_interest_amount'),
                'fdr_branch_id'                   => $this->input->post('fdr_branch_id'),
                'fdr_status'                      => $this->input->post('fdr_status'),
                'fdr_interest_date_given'         => date('Y-m-d'),
                'fdr_created_at'                  => date('Y-m-d H:i:s'),
            );

            $this->db->insert('fdr_account', $data);

        }
    }

    function get_fdr_account() {
        $this->db->select('fdr_account.*, member.*');
        $this->db->from('fdr_account');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
        $this->db->order_by("fdr_account.fdr_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    function get_fdr_account_worker($user_id) {
        $this->db->select('fdr_account.*, member.*');
        $this->db->from('fdr_account');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
        $this->db->order_by("fdr_account.fdr_id", "DESC");
        $this->db->where("fdr_account.fdr_created_by", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_fdr_account_branch($user_id) {
        $this->db->select('fdr_account.*, member.*');
        $this->db->from('fdr_account');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
        $this->db->order_by("fdr_account.fdr_id", "DESC");
        $this->db->where("fdr_account.fdr_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

//    function get_fdr_member_account($id) {
//        $this->db->select('fdr_account.*, member.*');
//        $this->db->from('fdr_account');
//        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
//        $this->db->order_by("fdr_account.fdr_member_id", $id);
//        $query = $this->db->get();
//        return $query->result();
//    }


    public function get_fdr_member_account($id) {
        $this->db->select('fdr_account.*, member.*');
        $this->db->from('fdr_account');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'left');
        $this->db->where("fdr_account.fdr_member_id", $id);
        $query = $this->db->get();
        return $query->result();
    }




    function get_fdr_id($table, $id)
    {
        $result = $this->db->get_where($table, ['fdr_id' => $id])->row();
        return $result;
    }


    function update_fdr() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fdr_member_id", "fdr_member_id", "xss_clean");
        $this->form_validation->set_rules("fdr_amount", "fdr_amount", "xss_clean");
        $this->form_validation->set_rules("fdr_register_date", "fdr_register_date", "xss_clean");
        $this->form_validation->set_rules("fdr_target_year", "fdr_target_year", "xss_clean");
        $this->form_validation->set_rules("fdr_interest", "fdr_interest", "xss_clean");
        $this->form_validation->set_rules("fdr_interest_amount", "fdr_interest_amount", "xss_clean");
        $this->form_validation->set_rules("fdr_status", "fdr_status", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            //insert data to database

            $fdr_id = $this->input->post('fdr_id');

            $data = array(
                'fdr_member_id'                => $this->input->post('fdr_member_id'),
                'fdr_amount'                   => $this->input->post('fdr_amount'),
                'fdr_register_date'            => $this->input->post('fdr_register_date'),
                'fdr_target_year'              => $this->input->post('fdr_target_year'),
                'fdr_interest'                 => $this->input->post('fdr_interest'),
                'fdr_interest_amount'          => $this->input->post('fdr_interest_amount'),
                'fdr_status'                   => $this->input->post('fdr_status'),
                'fdr_interest_date_given'                      => date('Y-m'),
            );

            $this->db->where('fdr_id', $fdr_id);
            $this->db->update('fdr_account', $data);

        }
    }

	public function getData($startDate, $endDate) {
		$this->db->where('fdr_register_date >=', $startDate);
		$this->db->where('fdr_register_date <=', $endDate);
		$query = $this->db->get('fdr_account'); // Replace 'your_table_name' with your actual table name
		return $query->result();
	}


	// Interest Money Generate


    public function get_fdr_account_interest() {
      $this_month = date('Y-m');
      //  $previous_month = date('Y-m', strtotime($this_month . ' -1 month'));

        $this->db->select('fdr_account.*, member.*');
        $this->db->from('fdr_account');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
        $this->db->order_by("fdr_account.fdr_interest_date_given", !$this_month);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Return an empty array if no results are found.
        }
    }

    function interest_generate($table, $id)
    {
        $result = $this->db->get_where($table, ['fdr_id' => $id])->row();
        return $result;
    }

    function save_interest_generate(){
        $fdr_account_id = $this->input->post('fdr_id');


        $this->db->select('fdr_account.*');
        $this->db->where('fdr_id', $fdr_account_id);
        $query = $this->db->get('fdr_account');
        $row = $query->row();

        $fdr_interest_amount = $row->fdr_interest_amount + $this->input->post('fdr_interest_amount');

        $data = array(
            'fdr_interest_amount' => $fdr_interest_amount,
            'fdr_interest_date_given' => $this->input->post('fdr_interest_date_given'),
        );

        $this->db->where('fdr_id', $fdr_account_id);
        $this->db->update('fdr_account', $data);

        $data2 = array(
            'fdr_int_acc_id' => $fdr_account_id,
            'fdr_int_month' => $this->input->post('fdr_interest_date_given'),
            'fdr_int_amount' => $this->input->post('fdr_interest_amount'),
            'fdr_int_date' => $this->input->post('fdr_int_date'),
            'fdr_int_created_at' => date('d-m-y h:i:s'),
        );

        $this->db->insert('fdr_interest', $data2);
    }

    public function fdr_interest_list() {
        $this->db->select('fdr_interest.*, fdr_account.*, member.*');
        $this->db->from('fdr_interest');
        $this->db->join('fdr_account', 'fdr_account.fdr_id = fdr_interest.fdr_int_acc_id', 'inner');
        $this->db->join('member', 'member.member_id = fdr_account.fdr_member_id', 'inner');
        $this->db->order_by("fdr_interest.fdr_int_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }






}
