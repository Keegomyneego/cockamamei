<?php

class accountController extends BaseController
{
    public function index()
    {
        session_start();

        $this->redirectIfNullOrEmpty($_SESSION['account_id'], '/' . __PROJECT_NAME);

        $account_id = $_SESSION['account_id'];

        /** @var Account $account */
        $account = Account::findById($account_id);

        $this->template->firstname = ucfirst($account->FirstName);
        $this->template->lastname = ucfirst($account->LastName);
        $this->template->render('account/index');
    }

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

            if($account->insert())
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }

    /**
     * login
     */
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        /** @var Account $account */
        $account = Account::findByProperties(array('EmailAddress' => $email));
        $account = $account[0];

        if(password_verify($password, $account->PassHashed))
        {
            session_start();
            $_SESSION['account_id'] = $account->AccountID;
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}
