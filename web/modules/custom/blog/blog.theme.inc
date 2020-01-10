<?php

/**
 * @file
 * Main file for preprocessing theme hook.
 */

/**
 * Implements template_preprocess_HOOK() for blog-previous-next.html.twig.
 */
function template_preprocess_blog_previous_next(&$variables) {
  /** @var \Drupal\Core\Entity\EntityInterface $entity */
  $entity = $variables['entity'];
  $variables['next'] = [];
  $variables['previous'] = [];

  /** @var \Drupal\Core\Entity\EntityStorageInterface $entity_storage */
  $entity_storage = \Drupal::entityTypeManager()
    ->getStorage($entity->getEntityTypeId());

  // Getting next entity id.
  $next_entity_id = $entity_storage->getQuery()
    ->condition('type', $entity->bundle())
    ->condition('created', $entity->getCreatedTime(), '>')
    ->range(0, 1)
    ->sort('created', 'ASC')
    ->execute();
  if (!empty($next_entity_id)) {
    $next_entity = $entity_storage->load($next_entity_id);
    $variables['next']['label'] = $next_entity->label();
    $variables['next']['url'] = $next_entity->toUrl()->toString(TRUE)->getGeneratedUrl();
  }
  // Getting previous entity id.
  $previous_entity_id = $entity_storage->getQuery()
    ->condition('type', $entity->bundle())
    ->condition('created', $entity->getCreatedTime(), '<')
    ->range(0, 1)
    ->sort('created', 'DESC')
    ->execute();
  if (!empty($previous_entity_id)) {
    $prev_entity = $entity_storage->load($previous_entity_id);
    $variables['previous']['label'] = $prev_entity->label();
    $variables['previous']['url'] = $prev_entity->toUrl()->toString(TRUE)->getGeneratedUrl();
  }
}
