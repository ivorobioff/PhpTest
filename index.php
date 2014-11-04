<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/build/GitHub.php';
require_once __DIR__.'/build/Author.php';
require_once __DIR__.'/build/Commit.php';

$github = new GitHub();
$authors = $github->pullCommits();

foreach ($authors as $author)
{
	echo '<h3>'.htmlspecialchars($author->getName()).' - '.htmlspecialchars($author->getEmail()).'</h3>';

	foreach ($author->getCommits() as $commit)
	{
		$color = '';

		if ($commit->isEndInNumber())
		{
			$color = 'style="background-color: #E6F1F6"';
		}

		echo '<div '.$color.'>';
		echo '<strong><a href="'.$commit->getUrl().'">'.htmlspecialchars($commit->getMessage()).'</a></strong><br/>';
		echo '</div>';
	}

	echo '<hr/>';
}
