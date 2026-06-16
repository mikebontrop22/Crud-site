DROP DATABASE IF EXISTS rally;

CREATE DATABASE rally;
USE rally;

DROP TABLE IF EXISTS info;

CREATE TABLE info (
    rally_id INT AUTO_INCREMENT PRIMARY KEY,
    jaar SMALLINT,
    rallyauto TEXT NOT NULL,
    info TEXT,
    afbeelding_url VARCHAR(500)
);

INSERT INTO info (jaar, rallyauto, info, afbeelding_url) VALUES
-- 2000
(2000, 'Hyundai Accent WRC', 'WRC-auto gebruikt door Hyundai Motorsport', 'https://i.ytimg.com/vi/Un7HZNXTjw4/maxresdefault.jpg'),
(2000, 'Ford Focus WRC', 'Succesvolle WRC-auto van Ford', 'https://img.carswp.com/ford/focus/ford_focus_1999_photos_1.jpg'),
(2000, 'Subaru Impreza WRC', 'Iconische rallyauto van Subaru', 'https://m43.narod.ru/other/Subaru-web/images/subaru_impreza_wrc_2000-3.JPG'),

-- 2001
(2001, 'Ford Fiesta WRC', 'WRC-auto gebruikt door M-Sport Ford', 'https://supercars.net/blog/wp-content/uploads/2016/04/2001_Ford_FocusRSWRC3.jpg'),
(2001, 'Peugeot 206 WRC', 'Zeer succesvolle Peugeot WRC-auto', 'https://www.supercars.net/blog/wp-content/uploads/2016/04/2001_Peugeot_206WRC1.jpg'),
(2001, 'Citroën Xsara WRC', 'Citroën rallyauto begin jaren 2000', 'https://upload.wikimedia.org/wikipedia/commons/9/9d/IAA_2001_167_-_Flickr_-_Axel_Schwenke.jpg'),

-- 2003
(2003, 'Toyota Corolla WRC', 'Laatste Toyota WRC-auto', 'https://preview.redd.it/708ovqs7xwy31.jpg?width=640&crop=smart&auto=webp&s=909e4a8754f7ae28406e0827e350ad0873d897bf'),
(2003, 'Subaru Impreza WRC2003', 'Subaru auto uit het 2003 seizoen', 'https://racemarket.net/oc-content/uploads/23/68164.jpg'),
(2003, 'Ford Focus RS WRC', 'Focus RS rallyversie', 'https://i.ytimg.com/vi/omXlQITgAks/maxresdefault.jpg'),

-- 2005
(2005, 'Citroën Xsara WRC 2005', 'Dominante auto in WRC', 'https://upload.wikimedia.org/wikipedia/commons/1/1d/2003_Acropolis_Rally_14.jpg'),
(2005, 'Peugeot 307 WRC', 'Opvolger van de 206 WRC', 'https://external-preview.redd.it/GDBWnGTes7YXo9wcJ49MXTfhEiBb3_OeLFKThihAoUc.jpg?auto=webp&s=994841a35968054e307bfa4195aa86bd2b69dcfc'),
(2005, 'Mitsubishi Lancer WRC05', 'Rallyauto van Mitsubishi', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdQtpvB254ttrUrNMtbQOS4OiGhnANwB8xbA&s'),

-- 2008
(2008, 'Subaru Impreza WRC2008', 'Nieuwe hatchback versie', 'https://speedhunters-wp-production.s3.amazonaws.com/wp-content/uploads/2008/06/658540229.jpg'),
(2008, 'Ford Focus RS WRC 08', 'Ford Focus uit 2008', 'https://i.redd.it/s5mq62r3zui41.jpg'),
(2008, 'Citroën C4 WRC', 'Zeer succesvolle Citroën', 'https://www.mad4wheels.com/img/free-car-images/mobile/2751/citroen-c4-wrc-2008-245227.jpg'),

-- 2010
(2010, 'Citroën C4 WRC 2010', 'C4 in laatste WRC-jaren', 'https://retrorides.com.au/wp-content/uploads/2025/08/Citroen-C4-WRC-1.jpg'),
(2010, 'Ford Focus RS WRC 2010', 'Focus RS uit 2010', 'https://i.pinimg.com/736x/5a/48/96/5a4896f6bebbd682e99e2d33b0637804.jpg'),
(2010, 'Mini John Cooper Works WRC', 'Mini comeback in WRC', 'https://mediapool.bmwgroup.com/cache/P9/201105/P90076262/P90076262-mini-john-cooper-works-wrc-team-at-italian-rally-sardegna-599px.jpg'),

-- 2015
(2015, 'Volkswagen Polo R WRC', 'Dominante VW WRC-auto', 'https://www.ewrc-models.com/photos/f10/9395/17427.jpg'),
(2015, 'Citroën DS3 WRC', 'Compacte Citroën rallyauto', 'https://upload.wikimedia.org/wikipedia/commons/5/56/2016_Rally_GB_-_Kris_Meeke.jpg'),
(2015, 'Hyundai i20 WRC', 'Eerste generatie i20 WRC', 'https://janluehn.com/wp-content/uploads/2025/09/MB10894-1-1024x682.jpg'),

-- 2018
(2018, 'Toyota Yaris WRC', 'WRC-auto gebruikt door Toyota Gazoo Racing', 'https://toyotagazooracing.com/-/media/TMC/tgr/dmp/contents/en/assets/images/release/2018/wrc/0720-01/ogp-01.jpg?rev=b79233d692b24d1496d8f79fa1e61fd1&sc_lang=ja-JP'),
(2018, 'Hyundai i20 Coupe WRC', 'Coupé versie van de i20 WRC', 'https://www.racecar-engineering.com/wp-content/uploads/2017/01/uphyu1.jpg'),
(2018, 'Ford Fiesta WRC 2018', 'Fiesta WRC generatie 2018', 'https://media.lincoln.com/content/fordmedia/feu/nl/nl/news/2018/01/11/ford-versterkt-betrokkenheid-bij-wrc-met-ondersteuning-van-m-spo/jcr:content/image.img.881.495.jpg/1515676767325.jpg'),

-- 2020
(2020, 'Toyota Yaris WRC 2020', 'Doorontwikkelde Yaris WRC', 'https://sport-auto.ch/wp-content/uploads/2020/12/WRC_2020_Rd.7_138_resultat.jpg'),
(2020, 'Hyundai i20 WRC 2020', 'Hyundai i20 nieuwe aero', 'https://2020.rallyitaliasardegna.com/wp-content/uploads/2020/10/SORDO-FINALE-2.jpg'),
(2020, 'Ford Fiesta WRC 2020', 'M-Sport Fiesta 2020', 'https://www.wrcwings.tech/wp-content/uploads/2020/07/Fiesta-by-Matthew-Willson.jpg'),

-- 2025
(2025, 'Toyota GR Yaris Rally1', 'Nieuwe Rally1 hybride auto', 'https://www.autohebdo.fr/app/uploads/2025/01/DPPI_01125001_351-1.jpg'),
(2025, 'Hyundai i20 N Rally1', 'Hybride Rally1-auto van Hyundai', 'https://img.redbull.com/images/c_limit,w_1500,h_1000/f_auto,q_auto/wrc/2025/2/10/mco-1jpg/e385dfbe-5274-3fbd-85c3-163a5a41656d'),
(2025, 'Ford Puma Rally1', 'Rally1-auto van M-Sport', 'https://i.ytimg.com/vi/QZud0owJCPE/maxresdefault.jpg');
