<?php

namespace Drupal\webspark_module_asu_breadcrumb\Plugin\Block;

use Drupal\system\Plugin\Block\SystemBreadcrumbBlock;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an ASU Breadcrumb block.
 *
 * @Block(
 *   id = "webspark_module_asu_breadcrumb",
 *   admin_label = @Translation("ASU Breadcrumb"),
 *   category = @Translation("ASU Breadcrumb")
 * )
 */
class AsuBreadcrumb extends SystemBreadcrumbBlock {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['color'] = [
      '#type' => 'select',
      '#title' => $this->t('Select color'),
      '#options' => [
        'bg-white' => $this->t('White'),
        'bg-gray-1' => $this->t('Light Gray'),
        'bg-gray-2' => $this->t('Gray'),
        'bg-gray-7' => $this->t('Black'),
      ],
      '#default_value' => isset($config['color']) ? $config['color']: 'default',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['color'] = $values['color'];
  }

}
