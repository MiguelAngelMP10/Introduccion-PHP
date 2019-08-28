<?php 
namespace App\Controllers;
use App\Models\Job;

class JobsController{
    public function getAddJobAction($request){

        
        if (($request->getMethod() == 'POST') ) {
            $job = new Job();
            $body = $request->getParsedBody();
            $job->title = $body['title'];
            $job->description = $body['description'];
            $job->save();
        }
        
        include_once '../views/addJob.php';
        
    }
}


?>