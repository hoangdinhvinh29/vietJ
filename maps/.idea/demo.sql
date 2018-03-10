-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 06, 2018 lúc 09:14 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oil`
--

CREATE TABLE `oil` (
  `oid_id` int(6) NOT NULL,
  `lit` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `oil`
--

INSERT INTO `oil` (`oid_id`, `lit`) VALUES
(1, 7),
(2, 10),
(3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeofvehicle`
--

CREATE TABLE `typeofvehicle` (
  `type_id` int(6) NOT NULL,
  `vehicle` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `typeofvehicle`
--

INSERT INTO `typeofvehicle` (`type_id`, `vehicle`) VALUES
(1, 'xemay'),
(2, 'oto');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_to_oil`
--

CREATE TABLE `type_to_oil` (
  `type_id` int(6) NOT NULL,
  `oil_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `type_to_oil`
--

INSERT INTO `type_to_oil` (`type_id`, `oil_id`) VALUES
(1, 1),
(2, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `oil`
--
ALTER TABLE `oil`
  ADD PRIMARY KEY (`oid_id`);

--
-- Chỉ mục cho bảng `typeofvehicle`
--
ALTER TABLE `typeofvehicle`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `oil`
--
ALTER TABLE `oil`
  MODIFY `oid_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `typeofvehicle`
--
ALTER TABLE `typeofvehicle`
  MODIFY `type_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
