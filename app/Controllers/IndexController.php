<?php

namespace App\Controllers;

use App\Models\{Job, Project};


class IndexController extends BaseController
{
    public function indexAction()
    {


        $jobs = Job::all();
        $projects = Project::all();
        $limitMonths = 10;
        $jobs = array_filter($jobs->toArray(), function ($job) use ($limitMonths) {
            return $job['months'] >= $limitMonths;
        });

        $name = "Miguel Angel Muñoz Pozos";

        return $this->renderHTML('index.twig', [
            'name' => $name,
            'jobs' => $jobs
        ]);
    }
}