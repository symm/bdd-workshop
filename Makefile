all: unit story

unit:
	bin/phpspec run

story:
	bin/behat

snippets:
	bin/behat --snippets-for FeatureContext --append-snippets
