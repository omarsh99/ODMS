# Office Desk Mapping System - Documentation

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

## Routes

- `GET /` - Homepage
- `GET /desks` - List all desks
- `GET /desks/create` - Show the form to create a new desk
- `POST /desks` - Store a new desk
- `GET /desks/{id}/edit` - Show the form to edit a specific desk
- `PUT /desks/{desk}` - Update a specific desks position or size
- `PATCH /desks/{desk}` - Update a specific desks name and symbol
- `DELETE /desks/{id}` - Delete a specific desk

## Operations

The following operations can be performed on the desks:

- Create a new desk by submitting a form with the desk name, symbol, position_x, position_y.
- Edit the details of an existing desk by accessing the edit page for that desk.
- Update the details of a desk by submitting a form with the updated values.
- Delete a desk by sending a DELETE request to the corresponding route.
- View a list of all desks and their details on the desks listing page.



