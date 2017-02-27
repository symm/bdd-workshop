all:
	bin/phpspec run
	bin/behat

snippets:
	bin/behat --snippets-for FeatureContext --append-snippets
