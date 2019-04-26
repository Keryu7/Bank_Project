<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">


        <?php
        if (isset ($_POST['username']) && isset ($_POST['userlastname']) && isset ($_POST['password'])){
        $userName = $_POST['username'];
        $userLastName = $_POST['userlastname'];
        $password = $_POST['password'];
        }
        ?>
        <div class="contaier">
            <form class="form-signin" method="post">
                <h2 style="text-align: center">Authorization</h2>
                <input type="text" name="username" class="form-control" placeholder="Name" required>
                <input type="text" name="userlastname" class="form-control" placeholder="LastName" required>
                <input type="text" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
            </form>
            <p><a href="images/xxx.jpg">Посмотрите на мою фотографию!</a></p>
        </div>

    </div>
</div>
