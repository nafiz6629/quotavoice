<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
class UserController extends BaseController
{

    //photo upload 

    public function photoUpload()
    {
        $Usermodel = new Usermodel();
        $request = service('request');
        $file = $this->request->getFile('file');

        $img = file_get_contents($file);
        $base = base64_encode($img);
        $Usermodel->insertimg($base);

    }












}