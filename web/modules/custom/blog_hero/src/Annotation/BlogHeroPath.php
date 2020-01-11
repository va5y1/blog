<?php

namespace Drupal\blog_hero\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * BlogHeroPath Annotation.
 *
 * @Annotation
 */
class BlogHeroPath extends Plugin {

  /**
   * The Plugin id.
   *
   * @var string
   */
  public $id;

  /**
   * Plugin status.
   *
   * By default this Plugin are enabled and value set in TRUE.
   * Set is in FALSE for disable Plugin.
   *
   * @var bool
   */
  public $enabled;

  /**
   * The match type for match_path.
   *
   * Value can be:
   * -listed: (default) Shows only at paths from match_path.
   * -unlisted: Show at all paths, except those listed in match_path.
   *
   * @var string
   */
  public $match_type;

  /**
   * The path to match.
   *
   * @var array
   */
  public $match_path;

  /**
   * The weight of plugin.
   *
   * Plugin with higher weight will be used.
   *
   * @var int
   */
  public $weight;

}
