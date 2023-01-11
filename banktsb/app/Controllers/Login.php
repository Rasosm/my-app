
// namespace Banktsb\Controllers;
// use Banktsb\App;
// use Banktsb\DB\FileReader as FR;
// use Banktsb\Message as M;

// class Login

// {
//     public function login()
//     {
//         $pageTitle = 'Registracija';
//         return App::view('login', compact('pageTitle'));
//     }
//     public function check()
//     {
//         $pageTitle = 'Registracija';
//         (new FR('users'))->check($id, $_POST);
//         return App::redirect('saskaitos');
//     }

//     public function logout(): string
//     {
//         $users = App::$users->showAll();

//         foreach ($users as $user) {
//             if ($user['name'] === $_POST['name']) {
//                 if ($user['psw'] === md5($_POST['psw'])) {
//                     $_SESSION['user'] = $user;
//                     App::redirect('saskaitos');
//                 }
//             }
//         }

//         // $_SESSION['error'] = 'Neteisingas el. paštas arba slaptažodis!';
//         $message = M::get();
//         M::add('Lėšos sėkmingai pridėtos į sąskaitą', 'alert-success');
//         return App::view('login', compact('message', 'pageTitle'));
//     }
} -->