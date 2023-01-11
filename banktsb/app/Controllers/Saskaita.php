<?php 
namespace Banktsb\Controllers;
use Banktsb\App;
use Banktsb\DB\FileReader as FR;
use Banktsb\Message as M;

class Saskaita {

    public function index()
    {
        
        $saskaitos = (new FR('saskaitos'))->showAll();
        $pageTitle = 'Sąskaitos | Sąrašas';
        $message = M::get();
        return App::view('saskaita-list', compact('saskaitos', 'pageTitle', 'message'));
    }

    public function create()
    {
        $pageTitle = 'Sąskaita | Nauja';
        $message = M::get();
        return App::view('saskaita-create', compact('pageTitle', 'message'));
    }

    public function save()
    {
        $pageTitle = 'Sąskaita | Nauja';
         $_POST['balance']= (float)0;
        if (!preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{4,}$/', $_POST['name'])) {
            $pageTitle = 'Sąskaita | Nauja';
            M::add('Prašau įvesti teisingą vardą', 'alert-danger');
            $message = M::get();
            return App::view('saskaita-create', compact('message', 'pageTitle'));  
            }
        if (!preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{4,}$/', $_POST['surname'])) {
            $pageTitle = 'Sąskaita | Nauja';
            M::add('Prašau įvesti teisingą pavardę', 'alert-danger');
            $message = M::get();
            return App::view('saskaita-create', compact('message', 'pageTitle'));  
            }    

        if (!preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal_id'])){
            $pageTitle = 'Sąskaita | Nauja';
            M::add('Prašau įvesti teisingą asmens kodą', 'alert-danger');
            $message = M::get();
            return App::view('saskaita-create', compact('message', 'pageTitle'));  
        }   

        $personal_id = (int) $_POST['personal_id'];

        if ((new FR('saskaitos'))->unique($_POST['personal_id'])) 
        {
           $pageTitle = 'Sąskaita | Nauja';
            M::add('Klientas su šiuo asmens kodu jau užregistruotas!', 'alert-danger');
            $message = M::get();
            return App::view('saskaita-create', compact('message', 'pageTitle'));
        } else {
            $pageTitle = 'Sąskaita | Nauja';
            (new FR('saskaitos'))->create($_POST);
            M::add('Sveikinu! Sėkmingai sukūrėte naują sąskaitą', 'alert-success');
            //    $message = M::get();
            //    print_r($message);
             return App::redirect('saskaitos'); 

        }
        
    }    
   
    public function login()
    {
        $pageTitle = 'Registracija';
        return App::view('login', compact('pageTitle'));
    }
    public function check()
    {
        $pageTitle = 'Registracija';
        (new FR('users'))->check();
        

        // $message = M::get();
        // M::add('Neteisingas vartotojo vardas arba slaptažodis', 'alert-danger');
        // return App::redirect('saskaitos');
    }

    // public function logout()
    // {
    //     $pageTitle = 'Registracija';
    //     return App::redirect('login');
    // }
    public function logout(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_unset();
            session_destroy();
            return App::redirect('login');
        }

    }
    public function update($id)
    {
        (new FR('saskaitos'))->add($id, $_POST);
        // $message = M::get();
        // M::add('Lėšos sėkmingai pridėtos į sąskaitą', 'alert-success');
        return App::redirect('saskaitos/add/'. $id);
        
    }
    public function update1($id)
    {
// print_r($id);
// print_r($_POST);
        // $error = 'Sąskaitoje nekakanka lėšų';
        // $_POST['error'] = $error; 
        (new FR('saskaitos'))->transfer($id, $_POST);
        // foreach($saskaitos as $index => $saskaita) {
        
        //     if ($saskaita['id'] == $id) {
        //         if($saskaita['balance'] < $_POST['balance']){
        //             $message = M::get();
        // M::add('Nepakanka lėšų', 'alert-danger');
        // return App::redirect('saskaitos/transfer/'. $id);
        //         }
        //     }
        // }
        
        // $message = M::get();
        // M::add('Lėšos sėkmingai pervestos', 'alert-success');
        return App::redirect('saskaitos/transfer/'. $id);
    }


    public function delete($id)
    {
        $pageTitle = 'Sąskaitos | Sąrašas';
        $saskaitos = (new FR('saskaitos'))->showAll();

        foreach($saskaitos as $index => $saskaita) {
        
            if ($saskaita['id'] == $id) {
                if($saskaita['balance'] > 0 ){
                    $error0 = 'Negalima ištrinti sąskaitos jei likutis didesnis už 0 eur.';
                    return App::view('saskaita-list', compact('error0', 'saskaitos', 'pageTitle'));
                }
            }
        }
        
        (new FR('saskaitos'))->delete($id);
        M::add('Sąskaita sėkmingai ištrinta', 'alert-success');
        return App::redirect('saskaitos');
        // $successDelete ='Sąskaita sėkmingai ištrinta';
        // return App::view('saskaita-list', compact('successDelete', 'saskaitos', 'pageTitle'));
    }
        
  
     public function add($id)
    {
        $pageTitle = 'Sąskaita | Pridėti';
        $saskaita = (new FR('saskaitos'))->show($id);
        $message = M::get();
        return App::view('saskaita-add', compact('pageTitle', 'saskaita', 'message'));
    }
    public function transfer($id)
    {
        $pageTitle = 'Sąskaita | Nuskaičiuoti';
        $saskaita = (new FR('saskaitos'))->show($id);
        $message = M::get();          
        return App::view('saskaita-transfer', compact('pageTitle', 'saskaita', 'message'));
    }



}