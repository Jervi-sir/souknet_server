Authentication:

Authentications
| Endpoint              | Method | Description           | Header       | Body                  | Response              |
|-----------------------|--------|-----------------------|--------------|-----------------------|-----------------------|
| /api/user/register    | POST   | Register as User      |              | name, email, password | Bearer Token          |
| /api/user/login       | POST   | Login as User         |              | email, password       | Bearer Token          |
| /api/user/logout      | POST   | Logout as User        | bearer token |                       | Success               |
| --------------------  | ------ | --------------------- | ------------ | --------              | --------------------- |
| /api/company/register | POST   | Register as Company   |              | name, email, password | Bearer Token          |
| /api/company/login    | POST   | Login as Company      |              | email, password       | Bearer Token          |
| /api/company/logout   | POST   | Logout as Company     | bearer token |                       | Success               |
| --------------------  | ------ | --------------------- | ------------ | --------              | --------------------- |

Company Authenticated
| Endpoint                                 | Method     | Description                       | Header           | Body         | Response       |
|------------------------------------------|------------|-----------------------------------|------------------|--------------|----------------|
| /api/auth/company/add-products           | GET        | Get add Products Page             | bearer token     |              | success        |
| /api/auth/company/add-products           | POST       | Upload Product                    | bearer token     | success      | success        |
| /api/auth/company/product/{id}           | GET        | Get this Product as Company       | bearer token     |              | success        |
| /api/auth/company/product/{id}           | DELETE     | Delete this Product as Company    | bearer token     | success      | success        |
| /api/auth/company/archive-product/{id}   | POST       | Archive this Product as Company   | bearer token     | success      | success        |
| ---------------------------------------- | ---------- | --------------------------------- | ---------------- | ------------ | -------------- |
| /api/auth/company/add-service            | GET        | Get add Services Page             | bearer token     |              | success        |
| /api/auth/company/add-service            | POST       | Upload Service                    | bearer token     | success      | success        |
| /api/auth/company/service/{id}           | GET        | Get this Service as Company       | bearer token     |              | success        |
| /api/auth/company/service/{id}           | DELETE     | Delete this Service as Company    | bearer token     | success      | success        |
| /api/auth/company/archive-service/{id}   | POST       | Archive this Service as Company   | bearer token     | success      | success        |
| ---------------------------------------- | ---------- | --------------------------------- | ---------------- | ------------ | -------------- |
| /api/auth/company/getAllProducts         | GET        | List my Products as company       | bearer token     |              | success        |
| /api/auth/company/getAllServices         | GET        | List my Services as company       | bearer token     |              | success        |
| ---------------------------------------- | ---------- | --------------------------------- | ---------------- | ------------ | -------------- |

Guest
| Endpoint                         | Method   | Description                   | Header         | Body      | Response   |
|----------------------------------|----------|-------------------------------|----------------|-----------|------------|
| /api/service/get/{service_id}    | GET      | Show this Service details     |                |           | success    |
| /api/service/latest              | GET      | Show Lastest Services         |                |           | success    |
| /api/service/search/{keywords}   | GET      | Search Service by keywords    |                |           | success    |
| /api/product/get/{product_id}    | GET      | Get this Product details      |                |           | success    |
| /api/product/latest              | GET      | Get Lastest Products          |                |           | success    |
| /api/product/search/{keywords}   | GET      | Search Product by keywords    |                |           | success    |
| /api/category/{id}               | GET      | Get By Category               |                |           | success    |
| /api/company/{id}                | GET      | Show Company Details          |                |           | success    |
| -------------------------------- | -------- | ----------------------------- | -------------- | --------- | ---------- |

User Authenticated
| Endpoint                                          | Method   | Description              | Header         | Body      | Response   |
|---------------------------------------------------|----------|--------------------------|----------------|-----------|------------|
| /api/auth/user/company/{id}/follow                | POST     | Follow this Company      | bearer token   |           | success    |
| /api/auth/user/company/{id}/unfollow              | POST     | unFollow this Company    | bearer token   |           | success    |
| /api/auth/user/company/{id}/newsletter/follow     | GET      | Follow this Newsletter   | bearer token   |           | success    |
| /api/auth/user/company/{id}/newsletter/unfollow   | GET      | unFollow this Newsletter | bearer token   |           | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |
| /api/auth/user/product/{id}/favorite              | GET      | Save this Product        | bearer token   | success   | success    |
| /api/auth/user/product/{id}/unfavorite            | GET      | unSave this Product      | bearer token   | success   | success    |
| /api/auth/user/product/{id}/add-review            | GET      | Post Review in Product   | bearer token   | success   | success    |
| /api/auth/user/product/{id}/delete-review         | GET      | get add services page    | bearer token   | success   | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |
| /api/auth/user/service/{id}/favorite              | GET      | Save this Service        | bearer token   | success   | success    |
| /api/auth/user/service/{id}/unfavorite            | GET      | unSave this Service      | bearer token   | success   | success    |
| /api/auth/user/service/{id}/book                  | GET      | Book a Session           | bearer token   | success   | success    |
| /api/auth/user/service/{id}/unbook                | GET      | Cancel Booking a Session | bearer token   | success   | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |
| /api/auth/user/orders                             | GET      | List my Orders           | bearer token   | success   | success    |
| /api/auth/user/orders/{id}                        | GET      | Show this Order          | bearer token   | success   | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |
| /api/auth/user/favorites/                         | GET      | List my Favorites        | bearer token   | success   | success    |
| /api/auth/user/favorites/{id}                     | GET      | Show this Favorite       | bearer token   | success   | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |
| /api/auth/user/notifications                      | GET      | List Notifications       | bearer token   | success   | success    |
| /api/auth/user/notifications/{id}                 | GET      | Show this Notification   | bearer token   | success   | success    |
| ------------------------------------------------- | -------- | -----------------------  | -------------- | --------- | ---------- |





Coupons:
[] POST /api/coupons
[] GET /api/coupons
[] GET /api/coupons/{id}
[] PUT /api/coupons/{id}
[] DELETE /api/coupons/{id}

Service Availability:
[] POST /api/service_availability
[] GET /api/service_availability/{id}
[] PUT /api/service_availability/{id}
[] DELETE /api/service_availability/{id}

Payment Methods:
[] POST /api/payment_methods
[] GET /api/payment_methods
[] GET /api/payment_methods/{id}
[] PUT /api/payment_methods/{id}
[] DELETE /api/payment_methods/{id}

Transactions:
[] POST /api/transactions
[] GET /api/transactions
[] GET /api/transactions/{id}
