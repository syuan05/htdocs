CREATE TABLE classtable (
    student_id int (10),
    course_id int (4)
);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 1261);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 1222);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 2765);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 1264);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 3598);
	
INSERT INTO classtable (student_id, course_id)
    VALUES ("2", 3600);
	
INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 1263);

INSERT INTO classtable (student_id, course_id)
    VALUES ("1", 2774);
	
INSERT INTO classtable (student_id, course_id)
    VALUES ("4", 1261);
	
INSERT INTO classtable (student_id, course_id)
    VALUES ("3", 3600);

INSERT INTO classtable (student_id, course_id)
    VALUES ("4", 3600);

INSERT INTO classtable (student_id, course_id)
    VALUES ("3", 2764);

INSERT INTO classtable (student_id, course_id)
    VALUES ("5", 3600);

SELECT
    *
FROM
    classtable;
