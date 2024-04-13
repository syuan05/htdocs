create table course(
course_id int(4),
class_name varchar(255),
credits int(1),
need varchar(255),
open_departmentid int(255),
open_schoolyear varchar(255),
open_class varchar(255),
class_time varchar(255),
classroom varchar(255),
teacher varchar(20),
open_quota int(2),
actual_quota int(2)
);

insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(2764, "人生哲學", 2, "選修", 0, "全", "通識－人文(H)", "(四)06-07", "語306", "經觀榮", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(2774, "日本歷史與文化", 2, "選修", 0, "全", "通識－人文(H)", "(一)01-02", "人202", "黃煇慶", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1222, "程式設計(III)", 2, "必修", 1, "一", "資訊一乙", "(三)08-09", "資電234", "劉明機", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1261, "組合數學", 3, "選修", 1, "二", "資訊二甲", "(四)02", "忠B03", "游景盛", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(2765, "人生哲學", 2, "選修", 0, "全", "通識－人文(H)", "(四)05-06", "語306", "經觀榮", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1248, "資料庫系統", 3, "必修", 1, "二", "資訊二乙", "(四)08-09", "資電404", "許懷中", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(3349, "國防科技", 1, "必修", 1, "二", "資訊二乙", "(三)01-02", "科航B102", "王金輝,白宏茂", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1247, "系統程式", 3, "必修", 1, "二", "資訊二乙", "(一)02-03", "忠205", "劉宗杰", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1249, "機率與統計", 3, "必修", 1, "二", "資訊二乙", "(四)03-04", "科航204", "劉怡芬", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1264, "數位系統設計", 3, "選修", 1, "二", "資訊二丁", "(一)01", "資電104", "陳德生", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1254, "系統分析與設計", 3, "選修", 1, "二", "資訊二丙", "(二)09", "資電403", "洪振偉", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(3600, "多媒體系統", 3, "選修", 1, "二", "資訊二甲", "(五)06-08", "資電234", "葉春秀", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1263, "數位信號處理導論", 3, "選修", 1, "二", "資訊二丁", "(二)04", "資電102", "陳啟鏘", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(3598, "UNIX應用與實務", 3, "選修", 1, "二", "資訊二丁", "(一)09-10", "資電234", "林哲維", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1262, "電子商務與安全", 3, "選修", 1, "二", "資訊二甲", "(三)11-13", "科航202", "周澤捷", 4, 0);
insert into course(course_id, class_name, credits, need, open_departmentid, open_schoolyear, open_class, class_time, classroom, teacher, open_quota, actual_quota) values(1347, "普通物理", 2, "選修", 0, "一", "電機一甲", "(四)08-09", "語207", "江俊明", 4, 0);

select * from course;