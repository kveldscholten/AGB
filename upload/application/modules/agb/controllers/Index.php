<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Agb\Controllers;

use Modules\Agb\Mappers\Agb as AgbMapper;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $agbMapper = new AgbMapper();

        $this->getLayout()->getTitle()
            ->add($this->getTranslator()->trans('menuAgb'));
        $this->getLayout()->getHmenu()
                ->add($this->getTranslator()->trans('menuAgb'), ['action' => 'index']);

        $this->getView()->set('agb', $agbMapper->getAgb(['show' => 1]));
    }
}
