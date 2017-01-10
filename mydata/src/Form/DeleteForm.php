<?php

namespace Drupal\mydata\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Render\Element;
/**
 * Class DeleteForm.
 *
 * @package Drupal\mydata\Form
 */
class DeleteForm extends ConfirmFormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'delete_form';
  }

  public $cid;

  public function getQuestion() { 
    return t('Do you want to delete %cid?', array('%cid' => $this->cid));
  }

  public function getCancelUrl() {
    return new Url('mydata.display_table_controller_display');
}
public function getDescription() {
    return t('Only do this if you are sure!');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return t('Delete it!');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelText() {
    return t('Cancel');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $cid = NULL) {

     $this->id = $cid;
    return parent::buildForm($form, $form_state);
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // $num=$form_state->getValues('id');
    // echo "$num";
    // $name=$field['id'];
    // echo "$name";
    // die;

    //print_r($form_state);die;
   $query = \Drupal::database();
    //echo $this->id; die;
    $query->delete('mydata')
        //->fields($field)
          ->condition('id',$this->id)
        ->execute();
        //if($query == TRUE){
             drupal_set_message("succesfully deleted");
        //    }
        // else{

        //   drupal_set_message(" not succesfully deleted");

        // }
    $form_state->setRedirect('mydata.display_table_controller_display');
  }


  //   $num_deleted = db_delete('mydata')
  // ->condition('id', 1)
  // ->execute();

  //     if($num_deleted == TRUE){
  //        drupal_set_message("deleted suceesfully");
  //      }
  //    else
  //     {

  //       drupal_set_message(" unsucessfully");
  //      }
  
  // }

  

}
