pipeline {
    agent any
    environment {
        SONAR_TOKEN = credentials('dsi_backend') // Remplacer par l'ID de vos credentials
    }
    stages {
        stage('Checkout Backend') {
            steps {
                // Cloner le dépôt backend
                dir('backend') {
                    git 'https://github.com/aichasakho/DSIBack_end.git'
                }
            }
        }
        stage('Checkout Frontend') {
            steps {
                // Cloner le dépôt frontend
                dir('frontend') {
                    git 'https://github.com/aichasakho/DSIFront_end.git'
                }
            }
        }
        stage('Install Dependencies for Laravel') {
            steps {
                // Installer Composer dans le répertoire backend
                dir('backend') {
                    sh 'composer install --no-interaction --prefer-dist'
                }
            }
        }
        stage('Install Dependencies for Angular') {
            steps {
                // Installer Node.js et npm dans le répertoire frontend
                script {
                    def nodeHome = tool name: 'NodeJS', type: 'NodeJSInstall' 
                    env.PATH = "${nodeHome}/bin:${env.PATH}"
                }
                dir('frontend') {
                    sh 'npm install'
                }
            }
        }
        stage('Run Tests for Laravel') {
            steps {
                // Exécuter les tests Laravel
                dir('backend') {
                    sh 'vendor/bin/phpunit'
                }
            }
        }
        stage('Run Tests for Angular') {
            steps {
                // Exécuter les tests Angular
                dir('frontend') {
                    sh 'ng test --watch=false'
                }
            }
        }
        stage('SonarQube Analysis for Laravel') {
            steps {
                // Exécuter l'analyse SonarQube pour Laravel
                dir('backend') {
                    withSonarQubeEnv('SonarQube-back') { // Remplacer par le nom de votre installation SonarQube
                        sh 'sonar-scanner -Dsonar.projectKey=sqa_1d00e3aa346de1160a8cc742a43b12f82b20a721 -Dsonar.sources=app -Dsonar.language=php -Dsonar.login=$SONAR_TOKEN'
                    }
                }
            }
        }
        stage('SonarQube Analysis for Angular') {
            steps {
                // Exécuter l'analyse SonarQube pour Angular
                dir('frontend') {
                    withSonarQubeEnv('SonarQube-back') { // Remplacer par le nom de votre installation SonarQube
                        sh 'sonar-scanner -Dsonar.projectKey=sqa_acbb7c4193bc5f794a6b8338413ca2498049b317 -Dsonar.sources=src -Dsonar.language=js -Dsonar.login=$SONAR_TOKEN'
                    }
                }
            }
        }
    }
    post {
        always {
            // Nettoyage après la construction
            cleanWs()
        }
        success {
            echo 'Build and analysis were successful!'
        }
        failure {
            echo 'Build or analysis failed!'
        }
    }
}
