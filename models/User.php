<?php

class User extends BaseDataAccess
{
    public $table = 'user';
    public $primary_key = 'id';

    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $created_on;
}
