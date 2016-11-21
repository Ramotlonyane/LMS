<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$config['useragent']= "CodeIgniter";
$config['mailpath'] = "/usr/bin/sendmail";
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.googlemail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = $this->settings['acinprojects@gmail.com'];
$config['smtp_pass'] = $this->settings['gbrl@acinprojects'];
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$config['wordwrap'] = TRUE;

$config['from_email']  = "acinprojects@gmail.com";
$config['admin_email'] = "gbrl10modise@gmail.com";