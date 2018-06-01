<?php include "content_tb1.php"; 
// tabuľka s príkladom databázy ?>
<div class="container">
  <h2>Základné SQL príkazy pre prácu z databázou</h2>
  <p>Výber základných SQL príkazov pre prácu s databázou:</p>

  <!-- SELECT -->
  
  <blockquote>
<p>The SELECT statement is used to select data from a database.</br></br>

Syntax: <code>SELECT * FROM table_name;</code></br></br>

Examples: </br>
<code>SELECT CustomerName, City FROM Customers;(selects 2 columns[CustomerName and City] from table[Customers])</code></br>
<code>SELECT * FROM Customers;( selects all the columns from the table [Customers ])</code></br></br>
</p>
</blockquote></br>

<!-- LIMIT -->

<blockquote>
<p>The <code>LIMIT</code> keyword is used when we need to retrieve just a subset of records.</br></br>

Syntax: <code>SELECT column list FROM table_name LIMIT [number of records];</code></br></br>

Example:</br> <code>SELECT ID, FirstName, LastName, City FROM customers LIMIT 5;</code>(retrieves the first five records from the customers table)</br>
</p>
</blockquote></br>
<blockquote>
<p>The <code>ORDER BY</code> keyword is used to sort the result-set(result table which stores returned data selected from database) in ascending or descending order.</br></br>

Syntax: <code>SELECT column1, column2, ...FROM table_name ORDER BY column1, column2, ... ASC|DESC;</code></br></br>

Example: </br>
<code>SELECT * FROM Customers ORDER BY Country;</code>(selects all customers from the "Customers" table, sorted by the "Country" column)</br>
<code>SELECT * FROM Customers ORDER BY Country DESC;</code>( selects all customers from the "Customers" table, sorted DESCENDING by the "Country" column)</br>
<code>SELECT * FROM Customers ORDER BY Country, CustomerName;</code>(selects all customers from the "Customers" table, sorted by the "Country" and the "CustomerName" column)</br>
<code>SELECT * FROM Customers ORDER BY Country ASC, CustomerName DESC;</code>(selects all customers from the "Customers" table, sorted ascending by the "Country" and descending by the "CustomerName" column)</br></br>
</p>
</blockquote></br>

<!-- WHERE-->

<blockquote>
<p>The <code>WHERE</code> clause is used to filter records.</br>
The <code>WHERE</code> clause is used to extract only those records that fulfill a specified condition.</br></br>
 
Syntax: <code>SELECT column1, column2, … FROM table_name WHERE condition;</code></br></br>
 
Examples: </br>
<code>SELECT * FROM Customers WHERE Country='Mexico';</code>(selects all the customers from the country "Mexico", in the "Customers" table)</br>
<code>SELECT * FROM Customers WHERE CustomerID=1;</code>(selects all the customers from the CustomerID=1, in the "Customers" table)</br></br>
</p></blockquote></br>

<!-- UPDATE -->

<blockquote>
<p>The <code>UPDATE</code> statement is used to modify the existing records in a table.</br></br>
Syntax: <code>UPDATE table_name SET column1 = value1, column2 = value2, … WHERE condition;</code></br></br>
Examples: </br>
<code>UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;</code>(updates the first customer (CustomerID = 1) with a new contact person and a new city)</br>
<code>UPDATE Customers SET ContactName='Juan' WHERE Country='Mexico';</code>(update the contactname to "Juan" for all records where country is "Mexico")</br></br>
</p></blockquote></br>

<!-- INSERT INTO-->

<blockquote>
<p>The <code>INSERT INTO</code> statement is used to insert new records in a table.</br></br>
 
 Syntax: <code>INSERT INTO table_name (column1, column2, column3, ...)
 VALUES (value1, value2, value3, ...);</code></br></br>
  
 If you are adding values for all the columns of the table, you do not need to specify the column names in the SQL query. However, make sure the order of the values is in the same order as the columns in the table. The INSERT INTO syntax would be as follows: INSERT INTO table_name VALUES (value1, value2, value3, ...);</br></br>
  
 Examples:</br>
 <code>INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');</code>(inserts a new record in the "Customers" table)</br>
 <code>INSERT INTO Customers (CustomerName, City, Country) VALUES ('Cardinal', 'Stavanger', 'Norway');</code>(insert a new record, but only insert data in the "CustomerName", "City", and "Country" columns (CustomerID will be updated automatically))</br>
     It shows: 92 Cardinal null null Stavanger null Norway</br></br>
  
</p></blockquote></br>

<!-- DELETE -->

<blockquote>
<p>The <code>DELETE</code> statement is used to delete existing records in a table.</br></br>

Syntax: <code>DELETE FROM table_name WHERE condition;</code></br></br>

Examples: </br>
<code>DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';</code>(deletes the customer "Alfreds Futterkiste" from the "Customers" table)</br>
Delete All Records:</br>
It is possible to delete all rows in a table without deleting the table. This means that the table structure, attributes, and indexes will be intact:</br></br>
 
<code>DELETE FROM table_name;</code></br></br>
 
or:</br></br>
<code>DELETE * FROM table_name;<code>
</p>
  </blockquote></br></br>
  <blockquote>Dúfame, že poslúži :)</blockquote>
</div>