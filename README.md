# personAPI
Installation and Usage:


1) `git clone` repository

2) point web server `docroot` to `personapi/htdocs`

3) change `.env` to point to DB with credentials OR by default this will use laravel's `homestead` DB with default credentials

4) run `php artisan migrate` from `personAPI`directory

endpoints:

`get` - api/people - lists all peolpe in DB

`get` - api/peeople/{id} - lists person with 'id' of `{id}

`post` - api/people - adds person to DB * email is required *

`put` - api/people/{id} - updates person info 

`delete` - api/people/{id} - deletes person


This was tested using `api/people` as `POST` with:
`{
    "first_name": "Jessica",
    "last_name": "Doe",
    "age": 37,
    "email": "jesssica.doe@example.com",
    "interests": [
        "Archery",
        "Painting",
        "Paintball",
        "Sportsball",
        "Music"
    ],
    "admission_date": "2017-01-08",
    "admission_time": "4:23pm",
    "is_active": null
}`

