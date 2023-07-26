<!-- Your existing HTML content... -->

<script>
    function toggleLight() {
        var button = document.getElementById('toggleButton');
        var h5Element = document.getElementById('onOffStatus');

        // Send the toggle command to the server via AJAX
        var action = button.textContent;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the button and status text based on the server response
                if (action === 'ON') {
                    button.textContent = 'OFF';
                    h5Element.innerHTML = 'Light ON';
                } else {
                    button.textContent = 'ON';
                    h5Element.innerHTML = 'Light OFF';
                }
            }
        };
        xhttp.open("POST", "led_control.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=" + action);
    }
</script>
</body>
</html>
