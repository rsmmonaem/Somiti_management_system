<?php
ob_start();
class ajax_test_model  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    function get_institute_ajax() {
        $this->db->order_by("inst_id", "DESC");
        $query = $this->db->get("institute");
        return $query->result();
    }


//    function get_department_ajax($inst_id)
//    {
//        $this->db->where('inst_rel_id', $inst_id);
//        $this->db->order_by('dept_id', 'DESC');
//        $query = $this->db->get('department')->result();
////        $output = '<option value="">Select Course</option>';
////        foreach($query->result() as $row)
////        {
////            $output .= '<option value="'.$row->dept_id.'">'.$row->dept_name.'</option>';
////        }
////        return $output;
//    }

    function get_department_ajax($postData){
        $response = array();

        // Select record
        $this->db->select('dept_id,dept_name');
        $this->db->where('inst_rel_id', $postData['inst_rel_id']);
        $q = $this->db->get('department');
        $response = $q->result_array();

        return $response;
    }


}
