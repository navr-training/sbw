<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_controller extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        // Login Check

        $exception_uris = array('login', 'login/logout', 'login/register', 'login/regSuccess', 'login/glogin');
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->session->userdata('loggedin') == FALSE) {
                redirect(base_url('login'));     
            }
        }
    }
}