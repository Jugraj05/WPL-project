

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style_contact.css">
</head>
<body>
    <div class="container">
        

            <form action="save.php" method="post">
                            <h3>GET IN TOUCH</h3>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email-ID" required>
            <input type="text" name="mobile" placeholder="Your Mobile Number" >
            <textarea name="comment" rows="4" placeholder="How can we help you?"required></textarea>
            <button type="submit">Send</button>
</form>
        
    </div>
</body>
</html>