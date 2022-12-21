# Simple-Text-Editor
A simple responsive text editor that let's you edit the text you write and insert an image. It saves the text and the image to a database and outputs them on a page.

You can use the following sql script to create the database and the table
```
CREATE DATABASE text_editor; 
USE text_editor; 
CREATE TABLE entries ( 
  id INT AUTO_INCREMENT PRIMARY KEY, 
  text LONGTEXT NOT NULL, 
  image LONGBLOB 
  );
```
