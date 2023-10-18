<?php
ob_start();
class profile_update_model  extends CI_Model
{



    function get_profile_update_id($table, $user_name)
    {
        $result = $this->db->get_where($table, ['user_name' => $user_name])->row();
        return $result;
    }
    function update_profile(){

        $data = array(
            'full_name' => $this->input->post('full_name'),
            'user_name' => $this->input->post('user_name'),
            'pass_word' => $this->input->post('pass_word'),
        );
        $u_id = $this->input->post('u_id');

        $this->db->where('u_id', $u_id);
        $this->db->update('admin_user', $data);
    }
    function update_profile_trainee(){
//admin panel
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'pass_word' => $this->input->post('pass_word'),
        );
        $u_id = $this->input->post('u_id');
        $this->db->where('u_id', $u_id);
        $this->db->update('admin_user', $data);
//trainee panel

        $data2 = array(
            'trainee_name' => $this->input->post('full_name'),
            'trainee_password' => $this->input->post('pass_word'),
        );
        $trainee_username = $this->input->post('user_name');
        $this->db->where('trainee_username', $trainee_username);
        $this->db->update('trainee', $data2);
    }
	function update_profile_deo(){

        $data = array(
            'full_name' => $this->input->post('full_name'),
            'pass_word' => $this->input->post('pass_word'),
        );
        $u_id = $this->input->post('u_id');

        $this->db->where('u_id', $u_id);
        $this->db->update('admin_user', $data);

		

    }

	function update_profile_inst(){

        $data = array(
            'full_name' => $this->input->post('full_name'),
            'pass_word' => $this->input->post('pass_word'),
        );
        $u_id = $this->input->post('u_id');

        $this->db->where('u_id', $u_id);
        $this->db->update('admin_user', $data);

		$data2 = array(
            'inst_name' => $this->input->post('full_name'),
        );
        $inst_user_id = $this->input->post('user_id');
        $this->db->where('inst_user_id', $inst_user_id);
        $this->db->update('institute', $data2);

    }

//    function get_inst_user_modification_id($table, $inst_user_id)
//    {
//        $result = $this->db->get_where($table, ['inst_user_id' => $inst_user_id])->row();
//        return $result;
//    }
//    function get_trainee_user_modification_id($table, $trainee_username)
//    {
//        $result = $this->db->get_where($table, ['trainee_username' => $trainee_username])->row();
//        return $result;
//    }
//
//    function create_user()
//    {
//        $this->load->library("form_validation");
//        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
//        $this->form_validation->set_rules("user_name", "user_name", "xss_clean");
//        $this->form_validation->set_rules("pass_word", "pass_word", "xss_clean");
//        $this->form_validation->set_rules("user_type", "user_type", "xss_clean");
//        $this->form_validation->set_rules("status", "status", "xss_clean");
////        if ($this->form_validation->run() == FALSE) {
////
////
////        } else {
////
////            $slider_image = $_FILES['slider_image']['name'];
////            if ($slider_image != "") {
////                $slider_image = random_string('alnum', 10) . '.jpg';
////
////                //insert image
////                $config['file_name'] = $slider_image;
////                $config['upload_path'] = 'uploads/slider';
////                $config['allowed_types'] = 'gif|jpg|jpeg|png';
////                $config['max_size'] = '100000';
////                $config['encrypt_name'] = false;
////                $config['image_library'] = 'gd2';
////                $this->load->library('upload', $config);
////                $this->upload->initialize($config);
////                $this->upload->do_upload('slider_image');
////
////                $file_data = $this->upload->data();
////            } else {
////                $slider_image = "default.png";
////            }
//
//
//        //insert data to database
//
//        $data = array(
//            'full_name' => $this->input->post('full_name'),
//            'user_name' => $this->input->post('user_name'),
//            'pass_word' => $this->input->post('pass_word'),
//            'user_type' => $this->input->post('user_type'),
//            'status'    => $this->input->post('status'),
//
//
//        );
//
//        $this->db->insert('admin_user', $data);
//        //$id = $this->db->insert_id();
//        $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been Created successfully.</div>');
//
//
//    }
//
//
//
//
//
//    function update_user_modification() {
//        $this->load->library("form_validation");
//        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
//        $this->form_validation->set_rules("user_name", "user_name", "xss_clean");
//        $this->form_validation->set_rules("pass_word", "pass_word", "xss_clean");
//        $this->form_validation->set_rules("user_type", "user_type", "xss_clean");
//        $this->form_validation->set_rules("status", "status", "xss_clean");
//        $this->form_validation->set_rules("u_id", "u_id", "xss_clean");
//
//
//        $u_id = $this->input->post('u_id');
//
//
//        //zone change
//
//        // echo $company_code = $this->input->post('company_code');
//
//
//        //insert data to database
//
//        $data = array(
//            'full_name' => $this->input->post('full_name'),
//            'user_name' => $this->input->post('user_name'),
//            'pass_word' => $this->input->post('pass_word'),
//            'user_type' => $this->input->post('user_type'),
//            'status' => $this->input->post('status'),
//        );
//
//
//        $this->db->where('u_id', $u_id);
//        $this->db->update('admin_user', $data);
//    }



}
