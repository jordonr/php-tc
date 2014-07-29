<?php

namespace Helper;

class EmailHelper {

	private $from;
	private $to;
	private $body;
	private $subject;
	private $subjectPrefix;
	private $config;

	function __construct() {
		$this->config = new GetConfigHelper();
		$this->from = $this->config->getKeyValue('email');
		$this->to = $this->config->getKeyValue('email');
		$this->subject = $this->subjectPrefix = $this->config->getKeyValue('subjectprefix');
	}

	public function setSubject($subject) {
		$this->subject = $this->subjectPrefix . $subject;
	}

	public function setBody($body) {
		$this->body = $body;
	}

	public function setTo($to) {
		$this->to = $to;
	}
	
	public function setFrom($from) {
		$this->from = $from;
	}

	public function send() {
		$message = \Swift_Message::newInstance()
                                ->setSubject($this->subject)
                                ->setFrom($this->from)
                                ->setTo($this->to)
                                ->setBody($this->body);

                $mailer = \Swift_Mailer::newInstance(\Swift_SmtpTransport::newInstance());
                return $mailer->send($message);
	}

	
}
