
[x] auth breeze
[x] auth sanctume
[x] multiauth
[x] Auth Controller
[x] login User, Business, Admin
[x] register User, Business, Admin
[x] logout User, Business, Admin

[] Business Controller
[] edit
[] stats
[] publish product
[] publish service
[] edit product
[] edit service
[] remove product
[] remove service
[] get email for his follower
[] automate sending email
[] subscribe and unsubscribe to email news letter

[] add to dns a key for avoiding spam
[] mail chimp

[] Product Controller
[] getProduct

[] Service Controller
[] getService

[] add data collection as cookies
[]


chatgpt:
```
m using laravel as backend api, i want to create factory fake data, here are tables m using
these tables: 
- company_privileges: name, description
- users: name, email, password, phone_number, social_media_list, bio, location, gender, birthday, wilaya_number.
- companies: name, email, password, phone_number, social_media_list, description_ar, description_fr, description_en, address, city, state, zip_code, country, phone_number, website, wilaya_number, company_privileges, is_verified, users, company_privileges, company_privileges_id
- products: company_id, name, current_price, keywords, description_ar,  description_fr, description_en, status (archived: 0, avtive: 1).
- services: company_id, name, current_price, keywords, description_ar,  description_fr, description_en, duration, status (archived: 0, avtive: 1).
- orders: product_id, user_id, quantity, oreder_price, destination, location, order_status (pending 1, processing 2, completed 3, canceled 4).
- company_images: company_id, url, meta_keywords.
- user_images: user_id, url, meta_keywords.
- product_images: product_id, url, meta_keywords.
- service_images: service_id, url, meta_keywords.
- product_price_histories: product_id, price.
- categories: parent_id, description, name.
- review_services: service_id, user_id, rating, comment
- transactions: order_id, payment_method_id, amount, transaction_id, status (success 1, faild 0, pedning 2, refunded 3).
- payment_methods: company_id, type, detials
- coupons: code, description, discount_type, discount_amount, date_valid_from, date_valid_until, min_order_value, max_order_value
- favorite_products: product_id, user_id and both user_id and product_id must be unique
- favorite_services: service_id, user_id and both user_id and service_id must be unique
- bookings: service_id, user_id, date, subject, message.
- notifications: user_id, title, message, read_status (read: 1, not read: 0)
- review_products: product_id, user_id, rating, comment
- product_category: product_id, category_id.
- order_coupons: order_id, coupon_id.
- company_user: company_user, user_id and both user_id and company_id must be unique

```


