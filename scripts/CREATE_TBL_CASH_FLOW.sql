CREATE TABLE tbl_cash_flow (
  id int UNSIGNED NOT NULL,
  month_int INT NOT NULL,
  year_int INT NOT NULL,
  costs_int INT NOT NULL,
  income_int INT NOT NULL,
  balance_int INT NOT NULL
  
);

ALTER TABLE tbl_cash_flow
  ADD PRIMARY KEY (id);

ALTER TABLE tbl_cash_flow
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;