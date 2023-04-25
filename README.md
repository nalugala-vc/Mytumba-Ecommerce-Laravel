# Mytumba Ecommerce Website
Mytumba is a full-stack ecommerce website that I developed as a freelance project during my long holiday in 2nd year. The website is designed specifically for Kenyans and offers a wide range of products, including clothing, accessories, electronics, and more.

## Technologies Used
The Mytumba website is built using the following technologies:

* HTML
* CSS
* JavaScript
* Laravel (PHP framework)
* XAMPP (Apache, MySQL)
## Features
The Mytumba website offers the following features:

* User registration and login
* Product browsing and search
* Shopping cart and checkout
* Order tracking
* Payment integration (via M-Pesa)
* Admin CRUD functionalities

## Screenshots
Here are some screenshots of the Mytumba website:

Homepage

Product Page

Shopping Cart

## Installation
To run the Mytumba website on your local machine, follow these steps:

Install XAMPP on your computer (if not already installed).

Clone the Mytumba repository to your local machine.

Open the project directory in your terminal and run the following commands:


composer install

npm install
Create a new MySQL database using the XAMPP control panel.

Copy the .env.example file to a new file called .env and update the following variables:

DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
Run the following commands in your terminal to generate a new app key and run database migrations:

php artisan key:generate

php artisan migrate
Finally, run the following command to start the Laravel development server:

php artisan serve
You should now be able to access the Mytumba website at http://localhost:8000.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
