-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 06:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'họ tên',
  `sex` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'giới tính',
  `tel` int(11) NOT NULL COMMENT 'sdt',
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tỉnh thành',
  `district` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'quận huyện',
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ',
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `idauthor` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tác giả';

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`idauthor`, `name`, `info`, `checkDelete`) VALUES
(1, ' Ryu Murakami', 'Ryu Murakami sinh năm 1952 từng được tạp chí Times bình chọn là \"một trong mười mọt người cách-mạng-hóa Nhật Bản\"\r\nNăm 1976 đoạt giải Tác giả mới - Gunzo và Giải Akutagawa, giải văn học cao quý nhất Nhật Bản.\r\nLối diễn đạt ngổ ngáo có khi trắng trợn của ông không khiêu khích nhưng vẫn chênh vênh ở bờ vực phong hóa, làm những nhà đạo đức phải nhăn mặt.\r\nTác phẩm của ông giúp người ngoại quốc thấy được mặt trái của Nhật Bản, đất nước của trà đạo, thư pháp, kimono, kabuki, hoa anh đào...còn đầy cả tham nhũng, dâm thư, những hình thái trụy lạc đến phi nhân.', 0),
(2, ' Blogradio.vn ', '', 0),
(3, 'Nguyễn Thanh Huy', '', 0),
(4, 'Phan Đức Tuấn', '', 0),
(5, 'Huỳnh Thanh Danh', '', 0),
(6, 'Gào', 'Gào (Vũ Phương Thanh) sinh năm 1988, thuộc thế hệ những nhà văn cuối thời 8X. Trong vài ba năm trở lại đây, cái tên Gào đã gây được sự chú ý trên văn đàn, đặc biệt đối với giới trẻ tuổi teen yêu văn học. Cô là một blogger đính đám và được cộng đồng mạng phong danh là \"nhà văn hotgirl\". Với 2 tiểu thuyết Cho em gần anh thêm chút nữa (2009); Nhật ký son môi (2010), cái tên Gào mới chỉ được ít nhiều người biết tới nhưng khi Tự sát chính thức ra mắt, cái tên Gào – Vũ Phương Thanh đã thực sự đình đám và rùm beng. Trước khi tiểu thuyết Tự sát phát hành, 6 chương đầu được tung lên mạng đã thu hút hơn 2 triệu lượt view chỉ trong vòng 1 tháng', 0),
(7, 'Gào', 'Gào (Vũ Phương Thanh) sinh năm 1988, thuộc thế hệ những nhà văn cuối thời 8X. Trong vài ba năm trở lại đây, cái tên Gào đã gây được sự chú ý trên văn đàn, đặc biệt đối với giới trẻ tuổi teen yêu văn học. Cô là một blogger đính đám và được cộng đồng mạng phong danh là \"nhà văn hotgirl\". Với 2 tiểu thuyết Cho em gần anh thêm chút nữa (2009); Nhật ký son môi (2010), cái tên Gào mới chỉ được ít nhiều người biết tới nhưng khi Tự sát chính thức ra mắt, cái tên Gào – Vũ Phương Thanh đã thực sự đình đám và rùm beng. Trước khi tiểu thuyết Tự sát phát hành, 6 chương đầu được tung lên mạng đã thu hút hơn 2 triệu lượt view chỉ trong vòng 1 tháng.', 0),
(8, 'Lê Nguyên Sơn', '', 0),
(9, 'Nguyễn Phi Đồng', '', 0),
(10, 'Nguyễn Nhật Trường', '', 0),
(11, 'Lãnh Tụ Tối Cao', '', 0),
(12, 'Toàn Phong', '', 0),
(13, 'Thỏ Ngọc', '', 0),
(14, 'Thiên Lĩnh', '', 0),
(15, 'Thiên Tôn', '', 0),
(16, 'Sherlock', '', 0),
(17, 'Thiên Ngọc Minh Uy', '', 0),
(18, 'Ngọc Mai', '', 0),
(19, 'Hiểu Ngọc', '', 0),
(20, 'Hiểu Minh', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `idbill` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'họ tên khách',
  `sex` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billinfo`
--

CREATE TABLE `billinfo` (
  `idbillinfo` int(11) NOT NULL,
  `idbill` int(11) NOT NULL,
  `idbook` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='chi tiết hóa đơn';

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `idbook` int(11) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `imgdetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh bìa bên trong',
  `imgbg` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh bên ngoài',
  `idauthor` int(11) NOT NULL COMMENT 'id tác giả',
  `ngayxb` date NOT NULL COMMENT 'ngày xuất bản',
  `nhaxb` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nhà xuất bản',
  `nhaph` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nhà phát hành',
  `dangbia` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'dạng bìa',
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'kích thước (100 x 25 cm)',
  `weight` int(11) NOT NULL COMMENT 'khối lượng',
  `totalpages` int(11) NOT NULL COMMENT 'tổng số trang',
  `saleoff` int(11) NOT NULL COMMENT 'tiết kiệm %',
  `price` double NOT NULL COMMENT 'giá tiền',
  `info` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả sách',
  `idtype` int(11) NOT NULL COMMENT 'id loại sách',
  `highlights` int(11) NOT NULL COMMENT 'sách nổi bật thì số lớn',
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái sách',
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`idbook`, `name`, `imgdetail`, `imgbg`, `idauthor`, `ngayxb`, `nhaxb`, `nhaph`, `dangbia`, `size`, `weight`, `totalpages`, `saleoff`, `price`, `info`, `idtype`, `highlights`, `status`, `checkDelete`) VALUES
(1, '3 Đêm trước giao thừa', 'ba_dem_truoc_giao_thua_tai_ban_.jpg', '1.ba_dem_truoc_giao_thua_tai_ban_.jpg', 1, '2017-04-18', 'Văn Học', 'Bác Việt', 'Bìa mềm', '13x20.5 cm', 340, 304, 17, 86000, '\"Sau cuộc “thương lượng”, Kenji nhận lời hướng dẫn cho Frank trong ba ngày vòng quanh Kabukicho. Nhưng sau đó Kenji bắt đầu thấy có một chút lo lắng. Không phải là do sự bất đồng về văn hóa mà vì những cử chỉ, hành động khó hiểu của con người có cái tên là Frank đó. Vào đúng ngày hôm đó, Kenji đọc một tờ báo nói về “một nữ sinh cấp ba bị giết, bị cắt rời tay, chân và cổ rồi bị vứt ở bãi rác của Kabukicho”. Khi đó cậu đã nghĩ thủ phạm chính là Frank.\r\n', 8, 1, 'Sách Mới', 0),
(2, 'Cầm Tay Anh Tựa Vai Anh', 'cam_tay_anh_tua_vai_anh.jpg', '1.cam_tay_anh_tua_vai_anh.jpg', 2, '2017-04-17', 'Thanh Niên', 'Dinh Tị', 'Bìa mềm', '13x20.5 cm', 300, 224, 17, 78000, 'Giữa cuộc sống bộn bề, nhiều lo toan này, ai cũng mong sẽ tìm thấy cho mình một tình yêu chân thành, một người có thể nắm tay mình đi đến cuối cuộc đời. Chúng ta sinh ra trên đời này một cách đơn độc, chẳng phải để có ai đó đến lấp đầy những khoảng trống cô đơn đó hay sao? Chẳng mong được ở bên người mãi mãi, vì mãi mãi chỉ có trong truyện cổ tích mà thôi. Chỉ mong được yêu người thật sâu và thật lâu, đến chừng nào có thể.\r\n \r\nCầm tay anh, tựa vai anh là câu chuyện của những người đang chờ đợi tình yêu, chờ đợi để mình góp nhặt đủ can đảm mà đứng dậy từ bỏ những thói quen cũ để chạy cho kịp chuyến tàu hạnh phúc cuối cùng.\r\n \r\nBởi vậy hãy luôn can đảm để yêu thương bạn nhé!', 3, 2, 'Sách Mới', 0),
(3, 'Yêu Sao Để Không Đau (Tái Bản)', 'yeu_sao_de_khong_dau_tai_ban_.jpg', '1.yeu_sao_de_khong_dau_tai_ban_.jpg', 3, '2014-04-14', 'Hà Nội', 'Bão', 'Bìa Mềm', '12x19 cm', 200, 215, 16, 86000, 'Quyển sách, sẽ như những lời “hướng dẫn giữ gìn” tình yêu cho bạn, là những gì tôi đã đi trước, trải nghiệm và ghi nhận. Bạn có thể lấy nó làm hành trang vững chắc trên con đường tình yêu của mình, cũng có thể đọc để cho biết thôi, và vẫn yêu theo cách riêng mà mình muốn. Nhưng, có thể hứa với tôi một điều này không? Rằng dù bạn có chọn thế nào, thì cũng nhất định không được hối tiếc với sự chọn lựa đó của mình. Vì vốn dĩ bạn đã từng biết, từng hiểu được, nhưng vẫn cam lòng đi theo tiếng gọi của con tim, không hề lo ngại. Sự dấn thân đó là một điều đáng hãnh diện. Sự lựa chọn đó sẽ là một dấu son đỏ cho một thời trẻ dại nhưng vô cùng lộng lẫy của bạn. Một thời từng thương, từng nhớ, từng mơ mộng, từng hi vọng… Một thời thật đẹp! Thế nên, hứa với tôi, đừng bao giờ hối tiếc cả. Cũng như đừng bao giờ để sự hối tiếc cản trở con đường đi tìm kiếm hạnh phúc của cuộc đời mình, được không?\"', 3, 3, 'Sách mới', 0),
(4, 'Đêm Trường Tăm Tối', 'dem_truong_tam_toi.jpg', '1.dem_truong_tam_toi.jpg', 4, '2017-04-13', 'Văn Học', 'Cổ Nguyệt', 'Bìa mềm', '14.5x20.5 cm', 510, 465, 18, 115000, 'Nghi can giết người, vứt xác, nhưng không ngờ lại bị bắt quả tang ngay giữa chốn công cộng đông người. Lúc đó ít nhất có đến vài trăm người tận mắt chứng kiến, hắn cũng đã khai nhận toàn bộ quá trình phạm tội. Tất cả chuỗi chứng cứ đều đầy đủ: nhân chứng, vật chứng, lời khai, nhưng đúng vào thời điểm cơ quan kiểm sát chính thức đưa ra khởi tố, thì tình tiết vụ án có sự thay đổi đột ngột to lớn..\r\n\r\nĐằng sau sự việc này rốt cục ẩn giấu tình hình vụ án kinh thiên động địa đến nhường nào? Những nhân vật trong truyện đứng giữa ranh giới giữa cái thiện và cái ác, giữa sự sống và cái chết, mỗi quyết định đều thay đổi vận mệnh cả đời họ. Liệu họ sẽ rẽ về hướng nào? Liệu cái thiện có lên ngôi và cái ác có phải chịu sự trừng phạt...', 12, 4, 'Sách mới', 0),
(5, 'Lửa Hận', 'lua_han.jpg', '1.lua_han.jpg', 5, '2017-04-13', 'Văn Học', 'Phúc Minh Books', 'Bìa Mềm', '14.5x20.5 cm', 550, 518, 20, 125000, 'Nhắc đến gia đình MacBride người ta chỉ nhìn thấy ánh hào quang của thành công. Người bố - Rowan – hiệu trưởng của một trường điểm nổi tiếng, người mẹ - Lydia – người chủ gia đình, đồng thời là một thẩm phá đức cao vọng trọng, những đứa trẻ của gia đình được nuôi dạy trong sự giàu sang, chưa bao giờ phải lo lắng về vấn đề tiền bác và có thể thích gì làm nấy. Không lâu sau, khi Lydia qua đời vì căn bệnh ung thư, khi hào quang tắt dần, bóng tối bao phủ lấy gia đình nhỏ không chỉ có sự bi thương mà còn có bóng ma từ quá khứ. Darcy sinh ra trong một gia đình nghèo khó cùng với một người mẹ bị tâm thần, đổ lỗi cho nhà MacBride vì tất cả những khổ đau và bất hạnh diễn ra trong cuộc đời anh. Từ chối học bổng của trường Saxby, anh thề rằng đời này mình sống là để trả thù, trả lại tất cả những đắng cay và tủi nhục mà mình đã phải gánh chịu cho nhà MacBride.\r\n', 2, 5, 'Sách Mới', 0),
(6, 'Mẹ, Em Bé và Bố (Bìa mềm)', 'me_em_be_va_bo_bia_mem_.jpg', '1.me_em_be_va_bo_bia_mem_.jpg', 6, '2014-04-19', 'Thế Giới', 'Skybooks', 'Bìa mềm', '12x20 cm', 220, 208, 20, 89000, '\r\nMẹ, em bé và bố - cuốn sách đầy cảm hứng sống, yêu thương và hạnh phúc. Dự án sách được ấp ủ suốt 5 năm của nữ văn sĩ Gào.\r\n \r\n“Nhà là nơi những bức bối, giận hờn dừng lại sau cánh cửa. Nhà là nhà, là nơi để chúng ta trở về và vun đắp yêu thương.”\r\n \r\nĐã từng là một cô gái với cái “tôi” ngông cuồng, đầy khát khao nhưng cũng đầy sắc sảo. Đã từng thành danh với những trang văn dằn vặt, phẫn nộ với cuộc đời. Bạn sẽ gặp lại nữ văn sĩ Gào với những thủ thỉ nhẹ nhàng dịu êm và ngọt ngào đến vô cùng.', 3, 6, 'Sách Mới', 0),
(7, 'Mẹ, Em Bé và Bố (Bìa cứng)', 'me_em_be_va_bo_bia_cung_.jpg', '1.me_em_be_va_bo_bia_cung_.jpg', 7, '2017-04-19', 'Thế Giới', 'Skybooks', 'Bìa Cứng', '12x20 cm', 310, 208, 21, 119000, 'Mẹ, em bé và bố - Cuốn sách tràn đầu cảm hứng sống, cảm hứng yêu đời và cảm hứng hạnh phúc.\r\n \r\nĐơn giản là những mẩu chuyện giản dị mà trong đó Gào kể lại cho những em bé của mình về những điều nhỏ nhặt, bình dị nhưng ngập tràn hạnh phúc cũng bình yên vô cùng. Đó là chuyện tình yêu của “bố mẹ”, là những quãng thời gian xa cách mà hai người tưởng chừng như mãi mãi chia xa. Rồi họ tìm thấy nhau giữa những bước chân tưởng như đã lạc mất.\r\n ', 3, 7, 'Sách Mới', 0),
(8, 'Nghệ Thuật Bán Hàng Bậc Cao (Tái Bản)', 'nghe_thuat_ban_hang_bac_cao_tai_ban.jpg', '1.nghe_thuat_ban_hang_bac_cao_tai_ban.jpg', 8, '2017-04-12', 'Tổng Hớp TPHCM', 'First News', 'Bìa mềm', '12.5x20.5 cm', 590, 520, 29, 128000, 'Triết lý chứa đựng trong cuốn sách Nghệ Thuật Bán Hàng Bậc Cao thật đơn giản: “bạn có thể có được những tất cả mọi thứ trong cuộc sống nếu bạn biết giúp người khác đạt được điều họ muốn”, thậm chí còn đúng đắn và cần thiết hơn trong cuộc sống hiện nay so với thời kỳ khi cuốn Nghệ Thuật Bán Hàng Bậc Cao được xuất bản lần đầu. Mục tiêu cuả một thương vụ là đảm bảo khách hàng nhận được giá trị tương xứng, nhưng nếu bạn mang đến cho khách hàng những giá trị còn cao hơn giá trị mà lẽ ra họ sẽ nhận được thì không những bạn đã có một thương vụ thành công mà bạn còn có thêm một khách hàng sẵn lòng giúp bạn có thêm nhiều khách hàng khác nữa.', 23, 8, 'Sách mới', 0),
(9, 'Thế Giới Của Dư Bảo', 'the_gioi_cua_du_bao.jpg', '1.the_gioi_cua_du_bao.jpg', 9, '2017-04-12', 'Phụ Nữ', 'ChiBooks', 'Bìa mềm', '14.5x20.5 cm', 396, 332, 16, 87000, 'Dư Bảo có giác quan thứ sáu. \r\n \r\nCậu được mệnh danh là người có “đôi mắt quỷ” bởi linh cảm được việc xấu sắp xảy ra. Thế nhưng cậu không có khả năng thay đổi nó.\r\n \r\nTrong một chuyến hành trình trên chiếc xe tải cùng bố mình, “đôi mắt quỷ” của Dư Bảo một lần nữa lại phát huy tác dụng. Cậu thực sự không ngờ rằng cuộc đời bố cậu và gia đình lại gặp nhiều biến cố tới vậy…\r\n \r\nDư Bảo vốn là một cậu bé 11 tuổi, bố là lái xe tải, mẹ là lao công, ngày ngày đi học qua con đường Thiên sứ đầy cát bụi và rác rưởi. Mỗi ngày cậu được chứng kiến bao mảnh đời của những người lao động nghèo khổ bỏ quê hương lên thành phố gắng gượng bám lại kiếm sống, trải qua không ít khổ cực. Bố mẹ cậu cũng nằm trong số đó, chỉ luôn tâm nguyện cho con cái được ăn học, mong tìm ra tương lai tươi sáng hơn.', 12, 9, 'Sách Mới', 0),
(10, 'Ngôi Nhà Tranh', 'ngoi_nha_tranh.jpg', '1.ngoi_nha_tranh.jpg', 10, '2017-04-12', 'Phụ Nữ', 'ChiBooks', 'Bìa mềm', '14.5x20.5 cm', 426, 396, 16, 111000, 'Ngôi nhà tranh là tập hợp những câu chuyện đời thường, bình dị khó quên xoay quanh cuộc sống của cậu bé Tang Tang. Cậu thích chọc phá cậu bạn ngồi cùng bàn tên Lục Hạc vì cái đầu trọc lốc của cậu ta. Cậu có một thứ tình cảm ngượng ngùng không thể nói thành lời với cô bạn học Chỉ Nguyệt đến từ làng khác. Cậu ganh tị với cậu lớp trưởng Đỗ Tiểu Khang vì tính dám làm dám chịu, khiến cho Tang Tang bị bạn bè xem như “tội đồ”, nhưng sau đó Đỗ Tiểu Khang lại là người làm Tang Tang khâm phục nhất. Tang Tang là cầu nối tình yêu cho thầy giáo dạy Văn hay, thổi sao giỏi – Tưởng Nhất Luân với cô gái được dân làng xem là mỹ nhân – Bạch Tước. Nhưng chính vì cái tình hiếu thắng hay tò mò của cậu mà làm mối tình này phải gãy gánh giữa đàng. ', 2, 10, 'Sách Mới', 0),
(11, 'Văn Minh Đông Phương Và Tây Phương', 'van_minh_dong_phuong_va_tay_phuong.jpg', '1.van_minh_dong_phuong_va_tay_phuong.jpg', 11, '2017-04-12', 'Trẻ', 'Trẻ', 'Bìa Mềm', '13x19 cm', 220, 168, 12, 50000, 'Văn minh Đông phương và Tây phương của học giả Thu Giang Nguyễn Duy Cần là tập sách nghiên cứu về những đặc tính của hai nền văn minh của nhân loại là Đông phương và Tây phương. Tác giả đề xuất một sự dung hòa cần thiết giữa văn minh Đông và Tây phương để lấp lại thế quân bình hầu mang lại hạnh phúc cho nhân loại trên thế giới.', 55, 11, 'Sách Mới', 0),
(12, 'Em Là Nhà', 'em_la_nha.jpg', '1.em_la_nha.jpg', 12, '2017-04-11', 'Hà Nội', 'Skybooks', 'Bìa Mềm', '13.5x20 cm', 380, 368, 17, 98000, 'Tình yêu thời nay , chỉ yêu thôi chưa bao giờ là đủ?\r\n \r\nNếu bạn còn chưa thể chắc chắn khi đưa ra câu trả lời của mình, vậy thì hãy cùng đi tìm đáp án cho những câu hỏi trên trong Em Là Nhà – cuốn tiểu thuyết viết về những mối tình đan xen, là món quà, là lời nhắn nhủ của một người trẻ, gửi đến nhiều người trẻ.\r\n \r\nXoay quanh những đổ vỡ tình cảm, những thách thức, những sự lừa dối mà cô gái trẻ Như Nguyệt phải chịu đựng, chuyện tình yêu trong Em Là Nhà sẽ đưa bạn qua những cung bậc cảm xúc từ ngọt ngào đến cao trào uất hận, từ bình yên êm ấm đến những nỗi đau chỉ có thể âm thầm chịu đựng.', 11, 12, 'Sách mới', 0),
(13, 'Mẹ Bảo Gấu Ted Đi Ngủ Trước Đi', 'me_bao_gau_ted_di_ngu_truoc_di_nhung_bai_ca_gia_dinh_am_ap.jpg', '1.me_bao_gau_ted_di_ngu_truoc_di_nhung_bai_ca_gia_dinh_am_ap.jpg', 13, '2017-04-11', 'Hội Nhà Văn', 'Nhã Nam', 'Bìa Mềm', '23x26.5 cm', 100, 32, 14, 46000, 'Đã đến giờ đi ngủ của em bé. Nhưng tại sao bé phải lên giường khi tất cả mọi người vẫn còn thức? Bé có một \'kế hoạch\" để khỏi phải đi ngủ...\r\n \r\nMọi em bé đề trốn tránh giờ ngủ, trong sách này có vố số lý do bé viện đến, và \"đối sách\" mẹ đưa ra vì sao lại thành công ngọt ngào đến vậy? Một lời chúc ngủ ngon êm dịu dành tặng các bé!\r\n \r\nLời thoại ngắn và hợp với tâm lý tiếp thu của trẻ, tranh vẽ dịu dàng và nồng ấm. Mời bé đọc năm câu chuyện nhỏ đáng yêu về tình cảm gia đình, tình yêu loài vật, thói quen sinh hoạt, chăm sóc người thân!', 28, 13, 'Sách Mới', 0),
(14, 'Cún Cưng Đi Dạo', 'cun_cung_di_dao_nhung_bai_ca_gia_dinh_am_ap.jpg', '1.cun_cung_di_dao_nhung_bai_ca_gia_dinh_am_ap.jpg', 14, '2017-04-11', 'Hội Nhà văn', 'Nhã Nam', 'Bìa Mềm', '23x26.5 cm', 100, 32, 14, 46000, 'Clementine muốn đi dạo, nhưng tất cả mọi người trong nhà đều đang bận. Dù đã cố gắng hết sức, cún vẫn không thể thuyết phục được ai dẫn mình ra ngoài. Làm thế nào bây giờ.\r\n \r\nCâu chuyện nho nhỏ tái hiện sinh hoạt thường ngày trong gia đình, dạy bé về những người thân trong nhà, thói quen của họ, và cách chờ đợi để đạt được điều mình mong muốn.\r\n \r\nLời thoại ngắn và hợp với tâm lý tiếp thu của trẻ, tranh vẽ dịu dàng và nồng ấm. Mời bé đọc năm câu chuyện nhỏ đáng yêu về tình cảm gia đình, tình yêu loài vật, thói quen sinh hoạt, chăm sóc người thân!', 28, 14, 'Sách Mới', 0),
(15, 'Cún Cưng Đi Tắm', 'cun_cung_di_tam_nhung_bai_ca_gia_dinh_am_ap.jpg', '1.cun_cung_di_tam_nhung_bai_ca_gia_dinh_am_ap.jpg', 15, '2017-04-11', 'Hội Nhà Văn', 'Nhã Nam', 'Bìa Mềm', '23x26.5 cm', 100, 32, 14, 46000, 'Clementine muốn đi dạo, nhưng tất cả mọi người trong nhà đều đang bận. Dù đã cố gắng hết sức, cún vẫn không thể thuyết phục được ai dẫn mình ra ngoài. Làm thế nào bây giờ.\r\n \r\nCâu chuyện nho nhỏ tái hiện sinh hoạt thường ngày trong gia đình, dạy bé về những người thân trong nhà, thói quen của họ, và cách chờ đợi để đạt được điều mình mong muốn.\r\n \r\nLời thoại ngắn và hợp với tâm lý tiếp thu của trẻ, tranh vẽ dịu dàng và nồng ấm. Mời bé đọc năm câu chuyện nhỏ đáng yêu về tình cảm gia đình, tình yêu loài vật, thói quen sinh hoạt, chăm sóc người thân!', 28, 15, 'Sách Mới', 0),
(16, 'Đừng Từ Bỏ', 'dung_tu_bo.jpg', '1.dung_tu_bo.jpg', 16, '2017-04-18', 'Thanh Niên', 'KABooks', 'Bìa mềm', '13x20.5 cm', 610, 145, 15, 68000, 'Nếu gặp thất bại – Xin đừng tuyệt vọng, bởi vì “Cánh cửa này khép lại, sẽ có cánh cửa khác mở ra”, chỉ bạn mới có thể mở ra cánh cửa mới để mình bước tiếp.\r\n\r\nNếu gặp thất bại – Xin hãy làm lại từ đầu, đừng từ bỏ đam mê của mình, hãy cứ vững bước mà đi, như người ta thường nói: “Hãy cứ yêu như chưa yêu bao giờ”, bạn hãy “Hãy cứ nỗ lực như chưa từng thất bại.\"', 11, 16, 'Sách mới', 0),
(17, 'Ngàn Dặm Tương Tư', 'ngan_dam_tuong_tu.jpg', '1.ngan_dam_tuong_tu.jpg', 17, '2017-04-11', 'Văn Học', 'Đinh Trị', 'Bìa Mềm', '13x20.5 cm', 270, 269, 17, 79000, '\"Em hứa một ngày em sẽ trở về,\r\n \r\nEm sẽ giữ chàng an toàn,\r\n \r\nEm sẽ giữ chàng bình an.\r\n \r\nLúc này, mọi chuyện điên rồ quá,\r\n \r\nEm chẳng biết làm sao mà ngăn lại.\r\n \r\nEm hiểu chúng ta còn nhiều điều cần nói,\r\n \r\nNhưng em không thể ở lại.\r\n \r\nHãy cứ để em ôm chàng thêm một chút,\r\n \r\nHãy nhận lấy một phần trái tim em,\r\n \r\nBiến nó thành của chàng\r\n \r\nĐể khi chúng ta cách xa\r\n \r\nChàng sẽ chẳng cô đơn...\r\n \r\nĐêm nay, khi chìm vào giấc ngủ,\r\n \r\nChàng hãy nhớ rằng\r\n \r\nChúng ta nằm dưới cùng một trời sao...\"', 2, 17, 'Sách mới', 0),
(18, 'Siêu Lầy, Siêu Nai Và Điện Giật', 'sieu_lay_sieu_nai_va_dien_giat.jpg', '1.sieu_lay_sieu_nai_va_dien_giat.jpg', 18, '2017-04-13', 'Dân Trí', 'Bách Việt', 'Bìa Mềm', '13x20.5 cm', 350, 352, 16, 85000, 'Ở một thành phố nào đó, trong một khu nhà nào đó trên đất nước Việt Nam tươi đẹp,  có ba đứa con gái độ tuổi ba mươi, xinh bình thường, ngoan bình thường, giỏi bình thường, thu nhập bình thường chơi thân với nhau như keo dính chuột. Mà bộ ba bình thường ấy, cứ dính lấy nhau là lại xẩy ra những chuyện… bất bình thường khác khiến “ nhân loại” vừa cười đau mồm, vừa nghĩ đau đầu, vừa nghe rất rát tai.\r\n \r\nTất nhiên, bất chấp những khó chịu của “ nhân loại”, ba cô gái ấy vẫn “ngang nhiên” tồn tại, sống phất phơ giữa đời. Ba cô ấy là ai ? Tạm thời có một màn lí lịch trích ngang như sau.\r\n \r\nSiêu Lầy – tên thật là Huyền Lê, ba mươi tuổi, dốt toán, nhiều chữ, lầy lội vô số tội! Lầy tôn thờ chủ nghĩa độc thân và không phân vân trước những giành giật, tham vọng ở đời cuộc đời.', 11, 18, 'Sách Mới', 0),
(19, 'Thiếu Niên Thế Hệ Mới - Chàng Trai Nhỏ Lịch Lãm', 'thieu_nien_the_he_moi_chang_trai_nho_lich_lam.jpg', '1.thieu_nien_the_he_moi_chang_trai_nho_lich_lam.jpg', 19, '2017-04-11', 'Kim Đồng', 'Kim Đồng', 'Bìa Mềm', '16x20.5cm', 300, 153, 17, 96000, 'Thế giới của các cậu con trai - những quý ngài nhỏ tuổi - nơi đầy ắp niềm vui trưởng thành!\r\n \r\nTrong cuốn sách này có hơn 1000 tình tiết nhỏ chào đón bạn khám phá!\r\n \r\nĐể trở thành chàng trai năng động và lịch thiệp, hãy bắt đầu từ lúc này!\r\n \r\nNào hãy cùng thắp sáng cuộc sống của bạn!', 51, 19, 'Sách Mới', 0),
(20, 'Thiếu Niên Thế Hệ Mới - Cô Gái Nhỏ Duyên Dáng\r\n', 'thieu_nien_the_he_moi_co_gai_nho_duyen_dang.jpg', '1.thieu_nien_the_he_moi_co_gai_nho_duyen_dang.jpg', 20, '2017-04-11', 'Kim Đồng', 'Kim Đồng', 'Bìa Mềm', '16x20.5 cm', 300, 153, 17, 96000, ' Chúc mừng em đến với thế giới của con gái, trong lâu đài niềm vui dành cho thiếu nữ hơn 1000 bí quyết, kỹ năng sống đang chờ đón em đó!', 51, 20, 'Sách mới', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='thể loại';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `name`, `checkDelete`) VALUES
(1, 'SÁCH VĂN HỌC', 0),
(2, 'VĂN HỌC THEO QUỐC GIA', 0),
(3, 'SÁCH KINH TẾ', 0),
(4, 'SÁCH KHÁC', 0),
(5, 'SÁCH ĐÁNG CHÚ Ý', 0),
(6, 'SÁCH THIẾU NHI', 0),
(7, 'SÁCH CHUYÊN NGÀNH', 0),
(8, 'VĂN HÓA - NGHỆ THUẬT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `idbook` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1' COMMENT 'số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='giỏ hàng';

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `idtype` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idcategory` int(11) NOT NULL,
  `checkDelete` int(11) NOT NULL DEFAULT '0' COMMENT 'xóa thì thành 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='loại';

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`idtype`, `name`, `idcategory`, `checkDelete`) VALUES
(1, 'Tiểu thuyết Việt Nam', 1, 0),
(2, 'Tiểu thuyế nước ngoài', 1, 0),
(3, 'Truyện ngán, tàn văn', 1, 0),
(4, 'Phóng sự, tùy bút, hồi ký', 1, 0),
(5, 'Truyện Thiếu Nhi', 1, 0),
(6, 'Thơ', 1, 0),
(7, 'Truyện lịch sử', 1, 0),
(8, 'Viễn tưởng, kinh dị, trinh thám', 1, 0),
(9, 'Văn học kinh điển', 1, 0),
(10, 'Thể loại khác', 1, 0),
(11, 'Văn học Việt Nam', 2, 0),
(12, 'Văn học Trung Quốc', 2, 0),
(13, 'Văn học Mỹ', 2, 0),
(14, 'Văn học Anh', 2, 0),
(15, 'Văn học Pháp', 2, 0),
(16, 'Văn học Nhật', 2, 0),
(17, 'Văn học các nước khác', 2, 0),
(18, 'Bí Quyết Thành Công', 3, 0),
(19, 'Kinh Nghiệm doanh nhân', 3, 0),
(20, 'Quản trị kinh doanh', 3, 0),
(21, 'Kỹ năng mềm - Khởi nghiệp', 3, 0),
(22, 'Lãnh đạo quản lý', 3, 0),
(23, 'Marketing - Bán hàng', 3, 0),
(24, 'Phân tích thị trường', 3, 0),
(25, 'Sách khởi nghiệp', 3, 0),
(26, 'Thể loại khác', 3, 0),
(27, 'Chứng khoán, đầu tư', 3, 0),
(28, 'Nuôi dạy con', 4, 0),
(29, 'Kỹ năng - sống tư', 4, 0),
(30, 'Tuổi teen', 4, 0),
(31, 'Học ngoại ngữ - Từ Điển', 4, 0),
(32, 'Chăm sóc gia đình - Nấu ăn', 4, 0),
(33, 'Thể loại Khác', 4, 0),
(34, 'Sách Ngoại Văn', 4, 0),
(35, 'Làm cha mẹ', 4, 0),
(36, 'Chăm Sóc Sức Khỏe', 4, 0),
(37, 'Sách học sinh tham khảo', 4, 0),
(38, 'Sách bán chạy', 5, 0),
(39, 'Sách tô màu', 5, 0),
(40, 'Sách hay nên đọc', 5, 0),
(41, 'Sách cho bà bầu', 5, 0),
(42, 'Sách đoạt giải', 5, 0),
(43, 'Sách bán chạy 2016', 5, 0),
(44, 'Combo Sách Kinh Tế Hay', 5, 0),
(45, 'Sách Hay Cho Phụ Nữ', 5, 0),
(46, 'Sách hay cho ngày 20/11', 5, 0),
(47, 'Kiến thức - Kỹ năng', 6, 0),
(48, 'Truyện tranh', 6, 0),
(49, 'Nhà trẻ - Mẫu giáo (0-6 tuổi)', 6, 0),
(50, 'Nhi Đồng (6-11 tuổi)', 6, 0),
(51, 'Thiếu Niên (11-15 tuổi)', 6, 0),
(52, 'Ehon Nhật Bản', 6, 0),
(53, 'Hạt Giống Tâm Hồn', 6, 0),
(54, 'Phong thủy - nhà cửa', 7, 0),
(55, 'Chính trị - Triết học', 7, 0),
(56, 'Kỹ thuật - Khoa học tự nhiên', 7, 0),
(57, 'Pháp luật', 7, 0),
(58, 'Lịch sử - Địa Lý', 7, 0),
(59, 'Y học', 7, 0),
(60, 'Lĩnh vực khác', 7, 0),
(61, 'Du lịch - Văn hóa', 8, 0),
(62, 'Nghệ Thuật', 8, 0),
(63, 'Tâm Tĩnh', 8, 0),
(64, 'Danh nhãn - Người nổi tiếng', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idbill`);

--
-- Indexes for table `billinfo`
--
ALTER TABLE `billinfo`
  ADD PRIMARY KEY (`idbillinfo`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idbook`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`idbook`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idtype`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
