/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS libDB;
CREATE USER IF NOT EXISTS 'Roslov'@'%' IDENTIFIED BY 'root';
GRANT SELECT,UPDATE,INSERT ON libDB.* TO 'Roslov'@'%';
FLUSH PRIVILEGES;

USE libDB;
CREATE TABLE IF NOT EXISTS books (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(70) NOT NULL,
  writer VARCHAR(40) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY (ID)
);


INSERT INTO books (name, writer, description)
SELECT * FROM (SELECT 'Мартин Иден', 'Джек Лондон', 'роман Джека Лондона, рассказывающий о молодом парне из рабочего класса, который влюбился в девушку-аристократку и ради сближения с ней решил стать известным писателем. На первый взгляд, банальная история любви, в итоге оборачивается чем-то совсем иным, хотя и остаётся ею до конца.') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM books WHERE name = 'Мартин Иден' AND writer = 'Джек Лондон' AND description = 'роман Джека Лондона, рассказывающий о молодом парне из рабочего класса, который влюбился в девушку-аристократку и ради сближения с ней решил стать известным писателем. На первый взгляд, банальная история любви, в итоге оборачивается чем-то совсем иным, хотя и остаётся ею до конца.'
) LIMIT 1;

INSERT INTO books (name, writer, description)
SELECT * FROM (SELECT 'Время не ждёт', 'Джек Лондон', 'третья книга в серии классики Джека Лондона, объединенной темой северного сияния.') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM books WHERE name = 'Время не ждёт' AND writer = 'Джек Лондон' AND description = 'третья книга в серии классики Джека Лондона, объединенной темой северного сияния.'
) LIMIT 1;

INSERT INTO books (name, writer, description)
SELECT * FROM (SELECT 'Зов ктулху', 'Говард Лавкрафт', 'рассказ Г.Ф. Лавкрафта в жанре лавкрафтовских ужасов, написанный в 1926 году.') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM books WHERE name = 'Зов ктулху' AND writer = 'Говард Лавкрафт' AND description = 'рассказ Г.Ф. Лавкрафта в жанре лавкрафтовских ужасов, написанный в 1926 году.'
) LIMIT 1;

INSERT INTO books (name, writer, description)
SELECT * FROM (SELECT 'Хорошо быть тихоней', 'Стивен Чбоски', 'Лёгкий роман о трудностях школьника, пережившего тяжёлую депрессию и лечение у психиатра. История о его взрослении, первых друзьях, провалах, вечеринках и влюблённости. Рассуждения о том, что для него правильно, а что нет. Каким бы он хотел быть человеком.') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM books WHERE name = 'Хорошо быть тихоней' AND writer = 'Стивен Чбоски' AND description = 'Лёгкий роман о трудностях школьника, пережившего тяжёлую депрессию и лечение у психиатра. История о его взрослении, первых друзьях, провалах, вечеринках и влюблённости. Рассуждения о том, что для него правильно, а что нет. Каким бы он хотел быть человеком.'
) LIMIT 1;