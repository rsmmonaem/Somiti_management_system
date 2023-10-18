<?php
ob_start();
class add_member_model  extends CI_Model
{

// Create Objection
    function create_member()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("member_name", "member_name", "xss_clean");
        $this->form_validation->set_rules("member_father_name", "member_father_name", "xss_clean");
        $this->form_validation->set_rules("member_mother_name", "member_mother_name", "xss_clean");
        $this->form_validation->set_rules("member_officer", "member_officer", "xss_clean");
        $this->form_validation->set_rules("member_registration_date", "member_registration_date", "xss_clean");
        $this->form_validation->set_rules("member_business", "member_business", "xss_clean");
        $this->form_validation->set_rules("member_dob", "member_dob", "xss_clean");
        $this->form_validation->set_rules("member_nid", "member_nid", "xss_clean");
        $this->form_validation->set_rules("member_gender", "member_gender", "xss_clean");
        $this->form_validation->set_rules("member_occupation", "member_occupation", "xss_clean");
        $this->form_validation->set_rules("member_religion", "member_religion", "xss_clean");
        $this->form_validation->set_rules("member_email", "member_email", "required|valid_email|is_unique[member.member_email]");
        $this->form_validation->set_rules("member_phone", "member_phone", "xss_clean");

        $this->form_validation->set_rules("member_address", "member_address", "xss_clean");
        $this->form_validation->set_rules("member_image", "member_image", "xss_clean");
        $this->form_validation->set_rules("member_nominee_relation", "member_nominee_relation", "xss_clean");
        $this->form_validation->set_rules("member_nominee_name", "member_nominee_name", "xss_clean");
        $this->form_validation->set_rules("member_nominee_dob", "member_nominee_dob", "xss_clean");
        $this->form_validation->set_rules("member_nominee_phone", "member_nominee_phone", "xss_clean");
        $this->form_validation->set_rules("member_nominee_nid", "member_nominee_nid", "xss_clean");
        $this->form_validation->set_rules("member_nominee_gender", "member_nominee_gender", "xss_clean");
        $this->form_validation->set_rules("member_nominee_address", "member_nominee_address", "xss_clean");



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/add_member');


        } else {

            $member_image = $_FILES['member_image']['name'];
            if ($member_image != "") {
                $member_image = random_string('alnum', 10) . '.jpg';

                //insert image
                $config['file_name'] = $member_image;
                $config['upload_path'] = 'uploads/member';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '100000';
                $config['encrypt_name'] = false;
                $config['image_library'] = 'gd2';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('member_image');

                $file_data = $this->upload->data();
            } else {
                $member_image = "default.png";
            }

            $user_id = $this->session->userdata('user_id');


            //insert data to database

            $data = array(
                'member_name' => $this->input->post('member_name'),
                'member_mother_name' => $this->input->post('member_mother_name'),
                'member_father_name' => $this->input->post('member_father_name'),
                'member_officer' => $this->input->post('member_officer'),
                'member_registration_date' => $this->input->post('member_registration_date'),
                'member_business' => $this->input->post('member_business'),
                'member_dob' => $this->input->post('member_dob'),
                'member_nid' => $this->input->post('member_nid'),
                'member_gender' => $this->input->post('member_gender'),
                'member_occupation' => $this->input->post('member_occupation'),
                'member_religion' => $this->input->post('member_religion'),
                'member_email' => $this->input->post('member_email'),
                'member_phone' => $this->input->post('member_phone'),

                'member_address' => $this->input->post('member_address'),
                'member_nominee_relation' => $this->input->post('member_nominee_relation'),
                'member_nominee_name' => $this->input->post('member_nominee_name'),
                'member_nominee_dob' => $this->input->post('member_nominee_dob'),
                'member_nominee_phone' => $this->input->post('member_nominee_phone'),
                'member_nominee_nid' => $this->input->post('member_nominee_nid'),
                'member_nominee_gender' => $this->input->post('member_nominee_gender'),
                'member_nominee_address' => $this->input->post('member_nominee_address'),
                'member_branch_id' => $this->input->post('member_branch_id'),
                'member_image' => $member_image,
                'member_created_by' => $user_id,

            );

            $this->db->insert('member', $data);

        }

    }

    function get_member() {
        $this->db->order_by("member_id", "DESC");
        $query = $this->db->get("member");
        return $query->result();
    }

    function get_member_branch($user_id) {
    //    $this->db->select('officer.*, member.*');
        $this->db->from('member');
  //      $this->db->join('officer', 'officer.officer_branch_id = member.member_branch_id', 'inner');
        $this->db->where("member.member_branch_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }



//    function get_loans_worker($id) {
//        $this->db->select('guarantor.*, member.*, loans.*');
//        $this->db->from('loans');
//        $this->db->join('guarantor', 'guarantor.guarantor_id = loans.loans_guarantor_id', 'inner');
//        $this->db->join('member', 'loans.loans_member_id = member.member_id', 'inner');
//        $this->db->where("loans.loans_created_by", $id);
//        $query = $this->db->get();
//        return $query->result();
//    }












    function get_member_worker($user_id) {
        $this->db->order_by("member_id", "DESC");
        $this->db->where("member_created_by", $user_id);
        $query = $this->db->get("member");
        return $query->result();
    }

    function get_member_id($table, $id)
    {
        $result = $this->db->get_where($table, ['member_id' => $id])->row();
        return $result;
    }

    function department_delete($dept_id) {
        $this->session_data();
        $dept_id = $this->uri->segment(3);
        $this->db->where('dept_id', $dept_id);
        $this->db->delete('department');
    }

    function update_member() {

        $this->load->library("form_validation");
		$this->form_validation->set_rules("member_name", "member_name", "xss_clean");
        $this->form_validation->set_rules("member_father_name", "member_father_name", "xss_clean");
        $this->form_validation->set_rules("member_mother_name", "member_mother_name", "xss_clean");
        $this->form_validation->set_rules("member_officer", "member_officer", "xss_clean");
        $this->form_validation->set_rules("member_registration_date", "member_registration_date", "xss_clean");
        $this->form_validation->set_rules("member_business", "member_business", "xss_clean");
        $this->form_validation->set_rules("member_dob", "member_dob", "xss_clean");
        $this->form_validation->set_rules("member_nid", "member_nid", "xss_clean");
        $this->form_validation->set_rules("member_gender", "member_gender", "xss_clean");
        $this->form_validation->set_rules("member_occupation", "member_occupation", "xss_clean");
        $this->form_validation->set_rules("member_religion", "member_religion", "xss_clean");
        $this->form_validation->set_rules("member_email", "member_email", "required|valid_email|is_unique[member.member_email]");
        $this->form_validation->set_rules("member_phone", "member_phone", "xss_clean");

        $this->form_validation->set_rules("member_address", "member_address", "xss_clean");
        $this->form_validation->set_rules("member_image", "member_image", "xss_clean");
        $this->form_validation->set_rules("member_nominee_relation", "member_nominee_relation", "xss_clean");
        $this->form_validation->set_rules("member_nominee_name", "member_nominee_name", "xss_clean");
        $this->form_validation->set_rules("member_nominee_dob", "member_nominee_dob", "xss_clean");
        $this->form_validation->set_rules("member_nominee_phone", "member_nominee_phone", "xss_clean");
        $this->form_validation->set_rules("member_nominee_nid", "member_nominee_nid", "xss_clean");
        $this->form_validation->set_rules("member_nominee_gender", "member_nominee_gender", "xss_clean");
        $this->form_validation->set_rules("member_nominee_address", "member_nominee_address", "xss_clean");

        if ($this->form_validation->run() != FALSE) {
            echo  $this->upload->display_errors();
			// echo"hi";
        } else {

            $member_image = $_FILES['member_image']['name'];

            //OLD IMAGE
            $prev_image = $this->input->post('old_image');


            if ($member_image != "") {
                $member_image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $member_image;
                $config['upload_path']      = 'uploads/member';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('member_image');

                $file_data = $this->upload->data();
            } else {
                $member_image = $prev_image;
            }

            $member_id = $this->input->post('member_id');


            //insert data to database

            $data = array(
                'member_name' => $this->input->post('member_name'),
                'member_mother_name' => $this->input->post('member_mother_name'),
                'member_father_name' => $this->input->post('member_father_name'),
                'member_officer' => $this->input->post('member_officer'),
                'member_registration_date' => $this->input->post('member_registration_date'),
                'member_business' => $this->input->post('member_business'),
                'member_dob' => $this->input->post('member_dob'),
                'member_nid' => $this->input->post('member_nid'),
                'member_gender' => $this->input->post('member_gender'),
                'member_occupation' => $this->input->post('member_occupation'),
                'member_religion' => $this->input->post('member_religion'),
                'member_email' => $this->input->post('member_email'),
                'member_phone' => $this->input->post('member_phone'),

                'member_address' => $this->input->post('member_address'),
                'member_nominee_relation' => $this->input->post('member_nominee_relation'),
                'member_nominee_name' => $this->input->post('member_nominee_name'),
                'member_nominee_dob' => $this->input->post('member_nominee_dob'),
                'member_nominee_phone' => $this->input->post('member_nominee_phone'),
                'member_nominee_nid' => $this->input->post('member_nominee_nid'),
                'member_nominee_gender' => $this->input->post('member_nominee_gender'),
                'member_nominee_address' => $this->input->post('member_nominee_address'),
                'member_image' => $member_image,


            );


            $this->db->where('member_id', $member_id);
            $this->db->update('member', $data);
        }
    }


}
