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
	if NEW.harga <= 1000 then 
	Signal sqlstate '45000' SET message_text = 'Cek kembalian harga produk!';
	end if;
END$$

insert into tbproduk values (8, 'Head Phone', 3, 10, 500)
select * from tbproduk




DELIMITER $$
CREATE OR REPLACE TRIGGER tr_updateharga
BEFORE UPDATE ON tbproduk
FOR EACH ROW BEGIN
	IF NEW.harga <= 1000 THEN 
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cek kembalian harga produk!';
	END IF;
END$$

update tbproduk set harga = 100 where idproduk = 2;
SELECT * FROM tbproduk




create table tblog_produk (
idblog int(10) primary key auto_increment,
idproduk int(11),
harga_lama int,
harga_baru int,
waktu datetime,

foreign key (idproduk) references tbproduk(idproduk)
)

delimiter $$
create or replace trigger tb_update_harga_produk
after UPDATE on tbproduk
for each row begin
	insert into tblog_produk set idproduk = OLD.idproduk,
	harga_lama = OLD.harga,
	harga_baru = NEW.harga,
	waktu = now();
end $$

UPDATE tbproduk set harga = 300000000 where idproduk = 1;
select * from tbproduk





DELIMITER $$ 
CREATE OR REPLACE TRIGGER tr_hapuspemasok 
BEFORE DELETE ON tbpemasok 
FOR EACH ROW BEGIN 
	IF OLD.idpemasok = OLD.idpemasok THEN 
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Data pemasok tdk dapat dihapus';
	END IF;
 END $$
 
 DELETE FROM tbpemasok WHERE idpemasok = 6;
 select * from tbpemasok
 
 
 
DELIMITER $$ 
CREATE OR REPLACE TRIGGER tr_hapusjual
AFTER DELETE ON tbpenjualan 
FOR EACH ROW BEGIN 
	 DELETE FROM tbdetailjual WHERE notajual = OLD.notajual;
 END $$
 
DELETE FROM tbpenjualan WHERE notajual = 'PJN-2';
SELECT * FROM tbpenjualan

INSERT INTO tbpenjualan VALUES
(1, 'PJN-1', '2024-11-26', 2, 3, 40000),
(2, 'PJN-2', '2024-11-25', 3, 5, 30000),
(3, 'PJN-3', '2024-11-26', 3, 2, 600000),
(4, 'PJN-2', '2024-11-26', 2, 10, 30000),
(5, 'PJN-3', '2024-11-24', 1, 9, 600000);

 