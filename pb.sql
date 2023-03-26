CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE topics (
    topic_id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_by INTEGER NOT NULL REFERENCES users(user_id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE posts (
    post_id SERIAL PRIMARY KEY,
    topic_id INTEGER NOT NULL REFERENCES topics(topic_id),
    user_id INTEGER NOT NULL REFERENCES users(user_id),
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE upvotes (
    upvote_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id INTEGER NOT NULL REFERENCES users(user_id),
    created_at TIMESTAMP DEFAULT NOW(),
    UNIQUE (post_id, user_id)
);

CREATE TABLE downvotes (
    downvote_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id INTEGER NOT NULL REFERENCES users(user_id),
    created_at TIMESTAMP DEFAULT NOW(),
    UNIQUE (post_id, user_id)
);

CREATE TABLE categories (
    category_id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE topic_categories (
    topic_id INTEGER NOT NULL REFERENCES topics(topic_id),
    category_id INTEGER NOT NULL REFERENCES categories(category_id),
    PRIMARY KEY (topic_id, category_id)
);

CREATE TABLE comments (
    comment_id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES posts(post_id),
    user_id INTEGER NOT NULL REFERENCES users(user_id),
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);


INSERT INTO users (username, email, password, is_admin) VALUES
('sam_jackson', 'sam_jackson@example.com', 'password123', false),
('lisa_smith', 'lisa_smith@example.com', 'pass456', false),
('mike_robinson', 'mike_robinson@example.com', 'pass789', false);

INSERT INTO topics (title, description, created_by) VALUES
('The NBA Finals', 'Discussing the NBA finals and predictions for the winner.', 2),
('Soccer Tactics', 'Analyzing different soccer tactics and formations.', 4),
('Olympic Records', 'Sharing and discussing the most impressive Olympic records in history.', 3);

INSERT INTO posts (topic_id, user_id, body) VALUES
(1, 3, 'I think the Lakers will win the NBA finals this year.'),
(1, 4, 'I disagree, I think the Nets will come out on top.'),
(2, 1, 'I prefer the 4-3-3 formation in soccer.'),
(2, 2, 'I find the 3-5-2 to be more effective.'),
(3, 4, 'Did you know that Usain Bolt holds the record for the fastest 100m sprint ever?'),
(3, 1, 'Yes, and Michael Phelps has the most Olympic gold medals of all time.');

INSERT INTO upvotes (post_id, user_id) VALUES
(1, 4),
(4, 3),
(5, 2),
(6, 2);

INSERT INTO downvotes (post_id, user_id) VALUES
(2, 3),
(3, 4),
(4, 1),
(5, 4),
(6, 3);

INSERT INTO categories (name, description) VALUES
('NBA', 'All about the National Basketball Association.'),
('Soccer', 'Everything related to soccer.'),
('Olympics', 'Discussions and records about the Olympic Games.');

INSERT INTO topic_categories (topic_id, category_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 3),
(2, 1),
(3, 2);

INSERT INTO users (username, email, password, is_admin) VALUES
('sam_jackson', 'sam_jackson@example.com', 'password123', false),
('lisa_smith', 'lisa_smith@example.com', 'pass456', false),
('mike_robinson', 'mike_robinson@example.com', 'pass789', false);

INSERT INTO topics (title, description, created_by) VALUES
('The NBA Finals', 'Discussing the NBA finals and predictions for the winner.', 2),
('Soccer Tactics', 'Analyzing different soccer tactics and formations.', 4),
('Olympic Records', 'Sharing and discussing the most impressive Olympic records in history.', 3);

INSERT INTO posts (topic_id, user_id, body) VALUES
(1, 3, 'I think the Lakers will win the NBA finals this year.'),
(1, 4, 'I disagree, I think the Nets will come out on top.'),
(2, 1, 'I prefer the 4-3-3 formation in soccer.'),
(2, 2, 'I find the 3-5-2 to be more effective.'),
(3, 4, 'Did you know that Usain Bolt holds the record for the fastest 100m sprint ever?'),
(3, 1, 'Yes, and Michael Phelps has the most Olympic gold medals of all time.');

INSERT INTO upvotes (post_id, user_id) VALUES
(1, 4),
(4, 3),
(5, 2),
(6, 2);

INSERT INTO downvotes (post_id, user_id) VALUES
(2, 3),
(3, 4),
(4, 1),
(5, 4),
(6, 3);

INSERT INTO categories (name, description) VALUES
('NBA', 'All about the National Basketball Association.'),
('Soccer', 'Everything related to soccer.'),
('Olympics', 'Discussions and records about the Olympic Games.');

INSERT INTO topic_categories (topic_id, category_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 3),
(2, 1),
(3, 2);






INSERT INTO users (username, email, password, is_admin) VALUES
('jane_doe', 'jane_doe@example.com', 'password123', false),
('john_smith', 'john_smith@example.com', 'pass456', false),
('sara_wilson', 'sara_wilson@example.com', 'pass789', false);

INSERT INTO topics (title, description, created_by) VALUES
('Football: Overrated or Underrated?', 'Debating whether or not football is really the greatest sport.', 1),
('Hockey vs. Soccer', 'Comparing the excitement levels of hockey and soccer.', 2),
('The Greatest Athlete of All Time', 'Trying to determine who is truly the greatest athlete in history.', 4);

INSERT INTO posts (topic_id, user_id, body) VALUES
(4, 2, 'Tom Brady is the greatest athlete of all time.'),
(4, 3, 'No way, that title belongs to Michael Jordan.'),
(5, 1, 'Football is overrated, it is just a bunch of overpaid athletes running around a field.'),
(5, 4, 'I disagree, football is the greatest sport ever invented.'),
(6, 2, 'Hockey is way more exciting than soccer.'),
(6, 1, 'I couldnt disagree more, soccer is the most exciting sport in the world.');

INSERT INTO upvotes (post_id, user_id) VALUES
(7, 3),
(8, 1),
(9, 2),
(10, 4);

INSERT INTO downvotes (post_id, user_id) VALUES
(11, 4),
(12, 1),
(13, 3),
(14, 2),
(15, 4);

INSERT INTO categories (name, description) VALUES
('Football', 'All about American football.'),
('Hockey', 'Discussions about ice hockey.'),
('Athletes', 'Debating the greatest athletes of all time.');

INSERT INTO topic_categories (topic_id, category_id) VALUES
(4, 1),
(5, 1),
(6, 2),
(4, 3),
(5, 3),
(6, 3);

INSERT INTO comments (post_id, user_id, body) 
VALUES 
  (1, 2, 'Great post! I really enjoyed reading this.'), 
  (1, 3, 'Thanks for sharing this. I learned a lot.'),
  (2, 1, 'I disagree with your point of view.'),
  (2, 4, 'I think you make a valid argument.'),
  (3, 5, 'This is a well-researched article.'),
  (4, 2, 'I had a similar experience.'),
  (4, 3, 'This is a really important topic.'),
  (5, 4, 'I have some additional insights to add.'),
  (5, 1, 'I found this very helpful. Thank you!'),
  (5, 3, 'I think you missed an important point.');


  -- Users
INSERT INTO users (username, email, password, is_admin) VALUES
    ('jane123', 'jane@example.com', 'password', FALSE),
    ('jessica_l', 'jessica@example.com', 'password', FALSE),
    ('jacobt', 'jacob@example.com', 'password', FALSE),
    ('kyle_m', 'kyle@example.com', 'password', FALSE),
    ('linda_34', 'linda@example.com', 'password', FALSE),
    ('maria88', 'maria@example.com', 'password', FALSE),
    ('matt23', 'matt@example.com', 'password', FALSE),
    ('nickm', 'nick@example.com', 'password', TRUE),
    ('olivia_w', 'olivia@example.com', 'password', FALSE);

-- Categories
INSERT INTO categories (name, description) VALUES
    ('Football', 'All things football'),
    ('Basketball', 'All things basketball'),
    ('Baseball', 'All things baseball');

-- Topics
INSERT INTO topics (title, description, created_by) VALUES
    ('Favorite Football Team', 'Who is your favorite football team?', 2),
    ('Basketball Season Predictions', 'Who will win the NBA championship this year?', 5),
    ('Baseball Stats Discussion', 'What are some interesting baseball stats?', 8);

-- Topic Categories
INSERT INTO topic_categories (topic_id, category_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3);

-- Posts
INSERT INTO posts (topic_id, user_id, body) VALUES
    (1, 3, 'My favorite football team is the Pittsburgh Steelers.'),
    (1, 5, 'I prefer college football over the NFL.'),
    (2, 2, 'I think the Los Angeles Lakers will win the NBA championship.'),
    (2, 7, 'I have a feeling the Brooklyn Nets will take it all.'),
    (3, 4, 'Did you know that Babe Ruth had a career batting average of .342?'),
    (3, 6, 'One interesting stat is that Nolan Ryan struck out over 5,000 batters in his career.');

-- Upvotes
INSERT INTO upvotes (post_id, user_id) VALUES
    (1, 2),
    (2, 4),
    (3, 1),
    (4, 3),
    (5, 5),
    (6, 7),
    (6, 10);

-- Downvotes
INSERT INTO downvotes (post_id, user_id) VALUES
    (1, 6),
    (1, 8),
    (2, 9),
    (2, 10),
    (3, 2),
    (4, 7),
    (5, 8),
    (6, 1);

-- Comments
INSERT INTO comments (post_id, user_id, body) VALUES
    (1, 4, 'I\'m a fan of the Dallas Cowboys.'),
    (1, 8, 'I don\'t really follow football.'),
    (2, 1, 'I think the Milwaukee Bucks have a good shot at the championship.'),
    (2, 10, 'I\'m rooting for the Utah Jazz.'),
    (3, 3, 'That\'s a great stat about Babe Ruth.');
    

