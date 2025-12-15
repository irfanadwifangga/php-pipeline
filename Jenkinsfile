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
                                    excludes: '.git/**, .gitignore, tests/**, test-results/**, phpunit.xml, README.md, Jenkinsfile, vendor/**',
                                    removePrefix: '',
                                    remoteDirectory: '/var/www/php-pipeline',
                                    execCommand: '''
                                        cd /var/www/php-pipeline
                                        echo "=== Files deployed ==="
                                        ls -la
                                        echo "=== Installing production dependencies ==="
                                        composer install --no-dev --no-interaction --prefer-dist
                                        echo "=== Setting permissions ==="
                                        chmod -R 755 .
                                        echo "=== Deployment completed ==="
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