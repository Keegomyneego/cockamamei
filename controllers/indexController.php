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
//        $config = Config::getInstance();
//
//        /** @var Aws $aws */
//        $aws = Aws::factory(array(
//            'key' => $config['aws_access_key_id'],
//            'secret' => $config['aws_secret_access_key']
//        ));
//
//        /** @var S3Client $s3 */
//        $s3 = $aws->get('S3');
//        $a = $s3->listBuckets();

        $this->template->render('index');
    }
}
