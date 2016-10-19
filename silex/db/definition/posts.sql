CREATE TABLE `posts` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`created`	INTEGER NOT NULL,
	`author`	INTEGER NOT NULL,
	`title`	TEXT NOT NULL,
	`body`	TEXT
);

INSERT INTO `posts` VALUES (1, 1476364162, 1, 'Using Silex', 'Lorem Ipsum');
INSERT INTO `posts` VALUES (2, 1476104961, 2, 'Learning Silex', 'Dolor sit amet');
INSERT INTO `posts` VALUES (3, 1476364162, 1, 'Silex is cool', 'Adesciping est');

