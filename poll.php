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
                $count = 1;
                foreach($questions as $question){
                    $title = $question['question_title'];
                    $type = $question['question_type'];
                    echo('
                    <div class="input-block">
                            <h3>'.$title.'</h3>
                    ');
                    if ($type == "text") {
                        echo('
                                <textarea name="question'. $count. '" placeholder=": "></textarea>
                            </div>
                        ');
                    }
                    else if ($type == 'positive_number') {
                        echo('
                                <input type="number" placeholder="3" min="0">
                            </div>
                        ');
                    }
                    else if ($type == 'number') {
                        echo('
                                <input type="number" placeholder="3">
                            </div>
                        ');
                    }
                    else if ($type == 'radio') {
                        $sql = 'SELECT * from multi_answers where question_id='.$question['question_id'];
                        $result = $db->query($sql);
                        $line = $result->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($line as $answer) {
                            echo($answer['answer']);
                            echo('
                                <input type="radio" value="'.$answer['answer'].'">
                                <label>'.$aswer['answer'].'</label>
                            ');
                        }
                        echo('</div>');
                    }
                    else if ($type == 'checkbox') {
                        $sql = 'SELECT * from multi_answers where question_id='.$question['question_id'];
                        $result = $db->query($sql);
                        $line = $result->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($line as $answer) {
                            echo($answer['answer']);
                            echo('
                                <input type="checkbox" value="'.$answer['answer'].'">
                                <label>'.$aswer['answer'].'</label>
                            ');
                        }
                        echo('</div>');
                    }
                    else if ($type == 'number') {
                        echo('
                                <input type="number" placeholder="3">
                            </div>
                        ');
                    }
                    else{
                        echo('
                                <input type="text" name="question'.$count.'" placeholder=": ">
                            </div>
                        ');
                    }
                    $count++;
                    
                }; 
                
            ?>
                <button class="addform-button" type="submit">Отправить</button>
            </form>
    </div>
</section>