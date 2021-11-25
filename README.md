## REST API записной книжки

1. Собрать композер
2. php artisan migrate --seed
3. php artisan serve

## Методы

1. GET api/v1/notebook - получение списка контактов
2. GET api/v1/notebook/{id} - получение контакта по id
3. POST api/v1/notebook | json:{"id":"уникальный id", "full_name":"ФИО | required","company":"компания","phone":"номер телефона | required", "email":"email | required", "birth":"дата рожденя", "image":"ссылка на фото"} - добавление контакта
4. PATCH api/v1/notebook/{id} - изменение контакта
5. DELETE api/v1/notebook/{id} - удаление контакта
