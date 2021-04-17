# Welcome to My Repository

Many of our fresh web developer fell into awkward situations when they start their web development career in a reputed company. The company does not provide much time to guide them to their skill development, yet they push them to ask for output according to their desire. So, many fresh web developer feels a lot of pressure themselves for maintaining company responsibility. 

I was also such a developer and I feel the pain of that pressure. Thus I have created this **Simple yet Semi-advanced project** with the most popular PHP framework: **Laravel**

The purpose of this project is: 

* enlighten the fresh developers with the beauty of web development in PHP
* understand Laravel MVC architecture
* understand database migrations, relationships
* understand Blade template engine functionalities
* understand web UI development with Laravel Mix: using Bootstrap CSS, Sass, javaScript/jQuery, Webpack 
* understand how you should organize your code source
* understand web routes of Laravel
* some other things- if you can learn yourself through practices ;) 

I didn't use any frontend framework here: lets not put pressure on freshers :) 


### Technology Stacks

Lets find out our technology stacks here:

* [Laravel 8](https://laravel.com/docs/8.x) : How about you learn more about it from here: [https://www.youtube.com/watch?v=376vZ1wNYPA](https://www.youtube.com/watch?v=376vZ1wNYPA)
* [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/) : Though Tailwind CSS would have been the best approach here, I am little weak on tailwind (LoL)
* [Sass](https://sass-lang.com/guide)
* [jQuery](https://jquery.com/) : How about you learn more about it from here: [https://www.youtube.com/watch?v=HgvIox6ehkM](https://www.youtube.com/watch?v=HgvIox6ehkM)
* [Laravel Mix/Webpack](https://laravel.com/docs/8.x/mix) :  While using laravel mix for your resource management, you may think, "what the hell is webpack doing here?". Well, you should learn about it- dont you? [https://www.youtube.com/watch?v=X1nxTjVDYdQ](https://www.youtube.com/watch?v=X1nxTjVDYdQ)

### Prerequisite Technology Skills

Well, I have said previously though this project is an learning curve for Fresh Web Developers, it's not for that *Fresh* ones. This project is also a little *Semi-Advanced*. So, lets see what the pre-rwquisites are:

- PHP : You must be a programmer and you must know PHP langauge
- HTML/HTML5 : You must know about HTML page designing
- CSS: You must know CSS styling
- javaScript: You must know javaScript: Clientside scripting language

If you have problems regarding any of the above, why not come back here later? And have some thorough practices from [w3schools](https://www.w3schools.com/)

Also, as a web developer you should have experience in handling a suitable IDE. I suggest either *PHP Storm* or *Visual Studio Code* here 

##### If everything from above is ready- let's get started shall we!

### Things I have done

Lets say, you know laravel, you have a suitable environment setup in your computer like: WAMPP, Composer, Node, GIT Bash etc. 

From a suitable directory, I have run the following commands:

```
composer create-project laravel/laravel student-dms

cd student-dms/

npm install

npm install --save bootstrap@next

npm install --save @popperjs/core

npm install --save jquery

npm install @fortawesome/fontawesome-free --save-dev
```

// add necessary changes in:
// - resources/js/bootstrap.js 
// - resources/js/app.js 
// - delete css folder and add saas/app.scss in resources directory with changes
 
npm run dev [ 2 times ]

composer require laravel/fortify

php artisan make:seeder UserSeeder

php artisan make:seeder GradeSeeder

php artisan make:model Student --migration

php artisan make:model Group --migration

php artisan make:model Subject --migration

php artisan make:model Grade --migration

php artisan make:model Result --migration

php artisan storage:link

php artisan key:generate

php artisan migrate:fresh --seed

php artisan serve --port 10008
