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
                    option.setAttribute("value" , data.userInfo[i]["id"] );
                    option.setAttribute("id" , "to_account");
                    option.innerText = data.userInfo[i]["firstName"];
                    option.setAttribute("name", data.userInfo[i]["id"] );
                    var select = document.getElementById("to_account");
                    console.log(option);
                    select.appendChild(option);
                    
                    
            }
            //GET SEND FROM PERSON;
           /* for(let i = 0; i < data.userInfo.length; i++){
                let option = document.createElement("option");
                option.setAttribute("value" , data.userInfo[i]["id"] );
                option.setAttribute("id" , "from_account" );
                option.innerText = data.userInfo[i]["firstName"];
                option.setAttribute("name", data.userInfo[i]["id"] );
                var select = document.getElementById("from_person");
                console.log(option);

                select.appendChild(option);
        } */

                
        })




    document.getElementById("submit").addEventListener("click", (event) =>{
    console.log("hello:O")
        if(event.target.id=="submit"){

       let from_account = document.getElementById('from_account').value;
	   let to_account = document.getElementById("to_account").value;
       let to_amount = document.getElementById("to_amount").value;
      
       console.log(from_account);
       console.log(to_account);
       console.log(to_amount);

       let data = {
           "from_account":from_account,
            "to_account":to_account,
            "to_amount":to_amount
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

        
          


