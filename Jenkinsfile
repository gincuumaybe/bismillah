pipeline {
    agent any

    environment {
        APP_ENV = 'testing'
    }

    stages {
        stage('Checkout') {
            steps {
                git url: 'https://github.com/gincuumaybe/bismillah.git', branch: 'main'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Tests') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }
    }

    post {
        success {
            echo 'Build & Test Sukses!'
        }
        failure {
            echo 'Build Gagal!'
        }
    }
}
