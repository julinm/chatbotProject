PHP Chatbot - JuliBot
A lightweight, interactive web-based chatbot application built with PHP, MySQL, and jQuery. This project serves as a personal assistant (JuliBot) that can answer questions about my professional background, including work experience, studies, and technologies used.

Features
Real-time Interaction: Uses AJAX to send and receive messages without reloading the page.
Bilingual Support: Interface and welcome messages available in both English and Spanish.
Dynamic Message History: Displays a list of previous messages fetched from a MySQL database.
Responsive Design: Built with Bootstrap to ensure compatibility across different screen sizes.
Professional UI: Features custom avatars, time-stamped messages, and a clean chat layout.

-------
Tech Stack
Frontend: HTML5, CSS3, JavaScript (jQuery)
Frameworks: Bootstrap 
Backend: PHP
Database: MySQL
Icons: Font Awesome

------
Project Structure
index.php: The main entry point containing the UI and logic for displaying messages.
bot_message.php: Processes the user input and returns the bot's response.
database.inc.php: Handles the connection to the MySQL database.
functions.js: Contains jQuery/JavaScript functions for message handling and time formatting.
style.css: Custom styling for the chat background and message bubbles.
/image: Directory for user and bot avatars.

--------
Installation & Setup

1. Clone the repository:
git clone https://github.com/julinm/your-repo-name.git

3. Database Configuration:
Ensure you have a local server (like XAMPP, WAMP, or Laragon).
Open phpMyAdmin and create a database named chatbotqanda.
Create a table named message with the following columns: id, message, added_on, type.
Update the credentials in database.inc.php if necessary:
$con = mysqli_connect('localhost', 'root', '', 'chatbotqanda', 3307);

3. Run the project:
Move the project folder to your server's root directory (e.g., htdocs).
Open your browser and navigate to http://localhost/your-project-folder/index.php.

------------
Usage
When you enter the site, you can choose between English and Spanish.

Type a question about Julia (e.g., "What are your skills?" or "Where did you study?") into the input field and press Send.

The bot will process your question through bot_message.php and display the answer instantly.
