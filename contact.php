<?php 
if(isset($_POST['submit'])){
    $to = "lncd@pitt.edu";
    $from ="lncd@pitt.edu"; 
    $subject = "[lncd.pitt.edu] contact request";
    // list out all the parameters that were submitted
    $message = urldecode(http_build_query($_POST,"\n","\n"));
    // and why not all the server header information we have
    $message .= "\n------\n" . urldecode(http_build_query(apache_request_headers(),"\n","\n"));

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "Thank you, we will contact you shortly.";
    //header('Location: https://lncd.pitt.edu/wp/thank-you/');
} else {
?>

<!DOCTYPE html>
<head>
<title>Contact the LNCD</title>
<style>
label {width: 150px; display:inline-block;}
</style>
<script>

</script>
</head>
<body>

<form action="https://lncd.pitt.edu/contact.php" method="post">
<label for=name>First Name:</label>
  <input name=name type=text
      placeholder="Anjnulo" required></input><br>

<label for=email>Email:</label>
  <input name=email type=email
      placeholder="your@email.com"></input><br>

<label for=phone>Phone:</label>
  <input name=phone type=tel
         pattern=".?[0-9]{3}[^0-9]*[0-9]{3}.?[0-9]{4}"
         title="US 10 digit phone number"
         placeholder="555-867-5309"></input><br>

<label for=age>Age:</label>
  <input name=age type=text pattern="[0-9.]+" required placeholder="19"></input><br>

<label style="width:90%" for=parent>Parent phone or email <small>if under 18yo</small>:</label> </br>
  <input style="margin-left:150px"
      name=parent
      type=text
      size=30
      placeholder="mom@email.com/555-555-5555"></input><br>

<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php 
}
?>
