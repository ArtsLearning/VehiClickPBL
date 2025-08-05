<h1 align="center">
  <img src="public/images/Logo (Black).png" alt="Logo" height="40" style="vertical-align: middle; margin-right: 10px;">
  <strong>VehiClick</strong>
</h1>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?logo=laravel&style=for-the-badge" alt="Laravel" />
  <img src="https://img.shields.io/badge/Livewire-3-blueviolet?logo=livewire&style=for-the-badge" alt="Livewire" />
  <img src="https://img.shields.io/badge/TailwindCSS-3-38bdf8?logo=tailwindcss&style=for-the-badge" alt="Tailwind CSS" />
  <img src="https://img.shields.io/badge/Status-In_Development-brightgreen?style=for-the-badge" alt="Status" />
</p>

---

Our final submission for **Project-Based Learning**, which is a modern, stylish website-based app for renting a vehicle such as Car and Motorbike. 
Check out our website at (https://vehiclick.web.id)!

<p align="center">
  <img src="public/images/Logo (Black).png" alt="Logo">
</p>

<p align="center">
    A website-based app for vehicle rental.
</p>

---

## Meet Our Team

| NIM           | Name                              | Role                  | GitHub Username                                       |
|---------------|-----------------------------------|-----------------------|-------------------------------------------------------| 
| 3312401051    | Muhammad Arthur Putra Guntur      | Full Stack Developer  | [`@ArtsLearning`](https://github.com/ArtsLearning)    |
| 3312401037    | Rafa Aliftha                      | Full Stack Developer  | [`@alifthra`](https://github.com/alifthra)            |
| 3312401038    | Marhaban Akbar Maulana            | Full Stack Developer  | [`@marhabanakbar`](https://github.com/marhabanakbar)  |
| 3312401054    | Elsada Mika Hotrida Napitupulu    | Full Stack Developer  | [`@mikaanh`](https://github.com/mikaanh)              |
| 3312401056    | Muhammad Rifqy Hidayat            | Full Stack Developer  | [`@MRifqy51`](https://github.com/MRifqy51)            |

---

## About VehiClick

**VehiClick** is a website-based vehicle rental app that allows users to rent vehicles by online. This web is designed for users to rent vehicles such as cars and motorbikes easily in a more practical and secure way.

---

## Main Features

Here are the main features of VehiClick:

### 1. Search and Filter
Users can search for a vehicle by name on the search bar, or just click on the category buttons to filter the vehicle by category.

### 2. Digital Payment Integration via Midtrans
Users can make real-time payments with various methods using **Midtrans** payment gateway.

### 3. Rental History
Users can view their rental history, including the vehicle rented, rental duration, and total cost.

### 4. Powerful Admin Panel with Filament
Administrators can manage products, users, orders, and rental reviews using an admin panel powered by **Filament**.

---

## Tech Stack

Here are our tech stack to build **VehiClick**:

- **Frontend:** Tailwind CSS,  Blade  
- **Backend:** Laravel 12, MySQL  
- **Full-stack Tooling:** Livewire  
- **Payment Gateway:** Midtrans
- **Admin Panel:** Filament  

---

## Getting Started

### Prerequisites

Make sure to install the following below:

- PHP 8.3+
- Composer
- Node.js & NPM
- MySQL

### Installation

1. **Clone the repository and navigate to the project directory**
    ```bash
    git clone https://github.com/ArtsLearning/VehiClickPBL.git
    cd VehiClickPBL
    ```

2. **Install backend and frontend dependencies**
    ```bash
    composer install
    npm install
    ```

3. **Copy and configure the environment file**
    ```bash
    cp .env.example .env
    # Edit the .env file:
    # - DB_DATABASE=your_database
    # - DB_USERNAME=your_username
    # - DB_PASSWORD=your_password
    # - MIDTRANS_SERVER_KEY=your_midtrans_server_key
    # - MIDTRANS_CLIENT_KEY=your_midtrans_client_key
    ```

4. **Generate application key and migrate the database**
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

5. **Build frontend assets and run the development server**
    ```bash
    npm run dev
    php artisan serve
    ```

Access the website via browser: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

### ATS Presentation Video

Here is the link of our ATS Presentation Video:

**(https://youtu.be/WPpgSbXWzYM)**

---

### AAS Presentation Video

Here is the link of our AAS Presentation Video:

**(https://youtu.be/JSEtQRzgLaM)**

---

### Demonstration Video

Here is the link of our Demonstration Video:

**(https://youtu.be/sD24rRe7OPE)**

---

# User Guide

This guide will walk you through the process of using VehiClick.

---

## 1. Register

Create an account by filling in your name, email, password, and confirming the password.

> If the registration is successful, you will be directed to the **login** page.

---

## 2. Login

Log in to your account using your registered email and password.

> If the login is successful, you will be directed to the **Home** page.

---

## 3. Home

In this page, you are welcomed with a brief introduction of **VehiClick** along with the main interface, which is designed to give a strong first impression.

> To search our products, click on the **"Catalog"** on the navigation bar.

---

## 4. Catalog

This page is where you can find all our products. You can search for the vehicles by name or by category.

> To see more details about the vehicles, click the **"Details"** button on the product card.

---

## 5. Details

This page is where you can see more details about the selected vehicle, including its specification, capacity, price, even the reviews.

> To start renting the vehicle, click the **"Order Now"** button, and an order form will appear.

---

## 6. Order

This form is where you can fill in the order form with your order details, consisting of name, pickup method, start date, and end date.

> After filling in the form, the duration and the total price will appear automatically. Click the **"Order Now"**, and you will be directed to the **Payment** page.

---

## 7. Payment

In this page, you can review your order details first before doing the payment.

> After reviewing, click the **"Pay Now"** button, and a payment form will appear for you to choose your payment method and complete the payment. Once the payment is successful, you will be directed to the **History** page.

---

## 8. History

This page is where you can see all of your past orders, including the order details, and the status of the order.

> If you have completed the rental, you can click the **"Rate"** button, and a form will appear for you to rate the vehicle.

---

## 9. Rating

This form is where you can rate the vehicle you rented. You can give a star from 1 to 5, and you can also write a review about the vehicle.

> Once you are done, click the **"Submit"** button, and your rating will be saved and appears in the vehicle's details.

---

## 10. Profile

To check on your personal information, click your account on the navigation bar, and a dropdown menu will appear. Click the **"Profile"** button to be directed to the **Profile** page.

---

## 11. Edit Profile

You can edit your personal information, either it is your name, email, phone number, address, or your profile picture.

> Once you are done making changes, click the **"Save"** button, and your changes will be saved.

---

## 12. SIM Verification

This part on the profile page is where you can upload your SIM card picture for a verification. This is a required step if you want to start renting a vehicle.

> Once you have uploaded your SIM card picture, click the **"Verify"** button, and wait for the admin to verify.

---

## 13. Change Password

This part on the profile page is where you can change your password.

> Once you have entered your new password, click the **"Save"** button, and your new password will be saved.