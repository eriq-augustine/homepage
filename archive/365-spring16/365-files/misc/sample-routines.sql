DELIMITER $$

DROP FUNCTION IF EXISTS testFun$$
CREATE FUNCTION testFun() RETURNS BOOLEAN
READS SQL DATA
BEGIN
   RETURN TRUE;
END$$

DROP PROCEDURE IF EXISTS testProc$$
CREATE PROCEDURE testProc()
READS SQL DATA
BEGIN
   SELECT * FROM List LIMIT 5;
END$$

DROP PROCEDURE IF EXISTS outParams$$
CREATE PROCEDURE outParams(OUT myParam INT)
CONTAINS SQL
BEGIN
   SET myParam = 5;
END$$

DROP PROCEDURE IF EXISTS caseProc$$
CREATE PROCEDURE caseProc(IN val INT)
CONTAINS SQL
BEGIN
   CASE val
      WHEN -1 THEN
         SELECT 'negative';
      WHEN 0 THEN
         SELECT 'zero';
      ELSE
         SELECT 'positive';
   END CASE;
END$$

DROP PROCEDURE IF EXISTS loopProc$$
CREATE PROCEDURE loopProc()
CONTAINS SQL
BEGIN
   DECLARE done BOOLEAN DEFAULT FALSE;
   DECLARE firstName, lastName VARCHAR(32);

   DECLARE teacherCursor CURSOR FOR
      SELECT first, last
      FROM Teachers;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

   OPEN teacherCursor;

   teacherLoop: LOOP
      FETCH teacherCursor INTO firstName, lastName;

      IF done = TRUE THEN
         LEAVE teacherLoop;
      END IF;

      SELECT firstName, lastName;
   END LOOP;
END$$

DROP PROCEDURE IF EXISTS whileProc$$
CREATE PROCEDURE whileProc(IN num INT)
CONTAINS SQL
BEGIN
   DECLARE count INT DEFAULT 0;

   WHILE count < num DO
      SELECT count;

      SET count = count + 1;
   END WHILE;
END$$

DROP PROCEDURE IF EXISTS repeatProc$$
CREATE PROCEDURE repeatProc(IN num INT)
CONTAINS SQL
BEGIN
   DECLARE count INT DEFAULT 0;

   REPEAT
      SELECT count;

      SET count = count + 1;
   UNTIL count = num
   END REPEAT;
END$$


DELIMITER ;

CALL outParams(@val);
SELECT @val;

SELECT testFun();
CALL testProc();

CALL caseProc(-1);
CALL caseProc(0);
CALL caseProc(1);

CALL loopProc();

CALL whileProc(5);
CALL repeatProc(5);
