CREATE DATABASE uscsrs;
USE uscsrs;

CREATE TABLE Student (
student_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
department VARCHAR(50) NOT NULL);

CREATE TABLE Club (
club_id INT AUTO_INCREMENT PRIMARY KEY,
club_name VARCHAR(100) NOT NULL,
description TEXT);

CREATE TABLE Session (
session_id INT AUTO_INCREMENT PRIMARY KEY,
club_id INT,
session_title VARCHAR(100) NOT NULL,
session_date DATE NOT NULL,
location VARCHAR(100),
FOREIGN KEY (club_id) REFERENCES Club(club_id));

CREATE TABLE Registration (
registration_id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
session_id INT,
registration_date DATE NOT NULL,
FOREIGN KEY (student_id) REFERENCES Student(student_id),
FOREIGN KEY (session_id) REFERENCES Session(session_id));