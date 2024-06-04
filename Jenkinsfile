pipeline {
    agent any
    environment {
        DOCKER_HUB_USERNAME = !!!YOUR USER NAME HERE IN QUOTES!!! ''
        DOCKER_HUB_PASSWORD = !!!YOUR PASSWORD HERE IN QUOTES!!! ''
        NGINX_IMAGE_NAME = 'oviderzen/nginx-image'
        WORDPRESS_IMAGE_NAME = 'oviderzen/wordpress-image'
        MYSQL_IMAGE_NAME = 'oviderzen/mysql-image'
    }
    stages {
        stage('Build Nginx Container') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v2/', '') {
                        sh "docker login -u ${DOCKER_HUB_USERNAME} -p ${DOCKER_HUB_PASSWORD}"
                        docker.build(NGINX_IMAGE_NAME, '-f /project/vagrant/Dockerfile_nginx .')
                        docker.image(NGINX_IMAGE_NAME).push()
                    }
                }
            }
        }
        stage('Build WordPress Container') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v2/', '') {
                        sh "docker login -u ${DOCKER_HUB_USERNAME} -p ${DOCKER_HUB_PASSWORD}"
                        docker.build(WORDPRESS_IMAGE_NAME, '-f /project/vagrant/Dockerfile_wordpress .')
                        docker.image(WORDPRESS_IMAGE_NAME).push()
                    }
                }
            }
        }
        stage('Build MySQL Container') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v2/', '') {
                        sh "docker login -u ${DOCKER_HUB_USERNAME} -p ${DOCKER_HUB_PASSWORD}"
                        docker.build(MYSQL_IMAGE_NAME, '-f /project/vagrant/Dockerfile_mysql .')
                        docker.image(MYSQL_IMAGE_NAME).push()
                    }
                }
            }
        }
        stage('Deploy Containers on Environment VM') {
            steps {
                script {
                    sh 'ssh -o StrictHostKeyChecking=no vagrant@192.168.10.12 "sudo docker compose -f /vagrant/Docker-compose.yml up -d"'
                }
            }
        }
    }
}
