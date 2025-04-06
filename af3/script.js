document.addEventListener("DOMContentLoaded", function(){
    // Liste d'utilisateurs simulée avec un solde pour chacun
    var users = [
      { id: 1, name: "Alice", balance: 1500 },
      { id: 2, name: "Bob", balance: 2200 },
      { id: 3, name: "Charlie", balance: 800 }
    ];
  
    var userSelect = document.getElementById("userSelect");
    var accountInfo = document.getElementById("accountInfo");
    var accountBalance = document.getElementById("accountBalance");
  
    // Remplissage de la liste des utilisateurs
    users.forEach(function(user) {
      var option = document.createElement("option");
      option.value = user.id;
      option.textContent = user.name;
      userSelect.appendChild(option);
    });
  
    // Affichage du solde et des boutons d'action lorsqu'un utilisateur est sélectionné
    userSelect.addEventListener("change", function(){
      var formDiv = document.getElementById("actionForm");
      var actionsDiv = document.getElementById("actions");
      if(userSelect.value !== "") {
        // Recherche de l'utilisateur sélectionné pour afficher le solde
        var selectedUser = users.find(function(user) {
          return user.id == userSelect.value;
        });
        if(selectedUser) {
          accountBalance.textContent = selectedUser.balance;
        }
        accountInfo.style.display = "block";
        actionsDiv.style.display = "block";
        formDiv.style.display = "none"; // Masquer le formulaire précédent
        formDiv.innerHTML = "";
      } else {
        accountInfo.style.display = "none";
        actionsDiv.style.display = "none";
        formDiv.style.display = "none";
        formDiv.innerHTML = "";
      }
    });
  
    // Gestion des clics sur les boutons d'action
    document.getElementById("withdrawBtn").addEventListener("click", function(){
      showForm("withdraw");
    });
  
    document.getElementById("depositBtn").addEventListener("click", function(){
      showForm("deposit");
    });
  
    document.getElementById("transferBtn").addEventListener("click", function(){
      showForm("transfer");
    });
  
    // Fonction qui affiche le formulaire en fonction de l'action
    function showForm(actionType) {
      var formDiv = document.getElementById("actionForm");
      formDiv.style.display = "block";
      var html = "";
  
      if(actionType === "withdraw" || actionType === "deposit") {
        html += '<h3>' + (actionType === "withdraw" ? "Retirer" : "Déposer") + ' de l\'argent</h3>';
        html += '<label>Montant :</label>';
        html += '<input type="number" id="amount" placeholder="Entrez le montant" />';
        html += '<button onclick="submitAction(\'' + actionType + '\')">' + (actionType === "withdraw" ? "Retirer" : "Déposer") + '</button>';
      } else if(actionType === "transfer") {
        html += '<h3>Transférer de l\'argent</h3>';
        html += '<label>Utilisateur bénéficiaire :</label>';
        html += '<select id="recipientSelect">';
        html += '<option value="">-- Sélectionnez --</option>';
        // Remplissage de la liste des bénéficiaires (exclusion de l’utilisateur actuellement sélectionné)
        var currentUser = document.getElementById("userSelect").value;
        users.forEach(function(user) {
          if(user.id != currentUser) {
            html += '<option value="' + user.id + '">' + user.name + '</option>';
          }
        });
        html += '</select>';
        html += '<label>Montant :</label>';
        html += '<input type="number" id="amount" placeholder="Entrez le montant" />';
        html += '<button onclick="submitAction(\'transfer\')">Transférer</button>';
      }
  
      formDiv.innerHTML = html;
    }
  
    // Fonction de soumission qui récupère les informations et affiche un message d'alerte
    window.submitAction = function(actionType) {
      var selectedUser = document.getElementById("userSelect").value;
      var amount = document.getElementById("amount").value;
      if (amount === "" || amount <= 0) {
        alert("Veuillez entrer un montant valide.");
        return;
      }
      if(actionType === "transfer") {
        var recipient = document.getElementById("recipientSelect").value;
        if (recipient === "") {
          alert("Veuillez sélectionner un bénéficiaire pour le transfert.");
          return;
        }
        alert("Transférer " + amount + " de l'utilisateur " + selectedUser + " vers l'utilisateur " + recipient + ".");
      } else if(actionType === "withdraw") {
        alert("Retirer " + amount + " de l'utilisateur " + selectedUser + ".");
      } else if(actionType === "deposit") {
        alert("Déposer " + amount + " sur le compte de l'utilisateur " + selectedUser + ".");
      }
    };
  });
  