<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UsersModel extends CI_Model {

    public function getPaginatedUsers($limit, $offset) {
        // Fetch paginated data
        $query = $this->db->select('userId, userName, password')
                          ->limit($limit, $offset)
                          ->get('lfy_users');
        return $query->result_array();
    }

    public function getTotalUsersCount() {
        // Get total number of users for pagination
        return $this->db->count_all('lfy_users');
    }

    public function getAllUsers() {
        $query = $this->db->get('lfy_users');
        return $query->result_array();
    }
    public function getUsersById($id) {
        $query = $this->db->get_where('lfy_users', ['userId' => $id]);
        return $query->row_array();
    }

    public function getUserById($userId) {
        $query = $this->db->where('userId', $userId)->get('lfy_users');
        return $query->row_array(); // Fetch a single row
    }
}
