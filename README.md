# personAPI
git clone repository

point web server to `personapi/htdocs`
change `.env` to point to DB with credentials OR by default this will use laravel's `homestead` DB with default credentials

run `php artisan migrate`

endpoints:

`get` - api/people - lists all peolpe in DB
`get` - api/peeople/{id} - lists person with 'id' of `{id}
`post` - api/people - adds person to DB * email is required *
`put` - api/people/{id} - updates person info 
`delete` - api/people/{id} - deletes person
