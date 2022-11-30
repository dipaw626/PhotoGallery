<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu_model extends CI_Model
{
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

        return $this->db->query($query)->result_array();
    }

    // public function getAccountuser()
    // {
    //     $queryAkun = "SELECT `user`.*, `user_role`.`role` 
    //                 FROM `user` JOIN `user_role`
    //                 ON `user`.`role_id` = `user_role`.`id`
    //             ";

    //     return $this->db->query($queryAkun)->result_array();
    // }
}
