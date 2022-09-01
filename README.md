<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Разработка API сервис 

Разработать API сервис используя Laravel, который будет ретранслировать котировки за указанный день в локальном сервисе.


1.1. На главной странице разработать форму авторизации и регистрации пользователя

1.2. После авторизации пользователю доступен функционал генерации токена для обращения к нашему API

1.3. Токен генерируется по умолчанию для каждого юзера после регистрации.

Токен генируется при регистрации, но его можно перегенерировать
Проверяться токен должен при получении данных котировок.

2.1 Для получения котировок на заданный день обращаемся в http://www.cbr.ru/scripts/XML_daily.asp?date_req=02/03/2021

2.2 Сервис должен возвращать в JSON формате при обращении по URL http://myproject.example/api/quotation/02-03-2021 все котировки которые мы забрали с шага 2.1.

- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Макет главной страницы:
------------
![alt text](https://github.com/Ruslan131132/laravel-api-task/blob/master/public/img/main.jpeg)


* Данные в API отдаются в реалтайме (проксируются)
* Доступ только для авторизованных юзеров, для неавторизованных отдавать 401: Unauthorized
* Если данных за указанную дату не существует, возвращать 404: Not Found


Замечания при решении: Поскольку авторизация и регистрация располагаются на одной странице, сделал небольшой костыль - добавил в сессию action со значениями login и register соответственно, чтобы валидировать только заполняемые поля.
