<?php
ob_start();
class new_assets_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function save_assets() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_name", "assets_name", "xss_clean");
        $this->form_validation->set_rules("assets_price", "assets_price", "xss_clean");
        $this->form_validation->set_rules("assets_description", "assets_description", "xss_clean");
        $this->form_validation->set_rules("assets_buying_price", "assets_buying_price", "xss_clean");
        $this->form_validation->set_rules("assets_buying_date", "assets_buying_date", "xss_clean");
        $this->form_validation->set_rules("assets_created_at", "assets_created_at", "xss_clean");

        if ($this->form_validation->run() == FALSE) {

        } else {

            $data = array(
                'assets_name'                     => $this->input->post('assets_name'),
                'assets_price'                    => $this->input->post('assets_price'),
                'assets_description'              => $this->input->post('assets_description'),
                'assets_buying_price'             => $this->input->post('assets_buying_price'),
                'assets_buying_date'              => $this->input->post('assets_buying_date'),
                'assets_created_at'               => $this->input->post('assets_created_at'),
            );

            $this->db->insert('assets', $data);

        }
    }


    function get_assets() {
        $this->db->order_by("assets_id", "DESC");
        $query = $this->db->get("assets");
        return $query->result();
    }

    function get_assets_id($table, $id)
    {
        $result = $this->db->get_where($table, ['assets_id' => $id])->row();
        return $result;
    }
    
    function get_ivest_id($table, $id)
    {
        $result = $this->db->get_where($table, ['invest_id' => $id])->row();
        return $result;
    }


    function update_assets() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_name", "assets_name", "xss_clean");
        $this->form_validation->set_rules("assets_price", "assets_price", "xss_clean");
        $this->form_validation->set_rules("assets_description", "assets_description", "xss_clean");
        $this->form_validation->set_rules("assets_buying_price", "assets_buying_price", "xss_clean");
        $this->form_validation->set_rules("assets_buying_date", "assets_buying_date", "xss_clean");
        $this->form_validation->set_rules("assets_created_at", "assets_created_at", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            //insert data to database

            $assets_id = $this->uri->segment(3);

            $data = array(
                'assets_name'                     => $this->input->post('assets_name'),
                'assets_price'                    => $this->input->post('assets_price'),
                'assets_description'              => $this->input->post('assets_description'),
                'assets_buying_price'             => $this->input->post('assets_buying_price'),
                'assets_buying_date'              => $this->input->post('assets_buying_date'),
                'assets_created_at'               => $this->input->post('assets_created_at'),
            );

            $this->db->where('assets_id', $assets_id);
            $this->db->update('assets', $data);
        }
    }

    function update_invest() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("invest_type", "invest_type", "xss_clean");
        $this->form_validation->set_rules("invest_amount", "invest_amount", "xss_clean");
        $this->form_validation->set_rules("invest_date", "invest_date", "xss_clean");
        $this->form_validation->set_rules("invest_payment_type", "invest_payment_type", "xss_clean");
        $this->form_validation->set_rules("invest_person_name", "invest_person_name", "xss_clean");
        $this->form_validation->set_rules("invest_person_id", "invest_person_id", "xss_clean");
        $this->form_validation->set_rules("invest_person_number", "invest_person_number", "xss_clean");
        $this->form_validation->set_rules("invest_person_address", "invest_person_address", "xss_clean");
        $this->form_validation->set_rules("invest_description", "invest_description", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            //insert data to database

            $invest_id = $this->uri->segment(3);

            $data = array(
                'invest_type'                     	=> $this->input->post('invest_type'),
                'invest_amount'                    	=> $this->input->post('invest_amount'),
                'invest_date'              			=> $this->input->post('invest_date'),
                'invest_payment_type'             	=> $this->input->post('invest_payment_type'),
                'invest_person_name'              	=> $this->input->post('invest_person_name'),
                'invest_person_id'               	=> $this->input->post('invest_person_id'),
                'invest_person_number'             	=> $this->input->post('invest_person_number'),
                'invest_person_address'            	=> $this->input->post('invest_person_address'),
                'invest_description'               	=> $this->input->post('invest_description'),
            );

            $this->db->where('invest_id', $invest_id);
            $this->db->update('invest', $data);
        }
    }



    function save_invest() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("invest_type", "invest_type", "xss_clean");
        $this->form_validation->set_rules("invest_amount", "invest_amount", "xss_clean");
        $this->form_validation->set_rules("invest_date", "invest_date", "xss_clean");
        $this->form_validation->set_rules("invest_payment_type", "invest_payment_type", "xss_clean");
        $this->form_validation->set_rules("invest_person_name", "invest_person_name", "xss_clean");
        $this->form_validation->set_rules("invest_person_id", "invest_person_id", "xss_clean");
		$this->form_validation->set_rules("invest_person_number", "invest_person_number", "xss_clean");
        $this->form_validation->set_rules("invest_person_address", "invest_person_address", "xss_clean");
        $this->form_validation->set_rules("invest_description", "invest_description", "xss_clean");

        if ($this->form_validation->run() == FALSE) {

        } else {

            $data = array(
                'invest_type'                     	=> $this->input->post('invest_type'),
                'invest_amount'                    	=> $this->input->post('invest_amount'),
                'invest_date'              			=> $this->input->post('invest_date'),
                'invest_payment_type'             	=> $this->input->post('invest_payment_type'),
                'invest_person_name'              	=> $this->input->post('invest_person_name'),
                'invest_person_id'               	=> $this->input->post('invest_person_id'),
				'invest_person_number'             	=> $this->input->post('invest_person_number'),
                'invest_person_address'            	=> $this->input->post('invest_person_address'),
                'invest_description'               	=> $this->input->post('invest_description'),
            );

            $this->db->insert('invest', $data);

        }
    }
    function get_invest() {
        $this->db->order_by("invest_id", "DESC");
        $query = $this->db->get("invest");
        return $query->result();
    }



}
