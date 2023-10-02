FROM ggmartinez/laravel:php-82

COPY . /app
WORKDIR /app

RUN composer install && php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=8000