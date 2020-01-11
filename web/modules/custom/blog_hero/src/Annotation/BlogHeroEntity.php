<?php

namespace Drupal\blog_hero\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * BlogHeroEntity Annotation.
 *
 * @Annotation
 */
class BlogHeroEntity extends Plugin {

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
   * The entity type id.
   *
   * @var string
   */
  public $entity_type;

  /**
   * The entity bundle.
   *
   * The array of bundles from entity_type on which pages this plugin will be
   * available.
   *
   * E.g {"news", "page"}
   *
   * @var array
   */
  public $entity_bundle;

  /**
   * The weight of plugin.
   *
   * Plugin with higher weight will be used.
   *
   * @var int
   */
  public $weight;

}
