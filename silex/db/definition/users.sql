CREATE TABLE `users` (
	`id`	INTEGER NOT NULL UNIQUE,
	`name`	TEXT NOT NULL UNIQUE,
	`mail`	TEXT NOT NULL UNIQUE,
	PRIMARY KEY(`name`,`mail`)
);

INSERT INTO `users` VALUES (1, 'admin', 'admin@example.com');
INSERT INTO `users` VALUES (2, 'test', 'tester@example.com');
