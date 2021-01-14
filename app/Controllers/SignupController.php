<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
class SignupController extends BaseController
{

	public function signupSubmit()
	{
		$request = service('request');
		$Usermodel = new Usermodel();
		$data=$request->getPost();
	
		$Usermodel->signupSubmit($data);
		
		
		
	}









}