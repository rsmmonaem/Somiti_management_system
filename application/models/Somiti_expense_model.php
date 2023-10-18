<?php
ob_start();
class somiti_expense_model  extends CI_Model
{

// Create Notice
    function save_expense()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("expense_name", "expense_name", "xss_clean");
        $this->form_validation->set_rules("expense_type", "expense_type", "xss_clean");
        $this->form_validation->set_rules("expense_amount", "expense_amount", "xss_clean");
        $this->form_validation->set_rules("expense_date", "expense_date", "xss_clean");
        $this->form_validation->set_rules("expense_payment_type", "expense_payment_type", "xss_clean");
        $this->form_validation->set_rules("expense_description", "expense_description", "xss_clean");



        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('super_admin/company_list/error');

        } else {

            $data = array(
                'expense_name' => $this->input->post('expense_name'),
                'expense_type' => $this->input->post('expense_type'),
                'expense_amount' => $this->input->post('expense_amount'),
                'expense_payment_type' => $this->input->post('expense_payment_type'),
                'expense_date' => $this->input->post('expense_date'),
                'expense_description' => $this->input->post('expense_description'),
            );

            $this->db->insert('expense', $data);
            //redirect("super_admin/add_purohit");
        }
    }

    function update_expense()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("expense_name", "expense_name", "xss_clean");
        $this->form_validation->set_rules("expense_type", "expense_type", "xss_clean");
        $this->form_validation->set_rules("expense_amount", "expense_amount", "xss_clean");
        $this->form_validation->set_rules("expense_date", "expense_date", "xss_clean");
        $this->form_validation->set_rules("expense_payment_type", "expense_payment_type", "xss_clean");
        $this->form_validation->set_rules("expense_description", "expense_description", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();

        } else {

            $expense_id = $this->uri->segment(3);

            $data = array(
                'expense_name' => $this->input->post('expense_name'),
                'expense_type' => $this->input->post('expense_type'),
                'expense_amount' => $this->input->post('expense_amount'),
                'expense_payment_type' => $this->input->post('expense_payment_type'),
                'expense_date' => $this->input->post('expense_date'),
                'expense_description' => $this->input->post('expense_description'),
            );


            $this->db->where('expense_id', $expense_id);
            $this->db->update('expense', $data);
        }
    }

    function get_expense() {
        $this->db->order_by("expense_id", "DESC");
        $query = $this->db->get("expense");
        return $query->result();
    }

    function get_expense_id($table, $id)
    {
        $result = $this->db->get_where($table, ['expense_id' => $id])->row();
        return $result;
    }

	public function getData($startDate, $endDate) {
		$this->db->where('expense_date >=', $startDate);
		$this->db->where('expense_date <=', $endDate);
		$query = $this->db->get('expense'); // Replace 'your_table_name' with your actual table name
		return $query->result();
	}



}
