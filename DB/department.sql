create table department(
school_year varchar(200),
classroom int(200),
need varchar(200),
department_id int(200)
);

insert into department(school_year, classroom,need,department_id) values('二', 5672,"必修",1);
insert into department(school_year, classroom,need,department_id) values('三', 2617,"選修",2);
insert into department(school_year, classroom,need,department_id) values('四', 4580,"必修",3);
insert into department(school_year, classroom,need,department_id) values('一', 1789,"選修",4);
select * from department;