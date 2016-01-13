
.PHONY: install update clean
	
install:
	mkdir -p runtime
	mkdir -p runtime/logs
	mkdir -p web/assets
	cp  cm/db.php config/db.php
	
update:
	composer update
	./yii migrate --interactive=0

clean:
	rm -rf runtime
	rm -rf web/assets
	rm -f config/db.php
	rm -f composer.lock
	rm -rf vendor
	

