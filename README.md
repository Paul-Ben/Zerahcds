# Zerah Student Content Management System

This Laravel application is designed to serve as a content management system where teachers can upload educational content (such as videos and documents) for students. The application includes a user management system handled by an administrator, who oversees both teachers and students.

## Features

- **Teacher Content Management**: Teachers can upload videos and documents for students.
- **Student Access**: Students can view and download the content uploaded by their teachers.
- **Administrator Control**: The administrator has the authority to manage users (teachers and students), including creating, editing, and deleting accounts.

## Table of Contents

- [Zerah Student Content Management System](#zerah-student-content-management-system)
  - [Features](#features)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Setup](#setup)
  - [Usage](#usage)
  - [License](#license)

## Installation

To set up the application locally, follow these steps:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/your-username/your-repository-name.git
   cd your-repository-name
   ```

2. **Install Composer Dependencies**:

   Make sure you have [Composer](https://getcomposer.org/) installed, then run:

   ```bash
   composer install
   ```

3. **Install NPM Dependencies**:

   Make sure you have [Node.js](https://nodejs.org/) installed, then run:

   ```bash
   npm install
   ```

4. **Create a Copy of the .env File**:

   ```bash
   cp .env.example .env
   ```

5. **Generate an Application Key**:

   ```bash
   php artisan key:generate
   ```

6. **Configure the .env File**:

   Open the `.env` file and update the necessary environment variables, such as database configuration, mail settings, etc.

   Example:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

7. **Run Migrations**:

   This will create the necessary database tables.

   ```bash
   php artisan migrate
   ```

8. **Seed the Database (Optional)**:

   To add some dummy data for testing, you can run:

   ```bash
   php artisan db:seed
   ```

9. **Link the Storage**:

   Create a symbolic link from `public/storage` to `storage/app/public` to access uploaded files.

   ```bash
   php artisan storage:link
   ```

10. **Run the Application**:

    Start the local development server:

    ```bash
    php artisan serve
    ```

    The application should now be running at `http://localhost:8000`.

## Setup

1. **Administrator Account**:
   - After setting up the application, you'll need to create an administrator account to manage users. You can do this by registering through the app or directly inserting it into the database.

2. **Teacher Account**:
   - Teachers can register themselves or be created by the administrator. Teachers can upload content and assign it to their respective classes.

3. **Student Account**:
   - Students can also register themselves or be created by the administrator. They will have access to the content uploaded by their teachers.

## Usage

1. **Administrator**:
   - Manage user roles and permissions.
   - Create and manage user accounts for teachers and students.

2. **Teacher**:
   - Log in to your account.
   - Upload videos and documents to your classes.
   - Manage your content.

3. **Student**:
   - Log in to your account.
   - Access and download the content uploaded by your teacher.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
