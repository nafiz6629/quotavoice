<?php namespace App\Models;

use CodeIgniter\Model;


class Usermodel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    //signup submit

    public function signupSubmit($data)
    {
        $this->db->table("users")->insert($data);
    }

    public function insertimg($data)
    {
		$session = session();
        
        if($session->get("loginemail")){

            $value = [
                "user_business_logo"=>$data
            ];
            $builder = $this->db->table("users");
            $builder->where("user_email",$session->get("loginemail"));        
            $builder->update($value);
        }
    }


    //sign in submit

    public function signinSubmit($data)
    {
        $builder = $this->db->table("users")
                        ->where('user_email', $data["email"])
                        ->where('user_password', $data["password"])
                        ->get();
        
        $result = $builder->getResult();
        if(empty($result)){
            echo "null";
        }
        else{
            
            $session = session();
            $session->set("loginemail", $result[0]->user_email);
            $session->set("loginid", $result[0]->user_id);
            echo "ok";
            
        }
        
    }


    public function updateIntoUserDetails($data)
    {
        $session = session();
        $user_details = [
            "yourGstin"=>$data["yourGstin"],
            "yourPan"=>$data["yourPan"],
            "yourState"=>$data["yourState"],
            $data[0]
        ];
        $jsonuser_details = json_encode($user_details);
        unset($data["yourGstin"]);
        unset($data["yourPan"]);
        unset($data["yourState"]);
        unset($data[0]);
        
        
        $builder = $this->db->table("users");
        $builder->where("user_email",$session->get("loginemail"));        
        $builder->update($data);
        $builder->where("user_email",$session->get("loginemail"));        
        $builder->set('user_details', $jsonuser_details);
        $builder->update();

    }

    public function getUserInfoById()
    {
        $session = session();
        $builder = $this->db->table("users")
                    ->where("user_id",$session->get("loginid"))
                    ->get();
        return $builder->getResult();
    }

    public function set_as_default($layout_id)
    {   
        $session = session();
        $builder = $this->db->table("users");
        $builder->where("user_email",$session->get("loginemail"));
        $builder->set("user_default_layout",$layout_id);        
        $builder->update();
        
    }

    public function get_user()
    {
        $session = session();
        $builder = $this->db->table("users")
                    ->where("user_id",$session->get("loginid"))
                    ->get();
        return $builder->getResult();
    }







}