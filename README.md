# Project Features

The **Features** section highlights the key functionalities:
- Fetching planet data from **SWAPI API**.
- Storing data in the **MySQL/MariaDB database**.
- Caching the API response.
- Using **Inertia.js** and **Vue 3** for the frontend.
- Displaying the data in a **responsive grid** layout with **Tailwind CSS**.

## Installation & Setup

This section provides detailed instructions on how to set up the project locally:
- **Clone the repository:** git clone to get the project on your local machine.
- **Install Dependencies:**
    - for Laravel backend.
      ```bash
      composer install
      ```
    - for frontend dependencies (Vue, Inertia, etc.).
      ```bash
      npm install
      ```
- **Configure Environment:** Set up your .env file with the correct database settings by coping .env.example.
- **Generate Application Key:** to set up Laravel's encryption key.
  ```bash
    php artisan key:generate
  ```
- **Run Database Migrations:** to create the necessary tables in the database.
  ```bash
    Run php artisan migrate
  ```
- **Start the Laravel Server:** to start the backend.
  ```bash
    php artisan serve
  ```
- **Start Vite for Frontend Development:** to start the frontend with live reloading.
  ```bash
    npm run dev
  ```
- **Access the app:** Open the application in the browser at
  ```bash
    http://127.0.0.1:8000
  ```
