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
		if (!$this->user_id) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Please login to add songs to your playlist'
			]);
			return;
		}

		$song_name = $this->input->post('song_name');
		$artists = $this->input->post('artists');
		$filename = $this->input->post('filename');
		$path = './uploads/musics'; // Fixed path prefix
		$original_filename = $this->input->post('original_filename');

		// Check if song already exists for this user
		$exists = $this->db->where([
			'user_id' => $this->user_id,
			'filename' => $filename
		])->get('musics')->num_rows() > 0;

		if ($exists) {
			echo json_encode([
				'status' => 'exists',
				'message' => 'This song is already in your playlist'
			]);
			return;
		}

		if (!$song_name || !$filename) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Invalid song details'
			]);
			return;
		}

		$data = array(
			'user_id' => $this->user_id,
			'name' => $song_name,
			'singer' => $artists,
			'filename' => $filename,
			'original_filename' => $original_filename,
			'path' => $path,
			'category' => 4,
			'create_dt' => date('Y-m-d H:i:s'),
			'duration' => '00:02:50', // Fixed duration format
			'fav' => 0
		);

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
