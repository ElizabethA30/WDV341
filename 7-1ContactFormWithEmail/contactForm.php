<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Gardens Contact Page</title>

    <style>
        body {
            max-width: 100%;
            margin: auto;
            background-color: #f5f7f8;
        }

        h1,
        h2,
        h3,
        p {
            color: #322C23;
        }

        header {
            padding: 0 20px 0 20px;
            background-color: #CED7DC;

        }

        .headerContainer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .headerNav ul {
            display: flex;
            list-style: none;
            margin: 0;
            gap: 25px;
        }

        .headerNav ul a {
            text-decoration: none;
            font-weight: 500;
            font-size: 20px;
            color: #322C23;
        }

        .content {
            border: #322C23 2px solid;
            border-radius: 15px;
            padding: 20px;
            margin: 50px auto 50px auto;
            max-width: 50%;
            background-color: #CFDBAB;
        }

        .content h2 {
            display: grid;
            justify-content: center;
        }

        textarea {
            width: 90%;
        }

        .grid_inputs input {
            width: 80%;
        }

        .email_input {
            display: grid;
            max-width: 400px;
            grid-template-columns: 80px auto;
            width: 43%;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 0px;
        }

        .grid_inputs {
            display: grid;
            max-width: 470px;
            grid-template-columns: 80px auto;
        }

        .full {
            grid-column: span 2;
        }

        .reasonStyle {
            padding-right: 10px;
        }

        .buttons {
            margin: auto;
            color: #477292;
        }

        #button,
        #button2 {
            background-color: #477292;
            color: white;
            margin: 0 10px;
            border: solid 2px #322C23;
            border-radius: 5px;
        }

        footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding: 0 20px 0 20px;
            background-color: #CED7DC;
        }

        .copyright {
            margin-top: 30px;
        }

        .socialMedia {
            display: flex;
            gap: 30px;
        }

        .submissionMessage{
            margin: auto;
            font-size: 20px;
            background-color: #f5f7f8;
            padding:0 5px;
            margin-top: 10px;
            /* border: solid 1px #322C23; */
            border-radius: 10px;
        }
    </style>


</head>

<body>

    <header>
        <div class="headerContainer">
            <h1>Urban Gardens</h1>

            <nav class="headerNav">
                <ul>
                    <li><a href="">Projects</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content">

        <h2>Reach out to start a project!</h2>

        <form action="formHandler.php" method="post">

            <p class="grid_inputs">
                <label class="labelwidth" for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name required" />
            </p>

            <p class="grid_inputs">
                <label class="labelwidth" for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" required />
            </p>

            <p class="email_input full">
                <label class="labelwidth" for="email">Email:</label>
                <input type="email" name="email" id="email" required />
            </p>

            <p class="full">
                <label class="reasonStyle" for="contactReason">Reason for Contacting</label>
                <select name="contactReason" id="contactReason" required>
                    <option value="">Please Select a Service</option>
                    <option value="Landscaping">Landscaping</option>
                    <option value="Rooftop Gardens">Rooftop Gardens</option>
                    <option value="Urban Gardens">Urban Gardens</option>
                    <option value="Outdoor Living">Outdoor Living</option>
                </select>
            </p>

            <p class="full">
                <label for="comments">Additional Comments</label> <br>
                <textarea id="comments" name="comments" rows="6"></textarea>
            </p>

            <p class="buttons full">
                <input type="submit" name="button" id="button" value="Submit" />
                <input type="reset" name="button2" id="button2" value="Reset" />
            </p>

            <div style="display:none;">
                <label for="">Website</label>
                <input type="text" name="website" id="website">
            </div>

            <div class="submissionMessage full">
                <?php

                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo "<p> We have successfully recieved your submission! </p>";
                }

                if (isset($_GET['status']) && $_GET['status'] == 'failEmail') {
                    echo "<p> Your email was not valid. Please Try Again. </p>";
                }

                if (isset($_GET['status']) && $_GET['status'] == 'failHoneypot') {
                    echo "<p> Your submission was not valid. Please Try Again.</p>";
                }
                ?>
            </div>

        </form>
    </div>


    <footer>
        <div>
            <h2>Urban Gardens</h2>
        </div>

        <div>
            <p class="copyright">Urban Gardens Ltd. Copyright 2026</p>
        </div>

        <div class="socialMedia">
            <img src="images/facebook.png" alt="Facebook" height="30px" width="30px">

            <img src="images/twitter.png" alt="X" height="30px" width="30px">
        </div>
    </footer>

</body>

</html>