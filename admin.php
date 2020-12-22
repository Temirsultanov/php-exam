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
        <!-- <div class="admin">
            <h2>Добавить товар</h2>
            <form action="add-new.php" method="POST"enctype="multipart/form-data" class="addproduct-form">
                <div class="input-block">
                    <input name="name" type="text" placeholder="Название:">
                </div>
                <div class="input-block">
                    <input name="firm" type="text" placeholder="Фирма:">
                </div>
                <div class="input-block">
                    <select name="category" >
                        <option value="pants">Брюки</option>
                        <option value="shirt">Рубашки</option>
                        <option value="suit">Костюмы</option>
                        <option value="foot">Обувь</option>
                    </select>
                </div>
                <div class="input-block">
                    <input name="price" type="text" placeholder="Цена:">
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" value="1" id="new" name="new">
                    <label for="new">Новинка</label>
                    <input type="checkbox" value="1" id="sale" name="sale">
                    <label for="sale">Распродажа</label>
                </div>
                <div class="photo-form">
                    <h5 >Фото:</h5>
                    <label for="photo">Выберите файл<input id="photo" name="img" type="file"></label>
                </div>
                <div class="input-block">
                    <label for="description">Описание:</label>
                    <textarea name="description" id="description" cols="" rows="" placeholder=""></textarea>
                </div>
                <button class="addform-button" type="submit">Добавить</button>
            </form>
            <h2>Таблица товаров</h2>
            <div class="table-wrap">
                <table class="product-table">
                    <tr>
                        <th>Id</th>
                        <th>Название</th>
                        <th>Фирма</th>
                        <th>Цена</th>
                        <th>Новинка</th>
                        <th>Скидка</th>
                    </tr>
                    <?php
                        require('config.php');
                        $sqlprod = 'SELECT * from productstemirsultanov';
                        $resultprod = $db->query($sqlprod);
                        $products = $resultprod->fetchAll(PDO::FETCH_ASSOC);
                        foreach($products as $product) {
                            echo(
                                '<tr>
                                    <td>' . $product['id'] . '</td>
                                    <td>' . $product['name'] . '</td>
                                    <td>' . $product['firm'] . '</td>
                                    <td>' . $product['price'] . '</td>
                                    <td>' . $product['new'] . '</td>
                                    <td>' . $product['sale'] . '</td>
                                </tr>'
                            );
                        }
                    ?>
                </table>
            </div>
            <h2>Таблица покупателей</h2>
            <div class="table-wrap">
                <table class="product-table">
                    <tr>
                        <th>Id</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Адрес</th>
                        <th>Email</th>
                    </tr>
                    <?php
                        require('config.php');
                        $sqlcust = 'SELECT * from customerstemirsultanov';
                        $resultcust = $db->query($sqlcust);
                        $customers = $resultcust->fetchAll(PDO::FETCH_ASSOC);
                        foreach($customers as $customer) {
                            echo(
                                '<tr>
                                    <td>' . $customer['customer_id'] . '</td>
                                    <td>' . $customer['customer_name'] . '</td>
                                    <td>' . $customer['customer_phone'] . '</td>
                                    <td>' . $customer['customer_address'] . '</td>
                                    <td>' . $customer['customer_email'] . '</td>
                                </tr>'
                            );
                        }
                    ?>
                </table>
            </div>
            <h2>Таблица заказов</h2>
            <div class="table-wrap">
                <table class="product-table">
                    <tr>            
                        <th>Count</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Продукт</th>
                        <th>Price</th>  
                    </tr>
                    <?php
                        require('config.php');
                        $sqltotal = 'select c.customer_name, c.customer_phone, c.customer_email, p.name, p.price, o.count from customerstemirsultanov as c join orderstemirsultanov as o on o.customer_id=c.customer_id join productstemirsultanov as p on o.product_id=p.id order by c.customer_id;';
                        $resulttotal = $db->query($sqltotal);
                        $orders = $resulttotal->fetchAll(PDO::FETCH_ASSOC);
                        foreach($orders as $order) {
                            echo('
                            <tr>
                            <td>' . $order['count'] . '</td>
                            <td>' . $order['customer_name'] . '</td>
                            <td>' . $order['customer_phone'] . '</td>
                            <td>' . $order['customer_email'] . '</td>
                            <td>' . $order['name'] . '</td>
                            <td>' . $order['price'] . '</td>
                            </tr>'
                        );
                        }
                    ?>
                </table>
            </div>
            <h2>Введите SQL-запрос:</h2>
            <form action="sqlquery.php" method="POST" class="sql-form">
                <div class="input-block">
                    <textarea name="sqlquery" id="" cols="30" rows="10" placeholder="Your SQL-query:"></textarea>
                </div>
                <button  class="addform-button" type="submit">Отправить</button>
            </form>
        </div> -->
    </section>
<?php include('templates/_footer.php') ?>