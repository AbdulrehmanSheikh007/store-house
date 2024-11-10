# Overview
This application simulates a storehouse management system that lists categorized products, tracks inventory, and allows data analysis. The task is to implement a system that follows modern design principles and is scalable and efficient.
# Entities & Relationships
## Products
Attributes: name, description, quantity, price, image, created_by
Relations: Each product may belong to multiple categories.
## Categories
Attributes: name
Relations: Each category can have multiple products.
## Users
Attributes: email, full_name, password
Relations: Users can create products, and each product's creator should be identifiable.
## Total Archive (Optional)
A historical table capturing daily totals for products, categories, and users, archived at 2:00 AM via a scheduled task.
# Functional Pages
## Authentication
Implement secure authentication using the latest Laravel auth package.
Pages: Login, Register, Password Reset
## Dashboard (Index)
Display total counts for products, categories, and users.
Integrate line charts (Chart.js) to show the product creation trend over time.
## Product Management
Index Page: List products in descending order by update time, with edit and delete options.
Create/Edit Product:
Validations: name and at least one category are mandatory.
Quantity Adjustment: Button to decrease quantity by 1.
Delete: Add a confirmation dialog for deletions.
## Category Management
Index Page: Show all categories and the count of assigned products.
Create/Edit Category: name must not be empty.
Delete: Prevent deletion if products are assigned.
## User Management
Index Page: List all users with edit and delete options.
Create/Edit User:
Validations: Unique email, required full_name, password length (6-20 characters).
Delete: Prevent deletion if the user has created products.
# Technical Specifications
Laravel: Use the latest stable release of Laravel (v10+), implementing service providers and policies for authorization.
Vue.js (optional): Use Vue.js (v3) for front-end interactivity and data handling.
Charting: Integrate Chart.js for the product creation trend line chart.
Real-Time Updates: Consider using Laravel Echo and WebSockets to reflect real-time product updates.
Caching and Optimization: Use caching for frequently accessed data (e.g., product lists).
File Storage: Configure the image upload system to use cloud storage (AWS S3, or similar).

## Note:
Here we are not using vue js because of some dependencies and unknown errors which is consuming more time.