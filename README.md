# Office Desk Mapping System - Documentation

The project was built using the Laravel framework since I am most familiar with it due to my experience with Ruby on Rails.
## Project Setup

1. Install project dependencies:
```composer install```
and
```npm install```
2. Set up the environment variables by creating a `.env` file and updating the necessary values.
3. Run the database migrations and seeders to set up the database:
```php artisan migrate --seed```
4. Start the development server:
```php artisan serve```
5. Access the application in your web browser.

In this assignment I mainly focused on the backend to make sure I cover most of the requirements stated in the document. 
The front was put together to help demonstrate the functionality, but there has been some problems with the responsiveness
of the map.

## Right now you can do the following:
1. Create user account
2. Login as a user
3. Add and remove categories for the desks
4. Add and remove desks
5. Move desks around and resize them
6. Edit desk name or symbol

## Extras
The database has seeders that allow you to directly insert mock data into for better visualization.
I decided to implement my own user authentication system to better demonstrate my experience as opposed to using Laravel built in 
Auth system. All the routes have a custom middleware to ensure that the user is logged in before doing any adjustments in the app.
I also added 3 test classes to test all the controllers, all 15 tests pass the assertions.

## Tech Used
- HTML/CSS/Javascript
- Jquery/Ajax
- PHP/Laravel
- Postgresql
- PHPUnit
- Linux
- PHPStorm
- pgAdmin 4
- Git

## Goals
Learn websockets =)

## Demo
https://youtu.be/8eB_MEKcrt4
