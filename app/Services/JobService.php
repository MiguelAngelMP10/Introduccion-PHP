<?php

namespace App\Services;

use App\Models\Job;

class JobService
{
    public function deleteJob($id)
    {
        $jobs = Job::find($id);
        $jobs->delete();
    }
}