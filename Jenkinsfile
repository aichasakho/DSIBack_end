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

       
        stage('Install Dependencies for Laravel') {
            steps {
                // Installer Composer dans le répertoire backend
                dir('backend') {
                    sh 'composer install --no-interaction --prefer-dist'
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
