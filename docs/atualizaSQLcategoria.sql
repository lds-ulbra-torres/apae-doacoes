ALTER TABLE partners ADD category_id_category int(11);
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` INT(11) NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(45) NOT NULL,
  `description_category` VARCHAR(100) NULL DEFAULT NULL,
  `photo_category` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_category`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE partners ADD CONSTRAINT category_id_category 
FOREIGN KEY(category_id_category) REFERENCES category(id_category)