### **1\. Download Repo**

Download this repo to your designated directory/folder

### **2\. Set up environment file**

Copy the example environment file:

```
cp .env.example .env
```

### **3\. Start Docker environment**

Run the following command to build and start the development containers:
```
docker compose -f compose.dev.yaml up -d --build
```
### **4\. Install dependencies**

Enter the workspace container:
```
docker compose -f compose.dev.yaml exec workspace bash
```
Install PHP dependencies:
```
composer install
```
Generate the application key:
```
php artisan key:generate
```
### **5\. Initialize the database**

Run the migrations to set up the database schema:
```
php artisan migrate:fresh
```
### **6\. Import initial data**

Import any default data provided by the application:
```
php artisan app:import-data-command
```
### **7\. Seed the admin user**

Create an admin user for testing:
```
php artisan app:init-admin-user  
```
---

## **Login Credentials**

Use the following credentials to log in:

* **Route:** `http://localhost/api/login`  
* **Email:** `admin@email.com`  
* **Password:** `password`

### **Example Login Response**

Upon successful login, you should see a response like this:
```
{  
 "user": {  
   "id": 11,  
   "name": "admin",  
   "email": "admin@email.com",  
   "email\_verified\_at": null,  
   "username": null,  
   "address": null,  
   "phone": null,  
   "website": null,  
   "company": null,  
   "created\_at": "2026-03-28T08:35:31.000000Z",  
   "updated\_at": "2026-03-28T08:35:31.000000Z"  
 },  
 "token": "1|OMJv8aC2awUaCQiP2v3q5WPekomxAKCQwUJ8DYcs21774b0d"  
}
```

Use the value of the `"token"` key as a **Bearer token** when accessing protected API routes in clients such as Postman or Insomnia.

---

## **API Examples**

Here are a few example endpoints you can test:

* Get a specific post:  
   `http://localhost/api/post/1`  
* Get a specific comment:  
   `http://localhost/api/comment/1`

All API routes are protected by Laravel Sanctum. You must include the Bearer token in the `Authorization` header to access them.

---

## 

## **Notes**

* Make sure Docker is installed and running on your machine.  
* Use the `workspace` container for executing artisan commands and composer.  
* All migrations, seeding, and data import commands should be run inside the container.
