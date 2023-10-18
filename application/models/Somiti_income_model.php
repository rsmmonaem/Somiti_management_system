<?php
ob_start();
class somiti_income_model  extends CI_Model
{

// Create Notice
    function save_income()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_name", "income_name", "xss_clean");
        $this->form_validation->set_rules("income_type", "income_type", "xss_clean");
        $this->form_validation->set_rules("income_amount", "income_amount", "xss_clean");
        $this->form_validation->set_rules("income_date", "income_date", "xss_clean");
        $this->form_validation->set_rules("income_payment_type", "income_payment_type", "xss_clean");
        $this->form_validation->set_rules("income_description", "income_description", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('super_admin/company_list/error');

        } else {

            $data = array(
                'income_name' => $this->input->post('income_name'),
                'income_type' => $this->input->post('income_type'),
                'income_amount' => $this->input->post('income_amount'),
                'income_payment_type' => $this->input->post('income_payment_type'),
                'income_date' => $this->input->post('income_date'),
                'income_description' => $this->input->post('income_description'),
            );

            $this->db->insert('income', $data);
            //redirect("super_admin/add_purohit");
        }
    }

    function update_income()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_name", "income_name", "xss_clean");
        $this->form_validation->set_rules("income_type", "income_type", "xss_clean");
        $this->form_validation->set_rules("income_amount", "income_amount", "xss_clean");
        $this->form_validation->set_rules("income_date", "income_date", "xss_clean");
        $this->form_validation->set_rules("income_payment_type", "income_payment_type", "xss_clean");
        $this->form_validation->set_rules("income_description", "income_description", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();

        } else {

            $income_id = $this->uri->segment(3);

            $data = array(
                'income_name' => $this->input->post('income_name'),
                'income_type' => $this->input->post('income_type'),
                'income_amount' => $this->input->post('income_amount'),
                'income_payment_type' => $this->input->post('income_payment_type'),
                'income_date' => $this->input->post('income_date'),
                'income_description' => $this->input->post('income_description'),
            );


            $this->db->where('income_id', $income_id);
            $this->db->update('income', $data);
        }
    }

    function get_income() {
        $this->db->order_by("income_id", "DESC");
        $query = $this->db->get("income");
        return $query->result();
    }

    function get_income_id($table, $id)
    {
        $result = $this->db->get_where($table, ['income_id' => $id])->row();
        return $result;
    }
	public function getData($startDate, $endDate) {
		$this->db->where('income_date >=', $startDate);
		$this->db->where('income_date <=', $endDate);
		$query = $this->db->get('income'); // Replace 'your_table_name' with your actual table name
		return $query->result();
	}


}
