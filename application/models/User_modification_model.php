<?php
ob_start();
class user_modification_model  extends CI_Model
{


    function get_user() {
        $this->db->order_by("user_name", "DESC");
        $query = $this->db->get("admin_user");
        return $query->result();
    }
    function get_certificate_id($table, $u_id){
        $result = $this->db->get_where($table, ['trainee_id' => $u_id])->row();
        return $result;
    }

    function get_user_modification_id($table, $user_name)
    {
        $result = $this->db->get_where($table, ['user_name' => $user_name])->row();
        return $result;
    }
    function get_inst_user_modification_id($table, $inst_user_id)
    {
        $result = $this->db->get_where($table, ['inst_user_id' => $inst_user_id])->row();
        return $result;
    }
	function get_trainee_user_modification_id($table, $trainee_username)
    {
        $result = $this->db->get_where($table, ['trainee_username' => $trainee_username])->row();
        return $result;
    }

    function create_user()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
        $this->form_validation->set_rules("user_name", "user_name", "xss_clean");
        $this->form_validation->set_rules("pass_word", "pass_word", "xss_clean");
        $this->form_validation->set_rules("user_type", "user_type", "xss_clean");
        $this->form_validation->set_rules("status", "status", "xss_clean");


            $data = array(
                'full_name' => $this->input->post('full_name'),
                'user_name' => $this->input->post('user_name'),
                'pass_word' => $this->input->post('pass_word'),
                'user_type' => $this->input->post('user_type'),
                'status'    => $this->input->post('status'),
            );

            $this->db->insert('admin_user', $data);

        }




    function update_user_modification() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
        $this->form_validation->set_rules("user_name", "user_name", "xss_clean");
        $this->form_validation->set_rules("pass_word", "pass_word", "xss_clean");
        $this->form_validation->set_rules("user_type", "user_type", "xss_clean");
        $this->form_validation->set_rules("status", "status", "xss_clean");
        $this->form_validation->set_rules("profile_image", "profile_image", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $profile_image = $_FILES['profile_image']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image');


            if ($profile_image != "") {
                $profile_image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $profile_image;
                $config['upload_path']      = 'uploads/admin';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('profile_image');

                $file_data = $this->upload->data();
            } else {
                $profile_image = $prev_image;
            }

            $u_id = $this->input->post('u_id');

            //zone change

            // echo $company_code = $this->input->post('company_code');


            //insert data to database

            $data = array(
                'full_name' => $this->input->post('full_name'),
                'user_name' => $this->input->post('user_name'),
                'pass_word' => $this->input->post('pass_word'),
                'user_type' => $this->input->post('user_type'),
                'profile_image' => $profile_image,
                'status' => $this->input->post('status'),
            );

            $this->db->where('u_id', $u_id);
            $this->db->update('admin_user', $data);
        }
    }

    function save_setting() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("setting_title", "setting_title", "xss_clean");
        $this->form_validation->set_rules("setting_tagline", "setting_tagline", "xss_clean");
        $this->form_validation->set_rules("setting_favicon", "setting_favicon", "xss_clean");
        $this->form_validation->set_rules("setting_logo", "setting_logo", "xss_clean");
        $this->form_validation->set_rules("setting_phone", "setting_phone", "xss_clean");
        $this->form_validation->set_rules("setting_telephone", "setting_telephone", "xss_clean");
        $this->form_validation->set_rules("setting_location", "setting_location", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $setting_favicon = $_FILES['setting_favicon']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image_favicon');


            if ($setting_favicon != "") {
                $setting_favicon = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $setting_favicon;
                $config['upload_path']      = 'uploads/setting';
                $config['allowed_types']    = 'gif|jpg|jpeg|png|webp';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('setting_favicon');

                $file_data = $this->upload->data();
            } else {
                $setting_favicon = $prev_image;
            }


            $setting_logo = $_FILES['setting_logo']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image_logo');


            if ($setting_logo != "") {
                $setting_logo = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $setting_logo;
                $config['upload_path']      = 'uploads/setting';
                $config['allowed_types']    = 'gif|jpg|jpeg|png|webp';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('setting_logo');

                $file_data = $this->upload->data();
            } else {
                $setting_logo = $prev_image;
            }

            $u_id = $this->input->post('setting_id');

            //zone change

            // echo $company_code = $this->input->post('company_code');


            //insert data to database

            $data = array(
                'setting_title' => $this->input->post('setting_title'),
                'setting_tagline' => $this->input->post('setting_tagline'),
                'setting_phone' => $this->input->post('setting_phone'),
                'setting_telephone' => $this->input->post('setting_telephone'),
                'setting_location' => $this->input->post('setting_location'),
                'setting_favicon' => $setting_favicon,
                'setting_logo' => $setting_logo,
            );

            $this->db->where('setting_id', $u_id);
            $this->db->update('setting', $data);
        }
    }



}
