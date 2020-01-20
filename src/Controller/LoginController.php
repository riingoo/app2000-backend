<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController
{
    private $users = array(
        array("username" => "linda", "password" => "linda123"),
        array("username" => "nicole", "password" => "nicole123"),
        array("username" => "mirsa", "password" => "mirsa123"),
        array("username" => "finn", "password" => "finn123"),
        array("username" => "john", "password" => "john123"),
        array("username" => "farhad", "password" => "farhad123")
    );


    public function login(Request $request)
    {

        $user = json_decode($request->getContent());


        if ($this->isValidUser($user->username, $user->password)) {
            return new JsonResponse(
                null, Response::HTTP_OK
            );
        }

        return new JsonResponse(
            null, Response::HTTP_FORBIDDEN
        );
    }

    private function isValidUser($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user["username"] == $username && $user["password"] == $password) {
                return true;
            }
        }
        return false;
    }
}