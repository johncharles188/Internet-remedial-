<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Georgia', serif;
            background: #0f1117;
            color: #e8e0d0;
            min-height: 100vh;
        }

        /* NAV */
        nav {
            background: #1a1d27;
            border-bottom: 2px solid #c8a96e;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }
        nav .logo {
            font-size: 1.3rem;
            font-weight: bold;
            color: #c8a96e;
            letter-spacing: 1px;
        }
        nav ul { list-style: none; display: flex; gap: 2rem; }
        nav ul li a {
            color: #e8e0d0;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s;
        }
        nav ul li a:hover { color: #c8a96e; }

        /* MAIN CONTENT WRAPPER */
        .container {
            max-width: 1000px;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        h1 {
            font-size: 2rem;
            color: #c8a96e;
            margin-bottom: 0.4rem;
        }
        .subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">&#127979; UniRecords</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="students.php">Students</a></li>
        <li><a href="add_student.php">Add Student</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</nav>

<div class="container">
