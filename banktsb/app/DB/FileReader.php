<?php
namespace Banktsb\DB;

use Banktsb\App;
use App\DB\DataBase;
use Banktsb\Message as M;

class FileReader implements DataBase {

    private $data, $name;

    
    public function __construct($name)
    {
        $this->name = $name;
        if (!file_exists(__DIR__ . '/' . $this->name)) {
            $this->data = [];
        } 
        else {
            $this->data = unserialize(file_get_contents(__DIR__ . '/' . $this->name));
            usort($this->data, fn($a, $b) => $a['surname'] <=> $b['surname']);
        }
    }

    public function __destruct()
    {
        file_put_contents(__DIR__ . '/' . $this->name, serialize($this->data));
    }


    private function getId() : int
    {
        $id = rand(1000000,10000000);
        if (!file_exists(__DIR__ . '/' . $this->name .'_id')) {
            file_put_contents(__DIR__ . '/' . $this->name .'_id', serialize($id));
            return $id;
        } 
        else {
            // $id = unserialize(file_get_contents(__DIR__ . '/' . $this->name .'_id'));
            // $id++;
            file_put_contents(__DIR__ . '/' . $this->name .'_id', serialize($id));
            return $id;
        }
    }

    public function create(array $userData) : void
    {
        $userData['id'] = $this->getId();
        $this->data[] = $userData;
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
        $userData['id'] = $userId;
        $this->data = array_map(fn($data) => $userId == $data['id'] ? $userData : $data, $this->data);
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
        $this->data = array_filter($this->data, fn($data) => $userId != $data['id']);

    }


    public function show(int $userId) : array
    {
        foreach ($this->data as $data) {
            if ($userId == $data['id']) {
                return $data;
            }
        }
        return [];
    }

    public function showAll() : array
    {
        return $this->data;
    }


}