<?php 
namespace Banktsb\Controllers;
use Banktsb\App;
use Banktsb\DB\FileReader as FR;

class Saskaita {

    public function index()
    {
        // echo('dsafs');
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
        (new FR('saskaitos'))->create($_POST);
        return App::redirect('saskaitos');
    }

    public function edit($id)
    {
        $pageTitle = 'Sąskaita | Redaguoti';
        $saskaita = (new FR('saskaitos'))->show($id);
        return App::view('saskaita-edit', compact('pageTitle', 'saskaita'));
    }

    public function update($id)
    {
        (new FR('saskaitos'))->update($id, $_POST);
        return App::redirect('saskaitos');
    }

    public function delete($id)
    {
        (new FR('saskaitos'))->delete($id);
        return App::redirect('saskaitos');
    }

}