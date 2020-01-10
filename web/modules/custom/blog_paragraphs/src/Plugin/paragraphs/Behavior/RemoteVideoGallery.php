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
 *   id = "blog_paragraps_remote_video_gallery",
 *   label = @Translation("Video-gallery settings"),
 *   description = @Translation("Settings for remote video gallery paragraph type."),
 *   weight = 0,
 * )
 */
class RemoteVideoGallery extends ParagraphsBehaviorBase {

  /**
   * {@inheritDoc}
   */
  public static function isApplicable(ParagraphsType $paragraphs_type) {
    return $paragraphs_type->id() == 'youtube_gallery';
  }

  /**
   * Extends the paragraph render array with behavior.
   */
  public function view(array &$build, Paragraph $paragraph, EntityViewDisplayInterface $display, $view_mode) {
    $videos_per_row = $paragraph->getBehaviorSetting($this->getPluginId(), 'item_per_row', 4);
    $bem_block = 'paragraph-' . $paragraph->bundle() . ($view_mode = 'default' ? '' : '-' . $view_mode) . '--videos-per-row' .
      $videos_per_row;
    $build['#attributes']['class'][] = Html::getClass($bem_block);
  }

  /**
   * {@inheritDoc}
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {
    $form['item_per_row'] = [
      '#type' => 'select',
      '#title' => $this->t('number of videos per row'),
      '#options' => [
        2 => $this->formatPlural(2, '1 video per row', '@count videos per row'),
        3 => $this->formatPlural(3, '1 video per row', '@count videos per row'),
        4 => $this->formatPlural(4, '1 video per row', '@count videos per row'),
      ],
      '#default_value' => $paragraph->getBehaviorSetting($this->getPluginId(), 'item_per_row', 4),
    ];
    return $form;
  }

}
