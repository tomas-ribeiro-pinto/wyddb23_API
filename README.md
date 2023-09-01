# Project Title

WYD Don Bosco 2023 API

## Description

WYDDB23 API is a back office that hosts an API that communicates with the [WYD Don Bosco 23](https://github.com/tomas-ribeiro-pinto/wyddb23_flutter) flutter mobile app. The web application was developed using Laravel's PHP framework and can send notifications to the users of the app using Firebase Cloud Messaging, fetch instagram post media from a public account and provide content for the app as well as Instagram-like stories in the format of .mp4 files.

> ⚠️ Most content of the back office is written in Portuguese


### APP Store Screenshots:
![Screenshot](https://github.com/tomas-ribeiro-pinto/wyddb23_API/blob/main/screenshots/1.png)
![Screenshot](https://github.com/tomas-ribeiro-pinto/wyddb23_API/blob/main/screenshots/2.png)

## Getting Started

### Dependencies

* PHP Storm or any other IDE with Laravel installed: [https://docs.flutter.dev/get-started/install](https://laravel.com/docs/10.x/installation)
* Laravel 10.13.5
* MySQL 8.1
* PHP 8.1
* Server or local environment ready for deployment

### Executing program

* Change “.env_example” filename to “.env”
* Add your Instagram Access Token (to fetch posts images) and Firebase Project ID (this will allow to send notifications, see [FlutterFire Docs](https://firebase.flutter.dev/docs/overview) to help you set up)
* Run, launch the server, and seed the app by executing the following commands:
```
php artisan serve
npm run dev
php artisan migrate --seed
```

### Admin Credentials

Use these credentials to access the back office:

*Username: admin
*Password: admin

The endpoint to register users is disabled, but you can either allow it by uncommenting the code in the path routes/auth.php or you can add more through seeding/PHP Tinker.

Types of roles and permissions:
- Admin (add, edit, delete, send notifications and manage instagram media)
- Editor (add, edit, send notifications and manage instagram media)
- Communicator (send notifications)
- Media (manage instagram media)


## Authors

Contributors names and contact info:

* Tomás Pinto - morato.toms@gmail.com

## Intellectual Property Warning

> All logos are property of the brand WYD Don Bosco 23 and should only be used according to stated guidelines. More information: https://wyddonbosco23.pt/en/brand/

> For more information about WYD DON BOSCO 23 brand please contact: [comunicação.wyddb23@staff.salesianos.pt](mailto:comunicacao.wyddb23@staff.salesianos.pt)
