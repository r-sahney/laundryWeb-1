<?php
namespace LaunderyWebCleaners\LaundryWebApp\Controller;


use LaunderyWebCleaners\LaundryWebApp\Domain\Model\Customer;
use LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order;
use LaunderyWebCleaners\LaundryWebApp\Domain\Model\Product;
use OliverHader\SessionService\InvalidSessionException;
use OliverHader\SessionService\SubjectCollection;
use OliverHader\SessionService\SubjectResolver;

/***
 *
 * This file is part of the "LaundryWeb App" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Sangram Bhavar <sangram.bhavar@hof-university.de>, LaundryWeb
 *           Rajveer Sahney <rajveer.sahney@hof-university.de>, LaundryWeb
 *           Danish Umair Ahmad <danish.umair.ahmad@hof-university.de>, LaundryWeb
 *           Sukanta Maity <sukanta.maity@hof-university.de>, LaundryWeb
 *
 ***/
/**
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * orderRepository
     *
     * @var \LaunderyWebCleaners\LaundryWebApp\Domain\Repository\OrderRepository
     */
    protected $orderRepository = null;

    /**
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Repository\OrderRepository $orderRepository
     */
    public function injectOrderRepository(\LaunderyWebCleaners\LaundryWebApp\Domain\Repository\OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $orders = $this->orderRepository->findAll();
        $this->view->assign('orders', $orders);
    }

    /**
     * action show
     *
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order
     * @return void
     */
    public function showAction()
    {
        try{
        $customer = SubjectResolver::get()
            ->forClassName(Customer::class)
            ->forPropertyName('user')
            ->resolve();
        } catch (InvalidSessionException $exception)
        {
            $customer=null;
        }

        $order =$this->providOrder();

        $this->view->assign('customer',$customer);
        $this->view->assign('order', $order);
    }

    /**
     * @param Product $product
     */
    public function addAction(Product $product)
    {
        $order =$this->providOrder();
        $order->addProduct($product);
        $this->orderRepository->update($order);
        $this->redirect('show');
    }

    /**
     * @param Product $product
     */
    public function removeAction(Product $product)
    {
        $order =$this->providOrder();
        $order->removeProduct($product);
        $this->orderRepository->update($order);
        $this->redirect('show');
    }

    /**
     *
     */
    public function purgeAction()
    {
        $order =$this->providOrder();
        $this->redirect('show');
    }

    private function providOrder(): Order
    {
        $collection = SubjectCollection::get('laundry_web_app/order');
        if (!isset($collection ['order']))
        {
            $collection ['order'] = $this->objectManager->get(Order::class);
            $collection->persist();
        }
        return $collection ['order'];
    }
        /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     *
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $newOrder
     * @return void
     */
    public function createAction(\LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $newOrder)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->add($newOrder);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order
     * @ignorevalidation $order
     * @return void
     */
    public function editAction(\LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action update
     *
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order
     * @return void
     */
    public function updateAction(\LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->update($order);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order
     * @return void
     */
    public function deleteAction(\LaunderyWebCleaners\LaundryWebApp\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->remove($order);
        $this->redirect('list');
    }
}
