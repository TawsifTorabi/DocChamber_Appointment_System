

CREATE TABLE `blood_donation_record` (
  `user_id` int(255) NOT NULL,
  `last_donated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO blood_donation_record VALUES("11","1671423563");
INSERT INTO blood_donation_record VALUES("13","1671645255");



CREATE TABLE `hospital` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `website` varchar(200) NOT NULL,
  `location` varchar(400) NOT NULL,
  `mapcode` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO hospital VALUES("1","Evercare Hospital Ltd. Dhaka","0255037242","https://www.evercarebd.com/Dhaka","Plot 81, Dhaka 1229","Evercare Hospital Dhaka");
INSERT INTO hospital VALUES("2","Baridhara Genarel Hospital Ltd.","01768612835","https://baridharagenarelhospital.com","Road no- 31, Block - I, Bashundhara, Dhaka - 1229 ","Baridhara General Hospital Limited, Progoti Sharani, Dhaka");
INSERT INTO hospital VALUES("3","United Hospital Limited","09666710666","https://www.uhlbd.com","Plot 15, Road - 71, Dhaka","United Hospital Limited, Dhaka");
INSERT INTO hospital VALUES("4","Mohaimid Medical Center","0248810503","","Madani Road, Dhaka, 1212","Mohaimid Medical Center, Madani Road");
INSERT INTO hospital VALUES("5","Farazy Diagonostic & Hospital Ltd.","028832668","http://www.farazyhospitalltd.com/","Haji Momin Uddin Khandaker Super Market, 100 Feet Road, Madani Ave, Dhaka 1212. ","Farazy Diagonostic & Hospital Ltd. Notun Bazar");



CREATE TABLE `prescription` (
  `prescrption_id` int(255) NOT NULL AUTO_INCREMENT,
  `token_id` int(255) NOT NULL,
  `prescription` text NOT NULL,
  PRIMARY KEY (`prescrption_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO prescription VALUES("8","15","You need paracetamols");
INSERT INTO prescription VALUES("9","16","to ami ki korbo?");
INSERT INTO prescription VALUES("10","17","Have a paracetamol");
INSERT INTO prescription VALUES("11","21","hfkufkfhgfhg");
INSERT INTO prescription VALUES("12","22","Take antacid");
INSERT INTO prescription VALUES("13","15","Heheheheehhe");
INSERT INTO prescription VALUES("14","15","Heheheheehhe");



CREATE TABLE `sessions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session_id` text NOT NULL,
  `user_id` int(255) NOT NULL,
  `issued` int(255) NOT NULL,
  `expiry_time` int(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `browser` text NOT NULL,
  `location` varchar(300) NOT NULL,
  `validity` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

INSERT INTO sessions VALUES("2","1662827523","1","1662827523","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","valid");
INSERT INTO sessions VALUES("3","1662832757","1","1662832757","1662833219","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","invalid");
INSERT INTO sessions VALUES("4","1662833225","1","1662833225","1662833273","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","invalid");
INSERT INTO sessions VALUES("5","1662833278","1","1662833278","1662833729","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","invalid");
INSERT INTO sessions VALUES("6","1662833903","1","1662833903","1662836182","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","invalid");
INSERT INTO sessions VALUES("7","1662836270","1","1662836270","1662978929","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","invalid");
INSERT INTO sessions VALUES("8","1662978931","1","1662978931","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","valid");
INSERT INTO sessions VALUES("9","1663444452","1","1663444452","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","valid");
INSERT INTO sessions VALUES("10","1663619687","1","1663619687","0","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","valid");
INSERT INTO sessions VALUES("11","1663692799","1","1663692799","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0","","valid");
INSERT INTO sessions VALUES("12","1663797549","1","1663797549","0","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("13","1663832163","1","1663832163","1664105572","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("14","1663844327","1","1663844327","0","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("15","1663855426","1","1663855426","1664055627","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("16","1664055653","2","1664055653","1664055775","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("17","1664055782","3","1664055782","1664057770","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("18","1664057776","1","1664057776","1664142166","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("19","1664105580","3","1664105580","1664201261","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("20","1664126728","1","1664126728","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("21","1664126804","1","1664126804","0","::1","Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/105.0.5195.136 Mobile Safari/537.36 [FB_IAB/Orca-Android;FBAV/379.1.0.23.114;]","","valid");
INSERT INTO sessions VALUES("22","1664142168","1","1664142168","1664144473","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("23","1664144480","3","1664144480","1664193139","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("24","1664193141","1","1664193141","1664273918","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("25","1664201263","1","1664201263","1664224342","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("26","1664224354","2","1664224354","1664228428","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("27","1664228435","5","1664228435","1664228547","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("28","1664228555","1","1664228555","1664228603","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("29","1664228607","3","1664228607","1664267638","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("30","1664273922","1","1664273922","1664273923","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("31","1664274440","1","1664274440","1664274442","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("32","1664274542","1","1664274542","1664274544","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("33","1664274546","1","1664274546","1664274547","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("34","1664274808","1","1664274808","1664274810","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("35","1664274877","1","1664274877","1664274878","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("36","1664277324","1","1664277324","1664280879","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("37","1664280888","2","1664280888","1664280942","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("38","1664280948","2","1664280948","1664480351","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("39","1664282307","1","1664282307","1664282344","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("40","1664282356","2","1664282356","1664283782","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("41","1664283788","6","1664283788","1664284089","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("42","1664284097","5","1664284097","1664284102","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("43","1664284105","1","1664284105","1664289955","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("44","1664291716","1","1664291716","1664294434","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("45","1664294446","5","1664294446","1664299546","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("46","1664299552","5","1664299552","1664299574","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("47","1664299579","2","1664299579","1664299893","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("48","1664311057","1","1664311057","1664399349","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("49","1664399356","5","1664399356","1664399363","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("50","1664399372","5","1664399372","1664399421","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("51","1664399427","2","1664399427","1664399523","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("52","1664399527","1","1664399527","1664399542","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("53","1664399546","2","1664399546","1664399982","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("54","1664399991","4","1664399991","1664400059","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("55","1664400062","2","1664400062","1664403957","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("56","1664403961","2","1664403961","1664404048","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("57","1664404055","4","1664404055","1664404070","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("58","1664404074","2","1664404074","1664450791","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("59","1664404119","4","1664404119","1664405162","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("60","1664405164","2","1664405164","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("61","1664450803","4","1664450803","1664462338","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("62","1664450871","2","1664450871","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("63","1664462341","2","1664462341","1664463036","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("64","1664463038","1","1664463038","1664463041","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("65","1664463044","5","1664463044","1664463046","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("66","1664463055","4","1664463055","1664464641","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("67","1664464643","2","1664464643","1664466227","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("68","1664466231","1","1664466231","1664473944","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("69","1664473947","2","1664473947","1664498342","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("70","1664480353","1","1664480353","1664488041","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("71","1664488149","2","1664488149","1664488161","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("72","1664488171","3","1664488171","1664488191","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("73","1664488197","2","1664488197","0","192.168.0.103","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("74","1664498345","1","1664498345","1664507157","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("75","1664507160","2","1664507160","1664507511","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("76","1664507515","1","1664507515","1664507695","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("77","1664507697","2","1664507697","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("78","1664520890","2","1664520890","1664523631","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("79","1664523638","3","1664523638","1664524271","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("80","1664524280","1","1664524280","1664526019","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("81","1664528241","1","1664528241","1664528410","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","invalid");
INSERT INTO sessions VALUES("82","1664530737","1","1664530737","0","127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","","valid");
INSERT INTO sessions VALUES("83","1671223852","3","1671223852","1671223912","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("84","1671303048","3","1671303048","1671303055","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("85","1671305338","7","1671305338","1671305344","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("86","1671305371","7","1671305371","1671305375","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("87","1671306821","3","1671306821","1671308468","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("88","1671308486","3","1671308486","1671311229","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("89","1671311244","3","1671311244","1671311263","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("90","1671311729","3","1671311729","1671311739","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("91","1671312054","3","1671312054","1671312285","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("92","1671312317","8","1671312317","1671312320","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46","","invalid");
INSERT INTO sessions VALUES("93","1671349955","3","1671349955","1671350172","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("94","1671350178","3","1671350178","1671381337","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("95","1671384399","11","1671384399","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("96","1671387460","11","1671387460","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("97","1671391185","11","1671391185","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("98","1671391321","11","1671391321","1671421584","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("99","1671421619","11","1671421619","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("100","1671464478","11","1671464478","1671535604","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("101","1671537994","11","1671537994","1671546404","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("102","1671546417","11","1671546417","1671570281","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("103","1671570283","11","1671570283","1671643147","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("104","1671644449","13","1671644449","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("105","1671645062","13","1671645062","1671655464","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("106","1671655921","13","1671655921","1671728984","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("107","1671728987","13","1671728987","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("108","1672492358","13","1672492358","1672492825","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("109","1672492894","13","1672492894","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("110","1672503956","13","1672503956","1672516118","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("111","1672516125","14","1672516125","1672557600","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","invalid");
INSERT INTO sessions VALUES("112","1672524313","11","1672524313","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");
INSERT INTO sessions VALUES("113","1672557666","13","1672557666","0","::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54","","valid");



CREATE TABLE `staffs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `type` varchar(10) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO staffs VALUES("1","DR. SHAMIMA","AKTER","Senior Medical Officer","doctor","01927257900","shamima@admin.uiu.ac.bd","female","11111111","								Adept medical doctor with eight years of practice experience. </br>
								Dedicated to exemplary patient outcomes and following all necessary medical procedures </br>
								with the use of the latest industry equipment and technology. </br>
								Strong focus on listening to and addressing patient concerns and answering all questions </br>
								in terms patients can easily understand. Willingness to work with all members of the medical team </br>
								and listen to their suggestions and input to improve results and maximize patient satisfaction. </br>
								Specialized as a general internist during residency, providing me with knowledge of </br>
								a range of health issues that impact internal organs.","myphoto.jpg");



CREATE TABLE `tokens` (
  `token_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `week_day` varchar(4) NOT NULL,
  `date` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `attendance` varchar(20) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `createDateTime` varchar(255) NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO tokens VALUES("15","13","Sat","2022-12-31","I have Cancer","0a9ebb14a120b957fa1899f1f3852ded","yes","invalid","1672514238");
INSERT INTO tokens VALUES("16","11","Sat","2022-12-31","amar onek shomossha","null","yes","invalid","1672524330");
INSERT INTO tokens VALUES("17","11","Sat","2022-12-31","I am getting Migrain Pain","43567ec252fa846f8dc621af9f91d583","yes","invalid","1672524514");
INSERT INTO tokens VALUES("18","11","Sat","2022-12-31","asda","11","no","invalid","1672524612");
INSERT INTO tokens VALUES("19","11","Sat","2022-12-31","I'm getting ADHD","11","no","invalid","1672525011");
INSERT INTO tokens VALUES("20","11","Sat","2022-12-31","I'm getting ADHD Problems","11","no","invalid","1672525093");
INSERT INTO tokens VALUES("21","11","Sat","2022-12-31","cffjhfmg`","b27741dd259f6e67d9257ed91eae8ae5","yes","invalid","1672525127");
INSERT INTO tokens VALUES("22","11","Sat","2022-12-31","I'm having stomach pain too much ","12","yes","invalid","1672525265");



CREATE TABLE `transaction` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `timestamp` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO transaction VALUES("10","0a9ebb14a120b957fa1899f1f3852ded","13","50","1672514241");
INSERT INTO transaction VALUES("11","43567ec252fa846f8dc621af9f91d583","11","50","1672524516");
INSERT INTO transaction VALUES("12","b27741dd259f6e67d9257ed91eae8ae5","11","50","1672525129");



CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminprivilege` varchar(20) NOT NULL,
  `CreationTimestamp` varchar(155) NOT NULL DEFAULT current_timestamp(),
  `blood_group` varchar(4) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("3","Talha Beg","011201344","1234","no","1662828950","B+","2000-10-23","male");
INSERT INTO users VALUES("7","Tanvir Ahad","111201432","11111111","no","1671305318","B+","2000-12-10","male");
INSERT INTO users VALUES("8","Amanullah Faysal","011193045","11111111","no","1671312310","A+","1999-11-29","male");
INSERT INTO users VALUES("9","Sakib Ahmed","111201555","11111111","no","1671312343","O-","1997-12-31","male");
INSERT INTO users VALUES("10","Monir Uz Zaman","011201982","11111111","no","1671384193","AB+","2000-10-24","male");
INSERT INTO users VALUES("11","Tawsif Torabi","011201467","11111111","no","1671384387","B+","2000-10-21","male");
INSERT INTO users VALUES("13","Abu Talha","011201043","11111111","no","1671644443","B-","1996-10-10","male");
INSERT INTO users VALUES("14","UIU Admin","admin","pass","yes","1671644443","B+","1996-10-10","male");

