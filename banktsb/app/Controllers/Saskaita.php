<?php 
namespace Banktsb\Controllers;
use Banktsb\App;
use Banktsb\DB\FileReader as FR;

class Saskaita {

    public function index()
    {
        
        $saskaitos = (new FR('saskaitos'))->showAll();
        $pageTitle = 'Sąskaitos | Sąrašas';
        return App::view('saskaita-list', compact('saskaitos', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Sąskaita | Nauja';
        return App::view('saskaita-create', compact('pageTitle'));
    }

    public function save()
    {
        $_POST['balance']= (float)0;
        $errorsMsg = [];
        if (!preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{4,}$/', $_POST['name'])) { 
            $name = $_POST['name'];
            $name = ucfirst($name);
            //   print_r($name);
            unset($_POST['name']);
            $errorsMsg[] = 'vardas negerai';
            
     
        }
     if (!preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{4,}$/', $_POST['surname'])) {
    
            $surname = $_POST['surname'];
            $surname = ucfirst($surname);
            unset($_POST['surname']);
            $errorsMsg[] = 'pavarde negerai';
            //  print_r($surname);
        //  $_POST['balance']= (float)0;
        // (new FR('saskaitos'))->create($_POST);
        // return App::redirect('saskaitos');
     }

     if($errorsMsg){
        $senaData = $_POST;
   return App::view('saskaita-create', compact('errorsMsg','senaData'));
     }else{
           $_POST['balance']= (float)0;
        (new FR('saskaitos'))->create($_POST);
        return App::redirect('saskaitos');
     }
    //  else{
    //     $errorSurname = 'Prašau įrašyti teisingą pavardę';
    //     // print_r($errorSurname);
    //     unset($_POST['surname']);
    //       $errorMsg = 'pavarde negerai';
    //     $senaData = $_POST;
    //      return App::view('saskaita-create', compact('errorSurname','senaData'));
    //     }
    //      $_POST['balance']= (float)0;
    //     // (new FR('saskaitos'))->create($_POST);
    //     // return App::redirect('saskaitos');
       
    //  }
    //  else{
         
    //     $errorName = 'Prašau įrašyti teisingą vardą';
    //       $errorMsg = 'vardas negerai';
    //     //  print_r($errorName);
    //     unset($_POST['name']);
    //     $senaData = $_POST;
    //      return App::view('saskaita-create', compact('errorName','senaData'));
    //     }
        //  $senaData = $_POST;
         //  $_POST['balance']= (float)0;
        // (new FR('saskaitos'))->create($_POST);
        // return App::redirect('saskaitos');
        
   $personal_id = (int) $_POST['personal_id'];


     if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal_id'])) {

      foreach ($saskaitos as $saskaita) {
        if ($saskaita['personal_id'] == $_POST['personal_id']) {
            $errorPersonal_Id = 'Toks asmens kodas jau egzistuoja';
            return App::view('saskaita-create', compact('errorPersonal_Id','senaData'));
            }
        


      else {
        $personal_id = (int) $_POST['personal_id'];
        (new FR('saskaitos'))->create($_POST);
        return App::redirect('saskaitos');
        }
    }
     }
        
    }


     

        
    public function edit($id)
    {
        $pageTitle = 'Sąskaita | Redaguoti';
        $saskaita = (new FR('saskaitos'))->show($id);
        return App::view('saskaita-edit', compact('pageTitle', 'saskaita'));
    }

    public function update($id)
    {
// print_r($id);
// print_r($_POST);
        (new FR('saskaitos'))->add($id, $_POST);
        return App::redirect('saskaitos/add/'. $id);
        
    }
    public function update1($id)
    {
// print_r($id);
// print_r($_POST);
        
        (new FR('saskaitos'))->transfer($id, $_POST);
        return App::redirect('saskaitos/transfer/'. $id);
    }

    public function delete($id)
    {
        // $error0 = 'Negalima ištrinti sąskaitos jei likutis didesnis už 0 eur.';
        (new FR('saskaitos'))->delete($id);
        return App::redirect('saskaitos');
    }
     public function add($id)
    {
        $pageTitle = 'Sąskaita | Pridėti';
        $saskaita = (new FR('saskaitos'))->show($id);
        return App::view('saskaita-add', compact('pageTitle', 'saskaita'));
    }
    public function transfer($id)
    {
        $pageTitle = 'Sąskaita | Nuskaičiuoti';
        $saskaita = (new FR('saskaitos'))->show($id);
        return App::view('saskaita-transfer', compact('pageTitle', 'saskaita'));
    }



}