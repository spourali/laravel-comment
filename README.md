

# laravel-comment

Ajax comment with 3 layers of responds


- Only name and comment are required fields
- Page should not refresh when posting a comment
- Commenters can write a reply to other comments
- Maximum of 3 levels in nested comments
- Comments (within in the same level) should be ordered by post date



## Run

- set up your database in `.env`

-  `$ composer install`
-  `$ php artisan migrate`
- if you need some dummy data `php artisan db:seed`
- Run server `php artisan serve`




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

 