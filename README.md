
# How to run this program

This is a CodeIgniter 4 project repository. Below are the steps to set up the project and get it running.

## Prerequisites

Before running this project, ensure that the following are installed on your system:

- PHP (version 7.3 or higher)
- Composer
- MySQL (or equivalent database system)
- CodeIgniter 4

## Setup Instructions

1. **Clone the Repository**

   Clone this repository to your local machine:
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. **Rename `.env.example` File**

   After cloning the project, rename the `.env.example` file to `.env`:
   ```bash
   mv .env.example .env
   ```

3. **Configure the Database**

   - Open the `.env` file.
   - Update the database settings according to your MySQL setup. If you haven't created a database yet, follow the steps below.

   **To create a database in phpMyAdmin**:
   - Open phpMyAdmin and create a new database named `ci4_app`. You can use a different name, but make sure to update the `.env` file accordingly.

   Example in `.env`:
   ```bash
   database.default.hostname = localhost
   database.default.database = ci4_app
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

4. **Run Database Migrations**

   CodeIgniter uses migrations to set up the database structure. To create the necessary tables, run the following command:
   ```bash
   php spark migrate
   ```
   This will execute the migration files located in the `database/migrations` folder.

5. **Install Dependencies**

   If you haven't already installed the Composer dependencies, run:
   ```bash
   composer install
   ```

6. **Generate the Application Key (Optional)**

   If your application requires a secure key (e.g., for encryption or session handling), generate a key by running:
   ```bash
   php spark key:generate
   ```

7. **Start the Development Server**

   To run the application locally, start the CodeIgniter server:
   ```bash
   php spark serve
   ```
   By default, the server will run on `http://localhost:8080`.

8. **Access the Application**

   Open your web browser and navigate to `http://localhost:8080` to view the application.

## Additional Notes

- If you need to seed the database with test data, you can create seeder files in the `database/seeds` folder and run them using:
   ```bash
   php spark db:seed SeederName
   ```

- To clear the cache (if needed), you can use:
   ```bash
   php spark cache:clear
   ```

## License

This project is open-source and available under the [MIT License](LICENSE).
