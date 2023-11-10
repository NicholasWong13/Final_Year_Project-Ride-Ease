-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 03:35 PM
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
-- Database: `ride ease`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `UserName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(259) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `UserName`, `MobileNumber`, `Email`, `Password`, `CreationDate`) VALUES
(1, 'Admin', 1124587212, 'admin@rideease.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-06-09 07:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `BookingNumber` char(10) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `Mobile` bigint(20) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `passenger` int(11) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `FromTime` time DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `ReturnTime` time DEFAULT NULL,
  `License` blob DEFAULT NULL,
  `PickupLocation` varchar(100) DEFAULT NULL,
  `ReturnLocation` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Aston Martin', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(2, 'Audi', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(3, 'Bently', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(4, 'BMW', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(5, 'Ford', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(6, 'Honda', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(7, 'Jaguar', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(8, 'Lexus', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(9, 'Mazda', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(10, 'Mercedes Benz', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(11, 'Mini', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(12, 'Nissan', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(13, 'Peugeot', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(14, 'Porsche', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(15, 'Subaru', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(16, 'Tesla', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(17, 'Toyota', '2023-08-06 00:24:34', '2023-08-07 18:22:01'),
(18, 'Volkswagen', '2023-08-06 00:24:50', '2023-08-07 18:22:25'),
(19, 'Volvo', '2023-08-06 00:24:34', '2023-08-07 18:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contactusquery`
--

