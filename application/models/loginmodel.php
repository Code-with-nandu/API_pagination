<?php
class LoginModel extends CI_Model
{
    function check($userName, $password)
    {
        $query = "select count('userName') as count from lfy_users where userName='$userName' and password='$password'";
        $result = $this->db->query($query);
        return $result->result_array();
    }
}
