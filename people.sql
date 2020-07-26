SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `UCID` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `people` (`id`, `UCID`, `password`) VALUES
(2, 'adam', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, '12345', '827ccb0eea8a706c4c34a16891f84e7b');


UPDATE people
SET UCID = 'boejim'
WHERE id = 5;

UPDATE people
SET UCID = 'janedoe'
WHERE id = 2;

ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UCID` (`UCID`);

ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;