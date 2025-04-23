#!/bin/bash

# Link storage (only if not already a link)
if [ ! -L /var/www/html/public/storage ]; then
  php artisan storage:link
fi

# Continue with Apache
apache2-foreground
