-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2025 at 03:21 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_x`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
CREATE TABLE IF NOT EXISTS `careers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(500) NOT NULL,
  `jobs` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_name`(250))
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `course_name`, `jobs`) VALUES
(2, 'Bsc PHYSICS', '[\"Data Analyst\", \"Laboratory Technician\", \"Software Developer\", \"Acoustic Consultant\", \"Astrophysicist\", \"Medical Physicist\", \"Meteorologist\", \"Quality Control Analyst\"]'),
(1, 'BCA&AI', '[\"Software Developer\", \"Data Scientist\", \"Machine Learning Engineer\", \"AI Researcher\", \"Web Developer\", \"System Analyst\", \"Data Analyst\", \"Network Administrator\", \"Mobile App Developer\", \"Cybersecurity Analyst\", \"Plant Pathologist\", \"Human Resources Manager\"]'),
(5, 'BSc CHEMISTRY', '[\"Zoologist\", \"Wildlife Biologist\", \"Ecologist\", \"Research Scientist\", \"Animal Behaviorist\", \"Conservationist\", \"Environmental Consultant\", \"Marine Biologist\", \"Animal Care Technician\", \"Veterinary Technician\", \"Geneticist\", \"Science Educator\", \"Laboratory Technician\"]'),
(3, 'Bsc CHEMISTRY', '[\"Chemist\", \"Laboratory Technician\", \"Research Scientist\", \"Pharmaceutical Sales Representative\", \"Environmental Consultant\", \"Quality Control Analyst\", \"Chemical Engineer\", \"Toxicologist\", \"Forensic Scientist\", \"Patent Examiner\"]'),
(9, 'BA Hindi', '[\"Teacher\", \"Translator\", \"Content Writer\", \"Copywriter\", \"Journalist\", \"Editor\", \"Linguist\", \"Public Relations Officer\", \"Scriptwriter\", \"Speech Writer\"]'),
(4, 'Bsc BOTANY', '[\"Botanist\", \"Plant Research Scientist\", \"Horticulturist\", \"Environmental Consultant\", \"Plant Biotechnologist\", \"Agricultural Scientist\", \"Ecologist\", \"Conservation Biologist\", \"Forestry Manager\", \"Plant Breeder\", \"Science Educator\", \"Laboratory Technician\", \"Floriculturist\"]'),
(6, 'Bcom TAXATION', '[\"Tax Consultant\", \"Tax Analyst\", \"Tax Advisor\", \"Corporate Tax Manager\", \"Tax Auditor\", \"Tax Preparer\", \"Financial Analyst\", \"Tax Compliance Officer\", \"Accountant\", \"GST Consultant\", \"Tax Manager\", \"Financial Planner\", \"Internal Auditor\", \"Taxation Manager\", \"Customs Officer\", \"Corporate Accountant\"]'),
(7, 'Bcom CA', '[\"Chartered Accountant\", \"Financial Analyst\", \"Auditor\", \"Tax Consultant\", \"Corporate Finance Manager\", \"Cost Accountant\", \"Management Consultant\", \"Financial Planner\", \"Risk Manager\", \"Forensic Accountant\", \"Internal Auditor\", \"Investment Banker\", \"Accounts Manager\", \"Budget Analyst\", \"Tax Advisor\"]'),
(8, 'BBA', '[\"Business Analyst\", \"Marketing Manager\", \"Sales Manager\", \"Human Resources Manager\", \"Financial Analyst\", \"Operations Manager\", \"Brand Manager\", \"Supply Chain Manager\", \"Project Manager\", \"Retail Manager\", \"Entrepreneur\", \"Management Consultant\", \"Customer Relationship Manager\", \"Product Manager\", \"Event Manager\"]'),
(10, 'BA Malayalam', '[\"Malayalam Teacher\", \"Content Writer\", \"Copywriter\", \"Journalist\", \"Editor\", \"Public Relations Officer\", \"Translator\", \"Linguist\", \"Cultural Event Coordinator\", \"Radio Jockey\", \"Voice Artist\", \"Script Writer\", \"Social Media Manager\", \"TV Anchor/Reporter\", \"News Reporter\"]');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `college_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courses_offered` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `courses_offered`) VALUES
(1, 'Saingits College Of Applied Sciences', '[\"BCA&AI\", \"Bcom TAXATION\", \"BBA\", \"Bcom CA\", \"Bsc PSYCOLOGY\", \"BA COORPERATE ECONOMICS\"]'),
(21, 'Mar Ivanios College, Thiruvananthapuram', '[\"BA English\", \"Bsc BIOTECHNOLOGY\", \"Bcom CA\", \"Msc Biochemistry\"]'),
(19, 'Christ College, Irinjalakuda', '[\"BA Philosophy\", \"Bsc PSYCHOLOGY\", \"Bcom\", \"MA History\"]'),
(18, 'Sacred Heart College, Thevara', '[\"Bsc MATHEMATICS\", \"BCA&AI\", \"BA Journalism\", \"Msc Physics\"]'),
(17, 'Farook College, Kozhikode', '[\"Bsc Computer Science\", \"BA History\", \"BBA\", \"MBA\"]'),
(35, 'Christ jyoti', '[\"BCA&AI\", \"Bcom TAXATION\", \"BBA\", \"Bcom CA\", \"Bsc PSYCOLOGY\", \"BA COORPERATE ECONOMICS\"]'),
(16, 'Government Victoria College, Palakkad', '[\"Bsc ZOOLOGY\", \"B.A. Malayalam\", \"Bcom CA\", \"M.Com\"]'),
(13, 'University College, Thiruvananthapuram', '[\"BA English\", \"Bsc PHYSICS\", \"Bcom TAXATION\"]'),
(22, 'Government Arts and Science College, Kozhikode', '[\"BA Sanskrit\", \"Bsc GEOGRAPHY\", \"Bcom TAXATION\", \"MA Hindi\"]'),
(23, 'Govt. College for Women, Vazhuthacaud, Thiruvananthapuram', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Philosophy\", \"BA Economics\", \"BA History\", \"BA Music\", \"BA Psychology\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bsc Home Science\", \"Bsc Industrial Microbiology\", \"Bsc Statistics\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Hindi\", \"MA Music\"]'),
(24, 'Sree Kerala Varma College, Thrissur', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(25, 'Vimala College, Thrissur', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(26, 'Sree Krishna College, Thrissur', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(27, 'Sree Vyasa NSS College, Vadakkancherry', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(28, 'Trivandrum University College, Thiruvananthapuram', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(29, 'Farook College, Kozhikode', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(30, 'St. Thomas College, Thrissur', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(31, 'NSS College, Ottapalam', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(32, 'Mar Ivanios College, Nalanchira', '[\"BA English\", \"BA Malayalam\", \"BA Hindi\", \"BA Economics\", \"BA History\", \"Bsc PHYSICS\", \"Bsc CHEMISTRY\", \"Bsc BOTANY\", \"Bsc ZOOLOGY\", \"Bcom TAXATION\", \"Bcom CA\", \"MA English\", \"MA Malayalam\", \"MA Economics\", \"MA History\"]'),
(33, 'SB College , Changanaserry', '[\"[\\\"BCA&AI\\\"\", \"\\\"Bcom TAXATION\\\"\", \"\\\"BBA\\\"\", \"\\\"Bsc PSYCOLOGY\\\"\", \"\\\"BA French\\\"\", \"\\\"BA HINDI\\\"\", \"\\\"BA Syriac\\\"\", \"\\\"BA COORPERATE ECONOMICS\\\"\", \"\\\"Bsc ZOOLOGY\\\"\", \"\\\"Bsc PHYSICS\\\"\", \"\\\"Bsc MATHEMATICS\\\"\", \"\\\" Bsc Industrial Microbiology \\\"\", \"\\\"Bsc BOTANY\\\"\", \"\\\"Bsc CHEMISTRY\\\"\", \"\\\" Bsc Biochemistry\\\"\", \"\\\"Bsc BIOTECHNOLOGY\\\"]\"]'),
(34, 'SB College , Changanaserry', '[\"[\\\"BCA&AI\\\"\", \"\\\"Bcom TAXATION\\\"\", \"\\\"BBA\\\"\", \"\\\"Bsc PSYCOLOGY\\\"\", \"\\\"BA French\\\"\", \"\\\"BA HINDI\\\"\", \"\\\"BA Syriac\\\"\", \"\\\"BA COORPERATE ECONOMICS\\\"\", \"\\\"Bsc ZOOLOGY\\\"\", \"\\\"Bsc PHYSICS\\\"\", \"\\\"Bsc MATHEMATICS\\\"\", \"\\\" Bsc Industrial Microbiology \\\"\", \"\\\"Bsc BOTANY\\\"\", \"\\\"Bsc CHEMISTRY\\\"\", \"\\\" Bsc Biochemistry\\\"\", \"\\\"Bsc BIOTECHNOLOGY\\\"]\"]');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `subjects` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `subjects`) VALUES
(2, 'Bsc PHYSICS', '[\"PHYSICS\", \"CHEMISTRY\", \"BIOLOGY\", \"MATHEMATICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"TAMIL\", \"ARABIC\"]'),
(3, 'Bsc CHEMISTRY', '[\"PHYSICS\", \"CHEMISTRY\", \"MATHEMATICS\", \"BIOLOGY\", \"HINDI\", \"MALAYALM\", \"ENGLISH\"]'),
(4, 'Bsc BOTANY', '[\"PHYSICS\", \"CHEMISTRY\", \"BIOLOGY\", \"MATHEMATICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"TAMIL\", \"ARABIC\"]'),
(5, 'Bsc ZOOLOGY', '[\"PHYSICS\", \"CHEMISTRY\", \"BIOLOGY\", \"MATHEMATICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"TAMIL\", \"ARABIC\"]'),
(6, 'Bcom TAXATION', '[\"ACCOUNTANY\", \"BUSSINESS STUDIES\", \"ECONOMICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"ARABIC\"]'),
(7, 'Bcom CA', '[\"ACCOUNTANY\", \"BUSSINESS STUDIES\", \"ECONOMICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"ARABIC\", \"COMPUTER SCIENCE\"]'),
(8, 'BBA', '[\"ACCOUNTANY\", \"BUSSINESS STUDIES\", \"ECONOMICS\", \"ENGLISH\", \"HINDI\", \"MALAYALAM\", \"URDU\", \"ARABIC\"]'),
(9, 'BA Hindi', '[\"HINDI\", \"BIOLOGY\", \"CHEMISTRY\", \"PHYSICS\", \"MATHEMATICS\"]'),
(10, 'BA Malayalam', '[\"MALAYALAM\", \"BIOLOGY\", \"CHEMISTRY\", \"PHYSICS\", \"MATHEMATICS\", \"COMPUTER SCIENCE\", \"ENGLISH\"]');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

DROP TABLE IF EXISTS `syllabus`;
CREATE TABLE IF NOT EXISTS `syllabus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `semester` int NOT NULL,
  `topic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_name` (`course_name`(250))
) ENGINE=MyISAM AUTO_INCREMENT=473 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `course_name`, `semester`, `topic`) VALUES
(114, 'Bsc CHEMISTRY', 3, 'Chemical Kinetics'),
(113, 'Bsc CHEMISTRY', 3, 'Spectroscopy'),
(112, 'Bsc CHEMISTRY', 3, 'Polymer Chemistry'),
(111, 'Bsc CHEMISTRY', 3, 'Coordination Chemistry'),
(110, 'Bsc CHEMISTRY', 3, 'Biochemistry'),
(109, 'Bsc CHEMISTRY', 2, 'Quantum Chemistry'),
(108, 'Bsc CHEMISTRY', 2, 'Chemical Thermodynamics'),
(107, 'Bsc CHEMISTRY', 2, 'Analytical Chemistry'),
(106, 'Bsc CHEMISTRY', 2, 'Physical Chemistry'),
(105, 'Bsc CHEMISTRY', 2, 'Organic Chemistry'),
(104, 'Bsc CHEMISTRY', 1, 'Environmental Science'),
(103, 'Bsc CHEMISTRY', 1, 'Inorganic Chemistry'),
(102, 'Bsc CHEMISTRY', 1, 'Physics for Chemistry'),
(101, 'Bsc CHEMISTRY', 1, 'Mathematics for Chemistry'),
(100, 'Bsc CHEMISTRY', 1, 'General Chemistry'),
(99, 'BCA&AI', 6, 'Professional Skills Development'),
(98, 'BCA&AI', 6, 'Technical Writing'),
(97, 'BCA&AI', 6, 'Industry Internship'),
(96, 'BCA&AI', 6, 'Final Year Project'),
(95, 'BCA&AI', 6, 'Emerging Technologies'),
(94, 'BCA&AI', 5, 'Project Work'),
(93, 'BCA&AI', 5, 'Cyber Security'),
(92, 'BCA&AI', 5, 'Internet of Things'),
(91, 'BCA&AI', 5, 'Data Mining'),
(90, 'BCA&AI', 5, 'Big Data Analytics'),
(89, 'BCA&AI', 4, 'Ethics in IT'),
(88, 'BCA&AI', 4, 'Human-Computer Interaction'),
(87, 'BCA&AI', 4, 'Cloud Computing'),
(86, 'BCA&AI', 4, 'Machine Learning'),
(85, 'BCA&AI', 4, 'Mobile Application Development'),
(84, 'BCA&AI', 3, 'Artificial Intelligence'),
(83, 'BCA&AI', 3, 'Computer Networks'),
(82, 'BCA&AI', 3, 'Web Technologies'),
(81, 'BCA&AI', 3, 'Software Engineering'),
(80, 'BCA&AI', 3, 'Operating Systems'),
(79, 'BCA&AI', 2, 'Computer Organization'),
(78, 'BCA&AI', 2, 'Database Management Systems'),
(77, 'BCA&AI', 2, 'Discrete Mathematics'),
(76, 'BCA&AI', 2, 'Object-Oriented Programming'),
(75, 'BCA&AI', 2, 'Data Structures'),
(74, 'BCA&AI', 1, 'English Communication Skills'),
(73, 'BCA&AI', 1, 'Digital Logic Design'),
(72, 'BCA&AI', 1, 'Mathematics for Computing'),
(71, 'BCA&AI', 1, 'Programming Fundamentals'),
(70, 'BCA&AI', 1, 'Introduction to Computer Science'),
(115, 'Bsc CHEMISTRY', 4, 'Pharmaceutical Chemistry'),
(116, 'Bsc CHEMISTRY', 4, 'Materials Science'),
(117, 'Bsc CHEMISTRY', 4, 'Green Chemistry'),
(118, 'Bsc CHEMISTRY', 4, 'Electrochemistry'),
(119, 'Bsc CHEMISTRY', 4, 'Chemical Research Methodology'),
(120, 'Bsc CHEMISTRY', 5, 'Industrial Chemistry'),
(121, 'Bsc CHEMISTRY', 5, 'Advanced Organic Chemistry'),
(122, 'Bsc CHEMISTRY', 5, 'Nuclear Chemistry'),
(123, 'Bsc CHEMISTRY', 5, 'Advanced Inorganic Chemistry'),
(124, 'Bsc CHEMISTRY', 5, 'Project Work'),
(125, 'Bsc CHEMISTRY', 6, 'Research Project'),
(126, 'Bsc CHEMISTRY', 6, 'Chemistry Education'),
(127, 'Bsc CHEMISTRY', 6, 'Advanced Analytical Techniques'),
(128, 'Bsc CHEMISTRY', 6, 'Chemical Informatics'),
(129, 'Bsc CHEMISTRY', 6, 'Professional Skills Development'),
(130, 'Bsc PHYSICS', 1, 'Classical Mechanics'),
(131, 'Bsc PHYSICS', 1, 'Mathematics for Physicists'),
(132, 'Bsc PHYSICS', 1, 'Thermodynamics and Statistical Mechanics'),
(133, 'Bsc PHYSICS', 1, 'Waves and Oscillations'),
(134, 'Bsc PHYSICS', 1, 'Experimental Physics'),
(135, 'Bsc PHYSICS', 2, 'Electromagnetism'),
(136, 'Bsc PHYSICS', 2, 'Optics'),
(137, 'Bsc PHYSICS', 2, 'Modern Physics'),
(138, 'Bsc PHYSICS', 2, 'Quantum Mechanics'),
(139, 'Bsc PHYSICS', 2, 'Computer Programming for Physicists'),
(140, 'Bsc PHYSICS', 3, 'Solid State Physics'),
(141, 'Bsc PHYSICS', 3, 'Nuclear Physics'),
(142, 'Bsc PHYSICS', 3, 'Thermal Physics'),
(143, 'Bsc PHYSICS', 3, 'Astrophysics'),
(144, 'Bsc PHYSICS', 3, 'Physics Lab'),
(145, 'Bsc PHYSICS', 4, 'Quantum Mechanics II'),
(146, 'Bsc PHYSICS', 4, 'Electronics'),
(147, 'Bsc PHYSICS', 4, 'Relativity'),
(148, 'Bsc PHYSICS', 4, 'Experimental Techniques in Physics'),
(149, 'Bsc PHYSICS', 4, 'Research Methodology'),
(150, 'Bsc PHYSICS', 5, 'Advanced Quantum Mechanics'),
(151, 'Bsc PHYSICS', 5, 'Particle Physics'),
(152, 'Bsc PHYSICS', 5, 'Condensed Matter Physics'),
(153, 'Bsc PHYSICS', 5, 'Plasma Physics'),
(154, 'Bsc PHYSICS', 5, 'Project Work'),
(155, 'Bsc PHYSICS', 6, 'Research Project'),
(156, 'Bsc PHYSICS', 6, 'Biophysics'),
(157, 'Bsc PHYSICS', 6, 'Nanotechnology'),
(158, 'Bsc PHYSICS', 6, 'Computational Physics'),
(159, 'Bsc PHYSICS', 6, 'Professional Skills Development'),
(160, 'Bsc BOTANY', 1, 'Introduction to Botany'),
(161, 'Bsc BOTANY', 1, 'Plant Anatomy and Morphology'),
(162, 'Bsc BOTANY', 1, 'Plant Physiology'),
(163, 'Bsc BOTANY', 1, 'Cell Biology'),
(164, 'Bsc BOTANY', 1, 'Taxonomy of Angiosperms'),
(165, 'Bsc BOTANY', 2, 'Microbiology'),
(166, 'Bsc BOTANY', 2, 'Plant Ecology'),
(167, 'Bsc BOTANY', 2, 'Plant Genetics'),
(168, 'Bsc BOTANY', 2, 'Ethnobotany'),
(169, 'Bsc BOTANY', 2, 'Biotechnology in Botany'),
(170, 'Bsc BOTANY', 3, 'Plant Development and Physiology'),
(171, 'Bsc BOTANY', 3, 'Plant Pathology'),
(172, 'Bsc BOTANY', 3, 'Economic Botany'),
(173, 'Bsc BOTANY', 3, 'Horticulture'),
(174, 'Bsc BOTANY', 3, 'Plant Biochemistry'),
(175, 'Bsc BOTANY', 4, 'Plant Ecology and Conservation'),
(176, 'Bsc BOTANY', 4, 'Plant Systematics'),
(177, 'Bsc BOTANY', 4, 'Molecular Biology of Plants'),
(178, 'Bsc BOTANY', 4, 'Field Botany'),
(179, 'Bsc BOTANY', 4, 'Research Methodology in Botany'),
(180, 'Bsc BOTANY', 5, 'Plant Physiology II'),
(181, 'Bsc BOTANY', 5, 'Environmental Botany'),
(182, 'Bsc BOTANY', 5, 'Plant Molecular Genetics'),
(183, 'Bsc BOTANY', 5, 'Plant Biotechnology'),
(184, 'Bsc BOTANY', 5, 'Project Work'),
(185, 'Bsc BOTANY', 6, 'Research Project'),
(186, 'Bsc BOTANY', 6, 'Plant Conservation and Management'),
(187, 'Bsc BOTANY', 6, 'Agricultural Botany'),
(188, 'Bsc BOTANY', 6, 'Industrial Botany'),
(189, 'Bsc BOTANY', 6, 'Professional Skills Development'),
(239, 'Bsc ZOOLOGY', 4, 'Field Studies'),
(238, 'Bsc ZOOLOGY', 4, 'Wildlife Conservation'),
(237, 'Bsc ZOOLOGY', 4, 'Aquatic Biology'),
(236, 'Bsc ZOOLOGY', 4, 'Developmental Zoology'),
(235, 'Bsc ZOOLOGY', 4, 'Parasitology'),
(234, 'Bsc ZOOLOGY', 3, 'Research Methodology in Zoology'),
(233, 'Bsc ZOOLOGY', 3, 'Comparative Anatomy'),
(232, 'Bsc ZOOLOGY', 3, 'Genetics and Evolution'),
(231, 'Bsc ZOOLOGY', 3, 'Vertebrate Physiology'),
(230, 'Bsc ZOOLOGY', 3, 'Entomology'),
(229, 'Bsc ZOOLOGY', 2, 'Ecology and Environmental Biology'),
(228, 'Bsc ZOOLOGY', 2, 'Animal Behavior'),
(227, 'Bsc ZOOLOGY', 2, 'Animal Physiology'),
(226, 'Bsc ZOOLOGY', 2, 'Chordate Zoology'),
(225, 'Bsc ZOOLOGY', 2, 'Invertebrate Zoology'),
(224, 'Bsc ZOOLOGY', 1, 'Developmental Biology'),
(223, 'Bsc ZOOLOGY', 1, 'Basic Biochemistry'),
(222, 'Bsc ZOOLOGY', 1, 'Cell Biology and Genetics'),
(221, 'Bsc ZOOLOGY', 1, 'Animal Diversity'),
(220, 'Bsc ZOOLOGY', 1, 'Introduction to Zoology'),
(240, 'Bsc ZOOLOGY', 5, 'Molecular Biology'),
(241, 'Bsc ZOOLOGY', 5, 'Animal Physiology II'),
(242, 'Bsc ZOOLOGY', 5, 'Zoological Techniques'),
(243, 'Bsc ZOOLOGY', 5, 'Project Work'),
(244, 'Bsc ZOOLOGY', 5, 'Elective Course'),
(245, 'Bsc ZOOLOGY', 6, 'Research Project'),
(246, 'Bsc ZOOLOGY', 6, 'Biodiversity and Conservation'),
(247, 'Bsc ZOOLOGY', 6, 'Clinical Zoology'),
(248, 'Bsc ZOOLOGY', 6, 'Industrial Zoology'),
(249, 'Bsc ZOOLOGY', 6, 'Professional Skills Development'),
(250, 'Bcom TAXATION', 1, 'Principles of Management'),
(251, 'Bcom TAXATION', 1, 'Financial Accounting'),
(252, 'Bcom TAXATION', 1, 'Business Communication'),
(253, 'Bcom TAXATION', 1, 'Business Law'),
(254, 'Bcom TAXATION', 1, 'Micro Economics'),
(255, 'Bcom TAXATION', 2, 'Cost Accounting'),
(256, 'Bcom TAXATION', 2, 'Corporate Accounting'),
(257, 'Bcom TAXATION', 2, 'Taxation I'),
(258, 'Bcom TAXATION', 2, 'Environmental Studies'),
(259, 'Bcom TAXATION', 2, 'Business Mathematics'),
(260, 'Bcom TAXATION', 3, 'Income Tax Law and Practice'),
(261, 'Bcom TAXATION', 3, 'Goods and Services Tax (GST)'),
(262, 'Bcom TAXATION', 3, 'Tax Planning and Management'),
(263, 'Bcom TAXATION', 3, 'Accounting Standards'),
(264, 'Bcom TAXATION', 3, 'Business Statistics'),
(265, 'Bcom TAXATION', 4, 'Corporate Taxation'),
(266, 'Bcom TAXATION', 4, 'International Taxation'),
(267, 'Bcom TAXATION', 4, 'Tax Audit'),
(268, 'Bcom TAXATION', 4, 'Financial Management'),
(269, 'Bcom TAXATION', 4, 'Research Methodology'),
(270, 'Bcom TAXATION', 5, 'Indirect Tax Laws'),
(271, 'Bcom TAXATION', 5, 'Transfer Pricing'),
(272, 'Bcom TAXATION', 5, 'Taxation of Firms and Companies'),
(273, 'Bcom TAXATION', 5, 'Dispute Resolution in Taxation'),
(274, 'Bcom TAXATION', 5, 'Elective Course'),
(275, 'Bcom TAXATION', 6, 'Project Work'),
(276, 'Bcom TAXATION', 6, 'Tax Consultancy Practice'),
(277, 'Bcom TAXATION', 6, 'Recent Developments in Taxation'),
(278, 'Bcom TAXATION', 6, 'Professional Skills Development'),
(279, 'Bcom TAXATION', 6, 'Comprehensive Tax Assessment'),
(280, 'Bcom CA', 1, 'Principles of Management'),
(281, 'Bcom CA', 1, 'Financial Accounting'),
(282, 'Bcom CA', 1, 'Business Communication'),
(283, 'Bcom CA', 1, 'Business Law'),
(284, 'Bcom CA', 1, 'Micro Economics'),
(285, 'Bcom CA', 2, 'Cost Accounting'),
(286, 'Bcom CA', 2, 'Corporate Accounting'),
(287, 'Bcom CA', 2, 'Management Accounting'),
(288, 'Bcom CA', 2, 'Mathematics for Business'),
(289, 'Bcom CA', 2, 'Business Environment'),
(290, 'Bcom CA', 3, 'Income Tax Law'),
(291, 'Bcom CA', 3, 'Financial Management'),
(292, 'Bcom CA', 3, 'Advanced Accounting'),
(293, 'Bcom CA', 3, 'Statistics for Business'),
(294, 'Bcom CA', 3, 'Business Ethics'),
(295, 'Bcom CA', 4, 'Company Law'),
(296, 'Bcom CA', 4, 'Auditing'),
(297, 'Bcom CA', 4, 'Cost Management'),
(298, 'Bcom CA', 4, 'Information Technology in Business'),
(299, 'Bcom CA', 4, 'Research Methodology'),
(300, 'Bcom CA', 5, 'Direct Taxation'),
(301, 'Bcom CA', 5, 'Indirect Taxation'),
(302, 'Bcom CA', 5, 'Corporate Governance'),
(303, 'Bcom CA', 5, 'Financial Reporting'),
(304, 'Bcom CA', 5, 'Elective Course'),
(305, 'Bcom CA', 6, 'Project Work'),
(306, 'Bcom CA', 6, 'Internship in CA Firm'),
(307, 'Bcom CA', 6, 'Recent Developments in Accounting'),
(308, 'Bcom CA', 6, 'Advanced Taxation'),
(309, 'Bcom CA', 6, 'Strategic Management'),
(310, 'BBA', 1, 'Principles of Management'),
(311, 'BBA', 1, 'Business Communication'),
(312, 'BBA', 1, 'Introduction to Business'),
(313, 'BBA', 1, 'Business Mathematics'),
(314, 'BBA', 1, 'Business Economics'),
(315, 'BBA', 2, 'Organizational Behavior'),
(316, 'BBA', 2, 'Financial Accounting'),
(317, 'BBA', 2, 'Business Law'),
(318, 'BBA', 2, 'Marketing Management'),
(319, 'BBA', 2, 'Human Resource Management'),
(320, 'BBA', 3, 'Management Accounting'),
(321, 'BBA', 3, 'Operations Management'),
(322, 'BBA', 3, 'Financial Management'),
(323, 'BBA', 3, 'Research Methodology'),
(324, 'BBA', 3, 'Elective Course'),
(325, 'BBA', 4, 'Strategic Management'),
(326, 'BBA', 4, 'International Business'),
(327, 'BBA', 4, 'Project Management'),
(328, 'BBA', 4, 'Corporate Finance'),
(329, 'BBA', 4, 'Consumer Behavior'),
(330, 'BBA', 5, 'Digital Marketing'),
(331, 'BBA', 5, 'Supply Chain Management'),
(332, 'BBA', 5, 'Entrepreneurship Development'),
(333, 'BBA', 5, 'Business Ethics'),
(334, 'BBA', 5, 'Elective Course'),
(335, 'BBA', 6, 'Final Project'),
(336, 'BBA', 6, 'Internship'),
(337, 'BBA', 6, 'Business Analytics'),
(338, 'BBA', 6, 'Leadership Development'),
(339, 'BBA', 6, 'Recent Trends in Business'),
(340, 'Bsc PHYSICS', 1, 'Mechanics'),
(341, 'Bsc PHYSICS', 1, 'Properties of Matter'),
(342, 'Bsc PHYSICS', 1, 'Thermodynamics'),
(343, 'Bsc PHYSICS', 1, 'Oscillations and Waves'),
(344, 'Bsc PHYSICS', 1, 'Gravitation'),
(345, 'Bsc PHYSICS', 2, 'Electricity and Magnetism'),
(346, 'Bsc PHYSICS', 2, 'Electrostatics'),
(347, 'Bsc PHYSICS', 2, 'Magnetic Fields and Magnetism'),
(348, 'Bsc PHYSICS', 2, 'Magnetic Properties of Matter'),
(349, 'Bsc PHYSICS', 2, 'Current Electricity'),
(350, 'Bsc PHYSICS', 3, 'Optics'),
(351, 'Bsc PHYSICS', 3, 'Wave Optics'),
(352, 'Bsc PHYSICS', 3, 'Geometrical Optics'),
(353, 'Bsc PHYSICS', 3, 'Electromagnetic Theory'),
(354, 'Bsc PHYSICS', 3, 'Interference and Diffraction'),
(355, 'Bsc PHYSICS', 4, 'Quantum Mechanics'),
(356, 'Bsc PHYSICS', 4, 'Modern Physics'),
(357, 'Bsc PHYSICS', 4, 'Solid State Physics'),
(358, 'Bsc PHYSICS', 4, 'Atomic and Molecular Physics'),
(359, 'Bsc PHYSICS', 4, 'Nuclear Physics'),
(360, 'Bsc PHYSICS', 5, 'Electronics'),
(361, 'Bsc PHYSICS', 5, 'Digital Electronics'),
(362, 'Bsc PHYSICS', 5, 'Electromagnetic Waves'),
(363, 'Bsc PHYSICS', 5, 'Spectroscopy'),
(364, 'Bsc PHYSICS', 5, 'Astrophysics'),
(365, 'Bsc PHYSICS', 6, 'Computational Physics'),
(366, 'Bsc PHYSICS', 6, 'Nanomaterials and Nanotechnology'),
(367, 'Bsc PHYSICS', 6, 'Instrumentation and Control Systems'),
(368, 'Bsc PHYSICS', 6, 'General Theory of Relativity'),
(369, 'Bsc ZOOLOGY', 1, 'Animal Diversity I'),
(370, 'Bsc ZOOLOGY', 1, 'Animal Diversity II'),
(371, 'Bsc ZOOLOGY', 1, 'Non-Chordates - I'),
(372, 'Bsc ZOOLOGY', 1, 'Non-Chordates - II'),
(373, 'Bsc ZOOLOGY', 1, 'Cell Biology and Genetics'),
(374, 'Bsc ZOOLOGY', 2, 'Chordates'),
(375, 'Bsc ZOOLOGY', 2, 'Developmental Biology'),
(376, 'Bsc ZOOLOGY', 2, 'Ecology and Environmental Biology'),
(377, 'Bsc ZOOLOGY', 2, 'Evolutionary Biology'),
(378, 'Bsc ZOOLOGY', 2, 'Biochemistry and Biomolecules'),
(379, 'Bsc ZOOLOGY', 3, 'Physiology of Animals'),
(380, 'Bsc ZOOLOGY', 3, 'Endocrinology'),
(381, 'Bsc ZOOLOGY', 3, 'Immunology'),
(382, 'Bsc ZOOLOGY', 3, 'Animal Behaviour'),
(383, 'Bsc ZOOLOGY', 3, 'Bioinformatics'),
(384, 'Bsc ZOOLOGY', 4, 'Biotechnology and Genetic Engineering'),
(385, 'Bsc ZOOLOGY', 4, 'Cell and Molecular Biology'),
(386, 'Bsc ZOOLOGY', 4, 'Microbiology and Parasitology'),
(387, 'Bsc ZOOLOGY', 4, 'Comparative Anatomy of Vertebrates'),
(388, 'Bsc ZOOLOGY', 5, 'Wildlife Conservation and Management'),
(389, 'Bsc ZOOLOGY', 5, 'Entomology'),
(390, 'Bsc ZOOLOGY', 5, 'Aquaculture and Fisheries Science'),
(391, 'Bsc ZOOLOGY', 5, 'Human Physiology'),
(392, 'Bsc ZOOLOGY', 5, 'Zoology of Economic Importance'),
(393, 'Bsc ZOOLOGY', 6, 'Evolutionary Genetics'),
(394, 'Bsc ZOOLOGY', 6, 'Biostatistics'),
(395, 'Bsc ZOOLOGY', 6, 'Research Methodology and Experimental Techniques'),
(396, 'Bsc ZOOLOGY', 6, 'Applied Zoology'),
(397, 'Bsc PHYSICS', 1, 'Mechanics'),
(398, 'Bsc PHYSICS', 1, 'Properties of Matter'),
(399, 'Bsc PHYSICS', 1, 'Thermodynamics'),
(400, 'Bsc PHYSICS', 1, 'Oscillations and Waves'),
(401, 'Bsc PHYSICS', 1, 'Gravitation'),
(402, 'Bsc PHYSICS', 2, 'Electricity and Magnetism'),
(403, 'Bsc PHYSICS', 2, 'Electrostatics'),
(404, 'Bsc PHYSICS', 2, 'Magnetic Fields and Magnetism'),
(405, 'Bsc PHYSICS', 2, 'Magnetic Properties of Matter'),
(406, 'Bsc PHYSICS', 2, 'Current Electricity'),
(407, 'Bsc PHYSICS', 3, 'Optics'),
(408, 'Bsc PHYSICS', 3, 'Wave Optics'),
(409, 'Bsc PHYSICS', 3, 'Geometrical Optics'),
(410, 'Bsc PHYSICS', 3, 'Electromagnetic Theory'),
(411, 'Bsc PHYSICS', 3, 'Interference and Diffraction'),
(412, 'Bsc PHYSICS', 4, 'Quantum Mechanics'),
(413, 'Bsc PHYSICS', 4, 'Modern Physics'),
(414, 'Bsc PHYSICS', 4, 'Solid State Physics'),
(415, 'Bsc PHYSICS', 4, 'Atomic and Molecular Physics'),
(416, 'Bsc PHYSICS', 4, 'Nuclear Physics'),
(417, 'Bsc PHYSICS', 5, 'Electronics'),
(418, 'Bsc PHYSICS', 5, 'Digital Electronics'),
(419, 'Bsc PHYSICS', 5, 'Electromagnetic Waves'),
(420, 'Bsc PHYSICS', 5, 'Spectroscopy'),
(421, 'Bsc PHYSICS', 5, 'Astrophysics'),
(422, 'Bsc PHYSICS', 6, 'Computational Physics'),
(423, 'Bsc PHYSICS', 6, 'Nanomaterials and Nanotechnology'),
(424, 'Bsc PHYSICS', 6, 'Instrumentation and Control Systems'),
(425, 'Bsc PHYSICS', 6, 'General Theory of Relativity'),
(426, 'BA Hindi', 1, 'Hindi Language and Literature'),
(427, 'BA Hindi', 1, 'History of Hindi Literature'),
(428, 'BA Hindi', 1, 'Prose and Poetry in Hindi'),
(429, 'BA Hindi', 1, 'Introduction to Hindi Grammar'),
(430, 'BA Hindi', 2, 'Hindi Fiction'),
(431, 'BA Hindi', 2, 'Poetry in Hindi'),
(432, 'BA Hindi', 2, 'Hindi Literary Criticism'),
(433, 'BA Hindi', 2, 'Introduction to Hindi Linguistics'),
(434, 'BA Hindi', 3, 'Modern Hindi Literature'),
(435, 'BA Hindi', 3, 'Hindi Poetry and Drama'),
(436, 'BA Hindi', 3, 'Hindi Short Story'),
(437, 'BA Hindi', 3, 'Translation and its Techniques'),
(438, 'BA Hindi', 4, 'Applied Hindi'),
(439, 'BA Hindi', 4, 'Language and Culture of Hindi-Speaking Regions'),
(440, 'BA Hindi', 4, 'Hindi Film Studies'),
(441, 'BA Hindi', 4, 'Research Methodology in Hindi Literature'),
(442, 'BA Hindi', 5, 'Advanced Hindi Literature'),
(443, 'BA Hindi', 5, 'Folk Literature in Hindi'),
(444, 'BA Hindi', 5, 'Comparative Literature'),
(445, 'BA Hindi', 5, 'Development of Hindi Language and Script'),
(446, 'BA Hindi', 6, 'Literary Criticism in Hindi'),
(447, 'BA Hindi', 6, 'Post-Colonial Hindi Literature'),
(448, 'BA Hindi', 6, 'Hindi Journalism and Mass Media'),
(449, 'BA Hindi', 6, 'Dissertation/Project in Hindi Literature'),
(450, 'BA Malayalam', 1, 'Introduction to Malayalam Literature'),
(451, 'BA Malayalam', 1, 'History of Malayalam Literature'),
(452, 'BA Malayalam', 1, 'Poetry in Malayalam'),
(453, 'BA Malayalam', 1, 'Introduction to Malayalam Grammar'),
(454, 'BA Malayalam', 2, 'Prose in Malayalam'),
(455, 'BA Malayalam', 2, 'Fiction and Drama in Malayalam'),
(456, 'BA Malayalam', 2, 'Introduction to Malayalam Linguistics'),
(457, 'BA Malayalam', 2, 'Malayalam Language and Society'),
(458, 'BA Malayalam', 3, 'Modern Malayalam Literature'),
(459, 'BA Malayalam', 3, 'Malayalam Poetry and Short Stories'),
(460, 'BA Malayalam', 3, 'Malayalam Literary Criticism'),
(461, 'BA Malayalam', 3, 'Translation in Malayalam Literature'),
(462, 'BA Malayalam', 4, 'Folk Literature in Malayalam'),
(463, 'BA Malayalam', 4, 'Film Studies and Malayalam Cinema'),
(464, 'BA Malayalam', 4, 'Language and Culture of Malayalam-Speaking Regions'),
(465, 'BA Malayalam', 4, 'Research Methodology in Malayalam Literature'),
(466, 'BA Malayalam', 5, 'Contemporary Malayalam Literature'),
(467, 'BA Malayalam', 5, 'Malayalam Literary Movements'),
(468, 'BA Malayalam', 5, 'Comparative Literature in Malayalam'),
(469, 'BA Malayalam', 5, 'Advanced Malayalam Poetry'),
(470, 'BA Malayalam', 6, 'Literary Criticism and Theory in Malayalam'),
(471, 'BA Malayalam', 6, 'Post-Colonial Malayalam Literature'),
(472, 'BA Malayalam', 6, 'Dissertation/Project in Malayalam Literature');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_personal`
--

DROP TABLE IF EXISTS `user_personal`;
CREATE TABLE IF NOT EXISTS `user_personal` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `ambition` varchar(255) DEFAULT NULL,
  `sex` enum('male','female','other') DEFAULT NULL,
  `board` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
