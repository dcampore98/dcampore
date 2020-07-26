SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `team_members` (`id`, `student_id`, `team_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2);

ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `team_id` (`team_id`);

ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `team_members_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);
  
COMMIT;

