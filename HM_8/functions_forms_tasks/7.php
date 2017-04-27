<?php
    if (isset($_POST['name']) && $_POST['message']){
        $data = serialize($_POST) . "\n";
        file_put_contents('message.txt',$data,FILE_APPEND);
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
    <input type="text" id="name" name="name">
    </p>
    <p>
    <label for="message">Message:</label>
    <textarea id="message" placeholder="message" name="message"></textarea>
    </p>
    <input type="submit">
</form>
</div>
