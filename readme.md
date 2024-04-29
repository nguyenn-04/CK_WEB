### How to Run the Server

Follow these steps to get the server up and running:

1. **Clone the Code**
   - Clone the repository containing the project code to your local machine using Git.

2. **Install Dependencies**
   - Open your command line interface (CLI).
   - Navigate to the project directory.
   - Run the command:

     ```
     composer install
     ```

3. **Create Database**
   - Access your MySQL database management system (e.g., phpMyAdmin).
   - Create a new database named `shoe_store`.

4. **Run Migrations**
   - In your command line interface, navigate to the project directory if you haven't already.
   - Execute the command:

     ```
     php artisan migrate
     ```

5. **Start the Server**
   - While still in the project directory in your command line interface, run:

     ```
     php artisan serve
     ```

By following these steps, your Laravel application should now be up and running locally. You can access it through your web browser at the URL provided by the `php artisan serve` command.
