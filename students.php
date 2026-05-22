<?php
// students.php - Display all students from XML
include 'includes/header.php';

$xmlFile = 'data/students.xml';
$xml = simplexml_load_file($xmlFile);

// Optional: filter by course using GET parameter
$filterCourse = isset($_GET['course']) ? trim($_GET['course']) : '';

// Collect unique courses for filter dropdown
$courses = array();
foreach ($xml->student as $student) {
    $c = (string)$student->course;
    if (!in_array($c, $courses)) $courses[] = $c;
}
?>

<h1>All Students</h1>
<p class="subtitle">Records loaded directly from <code style="color:#c8a96e;">data/students.xml</code></p>

<!-- FILTER FORM -->
<form method="GET" action="students.php" style="margin-bottom: 1.5rem; display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
    <label style="color:#999; font-size:0.9rem;">Filter by Course:</label>
    <select name="course" style="
        background: #1a1d27;
        border: 1px solid #444;
        color: #e8e0d0;
        padding: 0.4rem 0.8rem;
        border-radius: 4px;
    ">
        <option value="">All Courses</option>
        <?php foreach ($courses as $c): ?>
            <option value="<?php echo htmlspecialchars($c); ?>"
                <?php echo ($filterCourse === $c) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($c); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" style="
        background: #c8a96e;
        color: #0f1117;
        border: none;
        padding: 0.4rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    ">Filter</button>
    <?php if ($filterCourse): ?>
        <a href="students.php" style="color:#888; font-size:0.85rem;">Clear filter</a>
    <?php endif; ?>
</form>

<!-- STUDENTS TABLE -->
<table style="
    width: 100%;
    border-collapse: collapse;
    background: #1a1d27;
    border-radius: 8px;
    overflow: hidden;
">
    <thead>
        <tr style="background: #c8a96e; color: #0f1117;">
            <th style="padding: 0.8rem 1rem; text-align:left;">ID</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Name</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Course</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Year</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Grade</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        $shown = 0;
        foreach ($xml->student as $student) {
            // Apply course filter
            if ($filterCourse && (string)$student->course !== $filterCourse) {
                $count++;
                continue;
            }
            $bg = ($shown % 2 === 0) ? '#1a1d27' : '#20243a';
            echo "<tr style='background: $bg;'>";
            echo "<td style='padding: 0.7rem 1rem; color:#666;'>#" . htmlspecialchars((string)$student['id']) . "</td>";
            echo "<td style='padding: 0.7rem 1rem; font-weight:bold;'>" . htmlspecialchars((string)$student->name) . "</td>";
            echo "<td style='padding: 0.7rem 1rem; color:#aaa;'>" . htmlspecialchars((string)$student->course) . "</td>";
            echo "<td style='padding: 0.7rem 1rem;'>Year " . htmlspecialchars((string)$student->year) . "</td>";
            echo "<td style='padding: 0.7rem 1rem;'>
                    <span style='
                        background: #1e3d2a;
                        color: #6ab87a;
                        padding: 2px 8px;
                        border-radius: 12px;
                        font-weight:bold;
                        font-size:0.85rem;
                    '>" . htmlspecialchars((string)$student->grade) . "</span>
                  </td>";
            echo "<td style='padding: 0.7rem 1rem; color:#5b9bd5; font-size:0.85rem;'>" . htmlspecialchars((string)$student->email) . "</td>";
            echo "</tr>";
            $shown++;
            $count++;
        }

        if ($shown === 0) {
            echo "<tr><td colspan='6' style='padding: 1.5rem; text-align:center; color:#666;'>No students found for this filter.</td></tr>";
        }
        ?>
    </tbody>
</table>

<p style="color:#555; font-size:0.85rem; margin-top:1rem;">
    Showing <?php echo $shown; ?> student(s)
    <?php if ($filterCourse) echo " in <strong style='color:#c8a96e;'>" . htmlspecialchars($filterCourse) . "</strong>"; ?>
</p>

<?php include 'includes/footer.php'; ?>
