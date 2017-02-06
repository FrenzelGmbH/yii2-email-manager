# Email Module #

Enhanced E-Mail Module based upon the original code from:

yarcode/yii2-email-manager

Had to adpopt a couple of things to use it within our projects. Feel free to participate;)

## Installation ##

Add the following line to your composer.json require section:

```
"FrenzelGmbH/yii2-email-manager" : "*",
```

After this you have to modify your configuration files like:

Simple configuration:

    'components' => [
        'emailManager' => [
            'class' => '\net\frenzel\email\EmailManager',
            'transports' => [
                'yiiMailer' => '\net\frenzel\email\transports\YiiMailer'
            ],
        ],
    ]

Multi transport configuration:

    'components' => [
        'emailManager' => [
            'class' => '\net\frenzel\email\EmailManager',
            'defaultTransport' => 'yiiMailer',
            'transports' => [
                'yiiMailer' => [
                    'class' => '\net\frenzel\email\transports\YiiMailer',
                ],
            ],
        ],
    ]

Add command to the list of the available commands. Put it into console app configuration:

    'controllerMap' => [
        'email' => '\net\frenzel\email\commands\EmailCommand',
    ],

Add email sending daemon into crontab via lockrun or run-one utils:

    */5 * * * * run-one php /your/site/path/yii email/run-spool-daemon

OR, if you will use cboden/ratchet

    */5 * * * * run-one php /your/site/path/yii email/run-loop-daemon

## Usage ##

    // obtain component instance
    $emailManager = EmailManager::geInstance();
    // direct send via default transport
    $emailManager->send('from@example.com', 'to@example.com', 'test subject', 'test email');
    // queue send via default transport
    $emailManager->send('from@example.com', 'to@example.com', 'test subject', 'test email');
    // direct send via selected transport
    $emailManager->transports['mailGun']->send('from@example.com', 'to@example.com', 'test subject', 'test email');
    
    // use shortcuts
    EmailTemplate::findByShortcut('shortcut_name')->queue('recipient@email.org', ['param1' => 1, 'param2' => 'asd']);

