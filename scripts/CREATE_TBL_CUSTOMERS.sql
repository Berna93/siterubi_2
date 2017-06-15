CREATE TABLE tbl_customers (
  id int UNSIGNED NOT NULL,
  name_var varchar(255) NOT NULL,
  cpf_var varchar(14) NOT NULL,
  rg_var varchar(14) NOT NULL,
  birthday_dt date NULL,
  address_var varchar(255) NOT NULL,
  email_var varchar(100) NOT NULL,
  phone_var varchar(100) NOT NULL,
  astrologia_tni tinyint(1) NOT NULL,
  tarot_tni tinyint(1) NOT NULL,
  cabala_tni tinyint(1) NOT NULL,
  umbanda_tni tinyint(1) NOT NULL,
  hermetismo_tni tinyint(1) NOT NULL,
  reiki_tni tinyint(1) NOT NULL,
  creation_date_dt date NOT NULL,
  modification_date_dt date NOT NULL
);

ALTER TABLE tbl_customers
  ADD PRIMARY KEY (id);
  
ALTER TABLE tbl_customers
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;