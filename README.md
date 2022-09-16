# Chatbot

This is a **simple chatbot** implementation, which answers **simple predefined questions** based on MySQL 
requests in the backend.

## Installation

In order to install this project, run the following commands:

```bash
git clone https://github.com/mocruslan/Chatbot.git
cd Chatbot
composer install
```

---

## MySQL - Scheme

In order to create the database scheme, run the following commands:

```mysql
CREATE DATABASE chatbot-sql;
```

```mysql
USE chatbot-sql;
```

```mysql
CREATE TABLE `responses` (
  `response_id` int(11) NOT NULL,
  `response` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```mysql
ALTER TABLE `responses`
  ADD PRIMARY KEY (`response_id`);
COMMIT;
```

```mysql
INSERT INTO `responses` (`response_id`, `response`, `question`) VALUES
(1, 'My name is Chatbot. Nice to meet you!', 'What is your name?'),
(2, 'I can answer simple questions.', 'What can you do?');
```

---

## Tests

Run all unit-tests

```bash
composer run-script test
```

---

## Credits

This project is based on the [CodingNepal Simple-Chatbot](https://www.codingnepalweb.com/chatbot-using-php-with-mysql/)
and alters the MySQL functionality for better usability.