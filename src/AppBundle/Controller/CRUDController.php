<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CRUDController
 * @package AppBundle\Controller
 */
class CRUDController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     * @throws NotFoundHttpException
     */
    public function cloneAction($id)
    {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        $clonedObject = clone $object;

        //$clonedObject->setName($object->getName() . ' Duplicated');

        $this->admin->create($clonedObject);

        $this->addFlash('sonata_flash_success', 'Duplicated successfully');

        return new RedirectResponse($this->admin->generateUrl('list'));
    }

    /**
     * @param ProxyQueryInterface $selectedModelQuery
     * @param Request             $request
     *
     * @return RedirectResponse
     */
    public function batchActionClone(ProxyQueryInterface $selectedModelQuery, Request $request = null)
    {
        $this->admin->checkAccess('edit');
        $this->admin->checkAccess('delete');

        $modelManager = $this->admin->getModelManager();

        $selectedModels = $selectedModelQuery->execute();

        try {
            foreach ($selectedModels as $selectedModel) {
                $newModel = clone $selectedModel;
                $modelManager->create($newModel);
            }
        } catch (\Exception $e) {
            $this->addFlash('sonata_flash_error', 'Batch clone error');

            return new RedirectResponse(
                $this->admin->generateUrl('list', array('filter' => $this->admin->getFilterParameters()))
            );
        }

        $this->addFlash('sonata_flash_success', 'Batch clone successful');

        return new RedirectResponse(
            $this->admin->generateUrl('list', array('filter' => $this->admin->getFilterParameters()))
        );
    }
}
