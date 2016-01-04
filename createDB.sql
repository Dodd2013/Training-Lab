create database projectDB;
use projectDB;
SET SQL_SAFE_UPDATES=0;
create table tb_users(
	user_id varchar(40) primary key not null,
	user_pwd varchar(40) not null,
	user_email varchar(50) not null unique,
	user_img text null,
	user_identity varchar(20) null,
	user_regdate datetime not null
);
create table tb_problems(
	pro_id int primary key AUTO_INCREMENT,
	pro_des text not null,
	pro_type int not null,
	pro_create_user varchar(40) not null,
	pro_create_time datetime not null,
	CONSTRAINT `PR_US` FOREIGN KEY (`pro_create_user`) REFERENCES `tb_users` (`user_id`)
);
create table tb_ans(
	pro_id int not null,
	ans text not null,
	CONSTRAINT `ANS_PR` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
);
create table tb_feedbacks(
	fb_id int not null auto_increment primary key,
	fb_name varchar(50) not null,
	fb_begin datetime not null,
	fb_end datetime not null, 
	fb_create_time datetime not null,
	fb_create_user varchar(40) not null,
	CONSTRAINT `FB_US` FOREIGN KEY (`fb_create_user`) REFERENCES `tb_users` (`user_id`)
);
create table tb_fb_pro(
	fb_id int not null,
	pro_id int not null,
	CONSTRAINT `FB_PR1` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
	CONSTRAINT `FB_PR2` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
);
create table tb_submit(
	sub_id int auto_increment not null primary key,
	user_id varchar(40) not null,
	sub_time datetime not null,
	fb_id int not null,
	CONSTRAINT `SUB_FB` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
	CONSTRAINT `SUB_US` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
);
create table tb_sub_detail(
	sub_id int not null,
	pro_id int not null,
	ans text not null,
	CONSTRAINT `SUB_DET` FOREIGN KEY (`sub_id`) REFERENCES `tb_submit` (`sub_id`),
	CONSTRAINT `DET_PRO` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
);
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