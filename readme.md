# uBooks

This project aims to provide UBC Okanagan students with a simple and efficient platform for buying and selling used textbooks.

## Installing

Get composer https://getcomposer.org/.

Clone the git into your web server.

Run the command ```composer install``` on the current directory.

Create a database called ```ubooks``` on your mysql server.

Run the command ```copy .env.example .env``` or ```cp .env.example .env``` on mac.

Run the command ```php artisan key:generate```.

Run the command ```php artisan config:clear```.

Run the command ```php artisan migrate```.

## Built With

* Laravel (https://laravel.com/)
* Bootstrap (http://getbootstrap.com/)

## Authors

* **Aditya Jain** - (https://github.com/Alterrax)
* **Alexander Mackenzie Salloum** - (https://github.com/mackosx)
* **Alvina Putri** - (https://github.com/aputri)
* **Cooper Howling** - (https://github.com/CooperHowling)
* **Duncan Hamilton** - (https://github.com/huncan)
* **Nadine Haddad** - (https://github.com/nadinehaddad)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
