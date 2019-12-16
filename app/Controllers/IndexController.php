<?php

namespace App\Controllers;

use App\Models\{Job, Project};


class IndexController extends BaseController
{
    public function indexAction()
    {


        $jobs = Job::all();
        $projects = Project::all();
        $limitMonths = 5;
        // $filterFunction = function (array $job) use ($limitMonths) {
        //     return $job['months'] >= $limitMonths;
        // };
        // $jobs = array_filter($jobs->toArray(), $filterFunction);

        $name = "Miguel Angel Muñoz Pozos";

        return $this->renderHTML('index.twig', [
            'name' => $name,
            'jobs' => $jobs
        ]);
    }
}