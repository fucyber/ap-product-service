# API List
- ap-product-service.postman_collection.json

```
Get product list
GET /api/v1/products

Get product by id
GET /api/v1/products/{id}

Add new product
POST /api/v1/products

Update product by id
PUT /api/v1/products/{id}

Delete product by id
DELETE /api/v1/products/{id}

```


# Setup
1. install repo
```sh
$ docker-compse up -d

$ docker exec -it ap-product-service sh -c "composer install"

$ docker exec -it ap-product-service sh -c "php artisan migrate"

```

2.Connect database
- Copy .env.example file rename to .env
- .env database section add database infomation.

3.Host: http://localhost:9011