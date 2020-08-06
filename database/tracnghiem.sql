-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 05:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracnghiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `block_id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Sản khoa, Phụ khoa, Sơ sinh', 1, 1, NULL, 1592759825, 1592759825, NULL),
(2, 0, 'Dược', 1, 1, NULL, 1593744950, 1593744950, NULL),
(3, 0, 'Giải phẫu bệnh lý', 1, 1, NULL, 1593744970, 1593744970, NULL),
(4, 0, 'Gây mê hồi sức', 1, 1, NULL, 1593744977, 1593744977, NULL),
(5, 0, 'Xét nghiệm', 1, 1, NULL, 1593744983, 1593744983, NULL),
(6, 1, 'Phòng điều dưỡng', 1, 1, NULL, 1594023330, 1594023330, NULL),
(7, 1, 'Sơ sinh', 1, 1, NULL, 1594025446, 1594025446, NULL),
(8, 1, 'Sanh', 1, 1, NULL, 1594025854, 1594025854, NULL),
(9, 2, 'Dược', 1, 1, NULL, 1594025873, 1594025873, NULL),
(10, 3, 'GPBL-TBDT', 1, 1, NULL, 1594025896, 1594025896, NULL),
(11, 4, 'PT-GMHS', 1, 1, NULL, 1594025907, 1594025907, NULL),
(12, 5, 'Xét nghiệm', 1, 1, NULL, 1594025918, 1594025918, NULL),
(13, 0, 'Di truyền', 1, 1, NULL, 1594715775, 1594715775, NULL),
(14, 0, 'Vật lý trị liệu', 1, 1, NULL, 1594715794, 1594715794, NULL),
(15, 0, 'Chẩn đoán hình ảnh', 1, 1, NULL, 1594715804, 1594715804, NULL),
(16, 0, 'Hiếm muộn', 1, 1, NULL, 1594715812, 1594715812, NULL),
(17, 1, 'Hậu sản A', 1, 1, NULL, 1594715986, 1594715986, NULL),
(18, 1, 'Kiểm soát nhiễm khuẩn', 1, 1, NULL, 1594716001, 1594716001, NULL),
(19, 1, 'Kế hoạch hóa gia đình', 1, 1, NULL, 1594716010, 1594716010, NULL),
(20, 1, 'Khám bệnh B', 1, 1, NULL, 1594716020, 1594716020, NULL),
(21, 1, 'Hiếm muộn', 1, 1, NULL, 1594716033, 1594716033, NULL),
(22, 1, 'Khám bệnh A', 1, 1, NULL, 1594716041, 1594716041, NULL),
(23, 1, 'Phụ nội - Nội tiết', 1, 1, NULL, 1594716056, 1594716056, NULL),
(24, 1, 'Phụ ngoại - Ung bướu', 1, 1, NULL, 1594716070, 1594716070, NULL),
(25, 1, 'Hậu phẫu', 1, 1, NULL, 1594716084, 1594716084, NULL),
(26, 1, 'Cấp cứu hồi sức tích cực chống độc', 1, 1, NULL, 1594716111, 1594716111, NULL),
(27, 1, 'PT - GMHS', 1, 1, NULL, 1594716164, 1594716164, NULL),
(28, 1, 'Chẩn đoán hình ảnh', 1, 1, NULL, 1594716174, 1594716174, NULL),
(29, 1, 'Hậu sản B', 1, 1, NULL, 1594716183, 1594716183, NULL),
(30, 1, 'Sản bệnh', 1, 1, NULL, 1594716192, 1594716192, NULL),
(31, 1, 'Di truyền', 1, 1, NULL, 1594716196, 1594716196, NULL),
(32, 1, 'Phòng kế hoạch tổng hợp', 1, 1, NULL, 1594716210, 1594716210, NULL),
(33, 1, 'Phòng quản lý chất lượng', 1, 1, NULL, 1594716222, 1594716222, NULL),
(34, 1, 'Phòng chỉ đạo tuyến', 1, 1, NULL, 1594716235, 1594716235, NULL),
(35, 3, 'Giải phẫu bệnh lý', 1, 1, NULL, 1594716390, 1594716390, NULL),
(36, 5, 'Xét nghiệm', 1, 1, 1, 1594716408, 1594716408, 1594806893),
(37, 13, 'Di truyền', 1, 1, NULL, 1594716471, 1594716471, NULL),
(38, 14, 'Sơ sinh', 1, 1, NULL, 1594716555, 1594716555, NULL),
(39, 15, 'Chẩn đoán hình ảnh', 1, 1, NULL, 1594716608, 1594716608, NULL),
(40, 16, 'Hiếm muộn', 1, 1, NULL, 1594716625, 1594716625, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `exam_time` int(11) NOT NULL,
  `exam_code` varchar(255) NOT NULL,
  `number_questions` int(11) NOT NULL,
  `result` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: ẩn kết quả, 1: hiển thị kết quả cho thí sinh xem',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Thông tin đợt thi';

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `start_date`, `end_date`, `exam_time`, `exam_code`, `number_questions`, `result`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sát hạch cột chuyên môn Điều dưỡng, Hộ sinh, KTV', 1595178000, 1595350800, 60, 'KTVG', 55, 0, 1, NULL, NULL, 1594783523, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_block`
--

