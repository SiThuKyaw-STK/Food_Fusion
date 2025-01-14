CREATE TABLE `user` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(500),
  last_name VARCHAR(500),
  password VARCHAR(500),
  email VARCHAR(500),
  phone VARCHAR(500),
  failed_attempts INT DEFAULT 0,
  lockout_until TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL
);

CREATE TABLE `recipes` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  user_id INT(11),
  image VARCHAR(500),
  recipe_name VARCHAR(500),
  description VARCHAR(500),
  preparation_time INT(11),
  cooking_time INT(11),
  instructions TEXT,
  tip VARCHAR(500),
  level INT(11) comment '1.easy 2.medium 3.hard',
  view_count BIGINT UNSIGNED DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE `recipe_steps` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  recipe_id INT(11),
  step_name VARCHAR(500),
  step_desc TEXT,
  sorting INT(11),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

CREATE TABLE `category` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(500),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL
);

CREATE TABLE `recipes_category` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  recipe_id INT(11),
  category_id INT(11),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  FOREIGN KEY (recipe_id) REFERENCES recipes(id),
  FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE `ingredients` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(500),
  unit INT(11),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL
);

CREATE TABLE `recipe_ingredients` (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  recipe_id INT(11),
  ingredients_id INT(11),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  FOREIGN KEY (recipe_id) REFERENCES recipes(id),
  FOREIGN KEY (ingredients_id) REFERENCES ingredients(id)
);


INSERT INTO user (first_name, last_name, password, email, phone) VALUES 
  ('Alice', 'Johnson', 'hashed_password3', 'alice@example.com', '1112223333'),
  ('Bob', 'Williams', 'hashed_password4', 'bob@example.com', '2223334444'),
  ('Charlie', 'Brown', 'hashed_password5', 'charlie@example.com', '3334445555');

INSERT INTO recipes (user_id, image, recipe_name, description, preparation_time, cooking_time, instructions, tip, level, view_count) VALUES 
  (1, './assets/img/food1.jpg', 'Beef Stroganoff', 'A creamy Russian beef dish.', 20, 40, 'Cook beef, add mushrooms, then combine with cream.', 'Use sour cream for added richness.', 3, FLOOR(RAND() * 1000)),
  (2, './assets/img/food2.jpg', 'Chocolate Cake', 'Rich and moist chocolate cake.', 15, 30, 'Mix ingredients, bake at 350°F for 30 minutes.', 'Top with ganache for extra flavor.', 2, FLOOR(RAND() * 1000)),
  (3, './assets/img/food3.jpg', 'Caesar Salad', 'A fresh and tangy salad with Caesar dressing.', 10, 5, 'Chop lettuce, add croutons, and drizzle dressing.', 'Use freshly grated Parmesan.', 1, FLOOR(RAND() * 1000)),
  (1, './assets/img/food4.jpg', 'Spaghetti Bolognese', 'Classic Italian pasta with rich meat sauce.', 15, 45, 'Simmer meat with tomatoes, serve with pasta.', 'Add a bay leaf for flavor.', 2, FLOOR(RAND() * 1000)),
  (2, './assets/img/food5.jpg', 'Chicken Tikka Masala', 'A popular Indian dish with spiced chicken in tomato sauce.', 20, 30, 'Cook marinated chicken, add to tomato-based sauce.', 'Serve with naan or rice.', 3, FLOOR(RAND() * 1000)),
  (3, './assets/img/food6.jpg', 'Apple Pie', 'Traditional dessert with apple filling.', 30, 60, 'Prepare dough, add apple filling, and bake.', 'Use Granny Smith apples for tartness.', 2, FLOOR(RAND() * 1000)),
  (1, './assets/img/food7.jpg', 'Guacamole', 'Classic Mexican avocado dip.', 10, 0, 'Mash avocados, add lime, salt, and veggies.', 'Add some diced tomatoes for texture.', 1, FLOOR(RAND() * 1000)),
  (2, './assets/img/food8.jpg', 'French Toast', 'Sweet breakfast with cinnamon-flavored bread.', 10, 10, 'Dip bread in egg mixture, cook until golden.', 'Top with powdered sugar and maple syrup.', 1, FLOOR(RAND() * 1000)),
  (3, './assets/img/food9.jpg', 'Vegetable Stir Fry', 'Quick and healthy veggie dish.', 15, 10, 'Stir fry vegetables with soy sauce and garlic.', 'Use sesame oil for extra flavor.', 1, FLOOR(RAND() * 1000)),
  (1, './assets/img/food10.jpg', 'Tom Yum Soup', 'Spicy Thai soup with shrimp.', 15, 20, 'Simmer broth with spices, add shrimp and mushrooms.', 'Adjust lime juice and chili to taste.', 2, FLOOR(RAND() * 1000));

