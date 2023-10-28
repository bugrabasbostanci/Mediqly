-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 06:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `power` int(11) NOT NULL,
  `powerText` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `methodText` varchar(255) NOT NULL,
  `ageA` varchar(255) NOT NULL,
  `ageC` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `slug`, `power`, `powerText`, `category`, `method`, `methodText`, `ageA`, `ageC`, `purpose`, `instruction`, `imageURL`, `prescription`) VALUES
(1, 'Parol', 'parol', 1, 'Zayıf', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Ağrı kesici ve ateş düşürücü bir ilaçtır.', 'Her 4 saatte 1-2 tablet, yemeklerden sonra alınız.', 'https://www.haberlerdunya.com.tr/wp-content/uploads/2023/04/parol-agri-kesici.webp', 'https://titck.gov.tr/storage/Archive/2020/kubKtAttachments/TİTCK%20Onaylı%20KT%20PAROL%20500%20MG%20TB.pdf_7ba04d1d-47e3-4e69-9fbc-440eff063819.pdf'),
(2, 'Majezik', 'majezik', 3, 'Güçlü', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Ağrı kesici ve iltihap giderici bir ilaçtır.', 'Günde 1-3 defa 1 tablet, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-2-1668878307.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/680ac93e53292.pdf'),
(3, 'Muscoflex', 'muscoflex', 2, 'Orta', 'Kas Gevşetici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Kas gevşetici bir ilaçtır.', 'Günde 2 defa 1 tablet, aç veya tok karnına alınabilir.', 'https://www.basvur.co/sites/1358/uploads/2023/06/16/muscoflex-duo-nedir-ne-ise-yarar%20(1).png?', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/MUSCOFLEXDUO75mg8mgdeitirilmisalmltabletKT_304b75bd-a673-49c6-abbd-726153002ef9.pdf'),
(4, 'Coversyl', 'coversyl', 2, 'Orta', 'Tansiyon', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Yüksek tansiyonu düşüren bir ilaçtır.', 'Günde 1 tablet, yemekten önce alınabilir.', 'https://ilactarif.kolayasistan.com/wp-content/uploads/2022/10/coversyl.webp', 'https://titck.gov.tr/storage/Archive/2022/kubKtAttachments/COVERSYLPLUS5KT_b09fa852-d55a-41c0-8d6c-2e5ba2788792.pdf'),
(5, 'Lipitor', 'lipitor', 2, 'Orta', 'Kolesterol', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Kolesterol seviyesini düşüren bir ilaçtır.', 'Günde 1 defa 10 mg, 20 mg veya 40 mg, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1669485770.jpg', 'https://titck.gov.tr/storage/Archive/2020/kubKtAttachments/kt_e6d23489-0b2a-4641-9160-5855c5db4f58.pdf'),
(6, 'Ventolin', 'ventolin', 3, 'Güçlü', 'Solunum', 'head-side-cough', 'Nefes yoluyla', 'user-plus', 'children', 'Solunum yolu hastalıkları için kullanılan bir ilaçtır.', 'Gerektiğinde 1 saatte bir 1-2 puf yemeklerden bağımsız olarak alınabilir.', 'https://nolurbak.com/wp-content/uploads/2023/07/image_1689530702-1.jpg', 'https://titck.gov.tr/storage/Archive/2022/kubKtAttachments/temizkt_ae40afb8-81a0-4be1-afac-cb7dda40ab95.pdf'),
(7, 'Nurofen', 'nurofen', 3, 'Güçlü', 'Grip', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Grip ve soğuk algınlığı gibi hastalıklar için kullanılan bir ilaçtır.', 'Günde 3 defa 1 tablet yemeklerden sonra alınabilir.', 'https://i.superhaber.com/2/1280/720/storage/files/images/2020/03/04/nurofen-cold-flu-24s-1-20595-lwZ6_cover.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/wgxx5cAUxYttUM.pdf'),
(8, 'Omeprol', 'omeprol', 2, 'Orta', 'Mide Koruyucu', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Mide rahatsızlıkları için kullanılan bir ilaçtır.', 'Günde 1 defa 20 mg, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1668372031.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/RFlQscsEUDzktu.pdf'),
(9, 'Pradaxa', 'pradaxa', 2, 'Orta', 'Kan Sulandırıcı', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Kan sulandırıcı bir ilaçtır.', 'Günde 1 defa 100 mg, aç veya tok karnına alınabilir.', 'https://5.imimg.com/data5/SELLER/Default/2022/9/NK/CN/CF/3468355/pradaxa-dabigatran-medicine-.jpg', 'https://titck.gov.tr/storage/Archive/2022/kubKtAttachments/2_2ff7910d-7455-4c18-8879-4869e72b6453.pdf'),
(10, 'İsordil', 'isordil', 2, 'Orta', 'Tansiyon', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Kalp hastalıklarında kullanılan bir ilaçtır.', 'Günde 1 defa 5 mg yemeklerden bağımsız olarak dilaltı olarak alınmalıdır.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1671764639.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/c399be9d58091.pdf'),
(11, 'Prozac', 'prozac', 2, 'Orta', 'Antidepresan', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Ruhsal hastalıkları tedavi etmek için kullanılan bir ilaçtır.', 'Günde 1 defa 20 mg yemeklerden bağımsız olarak alınabilir.', 'https://nolurbak.com/wp-content/uploads/2023/07/image_1688778453.jpg', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/kt_cc9e842a-8966-494a-83a7-aa4228194466.pdf'),
(12, 'Zyvoxid', 'zyvoxid', 2, 'Orta', 'Antibiyotik', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Zatürre ve deri enfeksiyonları tedavisi için kullanılan bir antibiyotiktir.\r\n', 'Günde 2 defa 500 mg yemeklerden sonra alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1662733232.jpg', 'https://labeling.pfizer.com/ShowLabeling.aspx?id=19264'),
(13, 'Voltaren', 'voltaren', 2, 'Orta', 'Kas Gevşetici', 'hand-holding-droplet', 'Sürerek uygulayınız', 'user-plus', 'children', 'Ağrı kesici jel kremdir.', 'Günde 2 defa ağrının şiddetine göre sürün ve masaj yaparak uygulayın.', 'https://i-cf65.ch-static.com/content/dam/cf-consumer-healthcare/health-professionals/tr_TR/pain-relief/packshots/voltaren_emulgelforte_TR.jpg?auto=format', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/TTCKONAYLIKTVOLTARENEMULGELFORTE_9862b58f-e4ce-4e03-abe0-4592d04d1ba0.pdf'),
(14, 'Gaviscon', 'gaviscon', 2, 'Orta', 'Mide Yanması', 'spoon', 'Şurup', 'user-plus', 'children', 'Mide rahatsızlıkları için kullanılan bir ilaçtır.', 'Günde 2-4 tatlı kaşığı yemeklerden sonra ve yatarken içilir. ', 'https://www.britishgram.com/cdn/shop/products/3_ad7dc129-e34e-43cd-8af4-296b9de3dd7b_695x695.jpg?v=1563630778', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/yaynlanacakktgaviscondoubleaction500_bffd712b-8c4e-4ba4-b83a-dabe5c371d13.pdf'),
(15, 'Augmentin', 'augmentin', 2, 'Orta', 'Antibiyotik', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Çeşitli enfeksiyonların tedavisi için kullanılan bir antibiyotiktir.', 'Günde iki kez 625 mg tablet yemeklerden önce almalıdır.', 'https://cdn.hekimce.com/uploads/2023/basliksiz-1-1673446069.jpg', 'https://pdf.ilacprospektusu.com/2298-augmentin-bid-1000-mg-film-tablet-kt.pdf'),
(16, 'Vermidon', 'vermidon', 2, 'Orta', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Ağrıların ve ateşin giderilmesinde kullanılan bir ilaçtır.', 'Günde 1-2 tablet alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1663092295.jpg', 'https://titck.gov.tr/storage/Archive/2019/kubKtAttachments/VERMİDON%20500-30%20mg%20Tablet-kt-Gebze1.pdf_093503a5-78d2-4439-8e4a-e3e5df4765ec.pdf'),
(17, 'Apranax', 'apranax', 3, 'Güçlü', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Çeşitli ağrıların tedavisinde kullanılan bir ilaçtır.', 'Önerilen başlangıç dozu bir tablettir. Yemekten sonra alınmalıdır.', 'https://www.yusufuyanik.com/wp-content/uploads/2009/05/timthumb.jpg', 'https://titck.gov.tr/storage/Archive/2019/kubKtAttachments/ae61cd3a-7ca2-4110-9154-d95f1b1d3af4.pdf'),
(18, 'Arveles', 'arveles', 2, 'Orta', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Çeşitli ağrıların tedavisinde kullanılan bir ilaçtır.', 'Her 4-6 saatte bir 12,5 mg, aç veya tok karnına alınabilir.', 'https://www.probiyotix.com/wp-content/uploads/2023/03/a2-6.jpg', 'https://titck.gov.tr/storage/Archive/2022/kubKtAttachments/arveleskub_71ae3291-c050-42c7-b921-b8ed580a5606.pdf'),
(19, 'Xanax', 'xanax', 3, 'Güçlü', 'Anksiyete', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'NULL', 'Kaygı ve endişeyi tedavi etmek için kullanılan bir ilaçtır.', 'Başlangıç dozu günde 3 kez 0,25 mg, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1662743821.jpg', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/XANAX05KT_53850283-55e8-4705-a3cf-18efd4049498.pdf'),
(20, 'Dicloflam', 'dicloflam', 3, 'Güçlü', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Çeşitli ağrıların tedavi için kullanılan bir ilaçtır.', 'Günlük doz genelde 100-150 mg’dır. 2 veya 3’e bölünmüş olarak yemeklerden önce alınmalıdır.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1671124822.jpg', 'https://www.santafarma.com.tr/assets/urunler/dicloflam-draje/kt/dicloflam-draje.pdf'),
(21, 'Umca', 'umca', 2, 'Orta', 'Ağrı Kesici', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Solunum yolu ve kulak-burun-boğaz enfeksiyonlarının tedavisinde kullanılır. ', 'Günde 3 defa 1 tablet, aç veya tok karnına alınabilir.', 'https://www.abdiibrahim.com.tr/Uploads/Product/Product-Images/consumer-health/Umca/Umca%20Tablet.jpg', 'https://www.abdiibrahim.com.tr/Uploads/New%20Folder(2)/New%20Folder(1)-20-mg-film-coated-tablets-tr-patient-information.pdf'),
(22, 'Emedur', 'emedur', 2, 'Orta', 'Bulantı-Kusma', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Bulantı ve kusma rahatsızlığı için kullanılan bir ilaçtır.', 'Günde 3–5 defa 1 tablet, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1670859288.jpg', 'https://titck.gov.tr/storage/Archive/2022/kubKtAttachments/emedur200mgKT_a382e614-dc51-44e1-be8e-43a8b6d6878a.pdf'),
(23, 'Notuss', 'notuss', 2, 'Orta', 'Öksürük', 'spoon', 'Şurup', 'user-plus', 'children', 'Öksürük tedavisi için kullanılır.', 'Günde 4 defa 15 ml, aç veya tok karnına alınabilir.', 'https://www.literaturaktuel.com/wp-content/uploads/2012/12/Notuss-Fort.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/8K6yENCr611OVz.pdf'),
(24, 'Otrivine', 'otrivine', 2, 'Orta', 'Burun Spreyi', 'spray-can', 'Burnunuza uygulayınız', 'user-plus', 'children', 'Burun tıkanıklığı için kullanılır.', 'Günde 2-3 defa, her bir burun deliğine 1 defa püskürtünüz.', 'https://i-cf65.ch-static.com/content/dam/cf-consumer-healthcare/health-professionals/tr_TR/respiratory-health/packshots/750x421px_otrivine_mentol-01.png?auto=format', 'https://titck.gov.tr/storage/Archive/2021/kubKtAttachments/KTtemizotrivineMENTHOL_cd1124cc-689b-49b1-87cf-a9862297f2fc.pdf'),
(25, 'Cefaks', 'cefaks', 2, 'Orta', 'Antibiyotik', 'glass-water', 'Su ile tüketiniz', 'user-plus', 'children', 'Çeşitli enfeksiyonların tedavisinde kullanılan bir antibiyotiktir.', 'Yetişkinlerde 250-500 mg, çocuklarda 125-250 mg, aç veya tok karnına alınabilir.', 'https://cdn.hekimce.com/uploads/2022/basliksiz-1-1671674993.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/WBsioJSCp5Frv2.pdf'),
(26, 'Rennie', 'rennie', 2, 'Orta', 'Mide Yanması', 'teeth-open', 'Çiğneyiniz', 'user-plus', 'children', 'Mide rahatsızlıkları için kullanılan bir ilaçtır.', 'Günde 1-2 tablet çiğneyin veya emin. Yemekten sonra tüketiniz.', 'https://m.media-amazon.com/images/I/71m+7OPKYzL.jpg', 'https://titck.gov.tr/storage/kubKtAttachments/2f333d3a61066.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
