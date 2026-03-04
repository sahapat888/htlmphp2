<html>

<head>
    <title> Select to see Detail </title>
    </head>
<body>
    <?php
    require "connectre.php" ;
   $sql ="SELECT *
       FROM student AS s
       INNER JOIN register AS r ON s.StudentID = r.StudentID
       INNER JOIN register_detail AS rd ON r.regisID = rd.regisID
       INNER JOIN course AS c ON rd.CourseID = c.CourseID";

    $stmt =$conn->prepare($sql);
$stmt->execute();
?>

  <table width="1000" border="1">
          <tr>
            <th width="90">
                  <div align="center">รหัสนักศึกษา </div>
              </th>
              <th width="90">
                  <div align="center">ชื่อจริง </div>
              </th>

              <th width="50">
                  <div align="center">นามสกุล </div>
              </th>
            <th width="50">
                  <div align="center">รหัสวิชา </div>
              </th>

              <th width="200">
                  <div align="center">ชื่อวิชา </div>
              </th>
              <th width="50">
                  <div align="center">หน่วยกิต </div>
              </th>
              <th width="50">
                  <div align="center">เกรด </div>
              </th>
              </th>
          </tr>

          <?php
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>

              <tr>
                  <td>
                    
                    <a href ="detailREG.php?StudentID=<?php echo $result['StudentID']?>"><?php echo $result['StudentID']; ?>
                    </a> 
</td>
                 
                <td><?php echo  $result["student_Fname"]?></div>   </td>
                <td><?php echo  $result["student_Lname"]?></div></td>
                <td><?php echo  $result["CourseID"]?></div></td>
                <td><?php echo  $result["Course_name"]?></td>
                <td><?php echo  $result["Course_credit"]?></div></td>
                <td><?php echo  $result["grade"]?></div></td>

              </tr>

          <?php
          }
          ?>

      </table>

</body>
    
    </html>
