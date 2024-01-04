<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AutoAvenue</title>
    <style>
        body {
            align-items: center;
            background: url('./images/indexbg.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form {
            background-color:  #0d1822;
            border-radius: 20px;
            box-sizing: border-box;
            height: 400px;
            padding: 20px;
            width: 320px;
        }

        .title {
            color: #812828;
            font-family: sans-serif;
            font-size: 30px;
            font-weight: 600;
            margin-top: 30px;
            text-align: center;
        }

        .input-container {
            height: 50px;
            position: relative;
            width: 100%;
        }

        .input {
            background-color: #ade3e7;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100%;
        }

        .ic1 {
            margin-top: 40px;
        }
        
        .ic2 {
            margin-top: 30px;
        }

        .placeholder {
            color: #000000;
            font-family: sans-serif;
            left: 20px;
            line-height: 14px;
            pointer-events: none;
            position: absolute;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            top: 20px;
        }

        .cut {
            background-color: #000000;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            transform: translateY(0);
            transition: transform 200ms;
            width: 76px;
        }

        .input:focus ~ .cut,
        .input:not(:placeholder-shown) ~ .cut {
            transform: translateY(8px);
        }

        .input:focus ~ .placeholder,
        .input:not(:placeholder-shown) ~ .placeholder {
            transform: translateY(-30px) translateX(10px) scale(0.75);
        }
        
        .input:not(:placeholder-shown) ~ .placeholder {
            color: #ffffff;
        }
        
        .input:focus ~ .placeholder {
            color: #ff0037;
        }

        .submit, .reset {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            outline: 0;
            text-align: center;
            width: 49%;
            margin-top: 15px;
        }
        
        .submit:active, .reset:active {
            background-color: #06b;
        }
    </style>
</head>
<body>
    <form class="form" action="login.php" method="post">
        <h2 class="title"> AutoAvenue</h2>
        <div class="input-container ic1">
            <input class="input" type="email" name="email" required>
            <div class="cut"></div>
            <label for="email" class="placeholder">Email</label>
        </div>
        <div class="input-container ic2">
            <input class="input" type="password" name="password" required>
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</label>
        </div>
        <button class="submit" type="submit">Login</button>
    </form>
</body>
</html>
