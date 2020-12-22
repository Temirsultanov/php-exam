<?php 
    session_start();
    if (!isset($_SESSION['login']) || !($_SESSION['login'] == 'on')) {
        header('Location: login.php');
    }
    $pageTitle = 'Create poll';
    include('templates/_head.php');
    require('config.php');
    $titles;
    $types;
    $i = 1;
    $title = $_POST['question_title1'];
    while ($title) {
        $titles[] = $_POST['question_title' . $i];
        $types[] = $_POST['question_type' . $i];
        $i++;
        $title = $_POST['question_title' . $i];
    };
    $sql = 'INSERT into poll_active(active) value(1);';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $sql = 'SELECT poll_id from poll_active order by poll_id desc limit 1';
    $result = $db->query($sql);
    $line = $result->fetchAll(PDO::FETCH_ASSOC);
    $poll_id = $line[0]['poll_id'];
    for ($i = 0; $i < count($titles); $i++) {
        $sql = 'INSERT into questions (poll_id, question_type, question_title) VALUES (:poll_id, :question_type, :question_title)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':poll_id', $poll_id);
        $stmt->bindValue(':question_type', $types[$i]);
        $stmt->bindValue(':question_title', $titles[$i]);
        $stmt->execute();

    }

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