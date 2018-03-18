<?php
/**
 * Created by PhpStorm.
 * User: bau
 * Date: 3/18/2018
 * Time: 10:52 AM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class AuthController
{
  public function getLogin()
  {
    if (session()->has('user')) {
      return redirect()
        ->route('Bus.getIndex');
    }

    return view('auth.login');
  }

  public function postLogin()
  {
    $res = (new Client())->post('http://mark.journeytech.com.ph/hulibus_api/authentication.php', [
      'body' => json_encode([
        'userid' => request()->input('userid'),
        'pass' => request()->input('pass')
      ])
    ]);

    $done = json_decode($res->getBody()->getContents(), true);

    if ($done['status'] == 'Log in Success!') {
      session()->put('user', $done);
      return redirect()
        ->route('Bus.getIndex');
    }

    return redirect()
      ->back()
      ->with('danger', 'Login fail');
  }

  public function getLogout()
  {
    session()->forget('user');

    return redirect()
      ->back();
  }
}