<?php
// add_student.php - Form to add a new student to the XML file
$message = '';
$msgType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name   = trim(htmlspecialchars($_POST['name']));
    $course = trim(htmlspecialchars($_POST['course']));
    $year   = (int)$_POST['year'];
    $grade  = trim(htmlspecialchars($_POST['grade']));
    $email  = trim(htmlspecialchars($_POST['email']));

    // Basic validation
    if (empty($name) || empty($course) || empty($grade) || empty($email)) {
        $message = 'Please fill in all fields.';
        $msgType = 'error';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $msgType = 'error';
    } else {
        // Load XML
        $xmlFile = 'data/students.xml';
        $xml = simplexml_load_file($xmlFile);

        // Get new ID (max existing + 1)
        $maxId = 0;
        foreach ($xml->student as $s) {
            $id = (int)$s['id'];
            if ($id > $maxId) $maxId = $id;
        }
        $newId = $maxId + 1;

        // Add new student node
        $newStudent = $xml->addChild('student');
        $newStudent->addAttribute('id', $newId);
        $newStudent->addChild('name',   $name);
        $newStudent->addChild('course', $course);
        $newStudent->addChild('year',   $year);
        $newStudent->addChild('grade',  $grade);
        $newStudent->addChild('email',  $email);

        // Format and save XML
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($xmlFile);

        $message = "Student \"$name\" added successfully with ID #$newId!";
        $msgType = 'success';
    }
}

include 'includes/header.php';
?>

<h1>Add New Student</h1>
<p class="subtitle">This form writes a new record directly into <code style="color:#c8a96e;">students.xml</code></p>

<?php if ($message): ?>
<div style="
    padding: 1rem 1.2rem;
    border-radius: 6px;
    margin-bottom: 1.5rem;
    background: <?php echo $msgType === 'success' ? '#1e3d2a' : '#3d1e1e'; ?>;
    border-left: 4px solid <?php echo $msgType === 'success' ? '#6ab87a' : '#e07070'; ?>;
    color: <?php echo $msgType === 'success' ? '#6ab87a' : '#e07070'; ?>;
">
    <?php echo $message; ?>
    <?php if ($msgType === 'success'): ?>
        &nbsp;&nbsp;<a href="students.php" style="color:#c8a96e;">View All Students &rarr;</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- FORM -->
<form method="POST" action="add_student.php" style="
    background: #1a1d27;
    border: 1px solid #333;
    border-radius: 8px;
    padding: 2rem;
    max-width: 560px;
">
    <?php
    $fields = array(
        array('name', 'Full Name', 'text', 'e.g. John Doe'),
        array('course', 'Course', 'text', 'e.g. Computer Science'),
        array('grade', 'Grade', 'text', 'e.g. A, B+, C'),
        array('email', 'Email', 'email', 'e.g. student@uni.ac.ug'),
    );
    foreach ($fields as $f):
        $val = isset($_POST[$f[0]]) ? htmlspecialchars($_POST[$f[0]]) : '';
    ?>
    <div style="margin-bottom: 1.2rem;">
        <label style="display:block; color:#aaa; font-size:0.85rem; margin-bottom:0.4rem;">
            <?php echo $f[1]; ?> <span style="color:#e07070;">*</span>
        </label>
        <input
            type="<?php echo $f[2]; ?>"
            name="<?php echo $f[0]; ?>"
            placeholder="<?php echo $f[3]; ?>"
            value="<?php echo $val; ?>"
            style="
                width: 100%;
                background: #0f1117;
                border: 1px solid #444;
                color: #e8e0d0;
                padding: 0.6rem 0.9rem;
                border-radius: 5px;
                font-size: 0.95rem;
                outline: none;
            "
        >
    </div>
    <?php endforeach; ?>

    <!-- Year dropdown -->
    <div style="margin-bottom: 1.5rem;">
        <label style="display:block; color:#aaa; font-size:0.85rem; margin-bottom:0.4rem;">
            Year <span style="color:#e07070;">*</span>
        </label>
        <select name="year" style="
            width: 100%;
            background: #0f1117;
            border: 1px solid #444;
            color: #e8e0d0;
            padding: 0.6rem 0.9rem;
            border-radius: 5px;
            font-size: 0.95rem;
        ">
            <?php for ($y = 1; $y <= 4; $y++): ?>
                <option value="<?php echo $y; ?>"
                    <?php echo (isset($_POST['year']) && (int)$_POST['year'] === $y) ? 'selected' : ''; ?>>
                    Year <?php echo $y; ?>
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <button type="submit" style="
        background: #c8a96e;
        color: #0f1117;
        border: none;
        padding: 0.7rem 1.8rem;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    ">Add Student to XML</button>
</form>

<?php include 'includes/footer.php'; ?>
