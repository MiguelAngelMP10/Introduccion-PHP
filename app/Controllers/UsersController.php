<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController
{
    public function getAddUserAction($request)
    {

        $responseMessage = null;

        if (($request->getMethod() == 'POST')) {

            $body = $request->getParsedBody();
            $userValidator = v::key('email', v::stringType()->notEmpty())
                ->key('password', v::stringType()->notEmpty());
            try {
                $userValidator->assert($body);
                $user = new user();
                $user->email = $body['email'];
                $user->password = password_hash($body['password'], PASSWORD_DEFAULT);
                $user->save();
                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('addUser.twig', [
            'responseMessage' => $responseMessage
        ]);
    }
}