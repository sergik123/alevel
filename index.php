<?php
$name=null;
$lastname=null;
$age=null;
$res=array("options" => array("regexp"=>"/^[a-zA-Zа-яА-Я]++$/ui"));
$error=false;
if(!empty($_POST)){
    $name=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];

    if(empty($name) || empty($age)){
        echo "error";
    }else{
        if(filter_var($name,FILTER_VALIDATE_REGEXP,$res)){
            $name=htmlspecialchars(strip_tags($_POST['firstname']));
            $lastname=htmlspecialchars(strip_tags($_POST['lastname']));
            $age=$_POST['age'];
        }else{
            $error=true;
        }
        if(!empty($lastname)){
            if(!filter_var($lastname,FILTER_VALIDATE_REGEXP,$res)){
                $error=true;
            }
        }

    }
}
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
<form method="post">
    <div class="mb-2">
        <label for="InputName" class="form-label">Имя</label>
        <input type="text" class="form-control form-control-lg" id="InputName"  name="firstname" required>
    </div>
    <div class="mb-2">
        <label for="InputLastName" class="form-label">Фамилия</label>
        <input type="text" class="form-control form-control-lg" id="InputLastName" name="lastname">
    </div>
    <div class="mb-2">
        <label for="InputAge" class="form-label">Возраст</label>
        <input type="number" class="form-control form-control-lg" id="InputAge" name="age" required min="0" max="125">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
    <div class="row">
        <?php
        if($error==false){
            echo "Ваше имя: ".$name;
            echo "<br>";
            echo "Ваша фамилия: ".$lastname;
            echo "<br>";
            echo "Ваш возраст: ".$age;
            echo "<br>";
        }else{
            echo "Ваше имя и фамилия не должны содержать цифры!";
        }

        ?>
    </div>
</div>
</body>
</html>
