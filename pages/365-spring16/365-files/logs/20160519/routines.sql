DELIMITER $$

DROP PROCEDURE IF EXISTS findStudents$$
CREATE PROCEDURE findStudents()
DETERMINISTIC
READS SQL DATA
COMMENT 'Cool, a comment...'
BEGIN
   SELECT *
   FROM List;
END$$

DROP PROCEDURE IF EXISTS findStudentsWithTeacher$$
CREATE PROCEDURE findStudentsWithTeacher(IN teacherLastName VARCHAR(256))
DETERMINISTIC
READS SQL DATA
BEGIN
   SELECT *
   FROM
      List S
      JOIN Teachers T ON T.classroom = S.classroom
   WHERE T.last = teacherLastName
   ;
END$$

DROP PROCEDURE IF EXISTS returnProc$$
CREATE PROCEDURE returnProc(OUT randNum FLOAT, INOUT sequence INT)
NOT DETERMINISTIC
BEGIN
   -- Multiple result sets emitted.
   SELECT *
   FROM List;

   SELECT *
   FROM Teachers;

   -- Use an out parameter.
   SET randNum = RAND();

   SET sequence = sequence + 1;
END$$

DROP FUNCTION IF EXISTS simpleFun$$
CREATE FUNCTION simpleFun() RETURNS INT
BEGIN
   RETURN 4;
END$$

DROP FUNCTION IF EXISTS bestWineScore$$
CREATE FUNCTION bestWineScore() RETURNS INT
BEGIN
   RETURN (
      SELECT MAX(score)
      FROM Wine
   );
END$$

DROP FUNCTION IF EXISTS findPrice$$
CREATE FUNCTION findPrice(food VARCHAR(256), flavor VARCHAR(256)) RETURNS FLOAT
BEGIN
   DECLARE somePrice FLOAT;

   SET somePrice = (
      SELECT price
      FROM Goods G
      WHERE
         G.food = food
         AND G.flavor = flavor
   );

   RETURN somePrice;
END$$

-- Temp tables are usually not the answer.
DROP PROCEDURE IF EXISTS simpleLoop$$
CREATE PROCEDURE simpleLoop()
BEGIN
   DECLARE count INT DEFAULT 0;

   CREATE TEMPORARY TABLE CountTable (
      val INT
   );

   -- Count up
   WHILE (count < 10) DO
      INSERT INTO CountTable
      SELECT count;

      SET count = count + 1;
   END WHILE;

   -- Count down
   REPEAT
      INSERT INTO CountTable
      SELECT count;

      SET count = count - 1;
   UNTIL (count < 0)
   END REPEAT;

   SELECT * FROM CountTable;

   DROP TABLE CountTable;
END$$

DROP PROCEDURE IF EXISTS goodsTotal$$
CREATE PROCEDURE goodsTotal()
BEGIN
   DECLARE foodVal VARCHAR(256);
   DECLARE flavorVal VARCHAR(256);
   DECLARE done BOOLEAN DEFAULT FALSE;

   DECLARE goodsCursor CURSOR FOR
   SELECT DISTINCT
      food,
      flavor
   FROM Goods
   ;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

   -- Query actually gets run
   OPEN goodsCursor;

   -- Iterate over cursor.
   goodsLoop: LOOP
      FETCH goodsCursor INTO foodVal, flavorVal;

      IF done THEN
         LEAVE goodsLoop;
      END IF;

      SELECT G.food, G.flavor, SUM(price)
      FROM
         Goods G
         JOIN Items I ON I.item = G.gId
      WHERE
         G.food = foodVal
         AND G.flavor = flavorVal
      GROUP BY
         G.food,
         G.flavor
      ;
   END LOOP;

   CLOSE goodsCursor;
END$$

DELIMITER ;
