#!/bin/bash

##### Uncomment this to create and copy your keys ###########

# Creating keys
# echo "Creating SSH keys..."
# mkdir keys
# ssh-keygen -b 2048 -t rsa -f ./keys/id_rsa -q -N ""
# echo "Keys created succesfully!"

# # Copy keys to VMs
# echo "Copying SSH keys..."
# vagrant ssh ansible -c "cp /vagrant/keys/id_rsa.pub /home/vagrant/.ssh/"
# vagrant ssh CICD -c "cp /vagrant/keys/id_rsa.pub /home/vagrant/.ssh/"
# vagrant ssh Environment -c "cp /vagrant/keys/id_rsa.pub /home/vagrant/.ssh/"
# echo "Keys copied succesfully!"


# Start VMs
echo "Booting up VMs..."
echo "######################################"
echo "        Starging ansible VM        "
echo "######################################"
vagrant up ansible
echo "######################################"
echo "        Starting CICD VM           "
echo "######################################"
vagrant up CICD
echo "######################################"
echo "        Starting Environment VM    "
echo "######################################"
vagrant up Environment
echo "######################################"
echo "        All VMs up and running!     "
echo "######################################"

####### Uncomment this if you want to use ansible ########
# Provision CI/CD and Environment VMs using Ansible

# echo "Provisioning CI/CD and Environment VMs..."
# vagrant ssh ansible -c "ansible-playbook -i /vagrant/inventory/hosts.ini /vagrant/provisioning/ci_cd.yml --private-key ci-cd_key"
# vagrant ssh ansible -c "ansible-playbook -i /vagrant/inventory/hosts.ini /vagrant/provisioning/environment.yml --private-key environment_key"
# vagrant ssh ansible -c "ansible-playbook -i /vagrant/inventory/hosts.ini /vagrant/provisioning/deploy_containers.yml --private-key environment_key"
# echo "Setup complete!"
