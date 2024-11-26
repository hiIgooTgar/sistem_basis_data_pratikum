/* Algoritma membuat Procedure in mysql */

/* procedure 1 */
DELIMITER $$
CREATE OR REPLACE PROCEDURE tambahPelanggan(IN idpelanggan VARCHAR(16), IN namapelanggan VARCHAR(64), 
IN alamatpelanggan VARCHAR(64), IN teleponpelanggan VARCHAR(16))

BEGIN 
	INSERT INTO tbpelanggan(idpelanggan, namapelanggan, alamatpelanggan, teleponpelanggan)
	VALUES(idpelanggan, namapelanggan, alamatpelanggan, teleponpelanggan);
END $$

CALL tambahPelanggan('5', 'Anindya Saputri', 'Bogor', '081323762476');
CALL tambahPelanggan('6', 'Rehan Saputra', 'Bandung', '081673317364');
CALL tambahPelanggan('7', 'Farel Jamaludin', 'Sukabumi', '085923746772');
CALL tambahPelanggan('8', 'Pratama Wisnu', 'Kuningan', '081332117472');
CALL tambahPelanggan('9', 'Windi Wulan Purnomo', 'Bandung Raya', '08112166325');
CALL tambahPelanggan('10', 'Arief Pamungkas', 'Ciamis', '085121425144');

SELECT * FROM tbpelanggan



/* procedure 2 */
DELIMITER $$
CREATE OR REPLACE PROCEDURE ubahPelanggan(IN id VARCHAR(16), IN nama VARCHAR(64),
IN alamat VARCHAR(64), IN telepon VARCHAR(16))

BEGIN 
	UPDATE tbpelanggan SET 
	namapelanggan = nama,
	alamatpelanggan = alamat,
	teleponpelanggan = telepon
	WHERE idpelanggan = id;
END $$

CALL ubahPelanggan('6', 'Lutfi Prasetyo', 'Bandung Raya', '08912545273');
CALL ubahPelanggan('7', 'Abdul Gunawan', 'Serang', '08937267246');

SELECT * FROM tbpelanggan



/* procedure 3 */
DELIMITER $$
CREATE OR REPLACE PROCEDURE hapusPelanggan(IN id VARCHAR(16))

BEGIN
	DELETE FROM tbpelanggan WHERE idpelanggan = id;
END $$

CALL hapusPelanggan('10')

SELECT * FROM tbpelanggan



/* procedure 4 */
DELIMITER $$
CREATE OR REPLACE PROCEDURE jumlahPelanggan(OUT hasil INT)

BEGIN 
	SELECT COUNT(*) INTO hasil FROM tbpelanggan;
END $$

CALL jumlahPelanggan(@jumlah)
SELECT @jumlah AS 'Jumlah Pelanggan | Procedure'
SELECT * FROM tbpelanggan



/* procedure 5 */
DELIMITER $$
CREATE OR REPLACE PROCEDURE jumlahPelangganSecond(IN alamat VARCHAR(64),
OUT hasil INT)

BEGIN
	SELECT COUNT(*) INTO hasil FROM tbpelanggan
	WHERE alamatpelanggan = alamat;
END $$

CALL jumlahPelangganSecond('Bekasi', @jumlah)
SELECT @jumlah AS 'Jumlah Pelanggan Second From Bekasi City | Procedure'

SELECT * FROM tbpelanggan
