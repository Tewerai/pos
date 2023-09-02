-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:48 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueicho_try`
--

-- --------------------------------------------------------

--
-- Table structure for table `regular products`
--

CREATE TABLE `regular products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `serial id` varchar(255) NOT NULL,
  `image url` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regular products`
--

INSERT INTO `regular products` (`id`, `name`, `serial id`, `image url`, `type`) VALUES
(1, 'ZIMGOLD COOKING OIL 2L', '7007315600034', 'https://www.tengaionline.com/wp-content/uploads/2016/11/zimgold-2l.png', 'Commodity'),
(2, 'LOBEL\'S PRIME WHITE BREAD', '6008022000088', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Prime-White-Loaf-1.png', 'Commodity'),
(3, 'LOBEL\'S WHOLE WHEAT BREAD', '6008022000149', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Whole-Wheat-Loaf.png', 'Commodity'),
(4, 'LOBEL\'S WHOLEMEAL BREAD', '6008022000132', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Wholemeal-Loaf.png', 'Commodity'),
(5, 'LYONS PEANUT BUTTER 375ML', '6004842002059', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Lyons-Peanut-Butter-375ml.png', 'Commodity'),
(7, 'MAHATMA WHITE RICE 2KG', '6007421002914', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Mahatama-Multi-Pack.png', 'Commodity'),
(9, 'MAMA’S SWEET ORANGE MARMALADE 500G', '6009691170003', 'https://www.tengaionline.com/wp-content/uploads/2018/10/Mamas_sweet-marmalade.jpg', 'Commodity'),
(10, 'NOLA ORIGINAL MAYONNAISE', '6001069020316', 'https://www.tengaionline.com/wp-content/uploads/2020/08/Nola.jpg', 'Commodity'),
(12, 'PROBRANDS IODISED SALT 1KG', '6009812430290', 'https://www.tengaionline.com/wp-content/uploads/2021/02/Probrands-Salt-1kg.jpg', 'Commodity'),
(13, 'PURE DROP COOKING OIL 2L', '	6009822890510', 'https://www.tengaionline.com/wp-content/uploads/2016/10/pure-drop-oil.jpg', 'Commodity'),
(14, 'PURE DROP COOKING OIL 5L', '9000000510913', 'https://www.tengaionline.com/wp-content/uploads/2016/10/pure-drop-oil.jpg', 'Commodity'),
(15, 'RED SEAL PEARLENTA 20KG', '6007421002402', 'https://www.tengaionline.com/wp-content/uploads/2016/11/parlenta-20kg.png', 'Commodity'),
(16, 'RED SEAL PEARLENTA 5KG', '6007421001047', 'https://www.tengaionline.com/wp-content/uploads/2017/08/red-seal-Parlenta-5kg.png', 'Commodity'),
(17, 'RED SEAL ROLLER MEAL 20KG', '6007421002082', 'https://www.tengaionline.com/wp-content/uploads/2016/11/roller-meal-20kg.png', 'Commodity'),
(19, 'GLORIA SELF RAISING FLOUR 2KG', '6007421000217', 'https://www.tengaionline.com/wp-content/uploads/2016/08/gloria-four-2kg-600x450.jpg', 'Commodity'),
(21, 'RED SEAL FLOUR 2KG', '6007421000439', 'https://www.tengaionline.com/wp-content/uploads/2016/07/Red-Seal-Self-Raising-Flour-900x1024.png', 'Commodity'),
(22, 'MARIANA SPAGHETTI 400G', '6009819740699', 'https://www.tengaionline.com/wp-content/uploads/2016/08/Mariana-Speghetti.jpg', 'Commodity'),
(23, 'MARIANA WHITE RICE 2KG', '6009819740446', 'https://www.tengaionline.com/wp-content/uploads/2016/06/Mariana-Rice.jpg', 'Commodity'),
(24, 'RED SEAL PEARLENTA 10KG', '6007421002181', 'https://www.tengaionline.com/wp-content/uploads/2016/06/pearlenta_10KG.jpg', 'Commodity'),
(25, 'RED SEAL ROLLER 10KG', '6007421002099', 'https://www.tengaionline.com/wp-content/uploads/2016/06/red-seal-super-roller-meal.jpg', 'Commodity'),
(26, 'HULETTS WHITE SUGAR 2KG', '6009661380036', 'https://www.tengaionline.com/wp-content/uploads/2016/06/white_sugar_2kg.jpg', 'Commodity'),
(27, 'HULETTS BROWN SUGAR 2KG', '6008363042976', 'https://www.tengaionline.com/wp-content/uploads/2016/06/brown_sugar_2kg.jpg', 'Commodity'),
(28, 'ALL GOLD TOMATO KETCHUP SAUCE 700ML', '60019578.', 'https://www.tengaionline.com/wp-content/uploads/2020/08/All-Gold-Tomato-Sauce-1.jpg', 'Commodity'),
(29, 'BLUE RIBBON SELF RAISING FLOUR 5KG', '6008858000429', 'https://www.tengaionline.com/wp-content/uploads/2017/03/blue-ribbon-5kg.jpg', 'Commodity'),
(30, 'CASHEL VALLEY SWEET ORANGE MARMALADE 500G', '6007497090402', 'https://www.tengaionline.com/wp-content/uploads/2019/04/IMG_0248.png', 'Commodity'),
(31, 'CEREBOS IODISED SALT 500G', '6001021023010', 'https://www.tengaionline.com/wp-content/uploads/2016/11/cerebos-salt-500g.jpeg', 'Commodity'),
(32, 'CHEF EXTRA VIRGIN OLIVE OIL 1LTR', '6009684163982', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Chef-Olive-Oil.png', 'Commodity'),
(33, 'DENDAIRY FULL CREAM MILK 1 LITRE', '6009698811428', 'https://www.tengaionline.com/wp-content/uploads/2017/02/dendairy-milk.png', 'Commodity'),
(34, 'DETTOL DISINFECTANT 500ML', '6161100950047', 'https://www.tengaionline.com/wp-content/uploads/2020/08/Dettol.png', 'Commodity'),
(35, 'DZL STERI MILK (500ML)', '6005572000216', 'https://www.tengaionline.com/wp-content/uploads/2017/02/DZL-Steri-Milk.png', 'Commodity'),
(36, 'GOLD STAR SUGAR WHITE 2KG', '6008363042808', 'https://www.tengaionline.com/wp-content/uploads/2016/11/Gold-Star-2kg.png', 'Commodity'),
(37, 'GLORIA SELF RAISING FLOUR 2KG', '6007421000217 ', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Self-Raising-Flour-2kg-x10.png', 'Commodity'),
(39, 'LION MATCHES 10S', '60069795', 'https://www.tengaionline.com/wp-content/uploads/2017/05/matches.jpg', 'Commodity'),
(40, 'HEINZ TOMATO KETCHUP 500ML', '6001030002013', 'https://www.tengaionline.com/wp-content/uploads/2016/11/heinz-tomato-ketchup_500ml.png', 'Commodity'),
(41, 'LOBEL’S HI FIBRE BREAD', '6008022000095', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Hi-Fibre-Loaf.png', 'Commodity'),
(42, '7UP (330ML)', '6034000005264.', 'https://www.tengaionline.com/wp-content/uploads/2016/11/7UP-Six-Pack.png', 'Drinks'),
(43, 'COCA COLA (COKE) 2L', '5449000009067', 'https://www.tengaionline.com/wp-content/uploads/2016/11/pepsi-diet-6-pack.png', 'Drinks'),
(44, 'FANTA GRAPE 330ML CANS', '5449000069429', 'https://www.tengaionline.com/wp-content/uploads/2016/11/fanta-grape-6-pack.jpg', 'Drinks'),
(45, 'FANTA PINEAPPLE 330ML CANS', '	5449000003201', 'https://www.tengaionline.com/wp-content/uploads/2016/11/fanta-pineapple-6-pack.png', 'Drinks'),
(47, 'LIQUI FRUIT JUICE ORANGE', '6001048000315', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Liqui-Fruit-Orange-250ml-x6-1.png', 'Drinks'),
(48, 'LIQUI FRUIT JUICE RED GRAPE (250ML)', '6001048000117', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Liqui-Fruit-Red-Grape-250ml-x6.png', 'Drinks'),
(49, 'LIQUI FRUIT JUICE RED GRAPE 1L', '6001048000315', 'https://www.tengaionline.com/wp-content/uploads/2017/01/Liqui-Fruit-Red-Grape-1L.png', 'Drinks'),
(50, 'MAZOE BLACKBERRY 2L', '5449000095572', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Mazoe-Blackberry-2l-x6.jpg', 'Drinks'),
(51, 'MAZOE CREAM SODA 2L', '5449000009401', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Mazoe-Cream-Soda-2l-x6.jpg', 'Drinks'),
(52, 'MAZOE PEACH 2L', '5449000011510', 'https://www.tengaionline.com/wp-content/uploads/2016/11/Mazoe-Peach.jpg', 'Drinks'),
(53, 'MAZOE RASPBERRY 2L', '5449000017000', 'https://www.tengaionline.com/wp-content/uploads/2017/05/mazoe_raspberry.png', 'Drinks'),
(54, 'MAZOE ORANGE CRUSH 2L', '5449000062994', 'https://www.tengaionline.com/wp-content/uploads/2016/06/mazoe.jpg', 'Drinks'),
(55, 'PEPSI 330ML CANS', '6164001011534', 'https://www.tengaionline.com/wp-content/uploads/2016/11/pepsi-6-pack.jpg', 'Drinks'),
(57, 'SQUISH SQUASH CREAM SODA 5L', '6009607390082', 'https://www.tengaionline.com/wp-content/uploads/2016/11/squish-squash-cream-soda.jpg', 'Drinks'),
(58, 'STONEY GINGER BEER 330ML', '5449000106421', 'https://www.tengaionline.com/wp-content/uploads/2016/11/stoney-ginger-beer.jpg', 'Drinks'),
(59, 'PFUKO MAHEU TRADIONAL 500ML', '6005572002203', 'https://www.tengaionline.com/wp-content/uploads/2016/08/pfuko-maheu.png', 'Drinks'),
(65, 'LIQUI FRUIT JUICE ORANGE 1l', '6001048000315', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Liqui-Fruit-Orange-250ml-x6-1.png', 'Drinks'),
(66, 'LIQUI FRUIT JUICE RED GRAPE (250ML)', '6001048000117', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Liqui-Fruit-Red-Grape-250ml-x6.png', 'Drinks'),
(67, 'LIQUI FRUIT JUICE RED GRAPE 1L', '6001048000315', 'https://www.tengaionline.com/wp-content/uploads/2017/01/Liqui-Fruit-Red-Grape-1L.png', 'Drinks'),
(78, 'PFUKO MAHEU VANILLA 500ML', '6005572002371', 'https://www.okonline.co.zw/wp-content/uploads/pfuko-udiwo-maheu-buttermilk-500ml-500x500.jpg', 'Drinks'),
(79, 'SHUMBA MAHEU (EXTRA MALT)', '6009644920044', 'https://www.tengaionline.com/wp-content/uploads/2016/08/shumba-maheu.jpg', 'Drinks'),
(80, 'ACE PORRIDGE CARAMEL 1KG', '600951860074', 'https://www.tengaionline.com/wp-content/uploads/2016/10/ace_porridge-1024x1024.jpg', 'Dry Grocery'),
(83, 'AROMAT ORIGINAL', '6001038071554', 'https://www.tengaionline.com/wp-content/uploads/2016/11/aromat-original.jpg', 'Dry Grocery'),
(84, 'BEEMAID PURE HONEY 500G', '6009642488065', 'https://www.tengaionline.com/wp-content/uploads/2019/02/honey.png', 'Dry Grocery'),
(86, 'BOKOMO CORNFLAKES 500G', '6001052001506', 'https://www.bulawayogroceries.com/wp-content/uploads/2017/10/500g-bokomo-cornflakes.jpg', 'Dry Grocery'),
(88, 'CASHEL VALLEY BAKED BEANS 410G', '6007497103454', 'https://www.tengaionline.com/wp-content/uploads/2016/10/cashel-valley-baked-beans.jpg', 'Dry Grocery'),
(89, 'CERELAC 500G', '6001068625703', 'https://www.tengaionline.com/wp-content/uploads/2016/10/cerelac_500g.png', 'Dry Grocery'),
(90, 'CHOMPKINS CHEDDAR CHEESE 25G', '6007497002573', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Chompkins-Cheddar-Cheese-25g.png', 'Dry Grocery'),
(91, 'CHOMPKINS CRISPS 100G (BEEF & TOMATO)', '6007497002498	', 'https://www.tengaionline.com/wp-content/uploads/2016/11/chompkins-beef-tomato.png', 'Dry Grocery'),
(92, 'CHOMPKINS CRISPS 100G (CHEESE & ONION)', '6007497002481', 'https://www.tengaionline.com/wp-content/uploads/2016/11/chompkins-cheese-onion.png', 'Dry Grocery'),
(93, 'CHOMPKINS SALT & VINEGAR 25G', '6007497002627	', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Chompkins-Salt-Vinegar-25g.png', 'Dry Grocery'),
(94, 'CHOMPKINS TOMATO SAUCE 25G', '6007497002634', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Chompkins-Tomato-Sauce-25g.png', 'Dry Grocery'),
(95, 'CREMORA 1KG', '6009188000899.', 'https://www.tengaionline.com/wp-content/uploads/2016/10/cremora.jpg', 'Dry Grocery'),
(96, 'EVERYDAY MILK 400G', '6161107791513', 'https://www.tengaionline.com/wp-content/uploads/2016/10/Everyday_milk.png', 'Dry Grocery'),
(97, 'FARMGOLD STRAWBERRY JAM (IDEAL FOR DIABETICS) 450G', '6009642450642 ', 'https://www.tengaionline.com/wp-content/uploads/2020/04/Farmgold-strawberry-jam.jpg', 'Dry Grocery'),
(98, 'GRAVY BISTO ORIGINAL', '6001021031022', 'https://www.tengaionline.com/wp-content/uploads/2016/11/gravy-bisto.png', 'Dry Grocery'),
(99, 'IRIS BISCUITS 2KG', '6007421004444', 'https://www.tengaionline.com/wp-content/uploads/2016/10/iris_biscuits.png', 'Dry Grocery'),
(101, 'JUNGLE OATS PORRIDGE 1KG', '6001275000003', 'https://www.tengaionline.com/wp-content/uploads/2018/02/Oats.jpg', 'Dry Grocery'),
(102, 'KARINGA HOT CURRY POWDER 55G', '6009812570682', 'https://www.tengaionline.com/wp-content/uploads/2020/04/KARINGA.jpg', 'Dry Grocery'),
(103, 'KELLOGGS CORN FLAKES 500G', '4003994111901', 'https://www.tengaionline.com/wp-content/uploads/2017/11/kelloggs-corn-flakes.png', 'Dry Grocery'),
(106, 'LOBELS BERMUDA CREAMS 150G', '6007265000114', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Lobels-Bermuda-Creams.png', 'Dry Grocery'),
(107, 'LOBELS CUSTARD CREAMS 150G', '6007265001333', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Lobels-Custard-Creams.png', 'Dry Grocery'),
(108, 'LOBELS LEMON CREAMS 150G', '6007265001418', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Lobels-Lemon-Creams.png', 'Dry Grocery'),
(109, 'LOBELS VANILLA CREAMS 150G', '6007265000169', 'https://www.tengaionline.com/wp-content/uploads/2016/10/lobels_vanilla_creams.png', 'Dry Grocery'),
(110, 'LUCKY STAR SARDINES IN TOMATO SAUCE 155G', '6001115000576', 'https://www.tengaionline.com/wp-content/uploads/2016/12/Lucky-Star-Sardines-Pack.jpg', 'Dry Grocery'),
(111, 'MADRAS CURRY POWDER (HOT)', '6001010425733', 'https://www.tengaionline.com/wp-content/uploads/2016/10/madras-cury-powder-hot.png', 'Dry Grocery'),
(112, 'MAGGI INSTANT NOODLES 73G (BEEF)', '6001068587209', 'https://www.tengaionline.com/wp-content/uploads/2016/11/maggi-noodles-beef.jpg', 'Dry Grocery'),
(113, 'MAGGI INSTANT NOODLES 73G (CHEESE)', '6001068702503', 'https://www.tengaionline.com/wp-content/uploads/2016/11/maggi-noodles-cheese.png', 'Dry Grocery'),
(114, 'MAGGI INSTANT NOODLES 73G (CHICKEN)', '6001068586806', 'https://www.tengaionline.com/wp-content/uploads/2016/11/maggi-noodles-chicken.jpg', 'Dry Grocery'),
(115, 'MAGGI INSTANT NOODLES 73G (CURRY)', '6001068660902', 'https://www.tengaionline.com/wp-content/uploads/2016/11/maggi-noodles-curry.jpg', 'Dry Grocery'),
(116, 'MAMA’S MIXED FRUIT JAM 500G', '6009691170010', 'https://www.tengaionline.com/wp-content/uploads/2020/04/mama-mixed-fruit-jam.jpg', 'Dry Grocery'),
(118, 'NATRA ROOIBOS 80S', '6005418003715', 'https://www.tengaionline.com/wp-content/uploads/2016/10/natra_rooibos.jpg', 'Dry Grocery'),
(120, 'NESTLÉ MILO 500G', '6001068480401', 'https://www.tengaionline.com/wp-content/uploads/2017/02/Untitled1_0064_Nestle-Milo-Malt-Energy-Drink.png', 'Dry Grocery'),
(121, 'NESTLE NAN 1 INFANT FORMULA 400G', '6009188001834', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Nestle-Nan-Milk.png', 'Dry Grocery'),
(122, 'NESTLE NAN 2 INFANT FORMULA 400G', '6001068582402', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Nestle-Nan-Milk2.png', 'Dry Grocery'),
(123, 'NESTLE NAN 3 INFANT FORMULA 400G', '7613031808328', 'https://www.tengaionline.com/wp-content/uploads/2017/04/Nestle-Nan-Milk3.png', 'Dry Grocery'),
(124, 'PRIME BRAND CORNED MEAT 190G', '6006117000739 ', 'https://www.tengaionline.com/wp-content/uploads/2021/05/prime-brand-corned-beef-meat.png', 'Dry Grocery'),
(125, 'PROBRANDS BUTTER BEANS 500G', '6009705002191', 'https://www.tengaionline.com/wp-content/uploads/2016/11/butter-beans.png', 'Dry Grocery'),
(126, 'PROBRANDS PREMIUM WHITE RICE 2KG', '6009812430252', 'https://www.tengaionline.com/wp-content/uploads/2020/08/probrands-premium-rice.png', 'Dry Grocery'),
(127, 'PROBRANDS SUGAR BEANS 500G', '6009705000999', 'https://www.tengaionline.com/wp-content/uploads/2016/11/Probrands-Sugar-Beans-500g.png', 'Dry Grocery'),
(129, 'PROTON BISCUITS (RAMBA WARAIRA) 500G', '6009602270051', 'https://www.tengaionline.com/wp-content/uploads/2020/07/Proton-Biscuits-500G-768x768.jpg', 'Dry Grocery'),
(131, 'RICOFFY 250G', '6001068596300', 'https://www.tengaionline.com/wp-content/uploads/2016/10/ricoffy.png', 'Dry Grocery'),
(132, 'ROYCO USAVI MIX 75G', '6162006603341', 'https://www.tengaionline.com/wp-content/uploads/2016/10/royco_usavi_mix.png', 'Dry Grocery'),
(136, 'SUN JAM (MIXED FRUIT) 500G', '6007497100798', 'https://www.tengaionline.com/wp-content/uploads/2020/04/sun-jam.jpg', 'Dry Grocery'),
(137, 'TANGANDA TIPS TEA BAGS 100S', '6005418003234', 'https://www.tengaionline.com/wp-content/uploads/2020/04/tips.jpg', 'Dry Grocery'),
(140, 'TEXAN CORNED MEAT 300G', '6003992010044', 'https://www.tengaionline.com/wp-content/uploads/2017/01/Texan-Corned-Meat.jpg', 'Dry Grocery'),
(141, 'WILLARDS BRAN FLAKES 500G', '6007497020126', 'https://www.tengaionline.com/wp-content/uploads/2020/08/IMG_0489-500x382-1.png', 'Dry Grocery'),
(142, 'ZIMGOLD MARGARINE 500G', '7007411009885', 'https://www.tengaionline.com/wp-content/uploads/2020/04/Zimgold-500g.png', 'Dry Grocery'),
(143, 'CEREVITA 500G', '6161107791698', 'https://www.tengaionline.com/wp-content/uploads/2016/06/Cerevita.jpg', 'Dry Grocery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regular products`
--
ALTER TABLE `regular products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regular products`
--
ALTER TABLE `regular products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
