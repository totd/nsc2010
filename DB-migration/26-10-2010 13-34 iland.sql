-- Modify length of the UserType field
ALTER TABLE  `tuser` CHANGE  `UserType`  `UserType` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE 
    utf8_unicode_ci NULL DEFAULT NULL;

-- clean user table
TRUNCATE TABLE  `tuser`;

-- Add adminin
INSERT INTO `tuser` VALUES (NULL, 'NSC_USERS_Level_1', 0, 0, 0, 'root', 'root', 0);

