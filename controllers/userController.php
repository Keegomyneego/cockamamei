<?php

class userController extends BaseController
{
    public function index() { }

    public function create()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $now = new DateTime('now');

        $a = password_hash($password, PASSWORD_DEFAULT);

        /** @var User $user */
        $user = new User();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->created_on = $now->format('Y-m-d H:i:s');
        $user->insert();
    }
}
