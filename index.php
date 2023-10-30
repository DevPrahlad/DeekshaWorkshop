<?php

$errorMessage = '';
$successMessage = ''; // Initialize the $successMessage variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate and sanitize user inputs
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    // Check if the username is already taken (you should implement this)
    $isUsernameTaken = false; // Replace with actual logic to check if the username exists in your database

    if ($isUsernameTaken) {
        $errorMessage = "Username already taken. Please choose another.";
    } else {
        // Hash the password securely (use a better hashing algorithm in production)


        // Store the registration data in the database (replace with your database connection logic)
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'erps';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $role);

        if ($stmt->execute()) {
            $successMessage = "Registration successful. You can now log in.";
            header("location:login.php");
        } else {
            $errorMessage = "Registration failed. Please try again.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


    <style>
        @charset "UTF-8";
        /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

        /*=============== VARIABLES CSS ===============*/
        :root {
            /*========== Colors ==========*/
            /*Color mode HSL(hue, saturation, lightness)*/
            --first-color: hsl(244, 75%, 57%);
            --second-color: hsl(249, 64%, 47%);
            --title-color: hsl(244, 12%, 12%);
            --text-color: hsl(244, 4%, 36%);
            --body-color: hsl(208, 97%, 85%);
            /*========== Font and typography ==========*/
            /*.5rem = 8px | 1rem = 16px ...*/
            --body-font: "Poppins", sans-serif;
            --h2-font-size: 1.25rem;
            --small-font-size: .813rem;
            --smaller-font-size: .75rem;
            /*========== Font weight ==========*/
            --font-medium: 500;
            --font-semi-bold: 600;
        }

        @media screen and (min-width: 1024px) {
            :root {
                --h2-font-size: 1.75rem;
                --normal-font-size: 1rem;
                --small-font-size: .875rem;
                --smaller-font-size: .813rem;
            }
        }

        /*=============== BASE ===============*/
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: var(--body-color);
            font-family: var(--body-font);
            color: var(--text-color);
        }

        input,
        button {
            font-family: var(--body-font);
            border: none;
            outline: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /*=============== LOGIN FORM ===============*/
        .login__content,
        .login__form,
        .login__inputs {

            display: grid;
        }

        .login__content {
            position: relative;
            height: 100vh;
            align-items: center;
        }

        .login__img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .login__form {
            position: relative;
            background-color: hsla(244, 16%, 92%, 0.6);
            border: 2px solid hsla(244, 16%, 92%, 0.75);
            margin-inline: 1.5rem;
            row-gap: 1.25rem;
            backdrop-filter: blur(20px);
            padding: 2rem;
            border-radius: 1rem;

        }

        #login-select {
            width: 15rem;
            height: 68%;
            padding: 14px 12px;
            border-radius: 6px;
            border: 2px solid var(--text-color);
            background-color: hsla(244, 16%, 92%, 0.6);
            color: var(--title-color);
            font-size: var(--smaller-font-size);
            font-weight: var(--font-medium);
            transition: border 0.4s;

        }

        #login-role {
            width: 100%;
            height: 68%;
            padding: 14px 12px;
            border-radius: 6px;
            border: 2px solid var(--text-color);
            background-color: hsla(244, 16%, 92%, 0.6);
            color: var(--title-color);
            font-size: var(--smaller-font-size);
            font-weight: var(--font-medium);
            transition: border 0.4s;

        }

        .login__title {
            color: var(--title-color);
            font-size: var(--h2-font-size);
            margin-bottom: 0.5rem;
        }

        .login__title span {
            color: var(--first-color);
        }

        .login__description {
            font-size: var(--small-font-size);
        }

        .login__inputs {
            row-gap: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .login__label {
            display: block;
            color: var(--title-color);
            font-size: var(--small-font-size);
            font-weight: var(--font-semi-bold);
            margin-bottom: 0.25rem;
        }

        .login__input {
            width: 100%;
            /* position: fixed; */
            padding: 14px 12px;
            border-radius: 6px;
            border: 2px solid var(--text-color);
            background-color: hsla(244, 16%, 92%, 0.6);
            color: var(--title-color);
            font-size: var(--smaller-font-size);
            font-weight: var(--font-medium);
            transition: border 0.4s;
        }

        #login-input {
            width: 120%;
            padding: 14px 12px;
            border-radius: 6px;
            border: 2px solid var(--text-color);
            background-color: hsla(244, 16%, 92%, 0.6);
            color: var(--title-color);
            font-size: var(--smaller-font-size);
            font-weight: var(--font-medium);
            transition: border 0.4s;
        }

        .login__input::placeholder {
            color: var(--text-color);
        }

        .login__input:focus,
        .login__input:valid {
            border: 2px solid var(--first-color);
        }

        .login__box {
            position: relative;
        }

        .login__box .login__input {
            padding-right: 36px;
        }

        .login__eye {
            width: max-content;
            height: max-content;
            position: absolute;
            right: 0.75rem;
            top: 0;
            bottom: 0;
            margin: auto 0;
            font-size: 1.25rem;
            cursor: pointer;
        }

        .login__check {
            display: flex;
            column-gap: 0.5rem;
            align-items: center;
        }

        .login__check-input {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid var(--text-color);
            background-color: hsla(244, 16%, 92%, 0.2);
            border-radius: 0.25rem;
        }

        .login__check-input:checked {
            background: var(--first-color);
        }

        .login__check-input:checked::before {
            content: "✔";
            display: block;
            color: #fff;
            font-size: 0.75rem;
            transform: translate(1.5px, -2.5px);
        }

        .login__check-label {
            font-size: var(--small-font-size);
        }

        .login__buttons {
            display: flex;
            column-gap: 0.75rem;
        }

        .login__button {
            width: 100%;
            padding: 14px 2rem;
            border-radius: 6px;
            background: linear-gradient(180deg, var(--first-color), var(--second-color));
            color: #fff;
            font-size: var(--small-font-size);
            font-weight: var(--font-semi-bold);
            box-shadow: 0 6px 24px hsla(244, 75%, 48%, 0.5);
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .login__button-ghost {
            background: hsla(244, 16%, 92%, 0.6);
            border: 2px solid var(--first-color);
            color: var(--first-color);
            box-shadow: none;
        }

        .login__forgot {
            font-size: var(--smaller-font-size);
            font-weight: var(--font-semi-bold);
            color: var(--first-color);
            text-decoration: none;
        }

        /*=============== BREAKPOINTS ===============*/
        /* For small devices */
        @media screen and (max-width: 360px) {
            .login__buttons {
                flex-direction: column;
            }

            #login-select {
                flex-direction: column;
            }
        }

        /* For medium devices */
        @media screen and (min-width: 300px) {
            .login__form {
                width: 600px;
                justify-self: center;
            }
        }

        /* For large devices */
        @media screen and (min-width: 1064px) {
            .container {
                height: 100vh;
                display: grid;
                place-items: center;
            }

            .login__content {
                width: 1024px;
                height: 600px;
            }

            .login__img {
                border-radius: 3.5rem;
                box-shadow: 0 24px 48px hsla(244, 75%, 36%, 0.45);
            }

            .login__form {
                justify-self: flex-end;
                margin-right: 4.5rem;
            }
        }

        @media screen and (max-width: 1200px) {
            .login__content {
                height: 700px;
            }

            .login__form {
                row-gap: 2rem;
                padding: 3rem;
                border-radius: 1.25rem;
                border: 2.5px solid hsla(244, 16%, 92%, 0.75);
            }

            .login__description,
            .login__label,
            .login__button {
                font-size: var(--normal-font-size);
            }

            .login__inputs {
                row-gap: 1.25rem;
                margin-bottom: 0.75rem;
            }

            .login__input {
                border: 2.5px solid var(--text-color);
                padding: 1rem;
                font-size: var(--small-font-size);
            }

            #login-select,
            #login-input #login-role {
                border: 2.5px solid var(--text-color);
                padding: 1rem;
                font-size: var(--small-font-size);
            }

            .login__input:focus,
            .login__input:valid {
                border: 2.5px solid var(--first-color);
            }

            .login__button {
                padding-block: 1rem;
                margin-bottom: 1.25rem;
            }

            .login__button-ghost {
                border: 2.5px solid var(--first-color);
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="login__content">
            <img src="bg-login.png" alt="login image" class="login__img">

            <form action="" method="POST" class="login__form">
                <div>
                    <h1 class="login__title">
                        <span>Register </span>User
                    </h1>
                    <p class="login__description">
                        <?php echo $errorMessage; ?>
                    </p>
                </div>

                <div>
                    <div class="login__inputs">
                        <div style="display:flex; gap:95px;">
                            <div>
                                <label for="input-name" class="login__label">Name</label>
                                <input type="email" name="name" placeholder="Enter your Name" required id="login-input">
                            </div>
                            <div>
                                <label for="input-Department" class="login__label">Department</label>
                                <select name="" id="login-select">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="input-role" class="login__label">Role</label>
                            <select name="" id="login-role">
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>


                        <div>
                            <label for="input-email" class="login__label">Email</label>
                            <input type="email" name="username" placeholder="Enter your email address" required class="login__input" id="input-email">
                        </div>

                        <div>
                            <label for="input-pass" class="login__label">Password</label>

                            <div class="login__box">
                                <input type="password" name="password" placeholder="Enter your password" required class="login__input" id="input-pass">
                                <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div>
                    <div class="login__buttons">
                        <button class="login__button" type="submit" value="login">Log In</button>

                    </div>


                </div>
            </form>
        </div>
    </div>


    <!--=============== MAIN JS ===============-->
    <script>
        /*=============== SHOW HIDDEN - PASSWORD ===============*/
        const showHiddenPass = (inputPass, inputIcon) => {
            const input = document.getElementById(inputPass),
                iconEye = document.getElementById(inputIcon)

            iconEye.addEventListener('click', () => {
                // Change password to text
                if (input.type === 'password') {
                    // Switch to text
                    input.type = 'text'

                    // Add icon
                    iconEye.classList.add('ri-eye-line')
                    // Remove icon
                    iconEye.classList.remove('ri-eye-off-line')
                } else {
                    // Change to password
                    input.type = 'password'

                    // Remove icon
                    iconEye.classList.remove('ri-eye-line')
                    // Add icon
                    iconEye.classList.add('ri-eye-off-line')
                }
            })
        }

        showHiddenPass('input-pass', 'input-icon')
    </script>
</body>

</html>