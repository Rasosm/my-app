<?php
namespace Banktsb;


use Banktsb\Controllers\Saskaita;


class App {

    public static function start()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        return self::router($url);
    }
private static function router(array $url)
    {
           $method = $_SERVER['REQUEST_METHOD'];
    //    print_r($method);

        if ($url[0] == 'saskaitos' && count($url) == 1 && $method == 'GET') {
            // print_r(new Saskaita);
            //   print_r($url);
            return (new Saskaita)->index();
        }

        if ($url[0] == 'saskaitos' && $url[1] == 'create' && count($url) == 2 && $method == 'GET') {
            return (new Saskaita)->create();
        }

        if ($url[0] == 'saskaitos' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {

            return (new Saskaita)->save();
        }

        // if ($url[0] == 'saskaitos' && $url[1] == 'edit' && count($url) == 3 && $method == 'GET') {
        //     return (new Saskaita)->edit($url[2]);
        // }

        // if ($url[0] == 'saskaitos' && $url[1] == 'update' && count($url) == 3 && $method == 'POST') {
        //     return (new Saskaita)->update($url[2]);
        // }

        if ($url[0] == 'saskaitos' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
            return (new Saskaita)->delete($url[2]);
        }
        if ($url[0] == 'saskaitos' && $url[1] == 'add' && count($url) == 3 && $method == 'GET') {
            return (new Saskaita)->add($url[2]);
        }
         if ($url[0] == 'saskaitos' && $url[1] == 'add' && count($url) == 3 && $method == 'POST') {
            return (new Saskaita)->update($url[2]);
        }
        if ($url[0] == 'saskaitos' && $url[1] == 'transfer' && count($url) == 3 && $method == 'GET') {
            return (new Saskaita)->transfer($url[2]);
        }
         if ($url[0] == 'saskaitos' && $url[1] == 'transfer' && count($url) == 3 && $method == 'POST') {
            return (new Saskaita)->update1($url[2]);
        }

        // if ($url[0] == 'users' && $url[1] == 'all' && count($url) == 2 && $method == 'GET') {
        //     return (new Api)->allUsers();
        // }

        // if ($url[0] == 'users' && $url[1] == 'js' && count($url) == 2 && $method == 'GET') {
        //     return (new Api)->jsUsers();
        // }

        // GRYBAI API

        // if ($url[0] == 'api' && $url[1] == 'grybai' && count($url) == 2 && $method == 'GET') {
        //     return (new GrybasApi)->index();
        // }

        // if ($url[0] == 'api' && $url[1] == 'grybai' && $url[2] == 'save' && count($url) == 3 && $method == 'POST') {
        //     return (new GrybasApi)->save();
        // }

        // if ($url[0] == 'grybai' && $url[1] == 'edit' && count($url) == 3 && $method == 'GET') {
        //     return (new Grybas)->edit($url[2]);
        // }

        // if ($url[0] == 'grybai' && $url[1] == 'update' && count($url) == 3 && $method == 'POST') {
        //     return (new Grybas)->update($url[2]);
        // }

        // if ($url[0] == 'grybai' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
        //     return (new Grybas)->delete($url[2]);
        // }







        return '404 NOT FOUND';
    }

    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ .'/../view/top.php';

        require __DIR__ .'/../view/'.$__name.'.php';

        require __DIR__ .'/../view/bottom.php';


        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }

    public static function redirect($url)
    {
        // print_r(URL);
        header('Location: ' . URL . $url);
        return null;
    }




}