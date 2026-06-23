# PHP Real-Time Chat App

A simple real-time chat application built with vanilla PHP and MySQL.

## Requirements

- PHP 8.4
- MySQL

## Database Setup

1. Open your database management tool Adminer.
2. Create a new database named `chat-app-php`.
3. Create the following tables:

### `users` table

```sql
CREATE TABLE users (
    user_id     INT AUTO_INCREMENT PRIMARY KEY,
    unique_id   INT NOT NULL,
    fname       VARCHAR(100) NOT NULL,
    lname       VARCHAR(100) NOT NULL,
    email       VARCHAR(255) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL,
    img         VARCHAR(255),
    status      VARCHAR(255)
);
```

### `messages` table

```sql
CREATE TABLE messages (
    msg_id           INT AUTO_INCREMENT PRIMARY KEY,
    incoming_msg_id  INT  NULL,
    outgoing_msg_id  INT NULL,
    msg              TEXT NULL
);
```

## Running the App

Start the PHP built-in development server from the project root:

```bash
php -S localhost:8000
```

Then open your browser and go to:

```
http://localhost:8000
```