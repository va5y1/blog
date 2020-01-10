<?php

namespace Drupal\blog_paragraphs\Plugin\paragraphs\Behavior;

use Drupal\Component\Utility\Html;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\paragraphs\ParagraphInterface;
use Drupal\paragraphs\ParagraphsBehaviorBase;

/**
 * @ParagraphsBehavior(
 *   id = "blog_paragraps_paragraph_title",
 *   label = @Translation("Adding styles for paragraphs title"),
 *   description = @Translation("Allows to add custom styles to paragraphs title."),
 *   weight = 0,
 * )
 */
class ParagraphTitleBehavior extends ParagraphsBehaviorBase {

  /**
   * {@inheritDoc}
   */
  public static function isApplicable(ParagraphsType $paragraphs_type) {
    return TRUE;
  }

  /**
   * Extends the paragraph render array with behavior.
   */
  public function view(array &$build, Paragraph $paragraph, EntityViewDisplayInterface $display, $view_mode) {
  }

  /**
   * {@inheritDoc}
   */
  public function preprocess(&$variables) {
    /** @var \Drupal\paragraphs\ParagraphInterface $paragraph*/
    $paragraph = $variables['paragraph'];
    $variables['title_wrapper'] = $paragraph->getBehaviorSetting($this->getPluginId(), 'title_wrapper', 'h2');
  }

  /**
   * {@inheritDoc}
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {
    if ($paragraph->hasField('field_text_header')) {
      $form['title_wrapper'] = [
        '#type' => 'select',
        '#title' => $this->t('Title wrapper element'),
        '#options' => $this->getHeadingOptions(),
        '#default_value' => $paragraph->getBehaviorSetting($this->getPluginId(), 'title_wrapper', 'h2'),
      ];
    }
    return $form;
  }

  /**
   * Defines list of available options for title element.
   */
  public function getHeadingOptions(){
    return [
      'h2' => 'h2',
      'h3' => 'h3',
      'h4' => 'h4',
      'div' => 'div',
    ];
  }

}
