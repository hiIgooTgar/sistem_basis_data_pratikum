SELECT idproduk, stok,
    IF(stok <= 5, 'stok terbatas',
    IF(stok <= 30, 'stok cukup', 'stok berlebih')) 
    AS 'Keterangan'
FROM  tbproduk ORDER BY stok


SELECT idpelanggan, alamatpelanggan,
    IF(alamatpelanggan = 'Purwokerto', 'Dalam Purwokerto' , 'Luar Purwokerto')
    AS 'Keterangan'
FROM tbpelanggan



SELECT idproduk, harga,
CASE 
    WHEN harga > 5000000 THEN 'Mahal'
    WHEN harga > 0 AND harga < 200000 THEN 'Murah'
    ELSE 'Tidak diketahui'
END AS 'Keterangan Harga'
FROM tbproduk



DELIMITER $$
CREATE OR REPLACE FUNCTION cektransaksi(pelanggan VARCHAR(16))
    RETURNS VARCHAR(64)

    BEGIN 
        DECLARE jumlah TINYINT;
        SELECT COUNT(notajual) INTO jumlah FROM tbpenjualan
        WHERE idpelanggan = pelanggan;
        
        IF(jumlah > 0) THEN 
            RETURN CONCAT("Anda sudah bertransaksi sebanyak ", jumlah, ' kali');
        ELSE 
            RETURN "Anda belum pernah melakukan transaksi";
        END IF;
END $$

SELECT * FROm tbpenjualan

SELECT cektransaksi(3);
SELECT cektransaksi(2);
SELECT cektransaksi(1);




DELIMITER //
CREATE OR REPLACE PROCEDURE ganjil(IN batas INT)
BEGIN
    DECLARE i INT; 
    DECLARE hasil VARCHAR(32) DEFAULT '';
    SET i  = 1;
    WHILE i < batas DO
        IF MOD(i, 2) != 0 THEN
        SET hasil = CONCAT(hasil, i, ' - ');
        END IF;
        SET i = i + 1;
    END WHILE;
    SELECT hasil;
END //

CALL ganjil(25);
