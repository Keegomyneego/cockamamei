<?php

require_once 'PHPMailer/class.phpmailer.php';
require_once 'Dwoo/Autoloader.php';

class Mailer extends PHPMailer
{
    /**
     * __construct
     * @return \Mailer
     */
    public function __construct()
    {
        /** @var Config $config */
        $config = Config::getInstance();

        /** @var PHPMailer $mailer */
        $mailer = new PHPMailer();
        $mailer->isSMTP();
        $mailer->Host = $config['smtp_host'];
        $mailer->SMTPAuth = $config['smtp_auth'];
        $mailer->Username = $config['smtp_username'];
        $mailer->Password = $config['smtp_password'];
        $mailer->SMTPSecure = $config['smtp_secure'];
        $mailer->Port = $config['smtp_port'];

        return $mailer;
    }

    /**
     * Set Dwoo template use in email.
     * @param string $file
     * @param array $data
     */
    public function setTemplate($file, $data = array())
    {
        \Dwoo\Autoloader::register();

        $emailTemplatesDir = 'email_templates/';

        /** @var \Dwoo\Core $dwoo */
        $dwoo = new \Dwoo\Core($emailTemplatesDir . 'compiled', $emailTemplatesDir . 'cache');
        $dwoo->setTemplateDir($emailTemplatesDir);

        $output = $dwoo->get($file, $data);

        $this->msgHTML($output);
    }
}