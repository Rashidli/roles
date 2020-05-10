## Installation

- Download
- composer update
- ``` .env``` DB setup
```
   EXAMPLE
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=auth
   DB_USERNAME=root
   DB_PASSWORD=
```
- ``` php artisan migrate:fresh --seed```
## USERS

- email: user@role.az
- email: editor@role.az
- email: admin@role.az
- password : ```123456798```
---

## Routes
- /admin ``` guard('admin')```
- /admin/user ```  guard('admin')```
---
- /admin/login ``` guard('web')```
- /role ``` guard('web')```
- /permission ``` guard('web')```
- /login ``` guard('web')```
- register ``` guard('web')```


#roles
- ####editor role only view users
- ####admin role have all permissions
- ####user role only simple user

- ####only ```roles``` with ```see admin permissions```  can be logged in to the administration panel
