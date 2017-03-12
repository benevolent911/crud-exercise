# crud-exercise
## Rio's Library Project (Laravel 5.4) by Erick Rebadeo

### Pre-requisites
* PHP >= 5.6.4
* [Composer](https://getcomposer.org/)
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [XAMMP](https://www.apachefriends.org/download.html) >= v3.2.2

### Installation by terminal/command prompt
 >**Make sure XAMPP Apache and MySQL are both running.*

* ```git clone https://github.com/benevolent911/crud-exercise.git projectname ```
* ```cd projectname ```
* ```composer install ```
* ```php artisan key:generate ```
* Run `CREATE DATABASE riodb;` MySQL query and edit projectname/.env file DB_ username/password etc..
* ```php artisan migrate --seed``` to create tables and populate fake/dummy book data and Rio admin account
* ```php artisan serve``` then point browser to laravel server to start the app

### Default Admin Account
* Email : ```rio@email.com```
* Password : ```admin```

### Features

* Home/Books Page, Available Books Page, Borrowed Books Page, Register Page, Create Book Page
* Book details (title, author, genre, library section, borrowed count, last borrowed by)
* Search books by filter (title, author, genre and library section)
* Order books by ascending or descending
* Return/borrow book
* Edit/delete book
* Autocomplete search box
* Authentication (registration, login, logout)
* Roles (admin, user/borrower, public)
* Data validation (email, password, name, title, author, genre and library section)
* Custom Error Page 403, 404, 405

### Includes
* [Bootstrap](https://pages.github.com/) for CSS and JQuery plugins
* [JQueryUI](http://jqueryui.com/download/) for autocomplete feature
* [Bootswatch](https://bootswatch.com/) for spacelab theme 