INSERT INTO recipe_steps (recipe_id, step_name, step_desc, sorting) VALUES 
  (1, 'Prepare Beef', 'Slice beef into thin strips.', 1),
  (1, 'Cook Mushrooms', 'Saute mushrooms until tender.', 2),
  (1, 'Combine Ingredients', 'Add beef and cream to mushrooms, simmer.', 3),

  (2, 'Mix Dry Ingredients', 'Combine flour, sugar, cocoa powder.', 1),
  (2, 'Add Wet Ingredients', 'Mix in eggs, milk, and oil.', 2),
  (2, 'Bake', 'Pour batter into pan and bake at 350°F.', 3),

  (3, 'Prepare Lettuce', 'Chop lettuce and place in bowl.', 1),
  (3, 'Add Croutons', 'Sprinkle croutons over lettuce.', 2),
  (3, 'Drizzle Dressing', 'Top with Caesar dressing and Parmesan.', 3),

  (4, 'Cook Pasta', 'Boil pasta until al dente.', 1),
  (4, 'Prepare Sauce', 'Simmer meat with tomatoes and spices.', 2),
  (4, 'Combine and Serve', 'Serve sauce over pasta.', 3),

  (5, 'Marinate Chicken', 'Marinate chicken in spices and yogurt.', 1),
  (5, 'Cook Chicken', 'Grill or pan-fry the marinated chicken.', 2),
  (5, 'Make Sauce', 'Cook tomatoes and spices into a sauce.', 3),
  (5, 'Combine and Serve', 'Add chicken to sauce and simmer briefly.', 4),

  (6, 'Prepare Dough', 'Mix flour, salt, and butter for dough.', 1),
  (6, 'Make Filling', 'Slice apples and mix with sugar and cinnamon.', 2),
  (6, 'Bake', 'Pour filling into dough and bake.', 3),

  (7, 'Mash Avocados', 'Mash avocados until smooth.', 1),
  (7, 'Add Seasoning', 'Mix in lime, salt, and other ingredients.', 2),

  (8, 'Prepare Egg Mixture', 'Beat eggs, milk, and cinnamon together.', 1),
  (8, 'Dip Bread', 'Dip bread in the egg mixture.', 2),
  (8, 'Cook', 'Fry until golden brown on both sides.', 3),

  (9, 'Chop Vegetables', 'Slice all vegetables.', 1),
  (9, 'Stir Fry', 'Cook vegetables in a hot pan with soy sauce.', 2),

  (10, 'Prepare Broth', 'Boil broth with spices.', 1),
  (10, 'Add Shrimp', 'Add shrimp and mushrooms to the broth.', 2);

INSERT INTO category (name) VALUES 
  ('Main Course'),
  ('Dessert'),
  ('Salad'),
  ('Appetizer'),
  ('Breakfast'),
  ('Side Dish'),
  ('Soup'),
  ('Pizza'),
  ('Snack');

INSERT INTO recipes_category (recipe_id, category_id) VALUES 
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 1),
  (5, 1),
  (6, 2),
  (7, 4),
  (8, 5),
  (9, 6),
  (10, 7);

INSERT INTO ingredients (name, unit) VALUES 
    ('Beef', 1),
    ('Mushrooms', 1),
    ('Sour Cream', 1),
    ('Lettuce', 1),
    ('Parmesan Cheese', 1),
    ('Flour', 1),
    ('Sugar', 1),
    ('Cocoa Powder', 1),
    ('Eggs', 2),
    ('Milk', 3),
    ('Pasta', 1),
    ('Tomatoes', 1),
    ('Chicken', 1),
    ('Apples', 1),
    ('Avocados', 1),
    ('Cinnamon', 1),
    ('Soy Sauce', 3),
    ('Shrimp', 1);

INSERT INTO recipe_ingredients (recipe_id, ingredients_id) VALUES 
  (1, 1),
  (1, 2),
  (1, 3),
  (2, 6),
  (2, 7),
  (2, 8),
  (2, 9),
  (2, 10),
  (3, 4),
  (3, 5),
  (4, 11),
  (4, 12),
  (5, 13),
  (5, 12);

