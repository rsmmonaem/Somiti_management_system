<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }


    public function login_process() {
        $user_name      = $_POST["user_name"];
        $pass_word      = $_POST["pass_word"];
        $status      = "DISABLE";

        $qry = "SELECT count(*) as cnt from admin_user where user_name= '$user_name'";
        $res = $this->db->query($qry, array($user_name))->result();

        if ($res[0]->cnt == 0) {
            $_SESSION['error'] = 'Wrong Username!';

            redirect("login");
        } else {
            $qry_status = "SELECT count(*) as cnt_status from admin_user where user_name='$user_name' AND status = 'ENABLE'";
            $res_status = $this->db->query($qry_status)->result();

            if ($res_status[0]->cnt_status == 0) {
                $this->session->set_flashdata('account_disabled', 'Account Disabled!');
                redirect("login");
            }

            $qry2 = "SELECT count(*) as cnt from admin_user where pass_word= '$pass_word' AND user_name='$user_name'";
            $res2 = $this->db->query($qry2, array($pass_word))->result();
            if ($res2[0]->cnt == 0) {
                $_SESSION['error'] = 'Wrong Password!';

                redirect("login");
            } else {

                $this->session->set_userdata('user_name', $user_name);

                //check user type
                $this->db->where('user_name', $user_name);
                //$query= $this->db->get("admin_user");
                $user_type = $this->db->get("admin_user")->row()->user_type;
                $this->session->set_userdata('user_type', $user_type);
                $this->db->where('user_name', $user_name);
                $user_id = $this->db->get("admin_user")->row()->user_id;
                $this->session->set_userdata('user_id', $user_id);
                $this->db->where('user_name', $user_name);
                $status = $this->db->get("admin_user")->row()->status;
                $this->session->set_userdata('status', $status);

                if ($user_type == "super_admin") {
                    $_SESSION['success'] = 'Welcome to Dashboard';
                    redirect("super_admin");
                }
                if ($user_type == "field_worker") {
                    $_SESSION['success'] = 'Welcome to Dashboard';
                    redirect("field_worker");
                }
                if ($user_type == "branch_manager") {
                    $_SESSION['success'] = 'Welcome to Dashboard';
                    redirect("branch_manager");
                }
            }
        }
    }

    /*******LOGOUT FUNCTION *******/
//    function logout() {
//        // $this->session->unset_userdata();
//        $this->session->unset_userdata("user_name");
//        $this->session->unset_userdata("user_type");
//        $this->session->unset_userdata("user_id");
//        $this->session->unset_userdata("status");
//        $this->session->sess_destroy();
//        $this->session->set_flashdata('logout_notification', 'logged_out');
//        redirect("login");
//    }
    public function logout()
    {

        $this->session->sess_destroy();

        redirect(base_url());
        $_SESSION['success'] = 'Logout Successful';
    }


    public function index() {
        // Check if the user is logged in
        if ($this->session->userdata('user_name')) {
            // If logged in, redirect to the homepage
            redirect(base_url());
        } else {
            // Fetch the user's type from the database based on their user_name
            $user_name = $this->session->userdata('user_name');
            $query = $this->db->get_where("admin_user", array('user_name' => $user_name));

            // Check if there are rows in the result
            if ($query->num_rows() > 0) {
                // User found in the database, get their user_type
                $user_type = $query->row()->user_type;

                // Determine where to redirect based on user_type
                if ($user_type == "super_admin") {
                    redirect("super_admin");
                } elseif ($user_type == "field_worker") {
                    redirect("field_worker");
                } elseif ($user_type == "branch_manager") {
                    redirect("branch_manager");
                } else {
                    // Handle the case when the user type is not recognized
                    echo "Invalid user type";
                }
            } else {
                // Handle the case when no user is found with the given user_name
                $this->load->view('super_admin/login');
            }
        }
    }


}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
