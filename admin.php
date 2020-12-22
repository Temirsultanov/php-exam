<?php 
    session_start();
    if (!isset($_SESSION['login']) || !($_SESSION['login'] == 'on')) {
        header('Location: login.php');
    }
    $pageTitle = 'Admin page';
    include('templates/_head.php')  
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
        <div class="admin">
            <h2>Создать опрос</h2>
            <form action="createpoll.php" method="POST"  class="addproduct-form">
                <div class="input-block">
                    <input name="question_count" type="text" placeholder="Количество вопросов:">
                </div>
                <button class="addform-button" type="submit">Создать</button>
            </form>
            <h2>Введите SQL-запрос:</h2>
            <form action="sqlquery.php" method="POST" class="sql-form">
                <div class="input-block">
                    <textarea name="sqlquery" id="" cols="30" rows="10" placeholder="Your SQL-query:"></textarea>
                </div>
                <button  class="addform-button" type="submit">Отправить</button>
            </form>
        </div>
    </section>
<?php include('templates/_footer.php') ?>