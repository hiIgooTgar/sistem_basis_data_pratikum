CREATE DATABASE uts_sbd;
USE uts_sbd;

CREATE TABLE anggota(
no_ktp CHAR(16) PRIMARY KEY,
nama VARCHAR(32),
alamat VARCHAR(32)		
)

CREATE TABLE fasilitas(
id_fasilitas VARCHAR(32) PRIMARY KEY,
nama_fasilitas VARCHAR(63)
)

CREATE TABLE gedung(
no_gedung VARCHAR(16) PRIMARY KEY,
nama_gedung VARCHAR(32),
kapasitas INT(11),
harga_sewa INT(11),
id_fasilitas VARCHAR(32),

FOREIGN KEY (id_fasilitas) REFERENCES fasilitas(id_fasilitas)
)

CREATE TABLE penyewaan(
id_penyewaan VARCHAR(16) PRIMARY KEY,
no_ktp CHAR(16),
no_gedung VARCHAR(16),
tanggal_penyewaan DATE,

FOREIGN KEY (no_ktp) REFERENCES anggota(no_ktp),
FOREIGN KEY (no_gedung) REFERENCES gedung(no_gedung)
)
