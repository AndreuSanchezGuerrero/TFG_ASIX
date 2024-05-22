function validateForm() {
    const usuario = document.getElementsByName("usuari")[0].value;
    const contrasenya = document.getElementsByName("password")[0].value;
    const errorCreds = document.getElementById("error-credenciales");
    const formulari = document.getElementById('formulari')
    let error = false;

    formulari.addEventListener("submit", function(event) {
        // Prevent the default form submission
        event.preventDefault();

        //Treure els missatges d'error
        errorCreds.innerHTML = "";

        // Validar campos
        if (usuario === "") {
            errorCreds.innerHTML += "Correu electrònic no pot estar buit.<br>";
            error = true;
        }

        // Validar formato de correo electrónico
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(usuario) && usuario !== "") {
            errorCreds.innerHTML += "Format de correu electrònic incorrecte.<br>";
            error = true;
        }

        if (contrasenya === "") {
            errorCreds.innerHTML += "Contrasenya no pot estar buida.<br>";
            error = true;
        }

        if (!error) {
            formulari.submit();
        }
    })
}

//function onSignIn(googleUser) {
//    var profile = googleUser.getBasicProfile();
//    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
//    console.log('Name: ' + profile.getName());
//    console.log('Image URL: ' + profile.getImageUrl());
//    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
//    }