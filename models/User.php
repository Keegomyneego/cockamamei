<?php 

class User extends BaseDataAccess
{
    public $table = 'user';
    public $primaryKey = 'id';

    public $id;
    public $email;
    public $password_hash;
    public $firstname;
    public $lastname;
    public $created_on;
}