create table wishlist(
student_id int(10),
course_id int(4)
);

insert into wishlist(student_id, course_id) values("1",1261);
insert into wishlist(student_id, course_id) values("1",1222);
insert into wishlist(student_id, course_id) values("1",2774);
insert into wishlist(student_id, course_id) values("2",1261);
insert into wishlist(student_id, course_id) values("2",2764);
insert into wishlist(student_id, course_id) values("5",1222);

select * from wishlist;