#!/bin/bash

# Only create the symlink if it doesn't exist
if [ ! -L /var/www/html/public/storage ]; then
  echo "Creating storage symlink..."
  php artisan storage:link
fi

# Fix permissions (optional)
chmod -R 777 /var/www/html/storage

# Start Apache
apache2-foreground
