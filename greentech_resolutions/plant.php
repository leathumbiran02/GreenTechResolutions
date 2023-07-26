<?php
    //Starting the session so we can che^ck if the user is logged in:
    session_start();

    //Checking if the email address is stored in the session:
    if(!isset($_SESSION['email'])){
        echo "<script>alert('You must be logged in to view this page.')</script>";
        header('Refresh: 1; url=login_register.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: GreenTechResolutions-->
        <title>GreenTechResolutions</title>

        <!--Using a CSS style sheet for the page-->
        <link rel="stylesheet" href="style.css">

        <style>
            .hero{ /* Centering the text: */
                text-align: center;
            }

            .card {
                width: 300px;
                height: 200px;
                margin: 0 auto;
                margin-left: 50px;
                padding: 10px;
                border: 3px solid black;
                border-radius: 10px;
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
                position: relative;
                perspective: 1000px;
                margin-right: 300px;
            }

            .card button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 40px;
                background-color: #343A54; 
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 17px;
                font-weight: bolder;
                border: 3px solid black;
            }
            .card button:hover {
                background-color: #09BA20; /* Change to your preferred background color on hover */
                color: #000546; /* Change to your preferred text color on hover */
                border: 3px solid black;
            }

            .cards-wrapper {
                display: flex;
            }
            .card h2 {
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                color: #000546; 
            }
            .card h5 {
                font-size: 16px;
                text-align: center;
                margin-bottom: 10px;
                color: #000546; 
            }

            .first-row {
                margin-bottom: -10px;
            }



            /* Styling for the grid container */
            .grid-container {
                display: grid;
                margin-top: 30px;
                grid-template-columns: auto 110px 110px 110px;
                grid-template-rows:  auto 115px 115px 115px;
                /* Collapses the borders of the grid cells */
                border-collapse: collapse;
            }

            /* Styling for grid cells */
            .grid-item {
                padding: 8px;
                border: 1px solid black; /* Adds a black border to all grid cells */
            }

            /* Styling for labels (A, B, C, 1, 2, 3) */
            .label {
                font-weight: bold; /* Makes the text bold */
                text-align: center; /* Centers the text horizontally */
            }

            /* Styling for the top row of labels (A, B, C) */
            .label-top,
            .label-left {
                border: none; /* Removes the borders for the labels on the top row and the left column */
            }

            /* New class to remove borders for A, B, and C */
            .label-letter {
                border: none; /* Removes the borders for A, B, and C cells */
            }

            .grid-item img {
                width: 100px;
                height: 100px; 
            }
            .grid-item {
                font-size: 20px; /* Set the font size to 20 pixels */
            }

            /* New CSS rule to make the labels (A, B, C, 1, 2, 3) bigger */
            .label {
                font-size: 20px; /* Set the font size to 24 pixels */
            }
            table {
                margin: 0 auto; /* Sets left and right margins to "auto", which centers the table */
            }
        </style>
    </head>
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>

        <table>
            <tr>
                <td>
                    <div class="grid-container">
                            <!-- Top row of labels -->
                            <div class="grid-item label label-top"></div> <!-- Empty cell to position the top-left corner -->
                            <div class="grid-item label label-letter">A</div> <!-- Label "A" in the top row -->
                            <div class="grid-item label label-letter">B</div> <!-- Label "B" in the top row -->
                            <div class="grid-item label label-letter">C</div> <!-- Label "C" in the top row -->

                            <!-- First column of labels -->
                            <div class="grid-item label label-left">1</div> <!-- Label "1" in the left column -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/1253289278/vector/cannabis-leaf-illustration.jpg?s=612x612&w=0&k=20&c=bOLtnIMxjRN11mri8vf9IC2Wwqyo7V8DirUKw1v9gS0=" alt="weed leaf"></div> <!-- Content in the cell corresponding to row 1 and column "A" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/181072765/photo/lettuce-isolated-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=axHLN2tckTBwUBZEsd1-LNhnQZ_LMWEGmMBLRVe1qwQ=" alt="lettuce"></div> <!-- Content in the cell corresponding to row 1 and column "B" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/941825808/photo/tomato-isolated-tomato-on-white-background-with-clipping-path-full-depth-of-field.jpg?s=612x612&w=0&k=20&c=FOo7yfEpxmdTHYBHVr2og-nE_m4mib32rYxZQxUARbs=" alt="tomato"></div> <!-- Content in the cell corresponding to row 1 and column "C" -->

                            <!-- Second column of labels -->
                            <div class="grid-item label label-left">2</div> <!-- Label "2" in the left column -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/1253289278/vector/cannabis-leaf-illustration.jpg?s=612x612&w=0&k=20&c=bOLtnIMxjRN11mri8vf9IC2Wwqyo7V8DirUKw1v9gS0=" alt="weed leaf"></div> <!-- Content in the cell corresponding to row 2 and column "A" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/181072765/photo/lettuce-isolated-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=axHLN2tckTBwUBZEsd1-LNhnQZ_LMWEGmMBLRVe1qwQ=" alt="lettuce"></div> <!-- Content in the cell corresponding to row 2 and column "B" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/941825808/photo/tomato-isolated-tomato-on-white-background-with-clipping-path-full-depth-of-field.jpg?s=612x612&w=0&k=20&c=FOo7yfEpxmdTHYBHVr2og-nE_m4mib32rYxZQxUARbs=" alt="tomato"></div> <!-- Content in the cell corresponding to row 2 and column "C" -->

                            <!-- Third column of labels -->
                            <div class="grid-item label label-left">3</div> <!-- Label "3" in the left column -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/1253289278/vector/cannabis-leaf-illustration.jpg?s=612x612&w=0&k=20&c=bOLtnIMxjRN11mri8vf9IC2Wwqyo7V8DirUKw1v9gS0=" alt="weed leaf"></div> <!-- Content in the cell corresponding to row 3 and column "A" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/181072765/photo/lettuce-isolated-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=axHLN2tckTBwUBZEsd1-LNhnQZ_LMWEGmMBLRVe1qwQ=" alt="lettuce"></div> <!-- Content in the cell corresponding to row 3 and column "B" -->
                            <div class="grid-item"><img src="https://media.istockphoto.com/id/941825808/photo/tomato-isolated-tomato-on-white-background-with-clipping-path-full-depth-of-field.jpg?s=612x612&w=0&k=20&c=FOo7yfEpxmdTHYBHVr2og-nE_m4mib32rYxZQxUARbs=" alt="tomato"></div> <!-- Content in the cell corresponding to row 3 and column "C" -->
                    </div>
                </td>
                <td>
                    <div class ="card">
                            <h2>PLANT INFO</h2>
                            <h5>Select plant</h5>

                            <!--only display when plant is selected JS code-->
                            <table> 
                                <th>
                                    <td>
                                        <h5>Position:</h5>
                                    </td>
                                    <td>
                                        <h5>3A</h5>
                                    </td>
                                </th>
                             </table>

                    </div>
                 </td>
                 <td>
                    <div class ="card">
                        <h2 id="lightStatus">LED Light</h2>
                        <h5 id="onOffStatus">Light OFF</h5>
                        <button id="toggleButton" onclick="toggleLight()">ON</button>
                    </div>

                 </td>
            </th>
        </table>
        <script>
           function toggleLight() {
                var button = document.getElementById('toggleButton');
                var h5Element = document.getElementById('onOffStatus');

                // Disable the button temporarily to prevent multiple clicks
                button.disabled = true;

                // Make an AJAX request to the PHP file
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText === '1') {
                            button.textContent = 'OFF';
                            h5Element.innerHTML = 'Light ON';
                        } else {
                            button.textContent = 'ON';
                            h5Element.innerHTML = 'Light OFF';
                        }

                        // Re-enable the button after receiving the response
                        button.disabled = false;
                    }
                };
                xhr.open("GET", "control_led.php", true);
                xhr.send();
            }
        </script>
    </body>
</html>