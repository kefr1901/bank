// Documentlyssnare AJAX anrop till localhost/API/Index.php
//TA EMOT POST REQ FRÅN INDEX.PHP??
// SKICKA VIDARE TILL 


//API GET REQ TILL DATABASEN FÖR Att HÄMTA ALLA USERS
    fetch("http://localhost/bank/classes/api.php")
        .then(res => res.json())
        .then(data => {
          console.log(data.userInfo);

            // GET TO SEND PERSON
            for(let i = 0; i < data.userInfo.length; i++){
                    let option = document.createElement("option");
                    let option1 = document.createElement("option");
                    let p = document.createElement("p");

                    //p.setAttribute("value", data.userInfo[i]["balance"]);
                    //p.innerText = data.userInfo[i]["balance"];
                    option.setAttribute("value" , data.userInfo[i]["account_id"] );
                    //option.setAttribute("id" , data.userInfo[i]["balance"]);
                    option.innerText = data.userInfo[i]["firstName"] + " with balance: " + data.userInfo[i]["balance"];
                    option.setAttribute("name", data.userInfo[i]["balance"] );
                    option1.setAttribute("value" , data.userInfo[i]["account_id"] );
                   // option1.setAttribute("id" , data.userInfo[i]["balance"]);
                    option1.innerText = data.userInfo[i]["firstName"] + " with balance: " + data.userInfo[i]["balance"];
                    option1.setAttribute("name", data.userInfo[i]["balance"]);
                    //let balance = document.getElementById("balance");
                    var select = document.getElementById("to_account");
                    var select1 = document.getElementById("from_account");
                 
                    console.log(option);
                    select.appendChild(option);
                    select1.appendChild(option1);
                    //balance.appendChild(p);
                    
            }
           
                
        })




    document.getElementById("submit").addEventListener("click", (event) =>{
    console.log("hello:O")
        if(event.target.id=="submit"){

       let from_account = document.getElementById('from_account').value;
	   let to_account = document.getElementById("to_account").value;
       let to_amount = document.getElementById("to_amount").value;
     //  let balance_from_account = document.getElementById('from_account').getAttribute("name");

       

       console.log(from_account);
       console.log(to_account);
       console.log(to_amount);
       //console.log(balance_from_account);

       let data = {
           "from_account":from_account,
            "to_account":to_account,
            "to_amount":to_amount,
           // "balance_from_account":balance_from_account
            
            }
        
        fetch("http://localhost/bank/classes/api.php",{
            method : "POST",
            headers: {
                'Content-Type': 'application/json',
              },
            body: JSON.stringify(data)

             }).then((response) => {
                    return response.json();
                 }) .then((myJson) => {
                console.log(myJson);
                 });
  
                }

            });

        
          


