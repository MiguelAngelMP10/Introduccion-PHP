<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\ServerRequest;

class JobsController extends BaseController
{
    public function indexAction()
    {
        $jobs = Job::all();
        return $this->renderHTML("jobs/index.twig", compact('jobs'));
    }

    public function deleteAction(ServerRequest $request)
    {
        $params =  $request->getQueryParams();
        $jobs = Job::find($params['id']);
        $jobs->delete();
        return new RedirectResponse('/jobs');
    }

    public function getAddJobAction($request)
    {

        $responseMessage = null;

        if (($request->getMethod() == 'POST')) {

            $body = $request->getParsedBody();
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                ->key('description', v::stringType()->notEmpty());
            try {
                $jobValidator->assert($body);

                $files = $request->getUploadedFiles();
                $logo = $files['logo'];

                if ($logo->getError() == UPLOAD_ERR_OK) {
                    $fileName =  $logo->getClientFilename();
                    $logo->moveTo("uploads/$fileName");
                    $job = new Job();
                    $job->title = $body['title'];
                    $job->description = $body['description'];
                    $job->img = "uploads/$fileName";
                    $job->save();
                    $responseMessage = 'Saved';
                }
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]);
    }
}