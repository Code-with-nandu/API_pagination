<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('UsersModel');
    }

    // Function to return paginated users
    public function getPaginatedUsers() {
        // Get pagination parameters from query string
        $limit = $this->input->get('limit', TRUE) ?: 4; // default to 10
        $page = $this->input->get('page', TRUE) ?: 1;    // default to page 1

        $offset = ($page - 1) * $limit;

        // Get total number of users
        $total_users = $this->UsersModel->getTotalUsersCount();
        
        // Get paginated users
        $users = $this->UsersModel->getPaginatedUsers($limit, $offset);

        // Prepare pagination metadata
        $total_pages = ceil($total_users / $limit);
        $current_page = (int)$page;

        // Prepare the response
        $response = array(
            'status' => true,
            'total_users' => $total_users,
            'total_pages' => $total_pages,
            'current_page' => $current_page,
            'data' => $users
        );
        $data = array(
            'users' => $users,
            'current_page' => $current_page,
            'total_pages' => $total_pages
        );
        $this->load->view('users_view', $data);
        

        // Output the response in JSON format
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
}
