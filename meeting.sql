SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `meeting` (
  `meeting_id` int(11) NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `meeting` (`meeting_id`, `meeting_title`, `start_date`, `end_date`, `description`) VALUES
(24, 'meeting one ', '2020-07-16 00:00:00', '2020-07-17 00:00:00', ''),
(26, 'meeting two', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(27, 'meeting three', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kjshfkjanfasfas'),
(28, 'dcampore', '2020-07-27 23:17:00', '2020-07-30 22:17:00', 'Meeting Notes and random dslkjgsbdkglsdgds'),
(29, 'meeting five ', '2020-07-28 00:00:00', '2020-07-29 00:00:00', ''),
(31, 'meeting past ', '2020-07-14 00:00:00', '2020-07-15 00:00:00', '');

ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`);
  
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
  
COMMIT;