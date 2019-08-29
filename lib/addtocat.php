<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
class addtocat{
    public $photo;
    public $quantity;
    public $atcsubmit;
    public $name;
    public $producer;
    public $desc;
    public $power;
    public $acsel;
    public $topspeed;
    public $typewd;
    public $bodytype;
    public $itemprice;
    public $typeinp;
    public $atcerr;
    public $producerid;
    public function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
        $this->err[]='genercode <br>';

    }
    public function __construct()
    {
        $host='localhost';
        $uname='root';
        $pwd='';
        $dbname='project';
        $this->mysqlihost = $host;
        $this->mysqliusr = $uname;
        $this->mysqlipwd = $pwd;
        $this->mysqlidb = $dbname;
        $this->submit = filter_input(INPUT_POST, 'submit');
        $this->name = filter_input(INPUT_POST, 'name');
        $this->producer = filter_input(INPUT_POST, 'producer');
        $this->descr = filter_input(INPUT_POST, 'itemdesc');
        $this->power = filter_input(INPUT_POST, 'power');
        $this->acsel = filter_input(INPUT_POST, 'acsel');
        $this->topspeed = filter_input(INPUT_POST, 'topspeed');
        $this->typewd = filter_input(INPUT_POST, 'typewd');
        $this->bodytype = filter_input(INPUT_POST, 'bodytype');
        $this->itemprice = filter_input(INPUT_POST, 'itemprice');
        $this->quantity = filter_input(INPUT_POST, 'quantity');
        if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
            $name=md5($this->generateCode(10)).$_FILES["picture"]["name"];
            $this->photo='files/carspictures/'.$name;
        }
        $this->typeinp = filter_input(INPUT_COOKIE, 'typeinp');
        $this->atcerr=array();

    }
    public function  atcdrawinput(){
        //if($this->typeinp=='car'){
            $a = '
            <form enctype="multipart/form-data" method="POST">
            <input name="name" type="text"> Название Товара<br>
            <input name="producer" type="text"> Производитель<br>
            <input name="itemdesc" type="text"> Описание<br>
            <input name="power" type="text"> Мощность л.с.<br>
            <input name="acsel" type="text"> От 0 до 100 км\ч<br>
            <input name="topspeed" type="text"> Максимальная Скорость км\ч<br>
            <input name="typewd" type="text"> Ведущие Колеса<br>
            <input name="bodytype" type="text"> Тип Кузова<br>
            <input name="quantity" type="text"> Количество<br>
            <input name="picture" type="file" > Фото<br>
            <input name="itemprice" type="text"> Цена<br>
            <input name="submit" type="submit" value="Ввести">
            </form>';
            echo "$a";
        //}


    }
    public function atcvalidate(){
        if(strlen($this->name)==0) {
            $this->atcerr[] = 'Введите Модель <br>';
        }
        if(strlen($this->producer)==0) {

            $this->atcerr[] = 'Введите Производителя <br>';
        }
        if(strlen($this->descr)==0){
            $this->atcerr[]='Введите Описание <br>';
        }
        if(strlen($this->power)==0){
            $this->atcerr[]='Введите Мощность <br>';

        }
        if(strlen($this->acsel)==0){
            $this->atcerr[]='Введите Ускорение <br>';

        }
        if(strlen($this->topspeed)==0){
            $this->atcerr[]='Введите Максимальную Скорость <br>';

        }
        if(strlen($this->typewd)==0){
             $this->atcerr[] = 'Введите Привод <br>';
        }
        if(strlen($this->bodytype)==0) {
            $this->atcerr[] = 'Введите Тип Кузова <br>';
        }
        if(strlen($this->quantity)==0){
            $this->atcerr[]='Введите Тип Кузова <br>';
        }
        if(strlen($this->photo)==0){
            $this->atcerr[]='Выберите картинку <br>';
        }
        if(strlen($this->itemprice)==0){
            $this->atcerr[]='Введите Цену <br>';
        }
    }
    public function addtocat(){
        if(isset($this->submit)){
            if(!$this->atcerr){
            if(strlen($this->producer)>1){
                $mysqli = new mysqli($this->mysqlihost, $this->mysqliusr, $this->mysqlipwd, $this->mysqlidb);
                $query = "SELECT  `producer_id` FROM `producers` where `producer` = ? LIMIT 1";
                if ($stmt = $mysqli->prepare($query)) {
                    $stmt->bind_param("i", $this->producer);
                    $stmt->execute();
                    $stmt->bind_result($this->producerid);
                    while ($stmt->fetch()) {
                        sprintf("%s", $this->producerid);
                    }
                    $stmt->close();
                }
                $mysqli->close();
                if(!$this->producerid){
                    $mysqli = new mysqli($this->mysqlihost, $this->mysqliusr, $this->mysqlipwd, $this->mysqlidb);
                    // Вытаскиваем из БД запись, у которой логин равняеться введенному
                    $query = "INSERT INTO `producers`(`producer_id`,`producer`) values (NULL,?)";
                    if ($stmt = $mysqli->prepare($query)) {
                        // Запустить выражение
                        $stmt->bind_param("s",$this->producer);
                        $stmt->execute();
                        $stmt->close();
                    }
                    // Закрыть соединение
                    $mysqli->close();
                }
                $mysqli = new mysqli($this->mysqlihost, $this->mysqliusr, $this->mysqlipwd, $this->mysqlidb);
                $query = "SELECT  `producer_id` FROM `producers` where `producer`= ? LIMIT 1";
                if ($stmt = $mysqli->prepare($query)) {
                    $stmt->bind_param("i", $this->producer);
                    $stmt->execute();
                    $stmt->bind_result($this->producerid);
                    while ($stmt->fetch()) {
                        sprintf("%s", $this->producerid);
                    }
                    $stmt->close();
                }
            }
                $tmp_name = $_FILES["picture"]["tmp_name"];
                //$name = $_FILES["picture"]["name"];
                //$name = end(explode(".", $name));
                move_uploaded_file($tmp_name, "$this->photo");
                $mysqli = new mysqli($this->mysqlihost, $this->mysqliusr, $this->mysqlipwd, $this->mysqlidb);
                // Вытаскиваем из БД запись, у которой логин равняеться введенному
                $query = "INSERT INTO `cars` (`car_id`, `car_name`,`producer_id`, `car_descr`, `power`, `acsel`, `topspeed`, `typewd`, `bodytype`, `quantity`, `photo`, `itemprice`) VALUES (NULL, ?,?,?,?,?,?,?,?,?,?,?);";
                if ($stmt = $mysqli->prepare($query)) {
                    // Запустить выражение
                    $stmt->bind_param("sisiiissisi",$this->name,$this->producerid,$this->descr, $this->power, $this->acsel, $this->topspeed, $this->typewd, $this->bodytype, $this->quantity, $this->photo, $this->itemprice);
                    $stmt->execute();
                    $stmt->close();
                }
                // Закрыть соединение
                $mysqli->close();

            }
        }
    }
}

$atc=new addtocat;
$atc->atcdrawinput();
$atc->atcvalidate();
foreach($atc->atcerr as $atcerr) echo $atcerr;
if(!$atc->atcerr){
    $atc->addtocat();
    echo "Данные отправлены";

}
