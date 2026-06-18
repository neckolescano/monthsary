#!/bin/bash
# 1. Create .env from .env.example if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# 2. Update .env with the APP_KEY from Render's Environment Variables
# We use the '|' delimiter to avoid issues with '/' in base64 strings
sed -i "s|^APP_KEY=.*|APP_KEY=$APP_KEY|" .env

# 3. Ensure other production settings are forced
sed -i "s|^APP_ENV=.*|APP_ENV=production|" .env
sed -i "s|^APP_DEBUG=.*|APP_DEBUG=false|" .env

# 4. Clear the config cache so Laravel picks up the changes
php artisan config:clear

# 5. Run the server
php artisan serve --host=0.0.0.0 --port=8000