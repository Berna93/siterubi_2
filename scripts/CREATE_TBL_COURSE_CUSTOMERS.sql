CREATE TABLE tbl_course_customers (
  id int UNSIGNED NOT NULL,
  course_id int UNSIGNED NOT NULL,
  customer_id int UNSIGNED NOT NULL,
  customer_nome_var varchar(255) NOT NULL,
  payment_tni tinyint(1) NOT NULL,
  creation_date_dt date NOT NULL,
  modification_date_dt date NOT NULL,
  FOREIGN KEY (course_id) REFERENCES tbl_course(id),
  FOREIGN KEY (customer_id) REFERENCES tbl_customers(id)
  
);

ALTER TABLE tbl_course_customers
  ADD PRIMARY KEY (id);

ALTER TABLE tbl_course_customers
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;