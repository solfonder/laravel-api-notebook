## REST API записной книжки
```
1. Собрать композер
2. $ php artisan migrate --seed
3. $ php artisan serve
```
## Методы
```
GET api/v1/notebook
Получение списка контактов

GET api/v1/notebook?page={page_number}
Получение определенной страницы списка контактов

GET api/v1/notebook/{id}
Получение контакта по id

POST api/v1/notebook
json:{"id":"уникальный id", "full_name":"ФИО | required","company":"компания","phone":"номер телефона | required", "email":"email | required", "birth":"дата рожденя", "image":"ссылка на фото"} 
Добавление контакта

PATCH api/v1/notebook/{id} 
Изменение контакта

DELETE api/v1/notebook/{id} 
Удаление контакта
```
