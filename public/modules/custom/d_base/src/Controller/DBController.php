<?php

namespace Drupal\d_base\Controller;

use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;
class DBController extends \Drupal\Core\Controller\ControllerBase {

  protected $currentUser;

  public function __construct(AccountProxy $currentUser ) {
    $this->currentUser = $currentUser;
  }
  public function render() {

    return [
      '#theme' => 'd_base_theme_hook',
      '#markup' => 'Text to render',
      '#variable1' => 123,
      '#variable3' => [123,453],
    ];
  }

  /**
   * {@inheritdoc}
   */
   public static function create(ContainerInterface $container) {
     return new static(
       $container->get('current_user')
     );
   }
}