-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th2 26, 2021 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `idd` int(11) NOT NULL,
  `diemchuyencan` float DEFAULT NULL,
  `diemkiemtra` float DEFAULT NULL,
  `diemcuoiky` float DEFAULT NULL,
  `idsv` int(11) NOT NULL,
  `idmh` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`idd`, `diemchuyencan`, `diemkiemtra`, `diemcuoiky`, `idsv`, `idmh`) VALUES
(92, 10, 7, 8, 1, 1),
(93, 5, 6, 7, 1, 2),
(94, 9, 7, 8, 1, 3),
(95, 9, 8, 8, 1, 4),
(96, 10, 7, 7, 1, 5),
(97, NULL, NULL, NULL, 1, 6),
(98, 5, 9, 6, 1, 7),
(99, 7, 7, 8, 1, 8),
(100, 9, 7, 10, 1, 9),
(101, 10, 8, 9, 1, 10),
(102, NULL, NULL, NULL, 2, 1),
(103, 5, 6, 7, 2, 2),
(104, 9, 7, 8, 2, 3),
(105, 8, 5, 8, 2, 4),
(106, 10, 7, 7, 2, 5),
(107, NULL, NULL, NULL, 2, 6),
(108, 5, 4, 6, 2, 7),
(109, 10, 6, 7, 2, 8),
(110, 8, 7, 10, 2, 9),
(111, 8, 8, 8, 2, 10),
(112, 8, 8, 8, 3, 1),
(113, 5, 6, 7, 3, 2),
(114, 5, 7, 8, 3, 3),
(115, 6, 9, 8, 3, 4),
(116, 10, 7, 7, 3, 5),
(117, 10, 8, 10, 3, 6),
(118, 7, 7, 6, 3, 7),
(119, 7, 6, 7, 3, 8),
(120, 9, 8, 7, 3, 9),
(121, 7, 8, 7, 3, 10),
(122, 10, 10, 8, 4, 1),
(123, NULL, NULL, NULL, 4, 2),
(124, 4, 7, 8, 4, 3),
(125, 6, 7, 8, 4, 4),
(126, 10, 7, 7, 4, 5),
(127, 6, 7, 10, 4, 6),
(128, 5, 7, 6, 4, 7),
(129, 10, 7, 7, 4, 8),
(130, 8, 7, 10, 4, 9),
(131, 8, 7, 10, 4, 10),
(132, 10, 8, 8, 5, 1),
(133, 10, 8, 8, 5, 1),
(136, NULL, NULL, NULL, 1, 14),
(137, NULL, NULL, NULL, 4, 14),
(138, NULL, NULL, NULL, 1, 12),
(139, NULL, NULL, NULL, 5, 12),
(140, NULL, NULL, NULL, 5, 13),
(141, 10, 10, 10, 15, 11),
(142, NULL, NULL, NULL, 19, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `idmh` int(11) NOT NULL,
  `tenmh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sotin` int(11) NOT NULL,
  `hocky` int(2) NOT NULL,
  `giaovien` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`idmh`, `tenmh`, `sotin`, `hocky`, `giaovien`) VALUES
(1, 'Giải tích 1', 2, 1, 'Nguyễn Hồng Vân'),
(2, 'Đại số', 2, 1, 'Trần Văn Dũng'),
(3, 'Giải tích 2', 2, 1, 'Nguyễn Thế Phong'),
(4, 'Tin học cơ sở 2', 2, 2, 'Trần Vũ Phóng'),
(5, 'Giáo dục thể chất 1', 2, 2, 'Lê Thái Hoàng'),
(6, 'Tin học cơ sơ 1', 2, 2, 'Nguyễn Kiều Phương'),
(7, 'Tin học sơ sơ 2', 2, 2, 'Ngô Hùng Dũng'),
(8, 'Toán rời rạc 1', 3, 2, 'Hoàng Văn Thưởng'),
(9, 'Toán rời rạc 2', 3, 3, 'Lê Văn Đạt'),
(10, 'Lập trình C++', 3, 4, 'Trần Hữu Long'),
(11, '22', 11, 11, '11'),
(12, 'Lập trình web', 3, 5, 'Nguyễn Quang Hưng'),
(13, 'Công nghệ phần mền', 3, 5, 'Nguyễn Mạnh Hùng'),
(14, 'Hệ điều hành Windows/Linux', 3, 5, 'Ngô Quốc Dũng'),
(31, '1', 1, 1, '1'),
(32, '1', 1, 1, '1'),
(33, 'test', 10, 4, 'test'),
(34, 'test', 10, 4, 'test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `idsv` int(11) NOT NULL,
  `tensv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lop` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taikhoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sv',
  `que` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lienlac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jpg` varchar(255) COLLATE utf8_unicode_ci DEFAULT './anh/logo.jpg',
  `hocphi` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`idsv`, `tensv`, `msv`, `lop`, `nganh`, `ngaysinh`, `taikhoan`, `matkhau`, `chucvu`, `que`, `lienlac`, `jpg`, `hocphi`) VALUES
(1, 'Cao Ngọc Sơn', 'B17AT153', 'D17AT1', 'ATTT', '20/01/1999', 'cns153', 'cns153', 'Administrator', 'Nam Định', '09345.74.722', './anh/2.jpg', 6),
(2, 'Nguyễn Quốc Tuấn', 'B17AT201', 'D17AT1', 'ATTT', '20/01/1999', 'nqt201', 'nqt201', 'sv', 'Hà Nội', '', './anh/1.jpg', 5),
(3, 'Nguyễn Đăng Quý', 'B17AT149', 'D17AT1', 'ATTT', '20/01/1999', 'ndq149', 'ndq149', 'sv', 'Hà Nội', '', './anh/3.jpg', 7),
(4, 'Ngô Trần Anh Đức', 'B17AT01', 'D17AT1', 'ATTT', '20/01/1999', 'ntad01', 'ntad01', 'sv', 'Ninh Bình', '', './anh/logo.jpg', 7),
(5, 'cao hải dân', '1', 'att1', 'attt', '20/01/1999', '1', '1', 'SV', 'ND', 'none', './anh/logo.jpg', 3),
(15, 'Nguyễn Văn Nam', 'B17DCCN134', 'B17CN1', 'CNTT', '31/07/1999', 'nvn134', '12345', 'sv', 'Phú Thọ', 'none', './anh/logo.jpg', NULL),
(19, 'Hoàng Mạnh Huân', 'B17CN111', 'CN1', 'CNTT', '30/07/1998', 'hmh111', 'hmh111', 'sv', 'Nam Định', 'none', './anh/logo.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `fk_d_mh` (`idmh`),
  ADD KEY `fk_d_sv` (`idsv`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idmh`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idsv`),
  ADD UNIQUE KEY `uq_msv` (`msv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idmh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `idsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `fk_d_mh` FOREIGN KEY (`idmh`) REFERENCES `monhoc` (`idmh`),
  ADD CONSTRAINT `fk_d_sv` FOREIGN KEY (`idsv`) REFERENCES `sinhvien` (`idsv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
