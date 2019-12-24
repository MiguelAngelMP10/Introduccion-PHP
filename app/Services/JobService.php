<?php

namespace App\Services;

use App\Models\Job;
use Exception;

class JobService
{
    public function deleteJob($id)
    {
        $jobs = Job::findOrFail($id);
        $jobs->delete();
    }
}