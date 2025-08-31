const firebaseConfig = {
  apiKey: "AIzaSyAS4kOAW_i9OsNDysjd2jJ95rponIfzU84",
  authDomain: "formulario-cb495.firebaseapp.com",
  databaseURL: "https://formulario-cb495-default-rtdb.firebaseio.com",
  projectId: "formulario-cb495",
  storageBucket: "formulario-cb495.appspot.com",
  messagingSenderId: "1018240488746",
  appId: "1:1018240488746:web:a9bc4e7f0bb1fcf2943a53",
  measurementId: "G-S14JZN7R2E"
  };
// initialize firebase
firebase.initializeApp(firebaseConfig);

// Referencia a la base de datos
var contactFormDB = firebase.database().ref("contactForm");

function getElementVal(id) {
  return document.getElementById(id).value;
}

function saveMessages(name, emailid, msgContent) {
  return new Promise((resolve, reject) => {
    var newContactForm = contactFormDB.push();

    newContactForm.set({
      name: name,
      emailid: emailid,
      msgContent: msgContent,
    })
    .then(() => {
      resolve();
    })
    .catch((error) => {
      reject(error);
    });
  });
}

function submitForm(e) {
  e.preventDefault();

  var submitButton = document.querySelector("button[type='submit']");
  submitButton.disabled = true;

  var name = getElementVal("name");
  var emailid = getElementVal("emailid");
  var msgContent = getElementVal("msgContent");

  if (submitButton.textContent === "Enviar Mensaje") {
    saveMessages(name, emailid, msgContent)
      .then(function() {
        submitButton.disabled = false;
        document.querySelector(".alert").style.display = "block";
        setTimeout(() => {
          document.querySelector(".alert").style.display = "none";
        }, 3000);
        document.getElementById("contactForm").reset();
        showSentMessages();
      })
      .catch(function(error) {
        submitButton.disabled = false;
        console.error("Error al guardar los datos:", error);
      });
  } else if (submitButton.textContent === "Actualizar") {
    var messageKey = submitButton.getAttribute("data-key");
    updateMessage(messageKey);
  }
}

function showSentMessages() {
  contactFormDB.once("value")
    .then(function(snapshot) {
      document.querySelector(".message-container").innerHTML = "";

      snapshot.forEach(function(childSnapshot) {
        var messageData = childSnapshot.val();
        var messageKey = childSnapshot.key;
        var messageHTML = `
          <div class="message">
            <h3>${messageData.name}</h3>
            <p>${messageData.emailid}</p>
            <p>${messageData.msgContent}</p>
            <button class="edit-btn" data-key="${messageKey}" onclick="editMessage(this)">Editar</button>
            <button class="delete-btn" data-key="${messageKey}" onclick="deleteMessage(this)">Eliminar</button>
          </div>
        `;
        document.querySelector(".message-container").innerHTML += messageHTML;
      });
    })
    .catch(function(error) {
      console.error("Error al obtener los datos:", error);
    });
}

function editMessage(button) {
  var messageKey = button.getAttribute("data-key");
  var messageRef = contactFormDB.child(messageKey);

  messageRef.once("value")
    .then(function(snapshot) {
      var messageData = snapshot.val();
      document.getElementById("name").value = messageData.name;
      document.getElementById("emailid").value = messageData.emailid;
      document.getElementById("msgContent").value = messageData.msgContent;

      var submitButton = document.querySelector("button[type='submit']");
      submitButton.textContent = "Actualizar";
      submitButton.setAttribute("data-key", messageKey);
      submitButton.removeEventListener("click", submitForm);
      submitButton.addEventListener("click", function(e) {
        e.preventDefault();
        updateMessage(messageKey);
      });
    })
    .catch(function(error) {
      console.error("Error al obtener los datos para editar:", error);
    });
}

function updateMessage(messageKey) {
  var name = getElementVal("name");
  var emailid = getElementVal("emailid");
  var msgContent = getElementVal("msgContent");

  var messageRef = contactFormDB.child(messageKey);

  messageRef.update({
    name: name,
    emailid: emailid,
    msgContent: msgContent,
  })
    .then(function() {
      console.log("Mensaje actualizado exitosamente.");
      document.getElementById("contactForm").reset();
      var submitButton = document.querySelector("button[type='submit']");
      submitButton.textContent = "Enviar";
      submitButton.removeAttribute("data-key");
      submitButton.removeEventListener("click", updateMessage);
      submitButton.addEventListener("click", submitForm);
      showSentMessages();
    })
    .catch(function(error) {
      console.error("Error al actualizar el mensaje:", error);
    });
}

function deleteMessage(button) {
  var messageKey = button.getAttribute("data-key");
  var messageRef = contactFormDB.child(messageKey);

  messageRef.remove()
    .then(function() {
      console.log("Mensaje eliminado exitosamente.");
      showSentMessages();
    })
    .catch(function(error) {
      console.error("Error al eliminar el mensaje:", error);
    });
}

showSentMessages();

document.getElementById("contactForm").addEventListener("submit", submitForm);
