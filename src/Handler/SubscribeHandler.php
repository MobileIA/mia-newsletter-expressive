<?php namespace Mobileia\Newsletter\Handler;

/**
 * Description of SubscribeHandler
 *
 * @author matiascamiletti
 */
class SubscribeHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtener email
        $email = $this->getParam($request, 'email', '');
        // Verificar si el email es valido
        if($email == ''){
            return new \Mobileia\Expressive\Diactoros\MiaJsonErrorResponse(-1, 'El email es obligatorio.');
        }
        // Buscar si ya existe en la DB
        $row = \Mobileia\Newsletter\Model\Newsletter::where('email', $email)->first();
        if($row !== null){
            return new \Mobileia\Expressive\Diactoros\MiaJsonErrorResponse(-2, 'Este email ya se encuentra registrado');
        }
        $row = new \Mobileia\Newsletter\Model\Newsletter();
        $row->firstname = $this->getParam($request, 'firstname', '');
        $row->lastname = $this->getParam($request, 'lastname', '');
        $row->phone = $this->getParam($request, 'phone', '');
        $row->email = $email;
        $row->status = \Mobileia\Newsletter\Model\Newsletter::STATUS_ACTIVE;
        $row->save();
        // Devolvemos datos del usuario
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($row->toArray());
    }
}
