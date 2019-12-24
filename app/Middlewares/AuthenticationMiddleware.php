<?php

namespace App\Middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\EmptyResponse;

class AuthenticationMiddleware implements MiddlewareInterface
{
    /**
     * process
     *
     * @param  mixed $request
     * @param  mixed $handler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        if ($request->getUri()->getPath() === '/admin') {
            $sessionUserId = $_SESSION['userId'] ?? null;
            if (!$sessionUserId) {
                return new EmptyResponse(401);
            }
        }

        return $handler->handle($request);
    }
}