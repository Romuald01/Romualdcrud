<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

if(isset($_POST['create'])){
  createData();
}

if(isset($_POST['read'])){
    getData();
}
if(isset($_POST['update'])){
    updateData();
}
if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();
}

function createData(){
    $bookname = textboxValue('book_name');
    $bookpublisher = textboxValue('book_publisher');
    $bookprice = textboxValue('book_price');


    if($bookname && $bookpublisher && $bookprice){

        $sql="INSERT INTO books(book_name,book_publisher,book_price)
        VALUES('$bookname','$bookpublisher',$bookprice)";

        if(mysqli_query($GLOBALS['con'],$sql)){
            echo "Record successfully inserted..!";
        }else{
            echo "error";
        }
            
    }else{
        TextNode("error","Provide Data In The Textbox");
    }
} 
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if (empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

// messages
function TextNode($classname,$msg){
    $element ="<h6 class='$classname'>$msg</h6>";  
    echo $element;
}


// get data from mysql datsbase
function getData(){
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result) > 0 ){                 
        return $result;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
     }
}

function updateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
    $sql="UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid';";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Data Successfuly Updated");
        }else{
            TextNode("error","Unable to Update Data");
        }
    }else{
        TextNode("error","Select Data Using Edit Icon");   
    }
}

function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql="DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Record Deleted Successfully...");
    }else{
        TextNode("error","Unable to Delete Record");  
    }
}

function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall","btn btn-danger","<i class='fas fa-trash'></i><span class=\"deleteall\">Delete All</span>","deleteall","");
                return;
            }
        }
    }
}

function deleteAll(){
    $sql="DROP TABLE books";
    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","All Record Deleted Successfully");
        Createdb();
    }else{
        TextNode("error","Something went wrong Record cannot Deleted");
    }
}
?>