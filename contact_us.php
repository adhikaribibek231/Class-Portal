<?php
    session_start();
    include("config/db.php");
    include("include/header.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    

        $sql = "INSERT INTO inbox (name, phone_number, email, text_message) VALUES ('$name', '$phone', '$email', '$message')";
    
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
?>
<head>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet"> 
    <style>
    *{
        margin:0;
        padding:0;
        font-family: 'Varela Round', sans-serif;
    }
    body{
        background: #fff;
        font-size: 14px;
    }
    .container{
        width: 80%;
        margin: 10px auto;
        
    }
    .contact-box{
        background:#fff;
        display: flex;
        border:2px solid #e46435;
    }
    .contact-left{
        flex-basis:60%;
        padding:40px 60px;
    }
    .contact-right{
        flex-basis:40%;
        padding:40px;
        background: #9c310a;
        color: #fff;
        
    }
    h1{
        margin-bottom:10px;
    }
    .container p{
        margin-bottom:40px;
    }
    .input-row{
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .input-row .input-group{
        flex-basis: 45%;
    }
    input{
        width:100%;
        border:none;
        border-bottom: 1px solid #ccc;
        outline:none;
        padding-bottom: 5px;
    }
    textarea{
        width: 100%;
        border:1px solid #ccc;
        outline: none;
        padding: 10px;
        box-sizing: border-box;
    }
    label{
        margin-bottom: 6px;
        display: block;
        color:#1c00b5;
    }
    button{
        background: #ff4200;
        box-shadow: 0 7px 20px 0 rgba(226, 36, 22, 0.137);
        width: 100px;
        color: #fff;
        border: none;
        outline: none;
        border-radius: 30px;
        margin-top: 20px;
        height: 35px;
        cursor:pointer;
    }
    .contact-left h3{
        color: #1c00b5;
        font-weight: 600;
        margin-bottom: 30px;
    }
    .contact-right h3{
        font-weight: 600;
        margin-bottom: 30px;
    }
    button:hover {
    box-shadow: 0 7px 20px 0 rgba(214, 43, 31, 0.52);
    }
    button:onclick{
        opacity: 0.5;
    }
    tr td:first-child{
        padding-right:20px;
    }
    tr td{
        padding-top: 20px;
    }
</style></head>
<body>
    <div class="container">
        <h1>Connect With Us</h1>
        <p>We would love to respond to your queries and help you succeed. Feel free to get in touch with us.</p>
        <div class="contact-box">
        <div class="contact-left">
            <h3>Sent your Request</h3>
            <form action="" method="post">
                <div class="input-row">
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Eg. Bibek Adhikari" required>
                    </div>
                    <div class="input-group">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Eg. +977980000000" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Eg. bibek@gmail.com" required>
                    </div>
                </div>
                <label>Message</label>
                <textarea rows="5" name="message" placeholder="Your Message" required></textarea>
                <button type="submit">SEND</button>
            </form>
        </div>
        <div class="contact-right">
            <h3>Reach Us</h3>
            <table>
                <tr>
                    <td>Address</td>
                    <td>Putalisadak, Kathmandu</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>+977 9800 000 000</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>admin@gmail.com</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</body>
<?php  include("include/footer.php"); ?>