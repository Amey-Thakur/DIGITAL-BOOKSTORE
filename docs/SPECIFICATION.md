# Technical Specification: Digital Bookstore

## System Architecture

Digital Bookstore is a full-stack e-commerce application built on the LAMP stack (Linux, Apache, MySQL, PHP). It utilizes a multi-tier architecture to separate presentation, business logic, and data management.

### 1. Presentation Layer
- **HTML5/CSS3**: Core structure and styling using custom CSS designs.
- **Bootstrap 3.3.6**: Responsive grid system and UI components (Modals, Carousels, Navigation).
- **JavaScript/jQuery**: Client-side validation, asynchronous cart updates, and interactive UI elements.

### 2. Business Logic Layer
- **PHP 7.4+**: Server-side scripting for session management, authentication, and database interaction.
- **Session Management**: Secure state persistence for user login status and shopping cart data.
- **Cart Engine**: Logic for synchronizing persistent cart data with database records.

### 3. Data Layer
- **MySQL**: Relational database management system.
- **Schema**:
  - `users`: Stores user credentials and profile information.
  - `products`: Metadata for all available books (ISBN, Title, Author, Price, Category).
  - `cart`: Mapping between users and selected products with quantity tracking.

## Technical Highlights

- **Dynamic Catalog**: Inventory is dynamically rendered from the database, allowing for real-time updates.
- **Responsive Design**: Mobile-first approach ensures optimal viewing experience across devices.
- **Search & Filtering**: Implementation of sub-string search and metric-based sorting (Price, Discount).
- **Persistence**: Cart data is stored in the database, allowing users to resume shopping across sessions.

## Deployment Requirements

- **Server**: Apache 2.4+
- **Database**: MySQL 5.7+ / MariaDB 10.3+
- **Environment**: PHP 7.1+ with `mysqli` extension enabled.
- **Deployment Tool**: XAMPP / WAMP / MAMP.
