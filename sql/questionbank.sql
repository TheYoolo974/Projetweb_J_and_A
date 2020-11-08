-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost: 8889
-- Server version: 5.7.26
-- PHP version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database : `questionbank`
--

-- ----------------------------------------------- --------

--
-- Structure of the ʻanswer` table

--
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `Answer_id` int (11) NOT NULL COMMENT 'answer identifier',
  `Answer_text` varchar (255) NOT NULL COMMENT 'text of the answer',
  `Is_valid_answer` tinyint (1) NOT NULL COMMENT 'valid answer for question',
  `Answer_question_id` int (11) NOT NULL COMMENT 'question related'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- ------------------------------------------------ --------

--
-- Structure of the `question` table
--

CREATE TABLE `question` (
  `question_id` int (11) NOT NULL COMMENT 'question_identification',
  `question_title` varchar (255) NOT NULL COMMENT 'title of the question',
  `question_quizz_id` int (11) NOT NULL COMMENT 'link question quizz',
  `question_input_type` varchar (255) NOT NULL COMMENT 'input of the question',
  `related_image` boolean (1) NOT NULL COMMENT 'image or not'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- ------------------------------------------------- --------
--
-- Structure of the `quizz` table
--
CREATE TABLE `quizz` (
  `quizz_id` int (11) NOT NULL COMMENT 'Quizz Identifier',
  `quizz_name` varchar (255) NOT NULL COMMENT 'Quizz name'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


-- ------------------------------------------------- --------

--
-- Structure of the ʻuser` table
--

CREATE TABLE `user` (
  `User_id` int (11) NOT NULL COMMENT 'user identifier',
  `User_last_name` varchar (255) NOT NULL COMMENT 'user last name',
  `User_first_name` varchar (255) NOT NULL COMMENT 'user first name',
  `User_adress` longtext COMMENT 'user physical address',
  `User_phone` varchar (255) DEFAULT NULL COMMENT 'user phone',
  `User_birthdate` datetime DEFAULT NULL,
  `User_password` varchar (255) NOT NULL COMMENT 'User Password'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- ------------------------------------------------ --------

--
-- Structure of the `user_answer` table
--

CREATE TABLE `user_answer` (
  `User_answer_id` int (11) NOT NULL COMMENT 'User answer identifier',
  `User_id` int (11) NOT NULL COMMENT 'user identifier',
  `Answer_id` int (11) NOT NULL COMMENT 'answer_id',
  `User_answer_date` timestamp NULL DEFAULT NULL COMMENT 'date of answer user'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Index for unloaded tables
--

--
-- Index for the `answer` table
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Index for the `question` table
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_quizz_id_fk` (`question_quizz_id`);

--
-- Index for the `quizz` table
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`quizz_id`);

--
-- Index for the ʻuser` table
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Index for the ʻuser_answer` table
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`user_answer_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `answer_id_fk` (`answer_id`);

--
-- AUTO_INCREMENT for unloaded tables
--

--
-- AUTO_INCREMENT for the ʻanswer` table
--
ALTER TABLE `answer`
  MODIFY `answer_id` int (11) NOT NULL AUTO_INCREMENT COMMENT 'answer identifier';

--
-- AUTO_INCREMENT for the `question` table
--
ALTER TABLE `question`
  MODIFY `question_id` int (11) NOT NULL AUTO_INCREMENT COMMENT 'question_identification';

--
-- AUTO_INCREMENT for the `quizz` table;
--
ALTER TABLE `quizz`
  MODIFY `quizz_id` int (11) NOT NULL AUTO_INCREMENT COMMENT 'Quizz Identifier';

--
--  AUTO_INCREMENT for the `user` table;
--
ALTER TABLE `user`
  MODIFY `User_id` int (11) NOT NULL AUTO_INCREMENT COMMENT 'user identifier';

--
-- AUTO_INCREMENT for the ʻuser_answer` table
--
ALTER TABLE `user_answer`
  MODIFY `user_answer_id` int (11) NOT NULL AUTO_INCREMENT COMMENT 'User answer identifier';

--
-- Constraints for unloaded tables
--

--
-- Constraints for the `question` table
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_quizz_id_fk` FOREIGN KEY (`question_quizz_id`) REFERENCES `quizz` (`quizz_id`);

--
-- Constraints for the ʻuser_answer` table
--
ALTER TABLE `user_answer`
  ADD CONSTRAINT `answer_id_fk` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
--
-- ---------------------------------------------- -----
-- Insertion into answer table
--
INSERT INTO `answer`(`Answer_text`,`Is_valid_answer`,`Answer_question_id`) VALUES
 ('Donald Trump',true,1),
 ('Bill Gates',false,1),
 ('Harry Porter',false,1),
 ('Chicago',false,2),
 ('New York',true,2),
 ('Washington',false,2),
 ('Seatle',false,2),
 ('50',true,3),
 ('2009',false,4),
  ('2017',false,4),
   ('2008',true,4); 

   INSERT INTO `answer`(`Answer_text`,`Is_valid_answer`,`Answer_question_id`) VALUES
 ('Iron Man',false,5),
 ('The Hulk',false,5),
 ('Thor',true,5),
 ('Gimili',true,7),
 ('Saruman',false,7),
 ('Frodo',true,7),
 ('Merry',true,7),
 ('Thorin',false,7),
 ('A new Hope',false,6),
 ('The Return of the Jedi',false,6),
 ('The Empire strikes back',false,6),
 ('The force Awaken',true,6),
 ('2004',true,8); 




--  insertion into quiz
-- --------------------------------------------------- -----
insert into `quizz`(`quizz_name`) VALUES ('quizz1');
insert into `quizz`(`quizz_name`) VALUES ('quizz2');


-- 
-- Insertion into question table
-- ----------------------------------------------------- ----
insert into question(`question_title`,`question_input_type`,`question_quizz_id`,`related_image`) 
VALUES ('Who is this Man?','select',1,1),
('In which city can we find this statue','radio',1,1),
('how many states in usa ?','number',1,0),
('when was Obama elected ?','checkbox',1,1);

insert into question(`question_title`,`question_input_type`,`question_quizz_id`,`related_image`) 
VALUES ('Which Avenger is this?','select',2,1),
('What is name of the fifth Starwars movie?','radio',2,0),
('Which characters are members of the fellowship of the Ring','checkbox',2,0),
('In which year was Thor ragnorok released?','number',2,0);


--
-- Insertion to user table
-- ---------------------------------------------------------- ----
insert into `user`(`User_last_name`,`User_first_name`,`User_password`) VALUES ('Ofori','Joshua','php_v2');
--
--
