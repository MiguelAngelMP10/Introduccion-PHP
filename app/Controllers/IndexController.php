<?php
namespace App\Controllers;
use App\Models\{Job, Project};


class IndexController{
    public function indexAction(){
        
        $jobs = Job::all();
        $projects = Project::all();

        $name = "Miguel Angel Muñoz Pozos";
        $limitMonths = 2000;
    
        include_once '../views/index.php';

    }
}

?>