-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2024 at 08:23 PM
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
-- Database: `polarisrms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_mtd_cases` ()   BEGIN
    SELECT cases_offense_lu.offense, COUNT(*) AS total_count
	FROM cases_offense_lu
	JOIN cases ON cases.offense = cases_offense_lu.cases_offense_id
	WHERE cases.creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW()
	GROUP BY cases_offense_lu.offense
    ORDER BY total_count DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_mtd_cases_by_agency` ()   BEGIN
SELECT ua.agency, COUNT(c.cases_id) AS total_cases
FROM users_agency_lu ua
JOIN users u ON ua.users_agency_id = u.agency
LEFT JOIN cases c ON u.users_id = c.owner
WHERE c.creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW()
GROUP BY ua.users_agency_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_mtd_devices` ()   BEGIN
    SELECT evidence_type_lu.type, COUNT(*) AS total_count
	FROM evidence AS e
	JOIN cases AS c ON e.associated_case = c.cases_id
    JOIN evidence_type_lu ON e.evidence_type = evidence_type_lu.evidence_type_id
	WHERE c.creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW()
	GROUP BY evidence_type_lu.type
    ORDER BY total_count DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_ytd_cases` ()   BEGIN
    SELECT cases_offense_lu.offense, COUNT(*) AS total_count
	FROM cases_offense_lu
	JOIN cases ON cases.offense = cases_offense_lu.cases_offense_id
	WHERE YEAR(cases.creation_date) = YEAR(NOW())
    GROUP BY cases_offense_lu.offense
    ORDER BY total_count DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_ytd_cases_by_agency` ()   BEGIN
SELECT ua.agency, COUNT(c.cases_id) AS total_cases
FROM users_agency_lu ua
JOIN users u ON ua.users_agency_id = u.agency
LEFT JOIN cases c ON u.users_id = c.owner
WHERE YEAR(c.creation_date) = YEAR(NOW())

GROUP BY ua.users_agency_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_ytd_devices` ()   BEGIN
    SELECT evidence_type_lu.type, COUNT(*) AS total_count
	FROM evidence AS e
	JOIN cases AS c ON e.associated_case = c.cases_id
    JOIN evidence_type_lu ON e.evidence_type = evidence_type_lu.evidence_type_id
	WHERE YEAR(c.creation_date) = YEAR(NOW())
	GROUP BY evidence_type_lu.type
    ORDER BY total_count DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Case` (IN `paramId` INT)   BEGIN
DECLARE valCaseId INT;
SET valCaseId = paramId;

DELETE FROM evidence 
WHERE evidence.associated_case = valCaseId;
DELETE FROM cases
WHERE cases.cases_id = valCaseId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_cases` ()   BEGIN
SELECT
	cases_id,
    dr,
    owner,
    examiner,
    authority,
    sw_number,
    offense,
    narrative,
    DATE_FORMAT(creation_date, "%m-%d-%Y") as 'creation_date',
    DATE_FORMAT(in_progress_date, "%m-%d-%Y") as 'in_progress_date',
    DATE_FORMAT(completed_date, "%m-%d-%Y")as 'completed_date',
    status
FROM 
	cases;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_investigator_cases` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	cases_id,
    dr,
    owner,
    examiner,
    authority,
    sw_number,
    offense,
    narrative,
    DATE_FORMAT(creation_date, "%m-%d-%Y") as 'creation_date',
    DATE_FORMAT(in_progress_date, "%m-%d-%Y") as 'in_progress_date',
    DATE_FORMAT(completed_date, "%m-%d-%Y")as 'completed_date',
    status
FROM 
	cases
WHERE
	cases.owner = valUserId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_users` (IN `paramFrom` INT, IN `paramTo` INT, IN `paramId` INT)   BEGIN
DECLARE valFrom INT;
DECLARE valTo INT;
DECLARE valId INT;
SET valFrom = paramFrom;
SET valTo = paramTo;
SET valId = paramID;

SELECT users.users_id,
users.name, 
users.last_name,
users.badge,
users.phone_number,
users.email,
users.wrong_pwd_count,
users.user_type,
users.user_status,
users.agency
FROM users
WHERE users.users_id != valId
ORDER BY users.users_id ASC
LIMIT valFrom, valTo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_examiner_cases` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	cases_id,
    dr,
    owner,
    examiner,
    authority,
    sw_number,
    offense,
    narrative,
    DATE_FORMAT(creation_date, "%m-%d-%Y") as 'creation_date',
    DATE_FORMAT(in_progress_date, "%m-%d-%Y") as 'in_progress_date',
    DATE_FORMAT(completed_date, "%m-%d-%Y")as 'completed_date',
    status