INSERT INTO `contactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(6, 'Nicholas', 'nicholas@gmail.com', '0123456789', 'testing', '2023-09-13 06:10:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `LocationName` varchar(150) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `LocationName`, `Address`, `ContactNumber`, `Email`, `RegDate`, `UpdationDate`) VALUES
(1, 'Penang (Head Office)', '48, Jalan Kelawai, 10250 GeorgeTown, Penang', '04-8882222', 'penang@rideease.com', '2023-08-28 07:39:46', '2023-09-25 08:47:45'),
(2, 'Kuala Lumpur', '30, Tengkat Tong Shin, Bukit Bintang, 50100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '03-8882222', 'kl@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(3, 'Johor', '12, Jalan Murni 6, Taman Suria, 81100 Johor Bahru, Johor', '07-8882222', 'johor@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(4, 'Melaka', '40, Jalan Jasa Merdeka 32, Taman Datuk Tamby Chik Karim, 75350 Melaka', '04-8882222', 'melaka@rideease.com', '2023-08-28 07:39:46', '2023-09-25 08:46:28'),
(5, 'Selangor', '3, Jalan Kristal J7/7, Seksyen 7, 40000 Shah Alam, Selangor', '03-2228888', 'selangor@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(6, 'Negeri Sembilan', '522, Jln Melati 2, Taman Dusun Setia, 70400 Seremban, Negeri Sembilan', '06-8882222', 'ns@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(7, 'Pahang', 'Lot 7705 bengkel besi, jalan Padang Piol, 27150 Jerantut, Pahang', '09-8882222', 'pahang@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(8, 'Terengganu', '92, Jalan Sultan Sulaiman, Kampung Ladang Padang Cicar, 20000 Kuala Terengganu, Terengganu', '09-2228888', 'terengganu@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(9, 'Kelantan', '29, Jalan Abdul Kadir Adabi, 15200 Kota Bharu, Kelantan', '01-8882222', 'kelantan@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(10, 'Kedah', '2176 G, Taman Tunku Habsah, Jalan Kanchut, 05150 Alor Setar, Kedah', '04-2228888', 'kedah@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(11, 'Perlis', '7, Jalan Kaki Bukit, 01000 Kangar, Perlis', '02-8882222', 'perlis@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(12, 'Perak', '58, Jalan Veerasamy, Kampung Jawa, 30300 Ipoh, Perak', '10-8882222', 'perak@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(13, 'Sabah', 'Lot 1-18, Komplek Jalan Asia City Phase 2A, Asia City, 88300 Kota Kinabalu, Sabah', '11-8882222', 'sabah@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46'),
(14, 'Sarawak', '1st Floor, Ave Astana, SL-2, Jalan Astana, Petra Jaya, 93050 Kuching, Sarawak', '12-8882222', 'sarawak@rideease.com', '2023-08-28 07:39:46', '2023-08-28 07:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms & Conditions', 'terms', '<p align=justify><strong><font color=#990000>\r\n(1) RENTAL CHARGES</font><br></strong>\r\nThe charges are calculated based on the 24-hour period from commencement of the Rental Period for Daily and Weekly rentals, a month or monthly rental is calculated based on the 30-day period. Daily rental rates will be applied for rental below 7 days. Weekly rental rates will be applied for rental 7 days and above. If the rentals more than 14 days, a month rate will be calculated whichever lower. In relation to the monthly rental, any extension of the rental period will be prorated based on calendar month.</font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(2) PROTECTIONS & COVERAGES</font><br></strong>\r\n->  Coverage of unlimited liability for death or injury to third parties and property damage liability up to RM3mil. <br>\r\n-> In the event of any damage, theft, or total loss to the vehicle, the Renter is liable to pay the full cost of damage to the vehicle, including loss of use as determined by Avis. However, with the vehicle protection and coverage packages offered by Avis, the Renter is only responsible for the excess instead of the full cost of vehicle damage, which ranges between RM500 to RM2000 depending on the vehicle group. Please refer to your Avis representative for more information. <br>\r\n-> Collision Damage Waiver (CDW) is the excess that cannot be waived or deductible in the event of damage to the vehicle during the rental period. CDW is included in the rental rate. The excess ranges from RM500 to RM2,000 depending on the vehicle group as stated in the table above. <br>\r\nFor example, <br>\r\n(i)    If the repair cost is RM5,000, with the coverage of CDW, the Renter is liable for a maximum excess fee of RM750 (if the vehicle’s CDW Excess is RM750); <br> \r\n(ii)    If the repair cost is RM500, with the coverage of CDW, the Renter is liable for the actual repair cost of RM500 (even if the vehicle’s CDW Excess is RM750). <br>\r\n->  Theft Protection (TP) is the excess that cannot be waived or deductible in the event of theft of the vehicle during the rental period. TP is included in the rental rate. The excess ranges from RM500 to RM2,000 depending on the vehicle group as stated in the table above. <br>\r\n->   Windscreen Protection (WP) is not included in the rental rate. The Renter is liable to pay the full cost of any damage to the windscreen. However, the Renter can purchase the WP at RM5 per day or RM50 per month to reduce the Renter’s liability to the maximum excess as stated in the table. <br>\r\n->   The CDW, TP, and WP’s excess can be reduced completely if the Renter purchases the Vehicle Cover Plus Package (Super Collision Damage Waiver (SCDW), Super Theft Protection (STP), and Super Windscreen Protection (SWP)) at RM30 per day or RM300 per month. The Renter’s liability is reduced to zero. <br>\r\n->  Personal Accident Insurance (“PAI”) <br>\r\nThe Renter has an option to purchase the PAI at RM6 per day or RM180 per month. The coverage of PAI is as below: <br>\r\nDeath or permanent disablement\r\n(i)    Renter – RM100,000 per person. <br>\r\n(ii)    Additional Driver and Passenger – RM20,000 per person, maximum RM100,000 in total. <br>\r\n->    <b> CDW / SCDW / TP / STP / WP / SWP / PAI </b> shall not cover the following events: <br>\r\n•    where a police report is not lodged within 24 hours from the time of the accident <br>\r\n•    the Renter is in breach of the terms and conditions of the vehicle rental agreement <br>\r\n•    items or accessories missing from and/or in the vehicle <br>\r\n•    any damage claims caused by drunk and/or drug intoxicated drivers <br>\r\n•    any damage to the tyres, which are not attributable to normal wear and tear <br>\r\n•    damage to the undercarriage and/or underbody damage that is not attributable to a collision with another vehicle <br>\r\n•    any damage to the vehicle caused by a flood, fire, landslide, or riot <br>\r\n•    where the vehicle has been driven outside Peninsular and East Malaysia <br>\r\n•    where the loss, damage, or theft is caused intentionally, or due to gross negligence of the Renter or an authorised driver. <br>\r\n•    In the event of a total loss or theft of the vehicle, the Renter has an option to continue with an existing vehicle (the existing vehicle can be of any age) as a replacement for the vehicle, charged at the same rate, or terminate the existing contract. </font></p> \r\n\r\n<p align=justify><strong><font color=#990000>\r\n(3) ROADSIDE ASSISTANCE PLUS (RAP) </font><br></strong>\r\nIn the unlikely event that the vehicle breaks down (due to a flat tyre or battery) or human error occurs (due to being locked out, losing the key, running out of, or using the incorrect type of fuel) during the rental period, Avis provides complimentary Roadside Assistance Plus (24-hour Call Center Service, 24-hour Emergency Roadside Assistance, and Towing Services). The Renter shall call 1800-88-2847, which is the toll-free number. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(4) FULL MAINTENANCE </font><br></strong>\r\n-> Throughout the rental period, Avis undertakes full maintenance and servicing (as a result of normal wear and tear) of the vehicle as recommended by the manufacturer. Full maintenance does not cover any repairs or replacements that are a result of accidental damage or any overhaul repair of the vehicle. Any such cases will be referred to Avis and all incidental costs thereafter will be borne by the Renter. <br>\r\n-> Normal wear and tear occurs when the vehicle deteriorates as a result of normal use. It is not to be confused with damage that occurs because of a specific event or series of events such as impact, accident, incident, harsh treatment, negligent acts, or omissions. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(5) RATES DO NOT INCLUDE OR COVER THE FOLLOWING ITEMS: </font><br></strong>- \r\n-> Interior Cleaning: The Renter is liable for all interior upholstery and car mat cleaning if the vehicle is returned with dirty interiors. The Renter is also liable for all interior and exterior damages and/or defects caused by events that do not fall within the normal usage of the vehicle. <br>\r\n-> Interior Damages: The Renter is liable for all damage to instruments, knobs, and fittings in the vehicle. <br>\r\n-> Missing, Stolen, Broken, or Missing Accessories: The Renter is liable for all missing, stolen, or broken parts during the rental period or vehicle return unless the vehicle is damaged at the same time during an accident. For example, child seat, GPS navigator, spare tires, rims, wheel cap, tools & jacks, lamp, audio set, gear lock, lighter, wiper, switch & control button, mats, rear-view mirror, side view mirror, sun visor, head rest, etc. Lost or damaged supplementary parts or accessories will be the responsibility of the Renter. <br>\r\n->  Lost Vehicle Keys/Duplicate Vehicle Keys: The Renter is liable for all replacement costs, which include a new set of keys and security system, and or whatever items pertain to the lost vehicle keys and vehicle alarm system. <br>\r\n-> Missing, Stolen, or Broken Belongings: Avis is not liable for any missing, stolen, or broken items from the Renter’s belongings during the vehicle\'s return for servicing and maintenance. It is advisable for the Renter to remove their valuable belongings when the vehicle returns for servicing and maintenance. For example, laptops, watches, sunglasses, notes, coins, touch & go, shoes, smart tags, and others. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(6) DELIVERY AND COLLECTION SERVICES </font><br></strong>\r\nThe vehicle must be picked up and returned to the Avis office. However, delivery and collection services are available upon request (subject to manpower availability). The delivery and collection charges are calculated based on distance and timing. Please enquire with your Avis representative before confirmation of booking. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(7) ONE WAY AND INTERCITY / STATE CHARGES </font><br></strong>\r\nIf the Renter picks up a vehicle in one place and drops it off somewhere else, the one-way and intercity charges will be imposed. The charges are to cover the cost of taking the vehicle back to its original location. The charges are calculated based on distance and timing from RM50 to RM350 (subject to 6% service tax) within Peninsular Malaysia and RM350 to RM800 (subject to 6% service tax) within East Malaysia. Please refer to the Avis representative before confirmation of booking. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(8) SURCHARGE FOR NON-OPERATING HOURS </font><br></strong>\r\nPick-up or delivery, and drop-off or collection services before or after operating hours, on Sundays, or on public holidays will incur an additional surcharge. Before / after operating hours is RM100 (subject to 6% service tax); After 0000 HRS (12:00am) to 0700 HRS (7:00am) is RM150 (subject to 6% service tax). It is advisable for the Renter to check the Avis business hours before confirmation of booking. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(9) EXTENSION OF RENTAL / EXCESS HOURS </font><br></strong>\r\n-> Daily and weekly rental rates are based on 24 hours, and should the rental exceed more than 30 minutes, it would be charged as an additional day rental. <br>\r\n-> Monthly rental rates are based on a calendar month, and if the rental exceeds one (1) month, the pro-rata extended day rental will be calculated. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(10) REFUELLING SURCHARGES </font><br></strong>\r\nThe vehicle or replacement vehicle will be delivered with a full tank of fuel. At the end of the rental, the vehicle or replacement vehicle is to be returned with a full tank of fuel. A refueling surcharge will be levied if the vehicle or replacement vehicle is returned with less fuel than when originally checked out. The Renter shall return the vehicle or replacement vehicle at the same level as when picked up. Please refer to your Avis representative for more information on fuel charges before confirmation of booking. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(11) TODDLER SAFETY SEAT </font><br></strong>\r\nThe toddler safety seat is available at RM10 per day, with a maximum rate of RM100 (subject to 6% service tax). Pre-booking is required. A missing or damaged toddler safety seat will be charged RM300. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(12) GPS NAVIGATOR </font><br></strong>\r\nThe GPS Navigator is available at *RM20 per day and maximum rate of *RM200. Pre-booking is required. Any faulty unit should be immediately informed Avis for a replacement unit. No refund would be given if feedback upon return of vehicle. <br> \r\nThe following prices will apply in case of: <br>\r\n1. Missing/damaged Avis Satellite Navigation unit:    <b>RM600.00</b> <br>\r\n2. Missing/damaged Vehicle Power Cable:    <b>RM160.00</b> <br>\r\n3. Missing/damaged Suction Cup/Cradle:    <b>RM180.00</b> <br>\r\n* The above rates and prices are subject to a 6% service tax. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(13) REPLACEMENT VEHICLE </font><br></strong>\r\nA replacement vehicle will be provided within 24 hours if required (only when the vehicle has been grounded for accident-related mechanical repairs or regular servicing). The replacement vehicle can be of any age and similar capacity. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(14) DRIVER AGE LIMIT & DRIVING LICENSE </font><br></strong>\r\n-> The driver and all authorised drivers must be at least 23 years old and maximum 65 years old. A driver must possess a valid, current local Malaysian driving license or an international driving permit with at least one year of driving experience. Probationary drivers (\"P\" license holders) are not permitted. <br>\r\n-> The Renter shall provide a photocopy of the driver’s driving license and a passport or identity card upon signing of the Vehicle Rental Agreement. <br>\r\n-> For information on converting a foreign driving licence to a Malaysian Driving License, please refer to this website. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(15) ADDITIONAL DRIVER </font><br></strong>\r\nAdditional drivers will be charged RM10 (subject to 6% service tax) per person per rental. All additional drivers must register upon pick-up of the vehicle and must meet Avis qualification standards (refer to Item 13). </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(16) USAGE OF VEHICLE </font><br></strong>\r\n-> The vehicle is prohibited from being driven in Singapore, Thailand, Brunei, Indonesia, Labuan, Langkawi, Tioman, Redang, Pangkor, etc. It is prohibited to be driven on a non-gazetted road or off-road. <br>\r\n-> Only use for business purposes, not for sub-hire or roadtest/demo driving, any sort of racing, or used to teach someone to drive.\r\n-> If the Renter is found to be in breach of the conditions mentioned above, the Renter shall be liable for all expenses incurred, including under-carriage repair, cleaning, and interior upholstery. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(17) VEHICLE MAKE & MODEL </font><br></strong>\r\nThe booking will only be confirmed based on the vehicle group, not the make or model of the vehicle that the Renter want to rent. If the confirmed vehicle is not made available upon pick-up of vehicle, Avis will replace another vehicle. The replacement vehicle can be of any age and similar capacity. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(18) HIRE & DRIVE PERMIT </font><br></strong>\r\nAs required by law, each vehicle must register for a hire & drive permit, and Avis will keep a copy of the permit for safekeeping. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(19) SECURITY DEPOSIT & LATE INTEREST CHARGES </font><br></strong>\r\n-> For daily, weekly, and monthly rentals, if the Renter does not have a credit account with Avis, the Renter must pay by credit card and a deposit is required. Please contact an Avis Representative to apply for a credit account. For six-month or eleven-month rentals, a one-month security deposit is required. <br>\r\n-> Daily or weekly rentals are billed at the end of the rental period. Monthly, six-month, and eleven-month rentals are all billed on the first calendar day of the month. <br>\r\n-> In the event of a late payment, an interest charge of 18% per annum will be imposed. Calculated daily. <br>\r\n-> The deposit cannot be used to pay for future monthly rentals. Upon completion of the agreed rental and the necessary checks and inspection, Avis will refund the said amount to the Renter without further demand. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(20) MODE OF PAYMENT </font><br></strong>\r\n-> If Renter has a credit account with Avis, payment options include company cheque, corporate credit card, and online banking. <br>\r\n-> Diners Club, debit and credit cards, as well as cash and personal cheque, are not accepted. <br>\r\n-> Payments paid via company cheque should be made payable to DRB-HICOM EZ-DRIVE SDN BHD. <br>\r\n-> For personal rentals, a credit card imprint will be obtained, and a payment charge will be imposed upon vehicle return, which will include any miscellaneous charges, such as fuel, delivery fee, collection fee, excess charges, summons, or fines. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(21) PARKING AND TRAFFIC FINES </font><br></strong>\r\nThe Renter named in the Vehicle Rental Agreement is accountable for all parking fees, traffic fines or summonses incurred during the rental period. Avis reserved the right to charge the Renter for any traffic fines or summons incurred during the rental period. Additionally, an RM10 administrative surcharge each case (subject to 6% service tax) would be applied. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(22) PUSPAKOM INSPECTION </font><br></strong>\r\nAll hire and drive vehicles must undergo a routine inspection every six months or one year in accordance with the Road Transport Act 1987. Avis is responsible for arranging and sending the vehicle to PUSPAKOM for routine inspection. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(23) EARLY TERMINATION </font><br></strong>\r\n-> For daily, weekly, and monthly rentals, the Renter is allowed to terminate the vehicle rental agreement at any time. For six-month or eleven-month rentals, however, the Renter is not allowed to terminate the vehicle rental agreement prior to its expiration date. <br>\r\n-> Avis reserves the right to recover the rental for the unexpired term of the vehicle rental agreement. The Renter must pay the amount due to Avis within thirty (30) days from the date of termination of the vehicle rental agreement. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(24) CANCEL AN EXISTING OR NEW BOOKING FOR FREE </font><br></strong>\r\n-> Should you need to cancel a bookings, your refund will processed in full, and will reach your account within 5 working days. <br>\r\n-> Our flexible cancellation policy works like this:- <br>\r\nFree cancellation on \'Pay Online\' (prepaid) bookings, up to 48 hours before the day your rental was due to begin. <br>\r\nIf you cancel less than 48 hours before the day your rental was due to begin, you will receive a full refund, minus the lower of (i)  2 days of your booking, or (ii) a fixed fee depending on the country you booked in (GBP60, EUR65, CHF76). <br>\r\nYou can cancel \'Pay on Collection\' (pay later) bookings up to the time your rental was due to begin without a penalty. <br>\r\nNo refunds shall be provided in the case of no-shows, where a surcharge or fee may apply. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(25) EXTENSION OF RENTAL </font><br></strong>\r\n-> If the Renter wishes to extend any rental, the Renter must contact Avis at 1-800-88-2847 or use a method Avis approves to request the extension before the Renter\'s return date. <br>\r\n-> Avis may or may not grant an extension or decline to grant it for the entire period the Renter requests, in Avis\' sole discretion. If the Renter does not return the vehicle to the specified location, the Renter may be subject to criminal penalties. </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(26) APPLICATION PROCEDURES </font><br></strong>\r\n•    Quotation <br>\r\n•    Acceptance of the quote <br>\r\n•    For first-time customers, renters are required to open an account by submitting a credit application form. If the credit application is not approved, Avis has the right to cancel the quote. <br>\r\n•    Sign the Booking Confirmation Form <br>\r\n•    Sign the vehicle rental agreement <br>\r\n•    Vehicle collection </font></p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n(27) TERMS AND CONDITIONS </font><br></strong>\r\nThe Renter is subject to the terms and conditions of the vehicle rental agreement. </font></p>\r\n \r\n<p align=center><strong><font color=#990000>\r\nTHANK YOU FOR CHOOSING <b>RIDE EASE</b> </font></p>\r\n										'),
(2, 'Privacy Policy', 'privacy', '<p align=justify><strong><font color=#990000>\r\nWHY THIS NOTICE </font>\r\n<p align=justify><strong><font color=#990000>This privacy policy (the “Privacy Policy”) is intended to assist you in understanding what information we gather when you visit this Website, make car reservations and sign agreements, whether you are registered user or not, and to describe how we use that information. </p></font>\r\n\r\n<p align=justify>These documents provide you with important information about the following: <br/>\r\n\r\n<br/>1. Processing of Personal Data \r\n<br/>2. Personal Data We Collect \r\n<br/>3. How We Use Personal Data\r\n<br/>4. How We Share Personal Data \r\n<br/>5. Children\'s Privacy\r\n<br/>6. For How Long Your Personal Data Will Be Retained ?\r\n<br/>7. Access, Correction And Deletion Of Personal Data \r\n<br/>8. Contacts </p>\r\n\r\n<p align=justify><strong><font color=#990000> \r\nACCEPTANCE </font>\r\n<p align=justify><strong><font color=#990000> By visiting the Website, using its services or, otherwise by interacting with us, our Points of Sales and/or Websites, you acknowledge that you have read and understand this Privacy Policy and you agree that we may collect, use, store, transmit and disclose the personal data we collect through the Websites and/or Points of Sale in accordance with this Privacy Policy. </p></font>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n1.      Processing of Personal Data </p></font>\r\n<p align=justify> When we use \"Personal Data\" in this Privacy Policy we refer to any information enabling us to identify you (or a third party whose personal data you provide us) directly or indirectly including any information incidental to the purchase of goods or services; or that you chose to communicate to us or share with us, or third parties, while using the Website or at Points of Sales. We will process the personal data in accordance with the General Data Protection Regulation (EU) 2016/679 “Reg.(EU) 2016/679” and with the legislation of the country where data should be collected, if applicable. We reserve the right to carry out additional processing as required by law or as part of a criminal or other investigation or proceedings. Company will not sell, purchase, provide, exchange or in any other manner disclose Account or Transaction data, or personal information of or about a Cardholder to anyone, except, it\'s Acquirer, Visa/Mastercard Corporations or in response to valid government demands. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n2.      Personal Data We Collect </p></font>\r\n<p align=justify><strong><font color=#990000>\r\n<br/>Source of Data </p></font>\r\n<p align=justify> We collect personal data from you only when you voluntarily provide us with this information, such as: </p>\r\n\r\n<p align=justify> When you choose to apply for a car reservation and conclude car rent agreement, you provide information verbally and in writing. This information could constitute personal data and sensitive personal data under Personal Data Protection Law and the General Data Protection Regulation. The car rental agreement will regulate conditions regarding the rental car, Your rights and duties, as well as use of personal data in accordance with the agreement. </p>\r\n\r\n<p align=justify> The personal data that we may collect from you is name, surname, address, date of birth, identity code, number your ID document, the issuing authority and date of issue, driving license number, issue date un driver’s category, address at which the car will be kept (where appropriate), type of credit card (visa/mastercard/amex), credit card number, expiry date, telephone number and email address for mutual communication. Also, it should be indicated to the Company within which geographical area the rented car will be used. </p>\r\n\r\n<p align=justify> Upon entering into the car rental agreement you are being informed, you understand and agree that each Company car may be equipped with a tracking device in order to determine the location of the car in the case of theft and/or other damage to the car. Installation of the tracking device is prevention of criminal offence. </p>\r\n\r\n<p align=justify> The legal ground for the Company’s processing of Your personal data and entering into the car rental agreement, is  your consent  according to your application and will to enter into the agreement. You are providing Your personal data by free will and You can at any time withdraw your consent by contacting the Company as per below. </p>\r\n\r\n<p align=justify> If you provide us with personal information of third parties (e.g., your family members, other customer or prospects of us), you should make sure that said third parties are informed and authorized the use of their data as described in this Privacy Policy. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n<br/>Types of Data </p></font>\r\n\r\n<p align=justify> We may collect and use different types of personal data depending on the specific purpose we have, as described below: </p>\r\n\r\n<p align=justify> personal details, such as name, surname, gender, age/date of birth, country of origin, and other personal details as allowed by applicable laws; </p>\r\n<p align=justify> contact details, such as address, email address, phone number, mobile number, fax number (if any), and other contact details as allowed by applicable laws; </p>\r\n<p align=justify> payment details, such as payment instrument (credit card, debit card) if applicable, passport number when required for tax or anti money laundering reasons; </p>\r\n<p align=justify> sales related information, such as date, products or services provided, place of purchase, product codes, amount, total of sales, VAT number, complaints, returns, refunds and other sales related information as allowed by applicable laws; </p>\r\n<p align=justify> habits and profiles, such as data regarding your purchases/reservations (purchase/reseveration history including, boutique where the sale takes place, type, kind of car and rental price), information related to customer relationship management activities and initiatives (date and categories of said actions as performed or to be performed and results of said actions), shopping habits and preferences (wish list, preferred categories of products, colour, style, other brands purchased, most visited countries, how you know our car brands, sizes, notes regarding purchase habits or special needs stated by you – i.e. preferred car color), other information (job related information, education, hobbies and lifestyle activities) as allowed by applicable laws; </p>\r\n<p align=justify> family related information, such as marital status, anniversary date, number of children, children related information and other family related information as allowed by applicable laws. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n3.      How We Use Personal Data </p></font>\r\n<p align=justify> Personal data may be used for the following purposes, depending on the specific circumstances in which you interact with us. </p>\r\n\r\n<p align=justify> All information provided by you to the Company will be stored by the Company on its servers, but where the information is stored physically, it will be stored in the Company’s data carriers, files. The Company will have only a limited number of persons with access to your data, including members of the Board of Directors and accountants. </p>\r\n\r\n<p align=justify> Information collected by the Company from you may be shared and stored outside the European Economic Area (EEA). By providing your personal data you also consent to transferring, storage and processing of your personal data (including sensitive personal data) according to this Confirmation. </p>\r\n\r\n<p align=justify> The Company will use the information received from you to contact you. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n4. How We Share Personal Data </p></font>\r\n\r\n<p align=justify> In addition to the above, the Company may also disclose Your personal data to a third party: </p>\r\n\r\n<p align=justify> • If the Company transfers or acquires a business or assets, or part thereof, the Company may disclose Your Personal to the potential buyer or seller of such business or assets; and </p>\r\n\r\n<p align=justify> • If the Company is legally required to disclose or share Your personal data in order to comply with applicable law. The Company will share your health scheme with its insurance company; </p>\r\n\r\n<p align=justify> •  If you default on payments with the Company and the Company is forced to transfer information to debt recovery companies. </p>\r\n\r\n<p align=justify> The Company also use third party suppliers to perform services on its behalf. To ensure your rights, we have entered into a data processing agreement with such third parties who will receive access to Your personal data. Those agreements set out e.g. which data such third parties have access to and how such data shall be processed. Such third parties will not be able to use Your data for other purposes than what we have agreed with You. Any such third parties are also required to apply necessary safety and security measures to protect Your personal data. </p>\r\n\r\n<p align=justify> If such third parties use suppliers, they are required to enter into an agreement setting out the same requirements as the Company has agreed with You. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n5.    Children\'s Privacy </p></font>\r\n<p align=justify> This Website is a general audience site; however our services are intended for people aged 18 years or older. We do not knowingly request or collect, use and disclose personal data provided by a person under the age of 18 both online and at the Boutiques/Points of Sales. In the event we learn we have collected personally data from a child, we will delete that information. </p>\r\n\r\n<p align=justify><strong><font color=#990000> If you are under this age, please do not make any car reservations on our Webpage. </p></font>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n6. For How Long Your Personal Data Will Be Retained ? </p></font>\r\n<p align=justify> The Company will retain Your personal data for the duration of the car rental agreement, as well as 24 months after end of it, in order of necessity (e.g. court process, communication with law enforcement agencies, etc.) could use the contractual data. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n7. Access, Correction And Deletion Of Personal Data </p></font>\r\n<p align=justify> You have the right to access, correct and delete Your personal data in line with the General Data Protection Regulation. Furthermore, You have the right to demand data portability, to demand that the processing is limited and to refuse certain aspects of the processing of Your personal data. You also have the right to lodge a complaint with the Latvian Data Protection Inspection. </p>\r\n\r\n<p align=justify><strong><font color=#990000>\r\n8.  Contact </p></font>\r\n<p align=justify> Questions, comments and requests regarding this Consent Form are welcomed and submitted to: info@rideease.com </p>	');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `BookingId` int(11) NOT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `TransactionId` varchar(100) DEFAULT NULL,
  `BankAccountNumber` varchar(100) DEFAULT NULL,
  `ReceiptPath` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'nick@gmail.com', '2023-09-08 18:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(120) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Mobile` char(11) DEFAULT NULL,
  `icpno` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `FullName`, `EmailId`, `Password`, `Mobile`, `icpno`, `dob`, `Address`, `City`, `Country`, `State`, `Image`, `RegDate`, `UpdationDate`) VALUES
