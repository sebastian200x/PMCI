// JavaScript function to open the modal and fetch details
function openModal(id) {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';
    // Add event listener for the Esc key
    document.addEventListener('keydown', closeModalOnEsc);
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
    // Remove event listener for the Esc key
    document.removeEventListener('keydown', closeModalOnEsc);
}

function closeModalOnEsc(event) {
    var modal = document.getElementById('myModal');
    if (event.key === 'Escape') {
        modal.style.display = 'none';
        // Remove event listener after closing the modal
        document.removeEventListener('keydown', closeModalOnEsc);
    }
}

window.onclick = function (event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = 'none';
        // Remove event listener if modal is closed by clicking outside
        document.removeEventListener('keydown', closeModalOnEsc);
    }
}

function approveStudent(id) {
    // Send an AJAX request to the server
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Display an alert with the server response
            alert(this.responseText);

            // Refresh the page
            window.location.reload();
        }
    };
    xhttp.open("POST", "../functions.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=approve&id=" + id);
}