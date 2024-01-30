# WYD Don Bosco 2023 API

## Description

WYDDB23 API is a back office that hosts an API that communicates with the [WYD Don Bosco 23](https://github.com/tomas-ribeiro-pinto/wyddb23_flutter) flutter mobile app. The web application was developed using Laravel's PHP framework and can send notifications to the users of the app using Firebase Cloud Messaging, fetch instagram post media from a public account and provide content for the app as well as Instagram-like stories in the format of .mp4 files.

> ⚠️ Most content of the back office is written in Portuguese


### Screenshots:
![Screenshot](https://github.com/tomas-ribeiro-pinto/wyddb23_API/blob/main/screenshots/1.png)
![Screenshot](https://github.com/tomas-ribeiro-pinto/wyddb23_API/blob/main/screenshots/2.png)

## Getting Started

### Dependencies

* PHP Storm or any other IDE with Laravel installed: [https://laravel.com/docs/10.x/installation](https://laravel.com/docs/10.x/installation)
* Laravel 10.13.5
* MySQL 8.1
* PHP 8.1
* Server or local environment ready for deployment

### Executing program locally

* Change “.env_example” filename to “.env”
* Run, launch the server, and seed the app by executing the following commands:
```
php artisan serve
npm run dev
php artisan migrate --seed
```

> If you are deploying the API locally, please edit the API base URL in the mobile app Flutter code in the [API constants file](https://github.com/tomas-ribeiro-pinto/wyddb23_flutter/blob/main/lib/APIs/WydAPI/api_constants.dart).


### Add required Instagram and Firebase Tokens

* Add to the ".env" file your Instagram Access Token (to fetch posts images) and Firebase Project ID (this will allow to send notifications, see [FlutterFire Docs](https://firebase.flutter.dev/docs/overview) to help you set up)
* Add a folder named "secrets" under "storage/app"
* Add the Firebase long-lived token (which will generate the short-lived access token to send the notifications remotely) to a .json file and name it accordingly to the private key (Please remember to change the path of this file in the NotificationController as well).
* Create a blank file under the same "secrets" path and name it "access_token.json"

### Admin Credentials

Use these credentials to access the back office:

- Username: admin@admin.com
- Password: admin


The endpoint to register users is disabled, but you can either allow it by uncommenting the code in the path "routes/auth.php" or you can add more through seeding/PHP Tinker.

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
