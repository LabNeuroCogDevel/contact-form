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
    echo "Thank you! We will contact you shortly.";
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

<form action="https://lncd.pitt.edu/contact.php" method="post"
  onsubmit="return check_submit()"
>
<label for=name>First Name:</label>
  <input name=name type=text
      placeholder="Anjnulo" required></input><br>

<label for=age>Age:</label>
  <input id=age name=age type=text pattern="[0-9.]+" required placeholder="19"></input><br>
<label for=email>Email:</label>
  <input id=email name=email type=email
      placeholder="your@email.com"></input><br>

<label for=phone>Phone:</label>
  <input id=phone name=phone type=tel
         pattern=".?[0-9]{3}[^0-9]*[0-9]{3}.?[0-9]{4}"
         title="US 10 digit phone number"
         placeholder="555-867-5309"></input><br>

<div id="age_gate">
<small>We also need to contact a parent or guardian.<br>
Please provide an additional email and/or phone number for an adult.<br>
</small>
<label for=contact_name>Contact Name:</label>
  <input id=contact_name name=contact_name
      type=text
      placeholder="Sarah"></input><br>

<label for=email>Contact Email:</label>
  <input id=contact_email name=contact_email type=email
      placeholder="your@email.com"></input><br>

<label for=phone>Contact Phone:</label>
  <input id=contact_phone name=contact_phone type=tel
         pattern=".?[0-9]{3}[^0-9]*[0-9]{3}.?[0-9]{4}"
         title="US 10 digit phone number"
         placeholder="555-867-5309"></input><br>
</div>


<span id=message style=color:red></span>
<input type="submit" name="submit" value="Submit">
</form>
</body>
<script>
var age_gate = document.getElementById("age_gate");
age_gate.hidden=1;
var age = document.getElementById("age");

// toggle contact based on age
age.addEventListener('input', function (evt) {
   var curage=parseInt(this.value);
   if(!isNaN(curage) && curage<18){
      age_gate.hidden=0;
   } else {
      age_gate.hidden=1;
   }
});

function id_val(formid){
  return(document.getElementById(formid).value)
}

function validate_contacts(){
 curage = parseInt(age.value);
 if(curage<18){
    if(id_val("contact_name") == ""){
       return([false, 'We need a contact name']);
    }
    if(id_val("contact_phone") + id_val("contact_email")== "") {
       return([false, 'We need an additional contact phone or email']);
    }
 } else {
    if(id_val("phone") + id_val("email")== "") {
       return([false, 'We need your phone or email']);
    }
 }

 return([true,""])
}

function check_submit(){
   [okay, msg] = validate_contacts();
   document.getElementById("message").innerHTML = msg + "<br>";
   return(okay)
}
</script>
</html>

<?php 
}
?>
