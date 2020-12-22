<?php 
    session_start();
    if (!isset($_SESSION['login']) || !($_SESSION['login'] == 'on')) {
        header('Location: login.php');
    }
    $pageTitle = 'Create poll';
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

        
            <h1>Создать вопросы</h1>
            <form action="createpoll2.php" method="POST"  class="addproduct-form">
            <?php
                $count = $_POST['question_count'];
                for ($i = 0; $i < $count; $i++) {
                    echo('
                        <h2>Вопрос ' . ($i+1) . '</h2>
                        <div class="input-block">
                            <label>Заголовок вопроса</label>
                            <input name="question_title' . ($i+1) . '" type="text" placeholder="Заголовок вопроса: ">
                        </div>
                        <div class="input-block">
                                <label>Тип ответа</label>
                                <select name="question_type'.($i+1).'" >
                                    <option value="number">Число</option>
                                    <option value="positive_number">Положительное число</option>
                                    <option value="string">Строка</option>
                                    <option value="text">Текст</option>
                                    <option value="checkbox">С множественным выбором</option>
                                    <option value="radio">С единственным выбором</option>
                                </select>
                        </div>
                    ');
                }
                
            ?>
                <button class="addform-button" type="submit">Создать</button>
            </form>
        </div>
    </section>
<?php include('templates/_footer.php') ?>