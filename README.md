## sistem informasi manajemen penjadwalan dan penyewaan jasa kesenian
## Quick Installation

    git clone

    cd proyek
    
### Composer

    composer install
    
    
### For Environment Variable Create
 
    cp .env.example .env
 
    
 ### For Migration table in database [Create database name as ```IMS```]
 
    php artisan migrate:fresh --seed
    
### Server ON ```url: http://127.0.0.1:8000/```

    php artisan serve

    php artisan storage:link

## demo

![preview img](/public/demo/demo-room.png)
