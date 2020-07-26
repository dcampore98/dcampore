SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `meeting_attendance` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `meeting_attendance` (`id`, `meeting_id`, `student_id`, `status`) VALUES
(7, 26, 1, 'present'),
(11, 26, 2, 'present'),
(12, 26, 2, 'present'),
(13, 26, 2, 'present'),
(14, 26, 3, 'present'),
(15, 26, 3, 'absent');

ALTER TABLE `meeting_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_attendance_ibfk_1` (`meeting_id`),
  ADD KEY `student_id` (`student_id`);

ALTER TABLE `meeting_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `meeting_attendance`
  ADD CONSTRAINT `meeting_attendance_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`meeting_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meeting_attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;