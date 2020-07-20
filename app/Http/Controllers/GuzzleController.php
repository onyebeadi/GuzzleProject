<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use App\Traits\ApiResponser;
class GuzzleController extends BaseController
{
    use ApiResponser;
    //

    public function getData($id){
        $client = new Client(['headers'=>['content-type'=>'application/json' ,'Accept' => 'application/json' ],]);
        if($id != 1){
            return $this->errorResponse('Invalid Index', 404);
        }
        $response = $client->request('GET','https://petstore.swagger.io/v2/pet/'.$id);
        $data = $response->getBody();
        $data = json_decode($data);
        return $this->successResponse($data);
    }

    public function postData(){

    }

    public function deleteData(){

    }
    public function updateData(){

    }

}
