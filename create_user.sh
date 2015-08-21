#!/bin/bash

USER=$1
PASSWORD=$2

useradd --create-home $USER
echo "$USER:$PASSWORD" | chpasswd

echo "User $USER has been created"