(1, 'Nick123', 'Nicholas', 'nicholas@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', '0101234567', '010110070181', '2002-01-01', 'Penang, Malaysia', 'Bayan Lepas', 'Malaysia', 'Penang', '', '2023-11-09 05:14:54', '2023-11-09 14:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `RegNo` varchar(150) DEFAULT NULL,
  `VehiclesType` varchar(100) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `RentalInfo` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Mileage` varchar(100) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Clicks` int(11) DEFAULT 0,
  `LocationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `RegNo`, `VehiclesType`, `VehiclesOverview`, `RentalInfo`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Location`, `Mileage`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `Clicks`, `LocationID`) VALUES
(1, 'Rapide', 1, 'PMX 10', 'Sport', 'Aston Martin Rapide is a luxurious and high-performance four-door sports sedan known for its elegant design, powerful V12 engine, precise handling, and premium interior. It combines the style and performance of an Aston Martin with the practicality of a four-door layout, offering a unique and exclusive driving experience.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 850, 'Petrol', 2017, 4, 'Penang', '8,000 KM', 'astonmartin_rapide(1).jpg', 'astonmartin_rapide(2).jpg', 'astonmartin_rapide(3).jpg', 'astonmartin_rapide(4).jpg', 'astonmartin_rapide(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-13 19:46:23', '2023-11-01 20:40:31', 0, NULL),
(2, 'Vantage V12 Manual', 1, 'PMN 10', 'Sport', 'Aston Martin Vantage V12 with a manual transmission is a high-performance sports car that combines the exhilarating power of a V12 engine with the engaging experience of a manual gearbox. It offers striking design, precise handling, and a driver-focused interior for enthusiasts who value the art of manual shifting and an immersive driving experience.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 620, 'Petrol', 2017, 2, 'Penang', '18,000 KM', 'astonmartinvantage(1).jpg', 'astonmartinvantage(2).jpg', 'astonmartinvantage(3).jpg', 'astonmartinvantage(4).jpg', 'astonmartinvantage(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-06-18 19:46:23', '2023-11-10 14:08:59', 0, NULL),
(3, 'DBX', 1, 'PMS 5', 'SUV', 'Aston Martin DBX is a luxury SUV that brings the iconic British brand\'s elegance and performance to the world of sport utility vehicles. It combines a striking design with powerful engines, offering a thrilling driving experience. Inside, the DBX provides a sumptuous interior with high-quality materials and modern technology, making it a practical and luxurious choice for those who desire both the performance of an Aston Martin and the versatility of an SUV.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2017, 5, 'Kuala Lumpur', '48,000 KM', 'astonmartindbx(1).jpg', 'astonmartindbx(2).jpg', 'astonmartindbx(3).jpg', 'astonmartindbx(4).jpg', 'astonmartindbx(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-07 19:46:23', '2023-11-10 14:10:30', 0, 2),
(4, 'A4', 2, 'PMK 12', 'Sedan', 'Audi A4 is a compact luxury sedan known for its stylish design, refined interior, and advanced technology features. It offers a comfortable and well-appointed cabin, a choice of powerful yet fuel-efficient engines, and Audi\'s renowned Quattro all-wheel drive system for enhanced traction and handling. The A4 is a popular choice for those seeking a balance of performance and premium features in the compact sedan segment.\r\n\r\n\r\n\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 250, 'Petrol', 2017, 5, 'Kuala Lumpur', '48,000 KM', 'audia4(1).jpg', 'audia4(2).jpg', 'audia4(3).jpg', 'audia4(4).jpg', 'audia4(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-26 19:46:23', '2023-11-10 14:11:09', 0, 2),
(5, 'A5', 2, 'PKH 1872', 'Sport', 'Stand out from the crowd with the Audi A5 Sportback. The design language of the A5 Sportback gives the family-friendly five-door model even more depth and width. In addition, it offers trend-setting technologies such as the LED headlights and a large infotainment system', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2018, 5, 'Penang', '48,000 KM', 'audia5(1).jpg', 'audia5(2).jpg', 'audia5(3).jpg', 'audia5(4).jpg', 'audia5(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-26 19:46:23', '2023-11-10 14:11:25', 0, NULL),
(6, 'A6', 2, 'PNS 8', 'Sedan', 'Audi A6 is a midsize luxury sedan renowned for its elegant design, cutting-edge technology, and a spacious, well-crafted interior. It offers a range of powerful engines, including efficient hybrid options, and features Audi\'s Quattro all-wheel drive for enhanced stability and traction. The A6 combines a comfortable ride with dynamic handling, making it a top choice for those seeking a blend of sophistication, performance, and advanced features in the midsize luxury sedan category.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2018, 5, 'Penang', '48,000 KM', 'audia6(1).jpg', 'audia6(2).jpg', 'audia6(3).jpg', 'audia6(4).jpg', 'audia6(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-26 19:46:23', '2023-11-10 14:11:53', 0, NULL),
(7, 'Q3', 2, 'VX 911', 'SUV', 'Modern life is a balancing act. And the new Audi Q3 juggles it all in style, with a more spacious interior, enough SUV road presence to inspire confidence and a compact design to handle city driving. Add to that advanced connectivity, a host of cutting-edge assistance systems and a new muscular silhouette, and the new Q3 makes getting it right look effortless.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2018, 5, 'Penang', '48,000 KM', 'audiq3(1).jpg', 'audiq3(2).jpg', 'audiq3(3).jpg', 'audiq3(4).jpg', 'audiq3(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-26 19:46:23', '2023-11-10 14:12:11', 0, NULL),
(8, 'Q8', 2, 'PQP 118', 'SUV', 'The Audi Q8 combines the elegance of a four-door luxury coupé with the versatility of an SUV. Expressive design with new Single frame and features from the original Audi quattro. The sporty interior conveys luxurious charm; and together with the sliding rear seat bench plus, it offers even more space in the rear. The sporty but luxurious elegant nature of the interior, touch operating concept and high-tech navigation makes it the ideal accompaniment for business or leisure. ', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2018, 5, 'Penang', '48,000 KM', 'audiq8(1).jpg', 'audiq8(2).jpg', 'audiq8(3).jpg', 'audiq8(4).jpg', 'audiq8(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-26 19:46:23', '2023-11-10 14:12:33', 0, NULL),
(9, 'Continental GT ', 3, 'VS 8', 'Sport', 'The Continental GT captures the essence of the Continental GT range. The quintessential luxury grand tourer, it is a true design classic, showcasing the very best of British automotive craft. There is no more accomplished combination of high performance with the practicality you need to truly enjoy long journeys.\r\n\r\nIts twin-turbocharged 4.0 litre engine has the power to deliver exhilarating performance the moment you put your foot down, accompanied by the much-loved exhaust note that only a V8 engine can provide. With four driving modes ranging from Comfort to Sport – and the facility to configure your own settings – the Continental GT guarantees a gratifying drive.\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2019, 2, 'Penang', '88,000 KM', 'bentley_gt(1).jpg', 'bentley_gt(2).jpg', 'bentley_gt(3).jpg', 'bentley_gt(4).jpg', 'bentley_gt(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:12:55', 0, NULL),
(10, '218i Gran Coupe M Sport', 4, 'AAA 192', 'Coupe', 'The first-ever BMW 2 Series Gran Coupé introduces a new form of authority with a bold character to the compact class. It is above all the uncompromising, performance-oriented aesthetic that unmistakeably reveals its ambitions. In keeping with high-end technologies and perfectly tuned driving dynamics features, the BMW 2 Series Gran Coupé stands out from the crowd with ease and pursues its very own path.\r\n  \r\n\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 3000, 'Petrol', 2021, 5, 'Kuala Lumpur', '20,000 KM', 'bmw_218i_f44(1).jpg', 'bmw_218i_f44(2).jpg', 'bmw_218i_f44(3).jpg', 'bmw_218i_f44(4).jpg', 'bmw_218i_f44(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:13:13', 0, 2),
(11, '318i ', 4, 'CEC 8989', 'Sedan', 'BMW 318i is a compact luxury sedan known for its balanced combination of performance, style, and practicality. It typically features a responsive yet fuel-efficient four-cylinder engine, elegant design, and a well-appointed interior. The 318i provides a comfortable and engaging driving experience, making it a popular choice for those who desire a premium compact sedan that\'s both enjoyable to drive and functional for everyday use.\r\n\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 150, 'Petrol', 2016, 5, 'Pahang', '99,200 KM', 'bmw_318i(1).jpg', 'bmw_318i(2).jpg', 'bmw_318i(3).jpg', 'bmw_318i(4).jpg', 'bmw_318i(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:13:40', 0, 7),
(12, '530e G30', 4, 'BPA 2288', 'Sedan', 'The BMW 5 Series Sedan is the epitome of a sporty business saloon. At very first sight it conveys an impression of stylish athleticism that particularly expresses itself in the dynamic silhouette and reduced design language. Clear surfaces and precise contours lend the elegant exterior a modern, technical atmosphere. The elegant and functional interior completes the innovative ambition of the vehicle with future-oriented technologies and sporty features. In combination with impressive driving dynamics and innovative technologies, the BMW 5 Series Sedan provides comfort, self-assuredness and, above all, a supreme level of sheer driving pleasures on journeys both short and long.\r\n\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 500, 'Hybrid', 2022, 5, 'Selangor', '10,000 KM', 'bmw_530e_g30(1).jpg', 'bmw_530e_g30(2).jpg', 'bmw_530e_g30(3).jpg', 'bmw_530e_g30(4).jpg', 'bmw_530e_g30(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:14:01', 0, 5),
(13, 'X1', 4, 'AEG 2288', 'SUV', 'Every movement is eye-catching: the new BMW X1 impresses with its striking shape –and with every detail, too. Its powerfully defined silhouette inspires with its long wheelbase and short overhangs. The striking BMW kidney grille and bold bumper in conjunction with narrow LED headlights guarantee an extremely authoritative appearance. In the interior, elegance and spaciousness match versatility in every respect.\r\n\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 500, 'Petrol', 2021, 5, 'Perak', '40,000 KM', 'bmw_x1(1).jpg', 'bmw_x1(2).jpg', 'bmw_x1(3).jpg', 'bmw_x1(4).jpg', 'bmw_x1(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:15:00', 0, 12),
(14, 'X4', 4, 'KEE 2288', 'SUV', 'With the BMW X4, driving pleasure is guaranteed. Original BMW Accessories exists to meet your special desires. We offer a broad selection of individual additions and extras that are perfectly suited to the BMW X4 in quality, design and performance, offering you maximum added value – whatever you have in mind.\r\n\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 800, 'Petrol', 2020, 5, 'Kedah', '38,000 KM', 'bmw_x4(1).jpg', 'bmw_x4(2).jpg', 'bmw_x4(3).jpg', 'bmw_x4(4).jpg', 'bmw_x4(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:15:19', 0, 10),
(15, 'X5', 4, 'MDM 2288', 'SUV', 'The BMW X5 offers driving pleasure on any terrain thanks to the enhanced BMW TwinPower Turbo power unit and the outstanding traction of BMW xDrive all-wheel drive. The optional xOffroad package provides finer tuning: four selectable off-road modes adjust the all-wheel drive precisely to the current ground conditions.\r\n', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 750, 'Hybrid', 2018, 5, 'Melaka', '88,000 KM', 'bmw_x5(1).jpg', 'bmw_x5(2).jpg', 'bmw_x5(3).jpg', 'bmw_x5(4).jpg', 'bmw_x5(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:15:39', 0, 4),
(16, 'iX', 4, 'VJV 98', 'SUV', 'THE FIRST BMW iX: PIONEER OF A NEW ERA.\r\nBorn from a vision. Created for electric mobility. Thanks to efficient BMW eDrive technology and its fully electric all-wheel drive, the BMW iX achieves an exceptional range and delivers powerful acceleration from a standstill. The intelligent BMW Operating System 8 always keeps itself up to date and can be operated completely intuitively.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 900, 'Electric', 2022, 5, 'Kuala Lumpur', '5,000 KM', 'bmw_ix(1).jpg', 'bmw_ix(2).jpg', 'bmw_ix(3).jpg', 'bmw_ix(4).jpg', 'bmw_ix(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:15:53', 0, 2),
(17, 'Focus', 5, 'JKQ 1338', 'Hatchback', 'Ford Focus is a compact car celebrated for its affordability, practicality, and efficient performance. It\'s available as both a sedan and a hatchback, offering a choice of fuel-efficient engines. The Focus is known for its comfortable and spacious interior, as well as user-friendly technology features. It\'s a popular choice for those seeking a budget-friendly compact car that excels in everyday driving, whether for commuting or city living.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 350, 'Petrol', 2022, 5, 'Johor', '59,000 KM', 'focus(1).jpg', 'focus(2).jpg', 'focus(3).jpg', 'focus(4).jpg', 'focus(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:16:17', 0, 3),
(18, 'Mustang', 5, 'PPQ 28', 'Sport', 'Ford Mustang is an iconic American muscle car that has been a symbol of power and performance since its debut in 1964. Known for its distinctive design, the Mustang features a powerful lineup of engines, from V6 and EcoBoost options to high-performance V8s. It\'s celebrated for its thrilling acceleration and classic rear-wheel-drive setup. The Mustang offers a blend of traditional muscle car charm with modern technology, making it a beloved choice for those seeking an exhilarating driving experience and a touch of automotive history.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 550, 'Petrol', 2022, 5, 'Penang', '42,000 KM', 'mustang(1).jpg', 'mustang(2).jpg', 'mustang(3).jpg', 'mustang(4).jpg', 'mustang(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:16:55', 0, NULL),
(19, 'City', 6, 'NDD 1528', 'Sedan', 'Honda City is a popular compact sedan known for its reliability, fuel efficiency, and practicality. It is recognized for its comfortable and well-designed interior, which often includes advanced technology features. The City offers a choice of gasoline or hybrid powertrains, delivering good performance and efficient fuel economy. It\'s a favored choice for those seeking a compact and affordable sedan with a reputation for durability and a range of modern amenities.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 98, 'Petrol', 2022, 5, 'N.Sembilan', '32,000 KM', 'city(1).jpg', 'city(2).jpg', 'city(3).jpg', 'city(4).jpg', 'city(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:17:26', 0, NULL),
(20, 'Civic 1.5', 6, 'BAQ 9128', 'Sedan', 'Honda Civic 1.5 is a compact car variant equipped with a 1.5-liter turbocharged engine, offering a balance of performance and fuel efficiency. It is part of the renowned Honda Civic lineup, celebrated for its reliable and practical features. The 1.5-liter engine delivers a blend of power and good gas mileage, making it a popular choice for those seeking a fuel-efficient compact car with a touch of sporty performance. The Civic is also known for its comfortable and well-equipped interior, with modern technology and safety features.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 108, 'Petrol', 2022, 5, 'Selangor', '43,000 KM', 'civic_1.5(1).jpg', 'civic_1.5(2).jpg', 'civic_1.5(3).jpg', 'civic_1.5(4).jpg', 'civic_1.5(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:18:16', 0, 5),
(21, 'Civic Type R', 6, 'VQ 18', 'Sport', 'Honda Civic Type R is a high-performance version of the popular Honda Civic compact car. It\'s known for its turbocharged engine, sharp handling, and aggressive styling. The Civic Type R is designed for driving enthusiasts, with a focus on precision and speed. It often features sport-tuned suspension, upgraded brakes, and aerodynamic enhancements for improved downforce. Inside, it provides a driver-focused cockpit with supportive seats and modern technology. The Civic Type R is a top choice for those seeking a track-ready, front-wheel-drive sports car with the practicality of a compact hatchback.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 308, 'Petrol', 2022, 5, 'Kuala Lumpur', '23,000 KM', 'civic_typeR(1).jpg', 'civic_typeR(2).jpg', 'civic_typeR(3).jpg', 'civic_typeR(4).jpg', 'civic_typeR(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:19:10', 0, 2),
(22, 'HRV', 6, 'SAA 1428', 'SUV', 'Honda HR-V is a subcompact crossover SUV known for its versatility, practicality, and efficient performance. It typically features a roomy and flexible interior with Honda\'s \"Magic Seat,\" allowing for various seating and cargo configurations. The HR-V offers a smooth and fuel-efficient engine, making it a practical choice for daily commuting and urban driving. It\'s often equipped with modern technology features, providing a comfortable and connected driving experience. The HR-V is favored by those looking for a compact SUV with a spacious interior and the convenience of a flexible cargo area.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 58, 'Petrol', 2022, 5, 'Sabah', '23,000 KM', 'HRV(1).jpg', 'HRV(2).jpg', 'HRV(3).jpg', 'HRV(4).jpg', 'HRV(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:19:47', 0, 13),
(23, 'XE 2.0', 7, 'VJW 193', 'Sedan', 'Jaguar XE equipped with a 2.0-liter engine, a compact luxury sedan that offers a blend of style, performance, and modern features. The 2.0-liter engine can come in various configurations, including turbocharged options, providing a balance of power and efficiency. The Jaguar XE is celebrated for its sleek design, precise handling, and a well-appointed interior with premium materials and advanced technology. It\'s a popular choice for those seeking a compact luxury sedan with a combination of British elegance and spirited driving dynamics.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 258, 'Petrol', 2016, 5, 'Kuala Lumpur', '73,000 KM', 'jaguar_xe(1).jpg', 'jaguar_xe(2).jpg', 'jaguar_xe(3).jpg', 'jaguar_xe(4).jpg', 'jaguar_xe(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:20:26', 0, 2),
(24, 'F-Pace', 7, 'VA 8', 'SUV', 'Jaguar F-PACE is a luxury compact SUV renowned for its striking design, powerful performance, and upscale interior. It offers a blend of sporty handling and modern technology, making it an attractive choice for those seeking a premium and versatile SUV.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1000, 'Petrol', 2018, 5, 'Kuala Lumpur', '13,000 KM', 'jaguar_f-pace(1).jpg', 'jaguar_f-pace(2).jpg', 'jaguar_f-pace(3).jpg', 'jaguar_f-pace(4).jpg', 'jaguar_f-pace(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:20:55', 0, 2),
(25, 'ES250', 8, 'JQW 990', 'Sedan', 'Lexus ES 250 is a luxury sedan known for its refined design, comfortable interior, and smooth performance. It typically features a fuel-efficient 2.5-liter engine, providing a good balance of power and efficiency. The ES 250 offers a spacious and well-appointed cabin with high-quality materials, advanced technology features, and a focus on ride comfort. It\'s a popular choice for those seeking a comfortable and elegant luxury sedan with a reputation for reliability.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 210, 'Petrol', 2018, 5, 'Johor', '97,000 KM', 'es250(1).jpg', 'es250(2).jpg', 'es250(3).jpg', 'es250(4).jpg', 'es250(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:21:33', 0, 3),
(26, 'IS250', 8, 'PQA 388', 'Sedan', ' Lexus IS 250 is a compact luxury sedan celebrated for its blend of style, comfort, and performance. It typically features a 2.5-liter V6 engine, offering a balance of power and fuel efficiency. The IS 250 is known for its sharp handling and responsive steering, providing an engaging driving experience. It offers a well-appointed interior with high-quality materials and modern technology features, making it a popular choice for those who desire a luxury sedan that combines refinement with a touch of sportiness.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 388, 'Petrol', 2018, 5, 'Penang', '27,000 KM', 'is250(1).jpg', 'is250(2).jpg', 'is250(3).jpg', 'is250(4).jpg', 'is250(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:22:00', 0, NULL),
(27, 'RX 200T', 8, 'WTA 9021', 'SUV', 'Lexus RX 200t is a luxury midsize SUV known for its combination of elegance, comfort, and performance. It\'s typically equipped with a 2.0-liter turbocharged engine, providing a good balance of power and fuel efficiency. The RX 200t features a stylish and well-crafted interior with high-quality materials, advanced technology features, and a focus on passenger comfort. It\'s a popular choice for those seeking a premium midsize SUV with a smooth ride, a reputation for reliability, and a touch of luxury.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 250, 'Petrol', 2018, 5, 'Penang', '57,000 KM', 'rx200t(1).jpg', 'rx200t(2).jpg', 'rx200t(3).jpg', 'rx200t(4).jpg', 'rx200t(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:22:25', 0, NULL),
(28, '2', 9, 'SAA 9921', 'Sedan', 'Mazda 2 is a subcompact car known for its nimble handling, fuel efficiency, and compact size. It\'s a popular choice for urban commuting and those seeking an affordable and easy-to-park vehicle. The Mazda 2 typically features a small but efficient engine, providing good gas mileage. It offers a comfortable and well-designed interior, often equipped with modern technology features. The Mazda 2 is favored for its affordability and practicality, making it an ideal choice for those in search of a compact and budget-friendly city car.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 120, 'Petrol', 2018, 5, 'Sabah', '117,000 KM', 'mazda2(1).jpg', 'mazda2(2).jpg', 'mazda2(3).jpg', 'mazda2(4).jpg', 'mazda2(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:22:52', 0, 13),
(29, 'CX3', 9, 'DEE 2188', 'SUV', 'Mazda CX-3 is a subcompact crossover SUV known for its sporty styling, agile handling, and efficient performance. It\'s designed to provide a versatile and stylish option for urban and city driving. The CX-3 typically features a small but peppy engine, offering good fuel economy. It offers a comfortable and well-appointed interior with modern technology features, making it a practical choice for individuals or small families who want the versatility of an SUV in a compact and budget-friendly package.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 180, 'Petrol', 2018, 5, 'Kelantan', '57,000 KM', 'CX3(1).jpg', 'CX3(2).jpg', 'CX3(3).jpg', 'CX3(4).jpg', 'CX3(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:23:18', 0, 9),
(30, 'CX5', 9, 'TBV 2188', 'SUV', 'Mazda CX-5 is a compact crossover SUV celebrated for its blend of style, performance, and versatility. It typically offers a choice of efficient yet powerful engines, making it a practical option for a range of driving needs. The CX-5 features a well-crafted interior with high-quality materials and advanced technology features. Known for its precise handling and engaging driving experience, it\'s a popular choice for those seeking a stylish and comfortable compact SUV that provides a touch of sportiness.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 220, 'Petrol', 2018, 5, 'Terengganu', '67,000 KM', 'CX5(1).jpg', 'CX5(2).jpg', 'CX5(3).jpg', 'CX5(4).jpg', 'CX5(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:23:43', 0, 8),
(31, 'A180', 10, 'F 2288', 'Hatachback', 'Mercedes-Benz A180 is a compact luxury hatchback known for its blend of sophistication, efficiency, and a premium driving experience. It typically features a small yet efficient engine, offering a good balance of performance and fuel economy. The A180 offers a comfortable and well-designed interior with modern technology features, often including the latest in infotainment and safety technology. It\'s a popular choice for those who seek a luxury hatchback with a prestigious badge, compact dimensions, and a focus on comfort and style.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 250, 'Petrol', 2016, 5, 'Putrajaya', '87,000 KM', 'a180(1).jpg', 'a180(2).jpg', 'a180(3).jpg', 'a180(4).jpg', 'a180(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:24:22', 0, NULL),
(32, 'A35 AMG', 10, 'VQS 2288', 'Hatachback', 'Mercedes-AMG A35 is a high-performance compact luxury car known for its powerful engine, sporty handling, and upscale features. It features a turbocharged 2.0-liter four-cylinder engine that delivers strong acceleration and responsive power. The A35 AMG offers a sport-tuned suspension, precise steering, and AMG-specific enhancements, making it an agile and thrilling driving experience. Inside, it combines a well-appointed interior with advanced technology, providing a balance of luxury and sportiness. The A35 AMG is favored by those seeking a compact and spirited sports car with the prestige of the AMG brand.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 550, 'Petrol', 2019, 5, 'Kuala Lumpur', '57,000 KM', 'a35_amg(1).jpg', 'a35_amg(2).jpg', 'a35_amg(3).jpg', 'a35_amg(4).jpg', 'a35_amg(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:24:45', 0, 2),
(33, 'C200', 10, 'SAB 2288', 'Sedan', 'Mercedes-Benz C200 is a compact luxury sedan known for its elegant design, efficient performance, and a well-crafted interior. It typically features a turbocharged engine, providing a good balance of power and fuel economy. The C200 offers modern technology features and a comfortable cabin, making it an attractive choice for those who seek a compact and upscale luxury sedan with a focus on sophistication and style.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 450, 'Petrol', 2019, 5, 'Sarawak', '47,000 KM', 'c200(1).jpg', 'c200(2).jpg', 'c200(3).jpg', 'c200(4).jpg', 'c200(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:25:30', 0, 14),
(34, 'CLA 180', 10, 'R 2288', 'Sedan', 'Mercedes-Benz CLA 180 is a compact luxury sedan known for its sleek design, efficient performance, and a well-appointed interior. Typically equipped with a turbocharged engine, it offers a balance of power and fuel efficiency. The CLA 180 provides modern technology features and a comfortable cabin, making it an appealing choice for those who desire a stylish and upscale compact sedan with a focus on sophistication and comfort.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 350, 'Petrol', 2019, 5, 'Perlis', '77,000 KM', 'cla180(1).jpg', 'cla180(2).jpg', 'cla180(3).jpg', 'cla180(4).jpg', 'cla180(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:25:59', 0, 11),
(35, 'GLA 45', 10, 'PMM 2288', 'Sedan', 'Mercedes-AMG GLA 45 is a high-performance subcompact luxury SUV known for its powerful turbocharged engine, sporty design, and agile handling. It provides a driver-focused experience with AMG-specific enhancements, making it a compelling choice for those who seek a spirited and sporty subcompact SUV with a touch of luxury.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 680, 'Petrol', 2019, 5, 'Penang', '88,000 KM', 'gla45(1).jpg', 'gla45(2).jpg', 'gla45(3).jpg', 'gla45(4).jpg', 'gla45(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:26:22', 0, NULL),
(36, 'GLC 200', 10, 'DDD 2288', 'SUV', 'Mercedes-Benz GLC 200 is a midsize luxury SUV known for its sophisticated design, efficient performance, and a well-appointed interior. It typically features a turbocharged engine, delivering a balanced combination of power and fuel efficiency. The GLC 200 offers advanced technology features and a spacious cabin, making it a compelling choice for those seeking an upscale midsize SUV with a focus on style and comfort.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 500, 'Petrol', 2019, 5, 'Kelantan', '63,200 KM', 'glc200(1).jpg', 'glc200(2).jpg', 'glc200(3).jpg', 'glc200(4).jpg', 'glc200(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:26:44', 0, 9),
(37, 'GLC 250 Coupe', 10, 'KED 2288', 'SUV', 'Mercedes-Benz GLC 250 Coupe is a midsize luxury SUV with a distinctive coupe-like design. It offers a blend of elegance, performance, and modern features. Typically equipped with a responsive turbocharged engine and advanced technology, the GLC 250 Coupe caters to those who seek a stylish and upscale SUV with a focus on sophistication and sporty aesthetics.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 500, 'Petrol', 2019, 5, 'Kedah', '38,200 KM', 'glc250-coupe(1).jpg', 'glc250-coupe(2).jpg', 'glc250-coupe(3).jpg', 'glc250-coupe(4).jpg', 'glc250-coupe(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:27:05', 0, 10),
(38, 'GLE 450', 10, 'FF 288', 'SUV', 'Mercedes-Benz GLE 450 is a midsize luxury SUV, offering a stylish design, a powerful turbocharged engine, and a high level of comfort and technology. It is designed to provide a spacious and elegant driving experience, making it an attractive choice for those who seek a combination of luxury, performance, and modern features in a midsize SUV.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 800, 'Petrol', 2019, 5, 'Putrajaya', '18,280 KM', 'gle450(1).jpg', 'gle450(2).jpg', 'gle450(3).jpg', 'gle450(4).jpg', 'gle450(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:27:44', 0, NULL),
(39, 'Cooper JCW', 11, 'TBB 288', 'Hatchback', 'MINI Cooper JCW, or John Cooper Works, is the high-performance version of the classic MINI Cooper. It\'s known for its powerful turbocharged engine, sporty design, and agile handling. The JCW model offers an exhilarating driving experience and a unique appearance, making it a top choice for those who desire a high-performance and stylish compact car.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 280, 'Petrol', 2019, 5, 'Terengganu', '31,280 KM', 'mini-cooperjcw(1).jpg', 'mini-cooperjcw(2).jpg', 'mini-cooperjcw(3).jpg', 'mini-cooperjcw(4).jpg', 'mini-cooperjcw(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:28:23', 0, 8),
(40, 'Cooper Countryman', 11, 'PNX 288', 'Hatchback', 'MINI Cooper Countryman is a distinctive subcompact SUV that combines the classic MINI charm with practicality. It features a well-crafted interior, nimble handling, and a more spacious cabin compared to the standard MINI. The Countryman is a versatile and premium choice for those who desire iconic design, a fun driving experience, and a bit more room for passengers and cargo.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 380, 'Petrol', 2019, 5, 'Penang', '39,280 KM', 'mini-countryman(1).jpg', 'mini-countryman(2).jpg', 'mini-countryman(3).jpg', 'mini-countryman(4).jpg', 'mini-countryman(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:28:51', 0, NULL),
(41, 'Cooper Clubman', 11, 'PPA 288', 'Hatchback', 'MINI Cooper Clubman is a stylish and practical compact car with a distinctive split-rear door design for added cargo access. It offers a well-crafted interior, engaging driving experience, and versatile space, making it a standout choice for those who desire a unique blend of style and functionality in a compact vehicle.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 380, 'Petrol', 2019, 5, 'Penang', '28,280 KM', 'mini-clubman(1).jpg', 'mini-clubman(2).jpg', 'mini-clubman(3).jpg', 'mini-clubman(4).jpg', 'mini-clubman(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:29:37', 0, NULL),
(42, 'Almera', 12, 'SAQ 3418', 'Sedan', 'Nissan Almera is a compact sedan known for its affordability, practicality, and efficient performance. It typically features a small but fuel-efficient engine, making it a cost-effective choice for daily commuting and city driving. The Almera offers a simple and functional interior, often equipped with essential technology features. It\'s a popular option for individuals or small families who are seeking a budget-friendly and reliable compact sedan for everyday transportation.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 88, 'Petrol', 2019, 5, 'Sabah', '98,280 KM', 'almera(1).jpg', 'almera(2).jpg', 'almera(3).jpg', 'almera(4).jpg', 'almera(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:29:54', 0, 13),
(43, 'GTR', 12, 'JJJ 1', 'Sport', 'Nissan GT-R, often referred to as the \"Godzilla,\" is a high-performance sports car renowned for its incredible power, all-wheel-drive system, and track-worthy capabilities. It features a twin-turbocharged V6 engine, known for its exceptional acceleration and handling. The GT-R is celebrated for its precise and responsive driving dynamics, making it a formidable force on both road and track. Inside, it offers a driver-focused cockpit with modern technology, but the focus is primarily on performance and speed. The Nissan GT-R is an icon among sports cars, famous for its blistering performance and legendary status in the automotive world.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 1088, 'Petrol', 2019, 2, 'Johor', '46,280 KM', 'gtr(1).jpg', 'gtr(2).jpg', 'gtr(3).jpg', 'gtr(4).jpg', 'gtr(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:30:15', 0, 3),
(44, '208', 13, 'MAQ 2109', 'Hatchback', 'Peugeot 208 is a compact car known for its chic European design, efficient performance, and practicality. It\'s often available with a range of small yet fuel-efficient engines, making it a popular choice for city driving and daily commutes. The 208 offers a well-crafted interior with modern technology features and a comfortable cabin for passengers. It\'s favored for its compact size, agility, and stylish aesthetics, making it an ideal choice for those seeking a small, stylish, and economical car for urban and suburban driving.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 68, 'Petrol', 2019, 5, 'Melaka', '66,280 KM', '208(1).jpg', '208(2).jpg', '208(3).jpg', '208(4).jpg', '208(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:30:37', 0, 4),
(45, '5008', 13, 'ALQ 5008', 'SUV', 'Peugeot 5008 is a midsize SUV from the French automaker known for its practicality, spacious interior, and modern design. It\'s designed to accommodate families and offer versatility for various lifestyles. The 5008 typically features a range of fuel-efficient engines, providing good performance and fuel economy. Inside, it offers a well-appointed cabin with flexible seating options and modern technology features. The Peugeot 5008 is popular among those looking for a comfortable and stylish midsize SUV that prioritizes space and adaptability for passengers and cargo.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 68, 'Petrol', 2019, 5, 'Perak', '46,280 KM', 'peugeot_5008(1).jpg', 'peugeot_5008(2).jpg', 'peugeot_5008(3).jpg', 'peugeot_5008(4).jpg', 'peugeot_5008(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:30:57', 0, 12),
(46, 'Macan', 14, 'PPP 28', 'SUV', 'Porsche Macan is a compact luxury SUV celebrated for its blend of sportiness, practicality, and premium features. It combines Porsche\'s performance DNA with the versatility of an SUV, providing an engaging and dynamic driving experience. The Macan offers a choice of powerful engines, sharp handling, and the renowned Porsche Traction Management (PTM) all-wheel-drive system for exceptional grip. Inside, it features a well-appointed cabin with modern technology and luxurious materials. The Macan is a popular choice for those who want the driving excitement of a Porsche in a more versatile and family-friendly package.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 820, 'Petrol', 2019, 5, 'Penang', '36,280 KM', 'macan(1).jpg', 'macan(2).jpg', 'macan(3).jpg', 'macan(4).jpg', 'macan(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:31:39', 0, NULL),
(47, '911 GTS', 14, 'VM 911', 'Sport', 'Porsche 911 GTS is a high-performance sports car within the legendary 911 lineup. It is designed for enthusiasts seeking a sportier and more powerful 911 model while still retaining everyday drivability. The \"GTS\" badge typically signifies a blend of performance and luxury, offering a more powerful engine and a range of performance-enhancing features compared to the standard 911. The 911 GTS often features a distinctive sporty appearance, advanced technology, and a driver-focused interior. It\'s a top choice for those who want the iconic Porsche 911 experience with an extra dash of power and sportiness.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 988, 'Petrol', 2005, 5, 'Putrajaya', '136,280 KM', '911_GTS(1).jpg', '911_GTS(2).jpg', '911_GTS(3).jpg', '911_GTS(4).jpg', '911_GTS(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:32:00', 0, NULL),
(48, 'XV', 15, 'VM 8761', 'SUV', ' Subaru XV, also known as the Subaru Crosstrek in some markets, is a compact crossover SUV with a strong emphasis on all-terrain capability. It typically features Subaru\'s renowned symmetrical all-wheel drive system, providing surefootedness in various road conditions. The XV combines the practicality of a compact SUV with the ruggedness of a Subaru, making it a versatile and adventure-ready choice. It offers a comfortable interior with ample cargo space and modern technology features, making it popular among those who seek a compact SUV with off-road capabilities.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 75, 'Petrol', 2018, 5, 'N.Sembilan', '67,280 KM', 'subaru_xv(1).jpg', 'subaru_xv(2).jpg', 'subaru_xv(3).jpg', 'subaru_xv(4).jpg', 'subaru_xv(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:32:17', 0, NULL),
(49, 'BRZ', 15, 'ABB 11', 'Sport', 'Subaru BRZ is a compact sports coupe designed for driving enthusiasts. It is known for its rear-wheel-drive layout and balanced handling, offering an engaging and fun driving experience. The BRZ is typically equipped with a naturally aspirated four-cylinder boxer engine, known for its low center of gravity and responsive power delivery. While it may not be the most powerful sports car, its lightweight design and precise steering make it a popular choice for those who prioritize nimble handling and spirited driving in an affordable package.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 208, 'Petrol', 2013, 5, 'Perak', '167,280 KM', 'BRZ(1).jpg', 'BRZ(2).jpg', 'BRZ(3).jpg', 'BRZ(4).jpg', 'BRZ(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:32:52', 0, 12),
(50, 'Model 3', 16, 'PPQ 10', 'Sedan', 'Tesla Model 3 is an all-electric, compact luxury sedan that has garnered widespread attention for its cutting-edge technology and eco-friendly performance. Known for its sleek design, the Model 3 offers impressive electric range, rapid acceleration, and advanced self-driving capabilities through Tesla\'s Autopilot system. With a minimalist interior featuring a large touchscreen display, the Model 3 provides a spacious and high-tech driving experience. It has become a popular choice for those seeking a premium electric vehicle that combines innovation, performance, and sustainable transportation.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 98, 'Electric', 2022, 5, 'Penang', '10,280 KM', 'tesla_model3(1).jpg', 'tesla_model3(2).jpg', 'tesla_model3(3).jpg', 'tesla_model3(4).jpg', 'tesla_model3(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:33:06', 0, NULL),
(51, 'Vellfire', 17, 'BBB 1000', 'MPV', 'Toyota Vellfire is a premium minivan designed for both comfort and luxury. It\'s particularly popular in Asian markets, including Japan. The Vellfire is known for its spacious and versatile interior, with multiple seating configurations that can accommodate up to seven or eight passengers, depending on the model. It often features high-quality materials, leather seats, and a range of modern amenities, making it a comfortable and stylish choice for family transportation or executive travel. The Vellfire is also equipped with advanced safety and convenience features, further enhancing its appeal as a premium minivan.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 150, 'Petrol', 2013, 5, 'Selangor', '110,280 KM', 'vellfire(1).jpg', 'vellfire(2).jpg', 'vellfire(3).jpg', 'vellfire(4).jpg', 'vellfire(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:33:41', 0, 5),
(52, 'Arteon', 18, 'PQL 8898', 'Coupe', 'Volkswagen Arteon is a midsize luxury sedan known for its sleek and distinctive design, combining elegance with a sporty flair. It offers a range of powerful turbocharged engines, providing a smooth and responsive driving experience. The Arteon boasts a spacious and well-appointed interior, with advanced technology features and premium materials. As a flagship model for Volkswagen, the Arteon represents a blend of style and comfort, making it an attractive choice for those who appreciate both performance and luxury in a midsize sedan.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 300, 'Petrol', 2022, 5, 'Penang', '10,200 KM', 'Arteon(1).jpg', 'Arteon(2).jpg', 'Arteon(3).jpg', 'Arteon(4).jpg', 'Arteon(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:34:16', 0, NULL),
(53, 'Scirocco R', 18, 'CEL 8898', 'Sport', 'Volkswagen Scirocco R is a sporty and compact coupe with a strong emphasis on performance. It typically features a turbocharged engine, sport-tuned suspension, and aggressive styling. The Scirocco R is known for its sharp handling and dynamic driving experience. While it offers a driver-focused ride, it also provides a comfortable interior with room for four passengers, making it a stylish and practical choice for those seeking a sporty coupe that\'s enjoyable to drive.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 108, 'Petrol', 2012, 5, 'Pahang', '110,200 KM', 'scirocco_r(1).jpg', 'scirocco_r(2).jpg', 'scirocco_r(3).jpg', 'scirocco_r(4).jpg', 'scirocco_r(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:34:33', 0, 7),
(54, 'Golf GTI', 18, 'MMD 5548', 'Hatchback', 'Volkswagen Golf GTI is a legendary compact sports hatchback known for its engaging driving dynamics and practicality. With a turbocharged engine, sharp handling, and a sport-tuned suspension, it offers an exhilarating driving experience. The GTI also provides a versatile and spacious interior, making it suitable for daily use. Recognized for its iconic plaid seats and distinctive red stripe on the grille, the Golf GTI is a favorite among enthusiasts who want a blend of performance and everyday functionality in a compact car.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 208, 'Petrol', 2022, 5, 'Melaka', '8,200 KM', 'golf_gti_mk8(1).jpg', 'golf_gti_mk8(2).jpg', 'golf_gti_mk8(3).jpg', 'golf_gti_mk8(4).jpg', 'golf_gti_mk8(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:34:54', 0, 4);
INSERT INTO `vehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `RegNo`, `VehiclesType`, `VehiclesOverview`, `RentalInfo`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Location`, `Mileage`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `Clicks`, `LocationID`) VALUES
(55, 'S90 Hybrid', 19, 'VL 9122', 'Sedan', 'Volvo S90 Hybrid is a luxury sedan that combines Scandinavian design, advanced technology, and eco-friendliness. It features a plug-in hybrid powertrain, pairing a gasoline engine with an electric motor for enhanced fuel efficiency and reduced emissions. The S90 Hybrid offers a spacious and elegant interior, loaded with high-quality materials and innovative safety and tech features. It\'s a top choice for those seeking a luxurious and environmentally conscious driving experience.', 'Free cancellation up to 48 hours before pick-up,\r\nCollision Damage Waiver with RM 3,000 excess,\r\nTheft Protection with RM 3,000 excess,\r\nUnlimited mileage', 120, 'Hybrid', 2018, 5, 'Kuala Lumpur', '58,000 KM', 's90(1).jpg', 's90(2).jpg', 's90(3).jpg', 's90(4).jpg', 's90(5).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-15 19:46:23', '2023-11-10 14:35:11', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BookingNumber` (`BookingNumber`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BookingId` (`BookingId`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
