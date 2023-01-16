<?php
namespace Banktsb\DB;

use Banktsb\App;
use App\DB\DataBase;
use Banktsb\Message as M;
use PDO;

class SqlReader implements DataBase {

    private $pdo, $name;

    
    public function __construct($name)
    {
        $host = '127.0.0.1';
$db   = 'miskas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->name = $name;
    }

    
    
    public function create(array $userData) : void
    {
        $col = implode(',', array_flip($userData)); 
        
        $sql = "
            INSERT INTO " . $this->name . "
            (". $col .")
            VALUES(?, ?, ?, ?)
        ";

        die($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($userData));
    }

    public function unique(int $personal_id) : bool
    {
        foreach ($this->data as $data) {
            if($personal_id == $data['personal_id']){
                return true;
            }
        }

        return false;
    }

    

    public function update(int $userId, array $userData) : void
    {
        $set =  array_map(fn($s) => $s . ' = ?', array_flip($userData));
        $col = implode(',', $set); 
        
        $sql = "
            UPDATE " . $this->name . "
            SET " . $col . "
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([...array_values($userData), $userId]);
    }

    
    public function add(int $userId, array $userData) : void
    {
        $userData['id'] = $userId;
        foreach($this->data as $key => $saskaita) {
    if ($saskaita['id'] == $userId && $_POST['balance'] > 0) {
        (float) $this->data[$key]['balance'] += (float)$userData['balance'];
        M::add('Lėšos sėkmingai pridėtos į sąskaitą', 'alert-success');
    }
    if(!is_numeric($_POST['balance']) )
    {
        M::add('Netinkamai įvesti duomenys', 'alert-danger');
    }

    if($_POST['balance'] < 0 )
    {
        M::add('Netinkamai įvesti duomenys', 'alert-danger');
    }
    }
    }
    public function transfer(int $userId, array $userData) : void
    {
        $userData['id'] = $userId;
        foreach($this->data as $key => $saskaita) {
    if ($saskaita['id'] == $userId && $saskaita['balance'] >= $_POST['balance'] && $_POST['balance'] > 0) {
        (float) $this->data[$key]['balance'] -= (float)$userData['balance'];
             M::add('Lėšos sėkmingai pervestos', 'alert-success');
        
    }

    if(!is_numeric($_POST['balance']))
    {
        M::add('Netinkamai įvesti duomenys', 'alert-danger');
    }

    if($_POST['balance'] < 0 )
    {
        M::add('Netinkamai įvesti duomenys', 'alert-danger');
    }
    
    if ($saskaita['id'] == $userId && $saskaita['balance'] < $_POST['balance'] ) {
      M::add('Sąskaitoje nepakanka lėšų', 'alert-danger');
    }    
    }
    }


    public function check()
    {
        $users = unserialize(file_get_contents(__DIR__ . '/users'));
 
        // print_r($_POST);
    foreach($users as $user) {
        if ($user['name'] == $_POST['name']) {
             if ($user['psw'] == md5($_POST['psw'])) {
                 $_SESSION['user'] = $user;
            M::add('Sveikinu sėkmingai prisijungus!', 'alert-success');
                 return App::redirect('saskaitos');
            

     }
    }
 }
 M::add('Neteisingas vartotojo vardas arba slaptažodis', 'alert-danger');
 
            return App::redirect('login');
}

// public function logout(): string
//     {
//         if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//             session_unset();
//             session_destroy();
//             return Application::redirect('/login');
//         }

//     }
    // public function delete(int $userId) : void
    // {
    //     $userData['id'] = $userId;
    //     foreach($this->data as $key => $saskaita) {
    //         if ($saskaita['id'] == $userId) {
    //             if($saskaita['balance'] == 0 ){
    //         unset($saskaitos[$key]);
    //             }  
        
    // }
    // }
    // }

    public function delete(int $userId) : void
    {
        $sql = "
            DELETE FROM " . $this->name . "
            WHERE id = ? "
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

    }


    public function show(int $userId) : array
    {
         $sql = "
            SELECT *
            FROM ". $this->name ."
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch();

    }

    public function showAll() : array
    {
        $sql = "
            SELECT *
            FROM ". $this->name ."
        ";


        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }


}