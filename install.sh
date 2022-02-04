#!/usr/bin/env bash

#This script installs sodom-web

#check if run as root
if [ "$EUID" -ne 0 ]; then 
  echo "This scripts makes modifications in /var/www/"
  echo "Please run it as root!"
  exit
fi

#Ask for run confimramtion
echo "This script will install sodom-web!"
sleep 1
echo "!WARNING!"
sleep 1
echo "All existing index files in /var/www/ will be removed!"
sleep 1
read -p "Proceed? (Y|n)" answerProceed

if [ "$answerProceed" == 'y' ] || [ -z "$answerProceed" ]; then
    clear
elif [ "$answerProceed" == 'n' ]; then
    clear
    echo "Exiting..."
    exit 0
else
    clear
    echo "Unsure, Exiting..."
    exit 0
fi

#remove all files that start with index
echo "Removing existing files..."
sleep 1
rm -rf /var/www/*
echo "done"

#copy files
clear
echo "Copying new files..."
sleep 1
cp *.php /var/www/
cp -r img/ css/ js/ /var/www/
echo "done"

#exit
echo "sodom-web was successfully added to your pihole!"
exit 0



