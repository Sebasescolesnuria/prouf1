CREATE TABLE IF NOT EXISTS `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(100) NOT NULL UNIQUE,
	`uname` varchar(100) NOT NULL,
	`passw` varchar(120) NOT NULL,
	`role` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `roles` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`role` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `task_item` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`item` VARCHAR(255) NOT NULL,
	`completed` BOOLEAN NOT NULL,
	`task` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `tasks` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255) NOT NULL,
	`user` INT NOT NULL,
	`due_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role`) REFERENCES `roles`(`id`);

ALTER TABLE `task_item` ADD CONSTRAINT `task_item_fk0` FOREIGN KEY (`task`) REFERENCES `tasks`(`id`);

ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk0` FOREIGN KEY (`user`) REFERENCES `users`(`id`);

