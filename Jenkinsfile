pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code from repository...'
                checkout scm
            }
        }
        
        stage('Install Dependencies') {
            steps {
                echo 'Installing Composer dependencies...'
                script {
                    if (isUnix()) {
                        sh 'composer install --no-interaction --prefer-dist'
                    } else {
                        bat 'composer install --no-interaction --prefer-dist'
                    }
                }
            }
        }
        
        stage('Run Tests') {
            steps {
                echo 'Running PHPUnit tests...'
                script {
                    if (isUnix()) {
                        sh 'vendor/bin/phpunit --configuration phpunit.xml'
                    } else {
                        bat 'vendor\\bin\\phpunit.bat --configuration phpunit.xml'
                    }
                }
            }
        }
        
        stage('Code Quality Check') {
            steps {
                echo 'Running code quality checks...'
                script {
                    echo 'Code quality checks placeholder - add your tools here'
                }
            }
        }
        
        stage('Archive Results') {
            steps {
                echo 'Archiving test results...'

                // Menyimpan hasil test
                junit 'test-results/junit.xml'
            }
        }
    }
    
    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
        }
        failure {
            echo 'Pipeline gagal!'
        }
        always {
            echo 'Cleaning up workspace...'
            cleanWs()
        }
    }
}
