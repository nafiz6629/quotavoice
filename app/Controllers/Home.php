<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
use App\Models\Quotationmodel;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$Quotationmodel = new Quotationmodel();
		$Usermodel = new Usermodel();
		$last_quotation_id=$Quotationmodel->get_quotation_no();
		$quotation_no = json_decode($last_quotation_id->quotation_id);
		$quotation_no +=1;
		$data["data"] = $quotation_no;
		if($session->get("loginid")){
			$data["user"] = $Usermodel->get_user();
		}
		// echo '<pre>';
		// print_r($data["user"]);
		return view('home/index',$data);
	}


	






}
