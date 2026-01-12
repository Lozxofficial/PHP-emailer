hello there github user 
I made this PHP emailer for people who need an easy way to add form to a webpage
Now i will tell you how to use it

1: setup, 
So the config is easy to do there's about 3 lines of code to chang here is the bit you nede to look at     
```php
<?php
$to = "youremail@youremail.youremail";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <{$email}>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
include "";
?>
```
This may look complex but it simple 

```php
$headers .= 'Cc: myboss@example.com' . "\r\n";
```  
That is for Cc someone 
—
```php
$to = "youremail@youremail.youremail";
$subject = "HTML email";
```
And that is for the subject and who to send it to

-LOZX

I cant be bothered to add more rn
