<?php namespace App\Models;

use CodeIgniter\Model;


class Clientmodel extends Model{

    public function updateIntoClientDetails($data)
    {
        $session = session();
        $builder = $this->db->table("clients");
        $client_details = [
            "clientGstin"=>$data["clientGstin"],
            "clientPan"=>$data["clientPan"],
            "clientState"=>$data["clientState"],
            $data[0]
        ];
        $jsonclient_details = json_encode($client_details);
        unset($data["clientGstin"]);
        unset($data["clientPan"]);
        unset($data["clientState"]);
        unset($data[0]);
        $builder = $this->db->table("clients")
                        ->where('client_email', $data["client_email"])
                        ->get();
        
        $result = $builder->getResult();
        if(empty($result)){
            
            $this->db->table("clients")->insert($data);
            

        }
        else{
            $builder = $this->db->table("clients");
            $builder->where("client_email",$data["client_email"]);        
            $builder->update($data);
            //$builder->where("client_email",$data["client_email"]);        
        }
        $builder = $this->db->table("clients");
        $builder->where("client_email",$data["client_email"]); 
        $builder->set('client_details', $jsonclient_details);
        $builder->update();
        
        //client id to session
        $builder = $this->db->table("clients")
                        ->where('client_email', $data["client_email"])
                        ->get();
        $result = $builder->getResult();
        $session->set("clientid", $result[0]->client_id);
        
    }

    public function getClientInfoById($client_id)
    {
        $builder = $this->db->table("clients")
                            ->where("client_id",$client_id)
                            ->get();
        return $builder->getResult();
    }

    // public function getClientInfoById()
    // {
    //     $db = db_connect();
    //     $sql = "SELECT client_email FROM clients INNER JOIN quotations ON clients.client_id=quotations.client_id";
    //     $query = $db->query($sql);
    //     return $query->getResult();
    // }





}