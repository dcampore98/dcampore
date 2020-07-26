SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `meeting_participants` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `meeting_participants` (`id`, `meeting_id`, `team_id`) VALUES
(31, 26, 2),
(32, 28, 2);

ALTER TABLE `meeting_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meeting_id` (`meeting_id`),
  ADD KEY `team_id` (`team_id`);

ALTER TABLE `meeting_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
 
ALTER TABLE `meeting_participants`
  ADD CONSTRAINT `meeting_participants_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meeting_participants_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`meeting_id`);
  
COMMIT;