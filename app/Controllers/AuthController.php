<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\ServerRequest;

class AuthController extends BaseController
{
    public function getLogin()
    {
        return $this->renderHTML('login.twig');
    }
    public function postLogin(ServerRequest $request)
    {

        $responseMessage = null;

        if (($request->getMethod() == 'POST')) {

            $body = $request->getParsedBody();
            try {
                $userValidator = v::key('email', v::stringType()->notEmpty())
                    ->key('password', v::stringType()->notEmpty());
                $userValidator->assert($body);
                $user = User::where('email', $body['email'])->first();
                if ($user) {
                    if (password_verify($body['password'], $user->password)) {
                        $_SESSION['userId'] = $user->id;
                        return new RedirectResponse('/admin');
                    } else {
                        $responseMessage = 'Las credenciales son incorrectas';
                    }
                } else {
                    $responseMessage =  'Las credenciales son incorrectas';
                }
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
            return $this->renderHTML('login.twig', [
                'responseMessage' => $responseMessage
            ]);
        }
    }

    public function getLogout()
    {
        unset($_SESSION['userId']);
        return new RedirectResponse('/login');
    }
}