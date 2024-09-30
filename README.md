# SQL Injection Lab with Kubernetes

This project is designed to create a web application for practicing SQL injection vulnerabilities using Kubernetes. The application consists of an Apache server that runs a PHP web application and a MySQL database. 

## Table of Contents

- [Overview](#overview)
- [Technologies Used](#technologies-used)
- [Architecture](#architecture)
- [Deployment](#deployment)
- [Accessing the Application](#accessing-the-application)
- [Usage](#usage)
- [Contributing](#contributing)


## Overview

The SQL Injection Lab provides a safe environment for security enthusiasts and developers to learn about SQL injection vulnerabilities and their implications. It includes a simple PHP web application that connects to a MySQL database and is susceptible to SQL injection attacks.

## Technologies Used

- **Kubernetes**: Orchestrates the deployment and management of the application.
- **Docker**: Containers for the web application (Apache with PHP) and the database (MySQL).
- **PHP**: Server-side scripting language for the web application.
- **MySQL**: Relational database management system to store and manage data.

## Architecture

The architecture consists of the following components:

- **Apache Server**: Hosts the PHP application and handles HTTP requests.
- **MySQL Database**: Stores user data and allows for SQL injection testing.
- **Kubernetes**: Manages the deployment and scaling of both the Apache and MySQL containers.

![Architecture Diagram](path/to/architecture-diagram.png) <!-- Replace with actual path -->

## Deployment

To deploy the application, follow these steps:

1. **Set up Kubernetes Cluster**: Ensure you have a running Kubernetes cluster. You can use Minikube or Docker Desktop for local development.
   
2. **Build Docker Images**:
   - Build the MySQL image:
     ```bash
     docker build -t mysql_kub ./mysql
     ```
   - Build the Apache image:
     ```bash
     docker build -t php_kub ./apache
     ```

3. **Apply Kubernetes Configurations**:
   - Create the MySQL Deployment:
     ```bash
     kubectl apply -f mysql-deployment.yaml
     ```
   - Create the Apache Deployment:
     ```bash
     kubectl apply -f apache-deployment.yaml
     ```
   - Create the Services:
     ```bash
     kubectl apply -f services.yaml
     ```

## Accessing the Application

To access the web application, use the following command to get the NodePort assigned to the Apache service:

```bash
kubectl get services
```

Once you have the NodePort, you can access the application in your web browser at:

```bash
kubectl get services](http://<NODE-IP>:<NODE-PORT>
```

## Usage

1. **Navigate to the web application in your browser.

2. **Test various SQL injection techniques against the application.

3. **Monitor the MySQL logs and Apache logs for insights into how SQL injection works.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or suggestions.

