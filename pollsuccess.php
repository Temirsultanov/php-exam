<?php 
    require('config.php');
    $pageTitle = 'Опрос успешно пройден!';
    include('templates/_head.php');
?>
<section class="white">
    <?php 
        include('templates/_header.php'); 
    ?>
    <div class="ordersuccess">
        <h1>Опрос успешно пройден!</h1>
        <h3>Хочешь создать свой опрос? Зарегистрируйся</h3>
        <a class="link-in-home" href="login.php">Зарегистрироваться</a>
    </div>
</section>
<?php include('templates/_footer.php') ?>