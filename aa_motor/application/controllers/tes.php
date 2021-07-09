<?php

require APPPATH . 'libraries/REST_Controller.php';

class tes extends REST_controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = 'Pesan untuk response';

        $this->response($response);
    }
    public function user_get()
    {
        $response['status'] = 200;
        $response['error'] = false;
        $response['user']['username'] = 'Jono';
        $response['user']['email'] = 'Jono@poltekpos.id';
        $response['user']['detail']['full_name'] = 'Jono';
        $response['user']['detail']['position'] = 'Programmer';
        $response['user']['detail']['specialize'] = 'Android, IOS, WEB, Desktop';

        $this->response($response);
    }
}
