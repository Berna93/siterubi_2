CREATE TABLE tbl_cash_flow (
  id int UNSIGNED NOT NULL,
  month_int INT NULL,
  year_int INT NULL,
  costs_int INT NULL,
  income_int INT NULL,
  balance_int INT NULL
  
);

ALTER TABLE tbl_cash_flow
  ADD PRIMARY KEY (id);

ALTER TABLE tbl_cash_flow
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;