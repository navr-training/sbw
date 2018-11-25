<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('home_view');
    }
}