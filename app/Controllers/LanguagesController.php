<?php

namespace App\Controllers;

use App\Models\Language;

class LanguagesController extends BaseController
{
    public function getAddLanguagesAction()
    {
        return $this->renderHTML('addLanguage.twig');
    }

    public function postAddLanguagesAction($request)
    {
        $data = $request->getParsedBody();
        $language = new Language();
        $language->language = $data['language'];
        $language->save();
        $alert = 'Idioma añadido con éxito al curriculum';

        return $this->renderHTML('addLanguage.twig', [
            'alert' => $alert
        ]);
    }
}
