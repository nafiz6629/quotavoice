<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
class LogoutController extends BaseController
{

    public function logout()
	{
		$session = session();
		$session->destroy();
		echo "<script type='text/javascript' > alert('logging out....')</script>";
		return redirect()->to("/");
	}




}