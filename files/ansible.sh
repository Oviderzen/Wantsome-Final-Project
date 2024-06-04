#!/bin/bash

function create_user {
  USER_EXISTS=0
  USERS=`getent passwd | cut -d":" -f1`
  
  for USER in $USERS;
  do
    if [[ $1 == $USER ]]; then
      echo "$1 user exists"
      USER_EXISTS=1
    fi
  done

  if [[ $USER_EXISTS -eq 0 ]]; then
    echo "Creating user: $1"
    adduser --disabled-password --gecos "" $1
  fi
}

function add_to_sudoers {
  if [ ! -f /etc/sudoers.d/$1 ]; then
    echo "Granting sudo access for user: $1"
    echo "$1 ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/$1
  else
    echo "User has been already added to sudoers"
  fi
}

create_user "ansible"
add_to_sudoers "ansible"