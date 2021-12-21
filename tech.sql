-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(4, 'Romana', 'romana@gmail.com', 'romana024'),
(3, 'Anamika', 'anamika@gmail.com', 'anamika023');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `short_desc` varchar(250) NOT NULL,
  `long_desc` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_desc`, `long_desc`) VALUES
(1, 'Arduino', 'Arduino is an open-source hardware and software company, project and user community that designs and manufactures single-board microcontrollers and microcontroller kits for building digital devices.\r\n', 'Arduino is an open-source hardware and software company, project and user community that designs and manufactures single-board microcontrollers and microcontroller kits for building digital devices.\r\n'),
(2, 'Camera', 'A device for recording visual images in the form of photographs, film, or video signals.', 'A camera is an optical instrument used to capture an image. At their most basic, cameras are sealed boxes with a small hole that allow light in to capture an image on a light-sensitive surface. Cameras have various mechanisms to control how the light falls onto the light-sensitive surface.\r\n'),
(3, 'Antenna', 'An antenna is a metallic structure that captures and/or transmits radio electromagnetic waves. ... The bowl shape is what allows the antennas to both capture and transmit electromagnetic waves.', 'In the robotic system, a network device with antennas is installed on each robot for two purposes — one is to maintain wireless connectivity between the two end nodes, and the other is to provide and measure a wireless signal for bearing estimation.'),
(4, 'Charger', 'A device for charging a battery or battery-powered equipment', 'The charging protocol (how much voltage or current for how long, and what to do when charging is complete, for instance) depends on the size and type of the battery being charged. Some battery types have high tolerance for overcharging (i.e., continued charging after the battery has been fully charged) and can be recharged by connection to a constant voltage source or a constant current source, depending on battery type. Simple chargers of this type must be manually disconnected at the end of th'),
(5, 'Batteries', 'Batteries come in many shapes and sizes, from miniature cells used to power hearing aids and wristwatches to small, thin cells used in smartphones, to large lead acid batteries or lithium-ion batteries in vehicles.', 'Batteries come in many shapes and sizes, from miniature cells used to power hearing aids and wristwatches to small, thin cells used in smartphones, to large lead acid batteries or lithium-ion batteries in vehicles, and at the largest extreme, huge battery banks the size of rooms that provide standby or emergency power for telephone exchanges and computer data centers.'),
(6, 'Oscilloscope', 'What makes this oscilloscope interesting for electronics beginners and hobbyists is that it comes together with an arbitrary/ functions waveform generator.', 'An oscilloscope, previously called an oscillograph, and informally known as a scope or o-scope, CRO, or DSO, is a type of electronic test instrument that graphically displays varying signal voltages, usually as a calibrated two-dimensional plot of one or more signals as a function of time.'),
(12, 'Computer', 'An electronic device that manipulates information, or data. It has the ability to store, retrieve, and process data. You may already know that you can use a computer to type documents, send email, play games, and browse the Web.', 'Computer is an advanced electronic device that takes raw data as input from the user and processes these data under the control of set of instructions (called program) and gives the result (output) and saves output for the future use.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_name` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `product_id`, `product_name`, `user_name`, `price`, `timestamp`) VALUES
(47, 'TVP158728', '20', '2', '2.4G 2.5db Built in PCB Antenna Module ', 'Priya', 60, '17:12:2021 03:33:24am'),
(46, 'TVP481692', '15', '2', '2.4G 2.5db Built in PCB Antenna Module ', 'Ana', 60, '17:12:2021 03:31:34am'),
(49, 'TVP848286', '20', '1', '1575GHz Active GPS Antenna with SMA Male ', 'Priya', 220, '18:12:2021 01:04:22am');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `image` text NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `image`, `pname`, `price`, `description`) VALUES
(1, 3, '1.jpg', '1575GHz Active GPS Antenna with SMA Male ', 220, 'Dimension: 35 x 39 x 12 mm\r\nPower supply electric voltage: DC 3V or 5V\r\nElectric current: 10mA Type\r\nCenter frequency: 1575.42 + - 1.023 MHz\r\nTurn strength very much: RHCP\r\nIncrease a benefit: 29dB type (enlarge)\r\nVoice: 1.5dB\r\nHalt wave: max 1.8\r\nBandwidth: 10Mhz\r\nOutput resistance: 50 Ohm\r\nCable: 480 cm\r\nApply to deal with contact: SMA, SMB, BNC, MCX, MMCX\r\nWork temperature: -20 ° C - + 85 ° C\r\n'),
(2, 3, '2.jpg', '2.4G 2.5db Built in PCB Antenna Module ', 60, 'PCB 2.5dB Antenna with IPX Connector Cable for GSM/GPRS/3G/4G 900/1800/2100 Bands. This is a multiband WIFI Bluetooth, GSM PCB Antenna with IPX Connector Cable. This microstrip antenna consists of a patch of metal foil of various shapes (a patch antenna) on the surface of a PCB, with a metal foil ground plane on the other side of the board.\r\nApplications: GSM Antenna for GSM Modules such as SIM900 SIM800L SIM908 SIM800C\r\n'),
(3, 1, '9.jpg', 'Arduino Lilypad-AT Mega328P ', 400, 'The Lilypad Arduino is a microcontroller board designed for wearables and e-textiles. It can be sewn to fabric and similarly mounted power supplies, sensors and actuators with conductive thread. The board is based on ATmega328P.\r\n\r\n'),
(4, 3, '3.jpg', '28db high gain GPS Ceramic Antenna', 150, 'Central frequency:1575MHZ VSWR: 2:1 Bandwidth: ±30 MHz Impedance:50O maximal gain :>3dBic Based on 7x7cm'),
(5, 5, '13.jpg', '11.1V 3S 30c 2800mah Li-Po Battery ', 2400, 'This is a popular Chinese Food. People from every country enjoys it a lot.Tiger LiPo®, delivering rock solid, dependable, lightweight portable power systems that our customer emphatically recommend to their friends and colleagues are the Tiger LiPo way. By developing our passion to provide customers with an outstanding and unique product experience, we created our own pathway to success, leading the way to further innovation. Traveling around the world and you will find the Tiger LiPo® brand lipo battery used in every type of remote-controlled vehicles conceived. From unmanned drones to short course trucks, fast electric RC boats to high speed FPV racing airplanes, Tiger LiPo® brand powers them all. Drivers and pilots are looking for the best in power, performance, runtime, exceptional customer service and warranty trust Tiger LiPo batteries. '),
(6, 5, '14.jpg', '22-2v-65C-lipo-battery ', 9000, 'lipo 5400mAh 6S1P 65C lipo battery packs Max Burst Discharge:120C, Gens ace lipo 5000mah 6s1p battery suited to the following model: It is suit for 600/700 scale Heli. Airplane, Jet & boat.'),
(7, 2, '18.jpg', 'ESP32-Cam Wi-Fi + Bluetooth Camera Module', 950, 'ESP32-CAM is a WIFI+ bluetooth dual-mode development board that uses PCB on-board antennas and cores based on ESP32 chips. It can work independently as a minimum system.\r\nESP integrates WiFi, traditional bluetooth and BLE Beacon, with 2 high-performance 32-bit LX6 CPUs, 7-stage pipeline architecture, main frequency adjustment range 80MHz to 240MHz, on-chip sensor, Hall sensor, temperature sensor, etc.\r\nFully compliant with WiFi 802.11b/g/n/e/i and bluetooth 4.2 standards, it can be used as a master mode to build an independent network controller, or as a slave to other host MCUs to add networking capabilities to existing devices.\r\nESP32-CAM can be widely used in various IoT applications. It is suitable for home smart devices, industrial wireless control, wireless monitoring, QR wireless identification, wireless positioning system signals and other IoT applications. It is an ideal solution for IoT applications. \r\n'),
(8, 5, '15.jpg', '11.1V 3S 1500mAh 30C Tiger Power ', 1250, '1)High energy density \r\n2) High working voltage for single battery cells \r\n3) Pollution-free \r\n4) Long cycle life >500times \r\n5) No memory effects \r\n6) Capacity, resistance, Voltage, platform time consistency is good \r\n7) With short-circuit production function, safe and reliable \r\n8) Factory price& High quality \r\n9) Good consistency, low self-discharge \r\n'),
(9, 2, '17.jpg', 'Raspberry Pi Camera Module 5M', 400, 'This 5mp camera module is capable of 1080p video and still images and connects directly to your Raspberry Pi. Connect the included ribbon cable to the CSI (Camera Serial Interface) port on your Raspberry Pi, boot up the latest version of Raspbian and you are good to go! The board itself is tiny, at around 25mm x 20mm x 9mm and weighing in at just over 3g, making it perfect for mobile or other applications where size and weight are important. The sensor has a native resolution of 5 megapixel, and has a fixed focus lens onboard.\r\n'),
(10, 1, '8.jpg', 'Arduino Leonardo (Made in Italy)', 900, 'The Arduino Leonardo is a microcontroller board based on the ATmega32u4. It has 20 digital input/output pins (of which 7 can be used as PWM outputs and 12 as analog inputs), a 16 MHz crystal oscillator, a micro-USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with a AC-to-DC adapter or battery to get started.'),
(11, 1, '7.jpg', 'Arduino Duemilanove With Cable ', 900, 'The Arduino Duemilanove (“2009”) is a microcontroller board based on the ATmega328 (which is an update from the previous 168). It has 14 digital input/output pins (of which 6 can be used as PWM outputs), 6 analog inputs, a 16 MHz crystal oscillator, a USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with an AC-to-DC adapter or battery to get started.'),
(12, 5, '16.jpg', '11.1V 2200mAh 30C Lipo Battery ', 1700, 'Tiger batteries are known the world over for performance, reliability and price. It’s no surprise to us that Tiger Lipoly packs are the go-to pack for those in the know. Tiger batteries deliver the full rated capacity at a price everyone can afford. Tiger batteries are equipped with heavy duty discharge leads to minimize resistance and sustain high current loads. Tiger batteries stand up to the punishing extremes of aerobatic flight and RC vehicles. Each pack is equipped with gold plated connectors and JST-XH style balance connectors.'),
(13, 1, '11.jpg', 'Arduino Pro Micro Original', 600, 'This tiny little board does all of the neat-o Arduino tricks that you’re familiar with: 4 channels of 10-bit ADC, 5 PWM pins, 12 DIOs as well as hardware serial connections Rx and Tx. Running at 16MHz and 5V, this board will remind you a lot of your other favorite Arduino-compatible boards but this little guy can go just about anywhere. There is a voltage regulator on board so it can accept voltage up to 12VDC.  There is a PTC fuse and diode protection to the power circuit and corrected the RX and TX LED circuit'),
(14, 1, '10.jpg', 'Arduino Mega R3 2560 With Cable ', 650, 'The Mega 2560 is a microcontroller board based on the ATmega2560. It has 54 digital input/output pins (of which 15 can be used as PWM outputs), 16 analog inputs, 4 UARTs (hardware serial ports), a 16 MHz crystal oscillator, a USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with an AC-to-DC adapter or battery to get started. The Mega 2560 board is compatible with most shields designed for the Uno and the former boards Duemilanove or Diecimila.'),
(15, 5, '12.jpg', '11.1V 3S 30C 1800mah Li-Po ', 1700, 'Tiger batteries are known the world over for performance, reliability and price. It’s no surprise to us that Tiger Lipoly packs are the go-to pack for those in the know. Tiger batteries deliver the full rated capacity at a price everyone can afford. Tiger batteries are equipped with heavy duty discharge leads to minimize resistance and sustain high current loads. Tiger batteries stand up to the punishing extremes of aerobatic flight and RC vehicles. Each pack is equipped with gold plated connectors and JST-XH style balance connectors. All Tiger Lipoly batteries packs are assembled using IR matched cells. You won’t find a better deal in Lipoly batteries anywhere!'),
(16, 1, '6.jpg', 'Arduino Due R3 ', 1200, 'The Due has enough RAM to output VGA signals so you could use it to for a custom display on an LCD Potentially hook up the Due to your vehicle via the CAN-bus to log sensor data Create a DIY mini-synthesizer using the DAC outputs Run multiple processes (multi-threading) using a Real-time Operating System such as FreeRTOS, ChibiOS & RT RTOS'),
(17, 3, '5.jpg', 'Antenna 7 Element 800/900 MHz 11db', 6000, 'Yagi antennas are focused to receive signals from a given direction. Higher gain Yagi antennas are frequency specific so you should consider the frequency or band of your radio communication receiver for best use. Yagi antennas are prefect for fixed locations such as homes, offices, warehouses, farms and remote locations trying to reach far away signals from a particular direction. For best results, consider a mounting location that makes the cable as short as possible yet placing the Yagi where it gets the best signal.'),
(23, 3, '4.jpg', '2db WIFI Antenna Copper gain 2.4GHz ', 90, '2.4G Soft Antenna (IPX IPEX connector) WIFI Antenna 2DB Gain Copper.\r\nType: WIFI built-in antenna Frequency:2400-2500MHZ Cable type: RF1.13 wire Cable length:10cm Total length:15cm Impedance:50 Ohm Connector: IPEX\r\n'),
(24, 4, '24.jpg', '12V 3S 100A Li-ion Battery Charger With Protection', 1500, 'Short circuit protection\r\nOvercharge protection\r\nOver-discharge protection\r\nOver-current protection\r\nContinuous current: 100A\r\nInstantaneous current: Max 200A\r\nCharging voltage: 12.6V\r\nCharging current: Max 10A\r\nOvercharge protection: single cell 4.08±0.05V\r\nOver-discharge protection: single cell 2.9±0.1V\r\nShort circuit protection: delay 250us\r\n'),
(19, 2, '19.jpg', 'FOXEER BFPV Camera 5.8G Picture transmission ', 4500, '1. Nicer color image, and brighten the dark zone\r\n2. Increase the D/N mode, you could change to Black & White image in the menu\r\n3. Voltage Calibrated Mode\r\n4. LED modes: OFF/MID/DARK for different LED Track racing\r\n5. Image Flip / No Jello\r\n6. Super WDR Function\r\n7. 16:9/4:3 switchable,PAL 50fps/NTSC 60fps switchable\r\n8. Upgrade harness to video&OSD separated\r\n9. Low lantency,minimum to 4ms \r\n'),
(18, 2, '20.jpg', 'HD Mini IP Camera 2.0MP 1080P Indoor Security ', 3000, '1. High resolution 1/3\'\' CMOS sensor IP network camera\r\n2. H.264 compression, high-definition video transmission over low network bandwidth easily\r\n3. Multiple network protocol -TCP/IP, HTTP, FTP, NTP, RTP, ARP, ICMP, SMTP, POP3, DNS and RTCP.\r\n4. Remote view and management by IE and client software (CMS)\r\n5. Various recording modes-motion detection recording, alarm recording, schedule recording and manual recording.\r\n6. Lens size: 2.8mm 3MP lens\r\n'),
(21, 2, '21.jpg', 'Mini FPV Video Camera Module for Drone ', 1500, '1.	Mini size is 17.5mm x 25mm x 24mm\r\n2.	As light as 20g\r\n3.	1000TVL high resolution image\r\n4.	Wide voltage design, 3.7V-16V \r\n5.	Low power design,20mA (12V mode)\r\n6.	PAL or NTSC mode switch\r\n'),
(22, 2, '22.jpg', 'Open MV3 Camera for Image Processing ', 6000, 'Model: OpenMV3 M7\r\n\r\nFocal Lens: 2.8 mm\r\n\r\nSupported Image Format: Grayscale/RGB565/JPEG\r\n\r\nSize(L*W*H): 45 x 36 x 30 mm\r\n\r\nStorage Temperature: -40?~125?\r\n\r\nModel: OpenMV3 M7\r\n\r\nFocal Lens: 2.8 mm\r\n\r\nSupported Image Format: Grayscale/RGB565/JPEG\r\n\r\nSize(L*W*H): 45 x 36 x 30 mm\r\n\r\nStorage Temperature: -40?~125?\r\n\r\n'),
(25, 4, '25.jpg', '15V Li-ion Lithium & Lipo Battery Charger / BMS', 700, 'Charging Voltage: 16.8V~18.1V\r\nContinuous Discharge Current (upper limit): 40A (If the cooling environment is not good, please reduce the use of load current.)\r\nContinuous Charge Current (upper limit): 20A\r\nSize: About 45x55x3.4mm/1.8x2.2x0.13\"\r\nScope: Nominal voltage of 3.6V, 3.7V lithium battery (including 18650, 26650, lithium polymer battery)'),
(26, 4, '23.jpg', 'iSDT Q6 Lite 200W 12A Pocket Balance Charger', 4100, 'Brand new ISDT Q6 Lite with rounded edge design easily stows in bag or pocket. Same size as the SC-608 charger with twice the power capacity.2.4? IPS Display. Up to 178° visible angle, auto-brightness screen, still visible under strong sunlight. Highly optimized internal construction with higher cooling efficiency Higher speed and efficiency synchronous Digital Power Supply Technology. High speed ball-bearing fan promotes active cooling increase by 300%, even though the size has been reduced by 50%.'),
(27, 4, '26.jpg', '18650 Battery Charger (US Standard) Black', 300, 'Slim and portable design\r\nHigh quality and good performance\r\nIt is made of high quality and durable material\r\nThe charger is in good working condition\r\nPortable and easy to use\r\nLightweight, compact and easy to carry\r\nLED of the charger indicates charging status, turn off for fully charged\r\nCapable of charging 2 batteries simultaneously\r\nEach of the battery slots monitors and charges independently\r\nAutomatically stops charging when complete\r\nFeatures reverse polarity protection\r\nDesigned for optimal heat dissipation'),
(28, 6, '28.jpg', 'DS1054Z 4 channels 50HZ Digital Oscilloscope ', 43000, '1.	50MHz Bandwidth, 4 channels.\r\n2.	1G Sa/s Real-time Sample Rate.\r\n3.	12Mpts (Std.) and 24Mpts (Opt.) Memory Depth.\r\n4.	Innovative \"Ultra Vision\" technology.\r\n5.	Up to 30,000wfms/s Waveform Capture Rate.\r\n6.	7 Inch WVGA (800x480), multiple intensity levels waveform display.\r\n'),
(29, 6, '29.jpg', 'DS1102E 100MHz Digital Oscilloscope Rigol ', 32000, '1.	Built-in help menu enables information getting more convenient\r\n2.	Multiple Language User Interface, support Chinese & English input\r\n3.	Support U disk and local files storage\r\n4.	Waveform intensity can be adjusted\r\n5.	To display a signal automatically by AUTO\r\n6.	Pop-up menu makes it easy to read and use function\r\n7.	Fine delayed scan function\r\n8.	Built-in FFT function, hold practical digital filters\r\n9.	Pass/Fail detection function enables to output testing results\r\n10.	Math operations available to multiple waves\r\n'),
(30, 6, '30.jpg', 'UT81B Handheld Digital Multimeter Oscilloscope', 14000, 'UNI-T UT81B Handheld Oscilloscope Digital Multimeter 8MHz w/ USB & LCD\r\nBrand Name: UNIT\r\nModel Number: UT81B\r\n'),
(31, 6, '31.jpg', 'UTD1025CL Handheld Digital Storage Oscilloscope ', 21500, 'Fully auto scale, vertical scale and Time-based automatically adjusted\r\nUnique and Powerful auto setup\r\nQuick and accurate to set up for signals with any DC components\r\nIntelligent locator network software update\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `timestamp`) VALUES
(6, 'Alamin Islam Hridoy', 'hridoy@buzz.com', 'hridoy', '25:12:2020 04:33:26pm'),
(10, 'Tanbin Siddique', 'tanbinsiddiqui11@gmail.com', 'password00', '27:12:2020 12:34:27am'),
(13, 'Anamika', 'anamika@gmail.com', 'Anamika', '10:12:2021 09:48:22am'),
(14, 'Romana', 'r@gmail.com', 'romana63', '10:12:2021 10:09:10am'),
(15, 'Ana', 'anamika362890@gmail.com', 'anamika5', '10:12:2021 10:28:58am'),
(16, 'Romana', 'r123@gmail.com', '12345', '10:12:2021 09:18:10pm'),
(17, 'Anamika', 'an@gmail.com', '123456', '11:12:2021 12:05:59am'),
(18, 'sumona', 's@gmail.com', 'sumona12', '15:12:2021 12:15:48pm'),
(19, 'Anika', 'anika@gmail.com', 'anika', '15:12:2021 12:22:48pm'),
(20, 'Priya', 'p@gmail.com', 'priya', '15:12:2021 07:56:18pm'),
(21, 'Aditi', 'ad@gmail.com', 'aditi', '16:12:2021 03:04:18pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
