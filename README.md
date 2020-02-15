# mia-newsletter-expressive

# Instalación servicio de suscripción
Abrir routes.php e insertar:
```php
/** NEWSLETTER **/
$app->route('/newsletter/subscribe', [\Mobileia\Newsletter\Handler\SubscribeHandler::class], ['GET', 'POST'], 'newsletter.subscribe');
```