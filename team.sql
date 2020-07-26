SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `team` (`team_id`, `team_name`) VALUES
(2, 'Comp Science'),
(3, 'Civil Engineering'),
(4, 'Nursing');

UPDATE team
SET team_name = 'Information'
WHERE team_id = 2;

UPDATE team
SET team_name = 'Knowledge'
WHERE team_id = 3;

UPDATE team
SET team_name = 'Laptops'
WHERE team_id = 4;

ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
COMMIT;