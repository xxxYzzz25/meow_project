# ************************************************************
# Sequel Pro SQL dump
# Version 45412
#
# Dump of table HALFWAY_MEMBER
# ------------------------------------------------------------

CREATE TABLE `HALFWAY_MEMBER` (
  `HALF_NO` int(5) NOT NULL AUTO_INCREMENT COMMENT '自動產生會員編號',
  `HALF_ID` varchar(50) NOT NULL DEFAULT '',
  `HALF_PSW` varchar(32) NOT NULL DEFAULT '',
  `HALF_NAME` varchar(20) NOT NULL DEFAULT '',
  `HALF_HEAD` varchar(10) NOT NULL DEFAULT '',
  `HALF_TEL` varchar(10) NOT NULL DEFAULT '',
  `HALF_ADDRESS` varchar(40) NOT NULL DEFAULT '',
  `HALF_AUDIT_STATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=審核中/ 1=審核成功/ 2=審核失敗',
  `HALF_DISCOUNT` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=尚未獲得/ 1=已獲得/ 2=已使用',
  `HALF_BAN` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=未停權/ 1=停權中',
  `HALF_OPEN` varchar(20) NOT NULL DEFAULT '尚未登記',
  `HALF_COVER` varchar(100) NOT NULL DEFAULT '../images/halfMemberPic/default.jpg',
  `HALF_INTRO` text NOT NULL,
  PRIMARY KEY (`HALF_NO`),
  UNIQUE KEY `HALF_ID` (`HALF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `HALFWAY_MEMBER` (`HALF_NO`, `HALF_ID`, `HALF_PSW`, `HALF_NAME`, `HALF_HEAD`, `HALF_TEL`, `HALF_ADDRESS`, `HALF_AUDIT_STATUS`, `HALF_DISCOUNT`, `HALF_BAN`, `HALF_OPEN`, `HALF_COVER`, `HALF_INTRO`)
VALUES
	(1, 'Sara@gmail.com', '96e79218965eb72c92a549dd5a330112', '野喵中途咖啡', '董董', '0912345678', '新北市三重區集英路65號', 1, 1, 0, '12:00~21:00（周一公休）', '../images/halfMemberPic/Sara@gmail.com.jpg', '位在三重的「野喵中途咖啡」，是目前所有貓中途咖啡廳在網路上搜尋度最高的一家，開業也約有3年半的時間，這期間援助了150多隻貓咪找到家，在流浪動物中途來說是相當可觀的數字，「野喵中途咖啡」主要是由4個擁有強大的耐心與愛心的女生所開設的，她們將咖啡廳與貓咪中途之家相互結合，店內供應提供各式餐點，像是義大利麵、飯類等及咖啡飲品並販售貓咪相關周邊商品。'),
	(2, 'Handsome@gmail.com', '96e79218965eb72c92a549dd5a330112', '讀貓園-貓咪中途咖啡', '帥帥', '0912345678', '台北市大安區和平東路三段370號2樓', 1, 0, 0, '14:00~22:30（周一公休）', '../images/halfMemberPic/Handsome@gmail.com.jpg', '讀貓園裡面有幾個位子是像吧台一樣，面對待認養貓咪櫥窗。你可以和朋友、家人一起邊喝咖啡、邊吃著好吃的鬆餅，邊觀察貓咪的一舉一動。小貓咪喜歡縮在一起取暖睡覺，整窩睡到翻肚的小貓咪就在眼前，好像在肯亞草原冒險時在樹叢底下發現一整窩虎虎大睡的小獅子畫面一樣。看著貓咪們規律起伏的肚子一邊唸書、寫功課、想事情，有一種難以言語的安全感和平靜的幸福。'),
	(3, 'Silvia@gmail.com', '96e79218965eb72c92a549dd5a330112', '雅風音樂貓咪中途咖啡餐廳', 'Silvia', '0229381380', '新北市文山區木新路三段50巷7號1樓', 1, 0, 0, '12:00~21:00（周一公休）', '../images/halfMemberPic/Silvia@gmail.com.jpg', '雅風音樂咖啡餐廳原本是林老師想要做為學生練習的場地，但因使用的期間不長，才轉變成為貓咪中途咖啡廳，希望幫助更多流浪貓找到溫暖的家，餐廳內沒有華麗的裝潢，木製的吧檯兼座位，加上幾張四人桌椅、貓咪跳台，就是流浪貓咪溫暖的中途之家，也是愛貓人士聚集的所在！'),
	(4, 'rain@gmail.com', '96e79218965eb72c92a549dd5a330112', 'RAIN*S CAT', '林雨潔', '0977889912', '屏東市瑞光路三段53號', 1, 0, 0, '尚未登記', '../images/halfMemberPic/rain@gmail.com.jpg', ''),
	(5, 'gan@gmail.com', '96e79218965eb72c92a549dd5a330112', '貓極簡', '李璐璐', '0978493474', '台中市南區復興路二段7號', 1, 0, 0, '尚未登記', '../images/halfMemberPic/gan@gmail.com.jpg', '');


# Dump of table MEMBER
# ------------------------------------------------------------

CREATE TABLE `MEMBER` (
  `MEM_NO` int(5) NOT NULL AUTO_INCREMENT COMMENT '自動產生會員編號',
  `MEM_ID` varchar(50) NOT NULL DEFAULT '',
  `MEM_PSW` varchar(32) NOT NULL DEFAULT '',
  `MEM_NAME` varchar(8) NOT NULL DEFAULT '',
  `MEM_BIRTHDAY` date NOT NULL,
  `MEM_TEL` varchar(10) NOT NULL DEFAULT '',
  `MEM_ADDRESS` varchar(40) NOT NULL DEFAULT '',
  `MEM_SCORE` int(3) DEFAULT NULL,
  `MEM_PIC` varchar(100) NOT NULL DEFAULT '../images/memberPic/default.jpg',
  `MEM_DISCOUNT` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=尚未獲得/ 1=已獲得/ 2=已使用',
  `MEM_BAN` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=未停權/ 1=停權中',
  PRIMARY KEY (`MEM_NO`),
  UNIQUE KEY `MEM_ID` (`MEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `MEMBER` (`MEM_NO`, `MEM_ID`, `MEM_PSW`, `MEM_NAME`, `MEM_BIRTHDAY`, `MEM_TEL`, `MEM_ADDRESS`, `MEM_SCORE`, `MEM_PIC`, `MEM_DISCOUNT`, `MEM_BAN`)
VALUES
	(1, 'Sara@gmail.com', '96e79218965eb72c92a549dd5a330112', '董董', '1990-01-01', '0912345678', '中央大學資策會', 8, '../images/memberPic/sara@gmail.com.jpg', 0, 0),
	(2, 'Handsome@gmail.com', '96e79218965eb72c92a549dd5a330112', '帥帥', '1990-01-01', '0912345678', '中央大學資策會', 5, '../images/memberPic/handsome@gmail.com.jpg', 0, 0),
	(3, 'Silvia@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Silvia', '1990-01-01', '0912345678', '中央大學資策會', 8, '../images/memberPic/silvia@gmail.com.jpg', 0, 0);


# Dump of table PRODUCT
# ------------------------------------------------------------

CREATE TABLE `PRODUCT` (
  `PRODUCT_NO` int(10) NOT NULL AUTO_INCREMENT,
  `PRODUCT_NAME` varchar(30) NOT NULL DEFAULT '',
  `PRODUCT_PRICE` int(5) NOT NULL,
  `PRODUCT_NARRATIVE` text NOT NULL COMMENT '敘述',
  `PRODUCT_STATUS` tinyint(1) NOT NULL COMMENT '0=上架中/ 1=停售中',
  `PRODUCT_WEIGHT` varchar(20) DEFAULT NULL,
  `PRODUCT_LOC` varchar(20) DEFAULT NULL,
  `PRODUCT_COMPONENT` text,
  `PRODUCT_SIZE` varchar(20) DEFAULT NULL,
  `PRODUCT_MATERIAL` varchar(20) DEFAULT NULL,
  `PRODUCT_PART` tinyint(1) NOT NULL COMMENT '1=喵喵肚子餓 2=喵喵待在家 3=精選喵草 4=喵喵愛玩耍',
  `PRODUCT_COVER` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`PRODUCT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `PRODUCT` (`PRODUCT_NO`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_NARRATIVE`, `PRODUCT_STATUS`, `PRODUCT_WEIGHT`, `PRODUCT_LOC`, `PRODUCT_COMPONENT`, `PRODUCT_SIZE`, `PRODUCT_MATERIAL`, `PRODUCT_PART`, `PRODUCT_COVER`)
VALUES
	(1, 'Friskies 雞肉罐頭', 49, 'BEST!全方位寵物營養專家,專門替亞熱帶地區寵物特別研發出全方位營養寵物飼料。 \n遵照 NRC、AAFCO、FEDIAF 為標準製作， 並技術指導製造商使用高規格機器， 在全程電腦精準計算食材數量控制， 及人員嚴格品質把關的低溫烘培下， 將食材營養牢牢鎖在飼料中，讓養分完全保留不流失， BEST！系列絕不潻加人工香料、荷爾蒙、防腐劑、化學添加物、動物副產品！ 冠全生技用心、用愛來生產寵物飼料， 讓每位飼主的愛心可藉由優良寵物飼料傳遞給寵物。 因此特別與「財團法人動物研究所動物產業組」合作定期進行飼料批量病毒檢驗。 \n', 0, '100g (± 5%)', '紐西蘭', '粗蛋白質 30%、粗脂肪 10%、粗纖維 4%、水分 11%', NULL, NULL, 1, '../images/productPic/1.jpg'),
	(2, 'Whiskas 美味飼料', 239, '高達78%的新鮮肉類及魚類蛋白質，不含穀類，減少過敏原。22%的蔬果精華及多種滋補草本植物能抗氧化。高達8種益生菌及益菌生，照顧腸胃並幫助吸收。添加葡萄糖胺及軟骨素，維護關節健康及發展。富含Omega3&6不飽和脂肪酸，有效對抗發炎、護膚亮毛。', 0, '1kg', '美國', '蛋白質、碳水化合物、維生素、礦物質、Omega Oil', NULL, NULL, 1, '../images/productPic/2.jpg'),
	(3, 'Whiskas 雞肉口味飼料', 889, '動物性蛋白質80%符合貓生理需求 ，黴菌毒素吸附劑有效吸附腸道害菌 ，牛磺酸安定貓神經維持視覺的功能 ，菸鹼酸加入減少貓咪下痢消瘦可能 ，特殊胺基酸保護腎臟平衡尿液酸鹼', 0, '7kg', '美國', '扁豆、鷹嘴豆、蛋、乾燥啤酒酵母、天然香料', NULL, NULL, 1, '../images/productPic/3.jpg'),
	(4, 'FancyFeast 鮪魚大餐', 250, '高優質全天然雞肉蛋白質，最容易消化吸收。不含玉米，小麥，黃豆成份，低便量低便臭。高含量亞麻酸，有效護膚亮毛。豐富蔬果精華，提升抗氧化強化免疫力。濃縮蔓越莓精華，維護泌尿道健康。', 0, '1.2kg', '澳洲', '濃縮雞肉、豌豆、雞脂肪、濃縮白身魚肉、濃縮牛肉，木薯澱粉', NULL, NULL, 1, '../images/productPic/4.jpg'),
	(5, 'PETS 防濺貓便盆', 1680, '有效防止貓砂飛濺，便於整理，篩網取用便利好清洗，上蓋側邊落砂網設計，多種顏色可選，每款附一同色貓鏟', 0, NULL, '台灣', NULL, '91 x 65 x 6cm', '聚脂纖維', 2, '../images/productPic/5.jpg'),
	(6, 'Ppark 貓抓板', 390, '台灣製造品質可靠安心耐用。強化集層紙板貼合而成，堅固紮實，耐磨損，耐用度是一般瓦楞紙的四倍。可減少80%的紙塵產生。貓咪磨爪最佳良器，精緻收編設計，耐抓耐咬耐磨損。', 0, NULL, '日本', NULL, '35 x 22 x 7.5 cm', '瓦楞紙', 2, '../images/productPic/6.jpg'),
	(7, 'Nourish 貓砂', 499, '輕如羽毛, 吸水力強如海棉，難以置信的除臭效果，100% 貓咪實測證實效果佳，可沖馬桶並容易清理，特殊的豆腐顆粒纖維讓每顆立方體表面有10幾萬個細微毛孔, 讓貓砂有著超強吸水力及高除臭效果', 0, '10kg', '台灣', '豆腐 , 玉米澱粉, 檸檬酸', NULL, NULL, 2, '../images/productPic/7.jpg'),
	(8, 'Kiki 潔毛手套', 249, '五指靈活設計，穿脫方便。輕輕一摸，帶走多餘雜毛，輕鬆徹底清潔寵物雜毛 ，矽膠材質柔軟舒適，不傷害寵物的肌膚，可增進與寵物的感情', 0, '72g', '中國', NULL, '17 x 24 x 1 cm', '橡膠', 2, '../images/productPic/8.jpg'),
	(9, 'Petstages 貓草罐', 180, '延長貓草香味最棒的補充包，內含100% 天然優質貓草，適量灑在玩具上，可以有效引起貓咪的興趣，優質的貓薄荷香味是貓咪最愛的味道，降低貓咪的無聊感，能減少不必要的破壞行為發生', 0, '14g', '美國', '貓草粉', NULL, NULL, 3, '../images/productPic/9.jpg'),
	(10, 'PetBest 有機貓薄荷草', 198, 'PetBest 百憂解有機貓薄荷草，鐵罐吸濕密封蓋包裝，有機栽培的薄荷草，無農藥無添加人工物經冷風乾燥製作，精選A級品葉，香氣養份不流失，常保鮮綠。食用薄荷貓草，可舒解貓咪情緒，增進食慾，並可幫助貓咪腸胃蠕動，促進腸胃的健康，排出毛球', 0, '20g', '日本', '薄荷、貓草粉', NULL, NULL, 3, '../images/productPic/10.jpg'),
	(11, 'GimCat 貓草膏', 300, '貓草膏是便利的貓草替代品，以精選高級貓草提煉而成，內含豐富的葉綠素，營養源，能補充貓咪所需能量。 高纖維質能幫助貓咪排出毛球整腸助消化。 可穩定貓兒情緒', 0, '50g', '德國', '甘草、油、脂肪、維生素E', NULL, NULL, 3, '../images/productPic/11.jpg'),
	(12, 'PetBest 絕對貓草錠', 160, '內含豐富的天然 (荊芥內脂、麝香) 等化合物能舒緩愛貓心情，減輕壓力與焦躁。純天然的植物纖維，幫助愛貓排除體內毛球，助消化、維護腸道健康。經打錠製成更保有其香氣，增加刺激與興奮的作用，愛貓會躺於地上左右打滾、流口水，如同酒醉般地發出愉悅的咕咕聲', 0, '30錠入 (每錠500mg)', '日本', '鐵、硒、鉀、錳、鉛、維生素、礦物質、葉綠素', NULL, NULL, 3, '../images/productPic/12.jpg'),
	(13, 'PETMATE 雷射逗貓棒', 880, '雙重玩法，將雷射筆套在手指頭上，若隱若現的雷射光可讓喵星人享受野生捕獵的感受。此外，逗貓棒附帶金屬釣線，釣線前頭的掛鉤可掛上傑克森—羽毛系列。將逗貓棒舉高並晃動可激起喵星人高空獵捕的動力，亦可增進與寵物間的情感。逗貓棒為可收進口袋設計，方便攜帶不佔空間。遊戲可幫助情緒安定、減少日常生活累積的壓力與不開心，陪伴喵星人無聊的時間', 0, NULL, '中國', NULL, '46 x 4 x 1 cm', '塑膠、金屬', 4, '../images/productPic/13.jpg'),
	(14, 'PET DREAM 抓老鼠轉盤', 320, '圓盤式設計，由底盤、彈簧桿、毛絨老鼠、貓爪墊組成。玩具頂部為貓抓板的設計，可以讓貓咪抓抓抓，磨爪子。玩具圓盤裝置內放置的玩具鼠，輕輕一碰就會圍著圓盤轉圈', 0, NULL, '中國', NULL, '直徑 25 cm，高 6.5 cm', '環保塑料、絨毛', 4, '../images/productPic/14.jpg'),
	(15, 'Migo 貓咪蹭毛器', 455, '本產品採用的是高級毛刷，硬度適中，一般貓咪都適用，如果貓咪是從外面玩耍回家，您可以把產品放到門口，讓貓咪在刷門裡來回的走動，這樣就不怕貓咪把髒東西帶回家了。貓咪身上癢的時候可以拿出來，刷子可拆開另外清洗，在貓咪玩耍的同時還可以幫助清潔貓咪身上的髒東西，真是一舉兩得', 0, NULL, '台灣', NULL, '36 x 28.5 x 34 cm', '不銹鐵、高度地毯布', 4, '../images/productPic/15.jpg'),
	(16, 'iCat 三角貓咪隧道', 790, '偷偷潛入、或者隱藏、或者玩躲貓貓。小小的迷宮，隧道有四個口，將引起貓咪挑戰的心情，也可減輕貓咪的身心壓力。收納簡單，折圓壓扁即可快速收納，重量超輕巧，任何人皆可收放自如，並且不佔空間。不僅耐抓，也方便清洗', 0, NULL, '日本', NULL, '直徑 25 cm、長 50 cm', '聚酯、聚酯、聚丙烯、鋼鐵、橡膠', 4, '../images/productPic/16.jpg');



# Dump of table EMP
# ------------------------------------------------------------

CREATE TABLE `EMP` (
  `EMP_NO` int(5) NOT NULL AUTO_INCREMENT,
  `EMP_ID` varchar(50) NOT NULL DEFAULT '',
  `EMP_PSW` varchar(32) NOT NULL DEFAULT '',
  `EMP_POST` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`EMP_NO`),
  UNIQUE KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `EMP` (`EMP_NO`, `EMP_ID`, `EMP_PSW`, `EMP_POST`)
VALUES
	(1, 'acqq', '96e79218965eb72c92a549dd5a330112', 'Super Admin'),
	(2, 'kevin', '96e79218965eb72c92a549dd5a330112', 'Super Admin'),
	(3, '林阿雄', '96e79218965eb72c92a549dd5a330112', 'Super Admin'),
	(4, 'xxxzz25', '96e79218965eb72c92a549dd5a330112', 'Super Admin'),
	(5, 'cherry', '96e79218965eb72c92a549dd5a330112', 'Super Admin');


# Dump of table CAT
# ------------------------------------------------------------

CREATE TABLE `CAT` (
  `CAT_NO` int(6) NOT NULL AUTO_INCREMENT,
  `HALF_NO` int(5) NOT NULL,
  `CAT_NAME` varchar(10) NOT NULL DEFAULT '',
  `ADOPT_STATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=待領養/ 1=審核中/ 2=已領養',
  `CAT_SEX` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=男生/ 1=女生',
  `CAT_NARRATIVE` text NOT NULL COMMENT '喵小孩敘述',
  `CAT_DATE` varchar(10) NOT NULL DEFAULT '' COMMENT '出生年月(西元)',
  `CAT_VACCINE` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=未打疫苗/ 1=已打疫苗',
  `CAT_COLOR` varchar(5) NOT NULL DEFAULT '' COMMENT '顏色敘述',
  `CAT_LIGATION` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=未結紮/ 1=已結紮',
  `CAT_COVER` varchar(100) NOT NULL DEFAULT '../images/catPic/default.jpg',
  `CAT_LOCATION` varchar(5) NOT NULL DEFAULT '' COMMENT '縣市',
  `CAT_INDIVIDUALITY` varchar(40) NOT NULL DEFAULT '' COMMENT '貓咪個性',
  `CAT_FIT` varchar(40) NOT NULL DEFAULT '' COMMENT '貓咪適合對象',
  `CAT_ADVANTAGE` varchar(40) NOT NULL DEFAULT '' COMMENT '貓咪優點',
  `CAT_DISADVANTAGE` varchar(40) NOT NULL DEFAULT '' COMMENT '貓咪缺點',
  PRIMARY KEY (`CAT_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `cat_ibfk_1` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `CAT` (`CAT_NO`, `HALF_NO`, `CAT_NAME`, `ADOPT_STATUS`, `CAT_SEX`, `CAT_NARRATIVE`, `CAT_DATE`, `CAT_VACCINE`, `CAT_COLOR`, `CAT_LIGATION`, `CAT_COVER`, `CAT_LOCATION`, `CAT_INDIVIDUALITY`, `CAT_FIT`, `CAT_ADVANTAGE`, `CAT_DISADVANTAGE`)
VALUES
	(1, 5, '喵拉拉', 2, 1, '活潑、親人、不怕生', '2017/9', 0, '虎斑', 0, '../images/catPic/gan@gmail.com2.jpg', '台中市', '活潑、親人、不怕生', '養貓新手', '超撒嬌、黏人、非常呼嚕', '愛討摸、貪吃'),
	(2, 5, '喵泰勒', 2, 1, '乖巧、內向', '2017/12', 0, '黑白', 0, '../images/catPic/gan@gmail.com1.jpg', '台中市', '到新環境易緊張、需耐心對待、乖巧、內向、不搗蛋、熟悉後才愛撒嬌、安靜、內斂', '有養貓經驗者', '乖巧、內向', '剛到新環境會較緊張'),
	(3, 4, '喵豪兒', 2, 0, '很閉俗、害羞但不怕生', '2017/11', 1, '虎斑', 0, '../images/catPic/rain@gmail.com2.jpg', '屏東縣', '很閉俗、害羞但不怕生', '養貓新手', '熟悉後愛撒嬌、乖巧、懂事、很有氣質', '剛到新環境會較緊張'),
	(4, 2, '喵絨絨', 2, 1, '親人愛玩', '2017/09', 1, '黑', 1, '../images/catPic/Handsome@gmail.com8.jpg', '台北市', '親人、溫和', '初養貓者', '剛來還不清楚', '剛來還不清楚'),
	(5, 1, '喵兵兵', 2, 1, '混新加坡貓', '2016/10', 1, '虎斑', 1, '../images/catPic/Sara@gmail.com5.jpg', '新北市', '親熟人、有個性、陌生人接近會哈氣作勢，但其實不會攻擊人', '有養過貓的人', '認人，只愛熟人', '慢熟、緊張'),
	(6, 1, '喵皮皮', 0, 0, '超級親人活潑外放', '2017/05', 1, '黑白', 1, '../images/catPic/Sara@gmail.com6.jpg', '新北市', '親人、活潑', '初養貓者', '活潑愛玩很有趣', '不知輕重'),
	(7, 2, '喵追風', 0, 0, '長得像反派老大...', '2015', 1, '橘', 1, '../images/catPic/Handsome@gmail.com7.jpg', '台北市', '非常親人，人怎麼弄他都不會生氣', '初養貓者', '已經長大了很好照顧、很親人、對人脾氣很好', '長得像壞蛋...看起來好像很兇..但是這不是真的'),
	(8, 2, '喵絨絨', 0, 1, '親人愛玩', '2017/09', 1, '黑', 1, '../images/catPic/Handsome@gmail.com8.jpg', '台北市', '親人、溫和', '初養貓者', '剛來還不清楚', '剛來還不清楚'),
	(9, 2, '喵絲絲', 2, 1, '橘白貓', '2017/03', 1, '橘白', 1, '../images/catPic/Handsome@gmail.com9.jpg', '台北市', '親人、愛玩', '初養貓者', '親人、愛玩', '有點兒調皮'),
	(10, 2, '喵三寶', 0, 0, '活潑親人', '2017/09', 1, '黑白', 1, '../images/catPic/Handsome@gmail.com10.jpg', '台北市', '親人、活潑', '初養貓者', '活潑愛玩', '尚未發現'),
	(11, 2, '喵好好', 0, 0, '活潑親人', '2017/02', 1, '虎斑', 1, '../images/catPic/Handsome@gmail.com11.jpg', '台北市', '親人', '有養過貓的人', '親人、很主動、喜歡坐在人的大腿上', '剛來未知'),
	(12, 4, '喵羅丹', 0, 0, '乖巧、內向', '2016/08', 1, '虎斑', 1, '../images/catPic/rain@gmail.com0.jpg', '屏東縣', '到新環境易緊張、需耐心對待、乖巧、內向、不搗蛋、熟悉後才愛撒嬌、安靜、內斂', '養貓新手', '乖巧、內向', '易緊張'),
	(13, 4, '喵皮耶', 0, 0, '活潑、親人、不怕生', '2017/10', 0, '橘虎斑', 1, '../images/catPic/rain@gmail.com1.jpg', '屏東縣', '活潑、親人、不怕生', '養貓新手', '超撒嬌、黏人、非常呼嚕', '調皮'),
	(14, 4, '喵豪兒', 0, 0, '很閉俗、害羞但不怕生', '2017/11', 1, '虎斑', 0, '../images/catPic/rain@gmail.com2.jpg', '屏東縣', '很閉俗、害羞但不怕生', '養貓新手', '熟悉後愛撒嬌、乖巧、懂事、很有氣質', '剛到新環境會較緊張'),
	(15, 4, '喵達菲', 0, 0, '較怕生、很會觀察人', '2017/11', 1, '橘虎斑', 1, '../images/catPic/rain@gmail.com3.jpg', '屏東縣', '較怕生、很會觀察人', '有養貓經驗者', '需耐心培養信任感、熟悉後愛撒嬌、貪吃', '較怕生'),
	(16, 4, '喵昆比', 0, 1, '親人、活潑、愛撒嬌', '2017/12', 1, '黑', 0, '../images/catPic/rain@gmail.com4.jpg', '屏東縣', '親人、活潑、愛撒嬌', '養貓新手', '愛呼嚕、沒脾氣、黏人', '愛討摸、貪吃'),
	(17, 5, '喵丹丹', 0, 0, '超親人、黏人、愛跟人撒嬌、愛呼嚕', '2017/09', 0, '黑虎斑', 0, '../images/catPic/gan@gmail.com0.jpg', '台中市', '超親人、黏人、愛跟人撒嬌、愛呼嚕', '養貓新手', '超親人', '調皮、貪玩'),
	(18, 5, '喵泰勒', 0, 1, '乖巧、內向', '2017/12', 0, '黑白', 0, '../images/catPic/gan@gmail.com1.jpg', '台中市', '到新環境易緊張、需耐心對待、乖巧、內向、不搗蛋、熟悉後才愛撒嬌、安靜、內斂', '有養貓經驗者', '乖巧、內向', '剛到新環境會較緊張'),
	(19, 5, '喵拉拉', 0, 1, '活潑、親人、不怕生', '2017/9', 0, '虎斑', 0, '../images/catPic/gan@gmail.com2.jpg', '台中市', '活潑、親人、不怕生', '養貓新手', '超撒嬌、黏人、非常呼嚕', '愛討摸、貪吃'),
	(20, 1, '喵航航', 0, 0, '活潑親人', '2017/09', 1, '黑白', 1, '../images/catPic/Sara@gmail.com1.jpg', '新北市', '親人、溫和', '初養貓者', '很懂得珍惜', '剛換環境會有點小緊張'),
	(21, 1, '喵芽芽', 0, 1, '活潑親人', '2017/09', 1, '虎斑', 1, '../images/catPic/Sara@gmail.com2.jpg', '新北市', '親人、溫和', '初養貓者', '很盡責，有陣子貓區只剩他一隻貓，他會很盡力的滿足全場客人想摸摸的慾望', '剛換環境會有點小緊張'),
	(22, 1, '喵大眼', 0, 1, '撒嬌親人', '2015', 1, '橘白', 1, '../images/catPic/Sara@gmail.com4.jpg', '新北市', '親人、傲嬌', '初養貓者', '親人，有個性', '剛換環境會有點小緊張'),
	(23, 1, '喵蝦米', 0, 0, '活潑親人', '2017/01', 1, '橘白', 1, '../images/catPic/Sara@gmail.com3.jpg', '新北市', '親人、溫和', '初養貓者', '很懂得珍惜', '剛換環境會有點小緊張'),
	(24, 2, '喵絲絲', 0, 1, '橘白貓', '2017/03', 1, '橘白', 1, '../images/catPic/Handsome@gmail.com9.jpg', '台北市', '親人、愛玩', '初養貓者', '親人、愛玩', '有點兒調皮'),
	(25, 1, '喵兵兵', 0, 1, '混新加坡貓', '2016/10', 1, '虎斑', 1, '../images/catPic/Sara@gmail.com5.jpg', '新北市', '親熟人、有個性、陌生人接近會哈氣作勢，但其實不會攻擊人', '有養過貓的人', '認人，只愛熟人', '慢熟、緊張');



# Dump of table ADOPTION
# ------------------------------------------------------------

CREATE TABLE `ADOPTION` (
  `CAT_NO` int(6) NOT NULL AUTO_INCREMENT,
  `MEM_NO` int(5) NOT NULL,
  `ADOPT_DATE` date NOT NULL,
  PRIMARY KEY (`CAT_NO`,`MEM_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `CAT_NO` (`CAT_NO`),
  CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`CAT_NO`) REFERENCES `CAT` (`CAT_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ADOPTION` (`CAT_NO`, `MEM_NO`, `ADOPT_DATE`)
VALUES
	(1, 3, '2018-01-10'),
	(2, 3, '2018-01-17'),
	(3, 1, '2018-01-01'),
	(4, 2, '2017-12-31'),
	(5, 1, '2017-12-29'),
	(9, 2, '2017-12-29');




# Dump of table ARTICLE
# ------------------------------------------------------------

CREATE TABLE `ARTICLE` (
  `ARTICLE_NO` int(10) NOT NULL AUTO_INCREMENT,
  `MEM_NO` int(5) DEFAULT NULL,
  `HALF_NO` int(5) DEFAULT NULL,
  `ARTICLE_TITLE` varchar(20) NOT NULL DEFAULT '',
  `ARTICLE_CONTENT` text NOT NULL,
  `ARTICLE_TIME` datetime NOT NULL,
  `ARTICLE_PART` varchar(1) NOT NULL DEFAULT '' COMMENT '1=飼養討論 2=商品討論 3=中途討論',
  PRIMARY KEY (`ARTICLE_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ARTICLE` (`ARTICLE_NO`, `MEM_NO`, `HALF_NO`, `ARTICLE_TITLE`, `ARTICLE_CONTENT`, `ARTICLE_TIME`, `ARTICLE_PART`)
VALUES
	(1, 1, NULL, '我的喵喵起床吐了...', '如題...剛剛才發生的\n\n先是衝出了一團很奇怪的長條物\n\n後來就吐了一些黃褐色的水\n\n看到她這樣感覺好可憐喔\n\n拜託有經驗的朋友幫幫我好嗎?', '2018-01-16 16:33:08', '1'),
	(2, 2, NULL, '要怎麼教小貓不亂咬手腳', '我一個月前認養了一隻小貓現在三個月大（我是新手） \n有時不知道他哪根筋不對 \n會衝到腳旁邊抱著腳咬踹、手也是 \n但看很多人的作法是聲音提高對他說不可以 \n可是對我家貓好像沒效，彈耳朵或鼻子我不太敢彈怕失手\n我也捨不得用打的 但又不能甩開他這樣會讓他覺得是玩具 \n有其他的建議可以給我嗎', '2017-11-20 17:20:40', '1'),
	(3, 3, NULL, '第一次帶浪貓去結紮', '餵食一隻浪貓已經半年多 昨天順利捉去醫院結紮了 \n醫師檢查後說約四、五歲的公貓 身體健康無任何常見傳染病 就是跳蚤多一點 \n請醫師做了一切可以做的處理 今天把牠帶回家了 我叫牠灰灰 \n\n灰灰是一隻極其安靜乖巧的貓咪 \n從前流浪時我餵食 另一隻身材比牠瘦小的貓咪總是搶著吃 甚至用頭將灰灰的嘴巴「撞開」------ \n是的 就是很兇的將牠撞開！而牠居然就退到旁邊乖巧的蹲坐著等 等那隻比較瘦小的貓吃完了 若有剩牠才會過來吃 \n\n醫師說灰灰很強壯 肌肉發達（4.8公斤） 從頭到尾傷痕累累 可見在外面經常追逐打鬥 卻很幸運的沒有貓愛滋 \n貓白血 新絲蟲 冠狀病毒……唯有血小板低下 已經打針處理 \n\n說半天 就是想要收養牠啦 \n但是認識的貓友都知道我有一隻「自閉貓」 養三年了不給抱 還過度舔毛 \n就是照片裡那隻喜歡沈思的黑貓「烏溜溜小姐」是也 \n醫師警告我 成貓對神經質的貓壓力太大 不宜收養 否則過度舔毛的問題恐會更加嚴重 讓我很猶豫…… \n\n我還是將灰灰先帶回家 隔離在一個地方 想說至少三天讓灰灰的傷口好了再看看是留下 或原地放回 \n\n現在我的烏溜溜隔著門 不斷往門縫嗅聞著 我猜溜溜已經心裡有數了……. \n我知道「引介」的步驟 我會一步一步慢慢的試試看 \n\n1請問灰灰點了「全能貓」驅蟲 這樣就驅得乾淨嗎？ \n2牠從沒洗過澡 三天後我該如何處理？先用擦拭的？還是送洗？ \n3醫師說至少一星期後才能打預防針，是嗎？ \n4結紮了我沒讓牠剪耳，因為我覺得貓咪會痛很可憐（其實是我想收養牠，覺得沒必要） \n萬一不得已要原放 請問有什麼方法可以讓別人知道灰灰已經結紮了？有啥特殊的項圈可以戴嗎？？ \n\n請大家給我一點鼓勵吧 或任何建議 感恩～！! ', '2018-01-22 19:21:37', '1'),
	(4, NULL, 1, '常見有毒植物', '家中常見的，黃金葛，耶誕紅，海芋，百合，萬年青，銀柳，長春藤，杜鵑花 ，鬱金香，蕃茄，仙人掌，虞美人，茉莉，詳如下\n\n貓咪常常有自己吃草的習性，但是一般家中植物常常含有毒性，如果不注意可能會造成危險，所以如果家中有養貓咪，就必須要知道相關的知識。\n\nA. 此類型植物接觸後可能讓皮膚或是嘴巴起疹子的植物\n1. 菊花(Chrysanthemum)\n2. 垂葉榕(Weeping fig)\n3. 薛荔(Creeping fig)\n4. 聖誕紅(Poinsettia)\n\nB. 此類型植物含有草酸，界處後會造成過敏反應，使得臉部腫脹，嚴重時會造成神經症狀，走路會搖搖晃晃\n1. 合果芋(Arrowhead vine)\n2. 黃肉芋(Malanga)\n3. 地錫(Boston ivy)\n4. 撒銀澤瀉(Marble queen)\n5. 彩葉芋(Caladium)\n6. 虎尾蘭(Snake plant)\n7. 海芋(Calla)\n8. 萬年青(Dumbcane)\n9. 桃葉滕(Parlor ivy)\n10. 黃金葛(Pothos)\n11. 綠寶石喜林芋(Emerald duke)\n12. 白鶴芋(Peace lily)\n13. 蔓綠絨(Heart leaf)\n\nC. 此類型植物含有不同種類的毒物，造成症狀從偶吐、腹痛、痙攣、心血管、呼吸系統、腎臟的傷害\n1. 孤挺花(Amaryllis)\n2. 長春籐(Ivy)\n3. 文竹(Asparagus fern)\n4. 冬珊瑚(Jerusalem cherry)\n5. 杜鵑花(Azalea)\n6. 鶴望蘭(Bird of paradise)\n7. 錦葵(Creeping charlie)\n8. 大葉秋海棠(Elephant ears)\n9. 輪傘草(Umbrella plant)\n\nD. 此類型植物通常生長在戶外，如果誤食會造成嘔吐、腹痛及下痢。\n1. 飛燕草(Delphinium)\n2. 臭菘草(Skunk cabbage)\n3. 千鳥草(Larkspur)\n4. 黃水仙(Daffodil)\n5. 北美商陸木(Poke weed)\n6. 路單利草(Indian tobacco)\n7. 篦麻仔(Castor bean)\n8. 紫滕(Wisteria)\n9. 天南星(Indian turnip)\n10. 燈籠草(Ground cherry)\n11. 無患子(Soap berry)\n12. 洋地黃(Fox glove)\n\n腎毒性植物\n百合花類(Lilies)\n金針花(Datlily) 這些植物在貓，會造成腎小管壞死的現象，一但拖下去超過18小時，很容易造成腎衰竭與死亡。\n\n可溶解草酸鹽類(SOLUBLE OXALATES) 大黃(Rhubarb)\n甜菜(Beet tops)\n酢醬草(Sorrel)\n酸模(Dock) 草酸鹽會溶解進入血液中，並且螯合鈣離子。這些草酸鈣會進入到腎小管中造成阻塞與壞死的現象。\n毒蛋白素與植物毒類(TOXALBUMINS OR PHYTOTOXINS) 蓖麻子(castor bean\n\n雞母珠(rosary pea)\n洋槐（black locust） 這些毒素會破壞蛋白質，並且可能會造成紅血球凝集的現象。動物食用後，會有口炎、舌炎與腸胃刺激的問題，嚴重的會使肌肉失去平衡與腎臟的傷害而有血尿與BUN升高的現象。\n\n茄鹼(SOLANACEOUS ALKALOIDS) 龍葵(Nightshade)\n珊瑚櫻(Jerusalem cherry) 這些植物主要是造成神經毒的毒性，會有腸胃道與神經上的症狀，有些龍葵類的植物，甚至有造成有機磷中毒的症狀。\n浸木毒素(ANDROMEDOTOXIN) 杜鵑花(Aazlea) 會造成低血壓，並且抑制呼吸與中樞神經系統。\n\n接觸性刺激(CONTACT ITTITANTS)\n文竹(Asparagus)\n鹽膚木(Poison sumac)\n蕁麻(Nettles)\n凌霄花(trumpet-creeper) 這些植物會因為接觸造成刺激，而有皮膚炎、口舌炎的現象。', '2017-12-08 00:21:47', '3'),
	(5, NULL, 2, '貓咪的接納行為', '貓咪的接納行為 Feline Affiliative Behavior (作者：戴更基 醫師)\n\n \n\n對於家貓來說，牠無法控制環境中的資源、貓咪的數量，如果一意孤行的在家中不斷的增加貓咪的數量，這不但不是讓貓咪有伴，而是讓貓咪陷入無窮止境慢性的焦慮之中，最後必定以打架收場。\n\n \n\n我們知道貓咪樂於分享地盤、資源，也會群居，但是那必須在環境空間足夠、資源物質充沛的情況下，牠們才會群居。否則大多數仍然會以獨居為主。\n\n \n\n他們會在這樣的狀態下形成社會族群，而仰賴著所有貓咪混雜在一起的氣味，來辨別是否屬於同一族群。如果有新的貓咪進入時，牠們會視資源的多寡以及該貓咪的貢獻能力來決定是否讓牠融入族群。這個過程有的時候很快，有的時候很慢。如果不被視為同一族群，就會被驅趕。\n\n \n\n在一般的家庭裡，多數多貓環境的產生，主人並沒有足夠的知識及方法，而任意的帶新貓進入。即便在家庭中貓咪們可以共處，除了因為彼此間形成良好的 Bond之外，大多數的共處只是彼此學會了忍耐。並且在資源物資地盤的利用上，轉換為時間以及空間的分配而已。所以對於想要養兩隻以上貓咪的朋友，您必須 謹慎思考這些問題。\n\n \n\n對於要將新貓帶入已存在的貓咪環境中，您可以運用幾個簡單的概念，首先，將家中所有貓咪用同一條乾淨的毛巾擦拭，讓毛巾充滿所有貓咪的氣味，再將毛巾拿來擦拭在新貓身上。\n\n \n\n接下來就是豐富環境資源。比如說貓砂盆數量、水碗、飯碗、睡覺的區域、床⋯等等，都需要比貓咪的總數多一以上。只有在環境資源物資充沛的環境下，加上族群融合的氣味，新貓才有可能融入原本的貓群之中。', '2018-01-14 07:58:19', '3'),
	(6, NULL, 3, '貓咪的聽力', '剛剛還在熟睡的貓咪，不知道在什麼時候已經坐的好好的等在廚房門口，原來是主人在打開它的貓罐頭，貓咪是從遙遠的客廳聽到“啪!”的開罐頭聲音而過來的。 這是怎麼回事呢？這全都歸功於貓咪那又如雷達探測儀的一對小耳朵，貓的耳朵隨時可以迅速轉向聲音的方向，在頭不動的情況下，可做180度的擺動，從而使貓能對聲源進行精確的定位。 貓能熟記主人的聲音、加腳步聲、呼喚自己名字的聲音等。\n\n \n\n■工作原理\n\n貓的每隻耳朵各有32條獨立的肌肉充耳殼轉動，因此雙耳可單獨朝向不同的音源轉動，使其向獵物移動時仍能對周遭其他音源保持直接接觸。 漏斗狀的外耳收集到聲波之後，向內傳送到鼓膜。 鼓膜會像鼓皮一樣震動，引起位於中耳內串連的三塊聽小骨震動，聽小骨接著將震動傳送到內耳入口（卵圓窗）。 此外，聲波還傳送到耳窩，即一系列充滿液體的螺旋狀腔室組織。 腔室裡面敏感的考蒂器將聲波轉換成電脈衝，再通過聽覺神經傳送到大腦。\n\n \n\n\n\n \n\n■聽覺範圍\n\n人類可以聽到聲音的範圍在16-2萬HZ ，貓咪在25-7萬8千HZ,HZ代表的是聲音頻率也就是高低的單位，數字越大的話越高音。 所以貓咪的耳朵比起人類可以聽到及其遙遠處發來的高音，與人類對低頻聲音靈敏度相似。 人類中只有少數的調音師能聽到10KHZ以上的高頻聲音，有些貓可達到64KHZ以上，比人類要高1.6個八度音，甚至比狗要高1個八度音。貓咪還能夠正確的判斷聲音的來源方向，根據實驗，貓咪在距離18公尺的地方，防止50公分的隔板可以正確辨別二種不同的聲音。 當然不管實在高的敵法發出的聲音或是低的地方，都能夠一一正確的作出判斷。\n\n \n\n■貓耳表達情緒\n\n除了 ​​蘇格蘭折耳貓這類基因突變的貓以外，貓極少有狗常見的“垂耳”，多數的貓耳向上直立。 當貓憤怒或受驚時，耳朵會貼向後方，並發出咆哮與哈的聲音。 \n\n \n\n■貓咪聽力與年齡的關係\n\n貓在壯年期可以辨別兩種五份一至十分之一的音色差異，貓和人一樣，對高音的敏感度，也會隨著年齡增長而降低， 通常貓在三歲時，聽覺敏感度開始下降，而到四歲半時敏感度降低的情況已十分明顯。\n\n \n\n■貓咪的耳朵就像是「聲音的方向探知器」\n\n狗狗會先追逐獵物後抓住，跟貓咪的捕獵方式非常不同，貓咪每月追逐的持久耐力，因為貓的狩獵都是利用埋伏的方式，必須要正確的把握住獵物的所在位置，所以聽力才會如此優越發達。\n\n \n\n■失天性的耳聾\n\n這些對無法聽到聲音的貓也能\'\'聽”到，不過不是通過耳朵，而通過足爪下的肉墊來\'\'聽”，來感受震動。由於貓咪的爪中肉墊裡就有相當豐富的觸覺感受器，能感知地面很微小的震動變化，貓咪以此來判斷情況。', '2017-12-11 23:09:19', '3'),
	(7, 1, NULL, '請推薦貓咪主食罐頭的品牌？', '想餵家貓吃主食罐頭 \n考量到因為家貓不太愛喝水的狀況想嘗試濕食餵養 \n版上比較常看到貓飼料跟貓砂的推薦文 \n想問問看大家有推薦的貓咪主食罐頭的品牌嗎？ \n謝謝！', '2018-01-12 18:18:19', '2'),
	(8, 2, NULL, '請問大家有推薦的貓飼料嗎??', '我們家的貓咪目前4kg一歲半米克斯 \n一直以來都是吃Costco紫色大包裝的飼料 \n最近在考慮想要幫她換飼料 \n想請問大家是否有推薦的好乾乾呢~ \n因本人還是大學生在打工賺錢 \n所以預算大約在1200元 8kg左右 \n上網看了一下猋似乎還不錯(?) \n不好意思麻煩大家囉~ \n謝謝^^', '2017-11-26 14:20:08', '2'),
	(9, 3, NULL, '尋找一款貓玩具', '大概三年前 買了一款玩具給剛領養回家的貓玩~ 但那時候卻不太玩那個玩具.. 就一直放著... 這半年開始 他突然喜歡上一直以來都被他冷落的玩具... 咬到中間的彈簧頂部都被咬斷了... 有打算買一個一模一樣的新玩具給他... 印象當初買的時候 在不同的寵物用品店都有看到這互動滾球玩具... 但好像就是個沒有特別品牌或特別包裝的玩具.... 現在各網路上 寵物用品購物網 找 都沒找到這個玩具.... 不曉得各位貓奴們 最近還有看過這款玩具嗎? 如還有看過的話麻煩告知. (台北市/網路購物 為主). 謝謝 \n', '2017-11-08 17:11:01', '2');



-- # Dump of table ARTICLE_PIC
-- # ------------------------------------------------------------

-- CREATE TABLE `ARTICLE_PIC` (
--   `ARTICLE_PIC_NO` int(10) NOT NULL AUTO_INCREMENT,
--   `ARTICLE_NO` int(10) NOT NULL,
--   `ARTICLE_PIC_PATH` varchar(100) NOT NULL DEFAULT '',
--   PRIMARY KEY (`ARTICLE_PIC_NO`),
--   KEY `ARTICLE_NO` (`ARTICLE_NO`),
--   CONSTRAINT `article_pic_ibfk_1` FOREIGN KEY (`ARTICLE_NO`) REFERENCES `ARTICLE` (`ARTICLE_NO`) ON DELETE CASCADE ON UPDATE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ARTICLE_REPORT
# ------------------------------------------------------------

CREATE TABLE `ARTICLE_REPORT` (
  `ARTICLE_REPORT_NO` int(10) NOT NULL AUTO_INCREMENT,
  `ARTICLE_NO` int(10) NOT NULL,
  `MEM_NO` int(5) DEFAULT NULL,
  `HALF_NO` int(5) DEFAULT NULL,
  `AUDIT_STATUS` tinyint(1) NOT NULL,
  `ARTICLE_REPORT_NARRATIVE` varchar(50) DEFAULT NULL,
  `ARTICLE_REPORT_TIME` datetime NOT NULL,
  PRIMARY KEY (`ARTICLE_REPORT_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  KEY `ARTICLE_NO` (`ARTICLE_NO`),
  CONSTRAINT `article_report_ibfk_1` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_report_ibfk_2` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_report_ibfk_3` FOREIGN KEY (`ARTICLE_NO`) REFERENCES `ARTICLE` (`ARTICLE_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



-- # Dump of table CAT_PIC
-- # ------------------------------------------------------------

-- CREATE TABLE `CAT_PIC` (
--   `CAT_PIC_NO` int(8) NOT NULL AUTO_INCREMENT,
--   `CAT_NO` int(6) NOT NULL,
--   `CAT_PIC_PATH` varchar(100) NOT NULL DEFAULT '',
--   PRIMARY KEY (`CAT_PIC_NO`),
--   KEY `CAT_NO` (`CAT_NO`),
--   CONSTRAINT `cat_pic_ibfk_1` FOREIGN KEY (`CAT_NO`) REFERENCES `CAT` (`CAT_NO`) ON DELETE CASCADE ON UPDATE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table DONATE
# ------------------------------------------------------------

CREATE TABLE `DONATE` (
  `DONATE_NO` int(10) NOT NULL AUTO_INCREMENT,
  `CAT_NO` int(6) NOT NULL,
  `DONATE_NAME` varchar(10) NOT NULL DEFAULT '',
  `DONATE_PRICE` int(5) NOT NULL,
  `DONATE_DATE` date NOT NULL,
  PRIMARY KEY (`DONATE_NO`),
  KEY `CAT_NO` (`CAT_NO`),
  CONSTRAINT `donate_ibfk_1` FOREIGN KEY (`CAT_NO`) REFERENCES `CAT` (`CAT_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `DONATE` (`DONATE_NO`, `CAT_NO`, `DONATE_NAME`, `DONATE_PRICE`, `DONATE_DATE`)
VALUES
	(22, 1, '硯硯', 1000, '2018-01-02'),
	(24, 5, '宇宇', 870, '2017-12-17');



# Dump of table FAVORITE
# ------------------------------------------------------------

CREATE TABLE `FAVORITE` (
  `CAT_NO` int(6) NOT NULL AUTO_INCREMENT,
  `MEM_NO` int(5) NOT NULL,
  PRIMARY KEY (`CAT_NO`,`MEM_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `CAT_NO` (`CAT_NO`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`CAT_NO`) REFERENCES `CAT` (`CAT_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `FAVORITE` (`CAT_NO`, `MEM_NO`)
VALUES
	(1, 1),
	(13, 1),
	(16, 1),
	(8, 2),
	(10, 2),
	(13, 2),
	(2, 3),
	(3, 3),
	(8, 3);



# Dump of table HALF_PIC
# ------------------------------------------------------------


CREATE TABLE `HALF_PIC` (
  `HALF_PIC_NO` int(6) NOT NULL AUTO_INCREMENT,
  `HALF_NO` int(5) NOT NULL,
  `HALF_PIC_PATH` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`HALF_PIC_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `half_pic_ibfk_1` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `HALF_PIC` (`HALF_PIC_NO`, `HALF_NO`, `HALF_PIC_PATH`)
VALUES
	(1, 1, '../images/halfwayPic/sara@gmail.com0.jpg'),
	(2, 1, '../images/halfwayPic/sara@gmail.com1.jpg'),
	(3, 1, '../images/halfwayPic/sara@gmail.com2.jpg'),
	(4, 1, '../images/halfwayPic/sara@gmail.com3.jpg'),
	(5, 2, '../images/halfwayPic/handsome@gmail.com0.jpg'),
	(6, 2, '../images/halfwayPic/handsome@gmail.com1.jpg'),
	(7, 2, '../images/halfwayPic/handsome@gmail.com2.jpg'),
	(8, 2, '../images/halfwayPic/handsome@gmail.com3.jpg'),
	(9, 3, '../images/halfwayPic/silvia@gmail.com0.jpg'),
	(10, 3, '../images/halfwayPic/silvia@gmail.com1.jpg'),
	(11, 3, '../images/halfwayPic/silvia@gmail.com2.jpg'),
	(12, 3, '../images/halfwayPic/silvia@gmail.com3.jpg');

# Dump of table MESSAGE
# ------------------------------------------------------------

CREATE TABLE `MESSAGE` (
  `MESSAGE_NO` int(10) NOT NULL AUTO_INCREMENT,
  `ARTICLE_NO` int(10) NOT NULL,
  `MEM_NO` int(5) DEFAULT NULL,
  `HALF_NO` int(5) DEFAULT NULL,
  `MESSAGE_CONTENT` text NOT NULL,
  `MESSAGE_TIME` datetime NOT NULL,
  PRIMARY KEY (`MESSAGE_NO`),
  KEY `ARTICLE_NO` (`ARTICLE_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ARTICLE_NO`) REFERENCES `ARTICLE` (`ARTICLE_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_ibfk_3` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `MESSAGE` (`MESSAGE_NO`, `ARTICLE_NO`, `MEM_NO`, `HALF_NO`, `MESSAGE_CONTENT`, `MESSAGE_TIME`)
VALUES
	(1, 1, NULL, 2, '貓咪偶爾嘔吐是正常的\n\n因為要把毛球吐出來\n\n所以一星期要吃一次化毛膏幫助她嘔吐\n\n也有可能誤吃了不能消化的東西.', '2018-01-16 20:26:00'),
	(2, 1, NULL, 3, '有問題最好還是帶給醫生檢查喔', '2018-01-17 20:50:27');




# Dump of table MESSAGE_REPORT
# ------------------------------------------------------------

CREATE TABLE `MESSAGE_REPORT` (
  `MESSAGE_REPORT_NO` int(10) NOT NULL AUTO_INCREMENT,
  `MESSAGE_NO` int(10) NOT NULL,
  `MEM_NO` int(5) DEFAULT NULL,
  `HALF_NO` int(5) DEFAULT NULL,
  `AUDIT_STATUS` varchar(5) NOT NULL DEFAULT '',
  `MESSAGE_REPORT_NARRATIVE` varchar(50) DEFAULT NULL,
  `MESSAGE_REPORT_TIME` datetime NOT NULL,
  PRIMARY KEY (`MESSAGE_REPORT_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  KEY `MESSAGE_NO` (`MESSAGE_NO`),
  CONSTRAINT `message_report_ibfk_2` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_report_ibfk_3` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_report_ibfk_4` FOREIGN KEY (`MESSAGE_NO`) REFERENCES `MESSAGE` (`MESSAGE_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ORDERLIST
# ------------------------------------------------------------

CREATE TABLE `ORDERLIST` (
  `ORDER_NO` int(10) NOT NULL AUTO_INCREMENT,
  `MEM_NO` int(5) DEFAULT NULL,
  `HALF_NO` int(5) DEFAULT NULL,
  `ORDER_STATUS` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=尚未出貨/ 1=運送中/ 2=已完成',
  `ORDER_PRICE` int(5) NOT NULL,
  `CUS_NAME` varchar(5) NOT NULL DEFAULT '',
  `CUS_ADDRESS` varchar(40) NOT NULL DEFAULT '',
  `CUS_TEL` varchar(10) NOT NULL DEFAULT '',
  `ORDER_TIME` datetime NOT NULL,
  `CUS_PAYMENT` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=超商付款/ 1=信用卡付款',
  `CUS_RECIPIENT` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=超商取貨 / 1=宅配',
  `ORDER_SHIPPING_TIME` datetime NOT NULL COMMENT '寄件日期',
  PRIMARY KEY (`ORDER_NO`),
  KEY `MEM_NO` (`MEM_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orderlist_ibfk_2` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ORDERLIST` (`ORDER_NO`, `MEM_NO`, `HALF_NO`, `ORDER_STATUS`, `ORDER_PRICE`, `CUS_NAME`, `CUS_ADDRESS`, `CUS_TEL`, `ORDER_TIME`, `CUS_PAYMENT`, `CUS_RECIPIENT`, `ORDER_SHIPPING_TIME`)
VALUES
	(1, 1, NULL, 0, 1967, '董董', '中央大學資策會', '0912345678', '2018-01-25 00:50:32', 0, 0, '0000-00-00 00:00:00');



# Dump of table ORDERLIST_DETAILS
# ------------------------------------------------------------

CREATE TABLE `ORDERLIST_DETAILS` (
  `ORDER_NO` int(10) NOT NULL AUTO_INCREMENT,
  `PRODUCT_NO` int(10) NOT NULL,
  `PRODUCT_PRICE` int(5) NOT NULL,
  `COUNT` int(10) NOT NULL,
  PRIMARY KEY (`ORDER_NO`,`PRODUCT_NO`),
  KEY `ORDER_NO` (`ORDER_NO`),
  KEY `PRODUCT_NO` (`PRODUCT_NO`),
  CONSTRAINT `orderlist_details_ibfk_3` FOREIGN KEY (`ORDER_NO`) REFERENCES `ORDERLIST` (`ORDER_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orderlist_details_ibfk_4` FOREIGN KEY (`PRODUCT_NO`) REFERENCES `PRODUCT` (`PRODUCT_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ORDERLIST_DETAILS` (`ORDER_NO`, `PRODUCT_NO`, `PRODUCT_PRICE`, `COUNT`)
VALUES
	(1, 2, 239, 3),
	(1, 4, 250, 5);



-- # Dump of table PRODUCT_PIC
-- # ------------------------------------------------------------

-- CREATE TABLE `PRODUCT_PIC` (
--   `PRODUCT_PIC_NO` int(10) NOT NULL AUTO_INCREMENT,
--   `PRODUCT_NO` int(10) NOT NULL,
--   `PRODUCT_PIC_PATH` varchar(100) NOT NULL DEFAULT '',
--   PRIMARY KEY (`PRODUCT_PIC_NO`),
--   KEY `PRODUCT_NO` (`PRODUCT_NO`),
--   CONSTRAINT `product_pic_ibfk_1` FOREIGN KEY (`PRODUCT_NO`) REFERENCES `PRODUCT` (`PRODUCT_NO`) ON DELETE CASCADE ON UPDATE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Dump of table EVALUATION
# ------------------------------------------------------------
CREATE TABLE `EVALUATION` (
  `EVALUATION_NO` int(10) NOT NULL AUTO_INCREMENT,
  `MEM_NO` int(5) NOT NULL,
  `HALF_NO` int(5) NOT NULL,
  `EVALUATION_STARS` float NOT NULL COMMENT '1~5',
  PRIMARY KEY (`EVALUATION_NO`),
  KEY `MEM_NO` (`MEM_NO`,`HALF_NO`),
  KEY `HALF_NO` (`HALF_NO`),
  CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`MEM_NO`) REFERENCES `MEMBER` (`MEM_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`HALF_NO`) REFERENCES `HALFWAY_MEMBER` (`HALF_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `EVALUATION` (`EVALUATION_NO`, `MEM_NO`, `HALF_NO`, `EVALUATION_STARS`)
VALUES
	(1, 1, 1, 5),
	(2, 2, 1, 4),
	(3, 3, 1, 4),
	(4, 1, 2, 5),
	(5, 2, 2, 3),
	(6, 3, 2, 4),
	(7, 1, 3, 5),
	(8, 2, 3, 5),
	(9, 3, 3, 5);
