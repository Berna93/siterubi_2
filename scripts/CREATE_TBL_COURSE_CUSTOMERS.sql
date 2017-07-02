CREATE TABLE tbl_course_customers (
  id int UNSIGNED NOT NULL,
  tbl_courses_id int UNSIGNED NOT NULL,
  tbl_courses_name_var varchar(255) NOT NULL,
  tbl_customers_id int UNSIGNED NOT NULL,
  tbl_customers_name_var varchar(255) NOT NULL,
  payment_tni tinyint(1) NOT NULL,
  creation_date_dt date NOT NULL,
  modification_date_dt date NOT NULL,
  FOREIGN KEY (tbl_courses_id) REFERENCES tbl_courses(id),
  FOREIGN KEY (tbl_customers_id) REFERENCES tbl_customers(id)
  
);

ALTER TABLE tbl_course_customers
  ADD PRIMARY KEY (id);

ALTER TABLE tbl_course_customers
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;