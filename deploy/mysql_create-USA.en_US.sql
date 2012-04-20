-- -----------------------------------------------------
-- Data for table `location_division_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
INSERT INTO location_division_type (`id`, `handle`, `name`) VALUES ('2', 'state', 'State');

COMMIT;

-- -----------------------------------------------------
-- Data for table `location_division`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
INSERT INTO location_division (`id`, `typeId`, `parentId`, `code`, `name`) VALUES
('200', '2', '2', 'AL', 'Alabama'),
('201', '2', '2', 'AK', 'Alaska');
-- TODO

COMMIT;
