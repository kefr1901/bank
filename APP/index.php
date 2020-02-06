<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Bank</title>
</head>
<body>
    <div class="container">
        <div class="information">
         <h2>WELCOME TO MONEY TRANSFER!</h2>
            <hr>
             <form action="" method="post" id="sendMoney">
                <h3>From account ID</h3><br>
                    <select id="from_account"  class="select-css" required>
                        </select><br>
                            <p id="balance">
                              <h3>To Account ID</h3><br>
                                 <select id="to_account" class="select-css" requried>
                                     </select><br>
                                <h3>Pick amount to send $$</h3><br>
                            <input type="number" name="to_amount" id="to_amount" min=0 placeholder=""required ><br>
                        <hr>
                    <div id="message">
                 </div>
            <button type="submit" id="submit" name="submit">Send money $$</button>
         </form>
    </div>
</div>

<script src="./scripts/script.js"></script>
</body>
</html>