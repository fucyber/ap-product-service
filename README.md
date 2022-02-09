# API List
- ap-product-service.postman_collection.json

```
Get product list
GET /api/v1/products

Add new product
POST /api/v1/products

Update product by id
PUT /api/v1/products/{id}

Delete product by id
DELETE /api/v1/products/{id}

```


# Setup
1. install docker
```sh
docker-compse up -d
```

2.Connect database
- Copy .env.example file rename to .env
- .env database section add database infomation.

3.Host: http://localhost:9011