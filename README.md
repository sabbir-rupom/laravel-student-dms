composer create-project laravel/laravel student-dms
cd student-dms/
npm install
npm install --save bootstrap@next
npm install --save @popperjs/core
npm install --save jquery
npm install @fortawesome/fontawesome-free --save-dev

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

php artisan serve --port 10008