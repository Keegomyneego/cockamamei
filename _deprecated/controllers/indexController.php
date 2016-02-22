<?php

require_once 'assets/modules/Aws/aws.phar';

use Aws\Common\Aws;
use Aws\S3\S3Client;

class indexController extends BaseController
{
    /**
     * index
     */
    public function index()
    {
        session_start();

        if(isset($_SESSION['account_id']) && !is_null($_SESSION['account_id']))
        {
            $this->redirect('account/index');
        }

        $this->template->render('index');
    }
}
