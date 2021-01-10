<html>
  <head>
    <meta charset="UTF-8">
    <title>アンケート送信済みページ</title>
  </head>

  <body>

  <?php
  try
  {
    $dsn='mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn, $user, $password);

    $nickname=$_POST['nickname'];
    $email=$_POST['email'];
    $goiken=$_POST['goiken'];

    $nickname= htmlspecialchars($nickname);
    $email= htmlspecialchars($email);
    $goiken= htmlspecialchars($goiken);

    print $nickname;
    print '様<br/>';
    print 'ご意見ありがとうございました<br/>'; 
    print '頂いたご意見『';
    print $goiken;
    print '』<br/>';
    print $email;
    print 'にメールを送りましたのでご確認ください。';

    $sql = 'INSERT INTO anketo(nickname,email,goiken)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
  }
  catch (Exception $e)
  {
    print 'ただいま障害により意見が送信できなくなっています。大変ご迷惑をおかけしております。';
  }
  ?>

  </body>