SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `student` (`student_id`, `username`) VALUES
(3, 'candycrush'),
(2, 'dave'),
(1, 'dcampore');

UPDATE student
SET username = 'zlimbo'
WHERE student_id = 3;

UPDATE student
SET username = 'balnene'
WHERE student_id = 2;

ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  
COMMIT;