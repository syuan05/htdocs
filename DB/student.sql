CREATE TABLE students (
    student_id int (10),
    student_name varchar(20),
    credit int (10),
    PASSWORD varchar(20),
    department_id int (10),
    schoolyear varchar(20),
    tableid int (10)
);

INSERT INTO students (student_id, student_name, credit, PASSWORD, department_id, schoolyear, tableid)
    VALUES ("1", "温子瑩", "0", "123", "1", "二", "1");

INSERT INTO students (student_id, student_name, credit, PASSWORD, department_id, schoolyear, tableid)
    VALUES ("2", "小綿羊", "0", "456", "1", "二", "2");

INSERT INTO students (student_id, student_name, credit, PASSWORD, department_id, schoolyear, tableid)
    VALUES ("3", "小獅子", "0", "789", "2", "三", "3");

INSERT INTO students (student_id, student_name, credit, PASSWORD, department_id, schoolyear, tableid)
    VALUES ("4", "小星星", "0", "246", "2", "四", "4");

INSERT INTO students (student_id, student_name, credit, PASSWORD, department_id, schoolyear, tableid)
    VALUES ("5", "小月亮", "0", "135", "1", "四", "5");

SELECT
    *
FROM
    students;
