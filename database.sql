-- Create Databse
CREATE DATABASE IF NOT EXISTS `kelompok15`;

-- Select Database
USE `kelompok15`;

-- Create Table
CREATE TABLE `tbl_user` (
    `fullname` varchar(150),
    `username` varchar(50),
    `password` varchar(250),
    `photo` varchar(250),
    `email` varchar(25),
    `phone` int(12),
    PRIMARY KEY (`username`)
);