-- 
--  `blog` schema creation script
-- 

CREATE DATABASE IF NOT EXISTS `blog`;

CREATE TABLE `post` (
    `id` int(10) UNSIGNED NOT NULL,
    `title` varchar(255) NOT NULL,
    `body` varchar(255) NOT NULL,
    `user_id` int(10) UNSIGNED NOT NULL,
    `created_at` varchar(255) NOT NULL,
    `updated_at` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `post` ADD PRIMARY KEY(`id`);

ALTER TABLE `post` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

-- 
-- Example values
-- 

INSERT INTO
    `post`
    (
        `title`, `body`, `user_id`, `created_at`
    )
    VALUES(
        "Here's our first post",
        "This is the body of the first post.
It is split into paragraphs.",
        1, (NOW() - INTERVAL 2 MONTH)
    );

INSERT INTO
    `post`
    (
        `title`, `body`, `user_id`, `created_at`
    )
    VALUES(
        "Now for a second article",
        "This is the body of the second post.
This is another paragraph.",
        1,
        (NOW() - INTERVAL 40 DAY)
    )
;
INSERT INTO
    `post`
    (
        `title`, `body`, `user_id`, `created_at`
    )
    VALUES(
        "Here's a third post",
        "This is the body of the third post.
This is split into paragraphs.",
        1,
          (NOW() - INTERVAL 13 DAY)
    );
    