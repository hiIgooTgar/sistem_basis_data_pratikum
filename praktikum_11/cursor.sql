DELIMITER// 
CREATE OR REPLACE PROCEDURE cur_alamatpel()
BEGIN
DECLARE nama_pel VARCHAR(64);
DECLARE exit_loop BOOLEAN;
DECLARE cursor1 CURSOR FOR
SELECT namapelanggan FROM tbpelanggan WHERE alamatpelanggan = 'Purwokerto';

DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;

OPEN cursor1;
ulang: LOOP
FETCH cursor1 INTO nama_pel;
SELECT namapelanggan AS 'Daftar Pelanggan yang berdomusili di Purwkokerto'
FROM tbpelanggan
WHERE alamatpelanggan = 'Purwokerto';
IF exit_loop THEN
CLOSE cursor1;
LEAVE ulang;
END IF;
END LOOP ulang;
END;//

CALL cur_alamatpel();


DELIMITER//
CREATE OR REPLACE PROCEDURE cur_caripelanggan(id VARCHAR(11))
BEGIN
DECLARE nama_pel VARCHAR(64);
DECLARE cursor1 CURSOR FOR
SELECT namapelanggan FROM tbpelanggan WHERE idpelanggan = id;

DECLARE EXIT HANDLER FOR 1329
	BEGIN 
	SELECT CONCAT('Data pelanggan ' , id, ' tidak ditemukan!') AS message;
	END;

OPEN cursor1;
FETCH cursor1 INTO nama_pel;
SELECT nama_pel;
CLOSE cursor1;
END; //

CALL cur_caripelanggan('1');
CALL cur_caripelanggan('2');
CALL cur_caripelanggan('22');



DELIMITER//

CREATE OR REPLACE PROCEDURE cur_pelanggan_count()
BEGIN
DECLARE p_alamat VARCHAR(64);
DECLARE p_count INT(11) UNSIGNED;
DECLARE jmlpelanggan CURSOR FOR
	SELECT alamatpelanggan, COUNT(*) FROM tbpelanggan GROUP BY alamatpelanggan;

OPEN jmlpelanggan;

FETCH jmlpelanggan INTO p_alamat, p_count;

SELECT alamatpelanggan, COUNT(*) AS 'Jumlah Pelanggan' FROM tbpelanggan
GROUP BY alamatpelanggan;
CLOSE jmlpelanggan;

END;//

CALL cur_pelanggan_count()



DELIMITER//

CREATE OR REPLACE PROCEDURE cur_hargaproduk()
BEGIN
DECLARE nama VARCHAR(64);
DECLARE exit_loop BOOLEAN;
DECLARE c1 CURSOR FOR
	SELECT namaproduk FROM tbproduk WHERE harga > 2500000;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;
DECLARE EXIT HANDLER FOR 1329
	BEGIN 
	SELECT CONCAT('Data produk tidak ditemukan!') AS pesan;
	END;
	
OPEN c1;
1b1: LOOP
FETCH c1 INTO nama;
SELECT namaproduk AS 'Daftar produk dengan harga > 2.5 Juta'
FROM tbproduk WHERE harga > 2500000;

IF exit_loop THEN
 CLOSE c1;
  LEAVE 1b1;
 END IF;
 END LOOP 1b1;
END;//

CALL cur_hargaproduk();
SELECT * FROM tbproduk ORDER BY harga DESC






DELIMITER //

CREATE OR REPLACE PROCEDURE cur_stokbarang()
BEGIN 
DECLARE nama VARCHAR(64);
DECLARE stokproduk TINYINT;
DECLARE exit_loop BOOLEAN;
DECLARE c1 CURSOR FOR
	SELECT namaproduk, stok FROM tbproduk ORDER BY stok;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;
OPEN c1;
1b1: LOOP
FETCH c1 INTO nama, stokproduk;
 SELECT namaproduk, stok AS 'Daftar 5 produk dengan stok terendah' FROM tbproduk
 ORDER BY stok LIMIT 5;
 IF exit_loop THEN
  CLOSE c1;
  LEAVE 1b1;
 END IF;
END LOOP 1b1;
END; //

CALL cur_stokbarang();
