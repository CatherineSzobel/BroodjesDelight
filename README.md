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
- **Easy Development Setup**: Simple npm script to run a local development server

### Technology Stack

- **Backend**: PHP 8.0+ with strict typing
- **Database**: MySQL with PDO
- **Frontend**: HTML5, CSS3, JavaScript, Tailwind CSS
- **Architecture**: MVC pattern with Service layer
- **Dependencies**: Composer for PHP package management, npm for development scripts
- **Environment**: dotenv for configuration management

### Project Structure

```
BroodjesDelight/
├── public/              # Web root directory
│   ├── index.php       # Main entry point
│   ├── menu.php        # Menu display
│   ├── order.php       # Order placement
│   ├── about.php       # About page
│   ├── update_sandwich.php  # Sandwich updates
│   ├── css/            # Stylesheets
│   ├── js/             # JavaScript files
│   ├── img/            # Image assets
│   └── database/       # Database SQL files
├── src/                # Application source code
│   ├── Controller/     # Controllers (OrderController)
│   ├── Model/          # Data models (Client, Order, Sandwich)
│   ├── Service/        # Business logic (ClientService, OrderService, SandwichService)
│   ├── Data/           # Data access objects (DAOs)
│   ├── Core/           # Core classes (Database, DBConfig)
│   ├── Exceptions/     # Custom exceptions
│   └── Views/          # Template files with components
├── vendor/             # Composer dependencies
├── composer.json       # PHP dependencies
└── package.json        # NPM scripts and metadata
```

### Key Components

- **OrderController**: Handles order processing and validation
- **SandwichDAO/SandwichService**: Database operations and business logic for sandwich data
- **ClientService**: User management and authentication
- **OrderService**: Order management and processing
- **Database**: PDO wrapper for database connections
- **Views**: Modular template system with reusable components

## Quick Start

### Prerequisites

- PHP 8.0 or higher
- MySQL/MariaDB database
- Composer (for PHP dependencies)
- Node.js/npm (for development scripts)

### Installation

1. **Clone or download the project** to your web directory:

2. **Install PHP dependencies** with Composer:
   ```bash
   composer install
   ```

3. **Set up environment variables**:
   - Copy `.env.example` to `.env` (if available)
   - Configure your database connection details

4. **Create the database**:
   - Import the SQL file from `public/database/broodjesdelight.sql`
   - Use phpMyAdmin or MySQL command line:
   ```bash
   mysql -u root -p < public/database/broodjesdelight.sql
   ```

### Running the Development Server

Start the development server using npm:

```bash
npm run dev
```

This will start a PHP development server on **http://localhost:8000**

You can also use:
```bash
npm start
```

### Project Usage

Once the server is running:

1. **Home Page**: Visit http://localhost:8000 to see the sandwich menu
2. **Browse Menu**: View available sandwiches on the menu page
3. **Place Orders**: Use the order form to place sandwich orders
4. **View Orders**: Check order status and history
5. **About**: Learn more about the sandwich shop

## Development

### Project Architecture

This project follows the **MVC (Model-View-Controller)** pattern with an additional Service layer for business logic:

- **Models** (`src/Model/`): Data structures (Client, Order, Sandwich)
- **Controllers** (`src/Controller/`): Request handlers (OrderController)
- **Services** (`src/Service/`): Business logic and data orchestration
- **DAOs** (`src/Data/`): Database access layer for data persistence
- **Views** (`src/Views/`): HTML templates with components

### Database

- Database configuration: `src/Core/DBConfig.php`
- Database wrapper: `src/Core/Database.php`
- SQL schema: `public/database/broodjesdelight.sql`

## NPM Scripts

- `npm run dev` - Start the development server on localhost:8000
- `npm start` - Alias for dev
- `npm run build` - Build process (placeholder for future use)
- `npm run watch` - Watch process (placeholder for future use)

## License

MIT

## Portfolio

This project serves as a demonstration of:
- PHP object-oriented programming
- MVC architectural patterns
- Database design and manipulation
- RESTful API concepts
- Frontend/backend integration
- Code organization and best practices
</content>
