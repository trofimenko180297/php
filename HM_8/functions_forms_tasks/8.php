<?php
function validation($message){
    $wrong = ['fuck', 'bitch', 'bludger', 'damn'];
    $message = explode(" ",$message);
    foreach ($message as $word_1){
        $word_1 = trim($word_1,' .,!');
        $word_1 = strip_tags($word_1);
        foreach ($wrong as $word_2){
            if ($word_1 == $word_2){
                return false;
            }
        }
    }
    return true;
}
if (isset($_POST['name']) && $_POST['message']) {
    if (validation($_POST['message'])) {
        $_POST['message'] = strip_tags($_POST['message'],'<b>');
        $data = serialize($_POST) . "\n";
        file_put_contents('message.txt', $data, FILE_APPEND);
    } else {
        $error = 'Некорректный комментарий';
    }
}
    $file = fopen('message.txt','r');
    $message = [];
    while ($line = fgets($file)){
        $message[] = unserialize($line);
    }
?>
<?php if (!empty($message)) { ?>
    <div>
        <h3>Повідомлення:</h3>
        <ul type="square">
            <?php foreach ($message as $item) {?>
                <li>
                    <?='<b>' . $item['name'] . '</b>' . ':' . '<br/>' . $item['message']?>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
<div>
    <form action="" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="name">
        </p>
        <p>
            <label for="message">Message:</label>
            <textarea id="message" placeholder="message" name="message"></textarea>
        </p>
        <input type="submit">
    </form>
    <?php if (isset($error)) { echo $error;}?>
</div>
