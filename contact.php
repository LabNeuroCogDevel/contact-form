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
</head>
<body>

<form action="https://lncd.pitt.edu/contact.php" method="post">
<label for=name>First Name:</label>
  <input name=name type=text
      placeholder="Anjnulo" required></input><br>

<label for=age>Age:</label>
  <input id=age name=age type=text pattern="[0-9.]+" required placeholder="19"></input><br>

<div id="age_gate">
<small>For participants under 18 years old, we are required to communicate with a parent or guardian.<br>
Please provide contact information for an adult we can contact.<br>
</small>
<label for=contact_name>Contact Name:</label>
  <input name=contact_name
      type=text
      placeholder="Sarah"></input><br>
</div>

<label for=email>Contact Email:</label>
  <input name=email type=email
      placeholder="your@email.com"></input><br>

<label for=phone>Contact Phone:</label>
  <input name=phone type=tel
         pattern=".?[0-9]{3}[^0-9]*[0-9]{3}.?[0-9]{4}"
         title="US 10 digit phone number"
         placeholder="555-867-5309"></input><br>


<input type="submit" name="submit" value="Submit">
</form>
</body>
<script>
var age_gate = document.getElementById("age_gate");
var age = document.getElementById("age");

age.addEventListener('input', function (evt) {
   if(parseInt(this.value)>=18){
      age_gate.hidden=1;
   } else {
      age_gate.hidden=0;
   }
});
</script>
</html>

<?php 
}
?>
