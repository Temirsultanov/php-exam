<?php 
    session_start();
    if (!isset($_SESSION['login']) || !($_SESSION['login'] == 'on')) {
        header('Location: login.php');
    }
    $pageTitle = 'Create poll';
    include('templates/_head.php');
    require('config.php');
    $count = $_POST['count0'];
    $counts;
    $i = 0;
    while ($count) {
        $counts[] = $_POST['count' . $i];
        $i++;
        $count = $_POST['count' . $i];
    };
    $cur_que = $_SESSION['current_questions'];
?>
<section class="white">
        <header class="header header-admin">
            <div class="header__logo">
                <h1 class="admin-title">Админ панель</h1>
            </div>
            <div class="header__menu">
                    <a href="index.php" class="menu__exit">
                        <img src="images/exit.svg" alt="">
                    </a>
            </div>
        </header>

        <div class="ordersuccess">
            <form action="createpoll4.php" method="POST"  class="addproduct-form">
                <?php        
                    for ($i = 0; $i < count($cur_que); $i++) {
                        $sql = 'SELECT * from questions where question_id='.$cur_que[$i].' limit 1';
                        $result = $db->query($sql);
                        $line = $result->fetch(PDO::FETCH_ASSOC);
                        $question = $line;
                        echo('<h2>'.$question['question_title'].'</h2>');
                        for ($j = 0; $j < $counts[$i]; $j++) {
                            echo('
                            <div class="input-block">
                                <input name="question'.$question['question_id'].'-'.$j.'" type="text" placeholder="Вариант ответа">
                            </div>
                            ');
                        }
                    }
                ?>
                <button class="addform-button" type="submit">Создать</button>
            </form>
        </div>
</section>
<?php include('templates/_footer.php') ?>
