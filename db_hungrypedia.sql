-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2021 pada 02.44
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hungrypedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` varchar(11) NOT NULL,
  `Email_Admin` varchar(100) NOT NULL,
  `Password_Admin` varchar(100) NOT NULL,
  `Nama_Admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Email_Admin`, `Password_Admin`, `Nama_Admin`) VALUES
('ADM001', 'Denih@gmail.com', 'deni1234', 'Denih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `Id_DetailTransaksi` int(11) NOT NULL,
  `Id_Pemesanan` int(11) NOT NULL,
  `Id_Member` varchar(11) NOT NULL,
  `Id_Menu` varchar(11) NOT NULL,
  `Nama_Menu` varchar(100) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga_Menu` int(11) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`Id_DetailTransaksi`, `Id_Pemesanan`, `Id_Member`, `Id_Menu`, `Nama_Menu`, `Jumlah`, `Harga_Menu`, `Total`) VALUES
(33, 79, 'MBR001', 'MNU001', 'Chicken Teriyaki + Nasi', 10, 18000, 180000),
(34, 79, 'MBR001', 'MNU002', 'Fish & Chips Cheese Sause', 3, 28000, 84000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `Id_Member` varchar(11) NOT NULL,
  `Email_Member` varchar(100) NOT NULL,
  `Password_Member` varchar(100) NOT NULL,
  `Nama_Member` varchar(100) NOT NULL,
  `Telepon_Member` varchar(25) NOT NULL,
  `Alamat_Member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`Id_Member`, `Email_Member`, `Password_Member`, `Nama_Member`, `Telepon_Member`, `Alamat_Member`) VALUES
('MBR001', 'MRiskiF@gmail.com', 'Riski123', 'M Riski Fadilah', '089512577660', 'Kp Gabus Dukuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `Id_Menu` varchar(11) NOT NULL,
  `Nama_Menu` varchar(100) NOT NULL,
  `Harga_Menu` int(11) NOT NULL,
  `Foto_Menu` varchar(100) NOT NULL,
  `Stok_Menu` int(5) NOT NULL,
  `Deskripsi_Menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`Id_Menu`, `Nama_Menu`, `Harga_Menu`, `Foto_Menu`, `Stok_Menu`, `Deskripsi_Menu`) VALUES
('MNU001', 'Chicken Teriyaki + Nasi', 18000, 'Chickenteriyakiplusnasi.jpg', 90, '															Chicken Pop + Saus Teriyaki + Nasi + Salad										'),
('MNU002', 'Fish & Chips Cheese Sause', 28000, 'Fish_chips_cheese.jpg', 92, 'Rasakan Nikmatnya Fish & Chips Cheese Sauce'),
('MNU003', 'Cheese Burger', 27000, 'BurgerCheseeFF.jpg', 87, 'Frencn Fries + Single Cheese & Beef'),
('MNU004', 'Chicken Hotplate Rice', 29000, 'HotplateChicken.jpg', 98, 'Rasakan Nikmatnya Hotplate Chicken Hungrypedia Galaxy'),
('MNU005', 'Chicken Quesadilla', 23000, 'ChickenQuesadilla.jpg', 99, 'Rasakan Kenikmatan Chicken Quesadilla Hungrypedia Galaxy'),
('MNU006', 'Roti Bakar Coklat', 16000, 'Roti Bakar Coklat.jpg', 99, 'Coklat nya mantul banget , hanya di Hungrypedia Galaxy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `Id_Pembayaran` varchar(11) NOT NULL,
  `Id_Pemesanan` int(11) NOT NULL,
  `Nama_Penyetor` varchar(100) NOT NULL,
  `Bank` varchar(100) NOT NULL,
  `Jumlah` int(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`Id_Pembayaran`, `Id_Pemesanan`, `Nama_Penyetor`, `Bank`, `Jumlah`, `Tanggal`, `Bukti`) VALUES
('PBR001', 71, 'M Riski Fadilah', 'BANK MANDIRI', 208000, '2021-04-11', '2021041120455620200110044136b4.jpg'),
('PBR002', 73, 'Desa', 'BANK BNI', 118000, '2021-04-25', '202104251841172021031818035220200110044136b4.jpg'),
('PBR003', 79, 'M Riski Fadilah', 'BANK BNI', 100, '2021-04-26', '2021042616041420200110044136b4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `Id_Pemesanan` int(11) NOT NULL,
  `Id_Member` varchar(11) NOT NULL,
  `Tanggal_Pemesanan` date NOT NULL,
  `Total_Pemesanan` int(20) NOT NULL,
  `Status_Pemesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`Id_Pemesanan`, `Id_Member`, `Tanggal_Pemesanan`, `Total_Pemesanan`, `Status_Pemesanan`) VALUES
(79, 'MBR001', '2021-04-26', 264000, 'batal');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`Id_DetailTransaksi`),
  ADD KEY `detail_transaksi_ibfk_1` (`Id_Member`),
  ADD KEY `detail_transaksi_ibfk_2` (`Id_Pemesanan`),
  ADD KEY `detail_transaksi_ibfk_3` (`Id_Menu`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id_Member`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id_Menu`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`Id_Pembayaran`),
  ADD UNIQUE KEY `Id_Pemesanan` (`Id_Pemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`Id_Pemesanan`),
  ADD KEY `Id_Member` (`Id_Member`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `Id_DetailTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `Id_Pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`Id_Member`) REFERENCES `member` (`Id_Member`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`Id_Pemesanan`) REFERENCES `pemesanan` (`Id_Pemesanan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`Id_Menu`) REFERENCES `menu` (`Id_Menu`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`Id_Member`) REFERENCES `member` (`Id_Member`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
