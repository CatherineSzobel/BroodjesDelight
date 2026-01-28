# BroodjesDelight - Sandwich Shop Portfolio Project

## About

BroodjesDelight is a modern web application built as a portfolio piece to demonstrate PHP development skills and MVC architecture. This project simulates a complete sandwich ordering system for a fictional sandwich shop, showcasing full-stack web development capabilities.

### Features

- **MVC Architecture**: Clean separation of concerns with Model-View-Controller pattern
- **Database Integration**: MySQL database with PDO for data persistence
- **Order Management**: Complete order placement and management system
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **Client Management**: User registration and profile management
- **Sandwich Customization**: Dynamic menu with customizable sandwich options

### Technology Stack

- **Backend**: PHP 8.0+ with strict typing
- **Database**: MySQL with PDO
- **Frontend**: HTML5, CSS3, JavaScript, Tailwind CSS
- **Architecture**: MVC pattern with Service layer
- **Dependencies**: Composer for PHP package management
- **Environment**: dotenv for configuration management

### Project Structure

```
BroodjesDelight/
├── public/              # Web root directory
│   ├── index.php       # Main entry point
│   ├── menu.php        # Menu display
│   ├── order.php       # Order placement
│   └── css/            # Stylesheets
├── src/                # Application source code
│   ├── Controller/     # Controllers
│   ├── Model/          # Data models
│   ├── Service/        # Business logic
│   ├── Data/           # Data access objects
│   └── Views/          # Template files
└── vendor/             # Composer dependencies
```

### Key Components

- **OrderController**: Handles order processing and validation
- **SandwichDAO**: Database operations for sandwich data
- **ClientService**: User management and authentication
- **Database**: PDO wrapper for database connections
- **Responsive Views**: Tailwind CSS styled templates

This project demonstrates proficiency in modern PHP development practices, including object-oriented programming, database design, and web application architecture.</content>
