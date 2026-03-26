# Project Title: EntebbeStay Hotel Booking System
- **Student Name:** Chebet Daniel
- **Reg. Number:** 24BSCS042W

## System Description
EntebbeStay is one of my dynamic web applications designed to help travelers find and book a 2-5 star
 hotel of their choice, that provides a 'home-away-from experience' located between Kawuku and Kitoro in Entebbe. The system allows users to view hotel 
 details,  services offered, and real-time availability.

## Technologies Used
- **Frontend:** HTML5, CSS3 (External Stylesheet)
- **Backend:** PHP 8.x
- **Database:** MySQL
- **Environment:** VS Code & Docker

## Steps to Run the Project (Docker)
1. Ensure **Docker Desktop** is running.
2. Open the project folder in **VS Code**
3. Run the command `docker-compose up -d --build` in the terminal:
4. The application will be available at `http://localhost:8080/localhost/24BSCS042W_EntebbeStay`.
5. Access phpMyAdmin at: `http://localhost:8081`

## Steps to Run (XAMPP)
1. Copy the project folder 24BSCS042W_EntebbeStay into your XAMPP htdocs directory (usually C:\xampp\htdocs\).
2. Open the XAMPP Control Panel and start Apache and MySQL.
3. Open a browser and go to `http://localhost/phpmyadmin`.
4. Create a new database named coursework_db.
5. Click Import, choose the database.sql file from the project folder, and click Go.
6. Access the application at: `http://localhost/24BSCS042W_EntebbeStay/login.php`.


## Database Import Instructions
1. Open phpMyAdmin at `http://localhost:8081`
2. Create a new database named `hotels`.
3. Click on the **Import** tab.
4. Choose the `database.sql` file from the project directory.
5. Click **Go**.
6. Access the project via `localhost/24BSCS042W_EntebbeStay`.

## System Credentials
- **Username:** chebt
- **Password:** chebt32
