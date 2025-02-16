<?php

return [
    'project_id' => getenv('GOOGLE_PROJECT_ID') ?: '',
    'client_id' => getenv('GOOGLE_CLIENT_ID') ?: '',
    'client_secret' => getenv('GOOGLE_CLIENT_SECRET') ?: '',
    'redirect_uri' => getenv('APP_URL') . '/auth/callback',
    'scopes' => ['email', 'profile'],
];
