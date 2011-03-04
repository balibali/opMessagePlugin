<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * Message routing.
 *
 * @package    OpenPNE
 * @author     Maki TAKAHASHI <maki@jobweb.co.jp>
 */
class opMessagePluginRouteCollection extends sfRouteCollection
{
  public function __construct(array $options)
  {
    parent::__construct($options);

    $this->generateRoutes();
  }

  protected function generateRoutes()
  {
    // message list
    $this->routes['receiveList'] = new sfRoute(
      '/message/receiveList',
      array('module' => 'message', 'action' => 'list', 'type' => 'receive')
    );
    $this->routes['sendList'] = new sfRoute(
      '/message/sendList',
      array('module' => 'message', 'action' => 'list', 'type' => 'send')
    );
    $this->routes['draftList'] = new sfRoute(
      '/message/draftList',
      array('module' => 'message', 'action' => 'list', 'type' => 'draft')
    );
    $this->routes['dustList'] = new sfRoute(
      '/message/dustList',
      array('module' => 'message', 'action' => 'list', 'type' => 'dust')
    );

    //show message
    $this->routes['readReceiveMessage'] = new sfRoute(
      '/message/read/:id',
      array('module' => 'message', 'action' => 'show', 'type' => 'receive'),
      array('id' => '\d+')
    );
    $this->routes['readSendMessage'] = new sfRoute(
      '/message/check/:id',
      array('module' => 'message', 'action' => 'show', 'type' => 'send'),
      array('id' => '\d+')
    );
    $this->routes['readDustMessage'] = new sfRoute(
      '/message/checkDelete/:id',
      array('module' => 'message', 'action' => 'show', 'type' => 'dust'),
      array('id' => '\d+')
    );

    //delete message
    $this->routes['deleteReceiveMessage'] = new sfRoute(
      '/message/deleteReceiveMessage/:id',
      array('module' => 'message', 'action' => 'delete', 'type' => 'receive'),
      array('id' => '\d+')
    );
    $this->routes['deleteSendMessage'] = new sfRoute(
      '/message/deleteSendMessage/:id',
      array('module' => 'message', 'action' => 'delete', 'type' => 'send'),
      array('id' => '\d+')
    );
    $this->routes['deleteDustMessage'] = new sfRoute(
      '/message/deleteComplete/:id',
      array('module' => 'message', 'action' => 'delete', 'type' => 'dust'),
      array('id' => '\d+')
    );
  }
}
