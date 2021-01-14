<?php namespace App\Models;

use CodeIgniter\Model;


class Layoutmodel extends Model{


    public function get_all_layouts()
    {
        $builder = $this->db->table("layouts")
                            ->get();
        return $builder->getResult();   
    }

    public function get_user_default_layout($layout_id)
    {
        $builder = $this->db->table("layouts")
                    ->where("layout_id",$layout_id)
                    ->get();
        return $builder->getResult();
    }



}