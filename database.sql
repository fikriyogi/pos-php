sql
CREATE TABLE `analytic` (
  `id` int(11) NOT NULL,
  `ip` char(50) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `os` varchar(200) NOT NULL,
  `hostname` varchar(200) NOT NULL,
  `device` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `user` varchar(100) NOT NULL,
  `resolution` varchar(20) NOT NULL,
  `mac` char(100) NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


