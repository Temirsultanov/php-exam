<?php
    require('config.php');
    $pageTitle = 'Опрос';
    include('templates/_head.php');
    $sql = 'SELECT * from questions where poll_id='. $_GET['id'];
    $result = $db->query($sql);
    $questions = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="white">
    <?php 
        include('templates/_header.php'); 
    ?>
    <div class="admin">
        <h1>Опрос <?php echo($_GET['id']); ?></h1>

            <form action="pollresult.php" method="POST"  class="addproduct-form">
            <?php
                
                foreach($questions as $question){
                    $title = $question['question_title'];
                    $type = $question['question_type'];
                    echo('
                    <div class="input-block">
                            <label>'.$title.'</label>
                    ');
                    if ($type == "text") {
                        echo('
                                <textarea name="question_title" placeholder=": "></textarea>
                            </div>
                        ');
                    }
                    else{
                        echo('
                                <input type="text" name="question_title" placeholder=": ">
                            </div>
                        ');
                    }
                    
                }; 
                
            ?>
                <button class="addform-button" type="submit">Отправить</button>
            </form>
    </div>
</section>