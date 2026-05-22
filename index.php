<?php
// index.php - Homepage
include 'includes/header.php';

// Load and parse the XML file
$xmlFile = 'data/students.xml';
$xml = simplexml_load_file($xmlFile);

// Count total students
$totalStudents = count($xml->student);

// Count unique courses
$courses = array();
foreach ($xml->student as $student) {
    $courses[] = (string)$student->course;
}
$uniqueCourses = count(array_unique($courses));
?>

<h1>Welcome to UniRecords</h1>
<p class="subtitle">A simple student records management system powered by PHP &amp; XML</p>

<!-- STATS CARDS -->
<div style="display: flex; gap: 1.5rem; margin-bottom: 2.5rem; flex-wrap: wrap;">

    <div style="
        background: #1a1d27;
        border: 1px solid #c8a96e;
        border-radius: 8px;
        padding: 1.5rem 2rem;
        flex: 1;
        min-width: 180px;
    ">
        <div style="font-size: 2.5rem; font-weight: bold; color: #c8a96e;"><?php echo $totalStudents; ?></div>
        <div style="color: #999; margin-top: 4px;">Total Students</div>
    </div>

    <div style="
        background: #1a1d27;
        border: 1px solid #4a7c59;
        border-radius: 8px;
        padding: 1.5rem 2rem;
        flex: 1;
        min-width: 180px;
    ">
        <div style="font-size: 2.5rem; font-weight: bold; color: #6ab87a;"><?php echo $uniqueCourses; ?></div>
        <div style="color: #999; margin-top: 4px;">Courses Offered</div>
    </div>

    <div style="
        background: #1a1d27;
        border: 1px solid #3a6080;
        border-radius: 8px;
        padding: 1.5rem 2rem;
        flex: 1;
        min-width: 180px;
    ">
        <div style="font-size: 2.5rem; font-weight: bold; color: #5b9bd5;">4</div>
        <div style="color: #999; margin-top: 4px;">Year Levels</div>
    </div>

</div>

<!-- RECENT STUDENTS PREVIEW -->
<h2 style="color:#c8a96e; margin-bottom: 1rem; font-size:1.2rem;">Recent Students</h2>

<table style="
    width: 100%;
    border-collapse: collapse;
    background: #1a1d27;
    border-radius: 8px;
    overflow: hidden;
">
    <thead>
        <tr style="background: #c8a96e; color: #0f1117;">
            <th style="padding: 0.8rem 1rem; text-align:left;">Name</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Course</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Year</th>
            <th style="padding: 0.8rem 1rem; text-align:left;">Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        foreach ($xml->student as $student) {
            if ($count >= 3) break; // Show only first 3
            $bg = ($count % 2 === 0) ? '#1a1d27' : '#20243a';
            echo "<tr style='background: $bg;'>";
            echo "<td style='padding: 0.75rem 1rem;'>" . htmlspecialchars((string)$student->name) . "</td>";
            echo "<td style='padding: 0.75rem 1rem; color:#999;'>" . htmlspecialchars((string)$student->course) . "</td>";
            echo "<td style='padding: 0.75rem 1rem;'>Year " . htmlspecialchars((string)$student->year) . "</td>";
            echo "<td style='padding: 0.75rem 1rem; color:#6ab87a; font-weight:bold;'>" . htmlspecialchars((string)$student->grade) . "</td>";
            echo "</tr>";
            $count++;
        }
        ?>
    </tbody>
</table>

<div style="margin-top: 1.2rem;">
    <a href="students.php" style="
        display: inline-block;
        background: #c8a96e;
        color: #0f1117;
        padding: 0.6rem 1.4rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.9rem;
    ">View All Students &rarr;</a>
</div>

<?php include 'includes/footer.php'; ?>
