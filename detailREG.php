<html> <head>
<title> Display Selected Customer Information 65</title>
</head>
<body>

<?php
    $result = null; // กำหนดค่าเริ่มต้นเพื่อป้องกัน Undefined variable
    
    // 1. รับค่าโดยตัดช่องว่างออก และเช็คชื่อตัวแปรให้ตรงกับลิงก์
    if (isset($_GET["StudentID"])) {
        $strStudentID = trim($_GET["StudentID"]);
    } elseif (isset($_GET["StudentID_"])) { // เผื่อกรณีลิงก์ส่งมาแบบมีช่องว่าง
        $strStudentID = trim($_GET["StudentID_"]);
    }

    if (!empty($strStudentID)) {
        require "connectre.php";
        
        $sql = "SELECT *
               FROM student AS s
               INNER JOIN register AS r ON s.StudentID = r.StudentID
               INNER JOIN register_detail AS rd ON r.regisID = rd.regisID
               INNER JOIN course AS c ON rd.courseID = c.CourseID 
               WHERE s.StudentID = ?";
               
        $params = array($strStudentID);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<?php if ($result): ?>
    <table width="300" border="1">
      <tr>
        <th width="130">ชื่อจริง</th>
        <td><?php echo $result["student_Fname"]; ?></td>
      </tr>
      <tr>
        <th>นามสกุล</th>
        <td><?php echo $result["student_Lname"]; ?></td>
      </tr>
      <tr>
        <th>รหัสลงทะเบียน</th>
        <td><?php echo $result["regisID"]; ?></td>
      </tr>
      <tr>
        <th>เทอม</th>
        <td><?php echo $result["Term"]; ?></td>
      </tr>
      <tr>
        <th>ปี</th>
        <td><?php echo $result["years"]; ?></td>
      </tr>
    </table>
<?php else: ?>
    <p>ไม่พบข้อมูลนักศึกษารหัส: <?php echo htmlspecialchars($strStudentID); ?></p>
<?php endif; ?>


</body>
</html>
