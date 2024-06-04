# -*- mode: ruby -*-
# vi: set ft=ruby :

$ansible_install = <<-SCRIPT
#!/bin/bash
echo "Installing ansible..."
apt update
apt install software-properties-common
add-apt-repository --yes --update ppa:ansible/ansible
apt install ansible -y
echo "Succesfuly provisoned Ansible VM"
SCRIPT

$docker_install = <<-SCRIPT
#!/bin/bash
echo "Adding Docker official GPG key..."
### Add Docker's official GPG key:
apt update
apt install ca-certificates curl
install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
chmod a+r /etc/apt/keyrings/docker.asc

echo "Adding Docker repository..."
### Add the repository to Apt sources:
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  tee /etc/apt/sources.list.d/docker.list > /dev/null
apt update
echo "Installing Docker..."
apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
echo "Succesfuly installed Docker"
SCRIPT

$docker_build = <<-SCRIPT
#!/bin/bash
cp -r /vagrant /home/vagrant
echo "Building docker image..."
docker build -f /vagrant/Dockerfile_jenkins -t jenkins .
### Run the jenkins container
echo "Running docker container..."
docker run -d -p 8080:8080 --group-add $(stat -c '%g' /var/run/docker.sock) -v /var/run/docker.sock:/var/run/docker.sock -v ./Jenkinsfile:/var/jenkins_home/Jenkinsfile jenkins
echo "Success"
SCRIPT

$ansible_user = <<-SCRIPT
#!/bin/bash
cp /vagrant/files/ansible.sh /home/vagrant/
/home/vagrant/ansible.sh
SCRIPT

$add_ssh_key = <<-SCRIPT
#!/bin/bash
cat /vagrant/keys/id_rsa.pub >> ~/.ssh/authorized_keys
SCRIPT

Vagrant.configure("2") do |config|
    config.vm.synced_folder "./", "/vagrant"
    config.vm.box = "ubuntu/jammy64"

    config.vm.define "ansible" do |ansible|
        ansible.vm.network "private_network", ip: "192.168.10.10"
        ansible.vm.hostname = "ansible-control"
        ansible.vm.provider "virtualbox" do |vb|
            vb.cpus = "2"
            vb.memory = "2048"
        end
        ansible.vm.provision "shell", inline: $ansible_install
        ansible.vm.provision "shell", inline: $ansible_user
    end

    config.vm.define "CICD" do |cicd|
        cicd.vm.network "private_network", ip: "192.168.10.11"
        cicd.vm.network "forwarded_port", guest: 8080, host:8080 
        cicd.vm.hostname = "ci-cd"
        cicd.vm.provider "virtualbox" do |vb|
            vb.cpus = "4"
            vb.memory = "4096"
        end
        cicd.vm.provision "shell", inline: $docker_install
        cicd.vm.provision "shell", inline: $docker_build
        cicd.vm.provision "shell", inline: $ansible_user
    end
    
    config.vm.define "Environment" do |env|
        env.vm.network "private_network", ip: "192.168.10.12"
        env.vm.hostname = "environment"
        env.vm.provider "virtualbox" do |vb|
            vb.cpus = "4"
            vb.memory = "4096"
        end
        env.vm.provision "shell", inline: $docker_install
        env.vm.provision "shell", inline: $ansible_user
        env.vm.provision "shell", inline: $add_ssh_key
    end    

end