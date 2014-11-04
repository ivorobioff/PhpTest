<?php

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Commit 
{
	private $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function isEndInNumber()
	{
		$sha = $this->data['sha'];
		return ctype_digit(substr($sha, -1));
	}

	public function getMessage()
	{
		$message = $this->data['commit']['message'];
		$message = explode("\n", $message);
		return reset($message);
	}

	public function getUrl()
	{
		return $this->data['html_url'];
	}
} 