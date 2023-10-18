<?php
ob_start();
class dps_account_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function save_dps_plan() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("dps_plan_name", "dps_plan_name", "xss_clean");
        $this->form_validation->set_rules("dps_plan_installment", "dps_plan_installment", "xss_clean");
        $this->form_validation->set_rules("dps_plan_amount", "dps_plan_amount", "xss_clean");
        $this->form_validation->set_rules("dps_plan_interest", "dps_plan_interest", "xss_clean");
        $this->form_validation->set_rules("dps_plan_pay_type", "dps_plan_pay_type", "xss_clean");
        $this->form_validation->set_rules("dps_plan_status", "dps_plan_status", "xss_clean");
        $this->form_validation->set_rules("dps_plan_image", "dps_plan_image", "xss_clean");
        $this->form_validation->set_rules("dps_plan_main_amount", "dps_plan_main_amount", "xss_clean");
        $this->form_validation->set_rules("dps_plan_total_amount", "dps_plan_total_amount", "xss_clean");

        if ($this->form_validation->run() == FALSE) {

        } else {
            $dps_plan_image = $_FILES['dps_plan_image']['name'];
            if ($dps_plan_image != "") {
                $dps_plan_image = random_string('alnum', 10) . '.jpg';

                //insert image
                $config['file_name'] = $dps_plan_image;
                $config['upload_path'] = 'uploads/dps_plan';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '100000';
                $config['encrypt_name'] = false;
                $config['image_library'] = 'gd2';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('dps_plan_image');

                $file_data = $this->upload->data();
            } else {
                $dps_plan_image = "default.png";
            }

            $data = array(
                'dps_plan_name'                     => $this->input->post('dps_plan_name'),
                'dps_plan_main_amount'              => $this->input->post('dps_plan_main_amount'),
                'dps_plan_installment'              => $this->input->post('dps_plan_installment'),
                'dps_plan_amount'                   => $this->input->post('dps_plan_amount'),
                'dps_plan_interest'                 => $this->input->post('dps_plan_interest'),
                'dps_plan_pay_type'                 => $this->input->post('dps_plan_pay_type'),
                'dps_plan_status'                   => $this->input->post('dps_plan_status'),
                'dps_plan_total_amount'             => $this->input->post('dps_plan_total_amount'),
                'dps_plan_image'                    => $dps_plan_image,
                'dps_plan_create_at'                => date('Y-m-d H:i:s'),
            );

            $this->db->insert('dps_plan', $data);

        }
    }

    function save_dps_account() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("dps_acc_plan_id", "dps_acc_plan_id", "xss_clean");
        $this->form_validation->set_rules("dps_acc_member_id", "dps_acc_member_id", "xss_clean");
        $this->form_validation->set_rules("dps_acc_reg_date", "dps_acc_reg_date", "xss_clean");
        $this->form_validation->set_rules("dps_acc_amount", "dps_acc_amount", "xss_clean");
		$this->form_validation->set_rules("dps_acc_total_amount", "dps_acc_total_amount", "xss_clean");
		$this->form_validation->set_rules("dps_acc_main_amount", "dps_acc_main_amount", "xss_clean");
        $this->form_validation->set_rules("dps_acc_installment", "dps_acc_installment", "xss_clean");
        $this->form_validation->set_rules("dps_acc_status", "dps_acc_status", "xss_clean");


        if ($this->form_validation->run() == FALSE) {

        } else {

            $user_id = $this->session->userdata('user_id');

            $data = array(
                'dps_acc_plan_id'                     => $this->input->post('dps_acc_plan_id'),
                'dps_acc_member_id'                    => $this->input->post('dps_acc_member_id'),
                'dps_acc_reg_date'                  => $this->input->post('dps_acc_reg_date'),
                'dps_acc_amount'                    => $this->input->post('dps_acc_amount'),
                'dps_acc_installment'              => $this->input->post('dps_acc_installment'),
                'dps_acc_total_amount'               => $this->input->post('dps_acc_total_amount'),
                'dps_acc_main_amount'               => $this->input->post('dps_acc_main_amount'),
                'dps_acc_status'               => $this->input->post('dps_acc_status'),
                'dps_acc_branch_id'               => $this->input->post('dps_acc_branch_id'),
                'dps_acc_created_at'               => date('Y-m-d H:i:s'),
                'dps_acc_created_by'               => $user_id,
            );

            $this->db->insert('dps_account', $data);

        }
    }

    function get_dps_plan() {
        $this->db->order_by("dps_plan_id", "DESC");
        $query = $this->db->get("dps_plan");
        return $query->result();
    }



    public function getDpsPlanAmount($dpsPlanId) {
        // Replace 'your_table_name' with the actual table name in your database
        $this->db->select('dps_plan_total_amount');
        $this->db->where('dps_plan_id', $dpsPlanId);
        $query = $this->db->get('dps_plan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dps_plan_total_amount;
        } else {
            return 0; // Default value if DPS plan is not found
        }
    }

	public function getDpsAmount($dpsPlanId) {
        // Replace 'your_table_name' with the actual table name in your database
        $this->db->select('dps_plan_amount');
        $this->db->where('dps_plan_id', $dpsPlanId);
        $query = $this->db->get('dps_plan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dps_plan_amount;
        } else {
            return 0; // Default value if DPS plan is not found
        }
    }

    public function getDpsMainAmount($dpsPlanId) {
        // Replace 'your_table_name' with the actual table name in your database
        $this->db->select('dps_plan_main_amount');
        $this->db->where('dps_plan_id', $dpsPlanId);
        $query = $this->db->get('dps_plan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dps_plan_main_amount;
        } else {
            return 0; // Default value if DPS plan is not found
        }
    }
    public function getInstallment($dpsPlanId) {
        // Replace 'your_table_name' with the actual table name in your database
        $this->db->select('dps_plan_installment');
        $this->db->where('dps_plan_id', $dpsPlanId);
        $query = $this->db->get('dps_plan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dps_plan_installment;
        } else {
            return 0; // Default value if DPS plan is not found
        }
    }

    public function get_member_dps_account() {
        $this->db->select('dps_account.*, dps_plan.*, member.*');
        $this->db->from('dps_account');
        $this->db->join('dps_plan', 'dps_plan.dps_plan_id = dps_account.dps_acc_plan_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_account.dps_acc_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_member_dps_account_worker($user_id) {
        $this->db->select('dps_account.*, dps_plan.*, member.*');
        $this->db->from('dps_account');
        $this->db->join('dps_plan', 'dps_plan.dps_plan_id = dps_account.dps_acc_plan_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_account.dps_acc_id", "DESC");
        $this->db->where("dps_account.dps_acc_created_by", $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_member_dps_account_branch($user_id) {
        $this->db->select('dps_account.*, dps_plan.*, member.*');
        $this->db->from('dps_account');
        $this->db->join('dps_plan', 'dps_plan.dps_plan_id = dps_account.dps_acc_plan_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_account.dps_acc_id", "DESC");
        $this->db->where("dps_account.dps_acc_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

//    public function get_member_loans_collections() {
//        $this->db->select('dps_account.*, dps_plan.*, member.*');
//        $this->db->from('dps_account');
//        $this->db->join('loans', 'loans.loans_id = daily_loan_collection.dlc_loans_id', 'inner');
//        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
//        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
//        $query = $this->db->get();
//        return $query->result();
//    }




    function get_dps_id($table, $id)
    {
        $result = $this->db->get_where($table, ['dps_acc_id' => $id])->row();
        return $result;
    }

    function get_dps_plan_id($table, $id)
    {
        $result = $this->db->get_where($table, ['dps_plan_id' => $id])->row();
        return $result;
    }
    function get_dps_collection_id($table, $id)
    {
        $result = $this->db->get_where($table, ['dps_col_id' => $id])->row();
        return $result;
    }

   function update_dps_plan() {
        $this->load->library("form_validation");
       $this->form_validation->set_rules("dps_acc_plan_id", "dps_acc_plan_id", "xss_clean");
       $this->form_validation->set_rules("dps_acc_member_id", "dps_acc_member_id", "xss_clean");
       $this->form_validation->set_rules("dps_acc_reg_date", "dps_acc_reg_date", "xss_clean");
       $this->form_validation->set_rules("dps_acc_amount", "dps_acc_amount", "xss_clean");
       $this->form_validation->set_rules("dps_acc_total_amount", "dps_acc_total_amount", "xss_clean");
       $this->form_validation->set_rules("dps_acc_status", "dps_acc_status", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            //insert data to database

            $assets_id = $this->uri->segment(3);

            $data = array(
                'dps_acc_plan_id'                     => $this->input->post('dps_acc_plan_id'),
                'dps_acc_member_id'                    => $this->input->post('dps_acc_member_id'),
                'dps_acc_reg_date'              => $this->input->post('dps_acc_reg_date'),
                'dps_acc_amount'             => $this->input->post('dps_acc_amount'),
                //   'dps_acc_pmt_date'              => $this->input->post('dps_acc_pmt_date'),
                'dps_acc_total_amount'               => $this->input->post('dps_acc_total_amount'),
                'dps_acc_status'               => $this->input->post('dps_acc_status'),
                'dps_acc_created_at'               => date('Y-m-d H:i:s'),
            );

            $this->db->where('dps_acc_id', $assets_id);
            $this->db->update('dps_account', $data);
        }
    }


    public function dps_collection_submit(){

        $dps_col_account_id = $this->input->post('dps_col_account_id');
        $dps_col_collect_date = $this->input->post('dps_col_collect_date');

        // Retrieve the current values of dps_acc_amount_collected and dps_acc_installment
        $this->db->select('dps_acc_amount_collected, dps_acc_installment');
        $this->db->where('dps_acc_id', $dps_col_account_id);
        $query = $this->db->get('dps_account');
        $row = $query->row();

        // Calculate the new values
        $new_dps_acc_amount_collected = $row->dps_acc_amount_collected + $this->input->post('dps_col_amount') ;
        $new_dps_acc_installment = $row->dps_acc_installment - 1;

        // Update the dps_account table with the new values
        $data = array(
            'dps_acc_amount_collected' => $new_dps_acc_amount_collected,
            'dps_acc_installment' => $new_dps_acc_installment,
        );

        $this->db->where('dps_acc_id', $dps_col_account_id);
        $this->db->update('dps_account', $data);



        $user_id = $this->session->userdata('user_id');


        // Insert the new data from the form into dps_account
        $data2 = array(
            'dps_col_account_id' => $dps_col_account_id,
            'dps_col_collect_date' => $dps_col_collect_date,
            'dps_col_amount' => $this->input->post('dps_col_amount'),
            'dps_col_payment_type' => $this->input->post('dps_col_payment_type'),
            'dps_col_member_id' => $this->input->post('dps_col_member_id'),
            'dps_col_branch_id' => $this->input->post('dps_col_branch_id'),
            'dps_col_created_at' => date('d-m-y h:i:s'),
            'dps_col_created_by' => $user_id,
        );
        $this->db->insert('dps_collection', $data2);
    }



    public function dps_collection_list() {
        $this->db->select('dps_collection.*, dps_account.*, member.*');
        $this->db->from('dps_collection');
        $this->db->join('dps_account', 'dps_account.dps_acc_id = dps_collection.dps_col_account_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_collection.dps_col_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function dps_collection_list_worker($user_id) {
        $this->db->select('dps_collection.*, dps_account.*, member.*');
        $this->db->from('dps_collection');
        $this->db->join('dps_account', 'dps_account.dps_acc_id = dps_collection.dps_col_account_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_collection.dps_col_id", "DESC");
        $this->db->where("dps_collection.dps_col_created_by", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function dps_collection_list_branch($user_id) {
        $this->db->select('dps_collection.*, dps_account.*, member.*');
        $this->db->from('dps_collection');
        $this->db->join('dps_account', 'dps_account.dps_acc_id = dps_collection.dps_col_account_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_collection.dps_col_id", "DESC");
        $this->db->where("dps_collection.dps_col_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_dps_account() {
        $this->db->select('dps_account.*, member.*');
        $this->db->from('dps_account');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_account.dps_acc_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }



    public function get_dps_data($startDate, $endDate) {
        $this->db->select('dps_collection.*, dps_account.*, member.*');
        $this->db->from('dps_collection');
        $this->db->join('dps_account', 'dps_account.dps_acc_id = dps_collection.dps_col_account_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->where('dps_col_collect_date BETWEEN ' . $this->db->escape($startDate) . ' AND ' . $this->db->escape($endDate));
        $query = $this->db->get();
        return $query->result();
    }



    function update_main_dps_plan() {

        $this->load->library("form_validation");
        $this->form_validation->set_rules("dps_plan_name", "dps_plan_name", "xss_clean");
        $this->form_validation->set_rules("dps_plan_installment", "dps_plan_installment", "xss_clean");
        $this->form_validation->set_rules("dps_plan_amount", "dps_plan_amount", "xss_clean");
        $this->form_validation->set_rules("dps_plan_interest", "dps_plan_interest", "xss_clean");
        $this->form_validation->set_rules("dps_plan_pay_type", "dps_plan_pay_type", "xss_clean");
        $this->form_validation->set_rules("dps_plan_status", "dps_plan_status", "xss_clean");
        $this->form_validation->set_rules("dps_plan_image", "dps_plan_image", "xss_clean");
        $this->form_validation->set_rules("dps_plan_main_amount", "dps_plan_main_amount", "xss_clean");
        $this->form_validation->set_rules("dps_plan_total_amount", "dps_plan_total_amount", "xss_clean");

        if ($this->form_validation->run() != FALSE) {
            echo  $this->upload->display_errors();
            // echo"hi";
        } else {

            $dps_plan_image = $_FILES['dps_plan_image']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image');


            if ($dps_plan_image != "") {
                $dps_plan_image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $dps_plan_image;
                $config['upload_path']      = 'uploads/dps_plan';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('dps_plan_image');

                $file_data = $this->upload->data();
            } else {
                $dps_plan_image = $prev_image;
            }


            //insert data to database
            $dps_plan_id = $this->input->post('dps_plan_id');

            $data = array(
                'dps_plan_name'                     => $this->input->post('dps_plan_name'),
                'dps_plan_main_amount'                     => $this->input->post('dps_plan_main_amount'),
                'dps_plan_installment'                    => $this->input->post('dps_plan_installment'),
                'dps_plan_amount'              => $this->input->post('dps_plan_amount'),
                'dps_plan_interest'             => $this->input->post('dps_plan_interest'),
                'dps_plan_pay_type'              => $this->input->post('dps_plan_pay_type'),
                'dps_plan_status'               => $this->input->post('dps_plan_status'),
                'dps_plan_total_amount'               => $this->input->post('dps_plan_total_amount'),
                'dps_plan_image'               => $dps_plan_image,
            );


            $this->db->where('dps_plan_id', $dps_plan_id);
            $this->db->update('dps_plan', $data);
        }
    }


    public function dps_profile_details($id) {
        $this->db->select('dps_account.*, dps_plan.*, member.*');
        $this->db->from('dps_account');
        $this->db->join('dps_plan', 'dps_plan.dps_plan_id = dps_account.dps_acc_plan_id', 'left');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'left');
        $this->db->where('dps_account.dps_acc_member_id', $id);
        $query = $this->db->get();
        return $query->result();
    }



    public function dps_collection_profile_details_test($id) {
        $this->db->select('dps_collection.*, dps_account.*, member.*');
        $this->db->from('dps_collection');
        $this->db->join('dps_account', 'dps_account.dps_acc_id = dps_collection.dps_col_account_id', 'inner');
        $this->db->join('member', 'member.member_id = dps_account.dps_acc_member_id', 'inner');
        $this->db->order_by("dps_collection.dps_col_id", "DESC");
        $this->db->where('dps_collection.dps_col_member_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function dps_update_collection()
    {
        $dsc_id = $this->uri->segment(3);
        $loan_id = $this->input->post('dps_col_account_id');

        // Retrieve the current values of sa_money_saving and sa_total_installments
        $this->db->select('dps_account.*,');
        $this->db->where('dps_acc_id', $loan_id);
        $query = $this->db->get('dps_account');
        $row = $query->row();

        // Retrieve the current values of dsc_amount and other data from daily_saving_collection
        $this->db->where('dps_col_id', $dsc_id);
        $query = $this->db->get('dps_collection');
        $dsc_row = $query->row();

        // Calculate new values for sa_money_saving
        $new_sa_money_saving = $row->dps_acc_amount_collected - $dsc_row->dps_col_amount;

        // Update saving_account with the new sa_money_saving value
        $data = array(
            'dps_acc_amount_collected' => $new_sa_money_saving,
        );
        $this->db->where('dps_acc_id', $loan_id);
        $this->db->update('dps_account', $data);

        // Update daily_saving_collection with the new data
        $new_data = array(
            'dps_col_account_id' => $this->input->post('dps_col_account_id'),
            'dps_col_member_id' => $this->input->post('dps_col_member_id'),
            'dps_col_collect_date' => $this->input->post('dps_col_collect_date'),
            'dps_col_amount' => $this->input->post('dps_col_amount'),
            'dps_col_payment_type' => $this->input->post('dps_col_payment_type'),
        );

        $this->db->where('dps_col_id', $dsc_id);
        $this->db->update('dps_collection', $new_data);

        // Calculate new values for sa_money_saving after the update
        $updated_sa_money_saving = $new_sa_money_saving + $this->input->post('dps_col_amount');

        // Update saving_account with the updated sa_money_saving value
        $updated_data = array(
            'dps_acc_amount_collected' => $updated_sa_money_saving,
        );

        $this->db->where('dps_acc_id', $loan_id);
        $this->db->update('dps_account', $updated_data);
    }








}
