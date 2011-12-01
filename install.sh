#!/bin/bash

function import_files ()
{
	mkdir $install_dir
	cp -r ./* $install_dir
	cp ./.htaccess $install_dir
}
function import_db ()
{
	echo 'Please Enter Your mySQL root Password:'
	mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS lite_plate;"
	echo 'Please Enter Your mySQL root Password Again:'
	mysql -u root -p lite_plate < ./liteplate.sql		#default sql file for importing database
}

function install ()
{
	install_dir='/var/www/'																		#default install dir; set to '/wamp/www/', or '/Applications/MAMP/htdocs/, etc...
	if [ -d "$install_dir" ]; then
		echo "Directory $install_dir is in Use..."
		sudo rm -rf $install_dir
		import_files
		import_db
	else
		echo 'Creating $install_dir Directory...'
		import_files
		import_db
	fi
}

echo 'Lite Plate CMS Install:'
read -sn 1 -p 'Press y to Install, n to Cancel' do_install
if [ "$do_install" == "y" ]; then
	echo -e "\n\nBeggining Install"
	install
elif [ "$do_install" == "n" ]; then
	echo -e "\n\nInstall Canceled"
	exit 0
else
	echo -e "\n\nYou Must Enter Either y or n"
fi

