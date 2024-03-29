<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load User Model
        $this->load->model('user_model', 'UserModel');
    }

    /**
     * User Register
     * --------------------------
     * @param: fullname
     * @param: username
     * @param: email
     * @param: password
     * --------------------------
     * @method : POST
     * @link : api/user/register
     */
    public function register_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|is_unique[users.username]|alpha_numeric|max_length[20]',
            array('is_unique' => 'This %s already exists please enter another username')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|max_length[80]|is_unique[users.email]',
            array('is_unique' => 'This %s already exists please enter another email address')
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            $insert_data = [
                'full_name' => $this->input->post('fullname', TRUE),
                'email' => $this->input->post('email', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
            ];

            // Insert User in Database
            $output = $this->UserModel->insert_user($insert_data);
            if ($output > 0 and !empty($output)) {
                // Success 200 Code Send
                $message = [
                    'status' => true,
                    'message' => "User registration successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                // Error
                $message = [
                    'status' => FALSE,
                    'message' => "Not Register Your Account."
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    /**
     * User Login API
     * --------------------
     * @param: username or email
     * @param: password
     * --------------------------
     * @method : POST
     * @link: api/user/login
     */
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // Load Login Function
            $output = $this->UserModel->user_login($this->input->post('username'), $this->input->post('password'));
            if (!empty($output) and $output != FALSE) {
                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token


                $token_data['id'] = $output->id;
                $token_data['full_name'] = $output->full_name;
                $token_data['username'] = $output->username;
                $token_data['password'] = $output->password;
                $token_data['email'] = $output->email;
                $token_data['created'] = $output->created;
                $token_data['change'] = $output->change;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);

                print_r($this->authorization_token->userData());
                // exit;
                // $this->load->view('vi/head');
                // $this->load->view('vi/vi_barang');
                // $this->load->view('vi/footer');
                $return_data = [
                    'user_id' => $output->id,
                    'full_name' => $output->full_name,
                    'email' => $output->email,
                    'created' => $output->created,
                    'token' => $user_token,
                ];
                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "User login successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}
