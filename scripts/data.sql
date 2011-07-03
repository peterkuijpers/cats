
INSERT INTO category (category_id, name) values( 1, 'Major');
INSERT INTO category (category_id, name) values( 2, 'Minor');
INSERT INTO category (category_id, name) values( 3, 'Observation');
INSERT INTO category (category_id, name) values( 4, 'CIP');

INSERT INTO nc_type (nc_type_id, name) values( 1, 'Customer audit');
INSERT INTO nc_type (nc_type_id, name) values( 2, 'Internal audit');
INSERT INTO nc_type (nc_type_id, name) values( 3, 'Safety');

INSERT INTO status (status_id, name) values( 1, 'Draft');
INSERT INTO status (status_id, name) values( 2, 'NC_Submitted');
INSERT INTO status (status_id, name) values( 3, 'NC_Approved');
INSERT INTO status (status_id, name) values( 4, 'CC_Submitted');
INSERT INTO status (status_id, name) values( 5, 'CC_Approved');
INSERT INTO status (status_id, name) values( 6, 'CC_Rejected');

INSERT INTO status (status_id, name) values( 7, 'Closed');

INSERT INTO department (dept_id, name) values( 1, 'Production');
INSERT INTO department (dept_id, name) values( 2, 'Sales');

INSERT INTO  `user` (
`user_id` ,`user_name` ,`password` ,`first_name` ,`last_name` ,`email` ,`init_level` ,`focal_level` ,`qa_level` ,`post_id` ,`department_id` ,`access_level` ,`internal` ,`phone_nbr` ,`Supplier_id`
)
VALUES (
'100',  'peter123',  'e3e7f312a36e128c29a42352bb4ff8d7',  'Peter',  'Kuijpers',  'peter123@home.com' ,1, 0, 0, NULL , 1 , NULL , 1 , NULL , NULL
);
INSERT INTO  `user` (
`user_id` ,`user_name` ,`password` ,`first_name` ,`last_name` ,`email` ,`init_level` ,`focal_level` ,`qa_level` ,`post_id` ,`department_id` ,`access_level` ,`internal` ,`phone_nbr` ,`Supplier_id`
)
VALUES (
'101',  'boss123',  'e3e7f312a36e128c29a42352bb4ff8d7',  'Joe',  'Boss',  'jboss@home.com', 1, 1, 0, NULL , 1 , NULL , 1 , NULL , NULL
);

INSERT INTO  `nc` (
`nc_id` ,`initiator_id` ,`init_date` ,`category_id` ,`focal_id` ,`dept_id` ,`nc_type_id` ,`qty` ,`status_id` ,`summary`, `details`, `iso_l1` ,`iso_l2` ,`iso_l3` )
VALUES (
'1000',  '100',  '2011-06-28',  '1',  '101', NULL ,  '1',  '5',  '1','First report','Details for the first report', NULL , NULL , NULL );

INSERT INTO  `nc` (
`nc_id` ,`initiator_id` ,`init_date` ,`category_id` ,`focal_id` ,`dept_id` ,`nc_type_id` ,`qty` ,`status_id` ,`summary`, `details`,`iso_l1` ,`iso_l2` ,`iso_l3` )
VALUES (
'1001',  '100',  '2011-06-28',  '1',  '101', NULL ,  '2',  '5',  '1', 'Second report','Details for the second report', NULL , NULL , NULL );

