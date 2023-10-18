<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');

    }
    public function session_data(){
        $this->load->library('session');
    }


    public function index() {
        $this->load->library('session');
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->view('home/index', $data );

    }

    public function contact(){
        $this->load->library('session');
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');
        $this->load->model('page_model', 'pm');
        $data['contact'] = $this->pm->contact_page_id('contact_page');
        $this->load->view('home/contact', $data );
    }

    public function contact_message_send() {
        $this->session_data();
        $this->load->model('page_model', 'pm');
        $this->pm->create_contact();
        redirect('home/successful');
    }

    public function about() {
        $this->load->library('session');
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->model('page_model', 'pm');
        $data['about'] = $this->pm->about_us_id('pages');

        $this->load->view('home/about', $data );

    }


    public function application(){
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->session_data();

        $sessiondata = array(
            'nid' => $this->input->post('nid'),
        );

        $this->session->set_userdata($sessiondata);



        $this->load->view('home/application', $data);
    }

    public function certificate(){
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->session_data();

        $sessiondata = array(
            'nid' => $this->input->post('nid'),
        );

        $this->session->set_userdata($sessiondata);



        $this->load->view('home/certificate', $data);
    }

//    public function certificate_list(){
//        $this->load->model('add_department_model', 'adm');
//        $this->load->model('add_slider_model', 'asm');
//        $data['data'] = $this->asm->get_slider();
//
//        $this->load->model('add_notice_model', 'anm');
//        $this->load->model('Add_news_model', 'amn');
//
//        $this->load->model('add_institute_model', 'aim');
//
//        $this->session_data();
//
//        $sessiondata = array(
//            'nid' => $this->input->post('nid'),
//        );
//
//        $this->session->set_userdata($sessiondata);
//
//        $this->load->view('home/certificate_list', $data);
//    }

    public function certificate_check(){

        $this->session_data();
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');


        $inputNumber = $this->input->post('nid');
        // Query the database for matching numbers
        $this->db->select('trainee_nid');
        $this->db->from('trainee');
        $this->db->where('trainee_nid', $inputNumber);
        $this->db->where('certificate_status', "Complete");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Matching number found

            $this->db->where('trainee_nid', $inputNumber);
            $this->db->where('certificate_status', "Complete");
            $history = $this->db->get('trainee');
            $data['history1'] =  $history->result();
            $data['history2'] =  $history->row();

            $this->load->view('home/certificate_list',$data);
        } else {
            echo "Nothing Found";
        }
    }






    public function success(){
        $this->load->view('home/success');
    }
    public function successful(){
        $this->load->view('home/successful');
    }

    public function nid_check(){

        $this->session_data();
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');


        $inputNumber = $this->input->post('nid');
        // Query the database for matching numbers
        $this->db->select('trainee_nid');
        $this->db->from('trainee');
        $this->db->where('trainee_nid', $inputNumber);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Matching number found

            $this->db->where('trainee_nid', $inputNumber);
            $histry = $this->db->get('trainee');
            $data['histry1'] =  $histry->result();
            $data['histry2'] =  $histry->row();

            $this->load->view('home/trainee_history',$data);
        } else {

            $this->load->model('add_slider_model', 'asm');
            $data['data'] = $this->asm->get_slider();

            $this->load->model('add_notice_model', 'anm');
            $this->load->model('Add_news_model', 'amn');



            $this->load->model('add_institute_model', 'aim');
            $data['dataa'] = $this->aim->get_institute();

            $this->load->model('add_department_model', 'adm');
            $data['dept']=$this->adm->get_department();

            $data['nid'] = $inputNumber;

            $this->load->view('home/trainee_info', $data);
        }
    }


    public function save_trainee() {
        $this->session_data();
        $this->load->model('add_trainee_model', 'atm');
        $this->atm->create_trainee();
        redirect('home/success');
    }

    public function add_another_course($nid) {
        $this->session_data();
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');
        $data['dataa'] = $this->aim->get_institute();

        $this->load->model('add_department_model', 'adm');
        $data['dept']=$this->adm->get_department();

        $this->load->model('add_trainee_model', 'atm');
        $data['trainee'] = $this->atm->get_trainee_nid('trainee',$nid);
        $this->load->view('home/add_another_course',$data);
    }
    public function save_another_course() {
        $this->session_data();
        $this->load->model('add_trainee_model', 'atm');
        $this->atm->create_another_trainee();
        redirect('home/success');
    }


    public function institute() {
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->view('home/institute_list', $data );

    }

    public function news_list() {
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->view('home/news_list', $data );

    }
    public function department_list() {
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->view('home/department_list', $data );

    }

    public function notice_list() {
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();

        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $this->load->view('home/notice_list', $data );

    }

    public function institute_details($id){
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();
        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');

        $this->load->model('add_institute_model', 'aim');

        $data['institute'] = $this->aim->get_institute_details_id('institute', $id);

        $this->db->where("inst_rel_id", $id);
        $data['department'] = $this->db->get('department')->result();


        $this->load->view('home/institute_details', $data);
    }

    public function course_details($id){

        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();
        $this->load->model('add_notice_model', 'anm');
        $this->load->model('Add_news_model', 'amn');
        $this->load->model('add_institute_model', 'aim');

        $this->load->model('add_department_model', 'adm');
        $data['course'] = $this->adm->get_department_id('department', $id);

        $this->load->view('home/course_details', $data);
    }

    public function notice($id){
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();
        $this->load->model('add_institute_model', 'aim');
        $this->load->model('Add_news_model', 'amn');
        $this->load->model('add_notice_model', 'anm');
        $data['notice'] = $this->anm->get_notice_details('notice',$id);


        $this->load->view('home/notice', $data);
    }

    public function news($id){
        $this->load->model('add_department_model', 'adm');
        $this->load->model('add_slider_model', 'asm');
        $data['data'] = $this->asm->get_slider();
        $this->load->model('add_institute_model', 'aim');

        $this->load->model('Add_news_model', 'amn');
        $this->load->model('add_notice_model', 'anm');
        $data['news'] = $this->amn->get_news_details('news',$id);

        $this->load->view('home/news', $data);
    }


    public function ajax_test(){
        $this->load->helper('url');

        $this->load->model('ajax_test_model', 'atm');
        $data['institutes'] = $this->atm->get_institute_ajax();

        $this->load->view('home/ajax_test', $data );
     }

    public function get_department_data(){
        // POST data
        $postData = $this->input->post();

        //load model
        $this->load->model('ajax_test_model');

        // get data
        $data = $this->ajax_test_model->get_department_ajax($postData);

        echo json_encode($data);
    }

    public function trainee_certificate($id) {
        $this->load->helper('url');
        $this->load->helper('xml');
        $this->session_data();
        $this->load->model('add_trainee_model', 'atm');
        $data['data'] = $this->atm->get_trainee_certificate('trainee',$id);
        $this->load->view('home/trainee_certificate', $data);
    }











}
