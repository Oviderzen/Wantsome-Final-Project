
# Wantsome Project

The goal of this project is to create two VMs, one named CICD that runs a Jenkins docker container and another one named ENVIRONMENT that runs an Nginx container, two Wordpress containers and a Mysql container.

The most important aspect of the project is to automate as many tasks as possible using scripting, ansible and jenkins.

## Here is a breakdown of the project: 

#### Technical requirements:

1. Two VM hosting the CI/CD and Environment
2. CI/CD will be hosting the Jenkins container and needs to deploy all the other containers to Environment VM.
3. Environment will be hosting the rest of apps & tools.
4. All the configuration must be stored in GitHub for usage, this includes the following: Vagrantfile, application or tool configuration, jenkins files.
5. Jenkins container can be build locally and used in Vagrant.
6. Jenkins pipelines is responsible for building and deploying the container.
7. Docker images need to be hosted in your personal Docker account on https://hub.docker.com.
8. Docker engine needs to be installed via Vagrant.

#### Implementation details:

1. Jenkins must have the following jobs:
- Build Nginx container.
- Build WordPress container.
- Build MySQL container.
- Deploy containers on Environment VM.
2. Each of the above can be combined in a pipeline.
3. Every time the configuration of an app/tool is changed, Jenkins needs to build and deploy the container.
4. Jenkins will have to run in DinD mode (Docker in Docker).
5. Nginx must proxy the following:
- Both the WordPress apps under the /wordpress URI.
- Jenkins application under the /jenkins URI.
6. WordPress startup needs to be automated when the application starts, it has all the configuration required to start without going to the “Quick Setup”.

## Installation

Because I cannot use ansible on windows, I chose to create a third VM that will act as an ansible node.

Make sure you have Vagrant installed on your machine.

To install my project all you have to do is run 

```bash
./setup.sh
```
    
## Information about the files

In the main folder are all the dockerfiles required to build the containers.\
There is also a docker-compose file used in the Jenkins pipeline to deploy the mysql, nginx and wordpress containers on the Environment VM.

The **Jenkinsfile** is ready to be used for the CICD pipeline.

Also here I have the **Vagrantfile** used to create and provision the 3 VMs:
- Ansible Node
- CICD
- Environment 

Inside the **files** folder I placed different configuration files for nginx, mysql and wordpress.

The inventory folder contains the **hosts.ini** file used by ansible.

Inside the **provisioning** folder are all the ansible playbooks required for deployment.

The **ansible** and **provisioning** folders are not used at the moment.