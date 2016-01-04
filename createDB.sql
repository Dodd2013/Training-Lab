create database projectDB;
use projectDB
SET SQL_SAFE_UPDATES=0;
create table users(userid varchar(40) primary key not null,
pwd varchar(40) not null,
email varchar(50) not null unique,
img text null,identity varchar(20) null,regdate datetime not null);
select * from users;
create table feedbacks
(fb_id int not null auto_increment primary key,
fb_name varchar(50) not null,
fb_begin datetime not null,fb_end datetime not null, 
fb_create datetime not null,
fb_create_user varchar(30) not null,
fb_for varchar(50) null);

例如ipstats表结构如下：
CREATE TABLE ipstats (
ip VARCHAR(15) NOT NULL UNIQUE,
clicks SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0'
);
原本需要执行3条SQL语句，如下：
IF (SELECT * FROM ipstats WHERE ip='192.168.0.1') {
    UPDATE ipstats SET clicks=clicks+1 WHERE ip='192.168.0.1';
} else {
    INSERT INTO ipstats (ip, clicks) VALUES ('192.168.0.1', 1);
}
/*而现在只需下面1条SQL语句即可完成：*/
usersINSERT INTO ipstats VALUES('192.168.0.1', 1) ON DUPLICATE KEY UPDATE clicks=clicks+1;
注意，要使用这条语句，前提条件是这个表必须有一个唯一索引或主键。
再看一例子：
mysql> desc test;
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| uid   | int(11)     | NO   | PRI |         |       | 
| uname | varchar(20) | YES |     | NULL    |       | 
+-------+-------------+------+-----+---------+-------+
2 rows in set (0.00 sec)