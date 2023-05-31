window.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById('myForm');
  
    form.addEventListener('submit', (event) => {
      event.preventDefault(); // Megakadályozza az alapértelmezett űrlapbeküldési viselkedést
  
      const companyName = document.getElementById('company_name').value;
      const taxNumber = document.getElementById('taxNumber').value;
      const phoneNumber = document.getElementById('phone_number').value;
      const companyEmail = document.getElementById('company_email').value;
  
      let isValid = true;
  
      // Cég nevének ellenőrzése
      if (companyName.trim() === '') {
        showError('company_name', 'A cég nevének megadása kötelező');
        isValid = false;
      } else {
        clearError('company_name');
      }
  
      // Adószám ellenőrzése
      if (taxNumber.trim() === '') {
        showError('taxNumber', 'Az adószám megadása kötelező');
        isValid = false;
      } else {
        clearError('taxNumber');
      }
  
      // Telefonszám ellenőrzése
      if (phoneNumber.trim() === '') {
        showError('phone_number', 'A telefonszám megadása kötelező');
        isValid = false;
      } else {
        clearError('phone_number');
      }
  
      // Cég e-mail címének ellenőrzése
      if (companyEmail.trim() === '') {
        showError('company_email', 'A cég e-mail címének megadása kötelező');
        isValid = false;
      } else if (!isValidEmail(companyEmail)) {
        showError('company_email', 'Érvénytelen e-mail cím');
        isValid = false;
      } else {
        clearError('company_email');
      }
  
      // Ha minden mező helyesen van kitöltve, elküldhetjük az űrlapot
      if (isValid) {
        form.submit();
      }
    });
  
    function showError(inputId, errorMessage) {
      const errorDiv = document.getElementById(inputId + '_error');
      errorDiv.textContent = errorMessage;
      errorDiv.style.color = 'red';
    }
  
    function clearError(inputId) {
      const errorDiv = document.getElementById(inputId + '_error');
      errorDiv.textContent = '';
    }
  
    function isValidEmail(email) {
      // E-mail validációs logika, pl. reguláris kifejezéssel
      // Itt csak egyszerű példa, ellenőrizd a valóságnak megfelelő módon
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });