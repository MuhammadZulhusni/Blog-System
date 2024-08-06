# Blog System

Welcome to the Blog System! This web application, built with the Laravel framework, is designed to provide an intuitive and robust platform for managing and publishing blog posts. Whether you’re a seasoned blogger or just starting out, this system offers a seamless experience with its user-friendly interface and powerful features.

## Features

- **CRUD Operations:** Create, read, update, and delete blog posts.
- **User Authentication:** Sign up and log in to manage posts.
- **Tailwind CSS Styling:** Modern and responsive design.

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- Laravel Installer
- MySQL or another compatible database

### Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/MuhammadZulhusni/Blog-System.git
    cd Blog-System
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

3. **Set Up Environment File**

    Copy the example environment file and adjust your settings.

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Configure Your Database**

   Open the `.env` file and set the details as per your convenience.
   Below is my database connection:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=Blog-System
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. **Run Migrations and Seed Data**

    Run the following command to migrate the database and seed it with initial data:

    ```bash
    php artisan migrate:fresh --seed
    ```

    This command will:
    - Drop all existing tables.
    - Recreate the tables as per the migration files.
    - Seed the database with initial data specified in the seeders.

8. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    Your application will be accessible at `http://127.0.0.1:8000`.

## Usage

- **Register:** Sign up to create an account.
- **Login:** Access the dashboard to manage blog posts.
- **Manage Posts:** Use the interface to create, view, update, and delete blog posts.

## Contributing

If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Create a new Pull Request.
