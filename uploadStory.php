<?php
include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);
if(isset($_POST['uploadStory'])){

$story_title = $_POST['story_title'];
$story_image = $_POST['story_image'];
$story_body = $_POST['story_body'];
$genere = $_POST['genere_title'];

$insert = "INSERT INTO stories (story_title,story_body,story_image,genere_title,upload_date) VALUES('$story_title','$story_body', '$story_image', '$genere', NOW())";

$run = mysqli_query($con, $insert);
#if($run){
#echo "STORY SUBMITTED"
#}
#else{
#echo "THERE IS SOME PROBLEM !!"
#}

}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
<title>Hummingbird - Add new story</title>
<script src="https://cdn.tiny.cloud/1/anjoziq6b1yyjoss01e37zlqcgycb7gikkhaft4e2jbri6xi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');

body{
font-family: 'Noto Sans JP', sans-serif;
}

.mainCOntainer{
background: #ffffff !important;
padding: 10px;
box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
max-width: 60%;
display: block;
margin-left: auto;
margin-right: auto;
border-radius: 5px;
}
input[type="text"]{
width:90%;
padding:10px;
margin-bottom:20px;
}

textarea{
min-height:250px;


}

</style>
</head>

<body>
<div class="mainContainer">
<form method="POST" action="#">
<h1>Add a new story!</h1>
<input type="text" name="story_title" placeholder="Story title" maxlength="250" required />
<input type="text" name="story_image" placeholder="Image url" required />
<!-- Create the editor container -->
<textarea name="story_body" placeholder="Write something incrediable"></textarea>
<br/>
<select name="genere_title">
<option selected disabled>Select a genere</option>
<option value="Self help">Self help</option>
<option value="Romance">Romance</option>
<option value="Historical fictions">Historical fictions</option>
<option value="Poetry">Poetry</option>
<option value="Motivation">Motivation</option>
<option value="Philosophy">Philosophy</option>
<option value="Mythology">Mythology</option>
<option value="Narrative"></option>
<option value="Comedy">Comedy</option>
</select>
<br/><br/>
<input type="submit" name="uploadStory" value="Upload story" />
</form>
</div>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
  
</body>

</html>

