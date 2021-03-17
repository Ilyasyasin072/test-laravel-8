# Rest Api Laravel 8 With Mysql

# List Project
- Login
    - Login to Dashboard only users active
- Rest Api
    - create One table relation with table users (with migration)
## Result Login Page

## Result Rest Api

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
        {
            "user_id": 2,
            "status": "active",
            "position": "IT",
            "created_at": "2021-03-16T06:10:30.000000Z",
            "updated_at": "2021-03-16T06:10:30.000000Z",
            "user": {
                "id": 2,
                "name": "aa",
                "email": "aa@gmail.com",
                "email_verified_at": null,
                "created_at": "2021-03-16T06:31:54.000000Z",
                "updated_at": "2021-03-16T06:31:54.000000Z"
            }
        }
    ],
    "code": 200
}
```
