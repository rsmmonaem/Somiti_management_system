<?php
ob_start();
class add_savingplan_model  extends CI_Model
{

// Create Notice
    function save_saving_plan()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("saving_plan_name", "saving_plan_name", "xss_clean");
        $this->form_validation->set_rules("saving_plan_amount", "saving_plan_amount", "xss_clean");
        $this->form_validation->set_rules("saving_plan_interest", "saving_plan_interest", "xss_clean");
        $this->form_validation->set_rules("saving_plan_interest_give", "saving_plan_interest_give", "xss_clean");
        $this->form_validation->set_rules("saving_plan_description", "saving_plan_description", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('super_admin/company_list/error');

        } else {

            $data = array(
                'saving_plan_name' => $this->input->post('saving_plan_name'),
                'saving_plan_amount' => $this->input->post('saving_plan_amount'),
                'saving_plan_interest' => $this->input->post('saving_plan_interest'),
                'saving_plan_interest_give' => $this->input->post('saving_plan_interest_give'),
                'saving_plan_description' => $this->input->post('saving_plan_description'),
            );

            $this->db->insert('saving_plan', $data);
        }
    }
    function update_saving_plan()
    {
			$saving_plan_id = $this->input->post('saving_plan_id');
            $data = array(
                'saving_plan_name' => $this->input->post('saving_plan_name'),
                'saving_plan_amount' => $this->input->post('saving_plan_amount'),
                'saving_plan_interest' => $this->input->post('saving_plan_interest'),
                'saving_plan_interest_give' => $this->input->post('saving_plan_interest_give'),
                'saving_plan_description' => $this->input->post('saving_plan_description'),
            );
			$this->db->where('saving_plan_id', $saving_plan_id);
            $this->db->update('saving_plan', $data);
        
    }
	


    function get_plan_id($saving_plan_id)
    {
        $result = $this->db->get_where('saving_plan', ['saving_plan_id' => $saving_plan_id])->row();
        return $result;
    }

    function get_plan() {
        $this->db->order_by("saving_plan_id", "DESC");
        $query = $this->db->get("saving_plan");
        return $query->result();
    }


}
