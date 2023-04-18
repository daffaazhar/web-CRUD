function setFont() {
  const selectBox = document.getElementById("jurusan");
  selectBox.style.color = "#000000";
  selectBox.style.fontWeight = "400";
  selectBox.removeEventListener("click", setFont);
}
document.getElementById("jurusan").addEventListener("click", setFont);

function showToast() {
  const currentLocation = window.location.href;
  const toastClass = currentLocation === "http://localhost/web-daftar-mahasiswa/index.php" ? ".toast" : ".toast-warning";
  const progressClass = currentLocation === "http://localhost/web-daftar-mahasiswa/index.php" ? ".progress" : ".progress-warning";
  const toast = document.querySelector(toastClass);
  const progress = document.querySelector(progressClass);
  const closeIcon = document.querySelector(`${toastClass} .close`);
  console.log(toast);
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
