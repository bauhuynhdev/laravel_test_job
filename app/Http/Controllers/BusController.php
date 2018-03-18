<?php
/**
 * Created by PhpStorm.
 * User: bau
 * Date: 3/18/2018
 * Time: 11:18 AM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class BusController
{
  public function getIndex()
  {
    $user = session()->get('user');

    $res = (new Client())->post('http://mark.journeytech.com.ph/hulibus_api/bus_list.php', [
      'body' => json_encode([
        'ucsi_num' => $user['ucsi_num'],
        'client_table' => $user['client_table'],
        'markutype' => $user['markutype']
      ])
    ]);

    $done = json_decode($res->getBody()->getContents(), true);

    return view('bus.index', [
      'busList' => $done
    ]);
  }

  public function postBus()
  {
    $user = session()->get('user');

    $res = (new Client())->post('http://mark.journeytech.com.ph/hulibus_api/fence_master.php', [
      'body' => json_encode([
        'ucsi_num' => $user['ucsi_num'],
        'fence_name' => request()->input('fence_name'),
        'location' => request()->input('location'),
        'type' => request()->input('type')
      ])
    ]);

    $done = json_decode($res->getBody()->getContents(), true);

    if ($done['status']) {
      return redirect()
        ->back()
        ->with('success','Create success');
    }

    return redirect()
      ->back()
      ->with('danger','Has error');
  }
}