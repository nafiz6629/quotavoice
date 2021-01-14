<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\Usermodel;
use App\Models\Quotationmodel;
use App\Models\Clientmodel;
use App\Models\Layoutmodel;
class LayoutController extends BaseController
{

    public function get_all_layouts()
    {
        $Layoutmodel = new Layoutmodel();
        return $result = $Layoutmodel->get_all_layouts();
    }



}