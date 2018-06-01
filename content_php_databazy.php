<?php include "content_tb1.php"; 
// tabuľka s príkladom databázy?>
<div class="container">
  <h1>Základné PHP príkazy pre prácu z databázou</h1>
  <p>Výber základných PHP príkazov pre prácu s databázou:</p>

  <!-- mysqli_connect() -->

  <blockquote>
    <p><code>mysqli_connect()</code></br>
The <code>mysqli_connect()</code> function opens a new connection to the MySQL server.</br>
Syntax: <code>mysqli_connect(host,username,password,dbname,port,socket);<code></br></br>

Example:</br> 
<code>
?php</br>
$con = mysqli_connect("localhost","my_user","my_password","my_db");</br></br>

// Check connection</br>
if (mysqli_connect_errno())</br>
  {</br>
  echo "Failed to connect to MySQL: " . mysqli_connect_error();</br>
  }</br>
?</code>
</p>

<!-- mysqli_close() -->

    </blockquote></br>
<blockquote>
    <p><code>mysqli_close()</code> </br>
The <code>mysqli_close()</code> function closes a previously opened database connection.</br>
Syntax: <code>mysqli_close(connection);</code></br></br>

Example: </br>
<code>
?php</br>
$con=mysqli_connect("localhost","my_user","my_password","my_db");</br></br>

// ....some PHP code...</br></br>

mysqli_close($con);</br>
?
</code>
</p>

<!-- mysqli_error() -->

    </blockquote></br>
<blockquote>
    <p><code>mysqli_error()</code></br>
The <code>mysqli_error()</code> function returns the last error description for the most recent function call, if any. </br>
Syntax: <code>mysqli_error(connection);</code></br></br>

Example:</br>
<code>?php</br>
$con=mysqli_connect("localhost","my_user","my_password","my_db");</br>
// Check connection</br>
if (mysqli_connect_errno())</br>
  {</br>
  echo "Failed to connect to MySQL: " . mysqli_connect_error();</br>
  }</br></br>

// Perform a query, check for error</br>
if (!mysqli_query($con,"INSERT INTO Persons (FirstName) VALUES ('Glenn')"))</br>
  {</br>
  echo("Error description: " . mysqli_error($con));</br>
  }</br></br>

mysqli_close($con);</br>
?</code>
</p>
    </blockquote></br>

    <!-- mysqli_query() -->

<blockquote>
    <p><code>mysqli_query()</code></br>
The <code>mysqli_query()</code> function performs a query against the database.</br>
Syntax: <code>mysqli_query(connection,query,resultmode);</code></br></br>

Example:</br>
<code>?php</br>
$con=mysqli_connect("localhost","my_user","my_password","my_db");</br>
// Check connection</br>
if (mysqli_connect_errno())</br>
  {</br>
  echo "Failed to connect to MySQL: " . mysqli_connect_error();</br>
  }
  </br></br>
// Perform queries </br>
mysqli_query($con,"SELECT * FROM Persons");</br>
mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age);</br>
// mysqli_query($db_connection, "SET NAMES 'utf8'"); -  setting for coding utf8 - when you´re using diacritics in your database
VALUES ('Glenn','Quagmire',33)");</br></br>

mysqli_close($con);</br>
?</code>
</p>
    </blockquote></br>

    <!-- mysqli_fetch_array() -->

<blockquote>
    <p><code>mysqli_fetch_array()</code></br>
The <code>mysqli_fetch_array()</code> function fetches a result row as an associative array, a numeric array, or both.</br>
Syntax: <code>mysqli_fetch_array(result,resulttype);</code></br></br>

Example: </br>
<code>?php</br>
$con=mysqli_connect("localhost","my_user","my_password","my_db");</br>
// Check connection</br>
if (mysqli_connect_errno())</br>
  {</br>
  echo "Failed to connect to MySQL: " . mysqli_connect_error();</br>
  }</br></br>

$sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";</br>
$result=mysqli_query($con,$sql);</br></br>

// Numeric array</br>
$row=mysqli_fetch_array($result,MYSQLI_NUM);</br>
printf ("%s (%s)\n",$row[0],$row[1]);</br></br>

// Associative array</br>
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);</br>
printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);</br></br>

// Free result set</br>
mysqli_free_result($result);</br></br>

mysqli_close($con);</br>
?</code>
</p>
    </blockquote></br>

    <!-- mysqli_num_rows() -->

<blockquote>
    <p><code>mysqli_num_rows() </code></br>
The <code>mysqli_num_rows()</code> function returns the number of rows in a result set.</br></br>

Syntax: <code>mysqli_num_rows(result);</code></br></br>

Example: </br>
<code>?php</br>
$con=mysqli_connect("localhost","my_user","my_password","my_db");</br>
// Check connection</br>
if (mysqli_connect_errno())</br>
  {</br>
  echo "Failed to connect to MySQL: " . mysqli_connect_error();</br>
  }</br></br>

$sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";</br></br>

if ($result=mysqli_query($con,$sql))</br>
  {</br>
  // Return the number of rows in result set</br>
  $rowcount=mysqli_num_rows($result);</br>
  printf("Result set has %d rows.\n",$rowcount);</br>
  // Free result set</br>
  mysqli_free_result($result);</br>
  }</br></br>

mysqli_close($con);</br>
?</code>
</p>
   <!-- </blockquote></br>
<blockquote>
    <p></p>
  </blockquote>
-->
  <blockquote>Dúfame, že poslúži :)</blockquote>
</div>