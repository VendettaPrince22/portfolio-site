function validateForm() {
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const message = document.getElementById("message").value.trim();

  if (name.length < 2 || name.length > 100) {
    alert("Name must be between 2 and 100 characters.");
    return false;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  if (message.length < 5 || message.length > 1000) {
    alert("Message must be between 5 and 1000 characters.");
    return false;
  }

  return true;
}

document.addEventListener("DOMContentLoaded", function() {
  var modal = document.getElementById("myModal");
  var img = document.getElementById("profile-photo");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.textContent = "Kairo Prince";
  }
  
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() { 
    modal.style.display = "none";
  }
  
  // Close modal when clicking outside the image
  modal.onclick = function(event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  }
});