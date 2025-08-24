-- sisrute.rumah_sakit definition
USE `master`;

CREATE TABLE `faskes` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) DEFAULT '',
  `kode` CHAR(12) DEFAULT NULL  COMMENT 'kode faskes',
  `alamat` varchar(100) DEFAULT '',
  `kontak` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `prov` CHAR(10) DEFAULT '' COMMENT 'kode wilayah propinsi',
  `kab` CHAR(10) DEFAULT '' COMMENT 'kode wilayah KOta/Kab',
  `kelompok_faskes` tinyint(0) DEFAULT '0' COMMENT 'db master table referensi JENIS = 1',
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_kerjasama_bpjs` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Ya, 0=Tdk',
  `kode_faskes_bpjs` char(8) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `status` (`status`),
  KEY `prov` (`prov`),
  KEY `kab` (`kab`),
  KEY `nama` (`nama`),
  KEY `status_kerjasama_bpjs` (`status_kerjasama_bpjs`),
  KEY `kode_faskes_bpjs` (`kode_faskes_bpjs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;