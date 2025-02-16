<?php

namespace App\Auth;

class GoogleAuth
{
    private string $clientId;
    private string $clientSecret;
    private string $redirectUri;

    public function __construct()
    {
        $this->clientId = getenv('GOOGLE_CLIENT_ID') ?: '';
        $this->clientSecret = getenv('GOOGLE_CLIENT_SECRET') ?: '';
        $this->redirectUri = getenv('APP_URL') . '/auth/callback';
    }

    public function getAuthUrl(): string
    {
        $params = [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => 'email profile',
            'access_type' => 'online'
        ];

        return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
    }

    public function getAccessToken(string $code): ?array
    {
        $params = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->redirectUri
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function getUserInfo(string $accessToken): ?array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/v2/userinfo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
