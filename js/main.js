function setFont() {
  const selectBox = document.getElementById("jurusan");
  selectBox.style.color = "#000000";
  selectBox.style.fontWeight = "400";
  selectBox.removeEventListener("click", setFont);
}
document.getElementById("jurusan").addEventListener("click", setFont);

function showToast() {
  const toast = document.querySelector(".toast");
  const closeIcon = document.querySelector(".close");
  const progress = document.querySelector(".progress");
  toast.classList.add("active");
  progress.classList.add("active");

  setTimeout(function () {
    toast.classList.remove("active");
  }, 5000);
  setTimeout(function () {
    progress.classList.remove("active");
  }, 5300);

  closeIcon.addEventListener("click", function () {
    toast.classList.remove("active");
    setTimeout(function () {
      progress.classList.remove("active");
    }, 300);
  });
}