CREATE TABLE IF NOT EXISTS `exam_block` (
`id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `title_id` varchar(255) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `time_exam` varchar(255) NOT NULL COMMENT 'Giờ thi',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_block`
--

INSERT INTO `exam_block` (`id`, `exam_id`, `block_id`, `department_id`, `title_id`, `start_date`, `end_date`, `time_exam`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '6,7,8', '1,2,3', 1595178000, 1595350800, '8:30', 1, NULL, NULL, 1594814028, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_general_questions`
--

CREATE TABLE IF NOT EXISTS `exam_general_questions` (
`id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `question_id` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Đề thi chung cho các chức danh trong 1 đợt thi';

-- --------------------------------------------------------

--
-- Table structure for table `exam_profile`
--

CREATE TABLE IF NOT EXISTS `exam_profile` (
`id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL COMMENT 'Đợt thi',
  `profile_id` int(11) NOT NULL COMMENT 'Thí sinh',
  `start_time` int(11) NOT NULL COMMENT 'Giờ bắt đầu thi',
  `end_time` int(11) NOT NULL COMMENT 'Giờ kết thúc thi',
  `exam_date` int(11) NOT NULL COMMENT 'Ngày thi',
  `created_at` int(11) NOT NULL COMMENT 'Thời gian tạo',
  `updated_at` int(11) NOT NULL COMMENT 'Thời gian cập nhật'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Thông tin kì thi của nhân viên';

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE IF NOT EXISTS `exam_questions` (
`id` int(11) NOT NULL,
  `exam_profile_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `guess_answers` text NOT NULL,
  `profile_answer` varchar(255) NOT NULL,
  `right_answer` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Đề thi của từng nhân viên';

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
`id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `profile_code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `role` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `active_exam` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Thông tin nhân viên';

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `block_id`, `department_id`, `title_id`, `profile_code`, `password`, `fullname`, `birthday`, `role`, `active`, `active_exam`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 1, 'admin', 'c549f8b1a61b28a26fd426bb0f7e9021:31f1e662cc026b5d7377#$*@!', 'Admin', '0', 1, 1, 0, 0, 0, NULL, 0, 0, NULL),
(3, 1, 6, 1, '01167', '80c7c8854be3c3b2a31a6836d325884d:6f6a4fe43e20cff39b32#$*@!', 'Nguyễn Thị Vĩnh An', '12/12/1990', 2, 1, 1, 1, 1, NULL, 1594056877, 1594056877, NULL),
(4, 1, 7, 2, '00450', '80c7c8854be3c3b2a31a6836d325884d:6f6a4fe43e20cff39b32#$*@!', 'Phan Thị Kim Ngân', '', 2, 1, 0, 1, 1, NULL, 1594098796, 1594098796, NULL),
(5, 1, 7, 3, '1132', '80c7c8854be3c3b2a31a6836d325884d:6f6a4fe43e20cff39b32#$*@!', 'Nguyễn Thị Ngọc Giàu', '', 2, 0, 1, 1, 1, NULL, 1594099202, 1594099202, NULL),
(6, 1, 8, 1, '00860', '80c7c8854be3c3b2a31a6836d325884d:6f6a4fe43e20cff39b32#$*@!', 'Phạm Thị Kim Thoa', '12/02/1990', 3, 1, 1, 1, 1, NULL, 1594099366, 1594099366, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qandas`
--

CREATE TABLE IF NOT EXISTS `qandas` (
`id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL DEFAULT '0',
  `department_id` varchar(255) NOT NULL,
  `title_id` varchar(255) NOT NULL,
  `basic` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: cơ bản, 0: chuyên sâu',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `right_answer` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='Đề thi: câu hỏi, đáp án lựa chọn, đáp án đúng tương ứng vời từng khoa';

--
-- Dumping data for table `qandas`
--

INSERT INTO `qandas` (`id`, `block_id`, `department_id`, `title_id`, `basic`, `question`, `answer`, `right_answer`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '0', '0', 1, 'Áp lực bóng chèn được khuyến cáo', 'Bé hơn hoặc bằng 20 mmHg;;;s_answer;;;Bé hơn hoặc bằng 30 mmHg;;;s_answer;;;Bé hơn hoặc bằng 40 mmHg;;;s_answer;;;Bé hơn hoặc bằng 50 mmHg;;;s_answer;;;Bé hơn hoặc bằng 60 mmHg', 'Bé hơn hoặc bằng 20 mmHg', 1, 1, NULL, 1594906203, 1594906203, NULL),
(2, 1, '0', '0', 1, 'Tai biến nguy hiểm nhất có thể xảy ra khi ống nội khí quản vào sâu phế quản gốc', 'Giảm thể tích khí lưu thông;;;s_answer;;;Tràn khí màng phổi;;;s_answer;;;Giảm oxy máu;;;s_answer;;;Viêm phổi bệnh viện;;;s_answer;;;Dễ gập ống nội khí quản', 'Giảm thể tích khí lưu thông', 1, 1, NULL, 1594906921, 1594906921, NULL),
(3, 1, '6,7,8,9', '1,2,3', 0, 'Nếu đặt ống nội khí quản quá sâu, ống nội khí quản sẽ', 'Vào phế quản gốc bên phải hay bên trái với tỉ lệ như nhau;;;s_answer;;;Thường vào phế quản gốc bên trái hơn;;;s_answer;;;Thường vào phế quản gốc bên phải hơn;;;s_answer;;;Không thể biết', 'Thường vào phế quản gốc bên trái hơn', 1, 1, NULL, 1594912530, 1594912530, NULL),
(39, 1, '6', '1', 0, 'Nguyên nhân gây tụt nội khí quản ở bệnh nhân đang thở máy, NGOẠI TRỪ', 'Cố  định nội khí quản không tốt (băng keo không dính, băng keo bị ướt);;;s_answer;;;Bệnh nhân cử động khi làm thủ thuật;;;s_answer;;;Bộ dây máy thở quá ngắn', 'Bộ dây máy thở quá ngắn', 1, 1, NULL, 1594923471, 1594923471, NULL),
(38, 1, '6,7,8', '1,2', 0, 'Phải ghi chú các yếu tố gì trên băng keo dán nội khí quản', 'Ngày đặt nội khí quản;;;s_answer;;;BS đặt nội khí quản;;;s_answer;;;ID và chiều dài ngang cung răng;;;s_answer;;;a, c đúng;;;s_answer;;;a, b, c đúng', 'a, b, c đúng', 1, 1, NULL, 1594923471, 1594923471, NULL),
(37, 0, '0', '0', 1, 'Các chỗ hay bị rò rỉ (thất thoát) trên bộ dây máy thở, NGOẠI TRỪ', 'Bẫy nước;;;s_answer;;;Bộ phận HME;;;s_answer;;;Chỗ cắm dịch vào bình làm ẩm;;;s_answer;;;Chỗ cắm nhiệt kế ở đầu nối Y;;;s_answer;;;Dây máy thở bị nứt, thủng', 'Dây máy thở bị nứt, thủng', 1, 1, NULL, 1594923471, 1594923471, NULL),
(36, 0, '0', '0', 1, 'Cách chọn lựa ống nội khí quản đúng kích cỡ ở trẻ em, NGOẠI TRỪ', 'Theo tuổi: bằng công thức ID = 4 + (tuổi/4) (đối với trẻ > 2 tuổi);;;s_answer;;;Trẻ sơ sinh thiếu tháng ID = 2,5 – 3;;;s_answer;;;Trẻ sơ sinh đủ tháng ID = 3 – 3,5;;;s_answer;;;Đường kính ngoài ống nội khí quản bằng đầu ngón tay út của bệnh nhân;;;s_answer;;;Đặt nội khí quản trẻ em không nên dùng ống nội khí quản có bóng chèn', 'Đặt nội khí quản trẻ em không nên dùng ống nội khí quản có bóng chèn', 1, 1, NULL, 1594923471, 1594923471, NULL),
(35, 0, '0', '0', 1, 'Chẩn đoán ống nội khí quản hở bằng cách', 'Nhìn ID ống nội khí quản có phù hợp với tuổi hay cân nặng bệnh nhân;;;s_answer;;;Nghe tiếng rồ rồ khi dùng ống nghe đặt ở hõm trên xương ức;;;s_answer;;;So sánh VTE và VTI;;;s_answer;;;Nhìn biểu đồ dạng sóng;;;s_answer;;;Tất cả đều đúng', 'Tất cả đều đúng', 1, 1, NULL, 1594923471, 1594923471, NULL),
(34, 0, '0', '0', 1, 'Các nguyên nhân gây thất thoát khí trên bệnh nhân thở máy, NGOẠI TRỪ', 'Ống nội khí quản không bóng chèn hoặc chưa bơm bóng chèn;;;s_answer;;;Bóng chèn ống nội khí quản bị vỡ;;;s_answer;;;Ống nội khí quản vào sâu phế quản gốc;;;s_answer;;;Hở các chỗ nối trên bộ dây máy thở;;;s_answer;;;Chưa test máy trước khi sử dụng', 'Hở các chỗ nối trên bộ dây máy thở', 1, 1, NULL, 1594923471, 1594923471, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
`id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL COMMENT 'đợt thi',
  `exam_profile_id` int(11) NOT NULL COMMENT 'ngày giờ thi',
  `profile_id` int(11) NOT NULL COMMENT 'thí sinh thi',
  `number_questions` int(11) NOT NULL,
  `number_answer_right` int(11) NOT NULL,
  `point` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Kết quả thi';

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `key_setting` varchar(255) NOT NULL,
  `value_setting` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Các thiết lập ban đầu';

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_short` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Chức danh';

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `name`, `name_short`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hộ sinh', 'HS', 1, 1, NULL, 1594031979, 1594031979, NULL),
(2, 'Điều dưỡng', 'ĐD', 1, 1, NULL, 1594031985, 1594031985, NULL),
(3, 'Điều dưỡng trung cấp', 'ĐD.TC', 1, 1, NULL, 1594032007, 1594032007, NULL),
(4, 'Dược sĩ trung cấp', 'DS.TC', 1, 1, NULL, 1594032016, 1594032016, NULL),
(5, 'Dược sĩ cao đẳng', 'DS.CĐ', 1, 1, NULL, 1594032022, 1594032022, NULL),
(6, '', 'KTV Y', 1, 1, 1, 1594032029, 1594032029, 1594032068),
(7, 'KTV Giải phẫu bệnh lý', 'KTV.GPBL', 1, 1, NULL, 1594032081, 1594032081, NULL),
(8, 'KTV Xét nghiệm', 'KTV.XN', 1, 1, NULL, 1594716843, 1594716843, NULL),
(9, 'KTV Gây mê hồi sức', 'KTV.GMHS', 1, 1, NULL, 1594716875, 1594716875, NULL),
(10, 'KTV Vật lý trị liệu', 'KTV.VLTL', 1, 1, NULL, 1594716894, 1594716894, NULL),
(11, 'KTV Chẩn đoán hình ảnh', 'KTV.CĐHA', 1, 1, NULL, 1594716917, 1594716917, NULL),
(12, 'Cử nhân sinh học Hiếm muộn', 'CNSH.HM', 1, 1, NULL, 1594716944, 1594716944, NULL),
(13, 'Cử nhân sinh học Di truyền', 'CNSH.DT', 1, 1, NULL, 1594716965, 1594716965, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_block`
--
ALTER TABLE `exam_block`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_general_questions`
--
ALTER TABLE `exam_general_questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_profile`
--
ALTER TABLE `exam_profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qandas`
--
ALTER TABLE `qandas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_block`
--
ALTER TABLE `exam_block`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_general_questions`
--
ALTER TABLE `exam_general_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_profile`
--
ALTER TABLE `exam_profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `qandas`
--
ALTER TABLE `qandas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
