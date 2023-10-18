<?php
ob_start();
class page_model extends CI_Model
{
    function about_us_id($table)
    {
        $result = $this->db->get_where($table, ['pages_id' => 1])->row();
        return $result;

    }

    function update_about_us() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("pages_title", "pages_title", "xss_clean");
        $this->form_validation->set_rules("pages_image", "pages_image", "xss_clean");
        $this->form_validation->set_rules("pages_description", "pages_description", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {

            $pages_image = $_FILES['pages_image']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image');


            if ($pages_image != "") {
                $pages_image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $pages_image;
                $config['upload_path'] = 'uploads/about';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pages_image');

                $file_data = $this->upload->data();
            } else {
                $pages_image = $prev_image;
            }

           // $pages_id = $this->db->get_where($table, ['pages_id' => 1])->row();

            //zone change


            //insert data to database

            $data = array(
                'pages_title' => $this->input->post('pages_title'),
                'pages_description' => $this->input->post('pages_description'),
                'pages_image' => $pages_image,
            );

            $this->db->where('pages_id', 1);
            $this->db->update('pages', $data);
        }
    }

    function contact_page_id($table)
    {
        $result = $this->db->get_where($table, ['con_id' => 1])->row();
        return $result;

    }

    function update_contact_page() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("con_title", "con_title", "xss_clean");
        $this->form_validation->set_rules("con_facebook", "con_facebook", "xss_clean");
        $this->form_validation->set_rules("con_instagram", "con_instagram", "xss_clean");
        $this->form_validation->set_rules("con_twitter", "con_twitter", "xss_clean");
        $this->form_validation->set_rules("con_youtube", "con_youtube", "xss_clean");
        $this->form_validation->set_rules("con_google", "con_google", "xss_clean");
        $this->form_validation->set_rules("con_email", "con_email", "xss_clean");
        $this->form_validation->set_rules("con_phone", "con_phone", "xss_clean");
        $this->form_validation->set_rules("con_address", "con_address", "xss_clean");

        $data = array(
            'con_title'     => $this->input->post('con_title'),
            'con_facebook'  => $this->input->post('con_facebook'),
            'con_instagram' => $this->input->post('con_instagram'),
            'con_twitter'   => $this->input->post('con_twitter'),
            'con_youtube'   => $this->input->post('con_youtube'),
            'con_email'     => $this->input->post('con_email'),
            'con_google'    => $this->input->post('con_google'),
            'con_address'   => $this->input->post('con_address'),
            'con_phone'     => $this->input->post('con_phone'),

        );

        $this->db->where('con_id', 1);
        $this->db->update('contact_page', $data);
    }


    function create_contact() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("ctm_name", "ctm_name", "xss_clean");
        $this->form_validation->set_rules("ctm_email", "ctm_email", "xss_clean");
        $this->form_validation->set_rules("ctm_subject", "ctm_subject", "xss_clean");
        $this->form_validation->set_rules("ctm_description", "ctm_description", "xss_clean");


        $data = array(
            'ctm_name'                        => $this->input->post('ctm_name'),
            'ctm_email'                       => $this->input->post('ctm_email'),
            'ctm_subject'                     => $this->input->post('ctm_subject'),
            'ctm_description'                 => $this->input->post('ctm_description'),


        );

        $this->db->insert('contact_message', $data);
        $this->session->set_flashdata('message', 'Message Send Successfully');

    }

    function get_contact_home() {
        $this->db->order_by("ctm_id", "DESC");
        $query = $this->db->get("contact_message",4);
        return $query->result();
    }

    function get_contact_message_list() {
        $this->db->order_by("ctm_id", "DESC");
        $query = $this->db->get("contact_message");
        return $query->result();
    }


}
