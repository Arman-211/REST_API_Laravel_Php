# Laravel Project

Welcome to our Laravel project! This README will guide you through the setup process and provide some useful information about the project.

## Getting Started

Follow these instructions to get the project up and running on your local machine.

### Prerequisites

- PHP (>= 9)
- Composer
- Node.js (>= 12.x)
- npm or yarn
- MySQL or any other compatible database system

### Installation

1. Clone the repository:

    ```bash
    git clone <repository-url>
    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-project
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    # or
    yarn install
    ```

5. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Configure the database connection in the `.env` file.

8. Run migrations to create the database tables:

    ```bash
    php artisan migrate
    ```

9. Optionally, seed the database with sample data:

    ```bash
    php artisan db:seed
    ```

### Usage

To start the development server, run:

```bash
php artisan serve
```

### Using the API

### Creating a Shortened Link

Method: POST

Endpoint: /api/link

Description: Creates a shortened link based on the provided original link.

Request Parameters:

original_url (required): The original link to be shortened.

### Example Request:

```bash
  curl -X POST -H "Content-Type: application/json" -d '{"original_url": "https://example.com"}' http://your-domain/api/link
```

### Example Response:
```bash
{
    "shortened_url": "http://your-domain/abc123"
}
```
### Retrieving the Original Link
Method: GET

Endpoint: /api/link/{shortened_url}

Description: Retrieves the original link based on the shortened link.

### Request Parameters:

```bash
shortened_url (required): The shortened link.
```

### Example Request:

```bash
curl http://your-domain/api/link/abc123
```

### Example Response:

```bash
{
    "original_url": "https://example.com"
}
```
