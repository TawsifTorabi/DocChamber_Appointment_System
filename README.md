DocChamber Appointment System
=============================

_A Simple PHP Doctor Chamber Appointment and Token Update System_ I made this project for a course assignment, that's why I didn't give it much effort.

Table of Contents
-----------------

1.  [About](#about)
2.  [Features](#features)
3.  [Folder Structure](#folder-structure)
4.  [Installation & Setup](#installation)
5.  [Usage](#usage)
6.  [Database Structure](#database)
7.  [Dependencies & Requirements](#dependencies)
8.  [Contributing](#contributing)
9.  [License](#license)
10.  [Contact](#contact)

About
-----

This project is a lightweight web application built using PHP, allowing users (patients) to sign up/login, make appointments at a doctor's chamber, and allowing admin/staff to update tokens and view history. It is designed for easy setup and to serve as a starting point for more advanced appointment-management systems.

Features
--------

*   User registration & login
*   Appointment creation (by patients)
*   Token generation & updates (by staff/admin)
*   View appointment history
*   Admin dashboard for management
*   Responsive interface (basic CSS/JS)

Folder Structure
----------------

/
|-- admin/
|-- css/
|-- database/
|-- images/
|-- js/
|-- json/
|-- messages/
|-- model/
|-- ajax.php
|-- commons.php
|-- connect\_db.php
|-- create-new-token.php
|-- dashboard.php
|-- generate.php
|-- history.php
|-- hospitals.php
|-- index.php
|-- login.php
|-- logout.php
|-- signup.php
|-- signupAjax.php
|-- transaction.php
|-- README.md
  

**Folder details:**

*   `admin/` → admin-specific pages
*   `css/`, `js/`, `images/` → frontend resources
*   `database/` → SQL scripts or DB setup
*   `model/` → PHP model classes

Installation & Setup
--------------------

1.  Clone the repository:
    
        git clone https://github.com/TawsifTorabi/DocChamber_Appointment_System.git
    
2.  Place the project folder in your PHP server’s root (e.g., `htdocs` for XAMPP).
3.  Create a MySQL database (e.g., `doc_chamber`).
4.  Import the SQL file from the `database/` folder to create tables.
5.  Edit `connect_db.php` and update your database credentials.
6.  Run the project at [http://localhost/DocChamber\_Appointment\_System/](#)

Usage
-----

*   **Patients:** Sign up via `signup.php`, login via `login.php`, and make an appointment.
*   **Admin/Staff:** Login to `dashboard.php` to generate tokens, manage hospitals, or view history.
*   **Logout:** Use `logout.php` when done.

Database Structure
------------------

Key tables include:

*   `users` – stores user info (id, username, email, phone, password, usertype)
*   `appointments` – stores appointment info, token numbers, and timestamps
*   `history` – logs appointment history
*   `hospitals` – contains hospital/chamber data

Dependencies & Requirements
---------------------------

*   PHP 7.x or higher
*   MySQL 5.x or higher
*   Apache or compatible web server (XAMPP/WAMP)
*   Browser with JavaScript enabled
*   Basic CSS/JS (included)

Contributing
------------

Contributions are welcome! If you find bugs or want to add new features (like email notifications, multiple doctors, or advanced reporting), please fork the repository, create a new branch, and submit a pull request.

License
-------

This project is licensed under the **MIT License**. See the LICENSE file for details.

Contact
-------

Created by **Tawsif Torabi** — [your.email@example.com](mailto:your.email@example.com)  
Visit the project: [GitHub Repository](https://github.com/TawsifTorabi/DocChamber_Appointment_System)
