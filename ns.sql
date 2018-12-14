-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 07:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ns`
--

-- --------------------------------------------------------

--
-- Table structure for table `bang_cap`
--

CREATE TABLE `bang_cap` (
  `MA_BC` int(11) NOT NULL,
  `TEN_BC` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bang_cap`
--

INSERT INTO `bang_cap` (`MA_BC`, `TEN_BC`) VALUES
(2, 'University/ College Graduation Certificate'),
(3, 'TOIEC');

-- --------------------------------------------------------

--
-- Table structure for table `bao_hiem`
--

CREATE TABLE `bao_hiem` (
  `MA_GIAM_TRU` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_KHOAN_GIAM_TRU` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TI_LE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bao_hiem`
--

INSERT INTO `bao_hiem` (`MA_GIAM_TRU`, `TEN_KHOAN_GIAM_TRU`, `TI_LE`) VALUES
('bhtn', 'Bảo hiểm thất nghiệp', 1),
('bhxh', 'Bảo hiểm xã hội', 1.5),
('bhyt', 'Bảo hiểm y tế', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cham_cong`
--

CREATE TABLE `cham_cong` (
  `STT_CONG` int(11) NOT NULL,
  `SO_NGAY_LAM` int(11) NOT NULL,
  `SO_NGAY_NGHI` int(11) NOT NULL,
  `SO_GIO_LAM_THEM` int(11) NOT NULL,
  `THANG` int(11) NOT NULL,
  `NAM` int(11) NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet`
--

CREATE TABLE `chi_tiet` (
  `MA_CV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_TD` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `SO_LUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `MA_CV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_CV` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chuc_vu`
--

INSERT INTO `chuc_vu` (`MA_CV`, `TEN_CV`) VALUES
('NV', 'Nhân viên '),
('r54r5', 'r45654 tgtyt'),
('TPIT', 'Trưởng phòng ');

-- --------------------------------------------------------

--
-- Table structure for table `cong_tac`
--

CREATE TABLE `cong_tac` (
  `MA_CT` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_CHUYEN_CT` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TG_BD_CTAC` datetime DEFAULT NULL,
  `TG_KT_CTAC` datetime DEFAULT NULL,
  `DIA_DIEM` text COLLATE utf8_vietnamese_ci,
  `MUC_DICH` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `co_bc`
--

CREATE TABLE `co_bc` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_BC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `co_bc`
--

INSERT INTO `co_bc` (`ID_NV`, `MA_BC`) VALUES
('NV001', 2),
('NV001', 3),
('NV002', 2),
('NV002', 3),
('NV003', 2),
('NV003', 3),
('NV004', 2),
('NV004', 3),
('NV005', 2),
('NV005', 3);

-- --------------------------------------------------------

--
-- Table structure for table `co_giam_tru`
--

CREATE TABLE `co_giam_tru` (
  `MA_HD` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_GIAM_TRU` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `co_giam_tru`
--

INSERT INTO `co_giam_tru` (`MA_HD`, `MA_GIAM_TRU`) VALUES
('hd001', 'bhtn'),
('hd001', 'bhxh'),
('hd001', 'bhyt'),
('hd002', 'bhtn'),
('hd002', 'bhxh'),
('hd002', 'bhyt'),
('hd003', 'bhtn'),
('hd003', 'bhxh'),
('hd003', 'bhyt'),
('hd004', 'bhtn'),
('hd004', 'bhxh'),
('hd004', 'bhyt'),
('hd005', 'bhtn'),
('hd005', 'bhxh'),
('hd005', 'bhyt');

-- --------------------------------------------------------

--
-- Table structure for table `co_kn`
--

CREATE TABLE `co_kn` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_KN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `co_kn`
--

INSERT INTO `co_kn` (`ID_NV`, `MA_KN`) VALUES
('NV001', 1),
('NV002', 2),
('NV002', 3),
('NV003', 1),
('NV003', 3),
('NV004', 2),
('NV004', 3),
('NV005', 3);

-- --------------------------------------------------------

--
-- Table structure for table `co_phu_cap`
--

CREATE TABLE `co_phu_cap` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_PHU_CAP` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `co_phu_cap`
--

INSERT INTO `co_phu_cap` (`ID_NV`, `MA_PHU_CAP`) VALUES
('NV001', 'PCTN'),
('NV001', 'PCXC'),
('NV002', 'PC01'),
('NV002', 'PCXC'),
('NV003', 'PC01'),
('NV003', 'PCTN'),
('NV004', 'PC01'),
('NV004', 'PCTN'),
('NV005', 'PCTN'),
('NV005', 'PCXC');

-- --------------------------------------------------------

--
-- Table structure for table `co_phu_cap_hd`
--

CREATE TABLE `co_phu_cap_hd` (
  `MA_PHU_CAP` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_HD` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `co_phu_cap_hd`
--

INSERT INTO `co_phu_cap_hd` (`MA_PHU_CAP`, `MA_HD`) VALUES
('PC01', 'hd001'),
('PC01', 'hd002'),
('PC01', 'hd003'),
('PC01', 'hd004'),
('PC01', 'hd005'),
('PCTN', 'hd001'),
('PCTN', 'hd002'),
('PCTN', 'hd003'),
('PCTN', 'hd004'),
('PCTN', 'hd005'),
('PCXC', 'hd001'),
('PCXC', 'hd002'),
('PCXC', 'hd003'),
('PCXC', 'hd004'),
('PCXC', 'hd005');

-- --------------------------------------------------------

--
-- Table structure for table `devvn_quanhuyen`
--

CREATE TABLE `devvn_quanhuyen` (
  `maqh` varchar(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `QUAN_HUYEN` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `matp` varchar(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devvn_quanhuyen`
--

INSERT INTO `devvn_quanhuyen` (`maqh`, `QUAN_HUYEN`, `type`, `matp`) VALUES
('001', 'Quận Ba Đình', 'Quận', '01'),
('002', 'Quận Hoàn Kiếm', 'Quận', '01'),
('003', 'Quận Tây Hồ', 'Quận', '01'),
('004', 'Quận Long Biên', 'Quận', '01'),
('005', 'Quận Cầu Giấy', 'Quận', '01'),
('006', 'Quận Đống Đa', 'Quận', '01'),
('007', 'Quận Hai Bà Trưng', 'Quận', '01'),
('008', 'Quận Hoàng Mai', 'Quận', '01'),
('009', 'Quận Thanh Xuân', 'Quận', '01'),
('016', 'Huyện Sóc Sơn', 'Huyện', '01'),
('017', 'Huyện Đông Anh', 'Huyện', '01'),
('018', 'Huyện Gia Lâm', 'Huyện', '01'),
('019', 'Quận Nam Từ Liêm', 'Quận', '01'),
('020', 'Huyện Thanh Trì', 'Huyện', '01'),
('021', 'Quận Bắc Từ Liêm', 'Quận', '01'),
('024', 'Thành phố Hà Giang', 'Thành phố', '02'),
('026', 'Huyện Đồng Văn', 'Huyện', '02'),
('027', 'Huyện Mèo Vạc', 'Huyện', '02'),
('028', 'Huyện Yên Minh', 'Huyện', '02'),
('029', 'Huyện Quản Bạ', 'Huyện', '02'),
('030', 'Huyện Vị Xuyên', 'Huyện', '02'),
('031', 'Huyện Bắc Mê', 'Huyện', '02'),
('032', 'Huyện Hoàng Su Phì', 'Huyện', '02'),
('033', 'Huyện Xín Mần', 'Huyện', '02'),
('034', 'Huyện Bắc Quang', 'Huyện', '02'),
('035', 'Huyện Quang Bình', 'Huyện', '02'),
('040', 'Thành phố Cao Bằng', 'Thành phố', '04'),
('042', 'Huyện Bảo Lâm', 'Huyện', '04'),
('043', 'Huyện Bảo Lạc', 'Huyện', '04'),
('044', 'Huyện Thông Nông', 'Huyện', '04'),
('045', 'Huyện Hà Quảng', 'Huyện', '04'),
('046', 'Huyện Trà Lĩnh', 'Huyện', '04'),
('047', 'Huyện Trùng Khánh', 'Huyện', '04'),
('048', 'Huyện Hạ Lang', 'Huyện', '04'),
('049', 'Huyện Quảng Uyên', 'Huyện', '04'),
('050', 'Huyện Phục Hoà', 'Huyện', '04'),
('051', 'Huyện Hoà An', 'Huyện', '04'),
('052', 'Huyện Nguyên Bình', 'Huyện', '04'),
('053', 'Huyện Thạch An', 'Huyện', '04'),
('058', 'Thành Phố Bắc Kạn', 'Thành phố', '06'),
('060', 'Huyện Pác Nặm', 'Huyện', '06'),
('061', 'Huyện Ba Bể', 'Huyện', '06'),
('062', 'Huyện Ngân Sơn', 'Huyện', '06'),
('063', 'Huyện Bạch Thông', 'Huyện', '06'),
('064', 'Huyện Chợ Đồn', 'Huyện', '06'),
('065', 'Huyện Chợ Mới', 'Huyện', '06'),
('066', 'Huyện Na Rì', 'Huyện', '06'),
('070', 'Thành phố Tuyên Quang', 'Thành phố', '08'),
('071', 'Huyện Lâm Bình', 'Huyện', '08'),
('072', 'Huyện Nà Hang', 'Huyện', '08'),
('073', 'Huyện Chiêm Hóa', 'Huyện', '08'),
('074', 'Huyện Hàm Yên', 'Huyện', '08'),
('075', 'Huyện Yên Sơn', 'Huyện', '08'),
('076', 'Huyện Sơn Dương', 'Huyện', '08'),
('080', 'Thành phố Lào Cai', 'Thành phố', '10'),
('082', 'Huyện Bát Xát', 'Huyện', '10'),
('083', 'Huyện Mường Khương', 'Huyện', '10'),
('084', 'Huyện Si Ma Cai', 'Huyện', '10'),
('085', 'Huyện Bắc Hà', 'Huyện', '10'),
('086', 'Huyện Bảo Thắng', 'Huyện', '10'),
('087', 'Huyện Bảo Yên', 'Huyện', '10'),
('088', 'Huyện Sa Pa', 'Huyện', '10'),
('089', 'Huyện Văn Bàn', 'Huyện', '10'),
('094', 'Thành phố Điện Biên Phủ', 'Thành phố', '11'),
('095', 'Thị Xã Mường Lay', 'Thị xã', '11'),
('096', 'Huyện Mường Nhé', 'Huyện', '11'),
('097', 'Huyện Mường Chà', 'Huyện', '11'),
('098', 'Huyện Tủa Chùa', 'Huyện', '11'),
('099', 'Huyện Tuần Giáo', 'Huyện', '11'),
('100', 'Huyện Điện Biên', 'Huyện', '11'),
('101', 'Huyện Điện Biên Đông', 'Huyện', '11'),
('102', 'Huyện Mường Ảng', 'Huyện', '11'),
('103', 'Huyện Nậm Pồ', 'Huyện', '11'),
('105', 'Thành phố Lai Châu', 'Thành phố', '12'),
('106', 'Huyện Tam Đường', 'Huyện', '12'),
('107', 'Huyện Mường Tè', 'Huyện', '12'),
('108', 'Huyện Sìn Hồ', 'Huyện', '12'),
('109', 'Huyện Phong Thổ', 'Huyện', '12'),
('110', 'Huyện Than Uyên', 'Huyện', '12'),
('111', 'Huyện Tân Uyên', 'Huyện', '12'),
('112', 'Huyện Nậm Nhùn', 'Huyện', '12'),
('116', 'Thành phố Sơn La', 'Thành phố', '14'),
('118', 'Huyện Quỳnh Nhai', 'Huyện', '14'),
('119', 'Huyện Thuận Châu', 'Huyện', '14'),
('120', 'Huyện Mường La', 'Huyện', '14'),
('121', 'Huyện Bắc Yên', 'Huyện', '14'),
('122', 'Huyện Phù Yên', 'Huyện', '14'),
('123', 'Huyện Mộc Châu', 'Huyện', '14'),
('124', 'Huyện Yên Châu', 'Huyện', '14'),
('125', 'Huyện Mai Sơn', 'Huyện', '14'),
('126', 'Huyện Sông Mã', 'Huyện', '14'),
('127', 'Huyện Sốp Cộp', 'Huyện', '14'),
('128', 'Huyện Vân Hồ', 'Huyện', '14'),
('132', 'Thành phố Yên Bái', 'Thành phố', '15'),
('133', 'Thị xã Nghĩa Lộ', 'Thị xã', '15'),
('135', 'Huyện Lục Yên', 'Huyện', '15'),
('136', 'Huyện Văn Yên', 'Huyện', '15'),
('137', 'Huyện Mù Căng Chải', 'Huyện', '15'),
('138', 'Huyện Trấn Yên', 'Huyện', '15'),
('139', 'Huyện Trạm Tấu', 'Huyện', '15'),
('140', 'Huyện Văn Chấn', 'Huyện', '15'),
('141', 'Huyện Yên Bình', 'Huyện', '15'),
('148', 'Thành phố Hòa Bình', 'Thành phố', '17'),
('150', 'Huyện Đà Bắc', 'Huyện', '17'),
('151', 'Huyện Kỳ Sơn', 'Huyện', '17'),
('152', 'Huyện Lương Sơn', 'Huyện', '17'),
('153', 'Huyện Kim Bôi', 'Huyện', '17'),
('154', 'Huyện Cao Phong', 'Huyện', '17'),
('155', 'Huyện Tân Lạc', 'Huyện', '17'),
('156', 'Huyện Mai Châu', 'Huyện', '17'),
('157', 'Huyện Lạc Sơn', 'Huyện', '17'),
('158', 'Huyện Yên Thủy', 'Huyện', '17'),
('159', 'Huyện Lạc Thủy', 'Huyện', '17'),
('164', 'Thành phố Thái Nguyên', 'Thành phố', '19'),
('165', 'Thành phố Sông Công', 'Thành phố', '19'),
('167', 'Huyện Định Hóa', 'Huyện', '19'),
('168', 'Huyện Phú Lương', 'Huyện', '19'),
('169', 'Huyện Đồng Hỷ', 'Huyện', '19'),
('170', 'Huyện Võ Nhai', 'Huyện', '19'),
('171', 'Huyện Đại Từ', 'Huyện', '19'),
('172', 'Thị xã Phổ Yên', 'Thị xã', '19'),
('173', 'Huyện Phú Bình', 'Huyện', '19'),
('178', 'Thành phố Lạng Sơn', 'Thành phố', '20'),
('180', 'Huyện Tràng Định', 'Huyện', '20'),
('181', 'Huyện Bình Gia', 'Huyện', '20'),
('182', 'Huyện Văn Lãng', 'Huyện', '20'),
('183', 'Huyện Cao Lộc', 'Huyện', '20'),
('184', 'Huyện Văn Quan', 'Huyện', '20'),
('185', 'Huyện Bắc Sơn', 'Huyện', '20'),
('186', 'Huyện Hữu Lũng', 'Huyện', '20'),
('187', 'Huyện Chi Lăng', 'Huyện', '20'),
('188', 'Huyện Lộc Bình', 'Huyện', '20'),
('189', 'Huyện Đình Lập', 'Huyện', '20'),
('193', 'Thành phố Hạ Long', 'Thành phố', '22'),
('194', 'Thành phố Móng Cái', 'Thành phố', '22'),
('195', 'Thành phố Cẩm Phả', 'Thành phố', '22'),
('196', 'Thành phố Uông Bí', 'Thành phố', '22'),
('198', 'Huyện Bình Liêu', 'Huyện', '22'),
('199', 'Huyện Tiên Yên', 'Huyện', '22'),
('200', 'Huyện Đầm Hà', 'Huyện', '22'),
('201', 'Huyện Hải Hà', 'Huyện', '22'),
('202', 'Huyện Ba Chẽ', 'Huyện', '22'),
('203', 'Huyện Vân Đồn', 'Huyện', '22'),
('204', 'Huyện Hoành Bồ', 'Huyện', '22'),
('205', 'Thị xã Đông Triều', 'Thị xã', '22'),
('206', 'Thị xã Quảng Yên', 'Thị xã', '22'),
('207', 'Huyện Cô Tô', 'Huyện', '22'),
('213', 'Thành phố Bắc Giang', 'Thành phố', '24'),
('215', 'Huyện Yên Thế', 'Huyện', '24'),
('216', 'Huyện Tân Yên', 'Huyện', '24'),
('217', 'Huyện Lạng Giang', 'Huyện', '24'),
('218', 'Huyện Lục Nam', 'Huyện', '24'),
('219', 'Huyện Lục Ngạn', 'Huyện', '24'),
('220', 'Huyện Sơn Động', 'Huyện', '24'),
('221', 'Huyện Yên Dũng', 'Huyện', '24'),
('222', 'Huyện Việt Yên', 'Huyện', '24'),
('223', 'Huyện Hiệp Hòa', 'Huyện', '24'),
('227', 'Thành phố Việt Trì', 'Thành phố', '25'),
('228', 'Thị xã Phú Thọ', 'Thị xã', '25'),
('230', 'Huyện Đoan Hùng', 'Huyện', '25'),
('231', 'Huyện Hạ Hoà', 'Huyện', '25'),
('232', 'Huyện Thanh Ba', 'Huyện', '25'),
('233', 'Huyện Phù Ninh', 'Huyện', '25'),
('234', 'Huyện Yên Lập', 'Huyện', '25'),
('235', 'Huyện Cẩm Khê', 'Huyện', '25'),
('236', 'Huyện Tam Nông', 'Huyện', '25'),
('237', 'Huyện Lâm Thao', 'Huyện', '25'),
('238', 'Huyện Thanh Sơn', 'Huyện', '25'),
('239', 'Huyện Thanh Thuỷ', 'Huyện', '25'),
('240', 'Huyện Tân Sơn', 'Huyện', '25'),
('243', 'Thành phố Vĩnh Yên', 'Thành phố', '26'),
('244', 'Thị xã Phúc Yên', 'Thị xã', '26'),
('246', 'Huyện Lập Thạch', 'Huyện', '26'),
('247', 'Huyện Tam Dương', 'Huyện', '26'),
('248', 'Huyện Tam Đảo', 'Huyện', '26'),
('249', 'Huyện Bình Xuyên', 'Huyện', '26'),
('250', 'Huyện Mê Linh', 'Huyện', '01'),
('251', 'Huyện Yên Lạc', 'Huyện', '26'),
('252', 'Huyện Vĩnh Tường', 'Huyện', '26'),
('253', 'Huyện Sông Lô', 'Huyện', '26'),
('256', 'Thành phố Bắc Ninh', 'Thành phố', '27'),
('258', 'Huyện Yên Phong', 'Huyện', '27'),
('259', 'Huyện Quế Võ', 'Huyện', '27'),
('260', 'Huyện Tiên Du', 'Huyện', '27'),
('261', 'Thị xã Từ Sơn', 'Thị xã', '27'),
('262', 'Huyện Thuận Thành', 'Huyện', '27'),
('263', 'Huyện Gia Bình', 'Huyện', '27'),
('264', 'Huyện Lương Tài', 'Huyện', '27'),
('268', 'Quận Hà Đông', 'Quận', '01'),
('269', 'Thị xã Sơn Tây', 'Thị xã', '01'),
('271', 'Huyện Ba Vì', 'Huyện', '01'),
('272', 'Huyện Phúc Thọ', 'Huyện', '01'),
('273', 'Huyện Đan Phượng', 'Huyện', '01'),
('274', 'Huyện Hoài Đức', 'Huyện', '01'),
('275', 'Huyện Quốc Oai', 'Huyện', '01'),
('276', 'Huyện Thạch Thất', 'Huyện', '01'),
('277', 'Huyện Chương Mỹ', 'Huyện', '01'),
('278', 'Huyện Thanh Oai', 'Huyện', '01'),
('279', 'Huyện Thường Tín', 'Huyện', '01'),
('280', 'Huyện Phú Xuyên', 'Huyện', '01'),
('281', 'Huyện Ứng Hòa', 'Huyện', '01'),
('282', 'Huyện Mỹ Đức', 'Huyện', '01'),
('288', 'Thành phố Hải Dương', 'Thành phố', '30'),
('290', 'Thị xã Chí Linh', 'Thị xã', '30'),
('291', 'Huyện Nam Sách', 'Huyện', '30'),
('292', 'Huyện Kinh Môn', 'Huyện', '30'),
('293', 'Huyện Kim Thành', 'Huyện', '30'),
('294', 'Huyện Thanh Hà', 'Huyện', '30'),
('295', 'Huyện Cẩm Giàng', 'Huyện', '30'),
('296', 'Huyện Bình Giang', 'Huyện', '30'),
('297', 'Huyện Gia Lộc', 'Huyện', '30'),
('298', 'Huyện Tứ Kỳ', 'Huyện', '30'),
('299', 'Huyện Ninh Giang', 'Huyện', '30'),
('300', 'Huyện Thanh Miện', 'Huyện', '30'),
('303', 'Quận Hồng Bàng', 'Quận', '31'),
('304', 'Quận Ngô Quyền', 'Quận', '31'),
('305', 'Quận Lê Chân', 'Quận', '31'),
('306', 'Quận Hải An', 'Quận', '31'),
('307', 'Quận Kiến An', 'Quận', '31'),
('308', 'Quận Đồ Sơn', 'Quận', '31'),
('309', 'Quận Dương Kinh', 'Quận', '31'),
('311', 'Huyện Thuỷ Nguyên', 'Huyện', '31'),
('312', 'Huyện An Dương', 'Huyện', '31'),
('313', 'Huyện An Lão', 'Huyện', '31'),
('314', 'Huyện Kiến Thuỵ', 'Huyện', '31'),
('315', 'Huyện Tiên Lãng', 'Huyện', '31'),
('316', 'Huyện Vĩnh Bảo', 'Huyện', '31'),
('317', 'Huyện Cát Hải', 'Huyện', '31'),
('318', 'Huyện Bạch Long Vĩ', 'Huyện', '31'),
('323', 'Thành phố Hưng Yên', 'Thành phố', '33'),
('325', 'Huyện Văn Lâm', 'Huyện', '33'),
('326', 'Huyện Văn Giang', 'Huyện', '33'),
('327', 'Huyện Yên Mỹ', 'Huyện', '33'),
('328', 'Huyện Mỹ Hào', 'Huyện', '33'),
('329', 'Huyện Ân Thi', 'Huyện', '33'),
('330', 'Huyện Khoái Châu', 'Huyện', '33'),
('331', 'Huyện Kim Động', 'Huyện', '33'),
('332', 'Huyện Tiên Lữ', 'Huyện', '33'),
('333', 'Huyện Phù Cừ', 'Huyện', '33'),
('336', 'Thành phố Thái Bình', 'Thành phố', '34'),
('338', 'Huyện Quỳnh Phụ', 'Huyện', '34'),
('339', 'Huyện Hưng Hà', 'Huyện', '34'),
('340', 'Huyện Đông Hưng', 'Huyện', '34'),
('341', 'Huyện Thái Thụy', 'Huyện', '34'),
('342', 'Huyện Tiền Hải', 'Huyện', '34'),
('343', 'Huyện Kiến Xương', 'Huyện', '34'),
('344', 'Huyện Vũ Thư', 'Huyện', '34'),
('347', 'Thành phố Phủ Lý', 'Thành phố', '35'),
('349', 'Huyện Duy Tiên', 'Huyện', '35'),
('350', 'Huyện Kim Bảng', 'Huyện', '35'),
('351', 'Huyện Thanh Liêm', 'Huyện', '35'),
('352', 'Huyện Bình Lục', 'Huyện', '35'),
('353', 'Huyện Lý Nhân', 'Huyện', '35'),
('356', 'Thành phố Nam Định', 'Thành phố', '36'),
('358', 'Huyện Mỹ Lộc', 'Huyện', '36'),
('359', 'Huyện Vụ Bản', 'Huyện', '36'),
('360', 'Huyện Ý Yên', 'Huyện', '36'),
('361', 'Huyện Nghĩa Hưng', 'Huyện', '36'),
('362', 'Huyện Nam Trực', 'Huyện', '36'),
('363', 'Huyện Trực Ninh', 'Huyện', '36'),
('364', 'Huyện Xuân Trường', 'Huyện', '36'),
('365', 'Huyện Giao Thủy', 'Huyện', '36'),
('366', 'Huyện Hải Hậu', 'Huyện', '36'),
('369', 'Thành phố Ninh Bình', 'Thành phố', '37'),
('370', 'Thành phố Tam Điệp', 'Thành phố', '37'),
('372', 'Huyện Nho Quan', 'Huyện', '37'),
('373', 'Huyện Gia Viễn', 'Huyện', '37'),
('374', 'Huyện Hoa Lư', 'Huyện', '37'),
('375', 'Huyện Yên Khánh', 'Huyện', '37'),
('376', 'Huyện Kim Sơn', 'Huyện', '37'),
('377', 'Huyện Yên Mô', 'Huyện', '37'),
('380', 'Thành phố Thanh Hóa', 'Thành phố', '38'),
('381', 'Thị xã Bỉm Sơn', 'Thị xã', '38'),
('382', 'Thị xã Sầm Sơn', 'Thị xã', '38'),
('384', 'Huyện Mường Lát', 'Huyện', '38'),
('385', 'Huyện Quan Hóa', 'Huyện', '38'),
('386', 'Huyện Bá Thước', 'Huyện', '38'),
('387', 'Huyện Quan Sơn', 'Huyện', '38'),
('388', 'Huyện Lang Chánh', 'Huyện', '38'),
('389', 'Huyện Ngọc Lặc', 'Huyện', '38'),
('390', 'Huyện Cẩm Thủy', 'Huyện', '38'),
('391', 'Huyện Thạch Thành', 'Huyện', '38'),
('392', 'Huyện Hà Trung', 'Huyện', '38'),
('393', 'Huyện Vĩnh Lộc', 'Huyện', '38'),
('394', 'Huyện Yên Định', 'Huyện', '38'),
('395', 'Huyện Thọ Xuân', 'Huyện', '38'),
('396', 'Huyện Thường Xuân', 'Huyện', '38'),
('397', 'Huyện Triệu Sơn', 'Huyện', '38'),
('398', 'Huyện Thiệu Hóa', 'Huyện', '38'),
('399', 'Huyện Hoằng Hóa', 'Huyện', '38'),
('400', 'Huyện Hậu Lộc', 'Huyện', '38'),
('401', 'Huyện Nga Sơn', 'Huyện', '38'),
('402', 'Huyện Như Xuân', 'Huyện', '38'),
('403', 'Huyện Như Thanh', 'Huyện', '38'),
('404', 'Huyện Nông Cống', 'Huyện', '38'),
('405', 'Huyện Đông Sơn', 'Huyện', '38'),
('406', 'Huyện Quảng Xương', 'Huyện', '38'),
('407', 'Huyện Tĩnh Gia', 'Huyện', '38'),
('412', 'Thành phố Vinh', 'Thành phố', '40'),
('413', 'Thị xã Cửa Lò', 'Thị xã', '40'),
('414', 'Thị xã Thái Hoà', 'Thị xã', '40'),
('415', 'Huyện Quế Phong', 'Huyện', '40'),
('416', 'Huyện Quỳ Châu', 'Huyện', '40'),
('417', 'Huyện Kỳ Sơn', 'Huyện', '40'),
('418', 'Huyện Tương Dương', 'Huyện', '40'),
('419', 'Huyện Nghĩa Đàn', 'Huyện', '40'),
('420', 'Huyện Quỳ Hợp', 'Huyện', '40'),
('421', 'Huyện Quỳnh Lưu', 'Huyện', '40'),
('422', 'Huyện Con Cuông', 'Huyện', '40'),
('423', 'Huyện Tân Kỳ', 'Huyện', '40'),
('424', 'Huyện Anh Sơn', 'Huyện', '40'),
('425', 'Huyện Diễn Châu', 'Huyện', '40'),
('426', 'Huyện Yên Thành', 'Huyện', '40'),
('427', 'Huyện Đô Lương', 'Huyện', '40'),
('428', 'Huyện Thanh Chương', 'Huyện', '40'),
('429', 'Huyện Nghi Lộc', 'Huyện', '40'),
('430', 'Huyện Nam Đàn', 'Huyện', '40'),
('431', 'Huyện Hưng Nguyên', 'Huyện', '40'),
('432', 'Thị xã Hoàng Mai', 'Thị xã', '40'),
('436', 'Thành phố Hà Tĩnh', 'Thành phố', '42'),
('437', 'Thị xã Hồng Lĩnh', 'Thị xã', '42'),
('439', 'Huyện Hương Sơn', 'Huyện', '42'),
('440', 'Huyện Đức Thọ', 'Huyện', '42'),
('441', 'Huyện Vũ Quang', 'Huyện', '42'),
('442', 'Huyện Nghi Xuân', 'Huyện', '42'),
('443', 'Huyện Can Lộc', 'Huyện', '42'),
('444', 'Huyện Hương Khê', 'Huyện', '42'),
('445', 'Huyện Thạch Hà', 'Huyện', '42'),
('446', 'Huyện Cẩm Xuyên', 'Huyện', '42'),
('447', 'Huyện Kỳ Anh', 'Huyện', '42'),
('448', 'Huyện Lộc Hà', 'Huyện', '42'),
('449', 'Thị xã Kỳ Anh', 'Thị xã', '42'),
('450', 'Thành Phố Đồng Hới', 'Thành phố', '44'),
('452', 'Huyện Minh Hóa', 'Huyện', '44'),
('453', 'Huyện Tuyên Hóa', 'Huyện', '44'),
('454', 'Huyện Quảng Trạch', 'Thị xã', '44'),
('455', 'Huyện Bố Trạch', 'Huyện', '44'),
('456', 'Huyện Quảng Ninh', 'Huyện', '44'),
('457', 'Huyện Lệ Thủy', 'Huyện', '44'),
('458', 'Thị xã Ba Đồn', 'Huyện', '44'),
('461', 'Thành phố Đông Hà', 'Thành phố', '45'),
('462', 'Thị xã Quảng Trị', 'Thị xã', '45'),
('464', 'Huyện Vĩnh Linh', 'Huyện', '45'),
('465', 'Huyện Hướng Hóa', 'Huyện', '45'),
('466', 'Huyện Gio Linh', 'Huyện', '45'),
('467', 'Huyện Đa Krông', 'Huyện', '45'),
('468', 'Huyện Cam Lộ', 'Huyện', '45'),
('469', 'Huyện Triệu Phong', 'Huyện', '45'),
('470', 'Huyện Hải Lăng', 'Huyện', '45'),
('471', 'Huyện Cồn Cỏ', 'Huyện', '45'),
('474', 'Thành phố Huế', 'Thành phố', '46'),
('476', 'Huyện Phong Điền', 'Huyện', '46'),
('477', 'Huyện Quảng Điền', 'Huyện', '46'),
('478', 'Huyện Phú Vang', 'Huyện', '46'),
('479', 'Thị xã Hương Thủy', 'Thị xã', '46'),
('480', 'Thị xã Hương Trà', 'Thị xã', '46'),
('481', 'Huyện A Lưới', 'Huyện', '46'),
('482', 'Huyện Phú Lộc', 'Huyện', '46'),
('483', 'Huyện Nam Đông', 'Huyện', '46'),
('490', 'Quận Liên Chiểu', 'Quận', '48'),
('491', 'Quận Thanh Khê', 'Quận', '48'),
('492', 'Quận Hải Châu', 'Quận', '48'),
('493', 'Quận Sơn Trà', 'Quận', '48'),
('494', 'Quận Ngũ Hành Sơn', 'Quận', '48'),
('495', 'Quận Cẩm Lệ', 'Quận', '48'),
('497', 'Huyện Hòa Vang', 'Huyện', '48'),
('498', 'Huyện Hoàng Sa', 'Huyện', '48'),
('502', 'Thành phố Tam Kỳ', 'Thành phố', '49'),
('503', 'Thành phố Hội An', 'Thành phố', '49'),
('504', 'Huyện Tây Giang', 'Huyện', '49'),
('505', 'Huyện Đông Giang', 'Huyện', '49'),
('506', 'Huyện Đại Lộc', 'Huyện', '49'),
('507', 'Thị xã Điện Bàn', 'Thị xã', '49'),
('508', 'Huyện Duy Xuyên', 'Huyện', '49'),
('509', 'Huyện Quế Sơn', 'Huyện', '49'),
('510', 'Huyện Nam Giang', 'Huyện', '49'),
('511', 'Huyện Phước Sơn', 'Huyện', '49'),
('512', 'Huyện Hiệp Đức', 'Huyện', '49'),
('513', 'Huyện Thăng Bình', 'Huyện', '49'),
('514', 'Huyện Tiên Phước', 'Huyện', '49'),
('515', 'Huyện Bắc Trà My', 'Huyện', '49'),
('516', 'Huyện Nam Trà My', 'Huyện', '49'),
('517', 'Huyện Núi Thành', 'Huyện', '49'),
('518', 'Huyện Phú Ninh', 'Huyện', '49'),
('519', 'Huyện Nông Sơn', 'Huyện', '49'),
('522', 'Thành phố Quảng Ngãi', 'Thành phố', '51'),
('524', 'Huyện Bình Sơn', 'Huyện', '51'),
('525', 'Huyện Trà Bồng', 'Huyện', '51'),
('526', 'Huyện Tây Trà', 'Huyện', '51'),
('527', 'Huyện Sơn Tịnh', 'Huyện', '51'),
('528', 'Huyện Tư Nghĩa', 'Huyện', '51'),
('529', 'Huyện Sơn Hà', 'Huyện', '51'),
('530', 'Huyện Sơn Tây', 'Huyện', '51'),
('531', 'Huyện Minh Long', 'Huyện', '51'),
('532', 'Huyện Nghĩa Hành', 'Huyện', '51'),
('533', 'Huyện Mộ Đức', 'Huyện', '51'),
('534', 'Huyện Đức Phổ', 'Huyện', '51'),
('535', 'Huyện Ba Tơ', 'Huyện', '51'),
('536', 'Huyện Lý Sơn', 'Huyện', '51'),
('540', 'Thành phố Qui Nhơn', 'Thành phố', '52'),
('542', 'Huyện An Lão', 'Huyện', '52'),
('543', 'Huyện Hoài Nhơn', 'Huyện', '52'),
('544', 'Huyện Hoài Ân', 'Huyện', '52'),
('545', 'Huyện Phù Mỹ', 'Huyện', '52'),
('546', 'Huyện Vĩnh Thạnh', 'Huyện', '52'),
('547', 'Huyện Tây Sơn', 'Huyện', '52'),
('548', 'Huyện Phù Cát', 'Huyện', '52'),
('549', 'Thị xã An Nhơn', 'Thị xã', '52'),
('550', 'Huyện Tuy Phước', 'Huyện', '52'),
('551', 'Huyện Vân Canh', 'Huyện', '52'),
('555', 'Thành phố Tuy Hoà', 'Thành phố', '54'),
('557', 'Thị xã Sông Cầu', 'Thị xã', '54'),
('558', 'Huyện Đồng Xuân', 'Huyện', '54'),
('559', 'Huyện Tuy An', 'Huyện', '54'),
('560', 'Huyện Sơn Hòa', 'Huyện', '54'),
('561', 'Huyện Sông Hinh', 'Huyện', '54'),
('562', 'Huyện Tây Hoà', 'Huyện', '54'),
('563', 'Huyện Phú Hoà', 'Huyện', '54'),
('564', 'Huyện Đông Hòa', 'Huyện', '54'),
('568', 'Thành phố Nha Trang', 'Thành phố', '56'),
('569', 'Thành phố Cam Ranh', 'Thành phố', '56'),
('570', 'Huyện Cam Lâm', 'Huyện', '56'),
('571', 'Huyện Vạn Ninh', 'Huyện', '56'),
('572', 'Thị xã Ninh Hòa', 'Thị xã', '56'),
('573', 'Huyện Khánh Vĩnh', 'Huyện', '56'),
('574', 'Huyện Diên Khánh', 'Huyện', '56'),
('575', 'Huyện Khánh Sơn', 'Huyện', '56'),
('576', 'Huyện Trường Sa', 'Huyện', '56'),
('582', 'Thành phố Phan Rang-Tháp Chàm', 'Thành phố', '58'),
('584', 'Huyện Bác Ái', 'Huyện', '58'),
('585', 'Huyện Ninh Sơn', 'Huyện', '58'),
('586', 'Huyện Ninh Hải', 'Huyện', '58'),
('587', 'Huyện Ninh Phước', 'Huyện', '58'),
('588', 'Huyện Thuận Bắc', 'Huyện', '58'),
('589', 'Huyện Thuận Nam', 'Huyện', '58'),
('593', 'Thành phố Phan Thiết', 'Thành phố', '60'),
('594', 'Thị xã La Gi', 'Thị xã', '60'),
('595', 'Huyện Tuy Phong', 'Huyện', '60'),
('596', 'Huyện Bắc Bình', 'Huyện', '60'),
('597', 'Huyện Hàm Thuận Bắc', 'Huyện', '60'),
('598', 'Huyện Hàm Thuận Nam', 'Huyện', '60'),
('599', 'Huyện Tánh Linh', 'Huyện', '60'),
('600', 'Huyện Đức Linh', 'Huyện', '60'),
('601', 'Huyện Hàm Tân', 'Huyện', '60'),
('602', 'Huyện Phú Quí', 'Huyện', '60'),
('608', 'Thành phố Kon Tum', 'Thành phố', '62'),
('610', 'Huyện Đắk Glei', 'Huyện', '62'),
('611', 'Huyện Ngọc Hồi', 'Huyện', '62'),
('612', 'Huyện Đắk Tô', 'Huyện', '62'),
('613', 'Huyện Kon Plông', 'Huyện', '62'),
('614', 'Huyện Kon Rẫy', 'Huyện', '62'),
('615', 'Huyện Đắk Hà', 'Huyện', '62'),
('616', 'Huyện Sa Thầy', 'Huyện', '62'),
('617', 'Huyện Tu Mơ Rông', 'Huyện', '62'),
('618', 'Huyện Ia H\' Drai', 'Huyện', '62'),
('622', 'Thành phố Pleiku', 'Thành phố', '64'),
('623', 'Thị xã An Khê', 'Thị xã', '64'),
('624', 'Thị xã Ayun Pa', 'Thị xã', '64'),
('625', 'Huyện KBang', 'Huyện', '64'),
('626', 'Huyện Đăk Đoa', 'Huyện', '64'),
('627', 'Huyện Chư Păh', 'Huyện', '64'),
('628', 'Huyện Ia Grai', 'Huyện', '64'),
('629', 'Huyện Mang Yang', 'Huyện', '64'),
('630', 'Huyện Kông Chro', 'Huyện', '64'),
('631', 'Huyện Đức Cơ', 'Huyện', '64'),
('632', 'Huyện Chư Prông', 'Huyện', '64'),
('633', 'Huyện Chư Sê', 'Huyện', '64'),
('634', 'Huyện Đăk Pơ', 'Huyện', '64'),
('635', 'Huyện Ia Pa', 'Huyện', '64'),
('637', 'Huyện Krông Pa', 'Huyện', '64'),
('638', 'Huyện Phú Thiện', 'Huyện', '64'),
('639', 'Huyện Chư Pưh', 'Huyện', '64'),
('643', 'Thành phố Buôn Ma Thuột', 'Thành phố', '66'),
('644', 'Thị Xã Buôn Hồ', 'Thị xã', '66'),
('645', 'Huyện Ea H\'leo', 'Huyện', '66'),
('646', 'Huyện Ea Súp', 'Huyện', '66'),
('647', 'Huyện Buôn Đôn', 'Huyện', '66'),
('648', 'Huyện Cư M\'gar', 'Huyện', '66'),
('649', 'Huyện Krông Búk', 'Huyện', '66'),
('650', 'Huyện Krông Năng', 'Huyện', '66'),
('651', 'Huyện Ea Kar', 'Huyện', '66'),
('652', 'Huyện M\'Đrắk', 'Huyện', '66'),
('653', 'Huyện Krông Bông', 'Huyện', '66'),
('654', 'Huyện Krông Pắc', 'Huyện', '66'),
('655', 'Huyện Krông A Na', 'Huyện', '66'),
('656', 'Huyện Lắk', 'Huyện', '66'),
('657', 'Huyện Cư Kuin', 'Huyện', '66'),
('660', 'Thị xã Gia Nghĩa', 'Thị xã', '67'),
('661', 'Huyện Đăk Glong', 'Huyện', '67'),
('662', 'Huyện Cư Jút', 'Huyện', '67'),
('663', 'Huyện Đắk Mil', 'Huyện', '67'),
('664', 'Huyện Krông Nô', 'Huyện', '67'),
('665', 'Huyện Đắk Song', 'Huyện', '67'),
('666', 'Huyện Đắk R\'Lấp', 'Huyện', '67'),
('667', 'Huyện Tuy Đức', 'Huyện', '67'),
('672', 'Thành phố Đà Lạt', 'Thành phố', '68'),
('673', 'Thành phố Bảo Lộc', 'Thành phố', '68'),
('674', 'Huyện Đam Rông', 'Huyện', '68'),
('675', 'Huyện Lạc Dương', 'Huyện', '68'),
('676', 'Huyện Lâm Hà', 'Huyện', '68'),
('677', 'Huyện Đơn Dương', 'Huyện', '68'),
('678', 'Huyện Đức Trọng', 'Huyện', '68'),
('679', 'Huyện Di Linh', 'Huyện', '68'),
('680', 'Huyện Bảo Lâm', 'Huyện', '68'),
('681', 'Huyện Đạ Huoai', 'Huyện', '68'),
('682', 'Huyện Đạ Tẻh', 'Huyện', '68'),
('683', 'Huyện Cát Tiên', 'Huyện', '68'),
('688', 'Thị xã Phước Long', 'Thị xã', '70'),
('689', 'Thị xã Đồng Xoài', 'Thị xã', '70'),
('690', 'Thị xã Bình Long', 'Thị xã', '70'),
('691', 'Huyện Bù Gia Mập', 'Huyện', '70'),
('692', 'Huyện Lộc Ninh', 'Huyện', '70'),
('693', 'Huyện Bù Đốp', 'Huyện', '70'),
('694', 'Huyện Hớn Quản', 'Huyện', '70'),
('695', 'Huyện Đồng Phú', 'Huyện', '70'),
('696', 'Huyện Bù Đăng', 'Huyện', '70'),
('697', 'Huyện Chơn Thành', 'Huyện', '70'),
('698', 'Huyện Phú Riềng', 'Huyện', '70'),
('703', 'Thành phố Tây Ninh', 'Thành phố', '72'),
('705', 'Huyện Tân Biên', 'Huyện', '72'),
('706', 'Huyện Tân Châu', 'Huyện', '72'),
('707', 'Huyện Dương Minh Châu', 'Huyện', '72'),
('708', 'Huyện Châu Thành', 'Huyện', '72'),
('709', 'Huyện Hòa Thành', 'Huyện', '72'),
('710', 'Huyện Gò Dầu', 'Huyện', '72'),
('711', 'Huyện Bến Cầu', 'Huyện', '72'),
('712', 'Huyện Trảng Bàng', 'Huyện', '72'),
('718', 'Thành phố Thủ Dầu Một', 'Thành phố', '74'),
('719', 'Huyện Bàu Bàng', 'Huyện', '74'),
('720', 'Huyện Dầu Tiếng', 'Huyện', '74'),
('721', 'Thị xã Bến Cát', 'Thị xã', '74'),
('722', 'Huyện Phú Giáo', 'Huyện', '74'),
('723', 'Thị xã Tân Uyên', 'Thị xã', '74'),
('724', 'Thị xã Dĩ An', 'Thị xã', '74'),
('725', 'Thị xã Thuận An', 'Thị xã', '74'),
('726', 'Huyện Bắc Tân Uyên', 'Huyện', '74'),
('731', 'Thành phố Biên Hòa', 'Thành phố', '75'),
('732', 'Thị xã Long Khánh', 'Thị xã', '75'),
('734', 'Huyện Tân Phú', 'Huyện', '75'),
('735', 'Huyện Vĩnh Cửu', 'Huyện', '75'),
('736', 'Huyện Định Quán', 'Huyện', '75'),
('737', 'Huyện Trảng Bom', 'Huyện', '75'),
('738', 'Huyện Thống Nhất', 'Huyện', '75'),
('739', 'Huyện Cẩm Mỹ', 'Huyện', '75'),
('740', 'Huyện Long Thành', 'Huyện', '75'),
('741', 'Huyện Xuân Lộc', 'Huyện', '75'),
('742', 'Huyện Nhơn Trạch', 'Huyện', '75'),
('747', 'Thành phố Vũng Tàu', 'Thành phố', '77'),
('748', 'Thành phố Bà Rịa', 'Thành phố', '77'),
('750', 'Huyện Châu Đức', 'Huyện', '77'),
('751', 'Huyện Xuyên Mộc', 'Huyện', '77'),
('752', 'Huyện Long Điền', 'Huyện', '77'),
('753', 'Huyện Đất Đỏ', 'Huyện', '77'),
('754', 'Huyện Tân Thành', 'Huyện', '77'),
('755', 'Huyện Côn Đảo', 'Huyện', '77'),
('760', 'Quận 1', 'Quận', '79'),
('761', 'Quận 12', 'Quận', '79'),
('762', 'Quận Thủ Đức', 'Quận', '79'),
('763', 'Quận 9', 'Quận', '79'),
('764', 'Quận Gò Vấp', 'Quận', '79'),
('765', 'Quận Bình Thạnh', 'Quận', '79'),
('766', 'Quận Tân Bình', 'Quận', '79'),
('767', 'Quận Tân Phú', 'Quận', '79'),
('768', 'Quận Phú Nhuận', 'Quận', '79'),
('769', 'Quận 2', 'Quận', '79'),
('770', 'Quận 3', 'Quận', '79'),
('771', 'Quận 10', 'Quận', '79'),
('772', 'Quận 11', 'Quận', '79'),
('773', 'Quận 4', 'Quận', '79'),
('774', 'Quận 5', 'Quận', '79'),
('775', 'Quận 6', 'Quận', '79'),
('776', 'Quận 8', 'Quận', '79'),
('777', 'Quận Bình Tân', 'Quận', '79'),
('778', 'Quận 7', 'Quận', '79'),
('783', 'Huyện Củ Chi', 'Huyện', '79'),
('784', 'Huyện Hóc Môn', 'Huyện', '79'),
('785', 'Huyện Bình Chánh', 'Huyện', '79'),
('786', 'Huyện Nhà Bè', 'Huyện', '79'),
('787', 'Huyện Cần Giờ', 'Huyện', '79'),
('794', 'Thành phố Tân An', 'Thành phố', '80'),
('795', 'Thị xã Kiến Tường', 'Thị xã', '80'),
('796', 'Huyện Tân Hưng', 'Huyện', '80'),
('797', 'Huyện Vĩnh Hưng', 'Huyện', '80'),
('798', 'Huyện Mộc Hóa', 'Huyện', '80'),
('799', 'Huyện Tân Thạnh', 'Huyện', '80'),
('800', 'Huyện Thạnh Hóa', 'Huyện', '80'),
('801', 'Huyện Đức Huệ', 'Huyện', '80'),
('802', 'Huyện Đức Hòa', 'Huyện', '80'),
('803', 'Huyện Bến Lức', 'Huyện', '80'),
('804', 'Huyện Thủ Thừa', 'Huyện', '80'),
('805', 'Huyện Tân Trụ', 'Huyện', '80'),
('806', 'Huyện Cần Đước', 'Huyện', '80'),
('807', 'Huyện Cần Giuộc', 'Huyện', '80'),
('808', 'Huyện Châu Thành', 'Huyện', '80'),
('815', 'Thành phố Mỹ Tho', 'Thành phố', '82'),
('816', 'Thị xã Gò Công', 'Thị xã', '82'),
('817', 'Thị xã Cai Lậy', 'Huyện', '82'),
('818', 'Huyện Tân Phước', 'Huyện', '82'),
('819', 'Huyện Cái Bè', 'Huyện', '82'),
('820', 'Huyện Cai Lậy', 'Thị xã', '82'),
('821', 'Huyện Châu Thành', 'Huyện', '82'),
('822', 'Huyện Chợ Gạo', 'Huyện', '82'),
('823', 'Huyện Gò Công Tây', 'Huyện', '82'),
('824', 'Huyện Gò Công Đông', 'Huyện', '82'),
('825', 'Huyện Tân Phú Đông', 'Huyện', '82'),
('829', 'Thành phố Bến Tre', 'Thành phố', '83'),
('831', 'Huyện Châu Thành', 'Huyện', '83'),
('832', 'Huyện Chợ Lách', 'Huyện', '83'),
('833', 'Huyện Mỏ Cày Nam', 'Huyện', '83'),
('834', 'Huyện Giồng Trôm', 'Huyện', '83'),
('835', 'Huyện Bình Đại', 'Huyện', '83'),
('836', 'Huyện Ba Tri', 'Huyện', '83'),
('837', 'Huyện Thạnh Phú', 'Huyện', '83'),
('838', 'Huyện Mỏ Cày Bắc', 'Huyện', '83'),
('842', 'Thành phố Trà Vinh', 'Thành phố', '84'),
('844', 'Huyện Càng Long', 'Huyện', '84'),
('845', 'Huyện Cầu Kè', 'Huyện', '84'),
('846', 'Huyện Tiểu Cần', 'Huyện', '84'),
('847', 'Huyện Châu Thành', 'Huyện', '84'),
('848', 'Huyện Cầu Ngang', 'Huyện', '84'),
('849', 'Huyện Trà Cú', 'Huyện', '84'),
('850', 'Huyện Duyên Hải', 'Huyện', '84'),
('851', 'Thị xã Duyên Hải', 'Thị xã', '84'),
('855', 'Thành phố Vĩnh Long', 'Thành phố', '86'),
('857', 'Huyện Long Hồ', 'Huyện', '86'),
('858', 'Huyện Mang Thít', 'Huyện', '86'),
('859', 'Huyện  Vũng Liêm', 'Huyện', '86'),
('860', 'Huyện Tam Bình', 'Huyện', '86'),
('861', 'Thị xã Bình Minh', 'Thị xã', '86'),
('862', 'Huyện Trà Ôn', 'Huyện', '86'),
('863', 'Huyện Bình Tân', 'Huyện', '86'),
('866', 'Thành phố Cao Lãnh', 'Thành phố', '87'),
('867', 'Thành phố Sa Đéc', 'Thành phố', '87'),
('868', 'Thị xã Hồng Ngự', 'Thị xã', '87'),
('869', 'Huyện Tân Hồng', 'Huyện', '87'),
('870', 'Huyện Hồng Ngự', 'Huyện', '87'),
('871', 'Huyện Tam Nông', 'Huyện', '87'),
('872', 'Huyện Tháp Mười', 'Huyện', '87'),
('873', 'Huyện Cao Lãnh', 'Huyện', '87'),
('874', 'Huyện Thanh Bình', 'Huyện', '87'),
('875', 'Huyện Lấp Vò', 'Huyện', '87'),
('876', 'Huyện Lai Vung', 'Huyện', '87'),
('877', 'Huyện Châu Thành', 'Huyện', '87'),
('883', 'Thành phố Long Xuyên', 'Thành phố', '89'),
('884', 'Thành phố Châu Đốc', 'Thành phố', '89'),
('886', 'Huyện An Phú', 'Huyện', '89'),
('887', 'Thị xã Tân Châu', 'Thị xã', '89'),
('888', 'Huyện Phú Tân', 'Huyện', '89'),
('889', 'Huyện Châu Phú', 'Huyện', '89'),
('890', 'Huyện Tịnh Biên', 'Huyện', '89'),
('891', 'Huyện Tri Tôn', 'Huyện', '89'),
('892', 'Huyện Châu Thành', 'Huyện', '89'),
('893', 'Huyện Chợ Mới', 'Huyện', '89'),
('894', 'Huyện Thoại Sơn', 'Huyện', '89'),
('899', 'Thành phố Rạch Giá', 'Thành phố', '91'),
('900', 'Thị xã Hà Tiên', 'Thị xã', '91'),
('902', 'Huyện Kiên Lương', 'Huyện', '91'),
('903', 'Huyện Hòn Đất', 'Huyện', '91'),
('904', 'Huyện Tân Hiệp', 'Huyện', '91'),
('905', 'Huyện Châu Thành', 'Huyện', '91'),
('906', 'Huyện Giồng Riềng', 'Huyện', '91'),
('907', 'Huyện Gò Quao', 'Huyện', '91'),
('908', 'Huyện An Biên', 'Huyện', '91'),
('909', 'Huyện An Minh', 'Huyện', '91'),
('910', 'Huyện Vĩnh Thuận', 'Huyện', '91'),
('911', 'Huyện Phú Quốc', 'Huyện', '91'),
('912', 'Huyện Kiên Hải', 'Huyện', '91'),
('913', 'Huyện U Minh Thượng', 'Huyện', '91'),
('914', 'Huyện Giang Thành', 'Huyện', '91'),
('916', 'Quận Ninh Kiều', 'Quận', '92'),
('917', 'Quận Ô Môn', 'Quận', '92'),
('918', 'Quận Bình Thuỷ', 'Quận', '92'),
('919', 'Quận Cái Răng', 'Quận', '92'),
('923', 'Quận Thốt Nốt', 'Quận', '92'),
('924', 'Huyện Vĩnh Thạnh', 'Huyện', '92'),
('925', 'Huyện Cờ Đỏ', 'Huyện', '92'),
('926', 'Huyện Phong Điền', 'Huyện', '92'),
('927', 'Huyện Thới Lai', 'Huyện', '92'),
('930', 'Thành phố Vị Thanh', 'Thành phố', '93'),
('931', 'Thị xã Ngã Bảy', 'Thị xã', '93'),
('932', 'Huyện Châu Thành A', 'Huyện', '93'),
('933', 'Huyện Châu Thành', 'Huyện', '93'),
('934', 'Huyện Phụng Hiệp', 'Huyện', '93'),
('935', 'Huyện Vị Thuỷ', 'Huyện', '93'),
('936', 'Huyện Long Mỹ', 'Huyện', '93'),
('937', 'Thị xã Long Mỹ', 'Thị xã', '93'),
('941', 'Thành phố Sóc Trăng', 'Thành phố', '94'),
('942', 'Huyện Châu Thành', 'Huyện', '94'),
('943', 'Huyện Kế Sách', 'Huyện', '94'),
('944', 'Huyện Mỹ Tú', 'Huyện', '94'),
('945', 'Huyện Cù Lao Dung', 'Huyện', '94'),
('946', 'Huyện Long Phú', 'Huyện', '94'),
('947', 'Huyện Mỹ Xuyên', 'Huyện', '94'),
('948', 'Thị xã Ngã Năm', 'Thị xã', '94'),
('949', 'Huyện Thạnh Trị', 'Huyện', '94'),
('950', 'Thị xã Vĩnh Châu', 'Thị xã', '94'),
('951', 'Huyện Trần Đề', 'Huyện', '94'),
('954', 'Thành phố Bạc Liêu', 'Thành phố', '95'),
('956', 'Huyện Hồng Dân', 'Huyện', '95'),
('957', 'Huyện Phước Long', 'Huyện', '95'),
('958', 'Huyện Vĩnh Lợi', 'Huyện', '95'),
('959', 'Thị xã Giá Rai', 'Thị xã', '95'),
('960', 'Huyện Đông Hải', 'Huyện', '95'),
('961', 'Huyện Hoà Bình', 'Huyện', '95'),
('964', 'Thành phố Cà Mau', 'Thành phố', '96'),
('966', 'Huyện U Minh', 'Huyện', '96'),
('967', 'Huyện Thới Bình', 'Huyện', '96'),
('968', 'Huyện Trần Văn Thời', 'Huyện', '96'),
('969', 'Huyện Cái Nước', 'Huyện', '96'),
('970', 'Huyện Đầm Dơi', 'Huyện', '96'),
('971', 'Huyện Năm Căn', 'Huyện', '96'),
('972', 'Huyện Phú Tân', 'Huyện', '96'),
('973', 'Huyện Ngọc Hiển', 'Huyện', '96');

-- --------------------------------------------------------

--
-- Table structure for table `devvn_tinhthanhpho`
--

CREATE TABLE `devvn_tinhthanhpho` (
  `matp` varchar(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `devvn_tinhthanhpho`
--

INSERT INTO `devvn_tinhthanhpho` (`matp`, `name`, `type`) VALUES
('01', 'Thành phố Hà Nội', 'Thành phố Trung ương'),
('02', 'Tỉnh Hà Giang', 'Tỉnh'),
('04', 'Tỉnh Cao Bằng', 'Tỉnh'),
('06', 'Tỉnh Bắc Kạn', 'Tỉnh'),
('08', 'Tỉnh Tuyên Quang', 'Tỉnh'),
('10', 'Tỉnh Lào Cai', 'Tỉnh'),
('11', 'Tỉnh Điện Biên', 'Tỉnh'),
('12', 'Tỉnh Lai Châu', 'Tỉnh'),
('14', 'Tỉnh Sơn La', 'Tỉnh'),
('15', 'Tỉnh Yên Bái', 'Tỉnh'),
('17', 'Tỉnh Hoà Bình', 'Tỉnh'),
('19', 'Tỉnh Thái Nguyên', 'Tỉnh'),
('20', 'Tỉnh Lạng Sơn', 'Tỉnh'),
('22', 'Tỉnh Quảng Ninh', 'Tỉnh'),
('24', 'Tỉnh Bắc Giang', 'Tỉnh'),
('25', 'Tỉnh Phú Thọ', 'Tỉnh'),
('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
('27', 'Tỉnh Bắc Ninh', 'Tỉnh'),
('30', 'Tỉnh Hải Dương', 'Tỉnh'),
('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
('33', 'Tỉnh Hưng Yên', 'Tỉnh'),
('34', 'Tỉnh Thái Bình', 'Tỉnh'),
('35', 'Tỉnh Hà Nam', 'Tỉnh'),
('36', 'Tỉnh Nam Định', 'Tỉnh'),
('37', 'Tỉnh Ninh Bình', 'Tỉnh'),
('38', 'Tỉnh Thanh Hóa', 'Tỉnh'),
('40', 'Tỉnh Nghệ An', 'Tỉnh'),
('42', 'Tỉnh Hà Tĩnh', 'Tỉnh'),
('44', 'Tỉnh Quảng Bình', 'Tỉnh'),
('45', 'Tỉnh Quảng Trị', 'Tỉnh'),
('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
('49', 'Tỉnh Quảng Nam', 'Tỉnh'),
('51', 'Tỉnh Quảng Ngãi', 'Tỉnh'),
('52', 'Tỉnh Bình Định', 'Tỉnh'),
('54', 'Tỉnh Phú Yên', 'Tỉnh'),
('56', 'Tỉnh Khánh Hòa', 'Tỉnh'),
('58', 'Tỉnh Ninh Thuận', 'Tỉnh'),
('60', 'Tỉnh Bình Thuận', 'Tỉnh'),
('62', 'Tỉnh Kon Tum', 'Tỉnh'),
('64', 'Tỉnh Gia Lai', 'Tỉnh'),
('66', 'Tỉnh Đắk Lắk', 'Tỉnh'),
('67', 'Tỉnh Đắk Nông', 'Tỉnh'),
('68', 'Tỉnh Lâm Đồng', 'Tỉnh'),
('70', 'Tỉnh Bình Phước', 'Tỉnh'),
('72', 'Tỉnh Tây Ninh', 'Tỉnh'),
('74', 'Tỉnh Bình Dương', 'Tỉnh'),
('75', 'Tỉnh Đồng Nai', 'Tỉnh'),
('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
('80', 'Tỉnh Long An', 'Tỉnh'),
('82', 'Tỉnh Tiền Giang', 'Tỉnh'),
('83', 'Tỉnh Bến Tre', 'Tỉnh'),
('84', 'Tỉnh Trà Vinh', 'Tỉnh'),
('86', 'Tỉnh Vĩnh Long', 'Tỉnh'),
('87', 'Tỉnh Đồng Tháp', 'Tỉnh'),
('89', 'Tỉnh An Giang', 'Tỉnh'),
('91', 'Tỉnh Kiên Giang', 'Tỉnh'),
('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
('93', 'Tỉnh Hậu Giang', 'Tỉnh'),
('94', 'Tỉnh Sóc Trăng', 'Tỉnh'),
('95', 'Tỉnh Bạc Liêu', 'Tỉnh'),
('96', 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Table structure for table `devvn_xaphuongthitran`
--

CREATE TABLE `devvn_xaphuongthitran` (
  `xaid` varchar(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `maqh` varchar(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devvn_xaphuongthitran`
--

INSERT INTO `devvn_xaphuongthitran` (`xaid`, `name`, `type`, `maqh`) VALUES
('00001', 'Phường Phúc Xá', 'Phường', '001'),
('00004', 'Phường Trúc Bạch', 'Phường', '001'),
('00006', 'Phường Vĩnh Phúc', 'Phường', '001'),
('00007', 'Phường Cống Vị', 'Phường', '001'),
('00008', 'Phường Liễu Giai', 'Phường', '001'),
('00010', 'Phường Nguyễn Trung Trực', 'Phường', '001'),
('00013', 'Phường Quán Thánh', 'Phường', '001'),
('00016', 'Phường Ngọc Hà', 'Phường', '001'),
('00019', 'Phường Điện Biên', 'Phường', '001'),
('00022', 'Phường Đội Cấn', 'Phường', '001'),
('00025', 'Phường Ngọc Khánh', 'Phường', '001'),
('00028', 'Phường Kim Mã', 'Phường', '001'),
('00031', 'Phường Giảng Võ', 'Phường', '001'),
('00034', 'Phường Thành Công', 'Phường', '001'),
('00037', 'Phường Phúc Tân', 'Phường', '002'),
('00040', 'Phường Đồng Xuân', 'Phường', '002'),
('00043', 'Phường Hàng Mã', 'Phường', '002'),
('00046', 'Phường Hàng Buồm', 'Phường', '002'),
('00049', 'Phường Hàng Đào', 'Phường', '002'),
('00052', 'Phường Hàng Bồ', 'Phường', '002'),
('00055', 'Phường Cửa Đông', 'Phường', '002'),
('00058', 'Phường Lý Thái Tổ', 'Phường', '002'),
('00061', 'Phường Hàng Bạc', 'Phường', '002'),
('00064', 'Phường Hàng Gai', 'Phường', '002'),
('00067', 'Phường Chương Dương Độ', 'Phường', '002'),
('00070', 'Phường Hàng Trống', 'Phường', '002'),
('00073', 'Phường Cửa Nam', 'Phường', '002'),
('00076', 'Phường Hàng Bông', 'Phường', '002'),
('00079', 'Phường Tràng Tiền', 'Phường', '002'),
('00082', 'Phường Trần Hưng Đạo', 'Phường', '002'),
('00085', 'Phường Phan Chu Trinh', 'Phường', '002'),
('00088', 'Phường Hàng Bài', 'Phường', '002'),
('00091', 'Phường Phú Thượng', 'Phường', '003'),
('00094', 'Phường Nhật Tân', 'Phường', '003'),
('00097', 'Phường Tứ Liên', 'Phường', '003'),
('00100', 'Phường Quảng An', 'Phường', '003'),
('00103', 'Phường Xuân La', 'Phường', '003'),
('00106', 'Phường Yên Phụ', 'Phường', '003'),
('00109', 'Phường Bưởi', 'Phường', '003'),
('00112', 'Phường Thụy Khuê', 'Phường', '003'),
('00115', 'Phường Thượng Thanh', 'Phường', '004'),
('00118', 'Phường Ngọc Thụy', 'Phường', '004'),
('00121', 'Phường Giang Biên', 'Phường', '004'),
('00124', 'Phường Đức Giang', 'Phường', '004'),
('00127', 'Phường Việt Hưng', 'Phường', '004'),
('00130', 'Phường Gia Thụy', 'Phường', '004'),
('00133', 'Phường Ngọc Lâm', 'Phường', '004'),
('00136', 'Phường Phúc Lợi', 'Phường', '004'),
('00139', 'Phường Bồ Đề', 'Phường', '004'),
('00142', 'Phường Sài Đồng', 'Phường', '004'),
('00145', 'Phường Long Biên', 'Phường', '004'),
('00148', 'Phường Thạch Bàn', 'Phường', '004'),
('00151', 'Phường Phúc Đồng', 'Phường', '004'),
('00154', 'Phường Cự Khối', 'Phường', '004'),
('00157', 'Phường Nghĩa Đô', 'Phường', '005'),
('00160', 'Phường Nghĩa Tân', 'Phường', '005'),
('00163', 'Phường Mai Dịch', 'Phường', '005'),
('00166', 'Phường Dịch Vọng', 'Phường', '005'),
('00167', 'Phường Dịch Vọng Hậu', 'Phường', '005'),
('00169', 'Phường Quan Hoa', 'Phường', '005'),
('00172', 'Phường Yên Hoà', 'Phường', '005'),
('00175', 'Phường Trung Hoà', 'Phường', '005'),
('00178', 'Phường Cát Linh', 'Phường', '006'),
('00181', 'Phường Văn Miếu', 'Phường', '006'),
('00184', 'Phường Quốc Tử Giám', 'Phường', '006'),
('00187', 'Phường Láng Thượng', 'Phường', '006'),
('00190', 'Phường Ô Chợ Dừa', 'Phường', '006'),
('00193', 'Phường Văn Chương', 'Phường', '006'),
('00196', 'Phường Hàng Bột', 'Phường', '006'),
('00199', 'Phường Láng Hạ', 'Phường', '006'),
('00202', 'Phường Khâm Thiên', 'Phường', '006'),
('00205', 'Phường Thổ Quan', 'Phường', '006'),
('00208', 'Phường Nam Đồng', 'Phường', '006'),
('00211', 'Phường Trung Phụng', 'Phường', '006'),
('00214', 'Phường Quang Trung', 'Phường', '006'),
('00217', 'Phường Trung Liệt', 'Phường', '006'),
('00220', 'Phường Phương Liên', 'Phường', '006'),
('00223', 'Phường Thịnh Quang', 'Phường', '006'),
('00226', 'Phường Trung Tự', 'Phường', '006'),
('00229', 'Phường Kim Liên', 'Phường', '006'),
('00232', 'Phường Phương Mai', 'Phường', '006'),
('00235', 'Phường Ngã Tư Sở', 'Phường', '006'),
('00238', 'Phường Khương Thượng', 'Phường', '006'),
('00241', 'Phường Nguyễn Du', 'Phường', '007'),
('00244', 'Phường Bạch Đằng', 'Phường', '007'),
('00247', 'Phường Phạm Đình Hổ', 'Phường', '007'),
('00250', 'Phường Bùi Thị Xuân', 'Phường', '007'),
('00253', 'Phường Ngô Thì Nhậm', 'Phường', '007'),
('00256', 'Phường Lê Đại Hành', 'Phường', '007'),
('00259', 'Phường Đồng Nhân', 'Phường', '007'),
('00262', 'Phường Phố Huế', 'Phường', '007'),
('00265', 'Phường Đống Mác', 'Phường', '007'),
('00268', 'Phường Thanh Lương', 'Phường', '007'),
('00271', 'Phường Thanh Nhàn', 'Phường', '007'),
('00274', 'Phường Cầu Dền', 'Phường', '007'),
('00277', 'Phường Bách Khoa', 'Phường', '007'),
('00280', 'Phường Đồng Tâm', 'Phường', '007'),
('00283', 'Phường Vĩnh Tuy', 'Phường', '007'),
('00286', 'Phường Bạch Mai', 'Phường', '007'),
('00289', 'Phường Quỳnh Mai', 'Phường', '007'),
('00292', 'Phường Quỳnh Lôi', 'Phường', '007'),
('00295', 'Phường Minh Khai', 'Phường', '007'),
('00298', 'Phường Trương Định', 'Phường', '007'),
('00301', 'Phường Thanh Trì', 'Phường', '008'),
('00304', 'Phường Vĩnh Hưng', 'Phường', '008'),
('00307', 'Phường Định Công', 'Phường', '008'),
('00310', 'Phường Mai Động', 'Phường', '008'),
('00313', 'Phường Tương Mai', 'Phường', '008'),
('00316', 'Phường Đại Kim', 'Phường', '008'),
('00319', 'Phường Tân Mai', 'Phường', '008'),
('00322', 'Phường Hoàng Văn Thụ', 'Phường', '008'),
('00325', 'Phường Giáp Bát', 'Phường', '008'),
('00328', 'Phường Lĩnh Nam', 'Phường', '008'),
('00331', 'Phường Thịnh Liệt', 'Phường', '008'),
('00334', 'Phường Trần Phú', 'Phường', '008'),
('00337', 'Phường Hoàng Liệt', 'Phường', '008'),
('00340', 'Phường Yên Sở', 'Phường', '008'),
('00343', 'Phường Nhân Chính', 'Phường', '009'),
('00346', 'Phường Thượng Đình', 'Phường', '009'),
('00349', 'Phường Khương Trung', 'Phường', '009'),
('00352', 'Phường Khương Mai', 'Phường', '009'),
('00355', 'Phường Thanh Xuân Trung', 'Phường', '009'),
('00358', 'Phường Phương Liệt', 'Phường', '009'),
('00361', 'Phường Hạ Đình', 'Phường', '009'),
('00364', 'Phường Khương Đình', 'Phường', '009'),
('00367', 'Phường Thanh Xuân Bắc', 'Phường', '009'),
('00370', 'Phường Thanh Xuân Nam', 'Phường', '009'),
('00373', 'Phường Kim Giang', 'Phường', '009'),
('00376', 'Thị trấn Sóc Sơn', 'Thị trấn', '016'),
('00379', 'Xã Bắc Sơn', 'Xã', '016'),
('00382', 'Xã Minh Trí', 'Xã', '016'),
('00385', 'Xã Hồng Kỳ', 'Xã', '016'),
('00388', 'Xã Nam Sơn', 'Xã', '016'),
('00391', 'Xã Trung Giã', 'Xã', '016'),
('00394', 'Xã Tân Hưng', 'Xã', '016'),
('00397', 'Xã Minh Phú', 'Xã', '016'),
('00400', 'Xã Phù Linh', 'Xã', '016'),
('00403', 'Xã Bắc Phú', 'Xã', '016'),
('00406', 'Xã Tân Minh', 'Xã', '016'),
('00409', 'Xã Quang Tiến', 'Xã', '016'),
('00412', 'Xã Hiền Ninh', 'Xã', '016'),
('00415', 'Xã Tân Dân', 'Xã', '016'),
('00418', 'Xã Tiên Dược', 'Xã', '016'),
('00421', 'Xã Việt Long', 'Xã', '016'),
('00424', 'Xã Xuân Giang', 'Xã', '016'),
('00427', 'Xã Mai Đình', 'Xã', '016'),
('00430', 'Xã Đức Hoà', 'Xã', '016'),
('00433', 'Xã Thanh Xuân', 'Xã', '016'),
('00436', 'Xã Đông Xuân', 'Xã', '016'),
('00439', 'Xã Kim Lũ', 'Xã', '016'),
('00442', 'Xã Phú Cường', 'Xã', '016'),
('00445', 'Xã Phú Minh', 'Xã', '016'),
('00448', 'Xã Phù Lỗ', 'Xã', '016'),
('00451', 'Xã Xuân Thu', 'Xã', '016'),
('00454', 'Thị trấn Đông Anh', 'Thị trấn', '017'),
('00457', 'Xã Xuân Nộn', 'Xã', '017'),
('00460', 'Xã Thuỵ Lâm', 'Xã', '017'),
('00463', 'Xã Bắc Hồng', 'Xã', '017'),
('00466', 'Xã Nguyên Khê', 'Xã', '017'),
('00469', 'Xã Nam Hồng', 'Xã', '017'),
('00472', 'Xã Tiên Dương', 'Xã', '017'),
('00475', 'Xã Vân Hà', 'Xã', '017'),
('00478', 'Xã Uy Nỗ', 'Xã', '017'),
('00481', 'Xã Vân Nội', 'Xã', '017'),
('00484', 'Xã Liên Hà', 'Xã', '017'),
('00487', 'Xã Việt Hùng', 'Xã', '017'),
('00490', 'Xã Kim Nỗ', 'Xã', '017'),
('00493', 'Xã Kim Chung', 'Xã', '017'),
('00496', 'Xã Dục Tú', 'Xã', '017'),
('00499', 'Xã Đại Mạch', 'Xã', '017'),
('00502', 'Xã Vĩnh Ngọc', 'Xã', '017'),
('00505', 'Xã Cổ Loa', 'Xã', '017'),
('00508', 'Xã Hải Bối', 'Xã', '017'),
('00511', 'Xã Xuân Canh', 'Xã', '017'),
('00514', 'Xã Võng La', 'Xã', '017'),
('00517', 'Xã Tầm Xá', 'Xã', '017'),
('00520', 'Xã Mai Lâm', 'Xã', '017'),
('00523', 'Xã Đông Hội', 'Xã', '017'),
('00526', 'Thị trấn Yên Viên', 'Thị trấn', '018'),
('00529', 'Xã Yên Thường', 'Xã', '018'),
('00532', 'Xã Yên Viên', 'Xã', '018'),
('00535', 'Xã Ninh Hiệp', 'Xã', '018'),
('00538', 'Xã Đình Xuyên', 'Xã', '018'),
('00541', 'Xã Dương Hà', 'Xã', '018'),
('00544', 'Xã Phù Đổng', 'Xã', '018'),
('00547', 'Xã Trung Mầu', 'Xã', '018'),
('00550', 'Xã Lệ Chi', 'Xã', '018'),
('00553', 'Xã Cổ Bi', 'Xã', '018'),
('00556', 'Xã Đặng Xá', 'Xã', '018'),
('00559', 'Xã Phú Thị', 'Xã', '018'),
('00562', 'Xã Kim Sơn', 'Xã', '018'),
('00565', 'Thị trấn Trâu Quỳ', 'Thị trấn', '018'),
('00568', 'Xã Dương Quang', 'Xã', '018'),
('00571', 'Xã Dương Xá', 'Xã', '018'),
('00574', 'Xã Đông Dư', 'Xã', '018'),
('00577', 'Xã Đa Tốn', 'Xã', '018'),
('00580', 'Xã Kiêu Kỵ', 'Xã', '018'),
('00583', 'Xã Bát Tràng', 'Xã', '018'),
('00586', 'Xã Kim Lan', 'Xã', '018'),
('00589', 'Xã Văn Đức', 'Xã', '018'),
('00592', 'Phường Cầu Diễn', 'Phường', '019'),
('00595', 'Phường Thượng Cát', 'Phường', '021'),
('00598', 'Phường Liên Mạc', 'Phường', '021'),
('00601', 'Phường Đông Ngạc', 'Phường', '021'),
('00602', 'Phường Đức Thắng', 'Phường', '021'),
('00604', 'Phường Thụy Phương', 'Phường', '021'),
('00607', 'Phường Tây Tựu', 'Phường', '021'),
('00610', 'Phường Xuân Đỉnh', 'Phường', '021'),
('00611', 'Phường Xuân Tảo', 'Phường', '021'),
('00613', 'Phường Minh Khai', 'Phường', '021'),
('00616', 'Phường Cổ Nhuế 1', 'Phường', '021'),
('00617', 'Phường Cổ Nhuế 2', 'Phường', '021'),
('00619', 'Phường Phú Diễn', 'Phường', '021'),
('00620', 'Phường Phúc Diễn', 'Phường', '021'),
('00622', 'Phường Xuân Phương', 'Phường', '019'),
('00623', 'Phường Phương Canh', 'Phường', '019'),
('00625', 'Phường Mỹ Đình 1', 'Phường', '019'),
('00626', 'Phường Mỹ Đình 2', 'Phường', '019'),
('00628', 'Phường Tây Mỗ', 'Phường', '019'),
('00631', 'Phường Mễ Trì', 'Phường', '019'),
('00632', 'Phường Phú Đô', 'Phường', '019'),
('00634', 'Phường Đại Mỗ', 'Phường', '019'),
('00637', 'Phường Trung Văn', 'Phường', '019'),
('00640', 'Thị trấn Văn Điển', 'Thị trấn', '020'),
('00643', 'Xã Tân Triều', 'Xã', '020'),
('00646', 'Xã Thanh Liệt', 'Xã', '020'),
('00649', 'Xã Tả Thanh Oai', 'Xã', '020'),
('00652', 'Xã Hữu Hoà', 'Xã', '020'),
('00655', 'Xã Tam Hiệp', 'Xã', '020'),
('00658', 'Xã Tứ Hiệp', 'Xã', '020'),
('00661', 'Xã Yên Mỹ', 'Xã', '020'),
('00664', 'Xã Vĩnh Quỳnh', 'Xã', '020'),
('00667', 'Xã Ngũ Hiệp', 'Xã', '020'),
('00670', 'Xã Duyên Hà', 'Xã', '020'),
('00673', 'Xã Ngọc Hồi', 'Xã', '020'),
('00676', 'Xã Vạn Phúc', 'Xã', '020'),
('00679', 'Xã Đại áng', 'Xã', '020'),
('00682', 'Xã Liên Ninh', 'Xã', '020'),
('00685', 'Xã Đông Mỹ', 'Xã', '020'),
('00688', 'Phường Quang Trung', 'Phường', '024'),
('00691', 'Phường Trần Phú', 'Phường', '024'),
('00692', 'Phường Ngọc Hà', 'Phường', '024'),
('00694', 'Phường Nguyễn Trãi', 'Phường', '024'),
('00697', 'Phường Minh Khai', 'Phường', '024'),
('00700', 'Xã Ngọc Đường', 'Xã', '024'),
('00703', 'Xã Kim Thạch', 'Xã', '030'),
('00706', 'Xã Phú Linh', 'Xã', '030'),
('00709', 'Xã Kim Linh', 'Xã', '030'),
('00712', 'Thị trấn Phó Bảng', 'Thị trấn', '026'),
('00715', 'Xã Lũng Cú', 'Xã', '026'),
('00718', 'Xã Má Lé', 'Xã', '026'),
('00721', 'Thị trấn Đồng Văn', 'Thị trấn', '026'),
('00724', 'Xã Lũng Táo', 'Xã', '026'),
('00727', 'Xã Phố Là', 'Xã', '026'),
('00730', 'Xã Thài Phìn Tủng', 'Xã', '026'),
('00733', 'Xã Sủng Là', 'Xã', '026'),
('00736', 'Xã Xà Phìn', 'Xã', '026'),
('00739', 'Xã Tả Phìn', 'Xã', '026'),
('00742', 'Xã Tả Lủng', 'Xã', '026'),
('00745', 'Xã Phố Cáo', 'Xã', '026'),
('00748', 'Xã Sính Lủng', 'Xã', '026'),
('00751', 'Xã Sảng Tủng', 'Xã', '026'),
('00754', 'Xã Lũng Thầu', 'Xã', '026'),
('00757', 'Xã Hố Quáng Phìn', 'Xã', '026'),
('00760', 'Xã Vần Chải', 'Xã', '026'),
('00763', 'Xã Lũng Phìn', 'Xã', '026'),
('00766', 'Xã Sủng Trái', 'Xã', '026'),
('00769', 'Thị trấn Mèo Vạc', 'Thị trấn', '027'),
('00772', 'Xã Thượng Phùng', 'Xã', '027'),
('00775', 'Xã Pải Lủng', 'Xã', '027'),
('00778', 'Xã Xín Cái', 'Xã', '027'),
('00781', 'Xã Pả Vi', 'Xã', '027'),
('00784', 'Xã Giàng Chu Phìn', 'Xã', '027'),
('00787', 'Xã Sủng Trà', 'Xã', '027'),
('00790', 'Xã Sủng Máng', 'Xã', '027'),
('00793', 'Xã Sơn Vĩ', 'Xã', '027'),
('00796', 'Xã Tả Lủng', 'Xã', '027'),
('00799', 'Xã Cán Chu Phìn', 'Xã', '027'),
('00802', 'Xã Lũng Pù', 'Xã', '027'),
('00805', 'Xã Lũng Chinh', 'Xã', '027'),
('00808', 'Xã Tát Ngà', 'Xã', '027'),
('00811', 'Xã Nậm Ban', 'Xã', '027'),
('00814', 'Xã Khâu Vai', 'Xã', '027'),
('00815', 'Xã Niêm Tòng', 'Xã', '027'),
('00817', 'Xã Niêm Sơn', 'Xã', '027'),
('00820', 'Thị trấn Yên Minh', 'Thị trấn', '028'),
('00823', 'Xã Thắng Mố', 'Xã', '028'),
('00826', 'Xã Phú Lũng', 'Xã', '028'),
('00829', 'Xã Sủng Tráng', 'Xã', '028'),
('00832', 'Xã Bạch Đích', 'Xã', '028'),
('00835', 'Xã Na Khê', 'Xã', '028'),
('00838', 'Xã Sủng Thài', 'Xã', '028'),
('00841', 'Xã Hữu Vinh', 'Xã', '028'),
('00844', 'Xã Lao Và Chải', 'Xã', '028'),
('00847', 'Xã Mậu Duệ', 'Xã', '028'),
('00850', 'Xã Đông Minh', 'Xã', '028'),
('00853', 'Xã Mậu Long', 'Xã', '028'),
('00856', 'Xã Ngam La', 'Xã', '028'),
('00859', 'Xã Ngọc Long', 'Xã', '028'),
('00862', 'Xã Đường Thượng', 'Xã', '028'),
('00865', 'Xã Lũng Hồ', 'Xã', '028'),
('00868', 'Xã Du Tiến', 'Xã', '028'),
('00871', 'Xã Du Già', 'Xã', '028'),
('00874', 'Thị trấn Tam Sơn', 'Thị trấn', '029'),
('00877', 'Xã Bát Đại Sơn', 'Xã', '029'),
('00880', 'Xã Nghĩa Thuận', 'Xã', '029'),
('00883', 'Xã Cán Tỷ', 'Xã', '029'),
('00886', 'Xã Cao Mã Pờ', 'Xã', '029'),
('00889', 'Xã Thanh Vân', 'Xã', '029'),
('00892', 'Xã Tùng Vài', 'Xã', '029'),
('00895', 'Xã Đông Hà', 'Xã', '029'),
('00898', 'Xã Quản Bạ', 'Xã', '029'),
('00901', 'Xã Lùng Tám', 'Xã', '029'),
('00904', 'Xã Quyết Tiến', 'Xã', '029'),
('00907', 'Xã Tả Ván', 'Xã', '029'),
('00910', 'Xã Thái An', 'Xã', '029'),
('00913', 'Thị trấn Vị Xuyên', 'Thị trấn', '030'),
('00916', 'Thị trấn Nông Trường Việt Lâm', 'Thị trấn', '030'),
('00919', 'Xã Minh Tân', 'Xã', '030'),
('00922', 'Xã Thuận Hoà', 'Xã', '030'),
('00925', 'Xã Tùng Bá', 'Xã', '030'),
('00928', 'Xã Thanh Thủy', 'Xã', '030'),
('00931', 'Xã Thanh Đức', 'Xã', '030'),
('00934', 'Xã Phong Quang', 'Xã', '030'),
('00937', 'Xã Xín Chải', 'Xã', '030'),
('00940', 'Xã Phương Tiến', 'Xã', '030'),
('00943', 'Xã Lao Chải', 'Xã', '030'),
('00946', 'Xã Phương Độ', 'Xã', '024'),
('00949', 'Xã Phương Thiện', 'Xã', '024'),
('00952', 'Xã Cao Bồ', 'Xã', '030'),
('00955', 'Xã Đạo Đức', 'Xã', '030'),
('00958', 'Xã Thượng Sơn', 'Xã', '030'),
('00961', 'Xã Linh Hồ', 'Xã', '030'),
('00964', 'Xã Quảng Ngần', 'Xã', '030'),
('00967', 'Xã Việt Lâm', 'Xã', '030'),
('00970', 'Xã Ngọc Linh', 'Xã', '030'),
('00973', 'Xã Ngọc Minh', 'Xã', '030'),
('00976', 'Xã Bạch Ngọc', 'Xã', '030'),
('00979', 'Xã Trung Thành', 'Xã', '030'),
('00982', 'Xã Minh Sơn', 'Xã', '031'),
('00985', 'Xã Giáp Trung', 'Xã', '031'),
('00988', 'Xã Yên Định', 'Xã', '031'),
('00991', 'Thị trấn Yên Phú', 'Thị trấn', '031'),
('00994', 'Xã Minh Ngọc', 'Xã', '031'),
('00997', 'Xã Yên Phong', 'Xã', '031'),
('01000', 'Xã Lạc Nông', 'Xã', '031'),
('01003', 'Xã Phú Nam', 'Xã', '031'),
('01006', 'Xã Yên Cường', 'Xã', '031'),
('01009', 'Xã Thượng Tân', 'Xã', '031'),
('01012', 'Xã Đường Âm', 'Xã', '031'),
('01015', 'Xã Đường Hồng', 'Xã', '031'),
('01018', 'Xã Phiêng Luông', 'Xã', '031'),
('01021', 'Thị trấn Vinh Quang', 'Thị trấn', '032'),
('01024', 'Xã Bản Máy', 'Xã', '032'),
('01027', 'Xã Thàng Tín', 'Xã', '032'),
('01030', 'Xã Thèn Chu Phìn', 'Xã', '032'),
('01033', 'Xã Pố Lồ', 'Xã', '032'),
('01036', 'Xã Bản Phùng', 'Xã', '032'),
('01039', 'Xã Túng Sán', 'Xã', '032'),
('01042', 'Xã Chiến Phố', 'Xã', '032'),
('01045', 'Xã Đản Ván', 'Xã', '032'),
('01048', 'Xã Tụ Nhân', 'Xã', '032'),
('01051', 'Xã Tân Tiến', 'Xã', '032'),
('01054', 'Xã Nàng Đôn', 'Xã', '032'),
('01057', 'Xã Pờ Ly Ngài', 'Xã', '032'),
('01060', 'Xã Sán Xả Hồ', 'Xã', '032'),
('01063', 'Xã Bản Luốc', 'Xã', '032'),
('01066', 'Xã Ngàm Đăng Vài', 'Xã', '032'),
('01069', 'Xã Bản Nhùng', 'Xã', '032'),
('01072', 'Xã Tả Sử Choóng', 'Xã', '032'),
('01075', 'Xã Nậm Dịch', 'Xã', '032'),
('01078', 'Xã Bản Péo', 'Xã', '032'),
('01081', 'Xã Hồ Thầu', 'Xã', '032'),
('01084', 'Xã Nam Sơn', 'Xã', '032'),
('01087', 'Xã Nậm Tỵ', 'Xã', '032'),
('01090', 'Xã Thông Nguyên', 'Xã', '032'),
('01093', 'Xã Nậm Khòa', 'Xã', '032'),
('01096', 'Thị trấn Cốc Pài', 'Thị trấn', '033'),
('01099', 'Xã Nàn Xỉn', 'Xã', '033'),
('01102', 'Xã Bản Díu', 'Xã', '033'),
('01105', 'Xã Chí Cà', 'Xã', '033'),
('01108', 'Xã Xín Mần', 'Xã', '033'),
('01111', 'Xã Trung Thịnh', 'Xã', '033'),
('01114', 'Xã Thèn Phàng', 'Xã', '033'),
('01117', 'Xã Ngán Chiên', 'Xã', '033'),
('01120', 'Xã Pà Vầy Sủ', 'Xã', '033'),
('01123', 'Xã Cốc Rế', 'Xã', '033'),
('01126', 'Xã Thu Tà', 'Xã', '033'),
('01129', 'Xã Nàn Ma', 'Xã', '033'),
('01132', 'Xã Tả Nhìu', 'Xã', '033'),
('01135', 'Xã Bản Ngò', 'Xã', '033'),
('01138', 'Xã Chế Là', 'Xã', '033'),
('01141', 'Xã Nấm Dẩn', 'Xã', '033'),
('01144', 'Xã Quảng Nguyên', 'Xã', '033'),
('01147', 'Xã Nà Chì', 'Xã', '033'),
('01150', 'Xã Khuôn Lùng', 'Xã', '033'),
('01153', 'Thị trấn Việt Quang', 'Thị trấn', '034'),
('01156', 'Thị trấn Vĩnh Tuy', 'Thị trấn', '034'),
('01159', 'Xã Tân Lập', 'Xã', '034'),
('01162', 'Xã Tân Thành', 'Xã', '034'),
('01165', 'Xã Đồng Tiến', 'Xã', '034'),
('01168', 'Xã Đồng Tâm', 'Xã', '034'),
('01171', 'Xã Tân Quang', 'Xã', '034'),
('01174', 'Xã Thượng Bình', 'Xã', '034'),
('01177', 'Xã Hữu Sản', 'Xã', '034'),
('01180', 'Xã Kim Ngọc', 'Xã', '034'),
('01183', 'Xã Việt Vinh', 'Xã', '034'),
('01186', 'Xã Bằng Hành', 'Xã', '034'),
('01189', 'Xã Quang Minh', 'Xã', '034'),
('01192', 'Xã Liên Hiệp', 'Xã', '034'),
('01195', 'Xã Vô Điếm', 'Xã', '034'),
('01198', 'Xã Việt Hồng', 'Xã', '034'),
('01201', 'Xã Hùng An', 'Xã', '034'),
('01204', 'Xã Đức Xuân', 'Xã', '034'),
('01207', 'Xã Tiên Kiều', 'Xã', '034'),
('01210', 'Xã Vĩnh Hảo', 'Xã', '034'),
('01213', 'Xã Vĩnh Phúc', 'Xã', '034'),
('01216', 'Xã Đồng Yên', 'Xã', '034'),
('01219', 'Xã Đông Thành', 'Xã', '034'),
('01222', 'Xã Xuân Minh', 'Xã', '035'),
('01225', 'Xã Tiên Nguyên', 'Xã', '035'),
('01228', 'Xã Tân Nam', 'Xã', '035'),
('01231', 'Xã Bản Rịa', 'Xã', '035'),
('01234', 'Xã Yên Thành', 'Xã', '035'),
('01237', 'Thị trấn Yên Bình', 'Thị trấn', '035'),
('01240', 'Xã Tân Trịnh', 'Xã', '035'),
('01243', 'Xã Tân Bắc', 'Xã', '035'),
('01246', 'Xã Bằng Lang', 'Xã', '035'),
('01249', 'Xã Yên Hà', 'Xã', '035'),
('01252', 'Xã Hương Sơn', 'Xã', '035'),
('01255', 'Xã Xuân Giang', 'Xã', '035'),
('01258', 'Xã Nà Khương', 'Xã', '035'),
('01261', 'Xã Tiên Yên', 'Xã', '035'),
('01264', 'Xã Vĩ Thượng', 'Xã', '035'),
('01267', 'Phường Sông Hiến', 'Phường', '040'),
('01270', 'Phường Sông Bằng', 'Phường', '040'),
('01273', 'Phường Hợp Giang', 'Phường', '040'),
('01276', 'Phường Tân Giang', 'Phường', '040'),
('01279', 'Phường Ngọc Xuân', 'Phường', '040'),
('01282', 'Phường Đề Thám', 'Phường', '040'),
('01285', 'Phường Hoà Chung', 'Phường', '040'),
('01288', 'Phường Duyệt Trung', 'Phường', '040'),
('01290', 'Thị trấn Pác Miầu', 'Thị trấn', '042'),
('01291', 'Xã Đức Hạnh', 'Xã', '042'),
('01294', 'Xã Lý Bôn', 'Xã', '042'),
('01296', 'Xã Nam Cao', 'Xã', '042'),
('01297', 'Xã Nam Quang', 'Xã', '042'),
('01300', 'Xã Vĩnh Quang', 'Xã', '042'),
('01303', 'Xã Quảng Lâm', 'Xã', '042'),
('01304', 'Xã Thạch Lâm', 'Xã', '042'),
('01306', 'Xã Tân Việt', 'Xã', '042'),
('01309', 'Xã Vĩnh Phong', 'Xã', '042'),
('01312', 'Xã Mông Ân', 'Xã', '042'),
('01315', 'Xã Thái Học', 'Xã', '042'),
('01316', 'Xã Thái Sơn', 'Xã', '042'),
('01318', 'Xã Yên Thổ', 'Xã', '042'),
('01321', 'Thị trấn Bảo Lạc', 'Thị trấn', '043'),
('01324', 'Xã Cốc Pàng', 'Xã', '043'),
('01327', 'Xã Thượng Hà', 'Xã', '043'),
('01330', 'Xã Cô Ba', 'Xã', '043'),
('01333', 'Xã Bảo Toàn', 'Xã', '043'),
('01336', 'Xã Khánh Xuân', 'Xã', '043'),
('01339', 'Xã Xuân Trường', 'Xã', '043'),
('01342', 'Xã Hồng Trị', 'Xã', '043'),
('01343', 'Xã Kim Cúc', 'Xã', '043'),
('01345', 'Xã Phan Thanh', 'Xã', '043'),
('01348', 'Xã Hồng An', 'Xã', '043'),
('01351', 'Xã Hưng Đạo', 'Xã', '043'),
('01352', 'Xã Hưng Thịnh', 'Xã', '043'),
('01354', 'Xã Huy Giáp', 'Xã', '043'),
('01357', 'Xã Đình Phùng', 'Xã', '043'),
('01359', 'Xã Sơn Lập', 'Xã', '043'),
('01360', 'Xã Sơn Lộ', 'Xã', '043'),
('01363', 'Thị trấn Thông Nông', 'Thị trấn', '044'),
('01366', 'Xã Cần Yên', 'Xã', '044'),
('01367', 'Xã Cần Nông', 'Xã', '044'),
('01369', 'Xã Vị Quang', 'Xã', '044'),
('01372', 'Xã Lương Thông', 'Xã', '044'),
('01375', 'Xã Đa Thông', 'Xã', '044'),
('01378', 'Xã Ngọc Động', 'Xã', '044'),
('01381', 'Xã Yên Sơn', 'Xã', '044'),
('01384', 'Xã Lương Can', 'Xã', '044'),
('01387', 'Xã Thanh Long', 'Xã', '044'),
('01390', 'Xã Bình Lãng', 'Xã', '044'),
('01392', 'Thị trấn Xuân Hòa', 'Thị trấn', '045'),
('01393', 'Xã Lũng Nặm', 'Xã', '045'),
('01396', 'Xã Kéo Yên', 'Xã', '045'),
('01399', 'Xã Trường Hà', 'Xã', '045'),
('01402', 'Xã Vân An', 'Xã', '045'),
('01405', 'Xã Cải Viên', 'Xã', '045'),
('01408', 'Xã Nà Sác', 'Xã', '045'),
('01411', 'Xã Nội Thôn', 'Xã', '045'),
('01414', 'Xã Tổng Cọt', 'Xã', '045'),
('01417', 'Xã Sóc Hà', 'Xã', '045'),
('01420', 'Xã Thượng Thôn', 'Xã', '045'),
('01423', 'Xã Vần Dính', 'Xã', '045'),
('01426', 'Xã Hồng Sĩ', 'Xã', '045'),
('01429', 'Xã Sĩ Hai', 'Xã', '045'),
('01432', 'Xã Quý Quân', 'Xã', '045'),
('01435', 'Xã Mã Ba', 'Xã', '045'),
('01438', 'Xã Phù Ngọc', 'Xã', '045'),
('01441', 'Xã Đào Ngạn', 'Xã', '045'),
('01444', 'Xã Hạ Thôn', 'Xã', '045'),
('01447', 'Thị trấn Hùng Quốc', 'Thị trấn', '046'),
('01450', 'Xã Cô Mười', 'Xã', '046'),
('01453', 'Xã Tri Phương', 'Xã', '046'),
('01456', 'Xã Quang Hán', 'Xã', '046'),
('01459', 'Xã Quang Vinh', 'Xã', '046'),
('01462', 'Xã Xuân Nội', 'Xã', '046'),
('01465', 'Xã Quang Trung', 'Xã', '046'),
('01468', 'Xã Lưu Ngọc', 'Xã', '046'),
('01471', 'Xã Cao Chương', 'Xã', '046'),
('01474', 'Xã Quốc Toản', 'Xã', '046'),
('01477', 'Thị trấn Trùng Khánh', 'Thị trấn', '047'),
('01480', 'Xã Ngọc Khê', 'Xã', '047'),
('01481', 'Xã Ngọc Côn', 'Xã', '047'),
('01483', 'Xã Phong Nậm', 'Xã', '047'),
('01486', 'Xã Ngọc Chung', 'Xã', '047'),
('01489', 'Xã Đình Phong', 'Xã', '047'),
('01492', 'Xã Lăng Yên', 'Xã', '047'),
('01495', 'Xã Đàm Thuỷ', 'Xã', '047'),
('01498', 'Xã Khâm Thành', 'Xã', '047'),
('01501', 'Xã Chí Viễn', 'Xã', '047'),
('01504', 'Xã Lăng Hiếu', 'Xã', '047'),
('01507', 'Xã Phong Châu', 'Xã', '047'),
('01510', 'Xã Đình Minh', 'Xã', '047'),
('01513', 'Xã Cảnh Tiên', 'Xã', '047'),
('01516', 'Xã Trung Phúc', 'Xã', '047'),
('01519', 'Xã Cao Thăng', 'Xã', '047'),
('01522', 'Xã Đức Hồng', 'Xã', '047'),
('01525', 'Xã Thông Hoè', 'Xã', '047'),
('01528', 'Xã Thân Giáp', 'Xã', '047'),
('01531', 'Xã Đoài Côn', 'Xã', '047'),
('01534', 'Xã Minh Long', 'Xã', '048'),
('01537', 'Xã Lý Quốc', 'Xã', '048'),
('01540', 'Xã Thắng Lợi', 'Xã', '048'),
('01543', 'Xã Đồng Loan', 'Xã', '048'),
('01546', 'Xã Đức Quang', 'Xã', '048'),
('01549', 'Xã Kim Loan', 'Xã', '048'),
('01552', 'Xã Quang Long', 'Xã', '048'),
('01555', 'Xã An Lạc', 'Xã', '048'),
('01558', 'Thị trấn Thanh Nhật', 'Thị trấn', '048'),
('01561', 'Xã Vinh Quý', 'Xã', '048'),
('01564', 'Xã Việt Chu', 'Xã', '048'),
('01567', 'Xã Cô Ngân', 'Xã', '048'),
('01570', 'Xã Thái Đức', 'Xã', '048'),
('01573', 'Xã Thị Hoa', 'Xã', '048'),
('01576', 'Thị trấn Quảng Uyên', 'Thị trấn', '049'),
('01579', 'Xã Phi Hải', 'Xã', '049'),
('01582', 'Xã Quảng Hưng', 'Xã', '049'),
('01585', 'Xã Bình Lăng', 'Xã', '049'),
('01588', 'Xã Quốc Dân', 'Xã', '049'),
('01591', 'Xã Quốc Phong', 'Xã', '049'),
('01594', 'Xã Độc Lập', 'Xã', '049'),
('01597', 'Xã Cai Bộ', 'Xã', '049'),
('01600', 'Xã Đoài Khôn', 'Xã', '049'),
('01603', 'Xã Phúc Sen', 'Xã', '049'),
('01606', 'Xã Chí Thảo', 'Xã', '049'),
('01609', 'Xã Tự Do', 'Xã', '049'),
('01612', 'Xã Hồng Định', 'Xã', '049'),
('01615', 'Xã Hồng Quang', 'Xã', '049'),
('01618', 'Xã Ngọc Động', 'Xã', '049'),
('01621', 'Xã Hoàng Hải', 'Xã', '049'),
('01624', 'Xã Hạnh Phúc', 'Xã', '049'),
('01627', 'Thị trấn Tà Lùng', 'Thị trấn', '050'),
('01630', 'Xã Triệu ẩu', 'Xã', '050'),
('01633', 'Xã Hồng Đại', 'Xã', '050'),
('01636', 'Xã Cách Linh', 'Xã', '050'),
('01639', 'Xã Đại Sơn', 'Xã', '050'),
('01642', 'Xã Lương Thiện', 'Xã', '050'),
('01645', 'Xã Tiên Thành', 'Xã', '050'),
('01648', 'Thị trấn Hoà Thuận', 'Thị trấn', '050'),
('01651', 'Xã Mỹ Hưng', 'Xã', '050'),
('01654', 'Thị trấn Nước Hai', 'Thị trấn', '051'),
('01657', 'Xã Dân Chủ', 'Xã', '051'),
('01660', 'Xã Nam Tuấn', 'Xã', '051'),
('01663', 'Xã Đức Xuân', 'Xã', '051'),
('01666', 'Xã Đại Tiến', 'Xã', '051'),
('01669', 'Xã Đức Long', 'Xã', '051'),
('01672', 'Xã Ngũ Lão', 'Xã', '051'),
('01675', 'Xã Trương Lương', 'Xã', '051'),
('01678', 'Xã Bình Long', 'Xã', '051'),
('01681', 'Xã Nguyễn Huệ', 'Xã', '051'),
('01684', 'Xã Công Trừng', 'Xã', '051'),
('01687', 'Xã Hồng Việt', 'Xã', '051'),
('01690', 'Xã Bế Triều', 'Xã', '051'),
('01693', 'Xã Vĩnh Quang', 'Xã', '040'),
('01696', 'Xã Hoàng Tung', 'Xã', '051'),
('01699', 'Xã Trương Vương', 'Xã', '051'),
('01702', 'Xã Quang Trung', 'Xã', '051'),
('01705', 'Xã Hưng Đạo', 'Xã', '040'),
('01708', 'Xã Bạch Đằng', 'Xã', '051'),
('01711', 'Xã Bình Dương', 'Xã', '051'),
('01714', 'Xã Lê Chung', 'Xã', '051'),
('01717', 'Xã Hà Trì', 'Xã', '051'),
('01720', 'Xã Chu Trinh', 'Xã', '040'),
('01723', 'Xã Hồng Nam', 'Xã', '051'),
('01726', 'Thị trấn Nguyên Bình', 'Thị trấn', '052'),
('01729', 'Thị trấn Tĩnh Túc', 'Thị trấn', '052'),
('01732', 'Xã Yên Lạc', 'Xã', '052'),
('01735', 'Xã Triệu Nguyên', 'Xã', '052'),
('01738', 'Xã Ca Thành', 'Xã', '052'),
('01741', 'Xã Thái Học', 'Xã', '052'),
('01744', 'Xã Vũ Nông', 'Xã', '052'),
('01747', 'Xã Minh Tâm', 'Xã', '052'),
('01750', 'Xã Thể Dục', 'Xã', '052'),
('01753', 'Xã Bắc Hợp', 'Xã', '052'),
('01756', 'Xã Mai Long', 'Xã', '052'),
('01759', 'Xã Lang Môn', 'Xã', '052'),
('01762', 'Xã Minh Thanh', 'Xã', '052'),
('01765', 'Xã Hoa Thám', 'Xã', '052'),
('01768', 'Xã Phan Thanh', 'Xã', '052'),
('01771', 'Xã Quang Thành', 'Xã', '052'),
('01774', 'Xã Tam Kim', 'Xã', '052'),
('01777', 'Xã Thành Công', 'Xã', '052'),
('01780', 'Xã Thịnh Vượng', 'Xã', '052'),
('01783', 'Xã Hưng Đạo', 'Xã', '052'),
('01786', 'Thị trấn Đông Khê', 'Thị trấn', '053'),
('01789', 'Xã Canh Tân', 'Xã', '053'),
('01792', 'Xã Kim Đồng', 'Xã', '053'),
('01795', 'Xã Minh Khai', 'Xã', '053'),
('01798', 'Xã Thị Ngân', 'Xã', '053'),
('01801', 'Xã Đức Thông', 'Xã', '053'),
('01804', 'Xã Thái Cường', 'Xã', '053'),
('01807', 'Xã Vân Trình', 'Xã', '053'),
('01810', 'Xã Thụy Hùng', 'Xã', '053'),
('01813', 'Xã Quang Trọng', 'Xã', '053'),
('01816', 'Xã Trọng Con', 'Xã', '053'),
('01819', 'Xã Lê Lai', 'Xã', '053'),
('01822', 'Xã Đức Long', 'Xã', '053'),
('01825', 'Xã Danh Sỹ', 'Xã', '053'),
('01828', 'Xã Lê Lợi', 'Xã', '053'),
('01831', 'Xã Đức Xuân', 'Xã', '053'),
('01834', 'Phường Nguyễn Thị Minh Khai', 'Phường', '058'),
('01837', 'Phường Sông Cầu', 'Phường', '058'),
('01840', 'Phường Đức Xuân', 'Phường', '058'),
('01843', 'Phường Phùng Chí Kiên', 'Phường', '058'),
('01846', 'Phường Huyền Tụng', 'Phường', '058'),
('01849', 'Xã Dương Quang', 'Xã', '058'),
('01852', 'Xã Nông Thượng', 'Xã', '058'),
('01855', 'Phường Xuất Hóa', 'Phường', '058'),
('01858', 'Xã Bằng Thành', 'Xã', '060'),
('01861', 'Xã Nhạn Môn', 'Xã', '060'),
('01864', 'Xã Bộc Bố', 'Xã', '060'),
('01867', 'Xã Công Bằng', 'Xã', '060'),
('01870', 'Xã Giáo Hiệu', 'Xã', '060'),
('01873', 'Xã Xuân La', 'Xã', '060'),
('01876', 'Xã An Thắng', 'Xã', '060'),
('01879', 'Xã Cổ Linh', 'Xã', '060'),
('01882', 'Xã Nghiên Loan', 'Xã', '060'),
('01885', 'Xã Cao Tân', 'Xã', '060'),
('01888', 'Thị trấn Chợ Rã', 'Thị trấn', '061'),
('01891', 'Xã Bành Trạch', 'Xã', '061'),
('01894', 'Xã Phúc Lộc', 'Xã', '061'),
('01897', 'Xã Hà Hiệu', 'Xã', '061'),
('01900', 'Xã Cao Thượng', 'Xã', '061'),
('01903', 'Xã Cao Trĩ', 'Xã', '061'),
('01906', 'Xã Khang Ninh', 'Xã', '061'),
('01909', 'Xã Nam Mẫu', 'Xã', '061'),
('01912', 'Xã Thượng Giáo', 'Xã', '061'),
('01915', 'Xã Địa Linh', 'Xã', '061'),
('01918', 'Xã Yến Dương', 'Xã', '061'),
('01921', 'Xã Chu Hương', 'Xã', '061'),
('01924', 'Xã Quảng Khê', 'Xã', '061'),
('01927', 'Xã Mỹ Phương', 'Xã', '061'),
('01930', 'Xã Hoàng Trĩ', 'Xã', '061'),
('01933', 'Xã Đồng Phúc', 'Xã', '061'),
('01936', 'Thị trấn Nà Phặc', 'Thị trấn', '062'),
('01939', 'Xã Thượng Ân', 'Xã', '062'),
('01942', 'Xã Bằng Vân', 'Xã', '062'),
('01945', 'Xã Cốc Đán', 'Xã', '062'),
('01948', 'Xã Trung Hoà', 'Xã', '062'),
('01951', 'Xã Đức Vân', 'Xã', '062'),
('01954', 'Xã Vân Tùng', 'Xã', '062'),
('01957', 'Xã Thượng Quan', 'Xã', '062'),
('01960', 'Xã Lãng Ngâm', 'Xã', '062'),
('01963', 'Xã Thuần Mang', 'Xã', '062'),
('01966', 'Xã Hương Nê', 'Xã', '062'),
('01969', 'Thị trấn Phủ Thông', 'Thị trấn', '063'),
('01972', 'Xã Phương Linh', 'Xã', '063'),
('01975', 'Xã Vi Hương', 'Xã', '063'),
('01978', 'Xã Sĩ Bình', 'Xã', '063'),
('01981', 'Xã Vũ Muộn', 'Xã', '063'),
('01984', 'Xã Đôn Phong', 'Xã', '063'),
('01987', 'Xã Tú Trĩ', 'Xã', '063'),
('01990', 'Xã Lục Bình', 'Xã', '063'),
('01993', 'Xã Tân Tiến', 'Xã', '063'),
('01996', 'Xã Quân Bình', 'Xã', '063'),
('01999', 'Xã Nguyên Phúc', 'Xã', '063'),
('02002', 'Xã Cao Sơn', 'Xã', '063'),
('02005', 'Xã Hà Vị', 'Xã', '063'),
('02008', 'Xã Cẩm Giàng', 'Xã', '063'),
('02011', 'Xã Mỹ Thanh', 'Xã', '063'),
('02014', 'Xã Dương Phong', 'Xã', '063'),
('02017', 'Xã Quang Thuận', 'Xã', '063'),
('02020', 'Thị trấn Bằng Lũng', 'Thị trấn', '064'),
('02023', 'Xã Xuân Lạc', 'Xã', '064'),
('02026', 'Xã Nam Cường', 'Xã', '064'),
('02029', 'Xã Đồng Lạc', 'Xã', '064'),
('02032', 'Xã Tân Lập', 'Xã', '064'),
('02035', 'Xã Bản Thi', 'Xã', '064'),
('02038', 'Xã Quảng Bạch', 'Xã', '064'),
('02041', 'Xã Bằng Phúc', 'Xã', '064'),
('02044', 'Xã Yên Thịnh', 'Xã', '064'),
('02047', 'Xã Yên Thượng', 'Xã', '064'),
('02050', 'Xã Phương Viên', 'Xã', '064'),
('02053', 'Xã Ngọc Phái', 'Xã', '064'),
('02056', 'Xã Rã Bản', 'Xã', '064'),
('02059', 'Xã Đông Viên', 'Xã', '064'),
('02062', 'Xã Lương Bằng', 'Xã', '064'),
('02065', 'Xã Bằng Lãng', 'Xã', '064'),
('02068', 'Xã Đại Sảo', 'Xã', '064'),
('02071', 'Xã Nghĩa Tá', 'Xã', '064'),
('02074', 'Xã Phong Huân', 'Xã', '064'),
('02077', 'Xã Yên Mỹ', 'Xã', '064'),
('02080', 'Xã Bình Trung', 'Xã', '064'),
('02083', 'Xã Yên Nhuận', 'Xã', '064'),
('02086', 'Thị trấn Chợ Mới', 'Thị trấn', '065'),
('02089', 'Xã Tân Sơn', 'Xã', '065'),
('02092', 'Xã Thanh Vận', 'Xã', '065'),
('02095', 'Xã Mai Lạp', 'Xã', '065'),
('02098', 'Xã Hoà Mục', 'Xã', '065'),
('02101', 'Xã Thanh Mai', 'Xã', '065'),
('02104', 'Xã Cao Kỳ', 'Xã', '065'),
('02107', 'Xã Nông Hạ', 'Xã', '065'),
('02110', 'Xã Yên Cư', 'Xã', '065'),
('02113', 'Xã Nông Thịnh', 'Xã', '065'),
('02116', 'Xã Yên Hân', 'Xã', '065'),
('02119', 'Xã Thanh Bình', 'Xã', '065'),
('02122', 'Xã Như Cố', 'Xã', '065'),
('02125', 'Xã Bình Văn', 'Xã', '065'),
('02128', 'Xã Yên Đĩnh', 'Xã', '065'),
('02131', 'Xã Quảng Chu', 'Xã', '065'),
('02134', 'Thị trấn Yến Lạc', 'Thị trấn', '066'),
('02137', 'Xã Vũ Loan', 'Xã', '066'),
('02140', 'Xã Lạng San', 'Xã', '066'),
('02143', 'Xã Lương Thượng', 'Xã', '066'),
('02146', 'Xã Kim Hỷ', 'Xã', '066'),
('02149', 'Xã Văn Học', 'Xã', '066'),
('02152', 'Xã Cường Lợi', 'Xã', '066'),
('02155', 'Xã Lương Hạ', 'Xã', '066'),
('02158', 'Xã Kim Lư', 'Xã', '066'),
('02161', 'Xã Lương Thành', 'Xã', '066'),
('02164', 'Xã Ân Tình', 'Xã', '066'),
('02167', 'Xã Lam Sơn', 'Xã', '066'),
('02170', 'Xã Văn Minh', 'Xã', '066'),
('02173', 'Xã Côn Minh', 'Xã', '066'),
('02176', 'Xã Cư Lễ', 'Xã', '066'),
('02179', 'Xã Hữu Thác', 'Xã', '066'),
('02182', 'Xã Hảo Nghĩa', 'Xã', '066'),
('02185', 'Xã Quang Phong', 'Xã', '066'),
('02188', 'Xã Dương Sơn', 'Xã', '066'),
('02191', 'Xã Xuân Dương', 'Xã', '066'),
('02194', 'Xã Đổng Xá', 'Xã', '066'),
('02197', 'Xã Liêm Thuỷ', 'Xã', '066'),
('02200', 'Phường Phan Thiết', 'Phường', '070'),
('02203', 'Phường Minh Xuân', 'Phường', '070'),
('02206', 'Phường Tân Quang', 'Phường', '070'),
('02209', 'Xã Tràng Đà', 'Xã', '070'),
('02212', 'Phường Nông Tiến', 'Phường', '070'),
('02215', 'Phường Ỷ La', 'Phường', '070'),
('02216', 'Phường Tân Hà', 'Phường', '070'),
('02218', 'Phường Hưng Thành', 'Phường', '070'),
('02221', 'Thị trấn Nà Hang', 'Thị trấn', '072'),
('02227', 'Xã Sinh Long', 'Xã', '072'),
('02230', 'Xã Thượng Giáp', 'Xã', '072'),
('02233', 'Xã Phúc Yên', 'Xã', '071'),
('02239', 'Xã Thượng Nông', 'Xã', '072'),
('02242', 'Xã Xuân Lập', 'Xã', '071'),
('02245', 'Xã Côn Lôn', 'Xã', '072'),
('02248', 'Xã Yên Hoa', 'Xã', '072'),
('02251', 'Xã Khuôn Hà', 'Xã', '071'),
('02254', 'Xã Hồng Thái', 'Xã', '072'),
('02260', 'Xã Đà Vị', 'Xã', '072'),
('02263', 'Xã Khau Tinh', 'Xã', '072'),
('02266', 'Xã Lăng Can', 'Xã', '071'),
('02269', 'Xã Thượng Lâm', 'Xã', '071'),
('02275', 'Xã Sơn Phú', 'Xã', '072'),
('02281', 'Xã Năng Khả', 'Xã', '072'),
('02284', 'Xã Thanh Tương', 'Xã', '072'),
('02287', 'Thị trấn Vĩnh Lộc', 'Thị trấn', '073'),
('02290', 'Xã Bình An', 'Xã', '071'),
('02293', 'Xã Hồng Quang', 'Xã', '071'),
('02296', 'Xã Thổ Bình', 'Xã', '071'),
('02299', 'Xã Phúc Sơn', 'Xã', '073'),
('02302', 'Xã Minh Quang', 'Xã', '073'),
('02305', 'Xã Trung Hà', 'Xã', '073'),
('02308', 'Xã Tân Mỹ', 'Xã', '073'),
('02311', 'Xã Hà Lang', 'Xã', '073'),
('02314', 'Xã Hùng Mỹ', 'Xã', '073'),
('02317', 'Xã Yên Lập', 'Xã', '073'),
('02320', 'Xã Tân An', 'Xã', '073'),
('02323', 'Xã Bình Phú', 'Xã', '073'),
('02326', 'Xã Xuân Quang', 'Xã', '073'),
('02329', 'Xã Ngọc Hội', 'Xã', '073'),
('02332', 'Xã Phú Bình', 'Xã', '073'),
('02335', 'Xã Hòa Phú', 'Xã', '073'),
('02338', 'Xã Phúc Thịnh', 'Xã', '073'),
('02341', 'Xã Kiên Đài', 'Xã', '073'),
('02344', 'Xã Tân Thịnh', 'Xã', '073'),
('02347', 'Xã Trung Hòa', 'Xã', '073'),
('02350', 'Xã Kim Bình', 'Xã', '073'),
('02353', 'Xã Hòa An', 'Xã', '073'),
('02356', 'Xã Vinh Quang', 'Xã', '073'),
('02359', 'Xã Tri Phú', 'Xã', '073'),
('02362', 'Xã Nhân Lý', 'Xã', '073'),
('02365', 'Xã Yên Nguyên', 'Xã', '073'),
('02368', 'Xã Linh Phú', 'Xã', '073'),
('02371', 'Xã Bình Nhân', 'Xã', '073'),
('02374', 'Thị trấn Tân Yên', 'Thị trấn', '074'),
('02377', 'Xã Yên Thuận', 'Xã', '074'),
('02380', 'Xã Bạch Xa', 'Xã', '074'),
('02383', 'Xã Minh Khương', 'Xã', '074'),
('02386', 'Xã Yên Lâm', 'Xã', '074'),
('02389', 'Xã Minh Dân', 'Xã', '074'),
('02392', 'Xã Phù Lưu', 'Xã', '074'),
('02395', 'Xã Minh Hương', 'Xã', '074'),
('02398', 'Xã Yên Phú', 'Xã', '074'),
('02401', 'Xã Tân Thành', 'Xã', '074'),
('02404', 'Xã Bình Xa', 'Xã', '074'),
('02407', 'Xã Thái Sơn', 'Xã', '074'),
('02410', 'Xã Nhân Mục', 'Xã', '074'),
('02413', 'Xã Thành Long', 'Xã', '074'),
('02416', 'Xã Bằng Cốc', 'Xã', '074'),
('02419', 'Xã Thái Hòa', 'Xã', '074'),
('02422', 'Xã Đức Ninh', 'Xã', '074'),
('02425', 'Xã Hùng Đức', 'Xã', '074'),
('02428', 'Thị trấn Tân Bình', 'Thị trấn', '075'),
('02431', 'Xã Quí Quân', 'Xã', '075'),
('02434', 'Xã Lực Hành', 'Xã', '075'),
('02437', 'Xã Kiến Thiết', 'Xã', '075'),
('02440', 'Xã Trung Minh', 'Xã', '075'),
('02443', 'Xã Chiêu Yên', 'Xã', '075'),
('02446', 'Xã Trung Trực', 'Xã', '075'),
('02449', 'Xã Xuân Vân', 'Xã', '075'),
('02452', 'Xã Phúc Ninh', 'Xã', '075'),
('02455', 'Xã Hùng Lợi', 'Xã', '075'),
('02458', 'Xã Trung Sơn', 'Xã', '075'),
('02461', 'Xã Tân Tiến', 'Xã', '075'),
('02464', 'Xã Tứ Quận', 'Xã', '075'),
('02467', 'Xã Đạo Viện', 'Xã', '075'),
('02470', 'Xã Tân Long', 'Xã', '075'),
('02473', 'Xã Thắng Quân', 'Xã', '075'),
('02476', 'Xã Kim Quan', 'Xã', '075'),
('02479', 'Xã Lang Quán', 'Xã', '075'),
('02482', 'Xã Phú Thịnh', 'Xã', '075'),
('02485', 'Xã Công Đa', 'Xã', '075'),
('02488', 'Xã Trung Môn', 'Xã', '075'),
('02491', 'Xã Chân Sơn', 'Xã', '075'),
('02494', 'Xã Thái Bình', 'Xã', '075'),
('02497', 'Xã Kim Phú', 'Xã', '075'),
('02500', 'Xã Tiến Bộ', 'Xã', '075'),
('02503', 'Xã An Khang', 'Xã', '070'),
('02506', 'Xã Mỹ Bằng', 'Xã', '075'),
('02509', 'Xã Phú Lâm', 'Xã', '075'),
('02512', 'Xã An Tường', 'Xã', '070'),
('02515', 'Xã Lưỡng Vượng', 'Xã', '070'),
('02518', 'Xã Hoàng Khai', 'Xã', '075'),
('02521', 'Xã Thái Long', 'Xã', '070'),
('02524', 'Xã Đội Cấn', 'Xã', '070'),
('02527', 'Xã Nhữ Hán', 'Xã', '075'),
('02530', 'Xã Nhữ Khê', 'Xã', '075'),
('02533', 'Xã Đội Bình', 'Xã', '075'),
('02536', 'Thị trấn Sơn Dương', 'Thị trấn', '076'),
('02539', 'Xã Trung Yên', 'Xã', '076'),
('02542', 'Xã Minh Thanh', 'Xã', '076'),
('02545', 'Xã Tân Trào', 'Xã', '076'),
('02548', 'Xã Vĩnh Lợi', 'Xã', '076'),
('02551', 'Xã Thượng Ấm', 'Xã', '076'),
('02554', 'Xã Bình Yên', 'Xã', '076'),
('02557', 'Xã Lương Thiện', 'Xã', '076'),
('02560', 'Xã Tú Thịnh', 'Xã', '076'),
('02563', 'Xã Cấp Tiến', 'Xã', '076'),
('02566', 'Xã Hợp Thành', 'Xã', '076'),
('02569', 'Xã Phúc Ứng', 'Xã', '076'),
('02572', 'Xã Đông Thọ', 'Xã', '076'),
('02575', 'Xã Kháng Nhật', 'Xã', '076'),
('02578', 'Xã Hợp Hòa', 'Xã', '076'),
('02581', 'Xã Thanh Phát', 'Xã', '076'),
('02584', 'Xã Quyết Thắng', 'Xã', '076'),
('02587', 'Xã Đồng Quý', 'Xã', '076'),
('02590', 'Xã Tuân Lộ', 'Xã', '076'),
('02593', 'Xã Vân Sơn', 'Xã', '076'),
('02596', 'Xã Văn Phú', 'Xã', '076'),
('02599', 'Xã Chi Thiết', 'Xã', '076'),
('02602', 'Xã Đông Lợi', 'Xã', '076'),
('02605', 'Xã Thiện Kế', 'Xã', '076'),
('02608', 'Xã Hồng Lạc', 'Xã', '076'),
('02611', 'Xã Phú Lương', 'Xã', '076'),
('02614', 'Xã Ninh Lai', 'Xã', '076'),
('02617', 'Xã Đại Phú', 'Xã', '076'),
('02620', 'Xã Sơn Nam', 'Xã', '076'),
('02623', 'Xã Hào Phú', 'Xã', '076'),
('02626', 'Xã Tam Đa', 'Xã', '076'),
('02629', 'Xã Sầm Dương', 'Xã', '076'),
('02632', 'Xã Lâm Xuyên', 'Xã', '076'),
('02635', 'Phường Duyên Hải', 'Phường', '080'),
('02638', 'Phường Lào Cai', 'Phường', '080'),
('02641', 'Phường Phố Mới', 'Phường', '080'),
('02644', 'Phường Cốc Lếu', 'Phường', '080'),
('02647', 'Phường Kim Tân', 'Phường', '080'),
('02650', 'Phường Bắc Lệnh', 'Phường', '080'),
('02653', 'Phường Pom Hán', 'Phường', '080'),
('02656', 'Phường Xuân Tăng', 'Phường', '080'),
('02658', 'Phường Bình Minh', 'Phường', '080'),
('02659', 'Phường Thống Nhất', 'Phường', '080'),
('02662', 'Xã Đồng Tuyển', 'Xã', '080'),
('02665', 'Xã Vạn Hoà', 'Xã', '080'),
('02668', 'Phường Bắc Cường', 'Phường', '080'),
('02671', 'Phường Nam Cường', 'Phường', '080'),
('02674', 'Xã Cam Đường', 'Xã', '080'),
('02677', 'Xã Tả Phời', 'Xã', '080'),
('02680', 'Xã Hợp Thành', 'Xã', '080'),
('02683', 'Thị trấn Bát Xát', 'Thị trấn', '082'),
('02686', 'Xã A Mú Sung', 'Xã', '082'),
('02689', 'Xã Nậm Chạc', 'Xã', '082'),
('02692', 'Xã A Lù', 'Xã', '082'),
('02695', 'Xã Trịnh Tường', 'Xã', '082'),
('02698', 'Xã Ngải Thầu', 'Xã', '082'),
('02701', 'Xã Y Tý', 'Xã', '082'),
('02704', 'Xã Cốc Mỳ', 'Xã', '082'),
('02707', 'Xã Dền Sáng', 'Xã', '082'),
('02710', 'Xã Bản Vược', 'Xã', '082'),
('02713', 'Xã Sàng Ma Sáo', 'Xã', '082'),
('02716', 'Xã Bản Qua', 'Xã', '082'),
('02719', 'Xã Mường Vi', 'Xã', '082'),
('02722', 'Xã Dền Thàng', 'Xã', '082'),
('02725', 'Xã Bản Xèo', 'Xã', '082'),
('02728', 'Xã Mường Hum', 'Xã', '082'),
('02731', 'Xã Trung Lèng Hồ', 'Xã', '082'),
('02734', 'Xã Quang Kim', 'Xã', '082'),
('02737', 'Xã Pa Cheo', 'Xã', '082'),
('02740', 'Xã Nậm Pung', 'Xã', '082'),
('02743', 'Xã Phìn Ngan', 'Xã', '082'),
('02746', 'Xã Cốc San', 'Xã', '082'),
('02749', 'Xã Tòng Sành', 'Xã', '082'),
('02752', 'Xã Pha Long', 'Xã', '083'),
('02755', 'Xã Tả Ngải Chồ', 'Xã', '083'),
('02758', 'Xã Tung Chung Phố', 'Xã', '083'),
('02761', 'Thị trấn Mường Khương', 'Thị trấn', '083'),
('02764', 'Xã Dìn Chin', 'Xã', '083'),
('02767', 'Xã Tả Gia Khâu', 'Xã', '083'),
('02770', 'Xã Nậm Chảy', 'Xã', '083'),
('02773', 'Xã Nấm Lư', 'Xã', '083'),
('02776', 'Xã Lùng Khấu Nhin', 'Xã', '083'),
('02779', 'Xã Thanh Bình', 'Xã', '083'),
('02782', 'Xã Cao Sơn', 'Xã', '083'),
('02785', 'Xã Lùng Vai', 'Xã', '083'),
('02788', 'Xã Bản Lầu', 'Xã', '083'),
('02791', 'Xã La Pan Tẩn', 'Xã', '083'),
('02794', 'Xã Tả Thàng', 'Xã', '083'),
('02797', 'Xã Bản Sen', 'Xã', '083'),
('02800', 'Xã Nàn Sán', 'Xã', '084'),
('02803', 'Xã Thào Chư Phìn', 'Xã', '084'),
('02806', 'Xã Bản Mế', 'Xã', '084'),
('02809', 'Xã Si Ma Cai', 'Xã', '084'),
('02812', 'Xã Sán Chải', 'Xã', '084'),
('02815', 'Xã Mản Thẩn', 'Xã', '084'),
('02818', 'Xã Lùng Sui', 'Xã', '084'),
('02821', 'Xã Cán Cấu', 'Xã', '084'),
('02824', 'Xã Sín Chéng', 'Xã', '084'),
('02827', 'Xã Cán Hồ', 'Xã', '084'),
('02830', 'Xã Quan Thần Sán', 'Xã', '084'),
('02833', 'Xã Lử Thẩn', 'Xã', '084'),
('02836', 'Xã Nàn Xín', 'Xã', '084'),
('02839', 'Thị trấn Bắc Hà', 'Thị trấn', '085'),
('02842', 'Xã Lùng Cải', 'Xã', '085'),
('02845', 'Xã Bản Già', 'Xã', '085'),
('02848', 'Xã Lùng Phình', 'Xã', '085'),
('02851', 'Xã Tả Van Chư', 'Xã', '085'),
('02854', 'Xã Tả Củ Tỷ', 'Xã', '085'),
('02857', 'Xã Thải Giàng Phố', 'Xã', '085'),
('02860', 'Xã Lầu Thí Ngài', 'Xã', '085'),
('02863', 'Xã Hoàng Thu Phố', 'Xã', '085'),
('02866', 'Xã Bản Phố', 'Xã', '085'),
('02869', 'Xã Bản Liền', 'Xã', '085'),
('02872', 'Xã Tà Chải', 'Xã', '085'),
('02875', 'Xã Na Hối', 'Xã', '085'),
('02878', 'Xã Cốc Ly', 'Xã', '085'),
('02881', 'Xã Nậm Mòn', 'Xã', '085'),
('02884', 'Xã Nậm Đét', 'Xã', '085'),
('02887', 'Xã Nậm Khánh', 'Xã', '085'),
('02890', 'Xã Bảo Nhai', 'Xã', '085'),
('02893', 'Xã Nậm Lúc', 'Xã', '085'),
('02896', 'Xã Cốc Lầu', 'Xã', '085'),
('02899', 'Xã Bản Cái', 'Xã', '085'),
('02902', 'Thị trấn N.T Phong Hải', 'Thị trấn', '086'),
('02905', 'Thị trấn Phố Lu', 'Thị trấn', '086'),
('02908', 'Thị trấn Tằng Loỏng', 'Thị trấn', '086'),
('02911', 'Xã Bản Phiệt', 'Xã', '086'),
('02914', 'Xã Bản Cầm', 'Xã', '086'),
('02917', 'Xã Thái Niên', 'Xã', '086'),
('02920', 'Xã Phong Niên', 'Xã', '086'),
('02923', 'Xã Gia Phú', 'Xã', '086'),
('02926', 'Xã Xuân Quang', 'Xã', '086'),
('02929', 'Xã Sơn Hải', 'Xã', '086'),
('02932', 'Xã Xuân Giao', 'Xã', '086'),
('02935', 'Xã Trì Quang', 'Xã', '086'),
('02938', 'Xã Sơn Hà', 'Xã', '086'),
('02941', 'Xã Phố Lu', 'Xã', '086'),
('02944', 'Xã Phú Nhuận', 'Xã', '086'),
('02947', 'Thị trấn Phố Ràng', 'Thị trấn', '087'),
('02950', 'Xã Tân Tiến', 'Xã', '087'),
('02953', 'Xã Nghĩa Đô', 'Xã', '087'),
('02956', 'Xã Vĩnh Yên', 'Xã', '087'),
('02959', 'Xã Điện Quan', 'Xã', '087'),
('02962', 'Xã Xuân Hoà', 'Xã', '087'),
('02965', 'Xã Tân Dương', 'Xã', '087'),
('02968', 'Xã Thượng Hà', 'Xã', '087'),
('02971', 'Xã Kim Sơn', 'Xã', '087'),
('02974', 'Xã Cam Cọn', 'Xã', '087'),
('02977', 'Xã Minh Tân', 'Xã', '087'),
('02980', 'Xã Xuân Thượng', 'Xã', '087'),
('02983', 'Xã Việt Tiến', 'Xã', '087'),
('02986', 'Xã Yên Sơn', 'Xã', '087'),
('02989', 'Xã Bảo Hà', 'Xã', '087'),
('02992', 'Xã Lương Sơn', 'Xã', '087'),
('02995', 'Xã Long Phúc', 'Xã', '087'),
('02998', 'Xã Long Khánh', 'Xã', '087'),
('03001', 'Thị trấn Sa Pa', 'Thị trấn', '088'),
('03004', 'Xã Bản Khoang', 'Xã', '088'),
('03007', 'Xã Tả Giàng Phình', 'Xã', '088'),
('03010', 'Xã Trung Chải', 'Xã', '088'),
('03013', 'Xã Tả Phìn', 'Xã', '088'),
('03016', 'Xã Sa Pả', 'Xã', '088'),
('03019', 'Xã San Sả Hồ', 'Xã', '088'),
('03022', 'Xã Bản Phùng', 'Xã', '088'),
('03025', 'Xã Hầu Thào', 'Xã', '088'),
('03028', 'Xã Lao Chải', 'Xã', '088'),
('03031', 'Xã Thanh Kim', 'Xã', '088'),
('03034', 'Xã Suối Thầu', 'Xã', '088'),
('03037', 'Xã Sử Pán', 'Xã', '088'),
('03040', 'Xã Tả Van', 'Xã', '088'),
('03043', 'Xã Thanh Phú', 'Xã', '088'),
('03046', 'Xã Bản Hồ', 'Xã', '088'),
('03049', 'Xã Nậm Sài', 'Xã', '088'),
('03052', 'Xã Nậm Cang', 'Xã', '088'),
('03055', 'Thị trấn Khánh Yên', 'Thị trấn', '089'),
('03058', 'Xã Văn Sơn', 'Xã', '089'),
('03061', 'Xã Võ Lao', 'Xã', '089'),
('03064', 'Xã Sơn Thuỷ', 'Xã', '089'),
('03067', 'Xã Nậm Mả', 'Xã', '089'),
('03070', 'Xã Tân Thượng', 'Xã', '089'),
('03073', 'Xã Nậm Rạng', 'Xã', '089'),
('03076', 'Xã Nậm Chầy', 'Xã', '089'),
('03079', 'Xã Tân An', 'Xã', '089'),
('03082', 'Xã Khánh Yên Thượng', 'Xã', '089'),
('03085', 'Xã Nậm Xé', 'Xã', '089'),
('03088', 'Xã Dần Thàng', 'Xã', '089'),
('03091', 'Xã Chiềng Ken', 'Xã', '089'),
('03094', 'Xã Làng Giàng', 'Xã', '089'),
('03097', 'Xã Hoà Mạc', 'Xã', '089'),
('03100', 'Xã Khánh Yên Trung', 'Xã', '089'),
('03103', 'Xã Khánh Yên Hạ', 'Xã', '089'),
('03106', 'Xã Dương Quỳ', 'Xã', '089'),
('03109', 'Xã Nậm Tha', 'Xã', '089'),
('03112', 'Xã Minh Lương', 'Xã', '089'),
('03115', 'Xã Thẩm Dương', 'Xã', '089'),
('03118', 'Xã Liêm Phú', 'Xã', '089'),
('03121', 'Xã Nậm Xây', 'Xã', '089'),
('03124', 'Phường Noong Bua', 'Phường', '094'),
('03127', 'Phường Him Lam', 'Phường', '094'),
('03130', 'Phường Thanh Bình', 'Phường', '094'),
('03133', 'Phường Tân Thanh', 'Phường', '094'),
('03136', 'Phường Mường Thanh', 'Phường', '094'),
('03139', 'Phường Nam Thanh', 'Phường', '094'),
('03142', 'Phường Thanh Trường', 'Phường', '094'),
('03144', 'Xã Tà Lèng', 'Xã', '094'),
('03145', 'Xã Thanh Minh', 'Xã', '094'),
('03148', 'Phường Sông Đà', 'Phường', '095'),
('03151', 'Phường Na Lay', 'Phường', '095'),
('03154', 'Xã Sín Thầu', 'Xã', '096'),
('03155', 'Xã Sen Thượng', 'Xã', '096'),
('03156', 'Xã Nậm Tin', 'Xã', '103'),
('03157', 'Xã Chung Chải', 'Xã', '096'),
('03158', 'Xã Leng Su Sìn', 'Xã', '096'),
('03159', 'Xã Pá Mỳ', 'Xã', '096'),
('03160', 'Xã Mường Nhé', 'Xã', '096'),
('03161', 'Xã Nậm Vì', 'Xã', '096'),
('03162', 'Xã Nậm Kè', 'Xã', '096'),
('03163', 'Xã Mường Toong', 'Xã', '096'),
('03164', 'Xã Quảng Lâm', 'Xã', '096'),
('03165', 'Xã Pa Tần', 'Xã', '103'),
('03166', 'Xã Chà Cang', 'Xã', '103'),
('03167', 'Xã Na Cô Sa', 'Xã', '103'),
('03168', 'Xã Nà Khoa', 'Xã', '103'),
('03169', 'Xã Nà Hỳ', 'Xã', '103'),
('03170', 'Xã Nà Bủng', 'Xã', '103'),
('03171', 'Xã Nậm Nhừ', 'Xã', '103'),
('03172', 'Thị Trấn Mường Chà', 'Thị trấn', '097'),
('03173', 'Xã Nậm Chua', 'Xã', '103'),
('03174', 'Xã Nậm Khăn', 'Xã', '103'),
('03175', 'Xã Chà Tở', 'Xã', '103'),
('03176', 'Xã Vàng Đán', 'Xã', '103'),
('03177', 'Xã Huổi Lếnh', 'Xã', '096'),
('03178', 'Xã Xá Tổng', 'Xã', '097'),
('03181', 'Xã Mường Tùng', 'Xã', '097'),
('03184', 'Xã Lay Nưa', 'Xã', '095'),
('03187', 'Xã Chà Nưa', 'Xã', '103'),
('03190', 'Xã Hừa Ngài', 'Xã', '097'),
('03191', 'Xã Huổi Mí', 'Xã', '097'),
('03193', 'Xã Pa Ham', 'Xã', '097'),
('03194', 'Xã Nậm Nèn', 'Xã', '097'),
('03196', 'Xã Huổi Lèng', 'Xã', '097'),
('03197', 'Xã Sa Lông', 'Xã', '097'),
('03198', 'Xã Phìn Hồ', 'Xã', '103'),
('03199', 'Xã Si Pa Phìn', 'Xã', '103'),
('03200', 'Xã Ma Thì Hồ', 'Xã', '097'),
('03201', 'Xã Na Sang', 'Xã', '097'),
('03202', 'Xã Mường Mươn', 'Xã', '097'),
('03203', 'Thị trấn Điện Biên Đông', 'Thị trấn', '101'),
('03205', 'Xã Na Son', 'Xã', '101'),
('03208', 'Xã Phì Nhừ', 'Xã', '101'),
('03211', 'Xã Chiềng Sơ', 'Xã', '101'),
('03214', 'Xã Mường Luân', 'Xã', '101'),
('03217', 'Thị trấn Tủa Chùa', 'Thị trấn', '098'),
('03220', 'Xã Huổi Só', 'Xã', '098'),
('03223', 'Xã Xín Chải', 'Xã', '098'),
('03226', 'Xã Tả Sìn Thàng', 'Xã', '098'),
('03229', 'Xã Lao Xả Phình', 'Xã', '098'),
('03232', 'Xã Tả Phìn', 'Xã', '098'),
('03235', 'Xã Tủa Thàng', 'Xã', '098'),
('03238', 'Xã Trung Thu', 'Xã', '098'),
('03241', 'Xã Sính Phình', 'Xã', '098'),
('03244', 'Xã Sáng Nhè', 'Xã', '098'),
('03247', 'Xã Mường Đun', 'Xã', '098'),
('03250', 'Xã Mường Báng', 'Xã', '098'),
('03253', 'Thị trấn Tuần Giáo', 'Thị trấn', '099'),
('03256', 'Thị trấn Mường Ảng', 'Thị trấn', '102'),
('03259', 'Xã Phình Sáng', 'Xã', '099'),
('03260', 'Xã Rạng Đông', 'Xã', '099'),
('03262', 'Xã Mùn Chung', 'Xã', '099'),
('03263', 'Xã Nà Tòng', 'Xã', '099'),
('03265', 'Xã Ta Ma', 'Xã', '099'),
('03268', 'Xã Mường Mùn', 'Xã', '099'),
('03269', 'Xã Pú Xi', 'Xã', '099'),
('03271', 'Xã Pú Nhung', 'Xã', '099'),
('03274', 'Xã Quài Nưa', 'Xã', '099'),
('03277', 'Xã Mường Thín', 'Xã', '099'),
('03280', 'Xã Tỏa Tình', 'Xã', '099'),
('03283', 'Xã Nà Sáy', 'Xã', '099'),
('03284', 'Xã Mường Khong', 'Xã', '099'),
('03286', 'Xã Mường Đăng', 'Xã', '102'),
('03287', 'Xã Ngối Cáy', 'Xã', '102'),
('03289', 'Xã Quài Cang', 'Xã', '099'),
('03292', 'Xã Ẳng Tở', 'Xã', '102'),
('03295', 'Xã Quài Tở', 'Xã', '099'),
('03298', 'Xã Chiềng Sinh', 'Xã', '099'),
('03299', 'Xã Chiềng Đông', 'Xã', '099'),
('03301', 'Xã Búng Lao', 'Xã', '102'),
('03302', 'Xã Xuân Lao', 'Xã', '102'),
('03304', 'Xã Tênh Phông', 'Xã', '099'),
('03307', 'Xã Ẳng Nưa', 'Xã', '102'),
('03310', 'Xã Ẳng Cang', 'Xã', '102'),
('03312', 'Xã Nặm Lịch', 'Xã', '102'),
('03313', 'Xã Mường Lạn', 'Xã', '102'),
('03316', 'Xã Nà Tấu', 'Xã', '100'),
('03317', 'Xã Nà Nhạn', 'Xã', '100'),
('03319', 'Xã Mường Pồn', 'Xã', '100'),
('03322', 'Xã Thanh Nưa', 'Xã', '100'),
('03323', 'Xã Hua Thanh', 'Xã', '100'),
('03325', 'Xã Mường Phăng', 'Xã', '100'),
('03326', 'Xã Pá Khoang', 'Xã', '100'),
('03328', 'Xã Thanh Luông', 'Xã', '100'),
('03331', 'Xã Thanh Hưng', 'Xã', '100'),
('03334', 'Xã Thanh Xương', 'Xã', '100'),
('03337', 'Xã Thanh Chăn', 'Xã', '100'),
('03340', 'Xã Pa Thơm', 'Xã', '100'),
('03343', 'Xã Thanh An', 'Xã', '100'),
('03346', 'Xã Thanh Yên', 'Xã', '100'),
('03349', 'Xã Noong Luống', 'Xã', '100'),
('03352', 'Xã Noọng Hẹt', 'Xã', '100'),
('03355', 'Xã Sam Mứn', 'Xã', '100'),
('03356', 'Xã Pom Lót', 'Xã', '100'),
('03358', 'Xã Núa Ngam', 'Xã', '100'),
('03359', 'Xã Hẹ Muông', 'Xã', '100'),
('03361', 'Xã Na Ư', 'Xã', '100'),
('03364', 'Xã Mường Nhà', 'Xã', '100'),
('03365', 'Xã Na Tông', 'Xã', '100'),
('03367', 'Xã Mường Lói', 'Xã', '100'),
('03368', 'Xã Phu Luông', 'Xã', '100'),
('03370', 'Xã Pú Nhi', 'Xã', '101'),
('03371', 'Xã Nong U', 'Xã', '101'),
('03373', 'Xã Xa Dung', 'Xã', '101'),
('03376', 'Xã Keo Lôm', 'Xã', '101'),
('03379', 'Xã Luân Giới', 'Xã', '101'),
('03382', 'Xã Phình Giàng', 'Xã', '101'),
('03383', 'Xã Pú Hồng', 'Xã', '101'),
('03384', 'Xã Tìa Dình', 'Xã', '101'),
('03385', 'Xã Háng Lìa', 'Xã', '101'),
('03386', 'Phường Quyết Thắng', 'Phường', '105'),
('03387', 'Phường Tân Phong', 'Phường', '105'),
('03388', 'Phường Quyết Tiến', 'Phường', '105'),
('03389', 'Phường Đoàn Kết', 'Phường', '105'),
('03390', 'Thị trấn Tam Đường', 'Thị trấn', '106'),
('03391', 'Xã Lả Nhì Thàng', 'Xã', '109'),
('03394', 'Xã Thèn Sin', 'Xã', '106'),
('03397', 'Xã Sùng Phài', 'Xã', '106'),
('03400', 'Xã Tả Lèng', 'Xã', '106'),
('03403', 'Xã Nậm Loỏng', 'Xã', '105'),
('03405', 'Xã Giang Ma', 'Xã', '106'),
('03406', 'Xã Hồ Thầu', 'Xã', '106'),
('03408', 'Phường Đông Phong', 'Phường', '105'),
('03409', 'Xã San Thàng', 'Xã', '105'),
('03412', 'Xã Bình Lư', 'Xã', '106'),
('03413', 'Xã Sơn Bình', 'Xã', '106'),
('03415', 'Xã Nùng Nàng', 'Xã', '106'),
('03418', 'Xã Bản Giang', 'Xã', '106'),
('03421', 'Xã Bản Hon', 'Xã', '106'),
('03424', 'Xã Bản Bo', 'Xã', '106'),
('03427', 'Xã Nà Tăm', 'Xã', '106'),
('03430', 'Xã Khun Há', 'Xã', '106'),
('03433', 'Thị trấn Mường Tè', 'Thị trấn', '107'),
('03434', 'Thị trấn Nậm Nhùn', 'Thị trấn', '112'),
('03436', 'Xã Thu Lũm', 'Xã', '107'),
('03439', 'Xã Ka Lăng', 'Xã', '107'),
('03440', 'Xã Tá Bạ', 'Xã', '107'),
('03442', 'Xã Pa ủ', 'Xã', '107'),
('03445', 'Xã Mường Tè', 'Xã', '107'),
('03448', 'Xã Pa Vệ Sử', 'Xã', '107'),
('03451', 'Xã Mù Cả', 'Xã', '107'),
('03454', 'Xã Bun Tở', 'Xã', '107'),
('03457', 'Xã Nậm Khao', 'Xã', '107'),
('03460', 'Xã Hua Bun', 'Xã', '112'),
('03463', 'Xã Tà Tổng', 'Xã', '107'),
('03466', 'Xã Bun Nưa', 'Xã', '107'),
('03467', 'Xã Vàng San', 'Xã', '107'),
('03469', 'Xã Kan Hồ', 'Xã', '107'),
('03472', 'Xã Mường Mô', 'Xã', '112'),
('03473', 'Xã Nậm Chà', 'Xã', '112'),
('03474', 'Xã Nậm Manh', 'Xã', '112'),
('03475', 'Xã Nậm Hàng', 'Xã', '112'),
('03478', 'Thị trấn Sìn Hồ', 'Thị trấn', '108'),
('03481', 'Xã Lê Lợi', 'Xã', '112'),
('03484', 'Xã Pú Đao', 'Xã', '112'),
('03487', 'Xã Chăn Nưa', 'Xã', '108'),
('03488', 'Xã Nậm Pì', 'Xã', '112'),
('03490', 'Xã Huổi Luông', 'Xã', '109'),
('03493', 'Xã Pa Tần', 'Xã', '108'),
('03496', 'Xã Phìn Hồ', 'Xã', '108'),
('03499', 'Xã Hồng Thu', 'Xã', '108'),
('03502', 'Xã Nậm Ban', 'Xã', '112'),
('03503', 'Xã Trung Chải', 'Xã', '112'),
('03505', 'Xã Phăng Sô Lin', 'Xã', '108'),
('03508', 'Xã Ma Quai', 'Xã', '108'),
('03509', 'Xã Lùng Thàng', 'Xã', '108'),
('03511', 'Xã Tả Phìn', 'Xã', '108'),
('03514', 'Xã Sà Dề Phìn', 'Xã', '108'),
('03517', 'Xã Nậm Tăm', 'Xã', '108'),
('03520', 'Xã Tả Ngảo', 'Xã', '108'),
('03523', 'Xã Pu Sam Cáp', 'Xã', '108'),
('03526', 'Xã Nậm Cha', 'Xã', '108'),
('03527', 'Xã Pa Khoá', 'Xã', '108'),
('03529', 'Xã Làng Mô', 'Xã', '108'),
('03532', 'Xã Noong Hẻo', 'Xã', '108'),
('03535', 'Xã Nậm Mạ', 'Xã', '108'),
('03538', 'Xã Căn Co', 'Xã', '108'),
('03541', 'Xã Tủa Sín Chải', 'Xã', '108'),
('03544', 'Xã Nậm Cuổi', 'Xã', '108'),
('03547', 'Xã Nậm Hăn', 'Xã', '108'),
('03549', 'Thị trấn Phong Thổ', 'Thị trấn', '109'),
('03550', 'Xã Sì Lờ Lầu', 'Xã', '109'),
('03553', 'Xã Mồ Sì San', 'Xã', '109'),
('03556', 'Xã Ma Li Chải', 'Xã', '109'),
('03559', 'Xã Pa Vây Sử', 'Xã', '109'),
('03562', 'Xã Vàng Ma Chải', 'Xã', '109'),
('03565', 'Xã Tông Qua Lìn', 'Xã', '109'),
('03568', 'Xã Mù Sang', 'Xã', '109'),
('03571', 'Xã Dào San', 'Xã', '109');
INSERT INTO `devvn_xaphuongthitran` (`xaid`, `name`, `type`, `maqh`) VALUES
('03574', 'Xã Ma Ly Pho', 'Xã', '109'),
('03577', 'Xã Bản Lang', 'Xã', '109'),
('03580', 'Xã Hoang Thèn', 'Xã', '109'),
('03583', 'Xã Khổng Lào', 'Xã', '109'),
('03586', 'Xã Nậm Xe', 'Xã', '109'),
('03589', 'Xã Mường So', 'Xã', '109'),
('03592', 'Xã Sin Suối Hồ', 'Xã', '109'),
('03595', 'Thị trấn Than Uyên', 'Thị trấn', '110'),
('03598', 'Thị trấn Tân Uyên', 'Thị trấn', '111'),
('03601', 'Xã Mường Khoa', 'Xã', '111'),
('03602', 'Xã Phúc Khoa', 'Xã', '111'),
('03604', 'Xã Thân Thuộc', 'Xã', '111'),
('03605', 'Xã Trung Đồng', 'Xã', '111'),
('03607', 'Xã Hố Mít', 'Xã', '111'),
('03610', 'Xã Nậm Cần', 'Xã', '111'),
('03613', 'Xã Nậm Sỏ', 'Xã', '111'),
('03616', 'Xã Pắc Ta', 'Xã', '111'),
('03618', 'Xã Phúc Than', 'Xã', '110'),
('03619', 'Xã Mường Than', 'Xã', '110'),
('03622', 'Xã Tà Mít', 'Xã', '111'),
('03625', 'Xã Mường Mít', 'Xã', '110'),
('03628', 'Xã Pha Mu', 'Xã', '110'),
('03631', 'Xã Mường Cang', 'Xã', '110'),
('03632', 'Xã Hua Nà', 'Xã', '110'),
('03634', 'Xã Tà Hừa', 'Xã', '110'),
('03637', 'Xã Mường Kim', 'Xã', '110'),
('03638', 'Xã Tà Mung', 'Xã', '110'),
('03640', 'Xã Tà Gia', 'Xã', '110'),
('03643', 'Xã Khoen On', 'Xã', '110'),
('03646', 'Phường Chiềng Lề', 'Phường', '116'),
('03649', 'Phường Tô Hiệu', 'Phường', '116'),
('03652', 'Phường Quyết Thắng', 'Phường', '116'),
('03655', 'Phường Quyết Tâm', 'Phường', '116'),
('03658', 'Xã Chiềng Cọ', 'Xã', '116'),
('03661', 'Xã Chiềng Đen', 'Xã', '116'),
('03664', 'Xã Chiềng Xôm', 'Xã', '116'),
('03667', 'Phường Chiềng An', 'Phường', '116'),
('03670', 'Phường Chiềng Cơi', 'Phường', '116'),
('03673', 'Xã Chiềng Ngần', 'Xã', '116'),
('03676', 'Xã Hua La', 'Xã', '116'),
('03679', 'Phường Chiềng Sinh', 'Phường', '116'),
('03682', 'Xã Mường Chiên', 'Xã', '118'),
('03685', 'Xã Cà Nàng', 'Xã', '118'),
('03688', 'Xã Chiềng Khay', 'Xã', '118'),
('03694', 'Xã Mường Giôn', 'Xã', '118'),
('03697', 'Xã Pá Ma Pha Khinh', 'Xã', '118'),
('03700', 'Xã Chiềng Ơn', 'Xã', '118'),
('03703', 'Xã Mường Giàng', 'Xã', '118'),
('03706', 'Xã Chiềng Bằng', 'Xã', '118'),
('03709', 'Xã Mường Sại', 'Xã', '118'),
('03712', 'Xã Nậm ét', 'Xã', '118'),
('03718', 'Xã Chiềng Khoang', 'Xã', '118'),
('03721', 'Thị trấn Thuận Châu', 'Thị trấn', '119'),
('03724', 'Xã Phỏng Lái', 'Xã', '119'),
('03727', 'Xã Mường é', 'Xã', '119'),
('03730', 'Xã Chiềng Pha', 'Xã', '119'),
('03733', 'Xã Chiềng La', 'Xã', '119'),
('03736', 'Xã Chiềng Ngàm', 'Xã', '119'),
('03739', 'Xã Liệp Tè', 'Xã', '119'),
('03742', 'Xã é Tòng', 'Xã', '119'),
('03745', 'Xã Phỏng Lập', 'Xã', '119'),
('03748', 'Xã Chiềng Sơ', 'Xã', '119'),
('03751', 'Xã Chiềng Ly', 'Xã', '119'),
('03754', 'Xã Nong Lay', 'Xã', '119'),
('03757', 'Xã Mường Khiêng', 'Xã', '119'),
('03760', 'Xã Mường Bám', 'Xã', '119'),
('03763', 'Xã Long Hẹ', 'Xã', '119'),
('03766', 'Xã Chiềng Bôm', 'Xã', '119'),
('03769', 'Xã Thôn Mòn', 'Xã', '119'),
('03772', 'Xã Tòng Lệnh', 'Xã', '119'),
('03775', 'Xã Tòng Cọ', 'Xã', '119'),
('03778', 'Xã Bó Mười', 'Xã', '119'),
('03781', 'Xã Co Mạ', 'Xã', '119'),
('03784', 'Xã Púng Tra', 'Xã', '119'),
('03787', 'Xã Chiềng Pấc', 'Xã', '119'),
('03790', 'Xã Nậm Lầu', 'Xã', '119'),
('03793', 'Xã Bon Phặng', 'Xã', '119'),
('03796', 'Xã Co Tòng', 'Xã', '119'),
('03799', 'Xã Muội Nọi', 'Xã', '119'),
('03802', 'Xã Pá Lông', 'Xã', '119'),
('03805', 'Xã Bản Lầm', 'Xã', '119'),
('03808', 'Thị trấn Ít Ong', 'Thị trấn', '120'),
('03811', 'Xã Nậm Giôn', 'Xã', '120'),
('03814', 'Xã Chiềng Lao', 'Xã', '120'),
('03817', 'Xã Hua Trai', 'Xã', '120'),
('03820', 'Xã Ngọc Chiến', 'Xã', '120'),
('03823', 'Xã Mường Trai', 'Xã', '120'),
('03826', 'Xã Nậm Păm', 'Xã', '120'),
('03829', 'Xã Chiềng Muôn', 'Xã', '120'),
('03832', 'Xã Chiềng Ân', 'Xã', '120'),
('03835', 'Xã Pi Toong', 'Xã', '120'),
('03838', 'Xã Chiềng Công', 'Xã', '120'),
('03841', 'Xã Tạ Bú', 'Xã', '120'),
('03844', 'Xã Chiềng San', 'Xã', '120'),
('03847', 'Xã Mường Bú', 'Xã', '120'),
('03850', 'Xã Chiềng Hoa', 'Xã', '120'),
('03853', 'Xã Mường Chùm', 'Xã', '120'),
('03856', 'Thị trấn Bắc Yên', 'Thị trấn', '121'),
('03859', 'Xã Phiêng Ban', 'Xã', '121'),
('03862', 'Xã Hang Chú', 'Xã', '121'),
('03865', 'Xã Xín Vàng', 'Xã', '121'),
('03868', 'Xã Tà Xùa', 'Xã', '121'),
('03869', 'Xã Háng Đồng', 'Xã', '121'),
('03871', 'Xã Bắc Ngà', 'Xã', '121'),
('03874', 'Xã Làng Chếu', 'Xã', '121'),
('03877', 'Xã Chim Vàn', 'Xã', '121'),
('03880', 'Xã Mường Khoa', 'Xã', '121'),
('03883', 'Xã Song Pe', 'Xã', '121'),
('03886', 'Xã Hồng Ngài', 'Xã', '121'),
('03889', 'Xã Tạ Khoa', 'Xã', '121'),
('03890', 'Xã Hua Nhàn', 'Xã', '121'),
('03892', 'Xã Phiêng Kôn', 'Xã', '121'),
('03895', 'Xã Chiềng Sại', 'Xã', '121'),
('03898', 'Thị trấn Phù Yên', 'Thị trấn', '122'),
('03901', 'Xã Suối Tọ', 'Xã', '122'),
('03904', 'Xã Mường Thải', 'Xã', '122'),
('03907', 'Xã Mường Cơi', 'Xã', '122');

-- --------------------------------------------------------

--
-- Table structure for table `di_ct`
--

CREATE TABLE `di_ct` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_CT` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_nghi_phep`
--

CREATE TABLE `don_nghi_phep` (
  `STT_DON` int(11) NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAY_XIN_PHEP` datetime DEFAULT NULL,
  `NGAY_BAT_DAU_NGHI` datetime DEFAULT NULL,
  `NGAY_KT_NGHI` datetime DEFAULT NULL,
  `LI_DO` text COLLATE utf8_vietnamese_ci,
  `MA_NP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duoc_giam_tru`
--

CREATE TABLE `duoc_giam_tru` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_GIAM_TRU` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_SO` int(11) NOT NULL,
  `NGAY_BAT_DAU_DONG` int(11) NOT NULL,
  `NGAY_KET_THUC_DONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `du_an`
--

CREATE TABLE `du_an` (
  `MA_DU_AN` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_DU_AN` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SO_LUONG_THAM_GIA` int(11) DEFAULT NULL,
  `NGAY_BAT_DAU` datetime DEFAULT NULL,
  `NGAY_KET_THUC` datetime DEFAULT NULL,
  `NOI_DUNG` text COLLATE utf8_vietnamese_ci,
  `PHAN_CONG` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giam_doc_nhan_su`
--

CREATE TABLE `giam_doc_nhan_su` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `giam_doc_nhan_su`
--

INSERT INTO `giam_doc_nhan_su` (`ID_NV`) VALUES
('NV005');

-- --------------------------------------------------------

--
-- Table structure for table `he_so_luong`
--

CREATE TABLE `he_so_luong` (
  `MA_HE_SO` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `HE_SO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `he_so_luong`
--

INSERT INTO `he_so_luong` (`MA_HE_SO`, `HE_SO`) VALUES
('hs1', 1.5),
('hs2', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `hop_dong_lao_dong`
--

CREATE TABLE `hop_dong_lao_dong` (
  `MA_HD` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIA_ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `THOI_GIAN_BAT_DAU` date DEFAULT NULL,
  `THOI_GIAN_KET_THUC` date DEFAULT NULL,
  `DIA_DIEM_LAM_VIEC` text COLLATE utf8_vietnamese_ci,
  `THOI_GIAN_LAM_VIEC` text COLLATE utf8_vietnamese_ci,
  `MA_LOAI_HD` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TEN_HOP_DONG` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAY_KI` date NOT NULL,
  `MUC_LUONG` int(11) NOT NULL,
  `DUNG_CU_LAM_VIEC` text COLLATE utf8_vietnamese_ci NOT NULL,
  `THOI_GIAN_NGHI` int(11) NOT NULL,
  `VI_TRI_CONG_VIEC` text COLLATE utf8_vietnamese_ci NOT NULL,
  `HINH_THUC_LAM_VIEC` text COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_HE_SO` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hop_dong_lao_dong`
--

INSERT INTO `hop_dong_lao_dong` (`MA_HD`, `ID_NV`, `GIA_ID_NV`, `THOI_GIAN_BAT_DAU`, `THOI_GIAN_KET_THUC`, `DIA_DIEM_LAM_VIEC`, `THOI_GIAN_LAM_VIEC`, `MA_LOAI_HD`, `TEN_HOP_DONG`, `NGAY_KI`, `MUC_LUONG`, `DUNG_CU_LAM_VIEC`, `THOI_GIAN_NGHI`, `VI_TRI_CONG_VIEC`, `HINH_THUC_LAM_VIEC`, `MA_HE_SO`) VALUES
('hd001', 'NV001', 'NV005', '2016-07-11', NULL, 'Cần Thơ', 'Sáng:8h30-12h\r\nChiều:13h-17h', 'v2', 'Hợp đồng làm việc', '2016-07-09', 6000000, '1 Laptop hiệu Asus', 12, 'NV\r\n', 'Toàn thời gian', 'hs1'),
('hd002', 'NV002', 'NV005', '2016-07-02', '2018-07-02', 'Cần Thơ', 'Sáng:8h30-12h\r\n Chiều:13h-17h', 'v1', 'Hợp đồng làm việc', '2016-07-01', 5000000, '1 Laptop hiệu Asus', 12, 'NV', 'Toàn thời gian', 'hs1'),
('hd003', 'NV003', 'NV005', '2016-07-02', NULL, 'Cần Thơ', 'Sáng:8h30-12h\r\n Chiều:13h-17h', 'v2', 'Hợp đồng làm việc', '2016-07-01', 5000000, '1 Laptop hiệu Asus', 12, 'NV', 'Toàn thời gian', 'hs1'),
('hd004', 'NV004', 'NV005', '2017-07-10', NULL, 'Cần Thơ', 'Sáng:8h30-12h\r\n Chiều:13h-17h', 'v2', 'Hợp đồng làm việc', '2017-07-03', 5000000, '1 Laptop hiệu Asus', 12, 'NV', 'Toàn thời gian', 'hs1'),
('hd005', 'NV001', 'NV005', '2015-07-13', NULL, 'Cần Thơ', 'Sáng:8h30-12h\r\n Chiều:13h-17h', 'v2', 'Hợp đồng làm việc', '2015-07-02', 5000000, '1 Laptop hiệu Asus', 12, 'NV', 'Toàn thời gian', 'hs1');

-- --------------------------------------------------------

--
-- Table structure for table `khen_thuong`
--

CREATE TABLE `khen_thuong` (
  `MA_QD_KT` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIA_ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAY_KY_KT` date DEFAULT NULL,
  `NGAY_THUC_HIEN_KT` date DEFAULT NULL,
  `LY_DO` text COLLATE utf8_vietnamese_ci,
  `TIEN_THUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khen_thuong`
--

INSERT INTO `khen_thuong` (`MA_QD_KT`, `ID_NV`, `GIA_ID_NV`, `NGAY_KY_KT`, `NGAY_THUC_HIEN_KT`, `LY_DO`, `TIEN_THUONG`) VALUES
('q1132', 'NV001', 'NV005', '2018-07-01', '2018-07-08', 'Làm việc tốt', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `ki_luat`
--

CREATE TABLE `ki_luat` (
  `MA_KL` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIA_ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAY_KI_KL` date DEFAULT NULL,
  `LY_DO` text COLLATE utf8_vietnamese_ci,
  `NGAY_THUC_HIEN_KL` date DEFAULT NULL,
  `MUC_PHAT` int(11) NOT NULL,
  `HINH_THUC_KI_LUAT` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ki_nang`
--

CREATE TABLE `ki_nang` (
  `MA_KN` int(11) NOT NULL,
  `TEN_KN` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `ki_nang`
--

INSERT INTO `ki_nang` (`MA_KN`, `TEN_KN`) VALUES
(1, '.NET'),
(2, 'ASP.NET'),
(3, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `loai_hop_dong`
--

CREATE TABLE `loai_hop_dong` (
  `MA_LOAI_HD` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_LOAI_HD` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loai_hop_dong`
--

INSERT INTO `loai_hop_dong` (`MA_LOAI_HD`, `TEN_LOAI_HD`) VALUES
('v1', 'Hợp đồng 3 năm'),
('v2', 'Hợp đồng vô thời hạn');

-- --------------------------------------------------------

--
-- Table structure for table `loai_nghi_phep`
--

CREATE TABLE `loai_nghi_phep` (
  `MA_NP` int(11) NOT NULL,
  `TEN_NP` int(11) DEFAULT NULL,
  `THOI_GIAN_TOI_DA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_tai_khoan`
--

CREATE TABLE `loai_tai_khoan` (
  `MA_LOAI_TK` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_LOAITK` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loai_tai_khoan`
--

INSERT INTO `loai_tai_khoan` (`MA_LOAI_TK`, `TEN_LOAITK`) VALUES
('A', 'Quản trị hệ thống'),
('B', 'Phòng nhân sự');

-- --------------------------------------------------------

--
-- Table structure for table `luong`
--

CREATE TABLE `luong` (
  `LUONG_DU_AN` int(11) DEFAULT NULL,
  `LUONG_THUONG` int(11) DEFAULT NULL,
  `NGAY_LAP` date NOT NULL,
  `TONG_LUONG_TRUOC_KHAU_TRU` int(11) DEFAULT NULL,
  `STT` int(11) NOT NULL,
  `TONG_LUONG_SAU_KHAU_TRU` int(11) DEFAULT NULL,
  `PHI_BAO_HIEM` int(11) NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `SO_NGAY_CONG` int(11) DEFAULT '0',
  `LUONG_CO_BAN` int(11) NOT NULL,
  `THUE_TNCN` int(11) NOT NULL,
  `TIEN_PHU_CAP` int(11) NOT NULL,
  `NGUOI_LAP` varchar(225) COLLATE utf8_vietnamese_ci NOT NULL,
  `TANG_CA` int(11) DEFAULT NULL,
  `MA_HE_SO` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `THANG` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIO_LAM_THEM` int(11) DEFAULT NULL,
  `TIEN_PHAT` int(11) NOT NULL,
  `LUONG_MOT_H` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `luong`
--

INSERT INTO `luong` (`LUONG_DU_AN`, `LUONG_THUONG`, `NGAY_LAP`, `TONG_LUONG_TRUOC_KHAU_TRU`, `STT`, `TONG_LUONG_SAU_KHAU_TRU`, `PHI_BAO_HIEM`, `ID_NV`, `SO_NGAY_CONG`, `LUONG_CO_BAN`, `THUE_TNCN`, `TIEN_PHU_CAP`, `NGUOI_LAP`, `TANG_CA`, `MA_HE_SO`, `THANG`, `GIO_LAM_THEM`, `TIEN_PHAT`, `LUONG_MOT_H`) VALUES
(NULL, 0, '2018-07-10', 9149936, 66, 8194443, 955493, 'NV001', 22, 6000000, 0, 150000, 'NV001', 0, 'hs1', '2018-06', NULL, 0, 51136);

-- --------------------------------------------------------

--
-- Table structure for table `luong_phu_cap`
--

CREATE TABLE `luong_phu_cap` (
  `STT` int(11) NOT NULL,
  `MA_PHU_CAP` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `SO_TIEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `luong_phu_cap`
--

INSERT INTO `luong_phu_cap` (`STT`, `MA_PHU_CAP`, `SO_TIEN`) VALUES
(66, 'PCTN', 100000),
(66, 'PCXC', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muc_luong`
--

CREATE TABLE `muc_luong` (
  `ID` int(11) NOT NULL,
  `LUONG_CO_BAN` int(11) NOT NULL,
  `SO_NAM_KINH NGHIEM` int(11) NOT NULL,
  `MA_PB` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_CV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_HE_SO` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `HO_TEN` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `GIOI_TINH` varchar(4) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NGAY_SINH` date DEFAULT NULL,
  `NOI_SINH` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TON_GIAO` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DAN_TOC` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SO_NHA` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `maqh` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `xaid` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `matp` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CMND` int(12) DEFAULT NULL,
  `NGAY_CAP` date DEFAULT NULL,
  `NOI_CAP` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MA_THENH` int(20) DEFAULT NULL,
  `SDT` varchar(12) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EMAIL` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MA_PB` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ANH_DAI_DIEN` text COLLATE utf8_vietnamese_ci,
  `NGAY_VAO_LAM` date NOT NULL,
  `LUONG_CO_BAN` int(11) NOT NULL,
  `NGUOI_PHU_THUOC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`ID_NV`, `MA_HE_SO`, `HO_TEN`, `GIOI_TINH`, `NGAY_SINH`, `NOI_SINH`, `TON_GIAO`, `DAN_TOC`, `SO_NHA`, `maqh`, `xaid`, `matp`, `CMND`, `NGAY_CAP`, `NOI_CAP`, `MA_THENH`, `SDT`, `EMAIL`, `MA_PB`, `ANH_DAI_DIEN`, `NGAY_VAO_LAM`, `LUONG_CO_BAN`, `NGUOI_PHU_THUOC`) VALUES
('NV001', 'hs1', 'Nguyễn Văn A', 'nam', '1995-06-24', 'An Giang', 'Kinh', 'NULL', '1223', '040', '01267', '04', 13243234, '2014-03-31', 'Cần Thơ', 1324, '001234567', 'badman1@gmail.com', 'IH', '1531127831_i1.jpg', '2018-06-25', 5000000, 0),
('NV002', 'hs1', 'Dương Thị Thùy An', 'nữ', '2018-06-05', 'ddsdsa', 'ads', 'dssa', 'qeqw', '061', '01888', '06', 2312, '2018-05-27', 'frwe', 132435, '2214', 'badman2@gmail.com', 'NS', '1531208416_i2.jpg', '2018-06-27', 5000000, 1),
('NV003', 'hs1', 'Nguyễn Thị Nhật Linh', 'nam', '2018-06-05', 'ddsdsa', 'ads', 'dssa', 'qeqw', '061', '01888', '06', 2312, '2018-05-27', 'frwe', 132435, '2214', 'badman3@gmail.com', 'KT', '1531245054_i3.jpg', '2018-06-27', 0, 0),
('NV004', 'hs1', 'Nguyễn Văn Minh', 'nam', '2000-12-01', 'Kiên Giang', 'Kito giáo', 'Kinh', '12/45', '002', '00070', '01', 21324990, '2016-06-06', 'TP Hà Nội', 324234, '2132423', 'badman4@gmail.com', 'IH', '1530851655_avatar.png', '2018-06-27', 5000000, 6),
('NV005', 'hs1', 'Thanh Nghiên', 'nữ', '2000-12-01', 'Kiên Giang', 'Kito giáo', 'Kinh', '12/45', '002', '00070', '01', 21324, '2016-06-06', 'TP Hà Nội', 3242222, '213243', 'badman5@gmail.com', 'NS', '1530030755_Enju.jpg', '2018-06-27', 0, 0);

--
-- Triggers `nhan_vien`
--
DELIMITER $$
CREATE TRIGGER `auto_id_insert` BEFORE INSERT ON `nhan_vien` FOR EACH ROW BEGIN
  INSERT INTO nv_sq VALUES (NULL);
  SET NEW.ID_NV = CONCAT('NV', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien_bao_hiem`
--

CREATE TABLE `nhan_vien_bao_hiem` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_GIAM_TRU` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhan_vien_bao_hiem`
--

INSERT INTO `nhan_vien_bao_hiem` (`ID_NV`, `MA_GIAM_TRU`) VALUES
('NV001', 'bhtn'),
('NV001', 'bhxh'),
('NV001', 'bhyt'),
('NV004', 'bhxh');

-- --------------------------------------------------------

--
-- Table structure for table `nv_sq`
--

CREATE TABLE `nv_sq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nv_sq`
--

INSERT INTO `nv_sq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_luong_bao_hiem`
--

CREATE TABLE `phieu_luong_bao_hiem` (
  `MA_GIAM_TRU` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `SO_TIEN` int(11) NOT NULL,
  `STT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phieu_luong_bao_hiem`
--

INSERT INTO `phieu_luong_bao_hiem` (`MA_GIAM_TRU`, `SO_TIEN`, `STT`) VALUES
('bhtn', 87087, 48),
('bhtn', 196652, 49),
('bhtn', 196652, 50),
('bhtn', 196652, 51),
('bhtn', 196652, 52),
('bhtn', 196652, 53),
('bhtn', 3000, 54),
('bhtn', 2000, 55),
('bhtn', 196652, 56),
('bhtn', 3000, 57),
('bhtn', 87087, 58),
('bhtn', 1000, 59),
('bhtn', 91000, 60),
('bhtn', 91000, 61),
('bhtn', 91000, 62),
('bhtn', 92304, 63),
('bhtn', 101434, 64),
('bhtn', 3000, 65),
('bhtn', 90999, 66),
('bhxh', 130630, 48),
('bhxh', 294978, 49),
('bhxh', 294978, 50),
('bhxh', 294978, 51),
('bhxh', 294978, 52),
('bhxh', 294978, 53),
('bhxh', 4500, 54),
('bhxh', 3000, 55),
('bhxh', 294978, 56),
('bhxh', 4500, 57),
('bhxh', 130630, 58),
('bhxh', 1500, 59),
('bhxh', 136500, 60),
('bhxh', 136500, 61),
('bhxh', 136500, 62),
('bhxh', 138456, 63),
('bhxh', 152152, 64),
('bhxh', 4500, 65),
('bhxh', 136499, 66),
('bhyt', 696695, 48),
('bhyt', 1573216, 49),
('bhyt', 1573216, 50),
('bhyt', 1573216, 51),
('bhyt', 1573216, 52),
('bhyt', 1573216, 53),
('bhyt', 24000, 54),
('bhyt', 16000, 55),
('bhyt', 1573216, 56),
('bhyt', 24000, 57),
('bhyt', 696695, 58),
('bhyt', 8000, 59),
('bhyt', 727999, 60),
('bhyt', 727999, 61),
('bhyt', 727999, 62),
('bhyt', 738432, 63),
('bhyt', 811475, 64),
('bhyt', 24000, 65),
('bhyt', 727995, 66);

-- --------------------------------------------------------

--
-- Table structure for table `phong_ban`
--

CREATE TABLE `phong_ban` (
  `MA_PB` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_PB` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phong_ban`
--

INSERT INTO `phong_ban` (`MA_PB`, `TEN_PB`) VALUES
('dqwd', 'dwfd dfwrf'),
('IH', 'Phòng IT'),
('KT', 'Kế toán'),
('NS', 'Nhân sự');

-- --------------------------------------------------------

--
-- Table structure for table `phu_cap`
--

CREATE TABLE `phu_cap` (
  `MA_PHU_CAP` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TEN_PHU_CAP` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MUC_PHU_CAP` int(11) DEFAULT NULL,
  `TINH_BH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phu_cap`
--

INSERT INTO `phu_cap` (`MA_PHU_CAP`, `TEN_PHU_CAP`, `MUC_PHU_CAP`, `TINH_BH`) VALUES
('PC01', 'Phụ cấp chức vụ', 200000, 1),
('PCTN', 'Phụ cấp thâm niên', 100000, 1),
('PCXC', 'Phụ cấp xăng xe', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qua_trinh_cong_tac`
--

CREATE TABLE `qua_trinh_cong_tac` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_CV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `THOI_GIAN_BAT_DAU_LV` date DEFAULT NULL,
  `THOI_GIAN_KET_THUC_LV` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `qua_trinh_cong_tac`
--

INSERT INTO `qua_trinh_cong_tac` (`ID_NV`, `MA_CV`, `THOI_GIAN_BAT_DAU_LV`, `THOI_GIAN_KET_THUC_LV`) VALUES
('NV001', 'NV', '2015-07-13', NULL),
('NV002', 'NV', '2016-07-02', NULL),
('NV003', 'NV', '2018-06-27', NULL),
('NV004', 'NV', '2018-06-27', NULL),
('NV005', 'NV', '2018-06-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyet_dinh_nghi_viec`
--

CREATE TABLE `quyet_dinh_nghi_viec` (
  `MA_QD` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIA_ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAY_THOI_VIEC` datetime DEFAULT NULL,
  `LI_DO` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `so_lan_phep`
--

CREATE TABLE `so_lan_phep` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_NP` int(11) NOT NULL,
  `SO_LAN_CON_LAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MA_LOAI_TK` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`username`, `ID_NV`, `password`, `MA_LOAI_TK`, `remember_token`, `created_at`, `updated_at`, `id`) VALUES
('nva', 'NV001', '$2y$10$btKsuHx0sGLtrRK1tRapIeFTZ82rbZ3WMEwd7svaCsh.9DJswI6NG', 'A', 'h7z1GWM9IyuzCbia0uqwnhhQuTpfUBt5MaNOaIef1Abo4TFphzGEADnsCSTR', '2018-07-06 04:32:30', '0000-00-00 00:00:00', 1),
('nvm', 'NV004', '$2y$10$WtMzzjOVXZ9ZA3na6bfwGeDmg0AsWJIbMaHVeBbPlzv013XfDwzLC', 'A', NULL, '2018-07-06 04:32:23', '2018-07-05 21:32:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tham_gia`
--

CREATE TABLE `tham_gia` (
  `ID_NV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_DU_AN` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIAI_DOAN` int(11) NOT NULL,
  `CONG_VIEC` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuoc_pb_cv`
--

CREATE TABLE `thuoc_pb_cv` (
  `MA_CV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MA_PB` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `thuoc_pb_cv`
--

INSERT INTO `thuoc_pb_cv` (`MA_CV`, `MA_PB`) VALUES
('0', '0'),
('TPIT', 'IH');

-- --------------------------------------------------------

--
-- Table structure for table `tuyen_dung`
--

CREATE TABLE `tuyen_dung` (
  `MA_TD` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `DOT_TUYEN_DUNG` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `THOI_GIAN_TUYEN` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD PRIMARY KEY (`MA_BC`);

--
-- Indexes for table `bao_hiem`
--
ALTER TABLE `bao_hiem`
  ADD PRIMARY KEY (`MA_GIAM_TRU`),
  ADD KEY `AK_Identifier_3` (`MA_GIAM_TRU`);

--
-- Indexes for table `cham_cong`
--
ALTER TABLE `cham_cong`
  ADD PRIMARY KEY (`STT_CONG`);

--
-- Indexes for table `chi_tiet`
--
ALTER TABLE `chi_tiet`
  ADD PRIMARY KEY (`MA_CV`,`MA_TD`),
  ADD KEY `FK_TD` (`MA_TD`);

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`MA_CV`);

--
-- Indexes for table `cong_tac`
--
ALTER TABLE `cong_tac`
  ADD PRIMARY KEY (`MA_CT`),
  ADD KEY `AK_Identifier_1` (`MA_CT`);

--
-- Indexes for table `co_bc`
--
ALTER TABLE `co_bc`
  ADD PRIMARY KEY (`ID_NV`,`MA_BC`),
  ADD KEY `FK_BC_BC` (`MA_BC`);

--
-- Indexes for table `co_giam_tru`
--
ALTER TABLE `co_giam_tru`
  ADD PRIMARY KEY (`MA_HD`,`MA_GIAM_TRU`);

--
-- Indexes for table `co_kn`
--
ALTER TABLE `co_kn`
  ADD PRIMARY KEY (`ID_NV`,`MA_KN`),
  ADD KEY `FK_CO_KN` (`MA_KN`);

--
-- Indexes for table `co_phu_cap`
--
ALTER TABLE `co_phu_cap`
  ADD PRIMARY KEY (`ID_NV`,`MA_PHU_CAP`),
  ADD KEY `FK_CO_PHU_CAP_NV` (`MA_PHU_CAP`);

--
-- Indexes for table `co_phu_cap_hd`
--
ALTER TABLE `co_phu_cap_hd`
  ADD PRIMARY KEY (`MA_PHU_CAP`,`MA_HD`),
  ADD KEY `FK_HD` (`MA_HD`);

--
-- Indexes for table `devvn_quanhuyen`
--
ALTER TABLE `devvn_quanhuyen`
  ADD PRIMARY KEY (`maqh`);

--
-- Indexes for table `devvn_tinhthanhpho`
--
ALTER TABLE `devvn_tinhthanhpho`
  ADD PRIMARY KEY (`matp`);

--
-- Indexes for table `devvn_xaphuongthitran`
--
ALTER TABLE `devvn_xaphuongthitran`
  ADD PRIMARY KEY (`xaid`);

--
-- Indexes for table `di_ct`
--
ALTER TABLE `di_ct`
  ADD PRIMARY KEY (`ID_NV`,`MA_CT`),
  ADD KEY `FK_DI_CT` (`MA_CT`);

--
-- Indexes for table `don_nghi_phep`
--
ALTER TABLE `don_nghi_phep`
  ADD PRIMARY KEY (`STT_DON`),
  ADD KEY `AK_Identifier_1` (`STT_DON`),
  ADD KEY `FK_CO_XIN_PHEP` (`ID_NV`),
  ADD KEY `FK_LOAI_NP` (`MA_NP`);

--
-- Indexes for table `duoc_giam_tru`
--
ALTER TABLE `duoc_giam_tru`
  ADD PRIMARY KEY (`ID_NV`,`MA_GIAM_TRU`),
  ADD KEY `FK_DUOC_GIAM_TRU` (`MA_GIAM_TRU`);

--
-- Indexes for table `du_an`
--
ALTER TABLE `du_an`
  ADD PRIMARY KEY (`MA_DU_AN`),
  ADD KEY `AK_Identifier_1` (`MA_DU_AN`);

--
-- Indexes for table `giam_doc_nhan_su`
--
ALTER TABLE `giam_doc_nhan_su`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indexes for table `he_so_luong`
--
ALTER TABLE `he_so_luong`
  ADD PRIMARY KEY (`MA_HE_SO`),
  ADD KEY `AK_Identifier_1` (`MA_HE_SO`);

--
-- Indexes for table `hop_dong_lao_dong`
--
ALTER TABLE `hop_dong_lao_dong`
  ADD PRIMARY KEY (`MA_HD`),
  ADD KEY `AK_Identifier_1` (`MA_HD`),
  ADD KEY `FK_KY_HD` (`GIA_ID_NV`),
  ADD KEY `FK_CO_HD` (`ID_NV`),
  ADD KEY `FK_LOAI_HD` (`MA_LOAI_HD`);

--
-- Indexes for table `khen_thuong`
--
ALTER TABLE `khen_thuong`
  ADD PRIMARY KEY (`MA_QD_KT`),
  ADD KEY `AK_Identifier_1` (`MA_QD_KT`),
  ADD KEY `FK_DUOC_KT` (`ID_NV`),
  ADD KEY `FK_KI_KT` (`GIA_ID_NV`);

--
-- Indexes for table `ki_luat`
--
ALTER TABLE `ki_luat`
  ADD PRIMARY KEY (`MA_KL`),
  ADD KEY `AK_Identifier_1` (`MA_KL`),
  ADD KEY `FK_BI_KL` (`ID_NV`),
  ADD KEY `FK_KY_KL` (`GIA_ID_NV`);

--
-- Indexes for table `ki_nang`
--
ALTER TABLE `ki_nang`
  ADD PRIMARY KEY (`MA_KN`),
  ADD KEY `AK_Identifier_1` (`MA_KN`),
  ADD KEY `AK_Identifier_2` (`MA_KN`);

--
-- Indexes for table `loai_hop_dong`
--
ALTER TABLE `loai_hop_dong`
  ADD PRIMARY KEY (`MA_LOAI_HD`),
  ADD KEY `AK_Identifier_1` (`MA_LOAI_HD`);

--
-- Indexes for table `loai_nghi_phep`
--
ALTER TABLE `loai_nghi_phep`
  ADD PRIMARY KEY (`MA_NP`),
  ADD KEY `AK_Identifier_1` (`MA_NP`);

--
-- Indexes for table `loai_tai_khoan`
--
ALTER TABLE `loai_tai_khoan`
  ADD PRIMARY KEY (`MA_LOAI_TK`);

--
-- Indexes for table `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `fk_id_nv` (`ID_NV`),
  ADD KEY `FK_HE_SO` (`MA_HE_SO`);

--
-- Indexes for table `luong_phu_cap`
--
ALTER TABLE `luong_phu_cap`
  ADD KEY `FK_LUONG` (`STT`),
  ADD KEY `FK_PHU_CAP` (`MA_PHU_CAP`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muc_luong`
--
ALTER TABLE `muc_luong`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ID_NV`),
  ADD KEY `AK_Identifier_1` (`ID_NV`),
  ADD KEY `AK_Identifier_2` (`ID_NV`),
  ADD KEY `FK_CO_HE_SO` (`MA_HE_SO`),
  ADD KEY `FK_THUOC_PB` (`MA_PB`),
  ADD KEY `FK_TINH` (`matp`),
  ADD KEY `FK_QUAN` (`maqh`),
  ADD KEY `FK_XA` (`xaid`);

--
-- Indexes for table `nhan_vien_bao_hiem`
--
ALTER TABLE `nhan_vien_bao_hiem`
  ADD PRIMARY KEY (`ID_NV`,`MA_GIAM_TRU`),
  ADD KEY `FK_BH` (`MA_GIAM_TRU`);

--
-- Indexes for table `nv_sq`
--
ALTER TABLE `nv_sq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phieu_luong_bao_hiem`
--
ALTER TABLE `phieu_luong_bao_hiem`
  ADD PRIMARY KEY (`MA_GIAM_TRU`,`STT`);

--
-- Indexes for table `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`MA_PB`);

--
-- Indexes for table `phu_cap`
--
ALTER TABLE `phu_cap`
  ADD PRIMARY KEY (`MA_PHU_CAP`),
  ADD KEY `AK_Identifier_1` (`MA_PHU_CAP`);

--
-- Indexes for table `qua_trinh_cong_tac`
--
ALTER TABLE `qua_trinh_cong_tac`
  ADD PRIMARY KEY (`ID_NV`,`MA_CV`),
  ADD KEY `FK_CO_CV` (`MA_CV`);

--
-- Indexes for table `quyet_dinh_nghi_viec`
--
ALTER TABLE `quyet_dinh_nghi_viec`
  ADD PRIMARY KEY (`MA_QD`),
  ADD KEY `AK_Identifier_1` (`MA_QD`),
  ADD KEY `FK_CO_QD` (`ID_NV`),
  ADD KEY `FK_KY_QD` (`GIA_ID_NV`);

--
-- Indexes for table `so_lan_phep`
--
ALTER TABLE `so_lan_phep`
  ADD PRIMARY KEY (`ID_NV`,`MA_NP`),
  ADD KEY `FK_CO_LOAI_NP` (`MA_NP`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AK_Identifier_1` (`username`),
  ADD KEY `FK_CO_TAI_KHOAN` (`ID_NV`),
  ADD KEY `FK_LOAI_TK` (`MA_LOAI_TK`);

--
-- Indexes for table `tham_gia`
--
ALTER TABLE `tham_gia`
  ADD PRIMARY KEY (`ID_NV`,`MA_DU_AN`),
  ADD KEY `FK_THAM_GIA` (`MA_DU_AN`);

--
-- Indexes for table `tuyen_dung`
--
ALTER TABLE `tuyen_dung`
  ADD PRIMARY KEY (`MA_TD`),
  ADD KEY `AK_Identifier_1` (`MA_TD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bang_cap`
--
ALTER TABLE `bang_cap`
  MODIFY `MA_BC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `co_kn`
--
ALTER TABLE `co_kn`
  MODIFY `MA_KN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ki_nang`
--
ALTER TABLE `ki_nang`
  MODIFY `MA_KN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `luong`
--
ALTER TABLE `luong`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `muc_luong`
--
ALTER TABLE `muc_luong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nv_sq`
--
ALTER TABLE `nv_sq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet`
--
ALTER TABLE `chi_tiet`
  ADD CONSTRAINT `FK_CAN_TD` FOREIGN KEY (`MA_CV`) REFERENCES `chuc_vu` (`MA_CV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TD` FOREIGN KEY (`MA_TD`) REFERENCES `tuyen_dung` (`MA_TD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_bc`
--
ALTER TABLE `co_bc`
  ADD CONSTRAINT `FK_BC_BC` FOREIGN KEY (`MA_BC`) REFERENCES `bang_cap` (`MA_BC`),
  ADD CONSTRAINT `FK_BC_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_kn`
--
ALTER TABLE `co_kn`
  ADD CONSTRAINT `FK_CO_KN` FOREIGN KEY (`MA_KN`) REFERENCES `ki_nang` (`MA_KN`),
  ADD CONSTRAINT `FK_CO_KN_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_phu_cap`
--
ALTER TABLE `co_phu_cap`
  ADD CONSTRAINT `FK_CO_PHU_CAP` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CO_PHU_CAP_NV` FOREIGN KEY (`MA_PHU_CAP`) REFERENCES `phu_cap` (`MA_PHU_CAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_phu_cap_hd`
--
ALTER TABLE `co_phu_cap_hd`
  ADD CONSTRAINT `FK_HD` FOREIGN KEY (`MA_HD`) REFERENCES `hop_dong_lao_dong` (`MA_HD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PC` FOREIGN KEY (`MA_PHU_CAP`) REFERENCES `phu_cap` (`MA_PHU_CAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `di_ct`
--
ALTER TABLE `di_ct`
  ADD CONSTRAINT `FK_DI_CT` FOREIGN KEY (`MA_CT`) REFERENCES `cong_tac` (`MA_CT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DI_CT_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_nghi_phep`
--
ALTER TABLE `don_nghi_phep`
  ADD CONSTRAINT `FK_CO_XIN_PHEP` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LOAI_NP` FOREIGN KEY (`MA_NP`) REFERENCES `loai_nghi_phep` (`MA_NP`);

--
-- Constraints for table `duoc_giam_tru`
--
ALTER TABLE `duoc_giam_tru`
  ADD CONSTRAINT `FK_DUOC_GIAM_TRU` FOREIGN KEY (`MA_GIAM_TRU`) REFERENCES `bao_hiem` (`MA_GIAM_TRU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DUOC_GIAM_TRU_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giam_doc_nhan_su`
--
ALTER TABLE `giam_doc_nhan_su`
  ADD CONSTRAINT `FK_Generalization_1` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hop_dong_lao_dong`
--
ALTER TABLE `hop_dong_lao_dong`
  ADD CONSTRAINT `FK_CO_HD` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KY_HD` FOREIGN KEY (`GIA_ID_NV`) REFERENCES `giam_doc_nhan_su` (`ID_NV`),
  ADD CONSTRAINT `FK_LOAI_HD` FOREIGN KEY (`MA_LOAI_HD`) REFERENCES `loai_hop_dong` (`MA_LOAI_HD`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `khen_thuong`
--
ALTER TABLE `khen_thuong`
  ADD CONSTRAINT `FK_DUOC_KT` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`),
  ADD CONSTRAINT `FK_KI_KT` FOREIGN KEY (`GIA_ID_NV`) REFERENCES `giam_doc_nhan_su` (`ID_NV`);

--
-- Constraints for table `ki_luat`
--
ALTER TABLE `ki_luat`
  ADD CONSTRAINT `FK_BI_KL` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`),
  ADD CONSTRAINT `FK_KY_KL` FOREIGN KEY (`GIA_ID_NV`) REFERENCES `giam_doc_nhan_su` (`ID_NV`);

--
-- Constraints for table `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `FK_HE_SO` FOREIGN KEY (`MA_HE_SO`) REFERENCES `he_so_luong` (`MA_HE_SO`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_id_nv` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `luong_phu_cap`
--
ALTER TABLE `luong_phu_cap`
  ADD CONSTRAINT `FK_LUONG` FOREIGN KEY (`STT`) REFERENCES `luong` (`STT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PHU_CAP` FOREIGN KEY (`MA_PHU_CAP`) REFERENCES `phu_cap` (`MA_PHU_CAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `FK_CO_HE_SO` FOREIGN KEY (`MA_HE_SO`) REFERENCES `he_so_luong` (`MA_HE_SO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_QUAN` FOREIGN KEY (`maqh`) REFERENCES `devvn_quanhuyen` (`maqh`),
  ADD CONSTRAINT `FK_THUOC_PB` FOREIGN KEY (`MA_PB`) REFERENCES `phong_ban` (`MA_PB`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_TINH` FOREIGN KEY (`matp`) REFERENCES `devvn_tinhthanhpho` (`matp`),
  ADD CONSTRAINT `FK_XA` FOREIGN KEY (`xaid`) REFERENCES `devvn_xaphuongthitran` (`xaid`);

--
-- Constraints for table `nhan_vien_bao_hiem`
--
ALTER TABLE `nhan_vien_bao_hiem`
  ADD CONSTRAINT `FK_BH` FOREIGN KEY (`MA_GIAM_TRU`) REFERENCES `bao_hiem` (`MA_GIAM_TRU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nhan_vien_bao_hiem_ibfk_1` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qua_trinh_cong_tac`
--
ALTER TABLE `qua_trinh_cong_tac`
  ADD CONSTRAINT `FK_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quyet_dinh_nghi_viec`
--
ALTER TABLE `quyet_dinh_nghi_viec`
  ADD CONSTRAINT `FK_CO_QD` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KY_QD` FOREIGN KEY (`GIA_ID_NV`) REFERENCES `giam_doc_nhan_su` (`ID_NV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `so_lan_phep`
--
ALTER TABLE `so_lan_phep`
  ADD CONSTRAINT `FK_CO_LOAI_NP` FOREIGN KEY (`MA_NP`) REFERENCES `loai_nghi_phep` (`MA_NP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CO_LOAI_NP_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD CONSTRAINT `FK_CO_TAI_KHOAN` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LOAI_TK` FOREIGN KEY (`MA_LOAI_TK`) REFERENCES `loai_tai_khoan` (`MA_LOAI_TK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tham_gia`
--
ALTER TABLE `tham_gia`
  ADD CONSTRAINT `FK_THAM_GIA` FOREIGN KEY (`MA_DU_AN`) REFERENCES `du_an` (`MA_DU_AN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_THAM_GIA_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhan_vien` (`ID_NV`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
