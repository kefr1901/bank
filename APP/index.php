<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>WELCOME TO MONEY TRANSFER!</h2>
    <form action="" method="post" id="sendMoney">
        <label>From account ID</label><br>
        <select id="from_account" required>

        </select><br>

        <p id="balance">


        
        <label>To Account ID</label><br>
       <select id="to_account" requried>

       </select><br>
        <label>Pick amount to send $$</label><br>
            <input type="number" name="to_amount" id="to_amount" min=0 placeholder="No Limit"required ><br>

            <button type="submit" id="submit" name="submit">Send that money!</button>

</form>

<script src="./scripts/script.js"></script>
</body>
</html>