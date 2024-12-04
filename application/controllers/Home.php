<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Get users count
        $this->db->from('users');
        $data['users_count'] = $this->db->count_all_results();

        // Get songs count
        $this->db->from('musics');
        $data['songs_count'] = $this->db->count_all_results();

        // Get favorites count
        $this->db->where('fav', '1');
        $this->db->from('musics');
        $data['favorites_count'] = $this->db->count_all_results();

        $data['content'] = 'app/home_content';
        $this->load->view('app/home', $data);
    }

    public function analyze_mood() {
        $data['content'] = 'app/pages/ai-music';
        $this->load->view('app/home', $data);
    }
}
