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

        stage('Check PHP & Composer') {
            steps {
                bat 'php -v'
                bat 'composer --version'
            }
        }

        stage('Install PHP & Node Dependencies') {
            steps {
                bat 'composer install'
                bat 'npm install'
            }
        }

        stage('Build Assets') {
            steps {
                bat 'npm run build' // atau `npm run dev` jika belum ada build
            }
        }

        stage('Run Laravel Tests') {
            steps {
                bat 'php artisan test'
                // atau bisa juga:
                // bat 'vendor\\bin\\phpunit'
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
