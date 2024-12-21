Task Manager
Overview
The Task Manager is a web-based application designed to help users efficiently manage their tasks. It allows users to create, edit, delete, and mark tasks as complete, providing a simple and intuitive interface for task management.

Features
Add Tasks: Users can create new tasks by providing a title and description.
Edit Tasks: Existing tasks can be modified to update their details.
Delete Tasks: Users can remove tasks that are no longer needed.
Mark as Complete: Tasks can be marked as complete, allowing users to track their progress.
View Tasks: A comprehensive list of all tasks is displayed, showing their status (complete/incomplete).
Technologies Used
PHP: Server-side scripting language for backend development.
MySQL: Database management system for storing task data.
HTML/CSS: For structuring and styling the web application.
XAMPP: A local server environment for running the application.
Requirements
PHP 7.0 or higher
MySQL
XAMPP or similar local server environment
Installation
Clone the Repository:
bash
Insert Code
Run
Copy code
git clone https://github.com/yourusername/taskmanager.git
Navigate to the Project Directory:
bash
Insert Code
Run
Copy code
cd taskmanager
Set Up the Database:
Create a new database in MySQL (e.g., task_manager).
Import the database schema from task_manager.sql (if available) into your MySQL database.
Configure Database Connection:
Open classes/Database.php and update the database connection details:
php
Insert Code
Run
Copy code
private $host = 'localhost';
private $dbname = 'task_manager';
private $username = 'root';
private $password = '';
Start the Local Server:
Launch XAMPP or your preferred local server environment.
Ensure Apache and MySQL services are running.
Access the Application:
Open your web browser and navigate to http://localhost/taskmanager/index.php.
Usage
Adding a Task: Click on the "Add Task" button, fill in the task title and description, and submit the form.
Editing a Task: Click the "Edit" link next to a task to modify its details.
Deleting a Task: Click the "Delete" link next to a task to remove it from the list.
Marking a Task as Complete: Click the "Mark Complete" link to update the task's status.
Contributing
Contributions are welcome! If you would like to contribute to this project, please follow these steps:

Fork the repository.
Create a new branch for your feature or bug fix.
Make your changes and commit them.
Push your changes to your forked repository.
Submit a pull request.
License
This project is licensed under the MIT License. See the LICENSE file for more details.

Acknowledgments
Thanks to the open-source community for providing the tools and libraries that made this project possible.
