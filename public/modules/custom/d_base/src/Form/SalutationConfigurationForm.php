<?php

namespace Drupal\d_base\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Form;

class SalutationConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc }
   */
  protected function getEditableConfigNames() {
   return ['d_base.custom_salutation'];
  }

  /**
   * {@inheritdoc }
   */
  public function getFormId() {
    return 'salutation_configuration_form';
     // TODO: Implement getFormId() method.
  }
  /**
   * {@inheritdoc }
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('d_base.custom_salutation');
    $form['salutation'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Salutation'),
      '#description' => $this->t('Please provide salutation you want to use'),
        '#default_value' => $config->get('salutation'),
    );
    return parent::buildForm($form, $form_state);
  }
  /**
   * {@inheritdoc }
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  $this->config('d_base.custom_salutation')
      ->set('salutation', $form_state->getValue('salutation'))
      ->save();
  parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc }
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $salutation = $form_state->getValue('salutation');
    if (strlen($salutation) > 20) {
      $form_state->setErrorByName('salutation', $this->t('This salutation is too long'));
    }
  }
}