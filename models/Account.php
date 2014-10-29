<?php

class Account extends BaseDataAccess
{
    public $table = 'tblAccount';
    public $primary_key = 'AccountID';

    public $AccountID;
    public $FirstName;
    public $LastName;
    public $EmailAddress;
    public $PassHashed;
    public $Salt;
    public $CreatedOn;
}
