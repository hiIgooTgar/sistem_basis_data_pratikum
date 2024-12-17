/* Algoritma membuat Function in mysql */

/* function 1 */
/* query implementasi fungsi string */
SELECT namapelanggan, LEFT(namapelanggan, 5), RIGHT(namapelanggan, 5) FROM tbpelanggan

/* query implementasi fungsi date and time */
SELECT tgljual, DATEDIFF(NOW(), tgljual) AS 'Tanggal sekarang' FROM tbpenjualan
SELECT tgljual, DATEDIFF(NOW(), tgljual) AS 'Tanggal sekarang' FROM tbpenjualan WHERE notajual = 'PJN-3'
SELECT tgljual, MONTHNAME(tgljual) FROM tbpenjualan

SELECT * FROM tbpenjualan



/* function 2 */
DELIMITER $$
CREATE OR REPLACE FUNCTION jumlahStokFunction(id INT(11))
RETURNS INT

BEGIN
	DECLARE jumlah INT;
	SELECT stok INTO jumlah FROM tbproduk
	WHERE idproduk = id;
	RETURN jumlah;
END $$

SELECT jumlahStokFunction('3') AS 'Jumlah Stok Tabel Produk | Function'
SELECT * FROM tbproduk



/* function 3 */
DELIMITER $$
CREATE OR REPLACE FUNCTION jumlahStokFunctionSecond(id INT(11))
RETURNS INT

BEGIN
	DECLARE jumlah INT;
	SELECT SUM(stok) INTO jumlah FROM tbproduk
	WHERE idkategori = id;
	RETURN jumlah;
END$$

SELECT jumlahStokFunctionSecond('4')
SELECT * FROM tbproduk



/* function 4 */
DELIMITER $$
CREATE OR REPLACE FUNCTION jumlahStokFunctionThird(p_harga INT(11))
RETURNS INT

BEGIN
	DECLARE jumlah INT;
	SELECT COUNT(harga) INTO jumlah FROM tbproduk
	WHERE harga < p_harga;
	RETURN jumlah;
END $$ 

SELECT jumlahStokFunctionThird(500000) AS 'Jumlah data barang yang harganya dibawah Rp. 500.000'
SELECT * FROM tbproduk