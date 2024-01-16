create table teacher (
   tid                  char(10)             not null,
   tname                varchar(30)          null,
   address              varchar(50)          null,
   phone                varchar(24)          null,
   speciality           varchar(30)          null,
   constraint PK_TEACHER primary key nonclustered (tid)
);


create table course (
   cid                  char(10)             NOT NULL,
   coordinator          char(10)             not null,
   teacher              char(10)             not null,
   cname                varchar(50)          null,
   hours                int                  null,
   credits              int                  null,
   constraint PK_COURSE primary key (cid),
   constraint FK_COURSE_TEACHES_TEACHER foreign key (teacher)  references Teacher (tid),
   constraint FK_COURSE_COORDINAT_TEACHER foreign key (coordinator) references Teacher (tid)
);


create table author (
   teacher              char(10)             not null,
   course               char(10)             not null,
   constraint FK_AUTHOR_AUTHOR2_COURSE foreign key (course)  references Course (cid),
   constraint FK_AUTHOR_AUTHOR_TEACHER foreign key (teacher)  references Teacher (tid)
);


create table student (
   sid                  char(10)             not null,
   supervisor           char(10)             not null,
   sname                varchar(30)          null,
   bdate                datetime             null,
   address              varchar(50)          null,
   phone                varchar(24)          null,
   constraint PK_STUDENT primary key nonclustered (sid),
   constraint FK_STUDENT_SUPER_TEACHER foreign key (supervisor)  references Teacher (tid)
);


create table tutor (
   teacher              char(10)             not null,
   student              char(10)             not null,
   constraint FK_TUTOR_TUTOR2_STUDENT foreign key (student) references Student (sid),
   constraint FK_TUTOR_TUTOR_TEACHER foreign key (teacher) references Teacher (tid)

);


create table notereg (
   student              char(10)             not null,
   course               char(10)             not null,
   note                 varchar(50)         null,
   constraint PK_NOTEREG primary key nonclustered (student, course),
   constraint FK_NOTEREG_NOTEREG2_COURSE foreign key (course) references Course (cid),
   constraint FK_MNOTEREG_NOTEREG_STUDENT foreign key (student) references Student (sid)
);


CREATE TABLE admins (
  name varchar(20) NOT NULL,
  username varchar(20) NOT NULL,
  password varchar(20) NOT NULL
);


CREATE TABLE user1 (
   username             varchar(20)          not null,
   password             varchar(20)          not null,
   sid                  char(10)             not null,
   primary key (username),
   constraint FK_USER1_STUDENT foreign key (sid) references Student (sid)
);


CREATE TABLE user2 (
   username             varchar(20)          not null,
   password             varchar(20)          not null,
   tid                  char(10)             not null,
   primary key (username),
   constraint FK_USER2_TEACHER foreign key (tid) references Teacher (tid)
);





INSERT INTO `admins` (`name`, `username`, `password`) VALUES
('ali saker', 'alisaker', 'alisaker12$');


INSERT INTO teacher (tid, tname, address, phone, speciality)
VALUES
  ('T1', 'John Smith', '123 Main St', '111-555-1234', 'Mathematics'),
  ('T2', 'Jane Doe', '456 Oak St', '222-555-5678', 'Physics'),
  ('T3', 'Bob Johnson', '789 Pine St', '333-555-8765', 'Chemistry'),
  ('T4', 'Alice Williams', '101 Elm St', '444-555-4321', 'Biology'),
  ('T5', 'David Miller', '222 Maple St', '555-555-9876', 'History'),
  ('T6', 'Emma Davis', '555 Oak St', '666-555-1111', 'English'),
  ('T7', 'Michael Clark', '777 Elm St', '777-555-2222', 'Computer Science'),
  ('T8', 'Olivia White', '888 Pine St', '888-555-3333', 'Economics'),
  ('T9', 'William Taylor', '999 Maple St', '999-555-4444', 'Psychology'),
  ('T10', 'Sophia Brown', '111 Oak St', '111-555-5555', 'Sociology');


INSERT INTO course (cid, coordinator, teacher, cname, hours, credits)
VALUES
  ('C1', 'T1', 'T1', 'Math 101', 3, 4),
  ('C2', 'T2', 'T2', 'Physics 201', 4, 5),
  ('C3', 'T3', 'T3', 'Chemistry 301', 3, 3),
  ('C4', 'T3', 'T4', 'Biology 101', 4, 4),
  ('C5', 'T5', 'T5', 'History 201', 3, 3),
  ('C6', 'T2', 'T6', 'English 101', 3, 4),
  ('C7', 'T1', 'T7', 'Computer Science 201', 4, 5),
  ('C8', 'T2', 'T8', 'Economics 301', 3, 3),
  ('C9', 'T3', 'T9', 'Psychology 101', 4, 4),
  ('C10', 'T1', 'T10', 'Sociology 201', 3, 3);


