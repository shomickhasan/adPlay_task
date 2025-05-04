# Laravel Project with Bootstrap and jQuery

This project is built using **Laravel**, styled with **Bootstrap**, and enhanced with **jQuery** for front-end interactivity.

---

## 📁 Folder Structure

```text
.
├── DataBase/
│   └── project_database.sql       # SQL file for database setup
│
├── src/
│   └── [Laravel application]      # Full Laravel project source code
│
├── TASK ANSWER/
│   └── task_ans.pdf           # PDF document with task answers



## ⚙️ Installation & Configuration Steps

1. Go to the `src/` directory:  
   `cd src`

2. Install PHP dependencies using Composer:  
   `composer install`

3. Copy the example environment file and rename it:  
   `cp .env.example .env`

4. Generate the application key:  
   `php artisan key:generate`

5. Create a new MySQL database (e.g., `project_db`) and import the SQL file:  
   `mysql -u your_username -p project_db < ../DataBase/project_database.sql`

6. Update the `.env` file with your database configuration:  
   DB_CONNECTION=mysql  
   DB_HOST=127.0.0.1  
   DB_PORT=3306  
   DB_DATABASE=project_db  
   DB_USERNAME=your_username  
   DB_PASSWORD=your_password



8. Start the Laravel development server:  
   `php artisan serve`  
   The application will be available at `http://localhost:8000`

---


Admin Dashboard URL: http://localhost:8000/login
UserId: admin
password:123456


