
## Clone the project
    git clone https://github.com/R-Hichem/LaravelTaskV5.git
    cd LaravelTaskV5
 
## Install dependencies and lunch local server
    compopser update
    php artisan:serve

## Setup the database
create a database with the name laraveltaskv5
then run

    compopser update
    php artisan:serve
    php artisan:migrate --seed

## Api endpoints
#### create a new post:
send a POST request to `/api/post` the api accepts these inputs

    title
    description
    website_id
#### subscribe a user to a website:
send a POST request to `/api/subscribe` the api accepts these inputs

    email
    website_id
#### sending emails:
##### Setup your mailtrap credentials in .env
	

    MAIL_USERNAME=
    MAIL_PASSWORD=
you will find these in your mailtrap account

##### Run this cron your local machine

    * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
   
this will create a cron job that runs every minute to fire any job stored in the queue

