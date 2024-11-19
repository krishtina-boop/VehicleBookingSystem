function openBookingForm() {
    document.getElementById("bookingModal").style.display = "block";
}

function closeBookingForm() {
    document.getElementById("bookingModal").style.display = "none";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById("bookingModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
