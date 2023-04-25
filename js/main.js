function setFont() {
  const selectBox = document.getElementById("jurusan");
  selectBox.style.color = "#000000";
  selectBox.removeEventListener("click", setFont);
}
document.getElementById("jurusan").addEventListener("click", setFont);

function showToast() {
  const currentLocation = window.location.href;
  const toastClass = currentLocation == "http://localhost/web-daftar-mahasiswa/index.php" || currentLocation == "http://localhost/web-daftar-mahasiswa/form/login.php" ? ".toast" : ".toast-warning";
  const progressClass = currentLocation == "http://localhost/web-daftar-mahasiswa/index.php" || currentLocation == "http://localhost/web-daftar-mahasiswa/form/login.php" ? ".progress" : ".progress-warning";
  const toast = document.querySelector(toastClass);
  const progress = document.querySelector(progressClass);
  const closeIcon = document.querySelector(`${toastClass} .close`);
  toast.classList.add("active");
  progress.classList.add("active");

  setTimeout(() => {
    toast.classList.remove("active");
  }, 5000);
  setTimeout(() => {
    progress.classList.remove("active");
  }, 5300);

  closeIcon.addEventListener("click", () => {
    toast.classList.remove("active");
    setTimeout(() => {
      progress.classList.remove("active");
    }, 300);
  });
}

function imagePreview() {
  var fileInput = document.getElementById("gambar");
  var preview = document.getElementById("image-preview");
  var file = fileInput.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function validateInput(inputName) {
  const inputValue = document.getElementById(inputName).value;
  const messageDiv = document.getElementById(`${inputName}-message`);
  const submitButton = document.getElementById("submit-button");
  let errorMessages = [];

  switch (inputName) {
    case "username":
      if (inputValue === "" || inputValue.length < 8) {
        errorMessages.push("Username minimal terdiri dari 8 karakter");
      }
      break;

    case "email":
      const emailRegex = /^\S+@\S+\.\S+$/;
      if (!emailRegex.test(inputValue)) {
        errorMessages.push("Masukkan email yang valid");
      }
      break;

    case "password":
      const passwordValue = inputValue.trim();
      if (passwordValue.length < 8) {
        errorMessages.push("Password minimal terdiri dari 8 karakter");
      }
      break;

    case "confirmPassword":
      const passwordValue2 = document.getElementById("password").value.trim();
      if (inputValue !== passwordValue2) {
        errorMessages.push("Konfirmasi password tidak cocok");
      }
      break;
  }

  if (errorMessages.length > 0) {
    messageDiv.innerHTML = `
    <div class="flex items-center mt-2 gap-x-2">
      <i class='bx bxs-error-circle text-red-600'></i>
      <p class='text-sm text-red-600'>${errorMessages.join("<br>")}</p>
    </div>`;
    submitButton.disabled = true;
    return;
  } else {
    submitButton.disabled = false;
  }

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      messageDiv.innerHTML = this.responseText;
      if (this.responseText.includes("error")) {
        submitButton.disabled = true;
      } else {
        submitButton.disabled = false;
      }
    }
  };
  xhr.open("GET", `../validator/checkInput.php?inputName=${inputName}&${inputName}=${inputValue}`, true);
  xhr.send();
}

function togglePasswordVisibility(inputFieldId) {
  const inputField = document.getElementById(inputFieldId);
  const eyeIcon = document.querySelector(`#${inputFieldId} ~ .eye-icon`);

  if (inputField.type === "password") {
    inputField.type = "text";
    eyeIcon.classList.remove("bx-hide");
    eyeIcon.classList.add("bx-show");
  } else {
    inputField.type = "password";
    eyeIcon.classList.remove("bx-show");
    eyeIcon.classList.add("bx-hide");
  }
}

function searchData() {
  const keyword = document.getElementById("keyword");
  const tableContainer = document.getElementById("table-container");

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      tableContainer.innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", `./controller/search.php?keyword=${keyword.value}`, true);
  xhr.send();
}
