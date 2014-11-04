<?php
use Github\Client as GitHubClient;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class GitHub 
{
	private $client;

	public function __construct()
	{
		$this->client = new GitHubClient();
	}

	/**
	 * @param int $limit
	 * @return Author[]
	 */
	public function pullCommits($limit = 25)
	{
		$commits = $this->client
			->api('repo')
			->commits()
			->all('joyent', 'node', ['sha' => 'master', 'per_page' => $limit]);

		$authors = [];

		foreach ($commits as $commit)
		{
			if (!isset($authors[$commit['author']['id']]))
			{
				$name = $commit['commit']['author']['name'];
				$email = $commit['commit']['author']['email'];
				$authors[$commit['author']['id']] = new Author($name, $email);
			}

			/**
			 * @var Author $author
			 */
			$author = $authors[$commit['author']['id']];

			$author->addCommit(new Commit($commit));
		}

		return $authors;
	}
} 