CREATE DATABASE mhs;
use mhs;

CREATE TABLE identitas(
    -> npm varchar(12) PRIMARY KEY,
    -> nama varchar(20),
    -> alamat varchar(100),
    -> jk char(1),
    -> tgl_lhr date,
    -> email varchar(40));

CREATE TABLE users(
    -> username varchar(20) PRIMARY KEY,
    -> pass varchar(100),
    -> npm varchar(12),
    -> level char(1),
    -> FOREIGN KEY (npm) REFERENCES identitas(npm));

-- Input user Admin dan Non-Admin -- 
INSERT INTO users(username, pass, npm, level) VALUES
    -> ('robbyazwan', SHA1('robby12345'), '140810230008', '2'), -- admin, saya sendiri -- 
    -> ('nikita', SHA1('nikita12345'), '140810230010', '1'),
    -> ('zahran', SHA1('zahran12345'), '140810230014', '1'),
    -> ('dafaghani', SHA1('dafa12345'), '140810230022', '1'),

-- Input Identitas -- 
INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES
    -> ("140810230008", "Robby Azwan Saputra", "Jakarta", "L", "2004-09-17", "oby.azwan@gmail.cm"),
    -> ("140810230010", "Nikita Putri Prabowo", "Bekasi", "P", "2005-09-27", "nikitaputri@gmail.com"),
    -> ("140810230014", "M. Zahran Muntazar", "Bandung", "L", "2004-10-15", "zahranm@gmail.com"),
    -> ("140810230022", "Dafa Ghani Abdul R.", "Bandung", "L", "2005-02-04", "dafaghani@gmail.com"),