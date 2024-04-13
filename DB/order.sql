CREATE TABLE orderid (
    student_id int (10),
    course_id int (10),
    order_id int (10)
);

INSERT INTO orderid (student_id, course_id, order_id)
    VALUES ("4", "3600", "1");

INSERT INTO orderid (student_id, course_id, order_id)
    VALUES ("5", "3600", "2");

SELECT
    *
FROM
    orderid;
