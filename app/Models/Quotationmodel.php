<?php namespace App\Models;

use CodeIgniter\Model;


class Quotationmodel extends Model{

    public function get_quotation_no()
    {
        // $builder = $this->db->table("quotations")
        //                     ->select("quotation_id")
        //                     ->getLastRow('array');
        $db = db_connect();
        $sql = "SELECT quotation_id FROM quotations";
        $query = $db->query($sql);
            
        return $query->getLastRow();
    }

    public function insertIntoQuotationDetails($quotation_details,$quotation_item_details,$quotation_terms_cond,$totalItemsAmount)
    {
		$session = session();

        // $new_item_array = [];
        // for($i=0;$i<count($data["firstPartNewItem"]);$i++){
        //     $arr = array($data["firstPartNewItem"][$i]=>$data["firstPartNewItem"][++$i]);
        //     echo json_encode($arr);
        //     array_push($new_item_array,$arr);
        //     // $i++;
        // }
        // unset($data["firstPartNewItem"]);
        // array_push($data,$new_item_array);
        // //$jss=json_encode($data);
        // // echo $data["firstPartNewItem"][0];
        // //echo $jss;
        //  echo json_encode($data);
        
        if($session->get("loginemail")){
            
            $value = [
                
                "user_id" =>$session->get("loginid"),
                "client_id" =>$session->get("clientid"),
                "quotation_info"=>json_encode($quotation_details),
                "quotation_item_details"=>json_encode($quotation_item_details),
                "quotation_terms_cond"=>json_encode($quotation_terms_cond),
                "quotation_total"=>$totalItemsAmount

            ];
                
            $builder = $this->db->table("quotations")->insert($value);

        }


    }


    public function getMyQuotation($user_id)
    {
        $builder = $this->db->table("quotations")
                            ->where("user_id",$user_id)
                            ->get();
        return $builder->getResult();
    }


    public function my_quotation()
    {
        $session = session();
        $db = db_connect();
        $sql = "SELECT * FROM clients INNER JOIN quotations ON clients.client_id=quotations.client_id  WHERE quotations.user_id=".$session->get("loginid");
        $query = $db->query($sql);
        return $query->getResult();
        
    }

    public function myquotation_by_id($quotation_id)
    {
        $builder = $this->db->table("quotations")
                            ->where("quotation_id",$quotation_id)
                            ->get();
        return $builder->getResult();
    }











//model ends
}