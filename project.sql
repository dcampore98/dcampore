SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `grade` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);
COMMIT;