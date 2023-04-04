<?php

namespace Drupal\d_base;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 *
 */

class HelloWorldSalutation {

  use StringTranslationTrait;

  public function getSalutation() {
    $time = new \Datetime();
    if (( int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }
    if (( int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }
  }
}