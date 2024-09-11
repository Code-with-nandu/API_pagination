<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Make sure you use the correct namespace
use chriskacerguis\RestServer\RestController;

require_once APPPATH . 'vendor/autoload.php'; // Make sure the path is correct

class UsersAPI extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    // API to get all users
    public function users_get() {
        $users = $this->UsersModel->getAllUsers();
        $this->response($users, RestController::HTTP_OK); // Send the data in JSON format
    }

    // API to get a user by ID
    public function user_get($id) {
        $user = $this->UsersModel->getUsersById($id);

        if ($user) {
            $this->response($user, RestController::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'User not found'], RestController::HTTP_NOT_FOUND);
        }
    }
}
