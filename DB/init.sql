-- Buat user 'admin' (jika belum otomatis dibuat)
CREATE USER 'sigap'@'%' IDENTIFIED WITH caching_sha2_password BY 'S!GApRujukan@kemkes.go.id';

-- Berikan akses penuh ke semua database (termasuk mysql.*, performance_schema.*, sys.*, test, dll)
GRANT ALL PRIVILEGES ON *.* TO 'sigap'@'%' WITH GRANT OPTION;

-- Tambahan: kalau test masih ngeyel, grant spesifik juga
GRANT ALL PRIVILEGES ON test.* TO 'sigap'@'%';

-- Refresh privilege
FLUSH PRIVILEGES;
