# Rest Api Laravel 8 With Mysql

# List Project
- Login
    - Login to Dashboard only users active
- Rest Api
    - create One table relation with table users (with migration)
## Result Login Page

## Build

- git clone https://github.com/Ilyasyasin072/test-laravel-8.git
- composer install or update
- cp .env-example .env
- modify database
- php artisan migrate
- php artisan db:seed

### Login
![alt text](https://github.com/Ilyasyasin072/test-laravel-8/blob/main/public/assets/img/result/login1.png)
### Dashboard 
![alt text](https://github.com/Ilyasyasin072/test-laravel-8/blob/main/public/assets/img/result/dashboard.png)
### All User
![alt text](https://github.com/Ilyasyasin072/test-laravel-8/blob/main/public/assets/img/result/user_lists.png)

## Result Rest Api

### GET

- Request
    - Method: 'GET'
    - EndPoint: '/api/v1/manage/users

- Result
```
{
    "message": "GET",
    "data": [
        {
            "user_id": 1,
            "status": "nonactive",
            "position": "Marketing",
            "created_at": null,
            "updated_at": null,
            "user": {
                "id": 1,
                "name": "test",
                "email": "test@gmail.com",
                "email_verified_at": null,
                "created_at": null,
                "updated_at": null
            }
        },
    ],
    "code": 200
}
```

### POST
- Request
    - Method: 'POST'
    - EndPoint: '/api/v1/manage/users/store
    - Body : user_id, status, position

- Result
```
{
    "message": "POST",
    "data": {
        "user_id": 1,
        "status": "active",
        "position": "Management",
        "updated_at": "2021-03-17T07:53:04.000000Z",
        "created_at": "2021-03-17T07:53:04.000000Z"
    },
    "code": 200
}
```

### PUT

- Request
    - Method: 'PUT'
    - EndPoint: '/api/v1/manage/users/update/1
    - Body : user_id, status, position

- Result
```
{
    "message": "PUT",
    "data": {
        "user_id": 1,
        "status": "active",
        "position": "Management IT",
        "created_at": "2021-03-17T07:53:04.000000Z",
        "updated_at": "2021-03-17T07:54:17.000000Z"
    },
    "code": 200
}
```

### GET BY ID

- Request
    - Method: 'GET'
    - EndPoint: '/api/v1/manage/users/show/1

- Result
```
{
    "message": "GET",
    "data": {
        "user_id": 1,
        "status": "active",
        "position": "Management IT",
        "created_at": "2021-03-17T07:53:04.000000Z",
        "updated_at": "2021-03-17T07:54:17.000000Z"
    },
    "code": 200
}
```

### DELETE

- Request
    - Method: 'DELETE'
    - EndPoint: '/api/v1/manage/users/delete/1

- Result
```
{
    "message": "GET",
    "data": {
        "user_id": 1,
        "status": "active",
        "position": "Management IT",
        "created_at": "2021-03-17T07:53:04.000000Z",
        "updated_at": "2021-03-17T07:54:17.000000Z"
    },
    "code": 200
}
