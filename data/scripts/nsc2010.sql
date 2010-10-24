SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `nsc2010`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tuser`
--

CREATE TABLE `tuser` (
  `UserID` int(11) NOT NULL auto_increment,
  `UserType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `StaffID` int(11) NOT NULL,
  `HomeBaseID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Username` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Agreed` tinyint(4) NOT NULL,
  PRIMARY KEY  (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tuser`
--

INSERT INTO `tuser` VALUES (1, 'NSC', 0, 0, 0, 'root', 'root', 0);
INSERT INTO `tuser` VALUES (2, 'HomeBase', 0, 0, 0, 'user', 'user', 0);
