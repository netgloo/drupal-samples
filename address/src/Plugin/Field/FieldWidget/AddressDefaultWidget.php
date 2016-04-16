<?php

namespace Drupal\address\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'AddressDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "AddressDefaultWidget",
 *   label = @Translation("Address select"),
 *   field_types = {
 *     "Address"
 *   }
 * )
 */
class AddressDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   * 
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Street

    $element['street'] = [
      '#type' => 'textfield',
      '#title' => t('Street'),

      // Set here the current value for this field, or a default value (or 
      // null) if there is no a value
      '#default_value' => isset($items[$delta]->street) ? 
          $items[$delta]->street : null,

      '#empty_value' => '',
      '#placeholder' => t('Street'),
    ];

    // City

    $element['city'] = [
      '#type' => 'textfield',
      '#title' => t('City'),
      '#default_value' => isset($items[$delta]->city) ? 
          $items[$delta]->city : null,
      '#empty_value' => '',
      '#placeholder' => t('City'),
    ];

    return $element;
  }

} // class
