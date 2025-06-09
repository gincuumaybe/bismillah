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
                bat 'npm install'
            }
        }

        stage('Run Tests') {
            steps {
                bat 'npm run test'
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
