
Simple web application on php according MVC pattern




config for Nginx

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
		autoindex on;
    }
    
   \# admin links
   
       location /admin {
        try_files $uri $uri/ /admin/index.php$is_args$args;
                autoindex on;
    } 
    
    