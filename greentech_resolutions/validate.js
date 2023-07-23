/* --------------------------------------------------LOGIN_REGISTER.PHP JAVASCRIPT:------------------------------------------------------------------------------------ */
    //Variables used for login_register.php to shift the 2 forms:
    var x=document.getElementById("login");
    var y=document.getElementById("register");
    var z=document.getElementById("btn");

    function login(){ /* If the user clicks on Login, shift the form into view and hide the other form: */
        x.style.left="50px";
        y.style.left ="450px";
        z.style.left = "0";
    }

    function register(){ /* If the user clicks on Register, shift the form into view and hide the other form: */
        x.style.left="-400px";
        y.style.left ="50px";
        z.style.left = "110px";
    }       

    //Validate the registration form before sending the details to the database:
    function validate_registration(){

        if(document.register_form.full_name.value.trim() == ""){//If Full Name is empty:
            alert("Please enter your full name.");
            document.register_form.full_name.focus();
            return false;
        }
        if(document.register_form.email.value.trim() == ""){ //If Email Address is empty:
            alert("Please enter your email address.");
            document.register_form.email.focus();
            return false;
        }
        if(document.register_form.pass.value.trim() == ""){ //If Password empty:
            alert("Please enter your password.");
            document.register_form.pass.focus();
            return false;
        }
        if(document.register_form.confirm_pass.value.trim() == ""){ //If Confirm Password is empty:
            alert("Please confirm your password.");
            document.register_form.confirm_pass.focus();
            return false;
        }
        if(document.register_form.bot_id.value.trim() == ""){ //If BOT ID is empty:
            alert("Please enter your BOT ID number.");
            document.register_form.bot_id.focus();
            return false;
        }

        var agree_checkbox=document.getElementById("agree_checkbox"); /* Store the agree to the terms and conditions checkbox from the regisration form: */
        
        if (!agree_checkbox.checked){ /* If the box is left unchecked upon submission display an alert to the user: */
            alert("Please agree to the terms and conditions before registering.");
            return false; //Prevent the form from being submitted:
        }

        return true; //Alow the form to be submitted once the checkbox is checked:
    }

    //Validate the login form before sending the details to the database:
    function validate_login(){
        if(document.login_form.email.value.trim() == ""){ //If Email Address is empty:
            alert("Please enter your email address.");
            document.login_form.email.focus();
            return false;
        }
        if(document.login_form.password.value.trim() == ""){ //If Password empty:
            alert("Please enter your password.");
            document.login_form.password.focus();
            return false;
        }
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------CONTACT_US.PHP JAVASCRIPT:----------------------------------------------------------------------------------------- */
    
    //Validate the contact us form before sending the details to the database:
    function validate_contact_us(){
        if(document.contact_us.full_name.value.trim() == ""){ //If Full Name is empty:
            alert("Please enter your full name.");
            document.contact_us.full_name.focus();
            return false;
        }
        if(document.contact_us.email.value.trim() == ""){ //If Email Address is empty:
            alert("Please enter your email address.");
            document.contact_us.email.focus();
            return false;
        }
        if(document.contact_us.comments.value.trim() == ""){ //If Comments is empty:
            alert("Please enter any comments.");
            document.contact_us.comments.focus();
            return false;
        }
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------CHAT.PHP JAVASCRIPT:----------------------------------------------------------------------------------------------- */
    //Function to validate the chat form:
    function validate_chat_form(){
        if(document.chat.full_name.value.trim() === ""){ //If Full Name is empty:
            alert("Please enter your full name.");
            document.chat.full_name.focus();
            return false;
        }
        if(document.chat.email.value.trim() === ""){ //If Email Address is empty:
            alert("Please enter your email address.");
            document.chat.email.focus();
            return false;
        }

        var reasonSelect = document.getElementById("reasonSelect");

        if(reasonSelect.value === ""){ //If reason for contacting is empty:
            alert("Please select a reason for contacting.");
            reasonSelect.focus();
            return false;
        }
        if(reasonSelect.value === "Other"){//If they selected Other:

            var otherReasonInput = document.getElementById("otherReasonInput");

            if(otherReasonInput.value.trim() == ""){ //If they didn't type anything in the Other text box:
                alert("Please specify the reason for contacting us.");
                document.chat.email.focus();
                return false;
            }
        }
    }

    //Function to show/hide a text field when submitting a chat form:
    function toggleOtherReason(){
        var reasonSelect = document.getElementById('reasonSelect');
        var otherReasonInput = document.getElementById('otherReasonInput');

        if(reasonSelect.value === "Other"){
            otherReasonInput.style.display = 'block';
        }else{
            otherReasonInput.style.display = 'none';
        }
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------MANAGE_BOT_IP.PHP JAVASCRIPT:--------------------------------------------------------------------------------------- */
    //Function to validate the bot ip form:
    function validate_bot_ip(){
        if(document.bot_ip.bot_ip.value.trim()===""){ //If BOT IP is empty:
            alert("Please enter your BOT IP.");
            document.bot_ip.bot_ip.focus();
            return false;
        }
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------ADD_FISH.PHP JAVASCRIPT:-------------------------------------------------------------------------------------------- */
    //Function to validate the add a fish form:
    function validate_add_fish(){
        if(document.community_fish.fish_name.value.trim()==""){ //If Fish Name is empty:
            alert("Please enter the name of the fish.");
            document.community_fish.fish_name.focus();
            return false;
        }

        if(document.community_fish.description.value.trim()==""){ //If Fish Name is empty:
            alert("Please enter a description of the fish.");
            document.community_fish.description.focus();
            return false;
        }

        if(document.community_fish.image.value.trim()==""){ //If Fish Image is empty:
            alert("Please enter the link to the image of the fish.");
            document.community_fish.image.focus();
            return false;
        }

        if(document.community_fish.price.value.trim()==""){ //If Price is empty:
            alert("Please enter a price for the fish.");
            document.community_fish.price.focus();
            return false;
        }

        return true; //Alow the form to be submitted once it has passed all checks:
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------ADD_PLANT.PHP JAVASCRIPT:------------------------------------------------------------------------------------------ */
    //Function to validate the add a plant form:
    function validate_add_plant(){
        if(document.community_plant.plant_name.value.trim()==""){ //If Plant Name is empty:
            alert("Please enter the name of the plant.");
            document.community_plant.plant_name.focus();
            return false;
        }

        if(document.community_plant.description.value.trim()==""){ //If Plant Name is empty:
            alert("Please enter a description of the plant.");
            document.community_plant.description.focus();
            return false;
        }

        if(document.community_plant.image.value.trim()==""){ //If Plant Image is empty:
            alert("Please enter the link to the image of the plant.");
            document.community_plant.image.focus();
            return false;
        }

        if(document.community_plant.price.value.trim()==""){ //If Price is empty:
            alert("Please enter a price for the fish.");
            document.community_fish.price.focus();
            return false;
        }

        return true; //Alow the form to be submitted once it has passed all checks:
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------COMMUNITY.PHP JAVASCRIPT:------------------------------------------------------------------------------------------ */
    //Function to handle fish and plant search:
    function searchProducts() {
        var input, filter, div, product, i, txtValue;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        div = document.getElementById('products');
        product = div.getElementsByClassName('product');

        for (i = 0; i < product.length; i++) {
            txtValue = product[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                product[i].style.display = '';
            } else {
                product[i].style.display = 'none';
            }
        }
    }

    //function to shift between the fish and plant page:
    function plants(){ 
        t.style.left = "110px";

        //Fetch the fish from the server and update the page:
        fetch('get_community_plant.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('products').innerHTML = data;
            })
            .catch(error =>{
                console.error('Error fetching fish: ', error);
            });
    }  

    //function to shift between the fish and plant page:
    var t=document.getElementById("btn");

    function fish(){ /* If the user clicks on Login, shift the form into view and hide the other form: */
        t.style.left = "0";

        //Fetch the fish from the server and update the page:
        fetch('get_community_fish.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('products').innerHTML = data;
            })
            .catch(error =>{
                console.error('Error fetching fish: ', error);
            });
    }
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------TANK.PHP JAVASCRIPT:----------------------------------------------------------------------------------------------- */
    // Function to set the fish feeder timer based on user input:
    function setFishFeederTimer() {
        let feedTimeInput = document.getElementById("feedTimeInput").value;
        let currentTime = new Date();
        let feedTime = new Date(currentTime.toDateString() + " " + feedTimeInput);
    
        // If the user has selected a time in the past, set the timer for the next day:
        if (feedTime.getTime() <= currentTime.getTime()) {
            feedTime.setDate(feedTime.getDate() + 1);
        }
    
        // Calculate the time difference in milliseconds:
        let timerDuration = feedTime.getTime() - currentTime.getTime();
    
        // Update the displayed timer value without starting the timer:
        updateDisplayedTimerValue(feedTime.getTime());
    
        // Store the timer value in LocalStorage:
        localStorage.setItem("fishFeederTimer", feedTime.getTime());
    
        //Send an AJAX request to the server to update the database:
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "update_timer.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Request successful:
            let updatedTimerValue = xhr.responseText; //Get the response from update_timer.php:
            if(updatedTimerValue){
                // Update the timer with the updated value:
                startTimer(parseInt(updatedTimerValue));
                //Update the value in localStorage:
                localStorage.setItem("fishFeederTimer", updatedTimerValue);
            }
        }
    };
        xhr.send("timerValue=" + feedTime.getTime());
    }

    // Function to update the timer based on the fetched value:
    function updateTimerWithFetchedValue(timerValue) {
        let currentTime = new Date().getTime();
        let remainingTime = timerValue - currentTime;
    
        if (remainingTime < 0) { // Timer has ended:
            document.querySelector(".timer").textContent = "It's time to feed the fish!";
        } else {
                let hours = Math.floor(remainingTime / (1000 * 60 * 60));
                let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
    
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
    
                // Display the timer:
                document.querySelector(".timer").textContent = hours + ":" + minutes + ":" + seconds;
            }
    
        // Start the timer with the updated value:
        startTimer(timerValue);
    }
     
    // Add an event listener to fetch the timer value and update the timer once the page is loaded:
    window.addEventListener("load", function() {
        // Check if the timer value is stored in LocalStorage:
        let storedTimerValue = localStorage.getItem("fishFeederTimer");

        if (storedTimerValue) {
            // If the timer value is found in LocalStorage, fetch the timer value from the server:
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "get_timer.php", true);
            xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let timerValue = parseInt(xhr.responseText);
                if (!isNaN(timerValue)) {
                    // Update the timer with the fetched value:
                    if (storedTimerValue === xhr.responseText) {
                        // If the timer is already running with the stored value, start the timer with it:
                        startTimer(timerValue);
                    } else {
                        // If the timer is not running with the stored value, update the displayed timer value:
                        updateDisplayedTimerValue(timerValue);
                    }

                    // Store the fetched value in localStorage:
                    localStorage.setItem("fishFeederTimer", timerValue);
                }
            }
        };
            xhr.send();
        } else { // If the timer value is not found in LocalStorage, fetch it from the server:
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "get_timer.php", true);
            xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let timerValue = parseInt(xhr.responseText);
                if (!isNaN(timerValue)) {
                    // Update the timer with the fetched value:
                    updateDisplayedTimerValue(timerValue);
                    // Store the fetched value in localStorage:
                    localStorage.setItem("fishFeederTimer", timerValue);
                }
            }
        };
            xhr.send();
        }
    });

    // Global variable to hold the timer interval ID:
    let timerInterval;

    // Function to update the displayed timer value without starting the timer:
    function updateDisplayedTimerValue(timerValue) {
        let currentTime = new Date().getTime();
        let remainingTime = timerValue - currentTime;

        if (remainingTime < 0) { // Timer has ended:
            document.querySelector(".timer").textContent = "It's time to feed the fish!";
        } else {
            let hours = Math.floor(remainingTime / (1000 * 60 * 60));
            let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Display the timer:
            document.querySelector(".timer").textContent = hours + ":" + minutes + ":" + seconds;
        }
    }

    // Timer function:
 // Timer function:
