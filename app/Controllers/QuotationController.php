<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
use App\Models\Quotationmodel;
use App\Models\Clientmodel;
use App\Models\Layoutmodel;
class QuotationController extends BaseController
{

    public function getMyQuotation()
    {
        $session = session();
		$Quotationmodel = new Quotationmodel();
        $result=$Quotationmodel->getMyQuotation($session->get("loginid"));
        echo "<pre>";
        // print_r($result[0]);
        //echo $result[0]->user_id;//first part

        // $jsonresult = json_decode($result[0]->quotation_info);//secount part
        //echo $jsonresult->quotation_date;//secount part

        //$jsonresult2= json_decode($result[0]->quotation_item_details);//third part
        //echo $jsonresult2[0][0]->item_name;//third part
        //echo $jsonresult2[0][1]->item_name;//third part
        
        // $jssonresult4 = json_decode($result[0]->quotation_item_details);
        // foreach($jssonresult4[1] as $key=>$value){
        //     print_r($key.'=>'.$value);
        // }//fourth part
        // print_r($jssonresult4[1]);

        // $jsonr5  =json_decode($result[0]->quotation_terms_cond);
        // print_r($jsonr5->quotation_terms_cond[0]);//fifth part

        // echo $result[0]->quotation_info;

        // echo json_decode($result[0]->quotation_info);
        // echo $result->user_id;
    }

    public function my_quotation()
    {
        $Quotationmodel = new Quotationmodel();
        $Clientmodel  = new  Clientmodel();
        $Layoutmodel = new Layoutmodel();
        $Usermodel = new Usermodel();



        $result["data"] = $Quotationmodel->my_quotation();
        $result["layouts"] = $Layoutmodel->get_all_layouts();
        $result["user"] = $Usermodel->get_user();
        // echo "<pre>";
        // print_r($result["user"][0]->user_default_layout);
        $result["user_layout"] = $Layoutmodel->get_user_default_layout($result["user"][0]->user_default_layout);
        // print_r($result["user_layout"]);
        // foreach($result as $value){
        //     print_r(json_decode($value->quotation_info));
        // }
        // foreach($result["layouts"] as $vvv){
        //     echo $vvv;
        // }
        
        // $result["quotation_info"] = json_decode($result[0]->quotation_info);
        // print_r($result);
        return view("home/myquotation",$result);
    }

    public function myquotation_by_id($quotation_id,$client_id,$layout_file_name)
    {
        $Quotationmodel = new Quotationmodel();
        $Clientmodel  = new  Clientmodel();
        $Usermodel = new Usermodel();


        $result["quotation"] = $Quotationmodel->myquotation_by_id($quotation_id);
        $result["client"] = $Clientmodel->getClientInfoById($client_id);
        $result["user"] = $Usermodel->getUserInfoById();
        // echo "<pre>";
        // $js= json_decode($result["quotation"][0]->quotation_terms_cond);
        // print_r($js->quotation_terms_cond);
        // foreach($js->quotation_terms_cond as $v){
        //     echo $v;
        // }
        // echo $js[0][0]->item_qty;
        // echo $js[0][0]->item_rate;
        // echo $js[0][0]->item_discount;
        // echo $js[0][0]->item_discount_sign;
        // foreach($js[0] as $vv){
        //     echo $vv->item_name;
        // }
        // print_r($result["quotation"][0]->quotation_terms_cond);
        // return view("home/layouts/layout-1",$result);
        // return redirect("QuotationController/get_layout_view");
        return view("home/layouts/".$layout_file_name."",$result);

    }

    //layouts part

    public function view_layout_selection()
    {
        $Layoutmodel = new Layoutmodel();

        $result["layouts"] = $Layoutmodel->get_all_layouts();

        return view("home/layoutselection",$result);
    }

    public function set_as_default($layout_id)
    {
        $Usermodel = new Usermodel();
        $Usermodel->set_as_default($layout_id);
        return redirect()->to("/QuotationController/my_quotation");
    }

    //





}