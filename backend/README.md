# E-commerce Backend GraphQL API

This is a GraphQL API for an e-commerce website demo. It provides queries to request products data and mutations to handle orders, serving as the backend for an e-commerce platform.

## Features

- **GraphQL Queries**: Retrieve information about products and categories.
- **GraphQL Mutations**: Create orders with detailed order lines and attributes.
- **Structured API**: Modular design for extensibility and scalablity.

## Installation

1. Clone the repository and install dependencies:
```
git clone https://github.com/B-Yahia/ecom-backend.git  
cd ecom-backend  
composer install  
```
2. Database Setup

  - Create a MySQL database.
  - Run the SQL script in util/database.sql to initialize the required tables.

3. Environment Configuration

Copy .env.example to .env:
```
cp .env.example .env  
```
Update .env with your database credentials.

## Queries and Mutations
### Queries
  1. Retrieve a Single Product
```
query ($id: ID!) {
    product(id: $id) {
        id
        name
        inStock
        gallery
        prices {
            amount
            currency {
                symbol
            }
        }
        attributes {
            id
            name
            type
            items {
                id
                value
                displayValue
            }
        }
        description
        brand
    }
}
```
  2. Retrieve products by category
```
query GetProducts($category: String = "all") {
    products(category: $category) {
        id
        name
        inStock
        gallery
        prices {
            amount
            currency {
                symbol
            }
        }
        attributes {
            id
            name
            type
            items {
                id
                value
                displayValue
            }
        }
    }
}

```

### Mutations

  1. Create an Order
```
mutation ($order: OrderInput) {
    addOrder(order: $order) {
        id
        total
        orderlines {
            product {
                name
            }
            selectedAttributes {
                attribute {
                    displayValue
                }
                attributeSet {
                    name
                    type
                }
            }
        }
    }
}
```

## Testing the API

  1. Postman

  - Use the GraphQL endpoint: [https://ecom.apitestdomain.site/graphql](https://ecom.apitestdomain.site/graphql) or http://localhost:8000/graphql if the deployment is locally.
  - Send queries and mutations in the request body.
  
2. React Frontend

  - Clone the [repository](https://github.com/B-Yahia/e-com).
  - Update the API URL in src/GraphQL/apolloClient.js to match the backend server.

## Deployment

The GraphQL API is deployed on my VPS and accessible at: 
  - [https://e-com-test.netlify.app/](https://e-com-test.netlify.app/)

## Configuring a Virtual Host

If you need to configure a virtual host to deploy this application, you can follow the instructions provided in the README file of the [linux-apache-virtual-host-setup](https://github.com/B-Yahia/linux-apache-virtual-host-setup) repository.

## Requirements

  - PHP 7.4+
  - MySQL
  - Composer
