-- -----------------------------------------------------
-- Data for table `location_division_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
INSERT INTO location_division_type (`id`, `handle`, `name`) VALUES ('1', 'country', 'Country');

COMMIT;

-- -----------------------------------------------------
-- Data for table `location_division`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;

INSERT INTO location_division (`id`, `typeId`, `parentId`, `code`, `name`) VALUES 
('1', '1', NULL, 'USA', 'United States')

-- TODO

COMMIT;