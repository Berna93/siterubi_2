CREATE TABLE tbl_course (
  id int UNSIGNED NOT NULL,
  name_var varchar(255) NOT NULL,
  professor_var varchar(14) NOT NULL,
  numSlots_int int NOT NULL,
  numSlotsTaken_int int NOT NULL,
  price_var varchar(15) NULL,
  event_date_dt date NOT NULL,
  event_hour_var varchar(10) NOT NULL,
  contract_var varchar(5000) NOT NULL,
  status_var varchar(10) NOT NULL DEFAULT 'Aberto',
  creation_date_dt date NOT NULL,
  modification_date_dt date NOT NULL
);

ALTER TABLE tbl_course
  ADD PRIMARY KEY (id);
  
ALTER TABLE tbl_course
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;