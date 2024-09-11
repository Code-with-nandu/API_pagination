<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('UsersModel');
    }

    // Function to return paginated users for the view
    public function viewPaginatedUsers() {
        // Get pagination parameters from query string
        $limit = $this->input->get('limit', TRUE) ?: 4; // default to 4
        $page = $this->input->get('page', TRUE) ?: 1;    // default to page 1

        $offset = ($page - 1) * $limit;

        // Get total number of users
        $total_users = $this->UsersModel->getTotalUsersCount();
        
        // Get paginated users
        $users = $this->UsersModel->getPaginatedUsers($limit, $offset);

        // Prepare pagination metadata
        $total_pages = ceil($total_users / $limit);
        $current_page = (int)$page;

        // Prepare data for the view
        $data = array(
            'users' => $users,
            'current_page' => $current_page,
            'total_pages' => $total_pages
        );

        // Load the view
        $this->load->view('users_view', $data);
    }

    // Function to return paginated users as JSON
    public function getPaginatedUsers() {
        // Get pagination parameters from query string
        $limit = $this->input->get('limit', TRUE) ?: 4; // default to 4
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

        // Output the response in JSON format
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
    public function getUserById($userId) {
        // Load the model
        $this->load->model('UsersModel');
    
        // Get the user data
        $user = $this->UsersModel->getUserById($userId);
    
        // Check if user exists
        if ($user) {
            // Prepare the response
            $response = array(
                'status' => true,
                'data' => $user
            );
        } else {
            // User not found
            $response = array(
                'status' => false,
                'message' => 'User not found'
            );
        }
    
        // Output the response in JSON format
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
    
}
