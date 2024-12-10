DELIMITER $$
CREATE OR REPLACE TRIGGER tr_pembelian
AFTER INSERT ON tbdetailbeli 
FOR EACH ROW BEGIN
	UPDATE tbproduk SET stok=stok+NEW.jumlah
	WHERE idproduk = NEW.idproduk;
END $$

SELECT * FROM tbproduk
SELECT * FROM tbpembelian
SELECT * FROM tbdetailbeli


INSERT INTO tbpembelian VALUES (6,'pb-1','2024-11-11', 2, 5, 11200000), 
(7,'pb-2','2024-11-12', 3, 1, 10000000); 

INSERT INTO tbdetailbeli VALUES (4, 'pb-1', 4, 2 , 1700000, jumlah*harga), 
(5, 'pb-1', 3, 3,2600000, jumlah*harga), 
(6, 'pb-2', 2, 2,509000, jumlah*harga);

DELIMITER $$
CREATE OR REPLACE TRIGGER tr_cekharga
BEFORE INSERT ON tbproduk
FOR EACH ROW BEGIN
	IF NEW.harga <= 1000 THEN 
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cek kembalian harga produk!';
	END IF;
END$$

INSERT INTO tbproduk VALUES (8, 'Head Phone', 3, 10, 500)
SELECT * FROM tbproduk




DELIMITER $$
CREATE OR REPLACE TRIGGER tr_updateharga
BEFORE UPDATE ON tbproduk
FOR EACH ROW BEGIN
	IF NEW.harga <= 1000 THEN 
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cek kembalian harga produk!';
	END IF;
END$$

UPDATE tbproduk SET harga = 100 WHERE idproduk = 2;
SELECT * FROM tbproduk




CREATE TABLE tblog_produk (
idblog INT(10) PRIMARY KEY AUTO_INCREMENT,
idproduk INT(11),
harga_lama INT,
harga_baru INT,
waktu DATETIME,

FOREIGN KEY (idproduk) REFERENCES tbproduk(idproduk)
)

DELIMITER $$
CREATE OR REPLACE TRIGGER tb_update_harga_produk
AFTER UPDATE ON tbproduk
FOR EACH ROW BEGIN
	INSERT INTO tblog_produk SET idproduk = OLD.idproduk,
	harga_lama = OLD.harga,
	harga_baru = NEW.harga,
	waktu = NOW();
END $$

UPDATE tbproduk SET harga = 300000000 WHERE idproduk = 1;
SELECT * FROM tbproduk





DELIMITER $$ 
CREATE OR REPLACE TRIGGER tr_hapuspemasok 
BEFORE DELETE ON tbpemasok 
FOR EACH ROW BEGIN 
	IF OLD.idpemasok = OLD.idpemasok THEN 
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Data pemasok tdk dapat dihapus';
	END IF;
 END $$
 
 DELETE FROM tbpemasok WHERE idpemasok = 6;

 SELECT * FROM tbpemasok
 
 
 
DELIMITER $$ 
CREATE OR REPLACE TRIGGER tr_hapusjual
AFTER DELETE ON tbpenjualan 
FOR EACH ROW BEGIN 
	 DELETE FROM tbdetailjual WHERE notajual = OLD.notajual;
 END $$
 
 DELETE FROM tbpenjualan WHERE notajual = 'PJN-1';
 