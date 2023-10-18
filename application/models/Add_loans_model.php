<?php
ob_start();
class add_loans_model  extends CI_Model
{

// Create Objection
    function create_loans()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("loans_member_id", "loans_member_id", "xss_clean");
        $this->form_validation->set_rules("loans_guarantor_id", "loans_guarantor_id", "xss_clean");
        $this->form_validation->set_rules("loans_amount", "loans_amount", "xss_clean");
        $this->form_validation->set_rules("loans_profit_rate", "loans_profit_rate", "xss_clean");
        $this->form_validation->set_rules("loans_pay_date", "loans_pay_date", "xss_clean");
        $this->form_validation->set_rules("loans_payment_amount", "loans_payment_amount", "xss_clean");
        $this->form_validation->set_rules("loans_installment_collection_type", "loans_installment_collection_type", "xss_clean");
        $this->form_validation->set_rules("loans_profit_daily_installment", "loans_profit_daily_installment", "xss_clean");
        $this->form_validation->set_rules("loans_profit_installments", "loans_profit_installments", "xss_clean");
        $this->form_validation->set_rules("loans_registration_date", "loans_registration_date", "xss_clean");
        $this->form_validation->set_rules("loans_paid_type", "loans_paid_type", "xss_clean");
        $this->form_validation->set_rules("loans_status", "loans_status", "xss_clean");



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/add_loans');
        } else {

            //insert data to database

            $data = array(
                'loans_member_id' => $this->input->post('loans_member_id'),
                'loans_guarantor_id' => $this->input->post('loans_guarantor_id'),
                'loans_amount' => $this->input->post('loans_amount'),
                'loans_profit_rate' => $this->input->post('loans_profit_rate'),
                'loans_pay_date' => $this->input->post('loans_pay_date'),
                'loans_payment_amount' => $this->input->post('loans_payment_amount'),
                'loans_installment_collection_type' => $this->input->post('loans_installment_collection_type'),
                'loans_profit_daily_installment' => $this->input->post('loans_profit_daily_installment'),
                'loans_profit_installments' => $this->input->post('loans_profit_installments'),
                'loans_total_installment' => 0,
                'loans_registration_date' => $this->input->post('loans_registration_date'),
                'loans_paid_type' => $this->input->post('loans_paid_type'),
                'loans_branch_id' => $this->input->post('loans_branch_id'),
                'loan_amount_collection' => 0,
                'loans_create_at' =>  date('Y-m-d H:i:s'),
                'loans_status' => $this->input->post('loans_status'),
            );
            $this->db->insert('loans', $data);
        }
    }

    function create_loans_worker()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("loans_member_id", "loans_member_id", "xss_clean");
        $this->form_validation->set_rules("loans_guarantor_id", "loans_guarantor_id", "xss_clean");
        $this->form_validation->set_rules("loans_amount", "loans_amount", "xss_clean");
        $this->form_validation->set_rules("loans_profit_rate", "loans_profit_rate", "xss_clean");
        $this->form_validation->set_rules("loans_pay_date", "loans_pay_date", "xss_clean");
        $this->form_validation->set_rules("loans_payment_amount", "loans_payment_amount", "xss_clean");
        $this->form_validation->set_rules("loans_installment_collection_type", "loans_installment_collection_type", "xss_clean");
        $this->form_validation->set_rules("loans_profit_daily_installment", "loans_profit_daily_installment", "xss_clean");
        $this->form_validation->set_rules("loans_profit_installments", "loans_profit_installments", "xss_clean");
        $this->form_validation->set_rules("loans_registration_date", "loans_registration_date", "xss_clean");
        $this->form_validation->set_rules("loans_paid_type", "loans_paid_type", "xss_clean");
        $this->form_validation->set_rules("loans_status", "loans_status", "xss_clean");



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/add_loans');
        } else {

            $user_id = $this->session->userdata('user_id');
            //insert data to database

            $data = array(
                'loans_member_id' => $this->input->post('loans_member_id'),
                'loans_guarantor_id' => $this->input->post('loans_guarantor_id'),
                'loans_amount' => $this->input->post('loans_amount'),
                'loans_profit_rate' => $this->input->post('loans_profit_rate'),
                'loans_pay_date' => $this->input->post('loans_pay_date'),
                'loans_payment_amount' => $this->input->post('loans_payment_amount'),
                'loans_installment_collection_type' => $this->input->post('loans_installment_collection_type'),
                'loans_profit_daily_installment' => $this->input->post('loans_profit_daily_installment'),
                'loans_profit_installments' => $this->input->post('loans_profit_installments'),
                'loans_total_installment' => 0,
                'loans_registration_date' => $this->input->post('loans_registration_date'),
                'loans_paid_type' => $this->input->post('loans_paid_type'),
                'loan_amount_collection' => 0,
                'loans_branch_id' => $this->input->post('loans_branch_id'),

                'loans_create_at' =>  date('Y-m-d H:i:s'),
                'loans_status' => $this->input->post('loans_status'),
                'loans_created_by' => $user_id,
            );
            $this->db->insert('loans', $data);
        }
    }

    function get_loans() {
        $this->db->select('guarantor.*, member.*, loans.*');
        $this->db->from('loans');
        $this->db->join('guarantor', 'guarantor.guarantor_id = loans.loans_guarantor_id', 'inner');
        $this->db->join('member', 'loans.loans_member_id = member.member_id', 'inner');
        $this->db->order_by("loans.loans_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    function get_loans_worker($id) {
        $this->db->select('guarantor.*, member.*, loans.*');
        $this->db->from('loans');
        $this->db->join('guarantor', 'guarantor.guarantor_id = loans.loans_guarantor_id', 'inner');
        $this->db->join('member', 'loans.loans_member_id = member.member_id', 'inner');
        $this->db->order_by("loans.loans_id", "DESC");
        $this->db->where("loans.loans_created_by", $id);
        $query = $this->db->get();
        return $query->result();
    }


    function get_loans_branch($user_id) {
        $this->db->select('guarantor.*, member.*, loans.*');
        $this->db->from('loans');
        $this->db->join('guarantor', 'guarantor.guarantor_id = loans.loans_guarantor_id', 'inner');
        $this->db->join('member', 'loans.loans_member_id = member.member_id', 'inner');
        $this->db->order_by("loans.loans_id", "DESC");
        $this->db->where("loans.loans_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_loan_collection_report(){

        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->db->select('*');
        $this->db->from('loans');
        $this->db->where('loans_pay_date >=', $startDate);
        $this->db->where('loans_pay_date <=', $endDate);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_loans_id($table, $id)
    {
        $result = $this->db->get_where($table, ['loans_id' => $id])->row();
        return $result;
    }


    function update_loans() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("loans_member_id", "loans_member_id", "xss_clean");
        $this->form_validation->set_rules("loans_guarantor_id", "loans_guarantor_id", "xss_clean");
        $this->form_validation->set_rules("loans_amount", "loans_amount", "xss_clean");
        $this->form_validation->set_rules("loans_profit_rate", "loans_profit_rate", "xss_clean");
        $this->form_validation->set_rules("loans_pay_date", "loans_pay_date", "xss_clean");
        $this->form_validation->set_rules("loans_payment_amount", "loans_payment_amount", "xss_clean");
        $this->form_validation->set_rules("loans_installment_collection_type", "loans_installment_collection_type", "xss_clean");
        $this->form_validation->set_rules("loans_profit_daily_installment", "loans_profit_daily_installment", "xss_clean");
        $this->form_validation->set_rules("loans_profit_installments", "loans_profit_installments", "xss_clean");
        $this->form_validation->set_rules("loans_registration_date", "loans_registration_date", "xss_clean");
        $this->form_validation->set_rules("loans_paid_type", "loans_paid_type", "xss_clean");
        $this->form_validation->set_rules("loans_status", "loans_status", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {
            $loans_id = $this->input->post('loans_id');

            //zone change

            // echo $company_code = $this->input->post('company_code');

            $this->db->select('loans.*');
            $this->db->where('loans_id', $loans_id);
            $query = $this->db->get('loans');
            $row = $query->row();


            //insert data to database

            $data = array(
                'loans_member_id' => $this->input->post('loans_member_id'),
                'loans_guarantor_id' => $this->input->post('loans_guarantor_id'),
                'loans_amount' => $this->input->post('loans_amount'),
                'loans_profit_rate' => $this->input->post('loans_profit_rate'),
                'loans_pay_date' => $this->input->post('loans_pay_date'),
                'loans_payment_amount' => $this->input->post('loans_payment_amount'),
                'loans_installment_collection_type' => $this->input->post('loans_installment_collection_type'),
                'loans_profit_daily_installment' => $this->input->post('loans_profit_daily_installment'),
                'loans_profit_installments' => $this->input->post('loans_profit_installments'),
                //'loans_total_installment' => $this->input->post('loans_profit_installments') - $row->loans_profit_installments,
                'loans_registration_date' => $this->input->post('loans_registration_date'),
                'loans_paid_type' => $this->input->post('loans_paid_type'),
                //   'loan_amount_collection' => $row->loan_amount_collection - ,
                'loans_create_at' =>  date('Y-m-d H:i:s'),
                'loans_status' => $this->input->post('loans_status'),

            );


            $this->db->where('loans_id', $loans_id);
            $this->db->update('loans', $data);
        }
    }

    //daily loan collection
    public function save_daily_loan(){

        $loan_id = $this->input->post('loans_id');
        //   $dps_col_collect_date = $this->input->post('dps_col_collect_date');

        // Retrieve the current values of dps_acc_amount_collected and dps_acc_installment
        $this->db->select('loan_amount_collection, loans_profit_installments, loans_total_installment');
        $this->db->where('loans_id', $loan_id);
        $query = $this->db->get('loans');
        $row = $query->row();

        // Calculate the new values
        $loan_amount_collection = $row->loan_amount_collection + $this->input->post('dlc_amount') ;
        $loans_profit_installments =   1 + $row->loans_total_installment;

        // Update the dps_account table with the new values
        $data = array(
            'loan_amount_collection' => $loan_amount_collection,
            'loans_total_installment' => $loans_profit_installments,
        );

        $this->db->where('loans_id', $loan_id);
        $this->db->update('loans', $data);

        // Insert the new data from the form into dps_account
        $data2 = array(
            'dlc_member_id' => $this->input->post('dlc_member_id'),
            'dlc_date' => $this->input->post('dlc_date'),
            'dlc_amount' => $this->input->post('dlc_amount'),
            'dlc_amount_type' => $this->input->post('dlc_amount_type'),
            'dlc_loans_id' => $this->input->post('loans_id'),
        );
        $this->db->insert('daily_loan_collection', $data2);
    }

    public function save_daily_loan_worker(){

        $loan_id = $this->input->post('loans_id');
        //   $dps_col_collect_date = $this->input->post('dps_col_collect_date');

        // Retrieve the current values of dps_acc_amount_collected and dps_acc_installment
        $this->db->select('loan_amount_collection, loans_profit_installments, loans_total_installment');
        $this->db->where('loans_id', $loan_id);
        $query = $this->db->get('loans');
        $row = $query->row();

        // Calculate the new values
        $loan_amount_collection = $row->loan_amount_collection + $this->input->post('dlc_amount') ;
        $loans_profit_installments =   1 + $row->loans_total_installment;

        // Update the dps_account table with the new values
        $data = array(
            'loan_amount_collection' => $loan_amount_collection,
            'loans_total_installment' => $loans_profit_installments,
        );

        $this->db->where('loans_id', $loan_id);
        $this->db->update('loans', $data);

        $user_id = $this->session->userdata('user_id');
        // Insert the new data from the form into dps_account
        $data2 = array(
            'dlc_member_id' => $this->input->post('dlc_member_id'),
            'dlc_date' => $this->input->post('dlc_date'),
            'dlc_amount' => $this->input->post('dlc_amount'),
            'dlc_amount_type' => $this->input->post('dlc_amount_type'),
            'dlc_loans_id' => $this->input->post('loans_id'),
            'dlc_branch_id' => $this->input->post('dlc_branch_id'),
            'dlc_created_by' => $user_id,
        );
        $this->db->insert('daily_loan_collection', $data2);
    }



    function update_daily_loan()
    {
        $loan_id = $this->input->post('loans_id');

        // Retrieve the current values of dps_acc_amount_collected and dps_acc_installment
        $this->db->select('loan_amount_collection, loans_profit_installments');
        $this->db->where('loans_id', $loan_id);
        $query = $this->db->get('loans');
        $row = $query->row();

        // Calculate the new values
        $loan_amount_collection = $row->loan_amount_collection + $this->input->post('dlc_amount') ;

        // Update the dps_account table with the new values
        $data = array(
            'loan_amount_collection' => $loan_amount_collection,
        );

        $this->db->where('loans_id', $loan_id);
        $this->db->update('loans', $data);

        //Update data to database
        $dlc_member_id = $this->input->post('dlc_member_id');

        $data = array(
            'dlc_member_id' => $this->input->post('dlc_member_id'),
            'dlc_date' => $this->input->post('dlc_date'),
            'dlc_amount' => $this->input->post('dlc_amount'),
            'dlc_amount_type' => $this->input->post('dlc_amount_type'),
            'dlc_loans_id' => $this->input->post('loans_id'),
        );

        $this->db->where('dlc_member_id', $dlc_member_id);
        $this->db->update('daily_loan_collection', $data);

    }


    function get_daily_loan_collect() {
        $this->db->select('daily_loan_collection.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    function get_daily_loan_collect_worker($user_id) {
        $this->db->select('daily_loan_collection.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $this->db->where("daily_loan_collection.dlc_created_by", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_daily_loan_collect_branch($user_id) {
        $this->db->select('daily_loan_collection.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $this->db->where("daily_loan_collection.dlc_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_daily_loan_collect_id($dlc_id)
    {
        $result = $this->db->get_where('daily_loan_collection', ['dlc_id' => $dlc_id])->row();
        return $result;
    }

    public function get_member_loans_collections() {
        $this->db->select('daily_loan_collection.*, loans.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('loans', 'loans.loans_id = daily_loan_collection.dlc_loans_id', 'inner');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");

        $this->db->limit(7);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_member_loans_collections_worker($user_id) {
        $this->db->select('daily_loan_collection.*, loans.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('loans', 'loans.loans_id = daily_loan_collection.dlc_loans_id', 'inner');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $this->db->where("daily_loan_collection.dlc_created_by", $user_id);
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_member_loans_collections_branch($user_id) {
        $this->db->select('daily_loan_collection.*, loans.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('loans', 'loans.loans_id = daily_loan_collection.dlc_loans_id', 'inner');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $this->db->where("daily_loan_collection.dlc_branch_id", $user_id);
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }


    public function getData($startDate, $endDate) {
        $this->db->where('dlc_date >=', $startDate);
        $this->db->where('dlc_date <=', $endDate);
        $query = $this->db->get('daily_loan_collection'); // Replace 'your_table_name' with your actual table name
        return $query->result();
    }


    public function loans_profile_details($id) {
        $this->db->select('loans.*, guarantor.*, member.*');
        $this->db->from('loans');
        $this->db->join('guarantor', 'guarantor.guarantor_id = loans.loans_guarantor_id', 'left');
        $this->db->join('member', 'member.member_id = loans.loans_member_id', 'left');
        $this->db->where('loans.loans_member_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function loans_collection_profile_details($id) {
        $this->db->select('daily_loan_collection.*, loans.*, member.*');
        $this->db->from('daily_loan_collection');
        $this->db->join('loans', 'loans.loans_id = daily_loan_collection.dlc_loans_id', 'inner');
        $this->db->join('member', 'member.member_id = daily_loan_collection.dlc_member_id', 'inner');
        $this->db->order_by("daily_loan_collection.dlc_id", "DESC");
        $this->db->where("daily_loan_collection.dlc_member_id", $id);
        $query = $this->db->get();
        return $query->result();
    }



 



}
