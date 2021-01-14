<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
use App\Models\Quotationmodel;
use App\Models\Clientmodel;
class SigninController extends BaseController
{

    public function signinView()
	{
		return view('home/signin');
	}


    public function signinCheck()
	{
		
		$session = session();
		$request = service('request');
		$Usermodel = new Usermodel();
		$Quotationmodel = new Quotationmodel();
		$Clientmodel = new Clientmodel();
		// $session->remove("loginemail");
		if($session->get("loginemail")){
				
				$data=$request->getPost();
				// echo $data["datepicker"];
				// echo json_encode($data);
				
				//update into user ↓
				$userInfo=$data;
				$count=0;
				foreach($userInfo as $key => $value){
					if($count>=2 && $count <=11){
						// array_push($userInfo,$value);
					}
					else{
						unset($userInfo[$key]);
					}
					$count++;
				}
				array_push($userInfo,$data["secondPartNewItem"]);
				//echo json_encode($userInfo);				  
				$Usermodel->updateIntoUserDetails($userInfo);	

				//update or insert into client ↓
				$clientInfo=$data;
				$count=0;
				foreach($clientInfo as $key => $value){
					if($count>=12 && $count <=21){
						// array_push($userInfo,$value);
					}
					else{
						unset($clientInfo[$key]);
					}
					$count++;
				}
				array_push($clientInfo,$data["secondPartClientNewItem"]);
				// echo json_encode($clientInfo);				  
				$Clientmodel->updateIntoClientDetails($clientInfo);	

				//insert into quotation  ↓
				// echo json_encode($data["fourthPartNewItems"]);
				$quotation_terms_cond = [
					"quotation_terms_cond"=>$data["sixthPartTermsCondition"],
					"addNotes"=>$data["addNotes"]
				];
				$quotation_details = [
					$data["fourthPartNewItems"],
					$data["fifthPartAddAdditionalcharge"],
					$data["discountValue"],
					$data["discountSelect"],	
				];
				$quotationInfo=[
					"quotation_no"=>$data["quotationNoValue"],
					"quotation_date"=>$data["quotationDate"],
					$data["firstPartNewItem"],

				];
				$totalItemsAmount = $data["totalItemsAmount"];
				// echo json_encode($quotation_terms_cond);
				$Quotationmodel->insertIntoQuotationDetails($quotationInfo,$quotation_details,$quotation_terms_cond,$totalItemsAmount);
				


		}
		else{
			echo "not login";
			
		}
	
    }
    
    public function signinSubmit()
	{
		$request = service('request');
		$Usermodel = new Usermodel();
		$data=$request->getPost();
	
		$Usermodel->signinSubmit($data);
	}








}