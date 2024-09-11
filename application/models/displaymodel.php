<?php
class DisplayModel extends CI_Model
{
    function getRows($limit, $offset)
    {
        $query = $this->db->select('userId,userName,password')
            ->from('lfy_users')
            ->limit($limit, $offset);
        $result = $query->get()->result_array();
        return $result;
    }
    function countRows()
    {
        $query = "select count(*) as count from lfy_users";
        $result = $this->db->query($query);
        return $result->result_array();
    }
}
