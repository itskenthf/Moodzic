<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('App_model', 'DbApp');
        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data['content'] = 'app/main-content';

		$data['sads'] = $this->DbApp->playlist('1', $this->user_id);
		$data['happys'] = $this->DbApp->playlist('2', $this->user_id);
		$data['calms'] = $this->DbApp->playlist('3', $this->user_id);
		$data['playlists'] = $this->DbApp->playlist('4', $this->user_id);

		$data['music_player'] = get_any_table_array(array('user_id' => $this->user_id), 'musics');

		$this->load->view('app/home', $data);
	}

	public function getRandomSong() {
		// Get a random song from the database
		$this->db->order_by('RAND()');
		$this->db->limit(1);
		$query = $this->db->get('songs'); // Replace 'songs' with your actual table name

		if ($query->num_rows() > 0) {
			$song = $query->row();
			echo json_encode([
				'status' => 'success',
				'song' => [
					'id' => $song->id,
					'title' => $song->title,
					'file_path' => $song->file_path,
					// Add other song details as needed
				]
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'No songs found'
			]);
		}
	}

	public function addToPlaylist() {
		// Check if user is logged in
		if (!$this->user_id) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Please login to add songs to your playlist'
			]);
			return;
		}

		// Get song details from POST data
		$song_name = $this->input->post('song_name');
		$artists = $this->input->post('artists');
		$file_url = $this->input->post('file_url');

		// Validate input
		if (!$song_name || !$file_url) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Invalid song details'
			]);
			return;
		}

		// Prepare data for insertion
		$data = array(
			'user_id' => $this->user_id,
			'name' => $song_name,
			'singer' => $artists,
			'filename' => basename($file_url),
			'path' => dirname($file_url),
			'category' => '4', // Category 4 is for "My Playlist"
			'created_at' => date('Y-m-d H:i:s')
		);

		// Insert into playlist table
		try {
			$this->db->insert('musics', $data);
			echo json_encode([
				'status' => 'success',
				'message' => 'Song added to playlist successfully'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Failed to add song to playlist'
			]);
		}
	}

	public function getMyPlaylist() {
		$playlists = $this->DbApp->playlist('4', $this->user_id);
		echo json_encode(['songs' => $playlists]);
	}
}
