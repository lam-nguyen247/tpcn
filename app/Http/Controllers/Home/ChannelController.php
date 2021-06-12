<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Exception;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Http\Request;
use App\Models\Page;

class ChannelController extends Controller
{
    public function index(Request $request)

    {
		$client = $this->getGoogleClient();
		$service = new Google_Service_Sheets($client);
		$spreadsheetId = '1Ay8gJsf_NtToFEXRxP6JHKwPU4673fgpyvQTn6GpWiI';
		$range = 'Trang tính1!A1:E';

		// get values
		$response = $service->spreadsheets_values->get($spreadsheetId, $range);
		$arr = $response->getValues();
        $values = [];

        foreach($arr as $key=>$item){
            if($key == 0){
                $values[] = $item;
                continue;
            }
            $item[0] = (int)str_replace('.', '', $item[0]);
            $item[3] = (int)str_replace('.', '', $item[3]);
            if(!empty($request->sub_f)){
                if($item[0] < $request->sub_f){
                    continue;
                }
            }
            if(!empty($request->sub_t)){
                if($item[0] > $request->sub_t){
                    continue;
                }
            }
            if(!empty($request->price_f)){
                if($item[3] < $request->price_f){
                    continue;
                }
            }
            if(!empty($request->price_t)){
                if($item[3] > $request->price_t){
                    continue;
                }
            }
            $values[] = $item;
        }
        $page = Page::find(13);
        $seo = $page->seo;
        return view('home.channel.index', compact("values", 'page', 'seo'));
    }

    public function getGoogleClient()
    {
        $client = new Google_Client();
        $client->setRedirectUri('https://youtubestore.vn/key');
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig(config_path('credentials.json'));
        $client->setAccessType('offline');

        $tokenPath = storage_path('app/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }

        return $client;
   }

   public function getKey(Request $request){
       dd($request->all());
   }
}
