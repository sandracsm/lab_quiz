pipeline {
  agent any
  stages {
    stage('verify version') {
      steps {
        sh 'php --version'
      }
    }
    stage('test file') {
      steps {
        sh 'php test.php'
        sh 'php process_form.php'
      }
    }
  }
}