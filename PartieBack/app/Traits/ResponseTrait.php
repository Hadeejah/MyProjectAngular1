<?php

namespace App\Traits;

use PhpParser\Builder\Trait_;

trait ResponseTrait
{
     public function formatResponse($success,$data,$message)  {
        return response()->json([
            "succes"=>$success,
            "data"=>$data,
            "message"=>$message,
        ]);

     }
}