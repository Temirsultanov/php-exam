<?php 
    session_start();
    if (!isset($_SESSION['login']) || !($_SESSION['login'] == 'on')) {
        header('Location: login.php');
    }
    $pageTitle = 'Create poll';
    include('templates/_head.php');
    require('config.php');
    $cur_que = $_SESSION['current_questions'];
    for ($i = 0; $i < count($cur_que); $i++) {
        $j = 0;
        $cur_answer = $_POST['question'.$cur_que[$i].'-0'];

        while ($cur_answer) {
            $sql = 'INSERT into multi_answers(question_id, answer) VALUES ('.$cur_que[$i].', "'.$_POST['question'.$cur_que[$i].'-'.$j].'")';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $j++;
            $cur_answer = $_POST['question'.$cur_que[$i].'-'.$j];
        }
    }
    $sql = 'SELECT poll_id from poll_active order by poll_id desc limit 1';
    $result = $db->query($sql);
    $line = $result->fetchAll(PDO::FETCH_ASSOC);
    $poll_id = $line[0]['poll_id'];
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
        <h1>Опрос успешно создан!</h1>
            <h3>Ссылка на опрос: 
                http://php-exam.std-937.ist.mospolytech.ru/poll.php?id=<?php echo($poll_id); ?>
            </h3>
            <a class="link-in-home" href="poll.php?id=<?php echo($poll_id); ?>">http://php-exam.std-937.ist.mospolytech.ru/poll.php?id=<?php echo($poll_id); ?></a>
        </div>
</section>
<?php include('templates/_footer.php') ?>