INSERT INTO author (teacher, course)
VALUES
  ('T1', 'C1'),
  ('T1', 'C2'),
  ('T1', 'C3'),
  ('T4', 'C4'),
  ('T4', 'C5'),
  ('T8', 'C6'),
  ('T7', 'C7'),
  ('T8', 'C8'),
  ('T9', 'C9'),
  ('T7', 'C10');


  INSERT INTO student (sid, supervisor, sname, bdate, address, phone)
  VALUES
    ('S1', 'T1', 'Alice Johnson', '1990-01-15', '789 Elm St', '333-555-1111'),
    ('S2', 'T2', 'Bob Williams', '1992-05-20', '101 Pine St', '222-555-2222'),
    ('S3', 'T3', 'Charlie Davis', '1991-08-12', '202 Oak St', '111-555-3333'),
    ('S4', 'T4', 'David Smith', '1993-03-25', '303 Maple St', '999-555-4444'),
    ('S5', 'T5', 'Eva Brown', '1990-12-05', '404 Pine St', '666-555-5555'),
    ('S6', 'T6', 'Fiona Green', '1991-07-18', '555 Elm St', '111-555-6666'),
    ('S7', 'T7', 'Gary Martin', '1993-02-28', '555 Pine St', '666-555-7777'),
    ('S8', 'T8', 'Hannah Miller', '1992-11-10', '555 Maple St', '888-555-8888'),
    ('S9', 'T9', 'Ian Turner', '1990-04-15', '555 Oak St', '333-555-9999'),
    ('S10', 'T10', 'Jessica Hall', '1994-09-05', '555 Pine St', '222-555-0000');

INSERT INTO tutor (teacher, student)
VALUES
  ('T1', 'S1'),
  ('T1', 'S2'),
  ('T1', 'S3'),
  ('T1', 'S4'),
  ('T1', 'S5'),
  ('T2', 'S6'),
  ('T2', 'S7'),
  ('T2', 'S8'),
  ('T2', 'S9'),
  ('T2', 'S10'),
  ('T3', 'S1'),
  ('T3', 'S2'),
  ('T3', 'S3'),
  ('T3', 'S4'),
  ('T3', 'S5'),
  ('T4', 'S6'),
  ('T4', 'S7'),
  ('T4', 'S8'),
  ('T4', 'S9'),
  ('T4', 'S10'),
  ('T5', 'S1'),
  ('T5', 'S2'),
  ('T5', 'S3'),
  ('T5', 'S4'),
  ('T5', 'S5'),
  ('T6', 'S6'),
  ('T6', 'S7'),
  ('T6', 'S8'),
  ('T6', 'S9'),
  ('T6', 'S10'),
  ('T7', 'S1'),
  ('T7', 'S2'),
  ('T7', 'S3'),
  ('T7', 'S4'),
  ('T7', 'S5'),
  ('T8', 'S6'),
  ('T8', 'S7'),
  ('T8', 'S8'),
  ('T8', 'S9'),
  ('T8', 'S10'),
  ('T9', 'S1'),
  ('T9', 'S2'),
  ('T9', 'S3'),
  ('T9', 'S4'),
  ('T9', 'S5'),
  ('T10', 'S6'),
  ('T10', 'S7'),
  ('T10', 'S8'),
  ('T10', 'S9'),
  ('T10', 'S10');


INSERT INTO notereg (student, course, note)
VALUES
  ('S1', 'C1', 'Registration Note 1'),
  ('S2', 'C2', 'Registration Note 2'),
  ('S3', 'C3', 'Registration Note 3'),
  ('S4', 'C4', 'Registration Note 4'),
  ('S5', 'C5', 'Registration Note 5'),
  ('S6', 'C6', 'Registration Note 6'),
  ('S7', 'C7', 'Registration Note 7'),
  ('S8', 'C8', 'Registration Note 8'),
  ('S9', 'C9', 'Registration Note 9'),
  ('S10', 'C10', 'Registration Note 10');


INSERT INTO user1 (username, password, sid)
VALUES
  ('student1', 'password1', 'S1'),
  ('student2', 'password2', 'S2'),
  ('student3', 'password3', 'S3'),
  ('student4', 'password4', 'S4'),
  ('student5', 'password5', 'S5');

INSERT INTO user2 (username, password, tid)
VALUES
  ('teacher1', 'password1', 'T1'),
  ('teacher2', 'password2', 'T2'),
  ('teacher3', 'password3', 'T3'),
  ('teacher4', 'password4', 'T4'),
  ('teacher5', 'password5', 'T5');




CREATE INDEX User1_FK ON User1 (sid ASC);


CREATE INDEX User2_FK ON User2 (tid ASC);


create index Author_FK on Author (course ASC);


create index Teaches_FK on Course (teacher ASC);


create index Coordinator_FK on Course (coordinator ASC);


create index notereg_FK on notereg (course ASC);


create index Sup_FK on Student (supervisor ASC);
