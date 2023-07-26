var isRequestPending = false;

function toggleLED() {
    if (isRequestPending) {
        return; // Avoid multiple requests before the previous one is complete
    }

    isRequestPending = true;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "control_led.php?command=toggle", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request successful, enable the button again
                isRequestPending = false;
            }
        }
    };

    xhr.send();
}

