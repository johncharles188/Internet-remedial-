<?php
// about.php
include 'includes/header.php';
?>

<h1>About This Project</h1>
<p class="subtitle">PHP &amp; XML Student Records Management System</p>

<div style="
    background: #1a1d27;
    border: 1px solid #333;
    border-radius: 8px;
    padding: 2rem;
    line-height: 1.8;
    color: #ccc;
">

    <h2 style="color:#c8a96e; margin-bottom:0.8rem; font-size:1.1rem;">&#128196; Project Overview</h2>
    <p style="margin-bottom:1.5rem;">
        This is a Student Records Management System built using <strong style="color:#e8e0d0;">PHP</strong>
        and <strong style="color:#e8e0d0;">XML</strong> as the data storage format.
        It demonstrates how PHP can read, display, filter, and write XML data
        without the need for a database like MySQL.
    </p>

    <h2 style="color:#c8a96e; margin-bottom:0.8rem; font-size:1.1rem;">&#9881; Technologies Used</h2>
    <ul style="margin-bottom:1.5rem; padding-left:1.5rem;">
        <li><strong style="color:#e8e0d0;">PHP</strong> &mdash; Server-side scripting language</li>
        <li><strong style="color:#e8e0d0;">XML</strong> &mdash; Data storage (students.xml)</li>
        <li><strong style="color:#e8e0d0;">SimpleXML</strong> &mdash; PHP built-in XML parser</li>
        <li><strong style="color:#e8e0d0;">DOMDocument</strong> &mdash; PHP XML formatter/writer</li>
        <li><strong style="color:#e8e0d0;">HTML5 &amp; CSS3</strong> &mdash; Frontend layout and styling</li>
    </ul>

    <h2 style="color:#c8a96e; margin-bottom:0.8rem; font-size:1.1rem;">&#128193; File Structure</h2>
    <pre style="
        background: #0f1117;
        border: 1px solid #333;
        border-radius: 5px;
        padding: 1rem;
        color: #6ab87a;
        font-size: 0.85rem;
        overflow-x:auto;
        margin-bottom:1.5rem;
    ">coursework/
├── index.php          ← Homepage with stats &amp; preview
├── students.php       ← View + filter all students
├── add_student.php    ← Form to add new student to XML
├── about.php          ← This page
├── data/
│   └── students.xml   ← XML data file
└── includes/
    ├── header.php     ← Shared navigation &amp; styles
    └── footer.php     ← Shared footer</pre>

    <h2 style="color:#c8a96e; margin-bottom:0.8rem; font-size:1.1rem;">&#128295; Key PHP Concepts Demonstrated</h2>
    <ul style="padding-left:1.5rem; margin-bottom:1.5rem;">
        <li>Reading XML with <code style="color:#c8a96e;">simplexml_load_file()</code></li>
        <li>Writing/updating XML with <code style="color:#c8a96e;">addChild()</code> and <code style="color:#c8a96e;">DOMDocument</code></li>
        <li>Form handling with <code style="color:#c8a96e;">$_POST</code> and <code style="color:#c8a96e;">$_GET</code></li>
        <li>Input validation and sanitization with <code style="color:#c8a96e;">htmlspecialchars()</code></li>
        <li>PHP includes for reusable components (<code style="color:#c8a96e;">header.php</code>, <code style="color:#c8a96e;">footer.php</code>)</li>
        <li>Looping through XML nodes with <code style="color:#c8a96e;">foreach</code></li>
        <li>Dynamic page content using <code style="color:#c8a96e;">date()</code> and computed values</li>
    </ul>

    <h2 style="color:#c8a96e; margin-bottom:0.8rem; font-size:1.1rem;">&#128640; How to Run</h2>
    <ol style="padding-left:1.5rem; color:#aaa;">
        <li>Place the <code style="color:#c8a96e;">coursework/</code> folder inside your server root (e.g. <code style="color:#c8a96e;">htdocs</code> for XAMPP)</li>
        <li>Start Apache in XAMPP / WAMP / LAMP</li>
        <li>Visit <code style="color:#c8a96e;">http://localhost/coursework/</code></li>
    </ol>

</div>

<?php include 'includes/footer.php'; ?>
