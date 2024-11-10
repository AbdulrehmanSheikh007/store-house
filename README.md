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
