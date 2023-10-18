<?php
ob_start();
class add_officer_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function save_officer() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("officer_name", "officer_name", "xss_clean");
        $this->form_validation->set_rules("officer_phone", "officer_phone", "xss_clean");
        $this->form_validation->set_rules("officer_nid", "officer_nid", "xss_clean");
        $this->form_validation->set_rules("officer_father_name", "officer_father_name", "xss_clean");
        $this->form_validation->set_rules("officer_mother_name", "officer_mother_name", "xss_clean");
        $this->form_validation->set_rules("officer_registration_date", "officer_registration_date", "xss_clean");
        $this->form_validation->set_rules("officer_dob", "officer_dob", "xss_clean");
        $this->form_validation->set_rules("officer_gender", "officer_gender", "xss_clean");
        $this->form_validation->set_rules("officer_religion", "officer_religion", "xss_clean");
        $this->form_validation->set_rules("officer_email", "officer_email", "xss_clean");
        $this->form_validation->set_rules("officer_address", "officer_address", "xss_clean");
        $this->form_validation->set_rules("officer_image", "officer_image", "xss_clean");
        $this->form_validation->set_rules("officer_status", "officer_status", "xss_clean");
        $this->form_validation->set_rules("officer_type", "officer_type", "xss_clean");
        $this->form_validation->set_rules("officer_username", "officer_username", "xss_clean");
        $this->form_validation->set_rules("officer_password", "officer_password", "xss_clean");

        if ($this->form_validation->run() == FALSE) {


        } else {

            $officer_image = $_FILES['officer_image']['name'];
            if ($officer_image != "") {
                $officer_image = random_string('alnum', 10) . '.jpg';

                //insert image
                $config['file_name'] = $officer_image;
                $config['upload_path'] = 'uploads/officer';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;
                $config['image_library'] = 'gd2';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('officer_image');

                $file_data = $this->upload->data();
            } else {
                $officer_image = "default.png";
            }


            //insert data to database


            $data2 = array(
                'full_name'         => $this->input->post('officer_name'),
                'user_name' 		=> $this->input->post('officer_username'),
                'pass_word' 		=> $this->input->post('officer_password'),
                'user_type' 		=> $this->input->post('officer_type'),
              //  'profile_image' 		=> $officer_image,
                'status' 	    	=> 'ENABLE',
             //   'user_id' 	    	=>  $this->db->insert_id(),
            );

            $this->db->insert('admin_user', $data2);
            //$id = $this->db->insert_id();

            $admin_user_id = $this->db->insert_id();

            $data3 = array(
                'user_id' 	    	=>  $admin_user_id,
            );

            $this->db->where('u_id', $admin_user_id);
            $this->db->update('admin_user', $data3);

            $user_id = $this->session->userdata('user_id');


            $data = array(
                'officer_name'              => $this->input->post('officer_name'),
                'officer_user_id'           => $admin_user_id,
                'officer_phone'             => $this->input->post('officer_phone'),
                'officer_nid'               => $this->input->post('officer_nid'),
                'officer_father_name'       => $this->input->post('officer_father_name'),
                'officer_mother_name'       => $this->input->post('officer_mother_name'),
                'officer_registration_date'       => $this->input->post('officer_registration_date'),
                'officer_dob' 			    => $this->input->post('officer_dob'),
                'officer_gender' 			=> $this->input->post('officer_gender'),
                'officer_religion' 			=> $this->input->post('officer_religion'),
                'officer_email' 			=> $this->input->post('officer_email'),
                'officer_address' 			=> $this->input->post('officer_address'),
                'officer_status' 			=> $this->input->post('officer_status'),
                'officer_type' 			    => $this->input->post('officer_type'),
                'officer_username' 			=> $this->input->post('officer_username'),
                'officer_password' 			=> $this->input->post('officer_password'),
                'officer_salary' 			=> $this->input->post('officer_salary'),
                'officer_branch_id' 			=> $user_id,
                'officer_created_by' 			=> $user_id,
                'officer_image'             => $officer_image,
                'officer_create_at'             => date('Y-m-d H:i:s'),

            );

            $this->db->insert('officer', $data);


        }
    }


    function get_officer() {
        $this->db->order_by("officer_id", "DESC");
        $query = $this->db->get("officer");
        return $query->result();
    }

    function get_officer_field() {
        $this->db->order_by("officer_id", "DESC");
        $this->db->where("officer_type", "field_worker");
        $query = $this->db->get("officer");
        return $query->result();
    }

    function get_officer_manager($user_id) {
        $this->db->order_by("officer_id", "DESC");
        $this->db->where("officer_branch_id", $user_id);
        $query = $this->db->get("officer");
        return $query->result();
    }

    function get_officer_id($table, $id)
    {
        $result = $this->db->get_where($table, ['officer_id' => $id])->row();
        return $result;
    }

	function update_officer() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("officer_name", "officer_name", "xss_clean");
        $this->form_validation->set_rules("officer_phone", "officer_phone", "xss_clean");
        $this->form_validation->set_rules("officer_nid", "officer_nid", "xss_clean");
        $this->form_validation->set_rules("officer_father_name", "officer_father_name", "xss_clean");
        $this->form_validation->set_rules("officer_mother_name", "officer_mother_name", "xss_clean");
        $this->form_validation->set_rules("officer_registration_date", "officer_registration_date", "xss_clean");
        $this->form_validation->set_rules("officer_dob", "officer_dob", "xss_clean");
        $this->form_validation->set_rules("officer_gender", "officer_gender", "xss_clean");
        $this->form_validation->set_rules("officer_religion", "officer_religion", "xss_clean");
        $this->form_validation->set_rules("officer_email", "officer_email", "xss_clean");
        $this->form_validation->set_rules("officer_address", "officer_address", "xss_clean");
        $this->form_validation->set_rules("officer_image", "officer_image", "xss_clean");
        $this->form_validation->set_rules("officer_status", "officer_status", "xss_clean");
        $this->form_validation->set_rules("officer_type", "officer_type", "xss_clean");
        $this->form_validation->set_rules("officer_username", "officer_username", "xss_clean");
        $this->form_validation->set_rules("officer_password", "officer_password", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $officer_image = $_FILES['officer_image']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image');


            if ($officer_image != "") {
                $officer_image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $officer_image;
                $config['upload_path']      = 'uploads/officer';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('officer_image');

                $file_data = $this->upload->data();
            } else {
                $officer_image = $prev_image;
            }

            $officer_id = $this->input->post('officer_id');

            //zone change

            // echo $company_code = $this->input->post('company_code');


            //insert data to database

            $data = array(
				'officer_name'              => $this->input->post('officer_name'),
                'officer_phone'             => $this->input->post('officer_phone'),
                'officer_nid'               => $this->input->post('officer_nid'),
                'officer_father_name'       => $this->input->post('officer_father_name'),
                'officer_mother_name'       => $this->input->post('officer_mother_name'),
                'officer_registration_date'       => $this->input->post('officer_registration_date'),
                'officer_dob' 			    => $this->input->post('officer_dob'),
                'officer_gender' 			=> $this->input->post('officer_gender'),
                'officer_religion' 			=> $this->input->post('officer_religion'),
                'officer_email' 			=> $this->input->post('officer_email'),
                'officer_address' 			=> $this->input->post('officer_address'),
                'officer_status' 			=> $this->input->post('officer_status'),
                'officer_type' 			    => $this->input->post('officer_type'),
                'officer_username' 			=> $this->input->post('officer_username'),
                'officer_password' 			=> $this->input->post('officer_password'),
                'officer_salary' 			=> $this->input->post('officer_salary'),
                'officer_image'             => $officer_image,
            );


            $this->db->where('officer_id', $officer_id);
            $this->db->update('officer', $data);
        }
    }
}