FROM 
	cases
WHERE
	cases.examiner = valUserId; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_examiner_cases_count` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(*)
FROM 
	cases
WHERE
	cases.examiner = valUserId AND 
        cases.status = 4;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_examiner_completed_cases_count` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(*)
FROM 
	cases
WHERE
	cases.examiner = valUserId AND 
        cases.status = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_examiner_inProgress_cases_count` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(*)
FROM 
	cases
WHERE
	cases.examiner = valUserId AND 
        cases.status = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_investigator_completed_cases` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(cases.status)
FROM 
	cases
WHERE
	cases.owner = valUserId AND 
        cases.status = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_investigator_inProgress_cases` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(cases.status)
FROM 
	cases
WHERE
	cases.owner = valUserId AND 
        cases.status = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_investigator_submitted_cases` (IN `paramUserId` INT)   BEGIN
DECLARE valUserId INT;
SET valUserId = paramUserId;

SELECT
	COUNT(cases.status)
FROM 
	cases
WHERE
	cases.owner = valUserId AND 
        cases.status = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_users_waiting_for_approval` ()   BEGIN
	SELECT COUNT(*) FROM users
    WHERE users.user_status = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_evidence` (IN `paramEvidenceNumber` VARCHAR(50), IN `paramType` INT, IN `paramSize` INT, IN `paramCaseId` INT, IN `paramNotes` VARCHAR(500))   BEGIN
DECLARE valEvidenceNumber VARCHAR(50);
DECLARE valType INT;
DECLARE valSize INT;
DECLARE valCaseId INT;
DECLARE valNotes VARCHAR(500);

SET valEvidenceNumber = paramEvidenceNumber;
SET valType = paramType;
SET valSize = paramSize;
SET valCaseId = paramCaseId;
SET valNotes= paramNotes;


INSERT INTO evidence(
    evidence_number,
    evidence_type,
    storage_size,
    associated_case,
    notes)	
