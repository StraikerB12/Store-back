<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Attachment;
use App\Events\JobStatus;
use \Nuwave\Lighthouse\Execution\Utils\Subscription;

use App\Service\VkService;

use \danog\MadelineProto\API;
use \danog\MadelineProto\Settings;
use \danog\MadelineProto\Settings\AppInfo;
use \danog\MadelineProto\Logger;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// $post = Post::find(11);
// dd($post->tags);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/event', function () {
    $vkPosts = new VkService('vk1.a.g12WdGuw4Q7yj48zNj7BBF_c8oSA7vZA6lRJsnNSeaQGTaiOFjwLG5ZVSp0vzeglMeFI-OAoKAupGL1qs9Optsu0yv8YcdlSJFNFKuUh5cR9OhND6qJu7P-7IgS3-A6EXKlQz2H5_CFPm48DvK2iG0XZRebWpcGsBHvlWv34HUZLDjpN6de56QQXGn8vwvpO6YbL5kz-0A6RUIdDwLRBTg','-179071623');
    return $vkPosts->getPosts(0, 2);
    // '-179071623'
    // JobStatus::dispatch(['doneJobs' => 400]);
    // Subscription::broadcast('jobInterface', ['doneJobs' => 400]);
});


Route::get('/input_phone', function (Request $request) {
    if($request->phone == '') return 'phone not enable request';

    $settings = (new AppInfo)->setApiId(3705044)->setApiHash('fae292f6bf560c6188e1e7a516a93a34');
    $MadelineProto = new API('bot.madeline', $settings);
    $MadelineProto->phoneLogin($request->phone);

    return true;
});
Route::get('/input_code', function (Request $request) {
    if($request->code == '') return 'code not enable request';

    $MadelineProto = new API('bot.madeline');
    $authorization = $MadelineProto->completePhoneLogin($request->code);
    if ($authorization['_'] === 'account.password') {
        if($request->password == '') return 'password not enable request';
        $authorization = $MadelineProto->complete2falogin($request->password);
    }
    if ($authorization['_'] === 'account.needSignup') {
        $authorization = $MadelineProto->completeSignup('bot');
    }
    return true;
});
Route::get('/get_data', function () {
    $MadelineProto = new API('bot.madeline');

    $settings = array(
        'peer' => -993153556,
        'add_offset' => 2,
        'limit' => 2,
    );
    // $data = $MadelineProto->messages->readHistory($settings);

    $data = $MadelineProto;
    // $data = $MadelineProto->messages->getHistory($settings);

    $info = [
        // 'count' => $data['count'],
        'messages' => $data, //['messages'],
    ];

    echo '<pre>';
    print_r($info['messages']);
    echo '</pre>';

    return $data;
});



Route::get('/lisen', function () {
    $settings = (new AppInfo)->setApiId(3705044)->setApiHash('fae292f6bf560c6188e1e7a516a93a34');
    $MadelineProto = new API('bot.madeline', $settings);

    // $settings = new \danog\MadelineProto\Settings;
    // $settings->setDb((new \danog\MadelineProto\Settings\Database\Mysql)
    //     ->setUri('tcp://localhost')
    //     ->setPassword('pass')
    // );
    // $settings->setAppInfo((new \danog\MadelineProto\Settings\AppInfo)
    //     ->setApiId(124)
    //     ->setApiHash('xx')
    // );
    // $settings->getFiles()->setUploadParallelChunks(100);
    // $MadelineProto->updateSettings($settings);

    // try {
    //     $MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);

    //     $MadelineProto->phone_login(); //вводим в консоли свой номер телефона
    //     $authorization = $MadelineProto->complete_phone_login(); // вводим в консоли код авторизации, который придет в телеграм
    //     if ($authorization['_'] === 'account.noPassword') {
    //         throw new \danog\MadelineProto\Exception('2FA is enabled but no password is set!');
    //     }
    //     if ($authorization['_'] === 'account.password') {
    //         $authorization = $MadelineProto->complete_2fa_login(); //если включена двухфакторная авторизация, то вводим в консоли пароль.
    //     }
    //     if ($authorization['_'] === 'account.needSignup') {
    //         $authorization = $MadelineProto->complete_signup();
    //     }
    // } catch (Exception $ex) {
    //     echo $ex->getMessage();
    //     exit();
    // }
    // $MadelineProto->session = 'session.madeline';
    // $MadelineProto->serialize(); // Сохраняем настройки сессии в файл, что бы использовать их для быстрого подключения. 

    
    // $MadelineProto->phoneLogin(phone number);
    // $authorization = $MadelineProto->completePhoneLogin(phone code);
    // if ($authorization['_'] === 'account.password') {
    //     $authorization = $MadelineProto->complete2falogin();
    // }
    // if ($authorization['_'] === 'account.needSignup') {
    //     $authorization = $MadelineProto->completeSignup(first name, last name);
    // }



    // $messages_Messages = $MadelineProto->channels->readHistory(channel: 'IT save' );
    // $settings = array(
    //     'peer' => -993153556,
    //     'add_offset' => 0,
    //     'limit' => 2,
    // );
    // $data = $MadelineProto->channels->getChannels(['id' => ['https://t.me/joinchat/993153556']]);
    // $data = $MadelineProto->messages->readHistory($settings);

    // $data = $MadelineProto->getPwrChat(-993153556);

    // $data = new Settings;
    echo '<pre>';
    print_r($MadelineProto);
    echo '</pre>';


    return [];
});