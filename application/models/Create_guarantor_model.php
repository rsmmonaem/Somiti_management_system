<?php
ob_start();
class create_guarantor_model  extends CI_Model
{

// Create Objection
    function create_guarantor()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("guarantor_name", "guarantor_name", "required");
        $this->form_validation->set_rules("guarantor_occu", "guarantor_occu", "xss_clean");
        $this->form_validation->set_rules("guarantor_phone", "guarantor_phone", "xss_clean");
        $this->form_validation->set_rules("guarantor_email", "guarantor_email", "xss_clean");
        $this->form_validation->set_rules("guarantor_address", "guarantor_address", "xss_clean");
        $this->form_validation->set_rules("guarantor_related", "guarantor_related", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/add_guarantor');


        } else {

            $data = array(
                'guarantor_name' => $this->input->post('guarantor_name'),
                'guarantor_occu' => $this->input->post('guarantor_occu'),
                'guarantor_phone' => $this->input->post('guarantor_phone'),
                'guarantor_email' => $this->input->post('guarantor_email'),
                'guarantor_address' => $this->input->post('guarantor_address'),
                'guarantor_related' => $this->input->post('guarantor_related'),

            );

            $this->db->insert('guarantor', $data);

        }

    }

    function create_loan_products()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("loan_products_name", "loan_products_name", "required");


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/add_loan_products');


        } else {

            $data = array(
                'loan_products_name' => $this->input->post('loan_products_name'),

            );

            $this->db->insert('loan_products', $data);

        }

    }

    function get_loan_products() {
        $this->db->order_by("loan_products_id", "DESC");
        $query = $this->db->get("loan_products");
        return $query->result();
    }
    function get_guarantor() {
        $this->db->order_by("guarantor_id", "DESC");
        $query = $this->db->get("guarantor");
        return $query->result();
    }

    function get_guarantor_id($table, $id)
    {
        $result = $this->db->get_where($table, ['guarantor_id' => $id])->row();
        return $result;
    }

//    function get_member_id($table, $id)
//    {
//        $result = $this->db->get_where($table, ['member_id' => $id])->row();
//        return $result;
//    }
//
//    function department_delete($dept_id) {
//        $this->session_data();
//        $dept_id = $this->uri->segment(3);
//        $this->db->where('dept_id', $dept_id);
//        $this->db->delete('department');
//    }
//
//
//
    function update_guarantor() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("guarantor_name", "guarantor_name", "required");
        $this->form_validation->set_rules("guarantor_occu", "guarantor_occu", "xss_clean");
        $this->form_validation->set_rules("guarantor_phone", "guarantor_phone", "xss_clean");
        $this->form_validation->set_rules("guarantor_email", "guarantor_email", "xss_clean");
        $this->form_validation->set_rules("guarantor_address", "guarantor_address", "xss_clean");
        $this->form_validation->set_rules("guarantor_related", "guarantor_related", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $guarantor_id = $this->input->post('guarantor_id');

            //insert data to database

            $data = array(
                'guarantor_name' => $this->input->post('guarantor_name'),
                'guarantor_occu' => $this->input->post('guarantor_occu'),
                'guarantor_phone' => $this->input->post('guarantor_phone'),
                'guarantor_email' => $this->input->post('guarantor_email'),
                'guarantor_address' => $this->input->post('guarantor_address'),
                'guarantor_related' => $this->input->post('guarantor_related'),

            );

            $this->db->where('guarantor_id', $guarantor_id);
            $this->db->update('guarantor', $data);
        }
    }


}