function startTimer(targetTime) {
    function updateTimer() {
        let currentTime = new Date().getTime();
        let remainingTime = targetTime - currentTime;

        if (remainingTime < 1000) {
            // Timer has ended
            clearInterval(timerInterval);
            document.querySelector(".timer").textContent = "It's time to feed the fish!";
            // Display the message for 20 seconds (20,000 milliseconds) before resetting the timer:
            setTimeout(() => {
                document.querySelector(".timer").textContent = "00:00:00";
                // Restart the timer for the next day using the previous targetTime value:
                let nextDay = new Date(targetTime);
                nextDay.setDate(nextDay.getDate() + 1);
                startTimer(nextDay.getTime());
            }, 20000);
        } else {
            let hours = Math.floor(remainingTime / (1000 * 60 * 60));
            let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Display the timer
            document.querySelector(".timer").textContent = hours + ":" + minutes + ":" + seconds;
        }

        // Store the fetched value in LocalStorage:
        localStorage.setItem("fishFeederTimer", targetTime); // Updated from timerValue to targetTime:
    }

    // Call the updateTimer immediately to show the initial timer value:
    updateTimer();

    // Clear the previous timer interval if it exists:
    clearInterval(timerInterval);

    updateTimer(); // Update immediately to avoid the initial 1-second delay:
    timerInterval = setInterval(updateTimer, 1000); // Update every second:

    // Store the fetched value in LocalStorage:
    localStorage.setItem("fishFeederTimer", targetTime); // Updated from timerValue to targetTime:
}

/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ 
