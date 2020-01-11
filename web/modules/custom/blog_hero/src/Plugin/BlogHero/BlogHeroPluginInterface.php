<?php

namespace Drupal\blog_hero\Plugin\BlogHero;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Common interface for all BlogHero Plugin Type.
 */
interface BlogHeroPluginInterface extends PluginInspectionInterface {

  /**
   * Gets plugin status.
   *
   * @return bool
   *   The plugin status.
   */
  public function getEnabled();

  /**
   * Gets plugin weight.
   *
   * @return int
   *   The plugin weight.
   */
  public function getWeight();

  /**
   * Gets hero title.
   *
   * @return string
   *   The title.
   */
  public function getHeroTitle();

  /**
   * Gets hero subtitle.
   *
   * @return string
   *   The subtitle.
   */
  public function getHeroSubtitle();

  /**
   * Gets hero image URI.
   *
   * @return string
   *   The URI of image.
   */
  public function getHeroImage();

  /**
   * Gets hero video URI.
   *
   * The array with link to the same video in different types.
   *
   * @code
   * return [
   * 'video/mp4' => 'bunny.mp4',
   * 'video/ogg' => 'bunny.ogg',
   * 'video/webm' => 'bunny.webm',
   * ]
   * @endcode
   *
   * @return array
   *   The array of video URI.
   */
  public function getHeroVideo();

}
