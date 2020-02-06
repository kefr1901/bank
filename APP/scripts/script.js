

    ///////////API AJAX GET//////////
    fetch("http://localhost/bank/API/api.php")
    .then(res => res.json())
    .then(data => {
      console.log(data.userInfo);
      for(let i = 0; i < data.userInfo.length; i++){
      let option = document.createElement("option");
      let option1 = document.createElement("option");
      option.setAttribute("value" , data.userInfo[i]["account_id"] );
      option.innerText = data.userInfo[i]["firstName"] + " with balance: " + data.userInfo[i]["balance"];
      option.setAttribute("name", data.userInfo[i]["balance"] );
      option1.setAttribute("value" , data.userInfo[i]["account_id"] );
      option1.innerText = data.userInfo[i]["firstName"] + " with balance: " + data.userInfo[i]["balance"];
      option1.setAttribute("name", data.userInfo[i]["balance"]);
      var select = document.getElementById("to_account");
      var select1 = document.getElementById("from_account");
      select.appendChild(option);
      select1.appendChild(option1);     
      }  
   })

      document.getElementById("sendMoney").addEventListener("click", (event) =>{
      event.preventDefault();
      event.stopPropagation();
      
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
            "to_amount":to_amount,
        }
        
        fetch("http://localhost/bank/API/api.php",{
            method : "POST",
            headers: {
                'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
        }).then((response) => {
           return response.json();
        }) .then((myJson) => {
        console.log(myJson);
        document.getElementById("message").textContent=myJson.message;
         });
        }
     });        

        
          


