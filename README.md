# Weather Temperature Tracking App
## Overview
This project is a Laravel-based web application that tracks and displays hourly temperature data for various cities using the Open-Meteo API. It includes:
- A console command to fetch and store temperature data for all cities.
- A web interface to visualize temperature data using charts.

## Features
- Fetch hourly temperature data for multiple cities.
- Store and update temperature data in a database.
- Visualize temperature data on a web page with charts.

## Requirements
- Docker
- Docker Compose
- PHP (7.4 or higher)
- Composer

## Getting Started

**Notes:**

- If you are using Sail (Laravel's official Docker development environment), make sure that the `sail` command is accessible. If you haven't set up an alias, you may need to use `./vendor/bin/sail` instead of just `sail` when referencing the `sail` command.

1. Clone the Repository
    - `git clone https://github.com/francofelicioni/laravel-weather-app.git`
    - `cd laravel-weather-app`
2. Setup Docker Environment
    - Make sure you have Docker and Docker Compose installed on your system.
3. To initialize Docker for first time for this project, in root directory of the app, paste this command:
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
4. Configure Environment
    - Create Environment Variables
        - `cp .env.example .env`
        - Update the `.env` File
            - `APP_NAME=WeatherApp`
            - `APP_ENV=local`
            - `APP_KEY=base64:your-key-here`
            - `APP_DEBUG=true`
            - `APP_URL=http://localhost`
            - `DB_CONNECTION=mysql`
            - `DB_HOST=mysql`
            - `DB_PORT=3306`
            - `DB_DATABASE=laravel`
            - `DB_USERNAME=root`
            - `DB_PASSWORD=`
            - `CACHE_DRIVER=file`
            - `QUEUE_CONNECTION=sync`
5. Start the containers
    - `sail up`
6. Install NPM Dependencies
    - `sail npm install`
7. Run migrations
    - `sail artisan migrate`
8. Generate Key
    - Load seed data into the database: `sail artisan key:generate`
9. Seed the Database
    - Load seed data into the database: `sail artisan db:seed`
10. Fetch Temperature Data
    - To fetch and store temperature data for all cities, run the following command: `sail artisan app:fetch-temperature-data`
11. Run dev and enjoy the app
    - To start the app, run the following command: `sail npm run dev`

## Usage
### Accessing the Application
After setting up and running the Docker containers, you can access the application at: `http://localhost`

### Viewing Temperature Data
- Homepage: Displays a summary or list of cities.
- City Details Page: Shows temperature data in a chart for a specific city.

### Updating Temperature Data
Run the console command periodically using a task scheduler or cron job to keep the data up-to-date:
    - `docker-compose exec app sail artisan app:fetch-temperature-data`

## Docker Commands
- Start Containers: `sail up`
- Stop Containers: `sail down`
- Rebuild Containers: `sail up --build`
- Run Composer Install: `sail exec app composer install`
- Run Artisan Commands: `sail exec app sail artisan <command>`

## API Integration
The WeatherService class fetches data from the Open-Meteo API. Ensure you have internet access for API requests. Adjust the API URL and parameters if necessary.

## Contributing
If you’d like to contribute, please fork the repository and submit a pull request with your changes.

## License
This project is licensed under the MIT License.

## Acknowledgments
- Laravel Framework
- Open-Meteo API
- Docker
- Chart.js

## Author
- Franco Felicioni
