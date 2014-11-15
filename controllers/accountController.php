<?php

class accountController extends BaseController
{
    public function index() { }

    /**
     * create
     */
    public function create()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $now = new DateTime('now');
        $salt = uniqid(mt_rand(), true);

        if(!Account::existByProperties(array('EmailAddress' => $email)))
        {
            /** @var Account $account */
            $account = new Account();
            $account->FirstName = $firstname;
            $account->LastName = $lastname;
            $account->EmailAddress = $email;
            $account->PassHashed = password_hash($password, PASSWORD_DEFAULT, array('salt' => $salt));
            $account->Salt = $salt;
            $account->CreatedOn = $now->format('Y-m-d H:i:s');
            echo $account->insert();
        }
    }

    /**
     * login
     */
    public function login()
    {
        $a = 'hello';
    }
}
