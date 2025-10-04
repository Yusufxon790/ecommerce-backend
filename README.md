# 🛒 Ecommerce Backend API – Laravel & MySQL

This project is a **production-ready Ecommerce Backend API** built with **PHP** and **Laravel**.  
It provides a complete solution for managing users, products, and orders, with **secure authentication, admin panel integration, clean architecture, and full API documentation**.  
Designed with real-world scalability in mind, this system can be integrated into mobile apps, SPAs, or ecommerce websites.  

---

## 🚀 Key Features

- **RESTful API** – structured endpoints with proper resource separation.  
- **Authentication & Authorization** – powered by **Laravel Sanctum** for secure access.  
- **User Management** – register, login, profile updates, and role-based access.  
- **Product Management** – CRUD for products, categories, and images.  
- **Order Management** – shopping cart, checkout process, and order history tracking.  
- **Admin Panel** – manage products, users, and orders through a web-based dashboard.  
- **Database Migrations & Eloquent ORM** – clean and consistent schema management.  
- **API Documentation** – full Postman collection available for testing.  
- **Scalable Architecture** – developed following industry best practices for long-term growth.  

---

## 🛠️ Technologies Used

- **PHP:** Version 8.x    
- **Laravel:** A powerful PHP framework for web applications    
- **MySQL:** Database management systems   
- **Laravel Sanctum** (authentication)  
- **Postman** For API testing and documentation  
- **Figma** Used for frontend design (see UI Design section)     

---

## 🎨 UI Design

While this course primarily focuses on backend development, the frontend design has been meticulously crafted using Figma. 

👉 **Figma Design:**[View Figma Design](https://www.figma.com/design/8TvM4UJfGOE334pySsOqZp/Ecommerce-App-UI-Kit--Community-?node-id=0-1&p=f&t=7rIptiUXAUXwCNtA-0)  
Additionally, UI images are included in the repository to showcase the intended look and feel of the final application.  

---

## 📖 API Documentation

A full **Postman collection** is available for testing and exploring the API endpoints.  
👉 **Postman Documentation:**[View Postman Documentation](https://documenter.getpostman.com/view/47671054/2sB3QGuXEQ)  

---

## ⚙️ Installation & Setup  
1. Clone the repository   
   ```
   git clone https://github.com/Yusufxon790/ecommerce-backend-api.git  
   cd ecommerce-backend-api  
   ```
2. Install dependencies  
   ```
   composer install  
   ```
3. Environment setup
   ```
   cp .env.example .env
   ```
- Update `.env` with your MySQL credentials.  
- Configure `SANCTUM` and `APP_URL`.  
4. Generate application key
  ```
  php artisan key:generate  
  ```
5. Run migrations
   ```
   php artisan migrate
   ```
6. Start the development server
   ```
   php artisan serve  
   ```
**Visit:** `http://localhost:8000`

---

## 📂 Project Structure  
```
│── app/              → Core Laravel application    
│── database/         → Migrations & seeders   
│── routes/api.php    → API routes  
│── config/           → Config files  
│── public/           → Public assets  
│── tests/            → Feature & unit tests  
│── .env.example      → Example environment config  
│── README.md         → Documentation  
```

---

## 🔑 Why This Project Stands Out  

✅ Secure authentication with Sanctum  
✅ Full CRUD for Users, Products, and Orders  
✅ Production-ready Laravel architecture  
✅ Clean database design with migrations  
✅ Full Postman API docs + Figma UI reference  

---

## 👨‍💻 Author
- [MuhammadYusuf Akramov](https://github.com/Yusufxon790)  
- 📧 Email: akramovyusufxon590@gmail.com

---

## 📝 License
MIT — feel free to use and adapt for learning/portfolio purposes.  

