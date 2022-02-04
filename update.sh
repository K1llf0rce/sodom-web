#!/usr/bin/env bash

#This script updates sodom-web

#check if run as root
if [ "$EUID" -ne 0 ]; then
  echo "This scripts makes modifications in /var/www/"
  echo "Please run it as root!"
  exit
fi

#Ask for run confimramtion
echo "This script will update sodom-web!"
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

#get newest files
echo "Looking for update..."
git pull
sleep 1
clear
echo "Got newest version!"
sleep 1

#remove all files that start with index
clear
echo "Removing existing sodom-web files..."
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
echo "sodom-web was successfully updated!"
exit 0



