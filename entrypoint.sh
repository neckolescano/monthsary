#!/bin/bash
# If .env doesn't exist, create it from example
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Inject the APP_KEY and other variables from the environment into .env
# This runs AFTER the container has started and can see your Render variables
sed -i "s/^APP_KEY=.*/APP_KEY=$APP_KEY/" .env
sed -i "s/^APP_ENV=.*/APP_ENV=$APP_ENV/" .env
sed -i "s/^APP_DEBUG=.*/APP_DEBUG=$APP_DEBUG/" .env

# Run the server
php artisan serve --host=0.0.0.0 --port=8000