<?php
include ('connect.php');
if(isset($_POST['submit'])){
    
	$book_name=$_POST['bookname'];
	$name=$_POST['name'];
	$idnum=$_POST['id-number'];
    $date=$_POST['deliver-date'];
    }
    
    $select_user="SELECT * FROM borrow WHERE book='$book_name' ";
    $user_result = $conn->query($select_user);
    $row = $user_result->fetch_assoc();
    $count_user=$user_result->num_rows;

    $select_student="SELECT * FROM student WHERE name='$name' ";
    $student_result = $conn->query($select_student);
    $row1 = $student_result->fetch_assoc();
    $count_student=$student_result->num_rows;

//    $select_num="SELECT * FROM student WHERE num='$idnum' ";
//    $num_result = $conn->query($select_num);
//    $row2 = $num_result->fetch_assoc();
//    $count_num=$num_result->num_rows;


  //  print_r($count_user);

//    print_r($count_student);
    //print_r($count_num);


  if ($count_user === 0 and $count_student === 0 ) {
     header("Location: ../borrow.php?error");
    }else{
    $borrow="INSERT INTO borrow(book, date, name, cardnum) VALUES ('$book_name','$date','$name','$idnum')";
    $result = $conn->query($borrow);
    //print_r($result);
     header("Location: ../index.php");
    }
?>