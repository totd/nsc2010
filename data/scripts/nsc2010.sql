SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `nsc2010`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(250) default NULL,
  `role` enum('user','administrator') default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` VALUES (1, 'root', 'root', 'administrator');
