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
