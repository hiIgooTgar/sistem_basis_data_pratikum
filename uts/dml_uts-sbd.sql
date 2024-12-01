INSERT INTO anggota(no_ktp, nama, alamat) VALUES(3301292210221022, 'Ahmad Sayuri', 'Banyumas'),
(3301252213324001, 'Chelsea Saputri', 'Kebumen'),
(3301232918221002, 'Fifi Elsa Handanyani', 'Purwokerto'),
(3301212186121123, 'Lutfi Andi Prasetyo', 'Purbalingga'),
(3301203231225001, 'Bagasa Adi Saputra', 'Pemalang');

SELECT * FROM anggota;


INSERT INTO fasilitas(id_fasilitas, nama_fasilitas) VALUES('FA001', 'Basement'),
('FA002', 'Penjaga Kebersihan'), ('FA003', 'Security'), ('FA004', 'Kolam Renang');

SELECT * FROM fasilitas;


INSERT INTO gedung(no_gedung, nama_gedung, kapasitas, harga_sewa, id_fasilitas) 
VALUES('GE001', 'Gedung Pamungkas Putih', 10000, 50000000, 'FA001'),
('GE002', 'Gedung Sentosa Lions', 15000, 70000000, 'FA004'),
('GE003', 'Gedung Trependent', 20000, 100000000, 'FA001'),
('GE004', 'Gedung Wangkara Jaya', 5000, 35000000, 'FA002'),
('GE005', 'Gedung Lestari Darasati', 15000, 64000000, 'FA003');

SELECT * FROM gedung;


INSERT INTO penyewaan(id_penyewaan, no_ktp, no_gedung, tanggal_penyewaan) 
VALUES('PYN001', 3301292210221022, 'GE005', '2024-11-5'),
('PYN002', 3301203231225001, 'GE001', '2024-11-7'),
('PYN003', 3301212186121123, 'GE004', '2024-11-9'),
('PYN004', 3301232918221002, 'GE002', '2024-11-11'),
('PYN005', 3301292210221022, 'GE003', '2024-11-13');

SELECT * FROM penyewaan;
