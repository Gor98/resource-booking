
# Market Task

## Project Setup

Follow these steps to set up and run the project:

### 1. Clone the Repository
```sh
git clone git@github.com:Gor98/market-api-demo.git
cd market-api-demo/
```

### 2. Configure Environment Variables
Copy the example environment file and modify it as needed:
```sh
cp .env.example .env
```

### 3. Start Docker Containers
```sh
docker compose up
```

### 4. Set Permissions
```sh
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 5. Access the API Container
```sh
docker compose exec api-core bash
```

### 6. Run Database Migrations
```sh
php artisan migrate
```

### 7. Seed the Database
```sh
php artisan db:seed
```

### 8. Run tests
```sh
php artisan test
```

## API Testing
A Postman collection is included in the repository for testing the API endpoints. Import the collection into Postman to test the available routes easily.

#### **Market-api-collection.postman_collection.json**

## Additional Notes
- Ensure Docker and Docker Compose are installed on your system.
- Modify the `.env` file to match your database configuration.
- If you encounter permission issues, ensure that Docker is running with the necessary privileges.


