<?php
require_once __DIR__.'/../build/Commit.php';
/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class CommitTest extends PHPUnit_Framework_TestCase
{
	public function testEndWithNumber()
	{
		$commit = new Commit(['sha' => 'cfcb1de130867197cbc9c6012b7e84e08e53d032']);
		$this->assertTrue($commit->isEndInNumber());

		$commit = new Commit(['sha' => 'cfcb1de130867197cbc9c6012b7e84e08e53d03a']);
		$this->assertFalse($commit->isEndInNumber());
	}
} 