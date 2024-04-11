Project Name: Ticketing Platform

Description:
The Ticketing Platform is a web application designed to facilitate the purchase of event tickets online. It allows users to browse available events, view event details, purchase tickets, and manage their bookings. This project is built using Symfony, a PHP web application framework.

Features:

Browse Events: Users can browse a list of available events.
Event Details: Users can view detailed information about each event, including the event name, description, date, venue, artist, and ticket price.
Purchase Tickets: Users can purchase tickets for their desired events.
Manage Bookings: Users can manage their ticket bookings, including viewing booked tickets, editing bookings, and canceling bookings.

Technologies Used:
Symfony: PHP web application framework for building the backend.
Twig: Template engine for rendering HTML templates.
Doctrine: Object-Relational Mapping (ORM) for database interaction.
HTML/CSS: Frontend markup and styling.
Bootstrap: Frontend framework for responsive design.
JavaScript: Client-side scripting for dynamic behavior.

Installation:
Clone the repository: git clone https://github.com/ArnoldOcaya/sfEventsTickets.git
Install dependencies: composer install
Configure the database connection in the .env file.
Run migrations to create the database schema: php bin/console doctrine:migrations:migrate
Start the Symfony development server: symfony server:start

Usage:
Access the application in a web browser: http://localhost:8000
Browse available events and view event details.
Purchase tickets for desired events by clicking on the "Buy Ticket" button.
Manage ticket bookings through the user dashboard.

Credits:
Author: Arnold Obangakene
Email: arnoldocaya0030@email.com
