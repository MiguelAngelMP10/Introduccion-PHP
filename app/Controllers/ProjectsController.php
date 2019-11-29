<?php

namespace App\Controllers;

use App\Models\Project;
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController
{
    public function getAddProjectAction($request)
    {

        $responseMessage = null;

        if (($request->getMethod() == 'POST')) {

            $body = $request->getParsedBody();
            $projectValidator = v::key('title', v::stringType()->notEmpty())
                ->key('description', v::stringType()->notEmpty());
            try {
                $projectValidator->assert($body);
                $project = new project();
                $project->title = $body['title'];
                $project->description = $body['description'];
                $project->save();
                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('addproject.twig', [
            'responseMessage' => $responseMessage
        ]);
    }
}