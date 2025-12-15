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
                        sh 'composer install --no-interaction --prefer-dist --no-dev'
                    } else {
                        bat 'composer install --no-interaction --prefer-dist --no-dev'
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
                junit 'test-results/junit.xml'
            }
        }
        
        stage('Deploy to VPS') {
            steps {
                echo 'Deploying to VPS...'
                sshPublisher(
                    continueOnError: false,
                    failOnError: true,
                    publishers: [
                        sshPublisherDesc(
                            configName: 'pm1cicd',
                            verbose: true,
                            transfers: [
                                sshTransfer(
                                    sourceFiles: '**/*',
                                    excludes: '.git/**, .gitignore, tests/**, test-results/**, phpunit.xml, .env.example, README.md, Jenkinsfile',
                                    removePrefix: '',
                                    remoteDirectory: '/var/www/php-pipeline',
                                    execCommand: '''
                                        cd /var/www/php-pipeline
                                        echo "=== Deployment Started ==="
                                        ls -la
                                        
                                        # Set permissions jika diperlukan
                                        # chmod -R 755 storage bootstrap/cache
                                        
                                        # Jika ada .env, copy dari .env.example
                                        # cp .env.example .env
                                        
                                        echo "=== Deployment Completed ==="
                                    '''
                                )
                            ]
                        )
                    ]
                )
            }
        }
    }
    
    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
            echo 'Aplikasi berhasil dideploy ke VPS!'
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