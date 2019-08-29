<?php 
namespace App\Controllers;
use App\Models\Job;

class JobsController extends BaseController {
    public function getAddJobAction($request){


        if (($request->getMethod() == 'POST') ) {
            $job = new Job();
            $body = $request->getParsedBody();
            $job->title = $body['title'];
            $job->description = $body['description'];
            $job->save();
        }
        

        echo $this->renderHTML('addJob.twig');
        
    }
}


?>