<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Exception;
use Google_Service_FirebaseCloudMessaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    public function index() {
        return view('notifications');
    }

    public function create() {
        request()->validate([
            'title_pt' => ['required', 'max:45'],
            'title_en' => ['required', 'max:45'],
            'title_es' => ['required', 'max:45'],
            'title_it' => ['required', 'max:45'],
            'body_pt' => ['required', 'max:200'],
            'body_en' => ['required', 'max:200'],
            'body_es' => ['required', 'max:200'],
            'body_it' => ['required', 'max:200'],
        ]);

        foreach (['en', 'pt', 'es', 'it'] as $locale)
        {
            $extra = array();

            if(request('screen'))
            {
                $extra["screen"] = request('screen');
            }

            if(request('url'))
            {
                $extra["url"] = request('url');
            }

            if(request('screen') == null && request('url') == null)
            {
                $data = [
                    "message" => [
                        "topic" => $locale,
                        "notification" => [
                            "title" => request('title_' . $locale),
                            "body" => request('body_' . $locale),
                        ],
                    ],
                ];
            }
            else
            {
                $data = [
                    "message" => [
                        "topic" => $locale,
                        "notification" => [
                            "title" => request('title_' . $locale),
                            "body" => request('body_' . $locale),
                        ],
                        "data" => $extra
                    ],
                ];
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->configureClient(),
                'Content-Type' => 'application/json'])
                ->post("https://fcm.googleapis.com/v1/projects/" . env('FIREBASE_PROJECT_ID') ."/messages:send",
                    $data);

            if(!$response->ok())
            {
                return back()->with('error', 'Erro ao Enviar!');
            }
        }

        activity()
            ->causedBy(auth()->user())
            ->log('Notification Sent by ' . auth()->user()->name . ' at ' . now() .
                ' \n TitleEn:' . request('title_en')  . 'BodyEn: ' . request('body_en') .
                ' TitlePt:' . request('title_pt')  . 'BodyPt: ' . request('body_pt') .
                ' TitleEs:' . request('title_es')  . 'BodyEs: ' . request('body_es' .
                    ' TitleIt:' . request('title_it')  . 'BodyIt: ' . request('body_it')).
                    ' data: screen: ' . $extra['screen'] ?? 'null' . ' url: ' . $extra['url'] ?? 'null');

        return back()->with('message', 'Notificação Enviada!');
    }

    public function configureClient()
    {
        $client = new Google_Client();
        try {
            $client->setAuthConfig("../storage/app/secrets/wyddb23-259fe-d4fa8f21122a.json");
            $client->addScope(Google_Service_FirebaseCloudMessaging::CLOUD_PLATFORM);

            // retrieve the saved oauth token if it exists
            $savedTokenJson = Storage::disk('local')->get('secrets/access_token.json');

            if ($savedTokenJson != null) {
                // the token exists, set it to the client and check if it's still valid
                $client->setAccessToken($savedTokenJson);
                if ($client->isAccessTokenExpired()) {
                    // the token is expired, generate a new token and set it to the client
                    $accessToken = $this->generateToken($client);
                    $client->setAccessToken($accessToken);

                    return $accessToken["access_token"];
                }

                return json_decode($savedTokenJson)->access_token;

            } else {
                // the token doesn't exist, generate a new token and set it to the client
                $accessToken = $this->generateToken($client);
                $client->setAccessToken($accessToken);

                return $accessToken["access_token"];
            }

            // the client is configured, now you can send the push notification using the $oauthToken.

        } catch (Google_Exception $e) {
            // handle exception
        }

        return null;
    }

    private function generateToken($client)
    {
        $client->fetchAccessTokenWithAssertion();
        $accessToken = $client->getAccessToken();

        // save the oauth token json
        $tokenJson = json_encode($accessToken);

        Storage::disk('local')->put('secrets/access_token.json', $tokenJson);

        return $accessToken;
    }
}
