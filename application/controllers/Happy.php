<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Happy extends CI_Controller {
    public function index() {
        $data['content'] = 'app/pages/happy';
        $this->load->view('app/home', $data);
    }
}