VALUES(
    valEvidenceNumber,
    valType,
    valSize,
    valCaseId,
    valNotes);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mtd_case_count` ()   BEGIN
    SELECT COUNT(*)
    FROM cases
    WHERE creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mtd_data_count` ()   BEGIN
    SELECT SUM(evidence.storage_size)
    FROM evidence
    WHERE associated_case IN (
        SELECT cases_id
        FROM cases
        WHERE creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW()
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mtd_device_count` ()   BEGIN
    SELECT COUNT(*)
    FROM evidence
    WHERE associated_case IN (
        SELECT cases_id
        FROM cases
        WHERE creation_date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND NOW()
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ytd_case_count` ()   BEGIN
    SELECT COUNT(*)
    FROM cases
    WHERE YEAR(creation_date) = YEAR(NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ytd_data_count` ()   BEGIN
    SELECT SUM(evidence.storage_size)
    FROM evidence
    WHERE associated_case IN (
        SELECT cases_id
        FROM cases
        WHERE YEAR(creation_date) = YEAR(NOW())
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ytd_device_count` ()   BEGIN
    SELECT COUNT(*)
    FROM evidence
    WHERE associated_case IN (
        SELECT cases_id
        FROM cases
        WHERE YEAR(creation_date) = YEAR(NOW())
    );
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `insert_new_case` (`paramDr` VARCHAR(50), `paramOwner` INT, `paramAuthority` INT, `paramSw` VARCHAR(50), `paramOffense` INT, `paramNarrative` VARCHAR(500)) RETURNS INT(11)  BEGIN
DECLARE valDr VARCHAR(50);
DECLARE valOwner INT;
DECLARE valAuthority INT;
DECLARE valSw VARCHAR(50);
DECLARE valOffense INT;
DECLARE valNarrative VARCHAR(500);

SET valDr = paramDr;
SET valOwner = paramOwner;
SET valAuthority = paramAuthority;
SET valSw = paramSw;
SET valOffense = paramOffense;
SET valNarrative = paramNarrative;

INSERT INTO cases(
    dr,
    owner,
    examiner,
    authority,
    sw_number,
    offense,
    narrative,
    creation_date,
    status)
VALUES(
    valDr,
    valOwner,
    0,
    valAuthority,
    valSw,
    valOffense,
    valNarrative,
    NOW(),
    1);
RETURN LAST_INSERT_ID();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `cases_id` int(11) NOT NULL,
  `dr` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  `examiner` int(11) NOT NULL,
  `authority` int(11) NOT NULL,
  `sw_number` varchar(50) NOT NULL,
  `offense` int(11) NOT NULL,
  `narrative` varchar(500) NOT NULL,
  `creation_date` datetime NOT NULL,
  `in_progress_date` datetime NOT NULL,
  `completed_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cases_authority_lu`
--

CREATE TABLE `cases_authority_lu` (
  `cases_authority_id` int(11) NOT NULL,
  `authority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cases_offense_lu`
--

CREATE TABLE `cases_offense_lu` (
  `cases_offense_id` int(11) NOT NULL,
  `offense` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_status_lu`
--

CREATE TABLE `case_status_lu` (
  `case_status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evidence_id` int(11) NOT NULL,
  `evidence_number` varchar(50) NOT NULL,
  `evidence_type` int(11) NOT NULL,
  `storage_size` int(11) NOT NULL,
  `associated_case` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evidence_type_lu`
--

CREATE TABLE `evidence_type_lu` (
  `evidence_type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `users_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `token_exp_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `badge` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `wrong_pwd_count` int(11) NOT NULL DEFAULT 0,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `agency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_agency_lu`
--

CREATE TABLE `users_agency_lu` (
  `users_agency_id` int(11) NOT NULL,
  `agency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_status_lu`
--

CREATE TABLE `users_status_lu` (
  `users_status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_type_lu`
--

CREATE TABLE `users_type_lu` (
  `users_type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`cases_id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `cases_authority_lu`
--
ALTER TABLE `cases_authority_lu`
  ADD PRIMARY KEY (`cases_authority_id`);

--
-- Indexes for table `cases_offense_lu`
--
ALTER TABLE `cases_offense_lu`
  ADD PRIMARY KEY (`cases_offense_id`);

--
-- Indexes for table `case_status_lu`
--
ALTER TABLE `case_status_lu`
  ADD PRIMARY KEY (`case_status_id`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`evidence_id`),
  ADD KEY `associated_case` (`associated_case`);

--
-- Indexes for table `evidence_type_lu`
--
ALTER TABLE `evidence_type_lu`
  ADD PRIMARY KEY (`evidence_type_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_agency_lu`
--
ALTER TABLE `users_agency_lu`
  ADD PRIMARY KEY (`users_agency_id`);

--
-- Indexes for table `users_status_lu`
--
ALTER TABLE `users_status_lu`
  ADD PRIMARY KEY (`users_status_id`);

--
-- Indexes for table `users_type_lu`
--
ALTER TABLE `users_type_lu`
  ADD PRIMARY KEY (`users_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `cases_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_authority_lu`
--
ALTER TABLE `cases_authority_lu`
  MODIFY `cases_authority_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_offense_lu`
--
ALTER TABLE `cases_offense_lu`
  MODIFY `cases_offense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_status_lu`
--
ALTER TABLE `case_status_lu`
  MODIFY `case_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `evidence_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evidence_type_lu`
--
ALTER TABLE `evidence_type_lu`
  MODIFY `evidence_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_agency_lu`
--
ALTER TABLE `users_agency_lu`
  MODIFY `users_agency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_status_lu`
--
ALTER TABLE `users_status_lu`
  MODIFY `users_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_type_lu`
--
ALTER TABLE `users_type_lu`
  MODIFY `users_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`associated_case`) REFERENCES `cases` (`cases_id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
