<?php

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Author
{
	private $name;
	private $email;

	private $commits = [];

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

	public function addCommit(Commit $commit)
	{
		$this->commits[] = $commit;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return Commit[]
	 */
	public function getCommits()
	{
		return $this->commits;
	}
}