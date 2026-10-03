<?php

/*
Warning:
	The majority of this file was generated with the help of
	Google Gemini.
*/

$servername = "sqli-db";
$username = "root";
$password = "pass";
$dbname = "sqli";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully using MySQLi";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Market - Daily Fruit Rates</title>
    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #f0fdf4 0%, #e0f2fe 100%);
            --card-bg: rgba(255, 255, 255, 0.85);
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --accent-green: #10b981;
            --accent-green-hover: #059669;
            --accent-glow: rgba(16, 185, 129, 0.25);
            --card-border: rgba(255, 255, 255, 0.6);
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            --input-bg: rgba(255, 255, 255, 0.7);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
                --card-bg: rgba(30, 41, 59, 0.8);
                --text-primary: #f8fafc;
                --text-secondary: #94a3b8;
                --card-border: rgba(255, 255, 255, 0.1);
                --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
                --input-bg: rgba(15, 23, 42, 0.6);
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg-gradient);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .market-container {
            width: 100%;
            max-width: 620px;
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 36px;
            box-shadow: var(--shadow);
        }

        .header-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .intro-text {
            font-size: 1.05rem;
            line-height: 1.6;
            color: var(--text-secondary);
            margin-bottom: 28px;
        }

        .fruit-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .fruit-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 16px;
            text-align: center;
        }

        .fruit-icon {
            font-size: 2.2rem;
            margin-bottom: 8px;
            display: block;
        }

        .fruit-name {
            font-weight: 700;
            text-transform: capitalize;
            color: var(--text-primary);
        }

        .prompt-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .choices-hint {
            color: var(--text-secondary);
            font-weight: 500;
        }

        .market-form {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .input-wrapper {
            position: relative;
            flex-grow: 1;
        }

        input[type="text"] {
            width: 100%;
            padding: 14px 18px;
            font-size: 1rem;
            border-radius: 14px;
            border: 1px solid var(--card-border);
            background: var(--input-bg);
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus {
            border-color: var(--accent-green);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }

        input[type="submit"] {
            padding: 14px 28px;
            font-size: 1rem;
            font-weight: 600;
            background: var(--accent-green);
            color: #ffffff;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            box-shadow: 0 4px 12px var(--accent-glow);
            transition: background-color 0.2s, transform 0.1s;
        }

        input[type="submit"]:hover {
            background: var(--accent-green-hover);
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        @media (max-width: 480px) {
            .market-form {
                flex-direction: column;
            }

            .market-container {
                padding: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="market-container">
        <div class="header-bar">
            <span>🍎</span>
            <span>Fresh Market</span>
        </div>

        <p class="intro-text">
            Check what types of fruits we have! To give you the best deals, we are selling these fruits with market rates.
        </p>

        <div class="fruit-grid">
            <div class="fruit-card">
                <span class="fruit-icon">🍓</span>
                <div class="fruit-name">Strawberry</div>
            </div>
            <div class="fruit-card">
                <span class="fruit-icon">🍎</span>
                <div class="fruit-name">Apple</div>
            </div>
            <div class="fruit-card">
                <span class="fruit-icon">🍌</span>
                <div class="fruit-name">Banana</div>
            </div>
        </div>

        <!-- Pure HTML Form for Backend POST handling -->
        <label for="fruit" class="prompt-label">
            Enter the fruit here, and we will give you the market rate: 
            <span class="choices-hint">(choices are strawberry, apple, banana)</span>
        </label>

        <form action="" method="post" class="market-form">
            <div class="input-wrapper">
                <input type="text" name="fruit" id="fruit" autocomplete="off" placeholder="e.g. strawberry">
            </div>
            <input type="submit" value="Submit">
        </form><br>
        <label for="fruit" class="prompt-label"> 
            The price is: <span class="choices-hint">
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sql = 'SELECT price FROM fruit WHERE name = "'.$_POST['fruit'].'"'; // this is the vulnerability
	error_log($sql); // see why its bad here
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		echo $row['price'] . "<br>";
	}
	
	
}

// SELECT price FROM fruit WHERE name = "" UNION SELECT  NULL FROM fruit --"
// SELECT price FROM fruit WHERE name = "" UNION SELECT email FROM users --

?>
	</span></label>
    </div>

</body>
</html>

